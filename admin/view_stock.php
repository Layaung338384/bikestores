<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Stock Page</title>
    <link rel="stylesheet" href="./include/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
</head>
<body>
<div class="container-fluid p-0 m-0">
        <!-- nav bar section -->
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

        
         <?php include("../include/newDB.php"); ?>
        <div class="container d-flex justify-content-center">


            <!-- nav bar -->
            
  

            <div class="row m-0 p-0 w-75">
                <div class="col-12">
                    '<table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Store ID</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                    $number = 1;
                                    $select_data = "SELECT * FROM `production_stocks`";
                                    $result_data = mysqli_query($connect, $select_data);

                                    if (!$result_data) {
                                        echo "<script>alert('You have a problem: " . mysqli_error($connect) . "');</script>";
                                    } else {
                                        while ($row = mysqli_fetch_assoc($result_data)) {
                                            $store_id = $row['store_id'];
                                            $product_id = $row['product_id'];
                                            $stock = $row['quantity'];

                                            echo "
                                                <tr>
                                                    <td>{$number}</td>
                                                    <td>{$store_id}</td>
                                                    <td>{$product_id}</td>
                                                    <td>{$stock}</td>
                                                </tr>
                                            ";
                                            $number++;
                                        }
                                        
                                        echo "</table>";
                                    }
                                    ?>

                            </tbody>
                        </table>
                </div>
            </div>
        </div>

    </div>
</body>
</html>









