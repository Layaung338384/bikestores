<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirm Page</title>
</head>
<body>
    <h2>Hello Order Confirm Page</h2>
</body>
<?php include("include/newDB.php"); ?>
<?php 

if(isset($_POST['order_confirm'])){
    $store_id = $_POST['store_pro_id'];
    $store_product_discount = $_POST['product_discount'];
    $store_order_quantity = $_POST['order_q'];
    $store_list_price = $_POST['price_list'];
    $store_product_id = $_POST['product_id'];
    $store_product_name = $_POST['product_name'];
    $store_product_new_stock = $_POST['new_stock'];
    $store_product_old_stock = $_POST['current_stock'];
    $store_product_total_amount= $_POST['ttl_amount'];
    $store_status = $_POST['store_statuse'];
    
    // Current date for the order_date
    $current_date = date('Y-m-d H:i:s'); // This sets the current timestamp
    
    // SQL query with DATE_ADD for shipped_date
    $order_data = "INSERT INTO `order_list` 
    (store_id, product_id, product_name, current_stock, new_stock, list_price, discount, total_amount, `status`, order_quantity, order_date, shipped_date)
    VALUES ('$store_id', '$store_product_id', '$store_product_name', '$store_product_old_stock', '$store_product_new_stock',
    '$store_list_price', '$store_product_discount', '$store_product_total_amount', '$store_status', '$store_order_quantity', '$current_date', 
    DATE_ADD('$current_date', INTERVAL 2 MONTH))"; // Add 2 months to current date for shipped_date

    // Execute the query
    $result_data = mysqli_query($connect, $order_data);

    // Check if the query fails
    if(!$result_data){
        echo "<script>alert('Something went wrong: " . mysqli_error($connect) . "')</script>";
    }else{
        
        header('location:indexx.php');
        exit();
    }
}
?>


</html>