<?php
// Get the current URL
$currentUrl = $this->request->here;

// Split the URL into segments based on "/"
$urlSegments = explode('/', $currentUrl);

// Get the last segment
$lastSegment = end($urlSegments);

?>




<img src = "..\..\img\uploads\<?php echo $otherusers['0']['User']['profile_picture'] ?>" alt ="profile-pic-<?php echo $otherusers['0']['User']['username'] ?>" width = "50px"><span class = "fs-3"><?php echo $otherusers['0']['User']['username'] ?></span>
<div class="chatbox">
  <div class="chatbox__messages overflow-auto" style = "height:500px">
<?php 
foreach ($messages as $message): 

    
?>
<div class="
            <?php
            if ($Current_user['id'] != $message['Message']['fromId']):
            ?>
             alert alert-primary fs-5
            <?php
            else:
            ?>
            text-end alert alert-success fs-5
            <?php
            endif; 
            ?>">



            <!-- add profile picture -->
            <?php
            if ($Current_user['id'] != $message['Message']['fromId']):
            ?>
            <img src = "..\..\img\uploads\<?php echo $otherusers['0']['User']['profile_picture'] ?>" alt ="profile-pic- <?php echo $otherusers['0']['User']['username'] ?>" width = "50px">
            <?php
            else:
            ?>
            <img src = "..\..\img\uploads\<?php echo $Current_user['profile_picture']?>" alt ="profile-pic-<?php echo $otherusers['0']['User']['username'] ?>" width = "50px">
            <?php
            endif; 
            ?>



      <div class="message__content"><?php echo $message['Message']['message']; ?></div>
      <div class="message__timestamp"><?php echo $message['Message']['created']; ?></div>
    </div>
<?php 

    
endforeach; ?>









</div>

      <div class="chatbox__input">
        <?php echo $this->Form->create('Message', array('id' => 'myForm')); ?>
        <?php echo $this->Form->input('message',array('class' => 'form-control','id' => 'textbox')); ?>
        <!-- Submit button -->
        <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-success')); ?>
      <?php echo $this->Form->end(); ?>

      </div>
</div>

<div id="parentElement">
  <p>This is the parent element.</p>
</div>

<script>
$(document).ready(function() {
    $('#myForm').submit(function(event) {

        // Prevent the default form submission
        event.preventDefault();

        // Serialize form data
        var formData = $(this).serialize();
        var parentDiv = $('.chatbox__messages');
        //custom data
        var customData = {
                toId: <?php echo $lastSegment?>,
                message: $('#textbox').val()
            };

        var requestData = $.extend(formData, customData);
        // Send an AJAX request to the server
        $.ajax({
            type: 'POST',
            url: '<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'submit')); ?>',
            data: requestData,
            success: function(response) {
            $('#textbox').val("");
            var datares = $.parseJSON(response);
            var newChild = '<div class="text-end alert alert-success fs-5"><div class="message__content">' + datares.message + '</div><div class="message__timestamp">' + datares.created + ' </div></div>';
            parentDiv.append(newChild);
            },
            error: function(xhr, status, error) {
                // Handle the error scenario
                alert('Form submission failed: ' + error);
                // Additional code for error scenario
            }
        });
    });


$('#myButton').click(function() {
            // Display an alert when the button is clicked
            alert('Button clicked!');
        });

});
</script>