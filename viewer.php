<?php

$sort = $_GET['sort'] ?? 'id';
$pageNum = $_GET['p'] ?? 1;

$limit = 10;
$offset = ($pageNum - 1) * $limit;

$sql = "
SELECT *
FROM contacts
ORDER BY $sort
LIMIT $limit
OFFSET $offset
";

$result = mysqli_query($conn, $sql);

echo "<table class='w-250 bg-[#282a36] min-h-20 mx-auto mt-4 rounded-xl overflow-hidden'>";

echo "
<tr class='bg-[#1f202a] text-white'>
    <th class='p-4'>Фамилия</th>
    <th class=''>Имя</th>
    <th class=''>Телефон</th>
    <th class=''>Email</th>
</tr>
";

while($row = mysqli_fetch_assoc($result)) {

    echo "
    <tr class='text-white font-light'>
        <td class='p-4'>{$row['surname']}</td>
        <td class='p-4'>{$row['firstname']}</td>
        <td class='p-4'>{$row['phone']}</td>
        <td class='p-4'>{$row['email']}</td>
    </tr>
    ";
}

echo "</table>";




$countRes = mysqli_query($conn,
    "SELECT COUNT(*) as total FROM contacts");

$countRow = mysqli_fetch_assoc($countRes);

$total = $countRow['total'];

$pages = ceil($total / $limit);

echo "<div class='mx-auto w-fit mt-4 text-white mb-10'>";

for($i = 1; $i <= $pages; $i++) {

    echo "
    <a href='index.php?page=view&sort=$sort&p=$i'>
        $i
    </a>
    ";
}

echo "</div>";
?>