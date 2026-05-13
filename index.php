<?php

function solveEquation($equation) {
    $equation = str_replace(' ', '', $equation);

    list($left, $right) = explode('=', $equation);

    $operators = ['+', '-', '*', '/'];
    $operator = null;

    foreach ($operators as $op) {
        if (strpos($left, $op) !== false) {
            $operator = $op;
            break;
        }
    }

    if (!$operator) {
        return "Оператор не найден";
    }

    list($a, $b) = explode($operator, $left);

    if ($a == 'X' || $a == 'x') {
        $unknownSide = 'a';
        $num = $b;
    } elseif ($b == 'X' || $b == 'x') {
        $unknownSide = 'b';
        $num = $a;
    } else {
        return "Переменная X не найдена";
    }

    $result = (float)$right;
    $num = (float)$num;

    switch ($operator) {
        case '+':
            $x = $result - $num;
            break;
        case '-':
            $x = ($unknownSide == 'a') ? $result + $num : $num - $result;
            break;
        case '*':
            $x = $result / $num;
            break;
        case '/':
            $x = ($unknownSide == 'a') ? $result * $num : $num / $result;
            break;
    }

    return $x;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $equation = $_POST["equation"];
    $result = solveEquation($equation);
}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab3</title>
    <link rel="stylesheet" href="src/output.css">
</head>
<body class="bg-[#eeeeee]">
    <header class="w-full h-30 flex items-center justify-between p-5">
        <img src="https://rkmo.ru/wp-content/uploads/2022/01/2-1.png" alt="лого" class="w-50">
        <p class="mx-auto font-semibold text-xl">Домашняя работа 3: Solve Equation</p>
    </header>
    <main class="w-full h-165 flex flex-col justify-center items-center">
        <div class="bg-white w-100 h-75 shadow-2xl rounded-xl">
            <form method="POST" class="flex flex-col w-full h-65 justify-center p-4">
                <label for="equation" class="text-xl">Уравнение</label>
                <input name="equation" id="equation" placeholder="Введите уравнение" type="text" require class="mt-2 p-1 border-3 rounded-xs outline-0 hover:border-gray-500 user-invalid:border-[#ff627d] focus:border-[#00bafe] transition-colors duration-300">

                <button type="submit" class="mt-4 bg-[#2a2a2a] text-white p-4 w-60 rounded-xl self-center cursor-pointer hover:bg-[#00bafe] active:bg-[#2a2a2a] transition-colors duration-100">Решить</button>
            </form>

            <?php if ($result !== null): ?>
                <p class="mx-auto w-fit font-semibold">Ответ: X = <?= $result ?></p>
            <?php endif; ?>
        </div>
    </main>
    <footer class="bg-[#2a2a2a] w-full h-30 flex justify-between items-center text-white p-10">
        <p class="text-white text-xl">Задание для самостоятельной работы "Solve Equation" — Словецких</p>
        <a href="blockSchema.php">Блок-схема программы</a>
    </footer>
</body>
</html>