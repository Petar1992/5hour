<?php 

function getRegisterUserDto() {
  $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
  $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
  $email = !empty($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : null;
  $repeatPassword = !empty($_POST['repeat-password']) ? trim($_POST['repeat-password']) : null;
  return new RegisterUserDto($name, $email, $password, $repeatPassword);
}


function validateRegistration($userToValidate){
  $isValid = true;
  $errorMessages = [];

  if($userToValidate->getName() == null && $userToValidate->getName() == ''){
      array_push($errorMessages, "Name can't be empty");
      $isValid = false;
  }
  
  if ($userToValidate->getPassword() == null && $userToValidate->getPassword() == '') {
    array_push($errorMessages, "Password can't be empty");
    $isValid = false;
  }

  if($userToValidate->getEmail() == null && $userToValidate->getEmail() == ''){
    array_push($errorMessages, "Email can't be empty");
    $isValid = false;
  }
  
  // add validation that email is valid
  $email = filter_var($userToValidate->getEmail(), FILTER_SANITIZE_EMAIL);

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errorMessages, "Email is not a valid email address");
    $isValid = false;
  }

  // Check if email is already in use
  $pdo = Database::getInstance();
  $user = $pdo->query("SELECT * FROM users WHERE email='$userToValidate->email'  LIMIT 1")->fetch();
  if($user){
    if($user['email'] === $userToValidate->email){
      array_push($errorMessages, "Email address is already in use.");
      $isValid = false;
    }
    $pdo = null; 
  }

  if ($userToValidate->getRepeatPassword() == null && $userToValidate->getRepeatPassword() == '') {
    array_push($errorMessages, "Repeat password can't be empty");
    $isValid = false;
  }

  if($userToValidate->getPassword() != $userToValidate->getRepeatPassword()) {    
    array_push($errorMessages, "Repeat password must be same as password.");
    $isValid = false;
  }

  return new RegistrationValidationResult( $errorMessages, $isValid );
 
}

function addUserToDb($userToAdd) {

  $pdo = Database::getInstance();
  
  $data = [
    'name' => $userToAdd->name,
    'email' => $userToAdd->email,
    'password' => $userToAdd->password,
    'repeat_password'=>$userToAdd->repeatPassword
  ];
  
  $sql = "INSERT INTO users (name, email, password, repeat_password) VALUES (:name, :email, :password, :repeat_password)";
  
  $stmt = $pdo->prepare($sql);
  
  $stmt->execute($data);
  
}

