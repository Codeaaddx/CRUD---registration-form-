<?php
ini_set('display_errors', 1); 
session_start();
require 'db.php';
if(isset($_SESSION['email'])){
$email = $_SESSION['email'];

$select = $connection->query("SELECT * FROM `volunteer_form` WHERE email = '$email'") or die('query failed');
if($select->rowCount() > 0){
    $people = $select->fetch(PDO::FETCH_ASSOC);

// $sql = "SELECT * FROM `volunteer_form` WHERE email = '$email'";
// $statement = $connection->prepare($sql);
// $statement->execute([':email' => $email]);
// $people = $statement->fetch(PDO::FETCH_ASSOC);
}
}

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Profile</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>DOB</th>
          <th>Timeslot</th>
          <th>Action</th>
        </tr>
        <?php if(isset($people)):  ?>
       
            
          <tr>
            <td><?php  echo $people['id']; ?> </td>
            <td><?php echo $people['firstname']; ?></td>
            <td><?php echo $people['lastname']; ?></td>
            <td><?php echo $people['email']; ?></td>
            <td><?php echo $people['dob']; ?></td>
            <td><?php echo $people['timeslot']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $people['id']; ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?php echo $people['id']; ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
         
       
        <?php endif; ?>
        
        
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
