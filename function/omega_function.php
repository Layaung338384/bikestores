<?php include("include/newDB.php"); ?>
<?php 

function showStore(){
    // Use global keyword to access $con
    global $connect;

    $select_data = "SELECT * FROM `sales_stores`";
    $result_data = mysqli_query($connect, $select_data);
    
    while($rows = mysqli_fetch_assoc($result_data)){  // Use mysqli_fetch_assoc for associative array
        $store_name = $rows['store_name'];
        $store_id = $rows['store_id'];  // Assuming you have a store_id field
        $store_phone = $rows['phone'];
        $store_img = $rows['img']; // Example of accessing more fields
        
        echo "
            <div class='col-md-6 mb-3'>
                <div class='card'>
                <img src='./img/$store_img' class='card-img-top' alt='$store_name'>
                <div class='card-body'>
                    <h5 class='card-title text-center'>{$store_name}</h5>
                    <p class='card-text'>Phone: {$store_phone}</p>
                    <a href='store_details.php?store_id={$store_id}' class='btn btn-dark'>View Store</a>
                </div>
                </div>
            </div>";
    }
}


function view_store() {
    global $connect;

    if(isset($_GET['store_id'])) {
        // Sanitize the input to avoid SQL injection
        $store_own_id = mysqli_real_escape_string($connect, $_GET['store_id']);
        
        // Query to select store data with product details
        // $select_multi_data = "
        //     SELECT ps.store_id, ps.product_id, ps.quantity, pp.product_name, pp.list_price, pp.model_year
        //     FROM production_stocks ps
        //     JOIN production_products pp ON ps.product_id = pp.product_id
        //     WHERE ps.store_id = $store_own_id ;
        // ";
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
            echo '<h2 class="text-center"><strong>Sorry!</strong>This Store is coming very soon.</h2>';
            echo '<p class="text-center">No data found for the specified store ID.</p>';
        }
    }
}

// function order_process(){
// //     if(isset($_GET['store_id'])){
// //         if(isset($_POST['']))
// //         $store_id = $_GET['store_id'];

// //     }
// // }

function all_product(){
    global $connect;
    $product_data = "SELECT * FROM `production_products` ORDER BY RAND() limit 0,20";
    $result_data = mysqli_query($connect, $product_data);
    $number = 1;

    // Fetch each row as an associative array
    while($rowes = mysqli_fetch_assoc($result_data)){
        // Get the product data from the row
        $product_id = $rowes['product_id'];
        $product_name = $rowes['product_name'];
        $product_model_year = $rowes['model_year'];
        $product_list_price = $rowes['list_price'];

        // Output the data in the table row
        echo "<tr>
            <th scope='row'>{$number}</th>
            <td>{$product_name}</td>
            <td>{$product_list_price}</td>
            <td>{$product_model_year}</td>
            <td>
                <a class='btn btn-secondary' href='store_details.php?product_id={$product_id}'>Check</a>
            </td>
        </tr>";

        // Increment the row number
        $number++;
    }
}




function all_product_in_store_details(){
    global $connect;
    if(isset($_GET['product_id'])){
        echo "<h1 class='text-center'>Coming Very Soon Because My exam is too close</h1>";
        echo "<h4 class='text-center text-danger'>Thank You Very Much</h4>";
        // $product_id = $_GET['product_id'];
        // // $select_data = "SELECT * FROM `sales_order_items` soi 
        // // INNER JOIN `prodution_product` pp  ON soi.product_id = pp.product_id 
        // // WHERE soi.product_id = $product_id";

        // echo '<table class="table">
        //             <thead>
        //                 <tr>
        //                     <th scope="col">No</th>
        //                     <th scope="col">Product Name</th>
        //                     <th scope="col">Model Year</th>
        //                     <th scope="col">List Price</th>
        //                     <th scope="col">Discount</th>
        //                     <th scope="col">Stock</th>
        //                     <th scope="col">Action</th> <!-- Added Action column for Order button -->
        //                 </tr>
        //             </thead>
        //             <tbody>';

        //             // recover 1
        //         // $select_data = "SELECT pp.product_name, pp.model_year, pp.list_price, ps.quantity soi.discount
        //         // FROM `sales_order_items` soi
        //         // INNER JOIN `production_products` pp 
        //         // ON soi.product_id = pp.product_id 
        //         // INNER JOIN `production_stocks` ps
        //         // ON ps.product_id = pp.product_id
        //         // WHERE soi.product_id = $product_id";

        //         // that is recover 2
        //         // $select_data = "SELECT pp.product_name, pp.model_year, pp.list_price, ps.quantity, soi.discount ps.store_id
        //         // FROM `sales_order_items` soi
        //         // INNER JOIN `production_products` pp ON soi.product_id = pp.product_id
        //         // INNER JOIN `production_stocks` ps ON ps.product_id = pp.product_id
        //         // WHERE soi.product_id = $product_id";

        // $select_data = "SELECT pp.product_name pp.model_year pp.list_price soi.discount ps.stock ps.store_id
        // FROM `production_products` pp
        // INNER JOIN `production_stock` ps ON ps.product_id = pp.product_id
        // INNER JOIN `sales_order_items` soi ON soi.prodcut_id = pp.product_id
        // WHERE pp.prodcut_id = $product_id
        // ";

        // $result_data = mysqli_query($connect,$select_data);

        // while($data = mysqli_fetch_assoc($result_data)){
        //     $product_price = $data['list_price'];
        //     $product_quantity = $data['quantity'];
        //     $product_discount = $data['discount'];
        //     $product_name = $data['product_name'];
        //     $product_model_year = $data['model_year'];
        //     $store_id = $data['store_id'];

        //     echo "<tr>
        //         <th>1</th>
        //         <td>{$product_name}</td>
        //         <td>{$product_model_year}</td>
        //         <td>{$product_price}</td>
        //         <td>{$product_discount}</td>
        //         <td>{$product_quantity}</td>
        //         <td>{$store_id}</td>
        //         <td>
        //             <a class='btn btn-success'>Order</a>
        //         </td>
        //     </tr>";
        // }
        // echo '</tbody></table>';
        
    }
}

?>
