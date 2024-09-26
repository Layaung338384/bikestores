
<?php 

    if(isset($_POST['btn'])){
        $bike_title = $_POST['brand_title'];

        $Select_data = "SELECT * FROM `bike_categories` WHERE `categories_name` = '$bike_title' ";
        $result_data = mysqli_query($con,$Select_data);
        $rows = mysqli_num_rows($result_data);

        if($rows > 0 ){
            echo "<script>alert('This Categories is already insert in Database!')</script>";
        }else{
            $insert_data = "INSERT INTO `bike_categories` (`categories_name`) VALUES ($bike_title) ";
            $result_data = mysqli_query($con,$insert_data);
            if($result_data){
                echo "<script>alert('Your Categories insert Successfully!')</script>";
            }else{
                echo "die($con).'Failed'";
            }
        }


    }

?>



<!-- order_confirm.php backup -->
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
        

        $order_data = "INSERT INTO `order_list` (store_id,product_id,product_name,current_stock,new_stock,list_price,discount,total_amount,`status`,order_quantity,)
        VALUES ('$store_id','$store_product_id','$store_product_name'.'$store_product_old_stock','$store_product_new_stock',
        '$store_list_price','$store_product_discount','$store_product_total_amount','$store_status','$store_order_quantity')";
        $result_data = mysqli_query($connect,$order_data);

        if(!$result_data){
            echo "<script>alert('Something Wrong!')</script>";
        }else{
            header('location:indexx.php');
            exit();
        }
    }

?>



<!-- order_confirm.php backup2 -->
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
        
        // Corrected SQL query (removed the extra comma and fixed concatenation)
        $order_data = "INSERT INTO `order_list` 
        (store_id, product_id, product_name, current_stock, new_stock, list_price, discount, total_amount, `status`, order_quantity)
        VALUES ('$store_id', '$store_product_id', '$store_product_name', '$store_product_old_stock', '$store_product_new_stock',
        '$store_list_price', '$store_product_discount', '$store_product_total_amount', '$store_status', '$store_order_quantity')";

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









 <!-- admin view_stock.php backup -->

<?php include("../include/newDB.php"); ?>
        <div class="container d-flex justify-content-center">


            <!-- nav bar -->
            
  

            <div class="row m-0 p-0 w-75">
                <div class="col-12">
                    '<table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Store ID</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                    $number = 1;
                                    $select_data = "SELECT * FROM `production_stocks`";
                                    $result_data = mysqli_query($connect, $select_data);

                                    if (!$result_data) {
                                        echo "<script>alert('You have a problem: " . mysqli_error($connect) . "');</script>";
                                    } else {
                                        while ($row = mysqli_fetch_assoc($result_data)) {
                                            $store_id = $row['store_id'];
                                            $product_id = $row['product_id'];
                                            $stock = $row['quantity'];

                                            echo "
                                                <tr>
                                                    <td>{$number}</td>
                                                    <td>{$store_id}</td>
                                                    <td>{$product_id}</td>
                                                    <td>{$stock}</td>
                                                </tr>
                                            ";
                                            $number++;
                                        }
                                        
                                        echo "</table>";
                                    }
                                    ?>

                            </tbody>
                        </table>
                </div>
            </div>
        </div>