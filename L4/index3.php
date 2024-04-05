<!DOCTYPE html>
<html lang="en">
<head>
<h1>Задание 3</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <h1>Form Validation</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" minlength="3" maxlength="20" pattern="^[^0-9]+$" required>
        <br><br>
        <label for="mail">Mail:</label>
        <input type="email" id="mail" name="mail" required>
        <br><br>
        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea>
        <br><br>
        <input type="checkbox" id="data-processing" name="data-processing" required>
        <label for="data-processing">Do you agree with data processing?</label>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Обработка данных формы
        $name = $_POST["name"];
        $mail = $_POST["mail"];
        $comment = $_POST["comment"];

        // Проверка успешной обработки и вывод сообщения
        echo "<p style='color: green;'>Форма успешно заполнена!</p>";
    }
    ?>
</body>
</html>