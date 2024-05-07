<?php
function saveSumOfResults($result, $result_2, $result_3, $month,$sum) {
    include 'includes/db.php';

    // Check if any of the values are zero
    if ($result == 0 || $result_2 == 0 || $result_3 == 0) {
        return "Ошибка: одно или несколько значений равно нулю";
    }

    // Check if the month is the same for all values
    if ($result['month'] != $result_2['month'] || $result_2['month'] != $result_3['month']) {
        return "Ошибка: месяцы для значений не совпадают";
    }

    // // Sum the values
    // $sum = $result + $result_2 + $result_3;

    // Insert the sum into the sums table
    $sql = "INSERT INTO sums (result, result_2, result_3, month, sum) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $result, $result_2, $result_3, $month, $sum);
    if ($stmt->execute()) {
        $conn->close();
        return;
    } else {
        $conn->close();
        return "Ошибка: ". $sql. "<br>". $conn->error;
    }
}

function lastSaveSumOfResults() {
    include 'includes/db.php';

    $sql = "SELECT * FROM sums ORDER BY id DESC LIMIT 1";
    $sum = $conn->query($sql);

    if ($sum->num_rows > 0) {
        $row = $sum->fetch_assoc();
        $conn->close();
        return $row["sum"];
    } else {
        $conn->close();
        return "Нет результатов.";
    }
}
?>
