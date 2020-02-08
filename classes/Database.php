<?php


class Database {  
  private static $conn = null;

  public static function getInstance(){
    if(!isset(self::$conn)){
      try{
        self::$conn = new PDO("mysql:host=".DB_HOST.";dbname=" . DB_NAME , DB_USER , DB_PASS);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$conn;
      }
      catch(PDOExeption $e){
        echo "Connection failed: " . $e->getMessage();
        die();
      }
      }
    }
  }