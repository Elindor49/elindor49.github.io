<?php
header('HTTP/1.1 404 Not Found');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="error.css">
</head>
<body>
    <div class="error-container">
        <h1>404</h1>
        <p>Страница не найдена</p>
        <button type="button" onclick="location.href='main_page.php'">На главную</button>
    </div>

</body>
</html>
