<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];
    $month = date('m');
    $result = $value1 + $value2;


    $sql = "INSERT INTO calculations (value1, value2, month, result) VALUES ('$value1', '$value2', '$month', '$result')";
    if ($conn->query($sql) === TRUE) {
        $response = "Результат успешно сохранен в базе данных. Последний результат: " . $result;
    } else {
        $response = "Ошибка: " . $sql . "<br>" . $conn->error;
    }

    echo $response;
}
?>
