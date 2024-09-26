<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Order System</title>
    <link rel="stylesheet" href="./include/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php include("./function/omega_function.php"); ?>
<?php include("./include/newDB.php"); ?>
<style>

    .card-img-top{
        width: 100%;
        height: 200px;
        object-fit: contain;
    }


</style>
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
                            <a class="nav-link" href="product.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Stores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="order_list.php">Order List</a>
                        </li>
                    </ul>
                        <form class="d-flex" role="">
                            <a href="./admin/admin_login.php" name="admin" class="btn btn-outline-light">Admin</a>
                        </form>
                </div>
            </div>
         </nav>

        <!-- stores -->
        <h3 class="text-center" >Welcome to Bike Stores</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-10">
                        <div class="row">
                        <?php 
                
                            showStore();
                            view_store();
                        ?>
                        </div>
                        
                    </div>
                    <div class="col-2">
                        <h4>Welcome to Our Page</h3>
                    </div>
             

        </div>


    </div>

    <?php
// Ensure that you have a connection to the database
// $connect = mysqli_connect('hostname', 'username', 'password', 'database');

if(isset($_POST['submit'])){
    $st_name = mysqli_real_escape_string($connect, $_POST['store_name']);
    $st_phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $st_email = mysqli_real_escape_string($connect, $_POST['email']);
    $st_street = mysqli_real_escape_string($connect, $_POST['street']);
    $st_city = mysqli_real_escape_string($connect, $_POST['city']);
    $st_state = mysqli_real_escape_string($connect, $_POST['state']);
    
    // Handle file upload
    $st_img = $_FILES['image']['name'];
    $target_dir = "img/ss";
    $target_file = $target_dir . basename($st_img);
    
    // Check if file was uploaded successfully
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
        // Image uploaded successfully, proceed with inserting data into the database
        $insert_data = "INSERT INTO `sales_stores` (`store_name`, `phone`, `email`, `street`, `city`, `state`, `img`)
                        VALUES ('$st_name', '$st_phone', '$st_email', '$st_street', '$st_city', '$st_state', '$st_img')";
        
        $result_data = mysqli_query($connect, $insert_data);
        
        if($result_data){
            echo 'It is oke bro';
        } else {
            echo 'It is not oke';
            echo "Error: " . mysqli_error($connect); // This will show the SQL error message
        }
    } else {
        echo 'Failed to upload image';
    }
}
?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>