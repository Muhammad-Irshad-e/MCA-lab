<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 400px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px 30px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    form div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"],
    input[type="number"],
    input[type="password"],
    textarea {
        width: 100%;
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="password"]:focus,
    textarea:focus {
        border-color: #4e9fff;
        outline: none;
    }

    .error_msg {
        color: red;
        font-size: 13px;
        margin-top: 3px;
        display: none;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4e9fff;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 15px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #347fd8;
    }
</style>
</head>
<body>
    <div class="container">
        <form action="" method="post" onsubmit="return validateForm()">
            <div>
                <label for="rollno">Roll Number :</label>
                <input type="number" name="rollno">
            </div>
            <div>
                <label for="name">Name :</label>
                <input type="text" name="name" id="name">
                <p id="name_valid" class="error_msg" >
            </div>
            <div>
                <label for="address">Address :</label>
                <textarea name="address" id="" cols="30" rows="5"></textarea>
            </div>
            <div>
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone">
                <p id="Phone_valid" class="error_msg" >

            </div>
            <div>
                <label for="username">Username :</label>
                <input type="text" name="username">
            </div>

            <div>
                <label for="pass">Password :</label>
                <input type="password" name="pass" id="pass">
                <p id="pass_valid" class="error_msg" >
            </div>
            <div>
                <label for="repass">Retype Password :</label>
                <input type="password" name="repass" id="re-pass">
                <p id="re-pass_valid" class="error_msg" >
            </div>
            <div>
                <input type="submit" value="Register" name="register">
            </div>

        </form>
    </div>
       <script>

        function clearErrors(){
            document.getElementById("name_valid").style.display="none";
            document.getElementById("pass_valid").style.display="none";
            document.getElementById("re-pass_valid").style.display="none";
            document.getElementById("Phone_valid").style.display="none";
        }
        function validateName(){
            var name=document.getElementById("name").value;
            var name_p=document.getElementById("name_valid");
            var regex=/^[a-zA-Z ]+$/;
            if(name ===""){
                name_p.style.display="block";
                name_p.innerText="Name cannot be empty.";
                return false;
            }
            if(!regex.test(name)){
                name_p.style.display="block";
                name_p.innerText="Name can only contain letters and spaces.";
                return false;
            }
            return true;
        }
        function validatePassword(){
            var pass=document.getElementById("pass").value;
            var rePass=document.getElementById("re-pass").value;
            var pass_p=document.getElementById("pass_valid");
            var rePass_p=document.getElementById("re-pass_valid");
            if(pass.length<8){
                pass_p.style.display="block";
                pass_p.innerText="Password must be at least 8 characters long.";
                return false;
            }
            if(pass!==rePass){
                rePass_p.style.display="block";
                rePass_p.innerText="Passwords do not match.";
                return false;
            }

            return true;
        }

        function validatePhoneNumber(){
            var number=document.getElementById("phone").value;
            var regex=/^\d{10}$/;
            var phone_p=document.getElementById("Phone_valid");
            if(number ===""){
                phone_p.style.display="block";
                phone_p.innerText="Number cannot be empty.";
                return false;
            }
            if(number && !regex.test(number)){
                phone_p.style.display="block";
                phone_p.innerText="Please enter a valid 10-digit home phone number.";
                return false;
            }

            return true;
        }
        function validateForm(){
            clearErrors();
            if(!validateName() || !validatePhoneNumber() || !validatePassword() ){
                return false;
            }
            return true;
        }
    </script>
    <?php
        if(isset($_POST['register']))
        {
            $rollno = $_POST['rollno'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            include 'connection.php';
            $squery = "SELECT Roll_No   FROM Students where Roll_No = $rollno";
            $res = mysqli_query($con,$squery);
            if(mysqli_num_rows($res)>0)
            {
                echo "<script>alert('Roll Number already exist');</script>";
            }
            else{
                $insert_q = "INSERT INTO Students VALUES ($rollno,'$name','$address','$phone','$username','$pass')";
                if(mysqli_query($con,$insert_q))
                {
                    echo "<script>alert('Student added successfully');</script>";
                }
            }
        }
    
    ?>
</body>
</html>