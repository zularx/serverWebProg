<script src="static/scripts/formMsg.js" defer></script>


<div class="flex w-fit mx-auto gap-4 mt-5">
    <?php

    $res = mysqli_query($conn,
    "SELECT * FROM contacts
    ORDER BY surname, firstname");

    echo "<div class='bg-[#1f202a] w-150 h-120 rounded-xl overflow-y-scroll flex flex-col gap-2 p-2'>";

    while($row = mysqli_fetch_assoc($res)) {

        echo "
        <a class='bg-[#282a36] text-white text-center p-4 rounded-xl' href='index.php?page=edit&id={$row['id']}'>
            {$row['surname']} {$row['firstname']}
        </a>
        ";
    }

    echo "</div>";

    $update = false;
    $id = $_GET['id'] ?? 1;

    if(isset($_POST['save'])) {

        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];

        mysqli_query($conn,
        "UPDATE contacts
        SET surname='$surname',
            firstname='$firstname'
        WHERE id=$id");

        $update = true;
    }

    $res = mysqli_query($conn,
    "SELECT * FROM contacts WHERE id=$id");

    $user = mysqli_fetch_assoc($res);



    ?>
    <form method="POST" class="bg-[#1f202a] rounded-xl flex flex-col w-120 items-center relative justify-center">
        <h2 class="text-white font-bold text-xl mb-10">Редактировать запись</h2>

        <div class="flex text-white flex-col">
            <label class="ml-4 mb-2 text-xl" for="surname">Фамилия</label>
            <input type="text"
                name="surname"
                id="surname"
                class="w-90 bg-[#282a36] p-4 text-white rounded-xl mb-4"
                value="<?= $user['surname'] ?>">
        </div>

        <div class="flex text-white flex-col">
            <label class="ml-4 mb-2 text-xl" for="firstname">Имя</label>
            <input type="text"
                name="firstname"
                id="firstname"
                class="w-90 bg-[#282a36] p-4  rounded-xl"
                value="<?= $user['firstname'] ?>">
        </div>

        <button name="save"
        class="bg-[#ff79c6] p-4 w-80 mt-10 rounded-xl cursor-pointer hover:bg-[#bd93f9] active:bg-[#ff79c6] transition-colors duration-100">
            Сохранить
        </button>   

        <?php if($update): ?>
            <div id="msg" class="absolute inset-0 flex justify-center items-center left-0">
                <p class="bg-[#51fa7b] w-full h-20 flex justify-center items-center rounded-xl">Запись обновлена!</p>
            </div>
        <?php endif; ?>

    </form>

</div>

