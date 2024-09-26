
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link rel="stylesheet" href="../include/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php include("../include/DB.php"); ?>
<?php 

    if(isset($_POST['submit'])){
        $product_name = $_POST['p_name'];
        $product_desc = $_POST['p_desc'];
        $product_year = $_POST['year'];
        $product_categories = $_POST['product_categories'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['p_price'];
        
        $product_image = $_FILES['p_image']['name'];
        $product_tmp_name = $_FILES['p_image']['tmp_name'];
        
        if($product_name == null && $product_desc == null && $product_year == null && $product_categories == null &&
         $product_brand == null && $product_price == null && $product_image == null){
            echo "<script>alret('You need to fill all files')</script>";
         }else{
            $move_img = "../img/$product_image";
            move_uploaded_file($product_tmp_name,$move_img);

            $insert_data = "INSERT INTO `products` (`products_name`,`product_desc`,`product_img`,`list_price`,`model_year`,`catego_id`,`brand_id`)
            VALUES ('$product_name ','$product_desc','$product_image','$product_price','$product_year','$product_categories','$product_brand ') " ;
            $result_data = mysqli_query($con,$insert_data);
            if($result_data){
                echo "<script>alert('Your Data Insert Successfully Done!')</script>";
                header("location:admin.php");
            }else{
                echo "Query Failed".mysqli_error($con);
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
                <a href="insert_categories.php" class="btn btn-success ms-3">Insert Categories</a>
            </div>
            <div class="Product">
                <a href="insert_producted.php" class="btn btn-success ms-3">Insert Product</a>
            </div>
            
        </div>

        <h2 class="text-center">Insert Product</h2>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="mb-2 w-50"> <!-- Added w-50 for width control -->
                <div class="form-outline mb-4">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="p_name" placeholder="Enter Product Name">
                </div>
                <div class="form-outline mb-4">
                    <label for="">Product Description</label>
                    <input type="text" class="form-control" name="p_desc" placeholder="Enter Product Description">
                </div>
                <div class="form_outline mb-4">
                    <label for="year">Model Year</label>
                    <input type="number" id="year" name="year" class="form-control" min="1800" max="2025" step="1" placeholder="Enter year">
                </div>
                <div class="form-outline mb-4">
                    <select name="product_categories" id="" class="form-select">
                        <option value="">Select Categories</option>
                        <?php 
                        
                            $select_categories = "SELECT * FROM `bike_categories` ";
                            $result_categories = mysqli_query($con,$select_categories);
                            while($rows = mysqli_fetch_assoc($result_categories)){
                                $title = $rows['categories_name'];
                                $id = $rows['catego_id'];
                                echo "<option value='$id'>$title</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-outline mb-4">
                    <select name="product_brand" id="" class="form-select">
                        <option value="">Select Brands</option>
                        <?php 
                        
                            $select_categories = "SELECT * FROM `bike_brand` ";
                            $result_categories = mysqli_query($con,$select_categories);
                            while($rows = mysqli_fetch_assoc($result_categories)){
                                $title = $rows['brand_name'];
                                $id = $rows['brand_id'];
                                echo "<option value='$id'>$title</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-outline mb-4">
                    <label for="">Product Image</label>
                    <input type="file" name="p_image" placeholder="Enter Product Image" class="form-control">
                </div>
                
                <div class="form-outline mb-4">
                    <label for="">Product Price</label>
                    <input type="text" name="p_price" class="form-control" placeholder="Enter Price">
                </div>

                <div class="form-outline mb-4">
                    <input type="submit" name="submit" class="btn btn-success" value="Insert Product">
                </div>
            </form>
        </div>

    </div>
</body>
</html>






