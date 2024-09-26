<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details Page</title>
    <link rel="stylesheet" href="./include/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <style>
        body{
            background: #11212D;
        }
    </style> -->
</head>
<body>
<?php include("../include/newDB.php"); ?>
<nav class="navbar navbar-expand-lg  bg-success">
            <div class="container-fluid ">
                <a class="navbar-brand" href="./admin/admin.php">Logo</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="indexx.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../product.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../stores.php">Stores</a>
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
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Store ID</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Current Stock</th>
                                    <th scope="col">New Stock</th>
                                    <th scope="col">Price List</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Order Quantity</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Shipped Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody class='justify-content-center'>
                            <?php 
                                $select_order_list_data = "SELECT * FROM `order_list`";
                                $result_data = mysqli_query($connect,$select_order_list_data);

                                if(!$result_data){
                                    echo "<script>alert('Your Database or Program Something Wrong!')</script>";
                                }else{
                                    while($rowss = mysqli_fetch_assoc($result_data)){
                                        $order_id = $rowss['order_id'];
                                        $store_id = $rowss['store_id'];
                                        $product_id = $rowss['product_id'];
                                        $current_stock = $rowss['current_stock'];
                                        $new_stock = $rowss['new_stock'];
                                        $list_price = $rowss['list_price'];
                                        $discount = $rowss['discount'];
                                        $order_quantity = $rowss['order_quantity'];
                                        $order_date = $rowss['order_date'];
                                        $shipped_date = $rowss['shipped_date'];
                                        $total = $rowss['total_amount'];

                                        echo "
                                        <tr class='align-item-center text-center'>
                                            <td>{$order_id}</td>
                                            <td>{$store_id}</td>
                                            <td>{$product_id}</td>
                                            <td class='text-danger fw-bolder'>{$current_stock}</td>
                                            <td class='text-primary fw-bolder'>{$new_stock}</td>
                                            <td>{$list_price}</td>
                                            <td>{$discount }</td>
                                            <td>{$order_quantity}</td>
                                            <td class='text-secondary'>{$total }</td>
                                            <td>{$order_date}</td>
                                            <td>{$shipped_date}</td>
                                            <th><a class='btn btn-danger' href='delete_order_data.php?order_id={$order_id}'>Delete</a>    </th>
                                        </tr>
                                    ";
                                }
                                
                                echo "</table>";
                                }
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>