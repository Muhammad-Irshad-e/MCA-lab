<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1e1f26;
            color: #fff;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .menu-header {
            background-color: #111217;
            padding: 20px;
            text-align: center;
            font-weight: bold;
            font-size: 1.2rem;
            border-bottom: 1px solid #333;
        }

        .menu-links {
            display: flex;
            flex-direction: column;
            padding: 0;
            margin: 0;
        }

        .menu-links a {
            text-decoration: none;
            color: #ddd;
            padding: 15px 20px;
            display: block;
            border-left: 4px solid transparent;
            transition: all 0.2s ease-in-out;
            font-size: 0.95rem;
        }

        .menu-links a:hover {
            background-color: #292b33;
            border-left: 4px solid #4e9fff;
            color: #fff;
        }

        .menu-links a:active {
            background-color: #343640;
        }




    </style>
</head>
<body>
    <div class="menu-header">Admin Panel</div>
    <div class="menu-scroll">
        <div class="menu-links">
            <a href="stdnt_registration.php" target="main_frame">Student Registration</a>
            <a href="mark_entry.php" target="main_frame">Mark Entry</a>
            <a href="mark_update.php" target="main_frame">Mark Update</a>
            <a href="edit_student.php" target="main_frame">Delete / Update Student</a>
            <a href="view_progress.php" target="main_frame">View Progress Card</a>
        </div>
    </div>
</body>
</html>
