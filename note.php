<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order_btn'])) {
    // Get the data from the POST request
    $store_id = $_POST['store_id'];
    $product_id = $_POST['product_id'];
    $current_stock = $_POST['current_stock']; // The current stock of the product in the store
    $order_quantity = $_POST['order_quantity']; // The quantity the customer wants to order
    $list_price = $_POST['list_price']; // Price of the product

    // Calculate total amount (order quantity * list price)
    $total_amount = $order_quantity * $list_price;

    // Check if ordered quantity is available in stock
    if ($order_quantity > $current_stock) {
        echo "<p style='color: red;'>Sorry, we don't have enough stock. Current stock: $current_stock</p>";
    } else {
        // Calculate the remaining stock
        $new_stock = $current_stock - $order_quantity;

        // Update stock in the database
        global $connect; // Assuming you already have a $connect variable for database connection

        $update_stock_query = "UPDATE production_stocks SET quantity = $new_stock WHERE store_id = $store_id AND product_id = $product_id";
        $result = mysqli_query($connect, $update_stock_query);

        // Call the data_show function to display the result
        if($result) {
            // Display the order details and updated stock
            
            echo "Ordered Quantity: " . $order_quantity . "<br>";
            echo "List Price: $" . $list_price . "<br>";
            echo "<strong>Total Amount: $" . $total_amount . "</strong><br>";
            // echo "<p style='color: green;'>Updated Stock: " . $new_stock . "</p>"; // Display new stock
        } else {
            echo "<p style='color: red;'>Failed to update the stock. Please try again.</p>";
        }
       
    }
}
?>

<!-- example output:

Order Summary
Store ID: 1
Product ID: 101
Ordered Quantity: 3
List Price: $20.00
Total Amount: $60.00
Updated Stock: 7 -->
