<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="text"><br>
        <select name="" id="">
            <?php 
                for($i = 0;$i<18;$i++)
                {
                    echo "<option >".$i."</option>";
                }
            ?>
        </select>
    </form>
</body>
</html>