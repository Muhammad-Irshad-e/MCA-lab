<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #eef2f5;
    padding: 50px 20px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
}

/* Table styling */
table {
    width: 90%;
    max-width: 1000px;
    margin:0 auto;
    border-collapse: separate;
    border-spacing: 0;
    background: white;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden;
}

/* Table header */
th {
    background: #2c3e50;
    color: white;
    font-size: 16px;
    font-weight: 600;
    padding: 15px 20px;
    text-align: left;
    letter-spacing: 0.5px;
}

/* Table cells */
td {
    padding: 15px 20px;
    font-size: 15px;
    color: #333;
    border-bottom: 1px solid #eee;
}

/* Remove bottom border from the last row */
tr:last-child td {
    border-bottom: none;
}

/* Row hover effect */
tr:hover td {
    background: #f1f5f9;
    transition: background 0.3s ease;
}

/* Action column styling */
td:last-child {
    white-space: nowrap;
}

/* Buttons container for alignment */
td:last-child a {
    text-decoration: none;
    margin-right: 5px;
    display: inline-block;
}

/* Buttons */
button {
    padding: 10px 14px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    color: white;
    transition: background 0.3s ease, transform 0.1s;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Button active/press effect */
button:active {
    transform: scale(0.98);
}

/* Update button */
td a:first-child button {
    background: #3498db;
}
td a:first-child button:hover {
    background: #1d6fa5;
    box-shadow: 0 2px 5px rgba(52, 152, 219, 0.4);
}

/* Delete button */
td a:last-child button {
    background: #e74c3c;
}
td a:last-child button:hover {
    background: #b63529;
    box-shadow: 0 2px 5px rgba(231, 76, 60, 0.4);
}

/* No records message */
td[colspan="5"] {
    text-align: center;
    font-size: 16px;
    font-weight: 500;
    padding: 30px;
    background: #fff6f6;
    color: #c0392b;
}
</style>

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
