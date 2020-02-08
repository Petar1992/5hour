<?php
include "../config.php";
include "register-validation.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['register'])){

    // 1. get user info from POST
    $registerUserDto = getRegisterUserDto();
    // 2. validate user
    $result = validateRegistration($registerUserDto);
    if ($result->isValid()) {
    // save user to db
    addUserToDb($registerUserDto);
    // redirect
    
    } else {
      $errorMessages = $result->getErrorMessages();
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>5 Hour register</title>
</head>
<body>
<div class="container">
  <div class="register-heading">
    <h3 class=>If you are new here, please fill the form below to register.</h3>
  </div>
  <div class="register-form">
  <form action="register.php" method="post">

<?php
if (!empty($errorMessages) && is_array($errorMessages)) {
?>	
  <div class="error-message">
  <?php 
    foreach($errorMessages as $message) {
        echo $message . "<br/>";
    }
  ?>
  </div>
<?php
}
?>
    <div class="field-column">
      <label for="name">Name</label>
      <input type="text" name="name">
    </div>
    <div class="field-column">
    <label for="email">Email</label>
      <input type="text" name="email">
    </div>
    <div class="field-column">
    <label for="password">Password</label>
      <input type="password" name="password">
    </div>
    <div class="field-column">
    <label for="repeat-password">Repeat password</label>
      <input type="repeat-password" name="repeat-password">
    </div>
    <div>
        <input type="submit"
        name="register" value="Register"
        class="btnRegister">
    </div>
  </form>
  </div>
<div>
</body>
</html>