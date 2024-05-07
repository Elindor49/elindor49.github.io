<?php
function saveResult_3($value5, $value6, $value7, $month, $result_3) {
    include 'includes/db.php';

    $sql = "INSERT INTO calculations_3 (value5, value6, value7, month, result_3) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $value5, $value6, $value7, $month, $result_3);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $result = 0;
        $result_2 = 0;
        $result_3 = $result_3;
        $sum = $result + $result_2 + $result_3;

        $sql_sums = "INSERT INTO sums (result, result_2, result_3, month, sum) VALUES (?,?,?,?,?)";
        $stmt_sums = $conn->prepare($sql_sums);
        $stmt_sums->bind_param("sssss", $result, $result_2, $result_3, $month, $sum);
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

function getLastResult_3() {
    include 'includes/db.php';

    $sql = "SELECT * FROM calculations_3 ORDER BY id DESC LIMIT 1";
    $result_3 = $conn->query($sql);

    if ($result_3->num_rows > 0) {
        $row = $result_3->fetch_assoc();
        $conn->close();
        return $row["result_3"];
    } else {
        $conn->close();
        return "Нет результатов.";
    }
}
?>
