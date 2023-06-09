<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Contact</h1>
<?php
echo $this->Form->create('Contact');
echo $this->Form->input('contact_name');
echo $this->Form->input('contact_number');
echo $this->Form->end('Save Post');
?>