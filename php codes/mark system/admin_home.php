<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Basic page setup */
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
        }

        .container {
            display: flex;
            min-height: 100vh;
            overflow: hidden;
        }

        /* Sidebar (Menu Bar) */
        .menu_bar {
            width: 260px;
            background-color: #1e1f26;
            color: #fff;
            box-shadow: 2px 0 6px rgba(0,0,0,0.2);
        }

        .menu_bar iframe {
            width: 100%;
            height: 100vh;
            border: none;
            background-color: transparent;
        }

        /* Main Content Area */
        .main_frame {
            flex: 1;
            background-color: #fff;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.05);
        }

        .main_frame iframe {
            width: 100%;
            height: 100vh;
            border: none;
        }

       
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="menu_bar">
            <iframe src="admin_menu.php" name="admin_menu" title="Menu"></iframe>
        </div>

        <!-- Main content -->
        <div class="main_frame">
            <iframe src="stdnt_registration.php" name="main_frame" title="Main Content"></iframe>
        </div>
    </div>

<?php
    if(isset($_POST['submit']))
    {

        $user = $_POST['user'];
        $pass = $_POST['pass'];
        include 'connection.php';
        $s_query = "SELECT `username`, `password` FROM `login` WHERE `username` = '$user' AND `password` = '$pass' ";
        $res = mysqli_query($con,$s_query);
        
        if(mysqli_num_rows($res)==1)
        {   
            $_SESSION['username'] = $user;
           
            echo "<script>alert('Successfully logged in as admin');</script>";    
        }
        else
        {
            echo "<script>alert('Invalid username or password');window.history.back();</script>";


        }
        
       
    }
?>
</body>
</html>

