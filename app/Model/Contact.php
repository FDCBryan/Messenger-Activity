<?php
class Contact extends AppModel {

	    public $validate = array(
        'contact_number' => array(
            'rule' => 'notBlank'
        ),
        'contact_name' => array(
            'rule' => 'notBlank'
        )
    );
}
?>