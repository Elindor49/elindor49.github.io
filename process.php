<?php

$db_host = "localhost";
$db_user = "root";
$db_password = '';
$db_name = "users";

$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);


if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $action = $_POST['action'];

    if ($action == "Зарегистрироваться") {

        $check_username_sql = "SELECT * FROM users WHERE username = ?";
        $check_stmt = mysqli_prepare($link, $check_username_sql);
        mysqli_stmt_bind_param($check_stmt, "s", $username);
        mysqli_stmt_execute($check_stmt);
        $check_result = mysqli_stmt_get_result($check_stmt);

        if (mysqli_num_rows($check_result) > 0) {
            echo "Имя пользователя уже занято. Пожалуйста, выберите другое имя.";
        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

            if (mysqli_query($link, $sql)) {
                echo "Регистрация прошла успешно!";

                session_start();
                $_SESSION['username'] = $username;

                header("Location: main_page.php");
                exit();
            } else {
                echo "Ошибка при регистрации: " . mysqli_error($link);
            }
        }

    } else if ($action == "Войти") {

        $sql = "SELECT password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];

            if (password_verify($password, $hashed_password)) {
                echo "Вход выполнен успешно!";

                session_start();
                $_SESSION['username'] = $username;


                header("Location: main_page.php");
                exit();

            } else {
                echo "Неверный пароль!";
            }
        } else {
            echo "Пользователь не найден!";
        }
    }
}

mysqli_close($link);
?>
