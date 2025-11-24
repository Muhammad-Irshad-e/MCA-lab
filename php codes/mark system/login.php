<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background: #e8ecf2;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
}

.container {
    background: white;
    width: 380px;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 0 12px rgba(0,0,0,0.18);
}

/
.container div {
    margin-bottom: 20px;
}


label {
    font-size: 18px;
    font-weight: bold;
    display: block;
    margin-bottom: 8px;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border-radius: 6px;
    border: 1px solid #666;
}

input[type="submit"] {
    width: 100%;
    padding: 12px;
    background: #2c3e50;
    color: white;
    border: none;
    font-size: 18px;
    border-radius: 6px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background: #1a252f;
}
</style>

</head>
<body>
    <div class="container">

        <form action="admin_home.php" method="post">
            <div>
                <label for="user">Username :</label>            
                <input type="text" name="user">
            </div>
            <div>
                <label for="pass">Password :</label>            
                <input type="text" name="pass">
            </div>
            <input type="submit" value="Login" name="submit">
        </form>
    </div>
    
</body>
</html>

