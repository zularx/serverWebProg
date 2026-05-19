<script src="static/scripts/formMsg.js" defer></script>

<div class="bg-[#1f202a] w-150 h-150 p-2 mt-5 overflow-scroll rounded-xl mx-auto relative">
    <?php
    $delSur = '';
    if(isset($_GET['delete'])) {

        $id = (int)$_GET['delete'];

        $res = mysqli_query($conn,
        "SELECT surname FROM contacts WHERE id=$id");

        $user = mysqli_fetch_assoc($res);

        mysqli_query($conn,
        "DELETE FROM contacts WHERE id=$id");


        $delSur = $user['surname'];
    }

    $res = mysqli_query($conn,
    "SELECT * FROM contacts");

    while($row = mysqli_fetch_assoc($res)) {

        echo "
        <a class='bg-[#282a36] text-white text-center block rounded-xl mb-2 p-4 w-full' href='index.php?page=delete&delete={$row['id']}'>
            {$row['surname']} "
            . mb_substr($row['firstname'], 0, 1) . ". "
            . mb_substr($row['lastname'], 0, 1) . ".
        </a>
        ";
    }
    ?>
    <?php if (!empty($delSur)): ?>
        <div id="msg" class="absolute inset-0 flex justify-center items-center left-0">
            <p class="bg-[#51fa7b] w-full h-20 flex justify-center items-center rounded-xl">Запись с фамилией <?= $delSur ?> удалена</p>
        </div>
    <?php endif; ?>
</div>