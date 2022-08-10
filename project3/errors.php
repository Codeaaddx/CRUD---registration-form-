<?php 
ini_set('display_errors', 1); 
global $errors;
if(is_countable($errors) && count($errors) > 0):   ?>

<div>
    <?php foreach($errors as $error):  ?>

  <p> <?php echo $error; ?>  </p>

  <?php endforeach ?>

</div>

<?php endif ?>

<?php 


if (isset($_POST['submit'])){
    
    if(empty($email) || empty($password) || empty($dob) || empty($timeslot) || empty($password) ){
        echo "First name, Email, Dob, timeslot & password are all required fields";
    }
}

if (isset($_POST['login'])){
    
    
       
        if(empty($email) || empty($password) ) {echo "Both Email & Password are required";}
        
        }   

?>
