<?php

  require_once "config.php";
  
  $default_page = isset($_GET['page']) ? $_GET['page'] : "index";

  $pages = [
    "index" => "index.php",
    "signin" => "pages/sign-in.php",
    "register" => "pages/register.php",
    "search_form" => "pages/search.php",
    "serach_results" => "pages/search_results.php"
  ];

  

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>5 hour test</title>
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

  <h1>Welcome to 5 hour test.</h1>
  <p>To continue, please <a href="?page=signin">sign in.</a></p>
  <p>Or if you are new, please <a href="?page=register">register.</a></p>





</body>
</html>