<?php

class User extends AppModel {
    
    public $name = 'User';


    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Username is required'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Username is already taken'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Password is required'
            )
        ),'Confirm_password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'Confirm password required'
            ),
            'unique' => array(
                'rule' => 'confirmPassword',
                'message' => 'password did not match'
            )
        )
    );


public function confirmPassword($data) {
    return $this->data[$this->alias]['Confirm_password'] === $this->data[$this->alias]['password'];
}


public function beforeSave($options = array()) {
    if (isset($this->data['User']['password'])) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    }
    return true;
} 
}
