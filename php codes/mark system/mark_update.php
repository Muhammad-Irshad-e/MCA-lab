<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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