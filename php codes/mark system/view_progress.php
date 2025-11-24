  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background: #f4f6f8;
    padding: 20px;
}

form {
    width: 50%;
    margin: auto;
    background: white;
    padding: 20px 30px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
    border-radius: 10px;
}

form label, form select, form input {
    font-size: 18px;
}

select {
    width: 60%;
    padding: 10px;
    font-size: 16px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #666;
}

input[type="submit"] {
    padding: 10px 20px;
    background: #2c3e50;
    color: white;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 15px;
}

input[type="submit"]:hover {
    background: #1a252f;
}

table {
    width: 60%;
    margin: 25px auto;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    border: 1px solid #333;
}

th {
    background: #2c3e50;
    color: white;
    width: 40%;
    text-align: left;
}

td {
    background: #ecf0f1;
}

table tr:nth-child(even) td {
    background: #dfe6e9;
}

table tr:hover td {
    background: #cfe0eb;
}

a {
    display: block;
    width: fit-content;
    margin: 20px auto;
    font-size: 18px;
    color: #0077cc;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    color: #005799;
    text-decoration: underline;
}
</style>

  </head>
  <body>
    
      <form action="" method="post">
          Roll Number : <select name="Roll_no">
              <option value="" disabled selected>Select Roll Number</option>
              <?php
    include 'connection.php';
    $s_query = "SELECT Roll_No from Students";
    $result = mysqli_query($con,$s_query);
    if(mysqli_num_rows($result)> 0)
        {   
            while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option value='$row[Roll_No]'>$row[Roll_No]</option>";
                    
                }
            }
            
            
            ?>
         </select>
         <input type='submit' value='SEARCH' name="search"><br>
         <?php
        if(isset($_POST['search']))
            {
                $rollno = $_POST['Roll_no'];
                $n_query = "SELECT Students.Roll_No, Students.Name, Marks.Science, Marks.Maths, Marks.English, Marks.Total
                       FROM Students
                       JOIN Marks ON Students.Roll_No = Marks.Roll_No
                       WHERE Students.Roll_No = '$rollno'";
            $res = mysqli_query($con,$n_query);
            
            if(mysqli_num_rows($res)>0)
                {
                    $n = mysqli_fetch_assoc($res);
                    echo "<a href='view_top_student.php'>View Top Student</a>";
                    echo "<table>";
                    echo "<tr><th>Roll Number</th><td>{$n['Roll_No']}</td></tr>";
                    echo "<tr><th>Name</th><td>{$n['Name']}</td></tr>";
                    echo "<tr><th>Science</th><td>{$n['Science']}</td></tr>";
                    echo "<tr><th>Maths</th><td>{$n['Maths']}</td></tr>";
                    echo "<tr><th>English</th><td>{$n['English']}</td></tr>";
                    echo "<tr><th>Total</th><td>{$n['Total']}</td></tr>";
                    
                    echo "</table>";
                    
                }
            }
            
            ?>
</form>

</body>
</html>