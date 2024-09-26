<!-- <?php 

// function view_store() {
//     global $connect;
    
//     if(isset($_GET['store_id'])) {
//         // Sanitize the input to avoid SQL injection
//         $store_own_id = mysqli_real_escape_string($connect, $_GET['store_id']);
        
// //         // Query to select store data
// //         $select_multi_data = "SELECT * FROM `production_stocks` WHERE `store_id` = $store_own_id";
//         $result_store_data = mysqli_query($connect, $select_multi_data);
        
//         if(mysqli_num_rows($result_store_data) > 0) {
//             // Start table structure
//             echo '<table class="table">
//                     <thead>
//                         <tr>
//                             <th scope="col">#</th>
//                             <th scope="col">Store ID</th>
//                             <th scope="col">Product ID</th>
//                             <th scope="col">Quantity</th>
//                         </tr>
//                     </thead>
//                     <tbody>';

// //             // Counter for row numbering
//             $counter = 1;
            
//             // Fetch each row and display it
//             while($rows = mysqli_fetch_assoc($result_store_data)) {
//                 $stores_id = $rows['store_id'];
//                 $store_product = $rows['product_id'];
//                 $store_quantity = $rows['quantity'];
                
//                 echo "<tr>
//                         <th scope='row'>{$counter}</th>
//                         <td>{$stores_id}</td>
//                         <td>{$store_product}</td>
//                         <td>{$store_quantity}</td>
//                       </tr>";
                
//                 $counter++; // Increment counter for next row
//             }
            
//             // End table structure
//             echo '</tbody></table>';
//         } else {
//             // If no data found, show a message
//             echo '<p>No data found for the specified store ID.</p>';
//         }
//     }
// }








// function view_store() {
//     global $connect;
    
//     if(isset($_GET['store_id'])) {
//         // Sanitize the input to avoid SQL injection
//         $store_own_id = mysqli_real_escape_string($connect, $_GET['store_id']);
        
//         // Query to select store data with product details
//         $select_multi_data = "
//             SELECT ps.store_id, ps.product_id, ps.quantity, pp.product_name, pp.list_price, pp.model_year
//             FROM production_stocks ps
//             JOIN production_products pp ON ps.product_id = pp.product_id
//             WHERE ps.store_id = $store_own_id
//         ";
//         $result_store_data = mysqli_query($connect, $select_multi_data);
        
//         if(mysqli_num_rows($result_store_data) > 0) {
//             // Start table structure
//             echo '<table class="table">
//                     <thead>
//                         <tr>
//                             <th scope="col">#</th>
//                             <th scope="col">Store ID</th>
//                             <th scope="col">Product ID</th>
            //                 <th scope="col">Product Name</th>
            //                 <th scope="col">List Price</th>
            //                 <th scope="col">Model Year</th>
            //                 <th scope="col">Quantity</th>
            //             </tr>
            //         </thead>
            //         <tbody>';

            // // Counter for row numbering
            // $counter = 1;
            
            // // Fetch each row and display it
            // while($rows = mysqli_fetch_assoc($result_store_data)) {
            //     $stores_id = $rows['store_id'];
            // //     $store_product_id = $rows['product_id'];
            //     $store_product_name = $rows['product_name'];
            //     $store_list_price = $rows['list_price'];
            // //     $store_model_year = $rows['model_year'];
            //     $store_quantity = $rows['quantity'];
                
            //     echo "<tr> -->
            //             <th scope='row'>{$counter}</th>
            //             <td>{$stores_id}</td>
            //             <td>{$store_product_id}</td>
            //             <td>{$store_product_name}</td>
            //             <td>{$store_list_price}</td>
            //             <td>{$store_model_year}</td>
            //             <td>{$store_quantity}</td>
            //           </tr>";
                
            //     $counter++; // Increment counter for next row
            // }
            
            // // End table structure
            // echo '</tbody></table>';
//         } else {
//             // If no data found, show a message
//             // echo '<p>No data found for the specified store ID.</p>';
//         }
//     }
// }



// // second_data_insert

// ?>