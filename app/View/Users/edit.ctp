<!-- edit.ctp (View file) -->
<h1>Edit Information</h1>
<?php
echo $this->Form->create('User',array('type' => 'file'));
echo $this->Form->input('username');
echo $this->Form->input('email');
echo $this->Form->input('name');


echo $this->Form->input('birthday', array(
    'label' => 'Birthdate',
    'type' => 'text',
    'class' => 'datepicker' // Add a CSS class for targeting the input field
));


echo $this->Form->input('gender', array(
    'label' => 'Gender',
    'type' => 'select',
    'options' => array(
        'male' => 'Male',
        'female' => 'Female'
    )
));
echo $this->Form->input('hobby');
echo $this->Form->input('profile_picture', array('type' => 'file'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save User');
?>











<script>
    $(function() {
        // Get the current date
        var currentDate = new Date();
        
        // Calculate the minimum and maximum date
        var minDate = new Date(currentDate.getFullYear() - 10000, 0, 1); // 100 years ago
        var maxDate = currentDate; // Today
        
        // Initialize the datepicker
        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd', // Set the desired date format
            minDate: minDate, // Set the minimum date
            maxDate: maxDate, // Set the maximum date
            changeMonth: true,
            changeYear: true,
            yearRange: 'c-100:c', // Set the year range from 100 years ago to the current year
        });
    });
</script>



