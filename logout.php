<?php
# LOG OUT PAGE.

// Access session.
session_start() ;

 // Redirect if not logged in.
 if ( !isset($_SESSION ['email'])){
    //redirect to login page
    header('Location: account.php');
    return;
}

// Clear existing variables.
$_SESSION = array() ;

// Destroy the session.
session_destroy() ;


//redirect to home
header('Location: account.php');
return;

?>

