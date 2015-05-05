 <?php 
  
    if(isset($_POST['submit'])){ 
          
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
          
    } 
  
?> 
  
<h1>View cart</h1> 
<a href="index_cart.php?page=products">Go back to available titles!</a> 
<form method="post" action="index_cart.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Name</th> 
            <th>Name</th>
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Total</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM inventory WHERE inventoryID IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY iName ASC"; 
                    $query=mysql_query($sql); 
                    $totalprice=0; 
                    while($row=mysql_fetch_array($query)){ 
                        $subtotal=$_SESSION['cart'][$row['inventoryID']]['quantity']*$row['price']; 
                        $totalprice+=$subtotal; 
                    ?> 
                        <tr> 
                            <td><?php echo $row['iName'] ?></td> 
                            <td><input type="text" name="quantity[<?php echo $row['inventoryID'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['inventoryID']]['quantity'] ?>" /></td> 
                            <td><?php echo $row['price'] ?>$</td> 
                            <td><?php echo $_SESSION['cart'][$row['inventoryID']]['quantity']*$row['price'] ?>$</td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
                    <tr> 
                        <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button> 
</form> 
<br /> 
<p>To reset, set quantity to zero.</p>