<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>График работы докторов</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>График работы докторов, каб. 333</h2>

<?php
// Определение текущего дня недели
$dayOfWeek = date('N');

// Определение графика работы
$aksentiSchedule = ($dayOfWeek == 1 || $dayOfWeek == 3 || $dayOfWeek == 5) ? '8:00-12:00' : 'Нерабочий день';
$petrovaSchedule = ($dayOfWeek == 2 || $dayOfWeek == 4 || $dayOfWeek == 6) ? '12:00-16:00' : 'Нерабочий день';
?>

<table>
    <tr style="background-color: #a87ae9; color: white;">
        <th>П.н.</th>
        <th>Фамилия, имя</th>
        <th>График</th>
    </tr>
    <tr>
        <td>1.</td>
        <td>Аксенти Елена</td>
        <td><?php echo $aksentiSchedule; ?></td>
    </tr>
    <tr>
        <td>2.</td>
        <td>Петрова Мария</td>
        <td><?php echo $petrovaSchedule; ?></td>
    </tr>
</table>

</body>
</html>
