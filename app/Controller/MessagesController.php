<?php
class MessagesController extends AppController {
   public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash','RequestHandler');

   public $uses = array('User');




   
public function getMessages($to) {
    $this->autoRender = false; // Disable rendering of the view template
    
    // Logic to retrieve the posts data from the database
    $currentUser = $this->Auth->user();
    $messages = $this->Message->find('all', array(
        'joins' => array(
            array(
                'table' => 'users',
                'alias' => 'User',
                'type' => 'INNER',
                'conditions' => array(
                    'Message.fromId = User.id'
                )
            ),
            array(
                'table' => 'users',
                'alias' => 'Recipient',
                'type' => 'INNER',
                'conditions' => array(
                    'Message.toId = Recipient.id'
                )
            )
        ),
        'fields' => array('User.username','User.id','User.profile_picture', 'Recipient.username','Recipient.id','Recipient.profile_picture', 'Message.message', 'Message.id'),
        'conditions' => array(
            'OR' => array(
                array(
                    'Message.fromId' => $to,
                    'Message.toId' => $currentUser['id']
                ),
                array(
                    'Message.fromId' => $currentUser['id'],
                    'Message.toId' => $to
                )
            )
        ),
        'order' => array('Message.id DESC')
    ));

    // Add an extra variable to each message
foreach ($messages as &$message) {
    $message['ExtraData'] = $to;
}
unset($message); // unset reference to avoid unexpected behavior
    

    // Set the response content type to JSON
    $this->response->type('json');
    
    // Convert the posts data to JSON format
    $jsonData = json_encode($messages);
    
    // Set the response body with the JSON data
    $this->response->body($jsonData);
    
    // Return the response
    return $this->response;
}



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

            

            $image = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $currentUser['id']
                )
            ));

            $response = array(
                'image' => $image['User']['profile_picture'],
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



public function messages($to) {
    $this->set('to', $to);
}




  public function delete() {
    $data = $this->request->data;
    

    if ($this->Message->delete($data['messageID'])) {
        // Assuming the delete operation was successful, you can send a response indicating success
      $response = ['status' => 'success', 'message' => 'Message deleted successfully'];
      echo json_encode($response);
      exit;
    } else {
      // If the request is not a POST request, or if the delete operation fails, you can send an error response
    $response = ['status' => 'error', 'message' => $messageId];
    echo json_encode($response);
    exit;
    }
    
    
  }

}
?>