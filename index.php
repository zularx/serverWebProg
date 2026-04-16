<?php
$currentTime = date('H:i:s')
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="static/styles/style.css">
</head>
<body>
    <header>
        <img src="https://rkmo.ru/wp-content/uploads/2022/01/2-1.png" alt="лого">
        <p>Домашняя работа 1: Hello, World!</p>
    </header>
    <main>
        <div id="helloCont">
            <p>Привет, мир! Текущее время: <strong><?= $currentTime?></strong></p>
        </div>
    </main>
    <footer>
        <p> Задание для самостоятельной работы «Hello, World!» — Словецких </p>
    </footer>
</body>
</html>