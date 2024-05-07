<?php
function saveResult_2($value3, $value4, $month, $result_2) {
    include 'includes/db.php';

    $sql = "INSERT INTO calculations_2 (value3, value4, month, result_2) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $value3, $value4, $month, $result_2);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $result = 0;
        $result_2 =$result_2;
        $result_3 = 0;
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

function getLastResult_2() {
    include 'includes/db.php';

    $sql = "SELECT * FROM calculations_2 ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $conn->close();
        return $row["result_2"];
    } else {
        $conn->close();
        return "Нет результатов.";
    }
}
?>
