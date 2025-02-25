<?php
include ('proheader.php');

session_start();
if(!isset($_SESSION['email'])){
    header('Location: account.php');
 return;
}

//check if parameter is present and capture parameter
if(isset($_REQUEST['prod'])){
$parameter = $_REQUEST['prod'];
}
else{
    echo "no parameter found";
}


/*echo '<center> <h1>PRODUCTS</h1> </center>
<div class="row">
 <div class="col-8>';*/
 
 
 require('database.php');
// run query on items
$itemsql = "SELECT * FROM items WHERE itemid=$parameter";


$itemquery = mysqli_query($dbcon, $itemsql);
$results = mysqli_fetch_array($itemquery) or die();



 if ($results) {

    $id = $results['itemid'];
    $name = $results['itemname'];
    $description = $results['itemdescription'];
    $price = $results['itemprice'];
    $image = $results['itemimage'];
    $quantity = $results['itemquantity'];
    $image1 = $results['image1'];
    $image2 = $results['image2'];
    $image3 = $results['image3'];
    $image4 = $results['image4'];
    $category = $results['category']

    



    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <!---linking style sheet-->
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/f464584d6f.js"></script>    
    <!---Poppins-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,700&display=swap" rel="stylesheet">
    <title>All Products - Kickz</title>
</head>
<div class="small-container single-product ">
                    <div class="row">
                        <div class="col-2">
                            <img src="<?php echo $image; ?>"width="100%" id="ProductImg" >
                                <div class="small-img-row">
                                    <div class="small-img-col">
                                        <img src="<?php echo $image1; ?>" class="small-img">
                                    </div>
                                    <div class="small-img-col">
                                        <img src="<?php echo $image2; ?>"class="small-img">
                                    </div>
                                    <div class="small-img-col">
                                        <img src="<?php echo $image3; ?>"class="small-img">
                                    </div>
                                    <div class="small-img-col">
                                        <img src="<?php echo $image4; ?>"class="small-img">
                                    </div>
                                </div>

                            
                        </div>
                        <div class="col-2">
                            <p><?php echo $category;?></p>
                            <h1><?php echo $name; ?></h1>
                            <h4>Price: $<?php echo $price;?></h4>
                            <select>
                                <option>8 US</option>
                                <option>8.5 US</option>
                                <option>9 US</option>
                                <option>9.5 US</option>
                                <option>10 US</option>
                            </select>
                            <input type="number" value="1">
                            <a href="" class="btn">Add To Cart</a>
                            <h3>Product Details <i class="fa fa-indent"></i></h3>

                            <br>

                            <p><?php echo $description;?></p>
                        </div>
                    </div>
                </div>
                  




<?php

 }

else{

};

?>
<?php
   include ('footer.html');
 ?>      
 
<!--Javascript for product images-->
                             <script>
                                 var ProductImg = document.getElementById("ProductImg");
                                 var SmallImg = document.getElementsByClassName("small-img");
                                
                                SmallImg[0].onclick = function(){
                                    ProductImg.src = SmallImg[0].src;
                                }

                                SmallImg[1].onclick = function(){
                                    ProductImg.src = SmallImg[1].src;
                                }

                                SmallImg[2].onclick = function(){
                                    ProductImg.src = SmallImg[2].src;
                                }

                                SmallImg[3].onclick = function(){
                                    ProductImg.src = SmallImg[3].src;
                                }

                             </script>
</body>
</html>

        





