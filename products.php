<?php
session_start()
?>

<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
              
            $sql_s="SELECT * FROM products 
                WHERE inventoryID={$id}"; 
            $query_s=mysql_query($sql_s); 
            if(mysql_num_rows($query_s)!=0){ 
                $row_s=mysql_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['inventoryID']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    ); 
                  
                  
            }else{ 
                  
                $message="This product does no exist!"; 
                  
            } 
              
        } 
          
    } 
  
?> 
    <h1>Available to rent now!</h1> 
    <?php 
        if(isset($message)){ 
            echo "<h2>$message</h2>"; 
        } 
    ?> 
    <table> 
        <tr> 
            <th>Name</th> 
            <th>Description</th> 
            <th>Price</th> 
            <th>Action</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM inventory ORDER BY name ASC"; 
            $query=mysql_query($sql); 
              
            while ($row=mysql_fetch_array($query)) { 
                  
        ?> 
            <tr> 
                <td><?php echo $row['iName'] ?></td> 
                <td><?php echo $row['iDescription'] ?></td> 
                <td><?php echo $row['releaseDate'] ?></td> 
                <td><?php echo $row['price'] ?>$</td> 
                <td><a href="index_cart.php?page=products&action=add&id=<?php echo $row['inventoryID'] ?>">Add to cart</a></td> 
            </tr> 
        <?php 
                  
            } 
          
        ?> 
          
    </table>

 <?php functionFooter(); ?>
