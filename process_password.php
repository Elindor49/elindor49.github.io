<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}


$db_host = "localhost";
$db_user = "root";
$db_password = '';
$db_name = "users";

$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);


if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

$username = $_SESSION['username'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];


$sql = "SELECT password FROM users WHERE username = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user_data = mysqli_fetch_assoc($result);
$hashed_password = $user_data['password'];

if (password_verify($old_password, $hashed_password)) {

    $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $update_sql = "UPDATE users SET password = ? WHERE username = ?";
    $update_stmt = mysqli_prepare($link, $update_sql);
    mysqli_stmt_bind_param($update_stmt, "ss", $new_hashed_password, $username);

    if (mysqli_stmt_execute($update_stmt)) {
        echo "Пароль успешно изменен!";
        header("Location: main_page.php");
        exit();

    } else {
        echo "Ошибка при изменении пароля: " . mysqli_error($link);
    }
} else {
    echo "Неверный старый пароль!";
}


mysqli_close($link);

?>
