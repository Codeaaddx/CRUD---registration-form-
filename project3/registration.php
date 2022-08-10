<?php
require 'db.php';
require 'errors.php';
ini_set('display_errors', 1); 
$message = '';
if (isset ($_POST['firstname'])  || isset($_POST['lastname']) || isset($_POST['email'])  || isset($_POST['dob']) || isset($_POST['timeslot']) || isset($_POST['password'])    ) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $timeslot = $_POST['timeslot'];
  $password = $_POST['password'];
 $hash = password_hash($password, PASSWORD_DEFAULT);
 
  $sql = 'INSERT INTO volunteer_form (firstname, lastname, email, dob, timeslot, password) VALUES(:firstname, :lastname, :email, :dob, :timeslot, :password)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':firstname' => $firstname, ':lastname'=> $lastname,  ':email' => $email, ':dob' => $dob, ':timeslot' => $timeslot, ':password' => $password])) {
    
    header('location:login.php');
  }



}


 ?>
<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Register your profile</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
      
        <div class="form-group">
          <label for="">First Name</label>
          <input type="text" name="firstname" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Last Name</label>
          <input type="text" name="lastname" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="">DOB</label>
          <input type="date" name="dob" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for=""> Timeslot</label> <br>
          <label for=""> 10:00</label>
          <input type="checkbox" name="timeslot" id="name" value = "10:00" class="form-control">
          <label for=""> 11:00</label>
          <input type="checkbox" name="timeslot" id="name" value = "11:00" class="form-control">
          <label for=""> 12:00</label>
          <input type="checkbox" name="timeslot" id="name" value = "12:00" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" id="name" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>