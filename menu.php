<?php

function getMenu() {

    $page = $_GET['page'] ?? 'view';

    $items = [
        'view' => 'Просмотр',
        'add' => 'Добавление записи',
        'edit' => 'Редактирование записи',
        'delete' => 'Удаление записи'
    ];

    $html = "<div class='flex gap-4 h-20 w-200 justify-center items-center p-4 font-semibold text-xl bg-[#282a36] text-white rounded-2xl mx-auto'>";

    foreach($items as $key => $value) {

        $class = ($page == $key) ? 'text-[#ffb86c]' : '';

        $html .= "
            <a class='menu-btn $class'
                href='index.php?page=$key'>
                $value
            </a>
        ";
    }

    $html .= "</div>";


    if($page == 'view') {

        $sort = $_GET['sort'] ?? 'id';

        $html .= "<div class='flex gap-4 items-center justify-center rounded-xl bg-[#1f202a] w-120 h-15 mx-auto mt-2 font-extralight text-white'>";

        $sorts = [
            'id' => 'По добавлению',
            'lastname' => 'По фамилии',
            'birthdate' => 'По дате рождения'
        ];

        foreach($sorts as $key => $value) {

            $class = ($sort == $key) ? 'text-[#bd93f9]' : '';

            $html .= "
                <a class='sub-btn $class'
                    href='index.php?page=view&sort=$key'>
                    $value
                </a>
            ";
        }

        $html .= "</div>";
    }

    return $html;
}
?>