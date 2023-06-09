<?php
class MessagesController extends AppController {
   public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

   public $uses = array('User');


   public function index($to) {
         $currentUser = $this->Auth->user();
         $messages = $this->Message->find('all', array(
         'conditions' => array(
         'OR' => array(
            array(
                'Message.fromId' => $to,
                'Message.toId' => $currentUser['id']
                ),
            array(
                'Message.fromId' => $currentUser['id'] ,
                'Message.toId' => $to
               )
            )
         ),
         'order' => array('Message.id ASC')
         ));

         $otherusers = $this->User->find('all',array('conditions' => array('User.id' => $to)));
         $this->set('otherusers', $otherusers);   
         $this->set('messages', $messages);
    }


public function submit() {
   $currentUser = $this->Auth->user();
   $currentDateTime = date('Y-m-d H:i:s');
    if ($this->request->is('ajax')) {
        // If the request is an AJAX request

        // Process the form data
        if ($this->request->is('post')) {
            $data = $this->request->data;
            // Perform any necessary validation or data manipulation

            // Save the data to the database or perform other actions
            // Example:
            // $this->YourModel->save($data);

            // Prepare the response

            // Get the current datetime
            $formData = $this->request->data;
            $this->Message->create();
            $this->request->data['Message']['fromId'] = $currentUser['id'];
            $this->request->data['Message']['toId'] = $formData['toId'];
            $this->request->data['Message']['message'] = $formData['message'];
            $this->request->data['Message']['created'] = $currentDateTime;
            if ($this->Message->save($this->request->data)) {
            }  
            $response = array(
                'status' => 'success',
                'message' => $formData['message'],
                'created' => $currentDateTime
                // You can include additional data in the response if needed
            );

            // Return the response as JSON
            echo json_encode($response);
            exit();
        }
    }

    // If the request is not an AJAX request, redirect to an appropriate page
    $this->redirect(array('action' => 'index'));
}




    

}
?>