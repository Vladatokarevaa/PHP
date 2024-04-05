<!DOCTYPE html>
<html lang="en">
<head>
    <h1>Задание 2</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма с различными контроллерами</title>
</head>
<body>
    <h2>Заказ продуктов</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="quantity">Количество товаров:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1">
        <br><br>
        <label for="product">Выберите продукт:</label>
        <select id="product" name="product">
            <option value="apple">Яблоко</option>
            <option value="banana">Банан</option>
            <option value="orange">Апельсин</option>
        </select>
        <br><br>
        <input type="submit" value="Отправить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получение данных из формы
        $quantity = $_POST["quantity"];
        $product = $_POST["product"];

        // Вывод данных на экран
        echo "<h3>Ваш заказ:</h3>";
        echo "<p>Количество товаров: <strong>$quantity</strong></p>";
        echo "<p>Выбранный продукт: <strong>$product</strong></p>";
    }
    ?>
</body>
</html>