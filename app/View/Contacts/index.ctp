<div class = "row">
<?php 
foreach ($otherusers as $otheruser): 

    if ($Current_user['id'] != $otheruser['User']['id']):
?>


                <div class="card col-xl-2 card col-lg-1 col-sm-4" col-md-4">
                <img src="img\uploads\<?php echo $otheruser['User']['profile_picture']; ?>" class="card-img-top rounded-circle" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"> <?php echo $otheruser['User']['username']; ?></h5>
                    <p class="card-text"> <?php echo $otheruser['User']['email']; ?></p>
                    <p class="card-text"> <?php echo $otheruser['User']['name'] ?></p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php
                                echo $this->Html->link(
                                    'Message', array('controller' => 'messages','action' => 'messages', $otheruser['User']['id'])
                                );
                            ?></li>
                   <li class="list-group-item"><?php
                                echo $this->Html->link(
                                    'View', array('controller' => 'profiles','action' => 'view', $otheruser['User']['id'])
                                );
                            ?></li>         
                  </ul>
                </div>
<?php 

    endif; 
endforeach; ?>
  </div>  




