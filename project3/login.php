
<?php 

session_start();
ini_set('display_errors', 1); 

?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Please LogIn</h2>
    </div>

<form action="login_query.php" method="post">
  <!-- Email input -->
  <div class="form-outline mb-8">
    <input type="email" name ="email" id="form2Example1" class="form-control" />
    <label  class="form-label" for="form2Example1" >Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-8">
    <input type="password" name="password" id="form2Example2" class="form-control" />
    <label  class="form-label" for="form2Example2" >Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-8">
    <div class="col d-flex justify-content-center">
    
  <button name ="login" class="btn btn-primary btn-block mb-8">Sign in</button>

</div>
</div>
<a href="registration.php">Registration</a>
 
<!-- </form> -->
<?php require 'footer.php'; ?>