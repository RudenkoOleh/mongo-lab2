<?php
    require_once __DIR__ . "/vendor/autoload.php";
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="">
        <h2>Перелік палат в яких чергує вибрана медсестра</h2>
        <label for="nurse">Choose a Nurse:</label>
        <select name="nurse" id="nurse">
        <?php
            echo getNursesOptions($nurses);
        ?>
        </select><br>

        <input type="submit" value="Submit">
    </form>

    <form method="get" action="">
        <h2>Медсестери, які чергували в зазначеному відділенні</h2>
        <label for="department">Choose a department:</label>
        <select name="department" id="department">
            <?php
                echo getDepartmentsOptions($departments);
            ?>
        </select><br>
        <input type="submit" value="Submit">
    </form>

    <form method="get" action="submit_workers.php">
        <h2>Всі чергування у зазначену зміну в зазначеному відділенні</h2>
        <label for="department">Choose a department:</label>
        <select name="department" id="department">
            <?php
                echo getDepartmentsOptions($departments);
            ?>
        </select><br>
 
        <label for="shift">Choose a shift:</label>
        <select name="shift" id="shift">
            <?php
                echo getShiftsOptions($shifts);
            ?>
        </select><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>