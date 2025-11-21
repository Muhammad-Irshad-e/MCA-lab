<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background: #eef1f6;
    padding: 40px;
}

/* Form container */
form {
    width: 50%;
    margin: auto;
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 0 12px rgba(0,0,0,0.15);
}

/* Dropdown styling */
select {
    width: 60%;
    padding: 10px;
    margin: 10px 0 20px 0;
    font-size: 16px;
    border: 1px solid #777;
    border-radius: 5px;
}

/* Text input fields */
input[type="text"],
input[type="number"] {
    width: 60%;
    padding: 10px;
    margin: 10px 0 20px 0;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #666;
}

/* Submit buttons */
input[type="submit"] {
    background: #2c3e50;
    color: white;
    border: none;
    padding: 10px 25px;
    font-size: 17px;
    cursor: pointer;
    border-radius: 5px;
    margin-right: 10px;
}

input[type="submit"]:hover {
    background: #1a252f;
}

/* Labels */
label, form {
    font-size: 18px;
    font-weight: bold;
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
            $n_query = "SELECT * FROM Students WHERE Roll_No = '$rollno'";
            $res = mysqli_query($con,$n_query);
            
            if(mysqli_num_rows($res)>0)
            {
                $n = mysqli_fetch_assoc($res);
                echo "Name :<input type='text' value='{$n['Name']}' readonly><br>";
                echo "<input type='hidden' name='Rno' value='{$n['Roll_No']}'>";

            }  
            
        }
        ?>
     Science : <input type='number'  name='m1' min="0"><br>
     Maths : <input type='number'  name='m2' min="0"><br>
     English : <input type='number'  name='m3' min="0"><br>
     
     <input type="submit" value="Enter" name='Enter'>
     <?php
        if(isset($_POST['Enter']))
        {
            $rollno = $_POST['Rno'];
            $science = $_POST['m1'];
            $maths = $_POST['m2'];
            $english = $_POST['m3'];
            $total = $science +$maths +$english;

            $u_query = "INSERT INTO marks (Roll_No, Science, Maths, English, Total) VALUES ('$rollno', '$science', '$maths', '$english', '$total')";
            $res1 = mysqli_query($con,$u_query);
            if($res1)
            {                   
                
                echo "<script>alert('Mark Entered successfully');</script>";
 
            }
        }
    ?>
 </form>
</body>
</html>