<html>
    <head>
        <meta charset="utf-8">
        <!--fontawsome-->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/v4-shims.css">
        <!--style-->
            <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
            <link href="css/sendstyle.css" rel="stylesheet" type="text/css">
        <!--font-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">
        
        <title>NIKE PRELOVED STORE</title>
        <link href="images/nike.png" rel="icon" type="image/png">
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
        
            <div class="respond">
                <?php
                if(isset($_POST['submit']))
                {
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];
                    $msg=$_POST['msg'];
    
                    $to='nikeprelovedstore@gmail.com';
                    $subject='Nike Preloved Store Question/Suggestion';
                    $message="Name: ". $name ."\n". "Phone: ".$phone."\n"."Dear Nike Preloved Store,"."\n\n".$msg;
                    $headers="From: ".$email;
    
                    if(mail($to, $subject, $message, $headers))
                    {
                        echo "Sent Succesfully! Thank you"." ".$name.". We will contact you shortly!";
                    }
    
                    else
                    {
                        echo "Something went wrong! Please try again!";
                    }
                }
                ?>
                
            </div>
        
    </body>
    
</html>








