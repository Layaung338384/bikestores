<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../include/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .sign{
        float: right;
    }
</style>
<?php include("../include/DB.php") ?>
<?php 
    // attention to know my login
    $name = "admin";
    $email = "admin1234@gmail.com";
    $password = "123456789";

    if(isset($_POST['ad_submit'])){
        $admin_name = $_POST['ad_name'];
        $admin_email = $_POST['ad_email'];
        $admin_password = $_POST['ad_pass'];

        if($admin_name == $name && $admin_email == $email && $admin_password == $password){
            header("location:admin.php");
            exit();
        }else{
            echo "Sry Try Again";
        }
    }
?>
<body>
    <h1 class="text-center p-3 text-light bg-secondary" >Admin Login Form</h1>

   <div class="d-flex justify-content-center">
    <form action="" method="post" class="w-50" > 
            <div class="form-outline mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="ad_name" id="">
            </div>
            <div class="form-outline mb-3">
                <label for="">Email</label>
                <input type="text" class="form-control" name="ad_email" id="">
            </div>
            <div class="form-outline mb-3">
                <label for="">Password</label>
                <input type="password" class="form-control" name="ad_pass" id="">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success"  name="ad_submit" value="Login">
                <a href="#" class="sign">Sign Up Here</a>
            </div>
    </form>
   </div>
    
</body>
</html>
