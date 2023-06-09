<?php
class UsersController extends AppController {
   public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash','Session');

    

    public function index() {
        $this->set('users', $this->User->find('all'));
    }

    public function success() {
       
    }

    public function login() {
        if ($this->request->is('post')) {  
            if($this->Auth->login()){
                return $this->redirect($this->Auth->redirectUrl());  
            } else{
               $this->Flash->error(__('Invalid username or password, try again'));;
            }
        }
    }


    public function logout(){
            $this->Auth->logout();
            $this->redirect('/');

    }


//Edit User Information
    public function edit() {
    $currentUser = $this->Auth->user();
    $id = $currentUser['id'];    
    $user = $this->User->findById($id);

    if ($this->request->is(array('post', 'put'))) {
        $this->User->id = $id;
        
        if (!empty($this->request->data['User']['profile_picture']['name'])) {
                $filename = $this->request->data['User']['profile_picture']['name'];
                $tempname = $this->request->data['User']['profile_picture']['tmp_name'];
                        $uploadPath = WWW_ROOT . 'img' . DS . 'uploads' . DS;
                        $filename = $this->request->data['User']['profile_picture']['name'];
                        $uploadFile = $uploadPath . $filename;    

                        $this->request->data['User']['profile_picture'] = $filename;

                        if ($this->User->save($this->request->data)) {
                        $this->Flash->success(__('Your Information has been updated.'));
                        return $this->redirect(array('action' => 'view'));
                        if (move_uploaded_file($tempname, $uploadFile)) {                                     
                        } else {
                            $this->Session->setFlash('Failed to upload the image. Please try again.');
                        }
                        }
                        

            } else {
                // Handle the case when the file input field is empty
            }



    }

    if (!$this->request->data) {
        $this->request->data = $user;
    }
}


    public function view(){
        $currentUser = $this->Auth->user();
        $myinfo = $this->User->find('all', array(
         'conditions' => array(
                'User.id' => $currentUser['id'] )
         ));
        $this->set('myinfo', $myinfo);

    }

    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            $this->request->data['User']['role'] = 1;
            $this->request->data['User']['profile_picture'] = "default.jpg";
            if ($this->User->save($this->request->data)) {
                $lastInsertedId = $this->User->getLastInsertID();
                $this->request->data['User']['id'] =$lastInsertedId;
                
                $this->Auth->login($this->request->data['User']);
                return $this->redirect(array('controller' => 'users', 'action' => 'index'));
                $this->Flash->success(__('Registration Successful.'));
                return $this->redirect(array('action' => 'success'));
            }
            $this->Flash->error(__('Registration Failed.'));
        }
    }




}
?>