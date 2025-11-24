<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f2f4f7;
    padding: 50px 20px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
}

form {
    width: 100%;
    max-width: 550px; 
    margin: auto;
    background: white;
    padding: 35px 45px; 
    box-shadow: 0 6px 15px rgba(0,0,0,0.15);
    border-radius: 12px;
}

form label,
form > div { 
    font-weight: 600;
    font-size: 16px;
    color: #333;
    display: block; 
    margin-bottom: 5px;
}

select {
    width: 100%; 
    padding: 12px;
    margin: 0 0 20px 0;
    font-size: 15px;
    border: 1px solid #ccc; 
    border-radius: 6px;
    box-sizing: border-box;
    appearance: none; 
    background-color: #fff;
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%232c3e50%22%20d%3D%22M287%20177.3l-132%20132c-3.6%203.6-7.8%205.4-12.4%205.4s-8.8-1.8-12.4-5.4L5.4%20177.3c-7.2-7.2-7.2-18.7%200-25.9s18.7-7.2%2025.9%200l106%20106%20106-106c7.2-7.2%2018.7-7.2%2025.9%200s7.2%2018.7%200%2025.9z%22%2F%3E%3C%2Fsvg%3E'); /* Custom dropdown arrow */
    background-repeat: no-repeat;
    background-position: right 10px top 50%;
    background-size: 12px auto;
    cursor: pointer;
}


input[type="text"], 
input[type="number"] {
    width: 100%; 
    padding: 12px;
    font-size: 15px;
    margin: 0 0 20px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}


input[type="text"]:focus, 
input[type="number"]:focus,
select:focus {
    border-color: #2c3e50;
    box-shadow: 0 0 5px rgba(44, 62, 80, 0.3);
    outline: none;
}

input[readonly] {
    background-color: #f7f7f7; 
    color: #777;
    cursor: default;
}

input[type="submit"] {
    padding: 12px 25px; 
    background: #2c3e50; 
    color: white;
    font-size: 16px;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    margin-top: 10px;
    transition: background 0.3s ease, transform 0.1s;
    text-transform: uppercase;
}

input[type="submit"]:hover {
    background: #1a252f; 
}

input[type="submit"]:active {
    transform: scale(0.99);
}

input[name="search"] {
    margin-right: 10px;
}</style>

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
            $n_query ="SELECT Students.Roll_No, Students.Name, Marks.Science, Marks.Maths, Marks.English
                       FROM Students
                       JOIN Marks ON Students.Roll_No = Marks.Roll_No
                       WHERE Students.Roll_No = '$rollno'";
            $res = mysqli_query($con,$n_query);
            
            if(mysqli_num_rows($res)>0)
            {
                $n = mysqli_fetch_assoc($res);
                echo "Name :<input type='text' value='{$n['Name']}' readonly><br>";
                echo "<input type='hidden' name='Rno' value='{$n['Roll_No']}'>";
                echo "Science : <input type='number'  name='m1' value='{$n['Science']}'><br>";
                echo "Maths : <input type='number'  name='m2' value='{$n['Maths']}'><br>";
                echo "English : <input type='number'  name='m3' value='{$n['English']}'><br>";
     
                echo "<input type='submit' value='UPDATE' name='update'>";
    }  
    
}
?>
<?php
    if(isset($_POST['update']))
    {
        $rollno = $_POST['Rno'];
        $science = $_POST['m1'];
        $maths = $_POST['m2'];
        $english = $_POST['m3'];
        $total = $science +$maths +$english;

        $u_query = "UPDATE marks 
                    SET Science = $science, Maths = $maths, English = $english, Total = $total
                    WHERE Roll_No = $rollno;";
        $res1 = mysqli_query($con,$u_query);
        if($res1)
        {                   
            
            echo "<script>alert('Mark Updated successfully');</script>";

        }
    }
?>
</form>
</body>
</html>