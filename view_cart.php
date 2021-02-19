<?php
session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset = "utf-8">
        <title>NIKE PRELOVED STORE</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="images/nike.png" rel="icon" type="image/png">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/v4-shims.css">

    </head>

    <body>
        
        <!--navigation-->
                <div class="container">
                        <nav>
                                
                                <input type="checkbox" id="nav" class="hidden">
                                <label for="nav" class="nav-btn">
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                </label>
                                
                                <div class="nav-wrapper">
                                    <ul>
                                        <li><a href="index.html">HOME</a></li>
                                        <li><a href="products.php">PRODUCTS</a></li>
                                        <li><a href="contact.html">CONTACT</a></li>
                                        <li><a href="view_cart.php"><i class="fas fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>

                                
                            </nav>
                </div>
        
    <div id="whole">

        <br/>
        <div class="container">

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <?php
                    if(isset($_SESSION['message']))
                    {
                    ?>
                        <div class="alert alert-info text-center">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    }

                    ?>

                    <form method="POST" action="save_cart.php">
                        <h1>Order List</h1>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </thead>
                            <tbody>
                                <?php $total=0;
                                if(!empty($_SESSION['cart']))
                                {
                                    //connection
                                    $conn = new mysqli('localhost', 'root', '', 'nikestore');
                                    //create array of initial qty which is 1
                                    $index = 0;
                                        if(!isset($_SESSION['qty_array']))
                                        {
                                            $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                                        }
                                    $sql = "SELECT * FROM products WHERE id IN (".implode(',',$_SESSION['cart']).")";
                                    $query = $conn->query($sql);
                                    while($row = $query->fetch_assoc())
                                    {
                                ?>
                                        <tr>

                                            <td>
                                                <a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </td>

                                            <td><?php echo $row['name']; ?></td>

                                            <td>$ <?php echo number_format($row['price'], 2); ?></td>

                                            <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">

                                            <td>
                                                <input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>">
                                            </td>

                                            <td>
                                                $ <?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?>
                                            </td>

                                            <?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?>

                                        </tr>
                                <?php
                                $index ++;
                                    }
                                }
                                else
                                {
                                ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No Item in Cart</td>
                                    </tr>
                                <?php
                                }
                                ?>

                                <tr>

                                    <td colspan="4" align="right"><b>Total</b></td>
                                     <td><b>$ <?php echo number_format($total, 2); ?></b></td>

                                </tr>

                            </tbody>
                        </table>

                        <a href="products.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>

                        <button type="submit" class="btn btn-success" name="save">Save Changes</button>

                        <a href="clear_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>

                        <a href="checkout.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a>

                    </form>

                </div>
            </div>

        </div>
        
    </div>
        
        <footer>
                <!--copyright-->
                   <div class="copyright"><p>Copyright &copy; 2019 | <strong>NIKE PRELOVED STORE</strong></p></div> 
        </footer>
        
    </body>

</html>
