<?php

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
