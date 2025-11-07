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
            <option default>Select Roll Number</option>
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
    <input type='button' value='SEARCH' name="search"><br>
    <?php
        if(isset($_POST['search']))
        {
            $rollno = $_POST['Roll_no'];
            $n_query = "SELECT * from Students where Roll_No =$rollno";
            $res = mysqli_query($con,$n_query);
            if($res)
            {
                if(mysqli_num_rows($res)>0)
                {
                    $n = mysqli_fetch_assoc($res);
                    echo "Name :<input type='text' value='{$n['Name']}' disabled><br>";
                    echo "Mark 1 : <input type='number' value='{$n['Mark_1']}' name='m1'><br>";
                    echo "Mark 2 : <input type='number' value='{$n['Mark_2']}' name='m2'><br>";
                    
                }  
            }
        }
    ?>
     <input type="submit" value="UPDATE" name='update'>
     <?php
        if(isset($_POST['update']))
        {
            $rollno = $_POST['Roll_no'];
            $m1 = $_POST['m1'];
            $m2 = $_POST['m2'];


            $u_query = "UPDATE student where Roll_No =$rollno set Mark_1 =$m1 ,set Mark_2=$m2 ,set Total= ($m1+$m2) ";
            $res1 = mysqli_query($con,$u_query);
            if($res1)
            {                   
                    if (mysqli_query($con,$iq))
                    {
                        echo "<script>alert('Mark Updated successfully');</script>";
                    }
 
            }
        }
    ?>
 <form>
</body>
</html>