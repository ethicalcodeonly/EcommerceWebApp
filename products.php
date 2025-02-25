<?php


require('database.php');

session_start();
include('proheader.php');   
//check for session variable, else redirect to login page
if ( !isset($_SESSION ['email'])){
    //redirect to login page
    header('Location: account.php');
    return;
}
?>

<center><h1>PRODUCTS</h1> </center>
                <!--- search bar -->
        <div class="row">
                <div class="col-3">
                    <form method="post" action="products.php">
                    <input type="search" name="prod-srch" placeholder="Search....." >
                    <button   type="submit" class="btn">Search</button>
                     </form>
         </div>

         <div class="row">
             <?php

//If search Value has been posted and if search strong is not empty
if(isset($_POST['prod-srch']) && $_POST['prod-srch'] !== ''){
//capture search value in variable
$searchval = $_POST['prod-srch'];

//search sql statement and query
$searchsql = "SELECT * FROM items WHERE itemname LIKE '%$searchval%' ";
$searchquery = mysqli_query($dbcon, $searchsql);

//IF no results are found
if(mysqli_num_rows($searchquery) == 0){
    echo 'No results found for '.$searchval.'';
}  
else{
//create loop for search results
while($result = mysqli_fetch_array($searchquery, MYSQLI_ASSOC)){
//create variables for each DB field in result array
$id = $result['itemid'];
$name = $result['name'];
$description = $result['description'];
$price = $result['price'];
$image = $result['image'];
$quantity = $result['quantity'];



//display search results
?>
<div class="row">
<div class="col-3"> 
                         <img src="<?php echo $image;?>">
                        
                            <div class="rating">                                <!--Star icon Start-->
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>        
                            <h4><?php echo $name; ?></h4>
                            <div> <p> <?php echo $description;?> </p>
                            </div>           
                                                               
                            <p>Price: $<?php echo $price;?></p> <a href="details.php?prod=<?php echo $id; ?>"class= "btn">See more detials &#x21a3;</a>  
                            
                            </div>
</div>
    
<?php         
} //closes result loop      
} //closes result else  
} //closes search condition
    //run query on items     
    $itemsql = "SELECT * FROM items";
    $itemquery = mysqli_query($dbcon, $itemsql);
    //if query runs successfully
    if($itemquery){
        //loop query results to cycle each item record
        while ($record = mysqli_fetch_array($itemquery, MYSQLI_ASSOC))
{
    //create variables for each DB field in result array
    $id = $record['itemid'];
    $name = $record['itemname'];
    $description = $record['itemdescription'];
    $price = $record['itemprice'];
    $image = $record['itemimage'];
    $quantity = $record['itemquantity'];

?>
<div class="col-3"> 
                         <img src="<?php echo $image;?>">
                        
                            <div class="rating">                                <!--Star icon Start-->
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </div>        
                            <h4><?php echo $name; ?></h4>
                            <div> <p> <?php echo $description;?> </p>
                            </div>           
                                                               
                            <p>Price: $<?php echo $price;?></p> <a href="details.php?prod=<?php echo $id; ?>"class= "btn">See more detials &#x21a3;</a>  
                            
                            </div>
<?php         
?>
<?php
    }
}

?>
