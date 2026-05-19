<?php
$message = "";

if(isset($_POST['add'])) {

    $stmt = $conn->prepare("
        INSERT INTO contacts
        (surname, firstname, lastname, gender, birthdate, phone, address, email, comment)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "sssssssss",
        $_POST['surname'],
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['gender'],
        $_POST['birthdate'],
        $_POST['phone'],
        $_POST['address'],
        $_POST['email'],
        $_POST['comment']
    );

    if($stmt->execute()) {
        $message = "Запись добавлена";
    } else {
        $message = "Ошибка: " . $stmt->error;
    }
}
?>
<script src="static/scripts/formMsg.js" defer></script>
<form method="POST" class='w-300 h-200 bg-[#1f202a] flex flex-col justify-center gap-4 items-center mx-auto rounded-xl mt-5 mb-10 relative'>
    <div class='flex gap-4'>
        <div class='flex flex-col text-white'>
            <label class="ml-4 mb-1 text-xl" for="surname">Фамилия</label>
            <input type="text"
                name="surname"
                id="surname"
                placeholder="Фамилия"
                class='bg-[#282a36] p-4 rounded-xl w-90 '>
        </div>

        <div class="flex flex-col text-white">
            <label class="ml-4 mb-1 text-xl" for="firstname">Имя</label>
            <input type="text"
                name="firstname"
                id='firstname'
                placeholder="Имя"
                class='bg-[#282a36] p-4 rounded-xl w-90'>
        </div>

        <div class="flex flex-col text-white">
            <label class="ml-4 mb-1 text-xl" for="lastname">Отчество</label>
            <input type="text"
                name="lastname"
                id='lastname'
                placeholder="Отчество"
                class='bg-[#282a36] p-4 rounded-xl w-90'>
        </div>
    </div>

    <div class='flex gap-4 w-278'>
        <div class="flex flex-col text-white flex-1">
            <label class="ml-4 mb-1 text-xl" for="phone">Номер телефона</label>
            <input type="text"
                name="phone"
                id="phone"
                placeholder="Телефон"
                class='bg-[#282a36] p-4 rounded-xl'>
        </div>
        <div class="flex flex-col text-white flex-1">
            <label class="ml-4 mb-1 text-xl" for="email">Email</label>
            <input type="email"
                name="email"
                id="email"
                placeholder="Email"
                class='bg-[#282a36] p-4 rounded-xl'>
        </div>
    </div>
    
    <div class="flex flex-col text-white w-278">
        <label class="ml-4 mb-1 text-xl" for="gender">Пол</label>
        <select name="gender" id="gender" class="bg-[#282a36] p-4 rounded-xl text-white appearance-none">
            <option value="мужчина">Мужчина</option>
            <option value="женщина">Женщина</option>
        </select>
    </div>

    <div class="flex flex-col text-white w-278">
        <label class="ml-4 mb-1 text-xl" for="birthdate">Дата рождения</label>
        <input type="date"
            name="birthdate"
            id="birthdate"
            class="bg-[#282a36] p-4 rounded-xl w-full">
    </div>

    <div class='flex flex-col text-white w-278'>
        <label class="ml-4 mb-1 text-xl" for="address">Адрес проживания</label>
        <input type="text"
            name="address"
            id="address"
            placeholder="Адрес"
            class="bg-[#282a36] p-4 rounded-xl w-full">
    </div>
    
    <div class='flex flex-col text-white w-278'>
        <label class="ml-4 mb-1 text-xl" for="comment">Коментарий</label>
        <input type="text"
            name="comment"
            id="comment"
            placeholder="Коментарий"
            class="bg-[#282a36] p-4 rounded-xl w-full">
    </div>
    

    <button name="add" class="bg-[#ff79c6] p-4 w-100 rounded-xl cursor-pointer hover:bg-[#bd93f9] active:bg-[#ff79c6] transition-colors duration-100">
        Добавить
    </button>
    <?php if (!empty($message)): ?>
        <div id="msg" class="absolute w-full flex h-20 items-center justify-center rounded-xl 
            <?= ($message == 'Запись добавлена') ? 'bg-[#51fa7b]' : 'bg-[#ff5555]' ?>">
            <p><?= $message ?></p>
        </div>
    <?php endif; ?>
</form>