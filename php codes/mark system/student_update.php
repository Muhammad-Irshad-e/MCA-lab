<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f4f6f8; 
    padding: 50px 20px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
}

form {
    width: 100%;
    max-width: 600px; 
    margin: auto;
    background: white;
    padding: 30px 40px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.15); 
    border-radius: 12px; 
}

form label {
    display: block; 
    font-size: 16px;
    font-weight: 600; 
    color: #333; 
    margin-bottom: 5px;
}

form input[type="text"],
form input[type="number"],
form textarea {
    width: 100%;
    padding: 12px; 
    margin: 0 0 20px 0; 
    font-size: 15px;
    border: 1px solid #ccc; 
    border-radius: 6px;
    box-sizing: border-box; 
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

form input[type="text"]:focus,
form input[type="number"]:focus,
form textarea:focus {
    border-color: #2c3e50; 
    box-shadow: 0 0 5px rgba(44, 62, 80, 0.3); 
    outline: none;
}

form textarea {
    height: 100px; 
    resize: vertical;
}

input[type="submit"] {
    padding: 15px 25px; 
    background: #2c3e50; 
    color: white;
    font-size: 16px;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: background 0.3s ease, transform 0.1s;
}

input[type="submit"]:hover {
    background: #1a252f; 
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

input[type="submit"]:active {
    transform: scale(0.99); 
}

h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #2c3e50; 
    font-size: 24px;
}

</style>

</head>
<body>
    <?php
        include 'connection.php';
        if (!isset($_GET['roll']) || empty($_GET['roll'])) {
              die("Error: Roll Number not provided.");
        }
        $roll = $_GET['roll'];
        
        $query = "SELECT * FROM Students WHERE Roll_No = '$roll'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)>0)
            {
                $n = mysqli_fetch_assoc($result);
                echo "<form method='post'>";
                echo "Roll Number :<input type='number' value='{$n['Roll_No']}' name='rno'><br>";
                echo "Name :<input type='text' value='{$n['Name']}' name='sname'><br>";
                echo "Address :<textarea name='address'>{$n['Address']} </textarea><br>";
                echo "Phone Number :<input type='text' value='{$n['Phone_number']}' name='phone'><br>";
                echo "Username :<input type='text' value='{$n['username']}' name='username' ><br>";
                echo "Password :<input type='text' value='{$n['password']}' name='pass'><br>";
                echo "<input type='submit' value='Update' name='update'>";
                echo "</form>";

            }
        ?>

        <?php
    if(isset($_POST['update']))
    {
        $rollno = $_POST['rno'];
        $name = $_POST['sname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $u_query ="UPDATE Students 
                SET Name='$name', 
                Address='$address', 
                Phone_number='$phone', 
                Username='$username', 
                Password='$pass' 
                WHERE Roll_No='$rollno'";
        $res1 = mysqli_query($con,$u_query);
        if($res1)
        {                   
            
            echo "<script>alert('Student detail Updated successfully');</script>";

        }
    }
?>
</body>
</html>