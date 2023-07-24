<?php
    session_start();
    include_once "../classes/database_connection.php";
    include_once "customer.php";

    $db_conn = new DatabaseConnection();
    $pdo = $db_conn->getPDO();
    // echo $_SESSION['user_id'];
    // echo 'SA GAWAS!!!!';

    $order_status_words = array(1=>'Complete', 2=>'In-Progress', 3=>'Pending');
    if(isset($_GET['logout']))
    {
        session_destroy();
		header("Location: ../index.php");
		return;
    }

    if(isset($_SESSION['user_id']))
    {
        // echo $_SESSION['user_id'];

        $sql_select_services = "SELECT * FROM services";
	    $stmt = $pdo->query($sql_select_services);
	    $all_services_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql_select = "SELECT * FROM users WHERE user_id=:user_id";
	    $stmt = $pdo->prepare($sql_select);
        $stmt->execute(array(':user_id'=>$_SESSION['user_id']));
	    $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user_info['user_type'] == 1)
        {
            header('Location: ../admin/admin_dashboard.php');
            return;
        }

        $customer = new Customer($user_info['firstname'], $user_info['lastname'], $user_info['user_address'], $user_info['email'], $user_info['user_password']);
        // echo $_SESSION['user_id'];
        // echo 'TRRUUEUUEE';
        if( isset($_POST['service_type']) && isset($_POST['weight']) && isset($_POST['order_price']) && isset($_POST['order_duration']) )
        {
            $time_today_SAYUP = date('d-m-Y H:i:s');

            // $time_remaining = ((int)$_POST['order_duration']) * 3600;
            $time_remaining = ((int)$_POST['order_duration']) * 60;
            // $time_remaining = ((int)$_POST['order_duration']);

            $order_status = 2; // Set Order Status to In-progress
            $time_offset = (int)$_POST['order_duration'];

            $date_and_time_split = explode(' ', $time_today_SAYUP);
            $hour_minute_second_split = explode(':', $date_and_time_split[1]);

            $date_split_for_database_format = explode('-', $date_and_time_split[0]);
            $time_today = $date_split_for_database_format[2].'-'.$date_split_for_database_format[1].'-'.$date_split_for_database_format[0].' '.$date_and_time_split[1];

            // $date_day_split_for_database_format = (int)$date_split_for_database_format[0];
            // $time_duration = ((int)$hour_minute_second_split[0]) + $time_offset;
            $time_duration = ((int)$hour_minute_second_split[1]) + $time_offset;
            // $time_duration = ((int)$hour_minute_second_split[2]) + $time_offset;
   
            // $date_finish = $date_split_for_database_format[2].'-'.$date_split_for_database_format[1].'-'.($date_split_for_database_format[0]).' '.$time_duration.':'.$hour_minute_second_split[1].':'.$hour_minute_second_split[2];
            $date_finish = $date_split_for_database_format[2].'-'.$date_split_for_database_format[1].'-'.($date_split_for_database_format[0]).' '.$hour_minute_second_split[0].':'.$time_duration.':'.$hour_minute_second_split[2];
            // $date_finish = $date_split_for_database_format[2].'-'.$date_split_for_database_format[1].'-'.($date_split_for_database_format[0]).' '.$hour_minute_second_split[0].':'.$hour_minute_second_split[1].':'.$time_duration;
            
            $customer->createOrder($_POST['service_type'], $time_today, $date_finish, $time_remaining, $order_status, $_POST['weight'], 'Hoy HEHE', $_POST['order_price']);
            header('Location: customer_dashboard.php');
            return;
        }

        $select_query_result_orders = $customer->getMyOrders(1);
        $select_query_result_user = $customer->getMyInfo();

        // getting all complete orders
        $sql_select_complete_orders = "SELECT order_id, order_status FROM orders WHERE user_id=:user_id AND order_status=:order_status";
	    $stmt = $pdo->prepare($sql_select_complete_orders);
        $stmt->execute(array(':user_id'=>$customer->getUserId(), ':order_status'=>1));
	    $select_query_result_all_complete_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql_select_inprogress_orders = "SELECT order_id, order_status FROM orders WHERE user_id=:user_id AND order_status=:order_status";
	    $stmt = $pdo->prepare($sql_select_inprogress_orders);
        $stmt->execute(array(':user_id'=>$customer->getUserId(), ':order_status'=>2));
	    $select_query_result_all_inprogress_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $sql_select_pending_orders = "SELECT order_id, order_status FROM orders WHERE user_id=:user_id AND order_status=:order_status";
	    $stmt = $pdo->prepare($sql_select_pending_orders);
        $stmt->execute(array(':user_id'=>$customer->getUserId(), ':order_status'=>3));
	    $select_query_result_all_pending_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(isset($_POST['user_id']) && isset($_POST['order_id']))
        {
            $_SESSION['user_id'] = $_POST['user_id'];
            $_SESSION['order_id'] = $_POST['order_id'];
            header('Location: customer_feedback.php');
            return;
        }
    }
    else {
        header('Location: ../index.php');
        return;
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WashMatic</title>
    <link rel="icon" type="image/x-icon" href="imgs/washing-machine_icon-icons.com_60734.ico">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
</head>
<body onload="putPriceValue()">
    
    <header class="header">
        <div class="logo">
            <h4>Wash Matic</h4>
        </div>

        <div class="dashboard">
            <h5>ADMIN SIDE</h5>
        </div>

        <div class="user">
            <?php
            echo '<span style="font-weight: bold;">'.$select_query_result_user['firstname'].' '.$select_query_result_user['lastname'].'</span>';
            echo '<br>';
            echo '<span style="font-weight: bold;">'.$select_query_result_user['user_id'].'</span>';
            ?>
        </div>
    </header>
    <div class="container">
        <div class="side-bar">
            <span>Main Menu</span>
            <a href="#">Dashboard</a>
            <a href="#">History</a>
            <form method="GET">
                <input type="submit" name="logout" value="Log-out">
            </form>
        </div>
        <div class="main-container">
            <div class="first-container">
                <div class="order">
                        <div class="place-order-inner">
                            <h3>PLACE WALK-IN ORDER</h2>
                        </div>
                        <div class="place-order-body">
                            
                                
                                    <br><br><h4 style="color: green";>ORDER OF NAME - 143</h4><br>
                                    <label for="service_type">Service Type: </label>1<br>
                                    <label for="laundry-weight">Laundry Weight: </label>15<br>
                                    <label for="price">Order Price: </label>515<br><br>
                                    <h4 style="color: green";>WAS SUCCESSFULLY ADDED</H4><br><br>
                                    
                                
                            




                            <form method="POST">
                                <!-- Form content goes here -->
                                <input type="number" name="user-id" autocomplete="off" placeholder="User ID">
                                <select name="service_type" id="services" onchange="getOrderWeightValue()" required>
                                    <option value="" disabled selected hidden>Select service</option>
                                    <option value="1" selected>Press only</option> 
                                    <option value="2">Wash-Dry-Fold</option>
                                    <option value="3">Wash-Dry-Press</option>
                                </select><br>
                                <input type="number" name="weight" id="weight" min="1" max="20" autocomplete="off" placeholder="Input weight" value="1" required> <br>
                                Duration:<label id="order_duration_label"></label>hr
                                ₱<label id="order_price_label">0</label><br>
                                <input type="hidden" id="order_price" name="order_price" value="">
                                <input type="hidden" id="order_duration" name="order_duration" value="">
                                <button type="submit" name="btn_submit" id="btnSubmit">Submit</button>
                            </form>
                        </div>
                </div>
</div>

                
                    
                      
                      
            <div class="second-container">
                    <div class="order-body">
                        <div class="card1">
                            <div class="card1-body">
                                <table>
                                    <tr>
                                        <th>Order Number</th>
                                        <th style="background: rgb(255,37,0);">Pending</th>
                                    </tr>
                                    <tr>
                                        <td>Sample
                                        <td>Sample
                                    </tr>
                                    

                                    
                                </table>
                            </div>
                            
                        </div>
                        <div class="card2">
                            <div class="card2-body">
                                <table>
                                    <tr>
                                        <th>Order Number</th>
                                        <th style="background: #43A6ED;">In-Progress</th>
                                    </tr>
                                    <tr>
                                        <td>Sample
                                        <td>Sample
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card3">
                            <div class="card3-body">
                                <table>
                                    <tr>
                                        <th>Order Number</th>
                                        <th style="background: green;">Complete</th>
                                    </tr>
                                    <tr>
                                        <td>Sample
                                        <td>Sample 
                                    </tr>
                                </table>
                            </div>
                        </div>




                    </div>
                
            </div>
            
            
        </div>

    </div>
    
    <style>
        /* CSS styles go here */
        .order{
            flex: 1;
        }

        .list{
            display: flex;
            
        }
        /* @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"); */
        *{
            margin: 0;
            padding: 0;
            border: none;
            outline: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }


    body{
            /* background: rgb(219, 219, 219); */
            background: rgb(204,204,204);
            
        }

    .header{
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
            /* padding: 20px; */
            /* padding-right: 20px; */
            background: #fff;
            flex-direction: row;
            width: 100%;
        }
    .logo{
            width: 15%;
            height: 60px;
            background-color: #43A6ED;
            text-align: center;
            padding: 15px;
            font-size: 22px;
            
    }
    
    .user{
            width: 15%;
            height: 60px;
            background-color: #43A6ED;
            padding-left: 30px;
            padding-top: 15px;
            font-size: 17px;
            text-align: center;
    }

    .dashboard{
        width: auto;
        font-size: 25px;

    }

    .container{
    margin-top: 10px;
    display: flex;
    height: 92.5vh;
    justify-content: space-between;

    
    
}
.side-bar{
        padding: 1px;
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 15%;
        background: #43A6ED;
    }
    
    .side-bar span{
        color: black;
        margin: 1.8rem 3rem;
        font-size: 12px;
    }

    .side-bar a{
        width: 100%;
        padding: 1.8rem 3rem;
        font-weight: 500;
        font-size: 18px;
        color: black;        
    }

    .side-bar input{
        width: 98%;
        padding: 1.8rem 3rem;
        font-weight: 500;
        font-size: 18px;
        color: black;        
        background: #43A6ED;
    }

    .side-bar a:hover{
        background: #fff;
        color: #43A6ED;
        border-radius: 20px;
    
    }

    .side-bar input:hover{
        background: #fff;
        color: #43A6ED;
        border-radius: 20px;
    
    }

    .main-container{
        display: flex;
        padding: 10px;
        height: 100%;
        width: 100%;
        flex-direction: row;
    }

    
    
    .second-container{
        width: 60%;
        height: 100%;
    }
    

    .first-container .order{
        width: auto;
        align-items: center;
        text-align: center;
    }

    .first-container{
        flex-direction: row;
        justify-content: space-between;
        height: 100%;
        width: 40%;
        display: flex;
    }

    .first-container .order .place-order-inner{
        text-align: center;
    }


    .first-container .order .place-order .place-order-body{
        padding-top: 5px;
        align-items: center;
        text-align: center;
    }
    select{
        height: 30px;
        font-size: 17px;
        margin: 10px;
        width: 60%;
    }
    input{
        height: 30px;
        font-size: 17px;
        margin: 5px;
        width: 60%;
    }

    label{
        height: 30px;
        font-size: 17px;
        margin: 10px;
    }
    button{
        height: 30px;
        width: 20%;
        font-size: 15px;
        background-color: #43A6ED;
        margin: 5px;
        border: 0;
        border-radius: 5px;
    }

    .second-container .order-body{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        border: 0.5px solid black;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        height: 95%
        

    }

    .second-container .order-body table{
        width: 100%;
    }


    .second-container .order-body table, th, td{
        border: 1px solid;
        border-collapse: collapse;
        border-color: black;
        text-align: center;
        padding: 2px;
    }

    .second-container .order-body .card1{
        width: auto;
        height: 95%;
        overflow: auto;
    }

    .second-container .order-body .card2{
        width: auto;
        height: 95%;
        overflow: auto;
    }

    .second-container .order-body .card3{
        width: auto;
        height: 95%;
        overflow: auto;
    }


    </style>
    <script src="js_scripts/customer_script.js"></script>
</body>

</html>
    
