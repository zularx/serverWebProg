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
            <form action="https://httpbin.org/post" method="post" target="_blank">
                <div class="inputDiv">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name">     
                </div>
                <div class="inputDiv">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
                <label id="selectLabel">
                    Тип обращения
                    <select name="topic" id="topic">
                        <option value="complaint">Жалоба</option>
                        <option value="suggestion">Предложение</option>
                        <option value="thanks">Благодарность</option>
                    </select>
                </label>
                <div class="inputDiv">
                    <label for="textMessage">Текст сообщения</label>
                    <textarea name="message" id="textMessage"></textarea>
                </div>
                <button class="btn" type="submit">Отправить</button>
                <a href="second.php">На вторую страницу</a>
            </form>
        </div>
        
    </main>
    <footer>
        <p> Задание для самостоятельной работы «Feedback Form» — Словецких </p>
    </footer>
</body>
</html>

