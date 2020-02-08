<?php 
  
   class RegisterUserDto { 
    public $name;
    public $email;
    public $password;
    public $repeatPassword;
   
    function __construct( $name, $email, $password, $repeatPassword ) {
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->repeatPassword = $repeatPassword;
    }
   
    function getName() {
      return $this->name;
    }
   
    function getEmail() {
      return $this->email;
    }

    function getPassword() {
      return $this->password;
    } 
    
    function getRepeatPassword() {
      return $this->repeatPassword;
    }    
   }