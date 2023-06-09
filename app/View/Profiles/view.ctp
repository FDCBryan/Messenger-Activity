   <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Profile</h5>
                        <img src="..\..\img\uploads\<?php echo $viewuser[0]['User']['profile_picture'] ?>" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                        <h6 class="card-subtitle mb-2 text-muted">Alias : <?php echo $viewuser[0]['User']['username'] ?></h6>
                        <p class="card-text">Name : <?php echo $viewuser[0]['User']['name'] ?></p>
                        <p class="card-text">Gender : <?php echo $viewuser[0]['User']['gender'] ?></p>
                        <p class="card-text">Birthday : <?php echo $viewuser[0]['User']['birthday'] ?></p>
                        <p class="card-text">Hobby:<br><?php echo $viewuser[0]['User']['hobby'] ?></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Email:</strong> <?php echo $viewuser[0]['User']['email'] ?></li>
                        </ul>
                        <?php
                        echo $this->Html->link(
                                    'Message', array('controller' => 'messages','action' => 'index', $viewuser[0]['User']['id'])
                                );
						?>	 
                       
                    </div>
                </div>
            </div>
        </div>
    </div>