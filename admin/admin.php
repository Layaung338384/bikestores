<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../include/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container-fluid p-0 m-0">
        <!-- nav bar section -->
        <nav class="navbar navbar-expand-lg  bg-success">
            <div class="container-fluid ">
                <a class="navbar-brand" href="#">Admin</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../indexx.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Product</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Order List</a>
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
                <a href="insert_categories.php" class="btn btn-success ms-3">Insert Categories</a>
            </div>
            <div class="Product">
                <a href="insert_producted.php" class="btn btn-success ms-3">Insert Product</a>
            </div>
            <div class="Product">
                <a href="view_order_details.php" class="btn btn-success ms-3">View Order Details</a>
            </div>
            <div class="Product">
                <a href="insert_stores.php" class="btn btn-success ms-3">Add Stores</a>
            </div>
            <div class="View_Stock">
                <a href="view_stock.php" class="btn btn-success ms-3">View Stock</a>
            </div>
        </div>

    </div>
</body>
</html>