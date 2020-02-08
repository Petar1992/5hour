<?php


  class RegistrationValidationResult {

    private $error_messages;
    private $isValid;
   
    function __construct( $error_messages, $isValid ) {
      $this->error_messages = $error_messages;
      $this->isValid = $isValid;
    }
   
    function getErrorMessages() {
      return $this->error_messages;
    }
   
    function isValid() {
      return $this->isValid;
    }
  }