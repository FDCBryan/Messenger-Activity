<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">	
	<!-- Jquerry CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Jquerry CDN  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		//echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	
	<div id="container">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index'));?>">Messenger</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index'));?>">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'index'));?>">Contacts</a>
			        </li>
			        <li class="nav-item dropdown">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            Profile
			          </a>
			          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			            <li><a class="dropdown-item" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'view'));?>">View Profile</a></li>
			            <li><a class="dropdown-item" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit'));?>">Edit Profile </a></li>

			          </ul>
			        </li>
			        <li class="nav-item">
			          <input type="text" id="autocomplete" class = "form-control" placeholder="Search">
			        </li>
			      </ul>
			      <?php if($logged_In):?>
			      	<span style = "color : #000">
			      	Welcome <?php echo $Current_user['username']?>
				    </span>
				      	<?php echo $this->Html->link('Logout', array('controller'=>'users','action' => 'logout'),
						    array('class' => 'btn btn-dark m-2')); 
						?>
			      <?php else:?>
			      		<?php echo $this->Html->link('Login', array('controller'=>'users','action' => 'login'),
						    array('class' => 'btn btn-dark m-2')); 
						?>
						<?php echo $this->Html->link('Register', array('controller'=>'users','action' => 'register'),
						    array('class' => 'btn btn-dark m-2')); 
						?>
			      <?php endif;?>
			    </div>
			  </div>
			</nav>	



		<div id="header">
			<h1><?php //echo $this->Html->link($cakeDescription, 'https://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php /*echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'https://cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);*/
			?>
			<p>
				<?php //echo $cakeVersion; ?>
			</p>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>

	 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

<?php
 $jsonData = json_encode($autocomplete);
 
 $dataArray = json_decode($jsonData, true);

 $usernames = array();
    foreach ($dataArray as $item) {
        $usernames[] = $item['User']['username'];
    }


 ?>
 <script>
 	    // Convert the array to JSON
   
 $(document).ready(function() {

  // Define an array of sample data for autocomplete suggestions
  var data = <?php echo json_encode($usernames) ; ?>;

  // Attach the autocomplete functionality to the textbox
  $("#autocomplete").autocomplete({
    source: data



  });

   // Event handler for the select event
        $("#autocomplete").on("autocompleteselect", function(event, ui) {
            var selectedValue = ui.item.value;


             var baseUrl = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'profile')); ?>";
        	var url = baseUrl + (baseUrl.endsWith('/') ? '' : '/') + encodeURIComponent(selectedValue);
            window.location.href = decodeURIComponent(url);
            // Perform your desired action here
            // For example, submit a form, make an AJAX request, etc.
        });


});




</script>   
</body>
</html>
