<?php
    // Login 
session_start();
if($_SERVER ['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['login_btn'])){
    //CONNECT TO DATABASE
    require('database.php');

    //capture field values in variables
    $email = $_POST['email'];
    $password = $_POST['pass1'];

  $sql = "SELECT * FROM users WHERE custemail='$email' AND custpass=SHA1('$password')";
//run query
$query = mysqli_query($dbcon, $sql);

//checking for query result
if( @mysqli_num_rows($query) == 1 ){

//array with user data
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

//user is authenticated, create session variables
$_SESSION['email'] = $result['custemail'];
$_SESSION['name'] = $result['custname']; 
//$_SESSION['level'] = $result['userlevel'];

//echo $_SESSION['email'];

//exit();

//redirect to home
header('Location: products.php');
return;
}
else{
//user is not authenticated
echo 'Your email or password is incorrect';
}


}
}
?>