
<!DOCTYPE html>
<html lang="en"><link rel="stylesheet" href="../include/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../include/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php include("../include/DB.php"); ?>

<?php 
    if(isset($_POST['btn'])){
        // Escape the brand title input to prevent SQL injection
        $brand_title = mysqli_real_escape_string($con, $_POST['brand_title']);

        // Corrected SQL query (use backticks for table and column names)
        $select_data = "SELECT * FROM `bike_brand` WHERE `brand_name` = '$brand_title'";
        $result_data = mysqli_query($con, $select_data);

        if(!$result_data){
            die('Error: ' . mysqli_error($con)); // Handle SQL errors properly
        }

        $rows = mysqli_num_rows($result_data);

        // Check if the brand already exists
        if($rows > 0){
            echo "<script>alert('This Brand is already in the Product List');</script>";
        } else {
            // Insert new brand
            $insert_data = "INSERT INTO `bike_brand` (`brand_name`) VALUES ('$brand_title')";
            $result_insert_data = mysqli_query($con, $insert_data);

            if($result_insert_data){
                echo "<script>alert('Your Brand has been inserted successfully!');</script>";
            } else {
                // Handle SQL insert error
                echo "<script>alert('Error: Unable to insert brand.');</script>";
                die('Error: ' . mysqli_error($con)); // Display SQL error if needed
            }
        }
    }
?>
<body>
<div class="container-fluid p-0 m-0">
        <!-- nav bar section -->
        <nav class="navbar navbar-expand-lg  bg-success">
            <div class="container-fluid ">
                <a class="navbar-brand" href="admin.php">Admin</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../indexx.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php">Product</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="order_list.php">Order List</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="">
                            <a href="admin_login.php" name="admin" class="btn btn-outline-light">Admin</a>
                    </form>
                </div>
            </div>
         </nav>

        <div class="toto d-flex justify-content-center mt-5 p-5 bg-secondary">
            <div class="brand">
                <a href="insert_brand.php?insert_brand" class="btn btn-success ms-3" >Insert Brand</a>
            </div>   
            <div class="categories">
                <a href="insert_categories.php?insert_categories" class="btn btn-success ms-3">Insert Categories</a>
            </div>
            <div class="Product">
                <a href="insert_producted.php" class="btn btn-success ms-3">Insert Product</a>
            </div>
            <div class="Product">
                <a href="insert_stores.php" class="btn btn-success ms-3">Add Stores</a>
            </div>
        </div>

        <h2 class="text-center">Insert Brands</h2>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="mb-2 w-50"> <!-- Added w-50 for width control -->
                <div class="input-group mb-2">
                    <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
                    <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
                </div>
                <div class="text-center">
                    <input type="submit" name="btn" value="Insert Brands" class="btn btn-success">
                </div>
            </form>
        </div>

    </div>
</body>
</html>






