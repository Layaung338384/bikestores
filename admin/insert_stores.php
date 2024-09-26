
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

    if(isset($_POST['store_submit'])){
        $s_name = $_POST['S_name'];
        $s_email = $_POST['S_email'];
        $s_phone = $_POST['S_phone'];
        $s_street = $_POST['S_street'];
        $s_city = $_POST['S_city'];
        $s_state = $_POST['S_state'];

        if($s_name == null && $s_city == null && $s_email == null && $s_state == null && $s_street == null && $s_phone == null){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>ERROR!</strong> You Need To Fill All Fields!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            $store_created = "INSERT INTO `stores` (`store_name`,`store_phone`,`store_email`,`store_street`,`store_city`,`store_state`)
            VALUES ('$s_name','$s_phone','$s_email','$s_street','$s_city','$s_state') ";

            $store_result = mysqli_query($con,$store_created);
            if(!$store_result){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Failed!</strong> Store Created Unsuccessfully! 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }else{
                header('location:../stores.php');
                exit();
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


        <!-- stores -->
        <h2 class="text-center">Stores Created</h2>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="mb-2 w-50">
                <div class="form-outline mb-3">
                    <label for="n">Store Name</label>
                    <input type="text" name="S_name" class="form-control" placeholder="Enter Store Name" id="n">
                </div>
                <div class="form-outline mb-3">
                    <label for="e">Store Email</label>
                    <input type="email" name="S_email" class="form-control" placeholder="Enter Store Email" id="e">
                </div>
                <div class="form-outline mb-3">
                    <label for="p">Store Phone</label>
                    <input type="number"  pattern="[0-9]{10}" name="S_phone" class="form-control" placeholder="Enter Store Phone" id="p">
                </div>
                <div class="form-outline mb-3">
                    <label for="s">Store Street</label>
                    <input type="text" name="S_street" class="form-control" placeholder="Enter Store Street" id="s">
                </div>
                <div class="form-outline mb-3">
                    <label for="c">Store City</label>
                    <input type="text" name="S_city" class="form-control" placeholder="Enter Store City" id="c">
                </div>
                <div class="form-outline mb-3">
                    <label for="S">Store State</label>
                    <input type="text" name="S_state" class="form-control" placeholder="Enter Store State" id="S">
                </div>
                <input type="submit" name="store_submit" class="btn btn-success" value="Submit" id="">
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>






