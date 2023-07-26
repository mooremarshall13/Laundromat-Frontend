<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="imgs/washing-machine_icon-icons.com_60734.ico">
</head>
<body>
    <header class="header">
        <div class="logo">
            Wash Matic
        </div>

        <div class="dashboard">
            All Customers
        </div>

        <div class="user">
            Joseph Mar
        </div>
    </header>
    <div class="container">
        <div class="side-bar">
            <span>Main Menu</span>
            <a href="customer/admin_dashboard.php">Dashboard</a>
            <div class="logout">
            <form method="GET">
                <input type="submit" name="logout" value="Log-out" class="logout">
            </form>
            </div>
        </div>
        <div class="main-container">
            <div class="second-container">
                
                    <div class="my-order-inner">
                        <h3>List of all users</h4>
                        
                    </div>
                    <div class="my-order-body">
                        <table>
                            <tr>
                                <th>Customer ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Customer Order</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeremy</td>
                                <td>Mendoza</td>
                                <td>jeremy@gmail.com</td>
                                <td><button>See Order</button>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeremy</td>
                                <td>Mendoza</td>
                                <td>jeremy@gmail.com</td>
                                <td><button>See Order</button>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeremy</td>
                                <td>Mendoza</td>
                                <td>jeremy@gmail.com</td>
                                <td><button>See Order</button>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeremy</td>
                                <td>Mendoza</td>
                                <td>jeremy@gmail.com</td>
                                <td><button>See Order</button>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeremy</td>
                                <td>Mendoza</td>
                                <td>jeremy@gmail.com</td>
                                <td><button>See Order</button>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeremy</td>
                                <td>Mendoza</td>
                                <td>jeremy@gmail.com</td>
                                <td><button>See Order</button>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeremy</td>
                                <td>Mendoza</td>
                                <td>jeremy@gmail.com</td>
                                <td><button>See Order</button>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeremy</td>
                                <td>Mendoza</td>
                                <td>jeremy@gmail.com</td>
                                <td><button>See Order</button>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeremy</td>
                                <td>Mendoza</td>
                                <td>jeremy@gmail.com</td>
                                <td><button>See Order</button>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Jeremy</td>
                                <td>Mendoza</td>
                                <td>jeremy@gmail.com</td>
                                <td><button>See Order</button>
                            </tr>
                            
                            
                            
                            
                            
                            
                            

                        </table>
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

    .container .side-bar .logout input{
        padding: 1.8rem 3rem;
        width: 100%;
        font-weight: 500;
        font-size: 18px;
        color: black;
        background: #43A6ED;
    }

    .container .side-bar .logout input:hover{
        background: #fff;
        color: #43A6ED;
        border-radius: 20px;
    }

    .main-container .second-container .my-order-body button{
        height: 30px;
        width: 50%;
        font-size: 15px;
        background: #43A6ED;
        margin: 5px;
        border: 0;
        border-radius: 5px;
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

    .side-bar a:hover{
        background: #fff;
        color: #43A6ED;
        border-radius: 20px;
    
    }
    .main-container{
        display: flex;
        padding: 10px;
        height: 100%;
        width: 100%;
        flex-direction: column;
    }

    .second-container{
        width: 100%;
        height: 90%;
    }
    
    

    .second-container .my-order-body table{
        width: 100%;
    }

    .second-container .my-order-body{
        width: 100%;
        padding: 20px;
        height: 90%;
        overflow: auto;
        border: 0.5px solid black;
        background: #fff;
        border-radius: 20px;
    }

    .second-container .my-order-inner{
        padding-left: 80px;
        padding-top: 50px;
        padding-bottom: 15px;
       
    }

    .second-container .my-order-inner h3{
        padding-left: 40px;
        
       
    }

    .second-container .my-order-body table, th, td{
        border: 1px solid;
        border-collapse: collapse;
        border-color: black;
        text-align: center;
        padding: 2px;
    }

    .second-container .my-order-body th{
        background: #43A6ED;
        font-color: white;
        padding: 10px;
    }
  






    </style>
</body>
</html>
