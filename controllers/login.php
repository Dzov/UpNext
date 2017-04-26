<?php 
session_start(); 

// User authentification

function login() {
  require 'model/dbAccess.php'; 

  if(!isset($_SESSION['username'])) {
    $loggedIn = "loggedOut"; 

    if(isset($_POST['submit'])) {
      $users = $bdd->query('SELECT * FROM t_users'); 

      while($user = $users->fetch()) {
      // If user exists in db, start session
        if($user['username'] == $_POST['username'] && $user['pwd'] == $_POST['pwd']) {
          $_SESSION['username'] = $_POST['username']; 
          $_SESSION['password'] = sha1($_POST['password']);

        // Checks whether user is an admin
          if($user['admin'] == 1) {
            $_SESSION['admin'] = true ; 
          } else {
            $_SESSION['admin'] = false ; 
          }
        } 
      }
      return $loggedIn; 
    }
    $users->closeCursor(); 
  }
}

function adminPanel() {

  if($_SESSION['admin'] == true) {
    require "views/adminShowCard.php"; 
  } else {
    require "views/showCard.php";
  }
}

function headerLog() {

  if(isset($_SESSION['username'])) {
    return "<div class='flex justifyBetween'><p class='selfCenter'>Welcome, " . ucfirst($_SESSION['username']) . "</p><p><a href='controllers/logout.php'>Log Out</a></div>";  
  } else {
    return "<p class='selfCenter'>Log In</p>"; 
  }
}

?>