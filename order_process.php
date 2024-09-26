<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form Page</title>
    <link rel="stylesheet" href="./include/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1 class="text-center">Hello, Order Form Page</h1>
    <div class="row">
        <div class="col-12">
           <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Action</th> <!-- Added Action column for Order button -->
                    </tr>
                </thead>
                <tbody>
        </div>
    </div>
</body>
<?php include("include/newDB.php"); ?>
<?php
// Define the data_show function outside the conditional block
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['check_btn'])) {
    global $connect;  // Assuming you already have a $connect variable for database connection
    // Get the data from the POST request
    $store_id = $_POST['store_id'];
    $product_name = $_POST['product_name'];
    $store_product_discount = $_POST['discount'];
    $product_id = $_POST['product_id'];
    $current_stock = $_POST['current_stock']; // The current stock of the product in the store
    $order_quantity = $_POST['order_quantity']; // The quantity the customer wants to order
    $list_price = $_POST['list_price']; // Price of the product
    $store_status = $_POST['status'];

 
    // Calculate the discounted price and total amount
    $step_list = $list_price * $order_quantity; // Apply the decimal discount directly
    $total_amount = $step_list - ($step_list * $store_product_discount); // Total amount based on discounted price


    // Check if ordered quantity is available in stock
    if ($order_quantity > $current_stock) {
        echo "<p style='color: red;'>Sorry, we don't have enough stock. Current stock: $current_stock</p>";
    } else {
        // Calculate the remaining stock
        $new_stock = $current_stock - $order_quantity;

        // Update stock in the database
       

        $update_stock_query = "UPDATE production_stocks SET quantity = $new_stock WHERE store_id = $store_id AND product_id = $product_id";
        $result = mysqli_query($connect, $update_stock_query);

        // Call the data_show function to display the result
        if($result) {
            // Display the order details and updated stock
            echo "<tr>
                        <th scope='row'>1</th>
                        <td>{$product_name}</td>
                        <td>{$list_price}</td>
                        <td>{$store_product_discount}</td>
                        <td>{$order_quantity}</td>
                        <td>{$total_amount}</td>
                        <td>
                          <form method='POST' action='order_confirm.php'> 
                           <input type='hidden' name='store_pro_id' value='{$store_id}'>
                           <input type='hidden' name='product_id' value='{$product_id}'>
                            <input type='hidden' name='product_name' value='{$product_name}'>
                            <input type='hidden' name='price_list' value='{$list_price}'>
                            <input type='hidden' name='product_discount' value='{$store_product_discount}'>
                            <input type='hidden' name='store_statuse' value='{$store_status}'>
                            <input type='hidden' name='order_q' value='{$order_quantity}'>
                            <input type='hidden' name='new_stock' value='{$new_stock}'>
                            <input type='hidden' name='current_stock' value='{$current_stock}'>
                            <input type='hidden' name='ttl_amount' value='{$total_amount}'>
                            <button class='btn btn-success' type='submit' name='order_confirm'>Order Confirm</button> 
                        </form>

                        </td>
                    </tr>";
                    // $_SESSION['updated_stock'] = [
                    //     'store_id' => $store_id,
                    //     'product_name' => $store_product_name,
                    //     'old_stock' => $current_stock,
                    //     'new_stock' => $new_stock,
                    //     'product_id' => $product_id
                    // ];

                
            // echo "<p style='color: green;'>Updated Stock: " . $new_stock . "</p>"; // Display new stock
        } else {
            echo "<p style='color: red;'>Failed to update the stock. Please try again.</p>";
        }
       
    }
}

?>
</html>
