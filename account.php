<?php
//REGIStration
//if form is posted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //connect to database
    require('database.php');

    if (isset($_POST['signup_submit'])) {


        //store error
        $errors = array();
        //check for fullname
        if (empty($_POST['fullname'])) {
            $error[] = 'Please check your name';
        } else {
            $fullname = mysqli_real_escape_string($dbcon, trim($_POST['fullname']));
        }

        //check for email
        if (empty($_POST['email'])) {
            $error[] = 'Please check your email';
        } else {
            $email = mysqli_real_escape_string($dbcon, trim($_POST['email']));
        }

        //check for password
        if (empty($_POST['pass1'])) {
            $error[] = 'Please check your password';
        } else {
            //checking if password field match
            if ($_POST['pass1'] != $_POST['pass2']) {
                $error[] = 'please check your password';
            } else {
                $password = mysqli_real_escape_string($dbcon, trim($_POST['pass1']));
            }
        }

        if (empty($error)) {
            //enter data into database
            $sql = "INSERT INTO users(custname, custemail, custpass) VALUES ('$fullname', '$email', SHA1('$password'))";
            //echo $sql;
            //exit();
            $query = mysqli_query($dbcon, $sql);

            if ($query) {
                echo 'Registration successful';
            } else {
                echo'Something went wrong';
            }
        } else {
            echo "unalbe to register";
        }
    }
}


$title = "Login";
include 'proheader.php';
?>



<!---- account page --->
<div class="account-page">
    <div class="container">
        <div class="row"> 
            <div class="col-2">
                <img src="images/image1.png" width="100%">
            </div>

            <div class="col-2">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicator">
                    </div>
                    <form id="LoginForm" method="post" action="login_action.php">
                        <input type="text" name="email" class= "form-control" placeholder="Enter email address" value="" required="required" />
                        <input type="password" class= "form-control" name="pass1" placeholder="Enter password" value=""   required="required"  />
                        <button name="login_btn" type="submit" class="btn">Login</button>
                        <a href=" ">Forgot password</a>
                    </form>


                    <form id="RegForm" action="account.php" method="post">
                        <!--- fullname ---->
                        <input type="text" class="form-control" name="fullname" placeholder="Enter full name" value=""  required="required" />
                        <!----  Enter email--->
                        <input type="text" name="email" class= "form-control" placeholder="E-mail" value="" required="required" />
                        <!---- Enter password --->
                        <input type="password" class= "form-control" name="pass1" placeholder="Password" value=""   required="required"  /> 
                        <!----Confirm pass --->
                        <input type="password" class= "form-control" name="pass2" placeholder="Retype password" value="" required="required"  />

                        <input type="submit" name="signup_submit" value="Sign up" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include ('footer.html');
?>  
