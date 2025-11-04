<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: rgb(242, 245, 220);
        }
        .container
        {
            margin: 0 auto;
            box-shadow: 2px 5px 8px rgba(48, 46, 46,.3);
            width: fit-content;
            padding: 30px;
            border-radius: 12px;
            background-color: beige;
        }
        form .txt{
            border-radius: 5px;
            width: 200px;
            margin: 10px;
            height: 30px;
        }
        
        .btn
        {
            padding: 30px;
            padding-left: 50px;
        }
        h1
        {
            text-align:center ;
        }
        #reset,#submit
        {
            padding: 5px 10px;
            width: 100px;
        }
        .inside
        {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #g{
            padding-left:0px;
            border-radius: 5px;
            width: 290px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Student Mark Registration</h1>
    <div class="container">

        <form action="student.php" method="post">
            <div class="inside">
                <div>
                    Name &nbsp; &nbsp;:<input type="text" name="name" class="txt"><br>
                </div>
                <div>
                    Roll No : <input type="text" name="rno" class="txt"><br>
                </div>
                <div id="g">
                    Gender &nbsp;&nbsp;: <input type="radio" name="Gender" value="Male">M  <input type="radio" name="Gender" value="Female">F<br>
                </div>
               <div>
                    mark 1 &nbsp;&nbsp;: <input type="number" name="mark1" class="txt"><br>
                </div>
                <div>
                    mark 2 &nbsp;&nbsp;: <input type="number" name="mark2" class="txt"><br>
                </div>
                <div class="btn">
                    <input type="reset" value="Reset" id="reset">
                    <input type="submit" value="Submit" id="submit">
                </div>
            </div>
            
            
        </form>
    </div>
</body>
</html>