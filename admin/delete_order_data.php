<?php include("../include/newDB.php"); ?>
<?php 

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];

    $delete = "DELETE FROM `order_list` WHERE `order_id` = '$order_id' ";
    $result_data = mysqli_query($connect,$delete);

    if(!$result_data){
        die("Query Faild" . mysqli_error($connect));
        echo "<script>alert('Something is Erroring')</script>";
    }else{
        header('location:view_order_details.php');
        exit();
    }
}



?>