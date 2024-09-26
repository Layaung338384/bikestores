<?php 


























function view_store() {
    global $connect;

    if(isset($_GET['store_id'])) {
        // Sanitize the input to avoid SQL injection
        $store_own_id = mysqli_real_escape_string($connect, $_GET['store_id']);
        
        // Query to select store data with product details and staff info
        // (1 day researching youtube)
        $select_multi_data = "
        SELECT ps.store_id, ps.product_id, ps.quantity, pp.product_name, pp.list_price, pp.model_year, soi.discount
        FROM production_stocks ps
        INNER JOIN production_products pp ON ps.product_id = pp.product_id
        INNER JOIN sales_order_items soi ON pp.product_id = soi.product_id
        WHERE ps.store_id = $store_own_id;
    ";

        $result_store_data = mysqli_query($connect, $select_multi_data);
        
        if(mysqli_num_rows($result_store_data) > 0) {
            // Start table structure
            echo '<table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Model Year</th>
                            <th scope="col">List Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Stock</th>

                            <th scope="col">Action</th> <!-- Added Action column for Order button -->
                        </tr>
                    </thead>
                    <tbody>';

            // Counter for row numbering
            $counter = 1;

            // Fetch each row and display it
            while($rows = mysqli_fetch_assoc($result_store_data)) {
                $stores_id = $rows['store_id'];
                $store_product_id = $rows['product_id'];
                $store_product_name = $rows['product_name'];
                $store_product_discount = $rows['discount'];
                $store_list_price = $rows['list_price'];
                $store_model_year = $rows['model_year'];
                $store_quantity = $rows['quantity'];
                $store_staff = $rows['staff_name'];

                $status = "Pending";

                echo "<tr>
                        <th scope='row'>{$counter}</th>
                        <td>{$store_product_name}</td>
                        <td>{$store_model_year}</td>
                        <td>{$store_list_price}</td>
                        <td>{$store_product_discount}</td>
                        <td>{$store_quantity}</td>
                        <td>
                          <form method='POST' action='order_process.php'> 
                            <input type='hidden' name='store_id' value='{$stores_id}'>
                            <input type='hidden' name='product_id' value='{$store_product_id}'>
                            <input type='hidden' name='order_pending' value='{$status}'>
                            <input type='hidden' name='store_staff' value='{$store_staff }'>
                            <input type='hidden' name='product_name' value='{$store_product_name}'>
                            <input type='hidden' name='quantity' value='{$store_quantity}'>
                            <input type='hidden' name='discount' value='{$store_product_discount}'>
                            <input type='hidden' name='list_price' value='{$store_list_price}'>
                            <input type='hidden' name='current_stock' value='{$store_quantity}'> <!-- Pass current stock -->
                            <input type='hidden' name='status' value='{$status}'>
                            <label for='order_quantity'>Enter Order Quantity:</label>
                            <input type='number' id='order_quantity' class='w-25' name='order_quantity' min='1' max='{$store_quantity}' required>
                            <button class='btn btn-primary' value='{$store_product_id}' type='submit' name='check_btn'>Order</button> 
                          </form>
                        </td>
                      </tr>";

                $counter++; // Increment counter for next row
            }

            echo '</tbody></table>';
        } else {
            // If no data found or Store missing show message
            echo '<h2 class="text-center"><strong>Sorry!</strong> This Store is coming very soon.</h2>';
            echo '<p class="text-center">No data found for the specified store ID.</p>';
        }
    }
}



?>