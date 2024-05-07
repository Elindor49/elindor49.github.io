<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_button.css">
</head>
<body>
    <h2>Личный кабинет</h2>
    <h2>Добро пожаловать, <?php echo $username;?>!</h2>

    <h2>Изменить пароль</h2>

    <form action="process_password.php" method="post">
        <label for="old_password">Старый пароль:</label><br>
        <input type="password" id="old_password" name="old_password"><br>
        <label for="new_password">Новый пароль:</label><br>
        <input type="password" id="new_password" name="new_password"><br>

        <button type="submit">Изменить пароль</button>
        <button class="logout-button" type="button" onclick="location.href='main_page.php'">Выйти</button>

    </form>

      

</body>
</html>
