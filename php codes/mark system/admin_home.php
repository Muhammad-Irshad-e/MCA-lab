<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
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
        <div class="menu_bar">
            <iframe src="admin_menu.php" name="admin_menu" title="Menu"></iframe>
        </div>

        <div class="main_frame">
            <iframe src="stdnt_registration.php" name="main_frame" title="Main Content"></iframe>
        </div>
    </div>

<?php
    session_start();

    include 'connection.php';
    if(isset($_POST['submit']))
    {

        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $s_query = "SELECT `username`, `password` FROM `login` WHERE `username` = '$user' AND `password` = '$pass' ";
        $res = mysqli_query($con,$s_query);
        $s_query1 =  "SELECT `Roll_No`, `username`, `password` FROM `Students` WHERE `username` = '$user' AND `password` = '$pass' ";
        $res1 = mysqli_query($con,$s_query1);
        if(mysqli_num_rows($res)==1)
        {   
            $_SESSION['username'] = $user;
           
            echo "<script>alert('Successfully logged in as admin');</script>";    
        }
        else if(mysqli_num_rows($res1)>0)
        {
            $row = mysqli_fetch_assoc($res1);    
            $_SESSION['username'] = $user;
            
            echo "<script>alert('Successfully logged in as Student');</script>";
            echo "<script>window.location.href='student_view.php?roll={$row['Roll_No']}';</script>";
            
        }
        else{
            echo "<script>alert('Invalid username or password');window.history.back();</script>";

        }
        
       
    }
?>
</body>
</html>

