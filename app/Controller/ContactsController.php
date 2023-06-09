<?php
class ContactsController extends AppController {
   public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public $uses = array('User');

    public function index() {
        $this->loadModel('User');
        $otherusers = $this->User->find('all');
        $this->set('otherusers', $otherusers);
    }

        public function message() {
        if ($this->request->is('post')) {
            $this->Contact->create();
            $this->request->data['Contact']['contact_image'] = "https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/191639803/original/6e3aaaff75fcec4760c084978bfc5df39eeddc64/create-cartoon-profile-pictures.jpg";
            if ($this->Contact->save($this->request->data)) {
                $this->Flash->success(__('Your Contact has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to add Contact.'));
        }


    }



    public function profile($name) {
        $this->loadModel('User');
        $viewuser = $this->User->find('all',array(
    'conditions' => array('User.username' => $name)
    ));
        $this->set('viewuser', $viewuser);
    }

}
?>