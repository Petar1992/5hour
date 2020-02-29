<?php

	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
  define("DB_NAME", "5hour");
  define("DB_PORT", "3306");
  
  spl_autoload_register(function($className) {
    require_once "classes/" . $className . ".php";
  });
?>