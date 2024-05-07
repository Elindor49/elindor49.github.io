<?php
session_start();
include 'includes/functions.php';
include 'includes/functions_2.php';
include 'includes/functions_3.php';
include 'includes/sum.php';

$finalResult = "";
$finalResult_2 = "";
$finalResult_3 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $value1 = floatval($_POST['value1']);
    $value2 = floatval($_POST['value2']);
    $month = $_POST['month'];

    if (!empty($value1) && !empty($value2)) {
        $result = $value1 * $value2;
        echo saveResult($value1, $value2, $month, $result);
        $finalResult = getLastResult();
        $_SESSION['value2'] = $value2;
    }
}

if (isset($_SESSION['value2'])) {
    $value2_saved = $_SESSION['value2'];
} else {
    $value2_saved = '';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $value3 = floatval($_POST['value3']);
    $value4 = floatval($_POST['value4']);
    $month = $_POST['month'];

    if (!empty($value3) && !empty($value4)) {
        $result_2 = $value3 * $value4;
        echo saveResult_2($value3, $value4, $month, $result_2);
        $finalResult_2 = getLastResult_2();
        $_SESSION['value4'] = $value4;
    }
}
if (isset($_SESSION['value4'])) {
    $value4_saved = $_SESSION['value4'];
} else {
    $value4_saved = '';
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $value5 = floatval($_POST['value5']);
    $value6 = floatval($_POST['value6']);
    $value7 = floatval($_POST['value7']);
    $month = $_POST['month'];

    if (!empty($value5) &&!empty($value6) &&!empty($value7)) {
        $result_3 = ($value6 - $value5) * $value7;
        echo saveResult_3($value5, $value6, $value7, $month, $result_3);
        $finalResult_3 = getLastResult_3();
        $_SESSION['value7'] = $value7;
    }
}

if (isset($_SESSION['value7'])) {
    $value7_saved = $_SESSION['value7'];
} else {
    $value7_saved = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Калькулятор</title>
    <link rel="stylesheet" href="style_page_1.css">
</head>
<body>
    <h4>Рассчет газа</h4>
    <form method="post">
        <input type="number" name="value1" step="0.01" placeholder="Количество побленного газа">
        <input type="number" name="value2" value="<?php echo $value2_saved;?>" step="0.01" placeholder="Тариф">
        <select name="month">
            <option value="Январь">Январь</option>
            <option value="Февраль">Февраль</option>
            <option value="Март">Март</option>
            <option value="Апрель">Апрель</option>
            <option value="Май">Май</option>
            <option value="Июнь">Июнь</option>
            <option value="Июль">Июль</option>
            <option value="Август">Август</option>
            <option value="Сентябрь">Сентябрь</option>
            <option value="Октябрь">Октябрь</option>
            <option value="Ноябрь">Ноябрь</option>
            <option value="Декабрь">Декабрь</option>
        </select>
        <button type="submit">Рассчитать</button>
        <!-- <button type="submit" name="btn1">На главную</button> -->
    </form>
    <?php if(isset($_POST['btn1'])) {
        header("Location: main_page.php");
        exit;
    }
   ?>
    <?php if (!empty($finalResult)) {?>
        <p>Сумма: <?php echo number_format($finalResult, 2);?> рублей </p>
    <?php }?>


    <h4>Рассчет воды</h4>
    <form method="post">
        <input type="number" name="value3" step="0.01" placeholder="Количество побленной воды">
        <input type="number" name="value4" value="<?php echo $value4_saved;?>" step="0.01" placeholder="Тариф">
        <select name="month">
            <option value="Январь">Январь</option>
            <option value="Февраль">Февраль</option>
            <option value="Март">Март</option>
            <option value="Апрель">Апрель</option>
            <option value="Май">Май</option>
            <option value="Июнь">Июнь</option>
            <option value="Июль">Июль</option>
            <option value="Август">Август</option>
            <option value="Сентябрь">Сентябрь</option>
            <option value="Октябрь">Октябрь</option>
            <option value="Ноябрь">Ноябрь</option>
            <option value="Декабрь">Декабрь</option>
        </select>
        <button type="submit">Рассчитать</button>
        <!-- <button type="submit" name="btn1">На главную</button> -->
    </form>
    <?php if(isset($_POST['btn1'])) {
        header("Location: main_page.php");
        exit;
    }
    ?>
    <?php if (!empty($finalResult_2)) { ?>
        <p>Сумма: <?php echo number_format($finalResult_2 , 2); ?> рублей </p>
    <?php } ?>

    <h4>Рассчет электричества</h4>
    <form method="post">
        <input type="number" name="value5" step="0.01"  placeholder="Показания счётчика в начале месяца">
        <input type="number" name="value6" step="0.01"  placeholder="Показания счётчика в конце месяца">
        <input type="number" name="value7" value="<?php echo $value7_saved;?>" step="0.01" placeholder="Тариф">
        <select name="month">
            <option value="Январь">Январь</option>
            <option value="Февраль">Февраль</option>
            <option value="Март">Март</option>
            <option value="Март">Апрель</option>
            <option value="Март">Май</option>
            <option value="Март">Июнь</option>
            <option value="Март">Июль</option>
            <option value="Март">Август</option>
            <option value="Март">Сентябрь</option>
            <option value="Март">Октябрь</option>
            <option value="Март">Ноябрь</option>
            <option value="Март">Декабрь</option>
        </select>
        <button type="submit">Рассчитать</button>
        <button type="submit" name="btn1">На главную</button>
    </form>
    <?php if(isset($_POST['btn1'])) {
        header("Location: main_page.php");
        exit;
    }
    ?>
    <?php if (!empty($finalResult_3)) {?>
          <p>Сумма: <?php echo number_format($finalResult_3, 2);?> рублей </p>
      <?php }?>

    <?php


    function getLastThreeSums() {
        include 'includes/db.php';

        $sql = "SELECT * FROM sums ORDER BY id DESC LIMIT 3";
        $sums = $conn->query($sql);

        $sum = 0;
        $month = '';
        if ($sums->num_rows > 0) {
            $row = $sums->fetch_assoc();
            $month = $row["month"];
            $sum += $row["sum"];

            $row = $sums->fetch_assoc();
            if ($row["month"] != $month) {
                return "Месяцы у трех последних результатов не совпадают.";
            }
            $sum += $row["sum"];

            $row = $sums->fetch_assoc();
            if ($row["month"] != $month) {
                return "Месяцы у трех последних результатов не совпадают";
            }
            $sum += $row["sum"];
        } else {
            return "Нет результатов.";
        }

        $conn->close();
        return $sum;
    }
?>


    <h4>Сумма</h4>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $result = getLastThreeSums();
        if (is_numeric($result)) {
            // echo "Всего: " . $result . " рублей";
        } else {
            echo $result;
        }
    }
    ?>
    <?php if (!empty($result)) { ?>
    <p>Всего: <?php echo number_format($result, 2); ?> рублей </p>
<?php } ?>

</body>
</html>
