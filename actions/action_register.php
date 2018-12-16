<?php

  include_once('../database/dbUsers.php');
  include_once('../includes/session.php');


    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conf = $_POST['conf'];
    $age = $_POST['age'];

    if ( !preg_match ("/^[a-zA-Z0-9]+$/", $name)) {
      die(header('Location: ../pages/register.php'));
    }

    
    if($name == "" || $name == null){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'username field must not be empty');
        die(header('Location: ../pages/register.php'));
    }
    else if($pass != $conf || $pass == null  || $pass = ""){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'the value of password is different');
        die(header('Location: ../pages/register.php'));
    }

    else{
      if(!checkUser($name)){

        $insert = insertUser($name,$pass,$email,$age);
         
        if($insert){
          $_SESSION['username'] = $name;
          $_SESSION['messages'] = null;
          }else{
          $_SESSION['messages'] = 'Failed to signup!';
        }
        header('Location: ../pages/home.php');
 
      }
      else{
        $_SESSION['messages'] = 'That username already exists';
        die(header('Location: ../pages/register.php'));
      }
    }

?>