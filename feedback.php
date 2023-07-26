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
            Feedback
        </div>

        <div class="user">
            Joseph Mar
        </div>
    </header>
    <div class="container">
        <div class="side-bar">
            
            <a href="#">Back</a>
        </div>
        <div class="main-container">
            <div class="main-body">
                <div class="head">
                    <h2>Jeremiah Gray</h2>
                </div>
                <div class="body">
                    <p class="message">Hello</p>
                    <p class="message user_message">Hi</p>
                </div>
                <div class="footer">
                    <form>
                        <input type="text" name"">
                        <button>SEND</button>
                    </form>

                </div>
            </div>
                
            
            
            
        </div>

    </div>
    
    <style>
        /* CSS styles go here */


        
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
        justify-content: center;
        align-items: center;
        
    }

    .main-body{
        height: 80%;
        width: 90%;
        background: #43A6ED;
        display: flex;
        flex-direction: column;
        box-shadow: 2px 2px 20px rgba(0,0,0,0.4);
    }

    .head h2{
        color: white;
        padding: 15px;
    }

    .body{
        flex: 1;
        color: white;
        background-color: rgba(0,0,0,0.3);
        padding: 20px 30px;
    }

    .message{
        background-color: dodgerblue;
        padding: 10px;
        color: white;
        width: fit-content;
        border-radius: 10px;
        margin-bottom: 15px;

    }

    .user_message{
        margin-left: auto;
        background-color: white;
        color: black;
    }

    .footer form{
        display: flex;

    }

    form input{
        flex: 1;
        height: 40px;
        border: none;
        outline: none;
        padding-left: 5px;
        font-size: 16px;
    }

    form button{
        width: 100px;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: dodgerblue;
        color:white;
        cursor: pointer;
    }
    form button:hover{
        background-color: blue;
        transition: 0.2s easge;
    }

    
    
    

  






    </style>
</body>
</html>
