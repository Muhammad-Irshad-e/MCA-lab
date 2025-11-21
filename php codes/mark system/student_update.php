<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f4f6f8; /* Light background */
    padding: 50px 20px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
}

/* Form container */
form {
    width: 100%;
    max-width: 600px; /* Set a maximum width for better control */
    margin: auto;
    background: white;
    padding: 30px 40px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.15); /* Softer shadow */
    border-radius: 12px; /* Slightly more rounded corners */
}

/* Labels */
form label {
    display: block; /* Ensures label takes full width */
    font-size: 16px;
    font-weight: 600; /* Bolder font weight */
    color: #333; /* Darker text */
    margin-bottom: 5px;
}

/* Inputs, Textarea, and Selects */
form input[type="text"],
form input[type="number"],
form textarea {
    width: 100%;
    padding: 12px; /* Increased padding */
    margin: 0 0 20px 0; /* Clearer margin separation */
    font-size: 15px;
    border: 1px solid #ccc; /* Lighter default border */
    border-radius: 6px;
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

/* Input Focus Effect */
form input[type="text"]:focus,
form input[type="number"]:focus,
form textarea:focus {
    border-color: #2c3e50; /* Dark header color on focus */
    box-shadow: 0 0 5px rgba(44, 62, 80, 0.3); /* Subtle blue glow */
    outline: none; /* Remove default browser outline */
}

/* Textarea Specifics */
form textarea {
    height: 100px; /* Slightly taller textarea */
    resize: vertical;
}

/* Submit button */
input[type="submit"] {
    padding: 15px 25px; /* More prominent button */
    background: #2c3e50; /* Dark button color */
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
    background: #1a252f; /* Darker hover state */
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

input[type="submit"]:active {
    transform: scale(0.99); /* Click feedback */
}

/* Headings */
h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #2c3e50; /* Use header color for heading */
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