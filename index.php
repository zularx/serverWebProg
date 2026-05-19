<?php 
include "menu.php";
include "db.php";
$page = $_GET['page'] ?? 'view';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Записная книжка</title>
    <link rel="stylesheet" href="src/output.css">
</head>
<body class="bg-[#232530]">
    <header class="bg-[#282a36] flex pl-10 items-center text-white text-2xl font-bold w-full h-20 mb-4">
        <p>Домашняя работа 5: Notebook</p>
    </header>
    <?php 
    echo getMenu();

    switch($page) {

        case 'add':
            include "add.php";
            break;
        case "edit":
            include "edit.php";
            break;
        case 'delete':
            include "delete.php";
            break;
        default:
            include "viewer.php";
    }
    ?>
</body>
</html>