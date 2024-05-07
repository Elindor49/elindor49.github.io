<!DOCTYPE html>
<html>
    <head>
        <title>Расчет</title>
        
        <link rel="stylesheet" href="style_button.css">
    </head>
    <body>
        <h2>Выберите, что хотите расчитать</h2>


        <div class="button-container">
            <button type="button" onclick="location.href='page_1.php'">Подсчет</button>
            <button type="button" onclick="location.href='account.php'">Личный кабинет</button>

        </div>


        <?php
   if(isset($_POST['btn1'])) {
       header("Location: page_1.php");
       exit;
   } elseif(isset($_POST['btn2'])) {
       header("Location: page_404.php");
       exit;
   } elseif(isset($_POST['btn3'])) {
       header("Location: page_404.php");
       exit;
   } elseif(isset($_POST['btn4'])) {
       header("Location: page_404.php");
       exit;
   }
     elseif(isset($_POST['btn5'])) {
         header("Location: account.php");
         exit;
   }
   ?>
    </body>
</html>
