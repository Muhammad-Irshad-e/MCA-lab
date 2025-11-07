<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table
        {
            margin:0 auto;
        }
        table td,th
        {
            padding:20px;
        }
    </style>
</head>
<body>
    
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Roll Number</th>
            <th>Gender</th>
            <th>Mark 1</th>
            <th>Mark 2</th>
            <th>Total</th>
            
        </tr>
        <?php
            $name = $_POST['name'];
            $rno = $_POST['rno'];
            $gender = $_POST['Gender'];
            $mark1 = $_POST['mark1'];
            $mark2 = $_POST['mark2'];
            $total = $mark1+ $mark2;
            $con = mysqli_connect("localhost","root","","student");
            // if($con)
            //     echo "Success";
            // else
            //     echo "Failed to connect to database";
            
            $sq = "SELECT Roll_No FROM student where Roll_No = $rno";
            $qu =  mysqli_query($con,$sq);
            if (mysqli_num_rows($qu)>0)
                echo "<script>alert('Roll Number already exist');window.history.back();</script>";
            else
            {
                $iq = "INSERT INTO student VALUES ($rno,'$name','$gender',$mark1,$mark2,$total)";
                if (mysqli_query($con,$iq))
                {
                    echo "<script>alert('Student added successfully');</script>";
                }

            }
            $sq1 = "SELECT * FROM student";
            $result = mysqli_query($con,$sq1);

            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>". $row['Roll_No'] . "</td>";
                    echo "<td>". $row['Name'] . "</td>";
                    echo "<td>". $row['Gender'] . "</td>";
                    echo "<td>". $row['Mark_1'] . "</td>";
                    echo "<td>". $row['Mark_2'] . "</td>";
                    echo "<td>". $row['Total'] . "</td>";
                    echo "<tr>";
                    
                }
            }
            else{
                echo "<tr colspan ='4'> No records found </tr>";
            }
            

                
         ?>
        
    </table>
</body>
</html>
