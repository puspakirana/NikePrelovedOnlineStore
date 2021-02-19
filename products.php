
<?php
session_start();
//initialize cart if not set or is unset
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}

//unset quantity
unset($_SESSION['qty_array']);
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

      <div class="container">
           <nav>

              <input type="checkbox" id="nav" class="hidden">
              <label for="nav" class="nav-btn">
                  <i></i>
                  <i></i>
                  <i></i>
              </label>

              <div class="logo">
                  <p>NIKE PRELOVED STORE</p>
              </div>

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
        
        <br/>
        <div class="container">

            <?php
                //info message
                if(isset($_SESSION['message']))
                {
             ?>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="alert alert-info text-center">
                                <?php echo $_SESSION['message']; ?>
                            </div>
                        </div>
                    </div>
            <?php
                    unset($_SESSION['message']);
                }

            //connection
            $conn = new mysqli('localhost', 'root', '', 'nikestore');

            $sql = "SELECT * FROM products";
            $query = $conn->query($sql);
            $inc = 4;
            while($row = $query->fetch_assoc())
            {
                $inc = ($inc == 3) ? 1 : $inc + 1;
                if($inc == 1) echo "<div class='row text-center'>";
            ?>
            <div id="column" class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div id="photoproduct" class="row product_image">
                            <img id="product_img" src="images/<?php echo $row['photo']; ?>" width="180px" height="220px" class="img-responsive">
                        </div>
                        <br>
                        <br>
                        <div class="row product_name">
                            <h4><?php echo $row['name']; ?></h4>
                        </div>

                        <div class="row product_footer">
                            <p class="pull-left text-danger">
                                <b>$ <?php echo $row['price']; ?></b>
                            </p>

                            <span class="pull-right">
                                <a href="add_cart.php?id=<?php echo $row['id']; ?>" id="btnplus" class="btn btn-sm">
                                    <span class="glyphicon glyphicon-plus">
                                    </span>
                                    Add
                                </a>
                            </span>

                        </div>

                    </div>
                </div>
            </div>
            <?php
            }
            ?>

        </div>
        
        <footer>
                <!--copyright-->
                   <div class="copyright"><p>Copyright &copy; 2019 | <strong>NIKE PRELOVED STORE</strong></p></div> 
        </footer>

    </body>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</html>
