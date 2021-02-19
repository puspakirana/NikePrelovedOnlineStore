<?php
session_start();

                $severname="localhost";
                $username="root";
                $password="";
                $dbname="nikestore";


                if(!empty($_SESSION['cart']))
                {
                    $orderlist = $_SESSION['cart'];
                    $orderstr = implode(',',$orderlist);
                    
                    //Create Connection
                        $conn = new PDO("mysql:host=$severname;dbname=$dbname", $username, $password);
                        //set the PDO error mode to exception
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                       
                        //Data insertion
                        $sql = "INSERT INTO clientorder (order_list)
                        VALUES('".$orderstr."')";
    
                        //use exec() because no results are returned
                        $conn->exec($sql);
                        $_SESSION['message'] = 'Please wait while we are preparing your order list. Contact us for more information';
                        header('location: view_cart.php');
                }
                else
                {
                    $_SESSION['message'] = 'Your Cart is Empty';
                }

?>