<!-- app/View/Messages/posts.ctp -->
<!-- Include the necessary HTML elements -->
<?php
// Get the current URL
$currentUrl = $this->request->here;

// Split the URL into segments based on "/"
$urlSegments = explode('/', $currentUrl);

// Get the last segment
$lastSegment = end($urlSegments);

?>





<div id="data-container" style="height: 300px; border: solid; overflow-y: auto;" class="row"></div>
<div class="chatbox__input">
        <?php echo $this->Form->create('Message', array('id' => 'myForm')); ?>
        <?php echo $this->Form->input('message',array('class' => 'form-control','id' => 'textbox')); ?>
        <!-- Submit button -->
        <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-success')); ?>
      <?php echo $this->Form->end(); ?>

      </div>
<!-- Place the JavaScript code within a script tag -->
<script>
  $(document).ready(function() {

    // Fetching JSON data
    $.getJSON('<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'getMessages',$to)); ?>', function(data) {
      // Manipulating JSON data
      displayData(data);
    });
  
    //-----------------------------------------replying on chat

    $('#myForm').submit(function(event) {

// Prevent the default form submission
event.preventDefault();

// Serialize form data
var formData = $(this).serialize();
//var parentDiv = $('.chatbox__messages');
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
    var newChild = '<div class="text-end alert alert-success fs-5"><img src = "../../img/uploads/'+ datares.image +'" width = "50px"><div class="message__content">' + datares.message + '</div><div class="message__timestamp">' + datares.created + ' </div></div>';
    $("#data-container").append(newChild);
    },
    error: function(xhr, status, error) {
        // Handle the error scenario
        alert('Form submission failed: ' + error);
        // Additional code for error scenario
    }
});
});
  
 // Displaying JSON data with infinite scrolling
 function displayData(data) {
    var $container = $('#data-container');
    var rowsPerPage = 5;
    var currentPage = 1;
    var totalRows = data.length;
    var displayedRows = 0;
    var loadingData = false; // Flag to prevent multiple requests

    function generateCards() {
      // Check if already loading data
      if (loadingData) {
        return;
      }
      loadingData = true;

      // Add a delay of 1 second (1000 milliseconds) before loading the next page of cards
      setTimeout(function() {
        // Create cards
        var start = displayedRows;
        var end = displayedRows + rowsPerPage;
        var currentPageData = data.slice(start, end);
        for (var i = 0; i < currentPageData.length; i++) {
          var $card = $('<div class="col-md-12 mb-4" id = "card'+currentPageData[i].Message.id+'">');
          $card.append('<div class="card">');
          $card.append('<button class = "btn btn-danger delete" data-id="'+ currentPageData[i].Message.id +'">delete</button>');
          $card.append('<div class="card-body">');
          if(currentPageData[i].ExtraData === currentPageData[i].User.id){
            $card.append('<img src = "../../img/uploads/' + currentPageData[i].User.profile_picture + '" width = "50px" >');
          }else{
            $card.append('<img src = "../../img/uploads/' + currentPageData[i].Recipient.profile_picture + '" width = "50px" >');
          }
          
          $card.append('<p class="card-text"> Sender :' + currentPageData[i].User.username + '</p>');
          $card.append('<p class="card-text"> Reciever :' + currentPageData[i].Recipient.username + '</p>');
          $card.append('<h5 class="card-title"> Message :' + currentPageData[i].Message.message + '</h5>');
          $card.append('</div>');
          $card.append('</div>');
          if(currentPageData[i].ExtraData === currentPageData[i].User.id){
            $card.addClass('text-end alert alert-success fs-5');
          }else{
            $card.addClass('alert alert-success fs-5');
          }
          if (i ===0){
            $card.addClass('first');

          }


          $container.prepend($card);
          displayedRows++;
        }

        // Reset loading flag
        loadingData = false;

        // Remove the "Load More" button
        $container.find('#load-more-button').remove();

        // Append the "Load More" button if there are remaining rows
        if (displayedRows < totalRows) {
          var $loadMoreButton = $('<button class="btn btn-primary mt-4" id="load-more-button">Load More</button>');
          $loadMoreButton.click(generateCards);
          $container.prepend($loadMoreButton);
        }
      }, 1000); // 1000 milliseconds = 1 second
    }

    // Generate the initial set of cards
    generateCards();

  } 
   
  



  $('#data-container').on('click', '.delete', function() {
    var messageid = $(this).attr('data-id');
    var confirmation = confirm('Are you sure you want to delete this message ' + messageid + '?');
    
    if (confirmation) {
      // Send an AJAX request to delete the message
      $.ajax({
        type: 'POST',
        url: '<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'delete')); ?>',  // Replace with the appropriate URL
        data: { messageID: messageid },
        success: function(response) {
          // Handle the success response
          alert('Message deleted successfully');
          // Additional code for success scenario
          $('#card'+messageid).fadeOut(1000)
        },
        error: function(xhr, status, error) {
          // Handle the error scenario
          alert('Failed to delete the message: ' + error);
          // Additional code for error scenario
        }
      });
    }
  });
  });

  


 
  

 

</script>
