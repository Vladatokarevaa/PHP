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
        <td><b>Петрова Мария</b></td>
        <td><?php echo $petrovaSchedule; ?></td>
    </tr>
</table>

</body>
</html>

<br>

<?php
$d=date("D");
#echo $d == "Fri" ? "<br />Хороших вам выходных!" : "<br />Приятного рабочего дня, вам!";
if ($d=="Fri")
echo "<br />Хороших вам выходных!";
else
 echo "<br />Приятного рабочего дня, вам!";
?>

<br>
<?php
$dayOfWeek = date("N"); // Получаем числовое представление дня недели
$dateToday = date("d.m.y"); // Получаем текущую дату в формате дд.мм.гг

switch ($dayOfWeek) {
    case 1:
        $dayOfWeekRussian = "понедельник";
        break;
    case 2:
        $dayOfWeekRussian = "вторник";
        break;
    case 3:
        $dayOfWeekRussian = "среда";
        break;
    case 4:
        $dayOfWeekRussian = "четверг";
        break;
    case 5:
        $dayOfWeekRussian = "пятница";
        break;
    case 6:
        $dayOfWeekRussian = "суббота";
        break;
    case 7:
        $dayOfWeekRussian = "воскресенье";
        break;
}

echo "Сегодня, $dayOfWeekRussian, $dateToday";
?>
