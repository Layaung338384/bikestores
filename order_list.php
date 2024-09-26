<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Order System</title>
    <link rel="stylesheet" href="./include/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <style>
        body{
            background: #11212D;
        }
    </style> -->
</head>
<?php include("include/newDB.php"); ?>
<body>
    <div class="container-fluid p-0 m-0">
        <!-- nav bar section -->
        <nav class="navbar navbar-expand-lg  bg-success">
            <div class="container-fluid ">
                <a class="navbar-brand" href="./admin/admin.php">Logo</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stores.php">Stores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="order_list.php">Order List</a>
                        </li>
                    </ul>
                </div>
            </div>
         </nav>
        
        <div class="row m-0 p-0">
            <div class="col-12">
                '<table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Order Quantity</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Shipped Date</th>
                                <th scope="col">Order Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        

                            $select_data = 'SELECT * FROM `order_list` ';
                            $result_data = mysqli_query($connect,$select_data);
                            $number=1;
                            if(!$result_data){
                                die("Query Faild" . mysqli_error($connect));
                            }else{
                                while($loop_data = mysqli_fetch_assoc($result_data)){
                                    $product_name = $loop_data['product_name'];
                                    $order_quantity = $loop_data['order_quantity'];
                                    $total_amount = $loop_data['total_amount'];
                                    $order_data = $loop_data['order_date'];
                                    $shipped_date = $loop_data['shipped_date'];
                                    $order_status = $loop_data['status'];

                                    echo "
                                    <tr class=''>
                                        <td>{$number}</td>
                                        <td>{$product_name}</td>
                                        <td class='text-danger fw-bolder'>{$order_quantity}</td>
                                        <td>{$total_amount}</td>
                                        <td>{$order_data}</td>
                                        <td>{$shipped_date}</td>
                                        <td class='text-danger fw-bold'>{$order_status}</td>
                                    </tr>
                                   
                                ";
                                $number++;
                                }
                                echo "</table>";
                            }
                        
                        ?>


                        </tbody>
            </div>
        </div>
        

    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>