<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table style="border:1px solid black; border-collapse: collapse;" cellpadding="10">
    <tr>
        <th>Roll Number</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Action</th>
    </tr>

    <?php
        include 'connection.php';

        $qu = "SELECT * FROM Students";
        $result = mysqli_query($con, $qu);

        if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>
                        <td>{$row['Roll_No']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Address']}</td>
                        <td>{$row['Phone_number']}</td>
                        <td>
                            <a href='student_update.php?roll={$row['Roll_No']}'><button>Update</button></a>
                            <a href='student_delete.php?roll={$row['Roll_No']}'><button>Delete</button></a>
                        </td>
                    </tr>";
            }

        } else {
            echo "<tr><td colspan='5'>No Students Found</td></tr>";
        }
    ?>

</table>

</body>
</html>
