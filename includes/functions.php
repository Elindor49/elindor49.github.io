<?php
function saveResult($value1, $value2, $month, $result) {
    include 'includes/db.php';

    $sql = "INSERT INTO calculations (value1, value2, month, result) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $value1, $value2, $month, $result);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $result = $result;
        $result_2 = 0;
        $result3 = 0;
        $sum = $result + $result_2 + $result3;

        $sql_sums = "INSERT INTO sums (result, result_2, result_3, month, sum) VALUES (?,?,?,?,?)";
        $stmt_sums = $conn->prepare($sql_sums);
        $stmt_sums->bind_param("sssss", $result, $result_2, $result3, $month, $sum);
        $stmt_sums->execute();

        if ($stmt_sums->affected_rows > 0) {
            $conn->close();
            return;
        } else {
            $conn->close();
            return "Ошибка при вставке в таблицу sums: ". $conn->error;
        }
    } else {
        $conn->close();
        return "Ошибка: ". $sql. "<br>". $conn->error;
    }
}

function getLastResult() {
    include 'includes/db.php';

    $sql = "SELECT * FROM calculations ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $conn->close();
        return $row["result"];
    } else {
        $conn->close();
        return "Нет результатов.";
    }
}
?>
