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
<?php include("../include/DB.php"); ?>
<?php 

    if(isset($_POST['stf_create'])){
        $staff_first_name = $_POST['f_name'];
        $staff_last_name  = $_POST['l_name'];
        $staff_email = $_POST['staff_email'];
        $staff_phone = $_POST['staff_phone'];
        $staff_password = $_POST['staff_password'];

        if($staff_email == null && $staff_name == null && $staff_password == null && $staff_phone == null){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>ERROR!</strong> You Need To Fill All Fields!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }else{
            $insert_data_staff = "INSERT INTO `staff` (`first_name`,`last_name`,`staff_phone`,`staff_email`,`staff_password`)
            VALUES ('$staff_first_name','$staff_last_name','$staff_phone','$staff_email','$staff_password')  ";
            $result_data_staff = mysqli_query($con,$insert_data_staff);
            if(!$result_data_staff){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>ERROR!</strong> SignUp Failed!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }else{
                header("location:stores.php");
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
                <a class="navbar-brand" href="./admin/admin.php">Logo</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Stores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Order List</a>
                        </li>
                    </ul>
                        <form class="d-flex" role="">
                            <a href="./admin/admin_login.php" name="admin" class="btn btn-outline-light">Admin</a>
                        </form>
                </div>
            </div>
         </nav>

        <!-- store items -->
        <h1 class="text-center">Welcome</h1>
        <p class="text-center text-danger">You Need to create staff for your store-product and Sales.</p>

        <h3 class="text-center" >Create Staff</h3>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="mb-2 w-50">
                <div class="form-outline mb-2">
                    <label for="">First Name</label>
                    <input type="text" name="f_name" class="form-control" placeholder="Enter First Name" id="">
                </div>
                <div class="form-outline mb-2">
                    <label for="">Last Name</label>
                    <input type="text" name="l_name" class="form-control" placeholder="Enter Last Name" id="">
                </div>
                <div class="form-outline mb-2">
                    <label for="">Email</label>
                    <input type="email" name="staff_email" class="form-control" placeholder="Enter Email" id="">
                </div>
                <div class="form-outline mb-2">
                    <label for="">Phone</label>
                    <input type="number" name="staff_phone" class="form-control" placeholder="Enter PhoneNumber" id="">
                </div>
                <div class="form-outline mb-2">
                    <label for="">Password</label>
                    <input type="password" name="staff_password" class="form-control" placeholder="Enter Password" id="">
                </div>
                <input type="submit" name="stf_create" class="btn btn-success" value="Create">
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>