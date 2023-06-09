<!-- File: /app/View/Users/register.ctp -->
<div class = "container ">

<div class = "col-lg-6 mx-auto"">
<h1>Login</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end('Login');
?>
</div>
</div>
