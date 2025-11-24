<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
table {
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    font-size: 18px;
}

th, td {
    padding: 12px 15px;
    border: 1px solid #444;
}

th {
    background-color: #2c3e50;
    color: white;
    text-align: left;
    width: 40%;
}

td {
    background-color: #ecf0f1;
}

table tr:nth-child(even) td {
    background-color: #dce6eb;
}

table tr:hover td {
    background-color: #b8d4e3;
}

body {
    background: #f5f5f5;
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
        
         $n_query = "SELECT Students.Roll_No, Students.Name, Marks.Science, Marks.Maths, Marks.English, Marks.Total
                     FROM Students
                     JOIN Marks ON Students.Roll_No = Marks.Roll_No
                     WHERE Students.Roll_No = $roll";
            $res = mysqli_query($con,$n_query);
            
            if(mysqli_num_rows($res)>0)
            {
                $n = mysqli_fetch_assoc($res);
                echo "<table>";
                echo "<tr><th>Roll Number</th><td>{$n['Roll_No']}</td></tr>";
                echo "<tr><th>Name</th><td>{$n['Name']}</td></tr>";
                echo "<tr><th>Science</th><td>{$n['Science']}</td></tr>";
                echo "<tr><th>Maths</th><td>{$n['Maths']}</td></tr>";
                echo "<tr><th>English</th><td>{$n['English']}</td></tr>";
                echo "<tr><th>Total</th><td>{$n['Total']}</td></tr>";
                
                echo "</table>";
            }
?>
</body>
</html>