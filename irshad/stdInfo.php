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
        <?php
         $name = $_GET['name'];
         $rno = $_GET['rno'];
         $dob = $_GET['dob'];
         $mark1 =(int)($_GET['mark1'] );
         $mark2 =(int)($_GET['mark2'] );
         $mark3 =(int)($_GET['mark3'] );
         $total = $mark1+$mark2+$mark3;


        ?>
        <tr>
            <th>Name</th>
            <td><?= $name ?></td>

        </tr>
        <tr>
            <th>Roll Number</th>
            <td><?= $rno ?></td>

        </tr>
        <tr>
            <th>DOB</th>
            <td><?= $dob ?></td>

        </tr>
        <tr>
            <th>Mark 1</th>
            <td><?= $mark1 ?></td>

        </tr>
        <tr>
            <th>Mark 2</th>
            <td><?= $mark2 ?></td>

        </tr>
        <tr>
            <th>Mark 3</th>
            <td><?= $mark3 ?></td>

        </tr>
        <tr>
            <th>Total</th>
            <td><?= $total ?> </td>
        </tr>

    </table>
</body>
</html>



