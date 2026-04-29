<?php
$url = "https://httpbin.org/get";
$headers = get_headers($url);

$result = "";

if ($headers !== false) {
    $result = implode("\n", $headers);
} else {
    $result = "Не удалось получить заголовки.";
}
?>



<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="static/styles/style.css">
</head>
<body>
    <header>
        <img src="https://rkmo.ru/wp-content/uploads/2022/01/2-1.png" alt="лого">
        <p>Домашняя работа 2: Feedback Form</p>
    </header>
    <main>
        <div id="formDiv">
            <label for="headersArea">Результат работы функции get_headers</label>
            <textarea name="headersArea" id="headersArea"><?php echo htmlspecialchars($result); ?></textarea>
        </div>
    </main>
    <footer>
        <p> Задание для самостоятельной работы «Feedback Form» — Словецких </p>
    </footer>
</body>
</html>

