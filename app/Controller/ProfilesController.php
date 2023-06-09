<?php
class ProfilesController extends AppController {
   public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public $uses = array('User');

    public function index() {
        $currentUser = $this->Auth->user();
        $otherusers = $this->User->find('all',array(
    'conditions' => array('User.id' => $currentUser)
    ));
        $this->set('otherusers', $otherusers);
    }


    public function view($id) {
        $this->loadModel('User');
        $viewuser = $this->User->find('all',array(
    'conditions' => array('User.id' => $id)
    ));
        $this->set('viewuser', $viewuser);
    }

}
?>