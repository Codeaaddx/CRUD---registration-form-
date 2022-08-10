<?php
session_start();
ini_set('display_errors', 1); 
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM volunteer_form WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_ASSOC);
if (isset ($_POST['firstname'])  && isset($_POST['email']) ) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $timeslot = $_POST['timeslot'];
 $hash = password_hash($password, PASSWORD_DEFAULT);
 $password = $_POST['password'];
  $sql = 'UPDATE volunteer_form SET firstname=:firstname, lastname=:lastname, email=:email, dob=:dob, timeslot=:timeslot, password=:password    WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':dob' => $dob, ':timeslot' => $timeslot, ':password' => $password, ':id' => $id])) {
    header("Location: profile.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Volunteer Info</h2>
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
          <input value="<?php  echo $person['firstname']; ?> " type="text" name="firstname" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Last Name</label>
          <input value="<?php  echo $person['lastname']; ?>" type="text" name="lastname" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?php  echo $person['email']; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="">DOB</label>
          <input type="date" value="<?php  echo $person['dob']; ?>" name="dob" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Timeslot</label>
          <input type="text" value="<?php  echo $person['timeslot']; ?>" name="timeslot" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Password</label>
          <input type="password" value="<?php  echo $person['password']; ?>" name="password" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>