<!DOCTYPE html>
<html lang="en">
<head>
<h1>Задание 4</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Test</title>
</head>
<body>
    <h1>Тест</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="name">Введите ваше имя:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        
        <p>Вопрос 1: Какой ваш любимый цвет?</p>
        <input type="radio" id="color_red" name="color" value="red">
        <label for="color_red">Красный</label><br>
        <input type="radio" id="color_blue" name="color" value="blue">
        <label for="color_blue">Синий</label><br>
        <input type="radio" id="color_green" name="color" value="green">
        <label for="color_green">Зеленый</label><br><br>

        <p>Вопрос 2: Какие виды спорта вы предпочитаете?</p>
        <input type="checkbox" id="sport_football" name="sports[]" value="football">
        <label for="sport_football">Футбол</label><br>
        <input type="checkbox" id="sport_basketball" name="sports[]" value="basketball">
        <label for="sport_basketball">Баскетбол</label><br>
        <input type="checkbox" id="sport_tennis" name="sports[]" value="tennis">
        <label for="sport_tennis">Теннис</label><br><br>

        <label for="question3">Вопрос 3: Сколько часов вы обычно спите в ночь?</label>
        <input type="number" id="question3" name="sleep_hours" min="0" required>
        <br><br>

        <input type="submit" value="Отправить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $color = $_POST["color"];
        $sports = isset($_POST["sports"]) ? implode(", ", $_POST["sports"]) : "Нет предпочтений";
        $sleep_hours = $_POST["sleep_hours"];

        echo "<h2>Результаты теста:</h2>";
        echo "<p>Имя пользователя: $name</p>";
        echo "<p>Любимый цвет: $color</p>";
        echo "<p>Предпочитаемые виды спорта: $sports</p>";
        echo "<p>Количество часов сна: $sleep_hours</p>";
    }
    ?>
</body>
</html>