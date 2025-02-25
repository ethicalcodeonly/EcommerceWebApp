
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <!---linking style sheet-->
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/f464584d6f.js"></script>    
    <!---Poppins-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,700&display=swap" rel="stylesheet">
    <title>Kickz</title>
</head>
<body> 
<link rel="stylesheet" href="about.css"> 

    <div class="header">                    <!--Header Start-->
    <!---Nav Bar-->
    <div class="container">                 <!---container start-->
    <div class="navbar">
       <div class="logo">
         <a href="index.php"><img src="images/logo.png" width="125px"> </a>
       </div>
       <nav>
           <ul id="MenuItems">
               <li><a href="index.php">Home</a></li>
               <li><a href="products.php">Products</a></li>
               <li><a href="about.php">About</a></li>
               <li><a href="">Contact</a></li>
               <li><a href="account.php">Account</a></li>
               <?php
               if( isset($_SESSION ['email'])){
               ?>
               <li><a href="logout.php">Logout</a></li>
               <?php
               }
               ?>  
           </ul>
       </nav>
     <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>  <!--- cart icon-->
       <img src="images/menu.png" width="30px" class="menu-icon"onclick="menutoggle()" > <!--menu icon-->
    </div>
    <div class="row">                      <!--row start-->
        <div class="col-2">             <!---col(1) start-->
            <h1>Footwear to last you a life time</h1>
                                        <!----Intro text Start-->
            <p>Bring power to your steps.<br> Your feet will never look the same again.
          <br>Give your feet the beauty treatment that only brand new shoes can give.</p>
          <a href=""class= "btn">Explore Now &#x21a3;</a>    <!--- creating a btn -->
                                        <!----Intro text End-->
       </div>        
                                         <!--col(1) end-->
        <div class="col-2">             <!---col(2) start-->
            <img src="images/image1.png"> 
        </div>                           <!---col(2) start-->
    </div>                               <!-- row end -->
</div>                                      <!---container end ---> 
     <!---Heder End--> 