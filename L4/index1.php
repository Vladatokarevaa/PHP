<h1>Задание 1</h1>
<div class="form">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <fieldset>
            <legend>Оставьте отзыв!</legend>
            <div id="main_info" style="display: flex; flex-direction: column; gap: 10px;">
                <div>
                    <label for="name">Имя:
                        <input type="text" name="name"/>
                    </label>
                </div>
                <div>
                    <label for="email">Email:
                        <input type="email" name="email"/>
                    </label>
                </div>
            </div>
            <div id="extra_info">
                <div>
                    <p><label for="review">Оцените наш сервис!</label></p>
                    <div style="display: flex; flex-direction: column;">
                        <p><input id="review" type="radio" name="review" value="10" checked>Хорошо</p>
                        <p><input id="review" type="radio" name="review" value="8">Удовлетворительно</p>
                        <p><input id="review" type="radio" name="review" value="5">Плохо</p>
                    </div>
                </div>
            </div>
            <div id="message_info">
                <div>
                    <p><label for="comment">Ваш комментарий: </label></p>
                    <textarea id="comment" name="comment" cols="30" rows="10" class="comment"></textarea>
                </div>
            </div>
            <div id="buttons" style="display: flex; flex-direction: row; gap: 10px; margin-top: 10px;">
                <input type="submit" value="Отправить"/>
                <input type="reset" value="Удалить"/>
            </div>
        </fieldset>
    </form>
    <!-- Добавьте в эту область код, который будет отображать сообщение только после отправки формы -->
    <?php
    // 1.2; 1.3
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Проверка наличия данных в массиве $_POST
        if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["review"]) && isset($_POST["comment"])) {
            // Проверка заполнения всех полей
            if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["comment"])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $review = $_POST["review"];
                $comment = $_POST["comment"];

                // Проверка корректности введенного email
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<div id='result'>";
                    echo "<p>Ваше имя: <b>$name</b></p>";
                    echo "<p>Ваш e-mail: <b>$email</b></p>";
                    echo "<p>Оценка товара: <b>$review</b></p>";
                    echo "<p>Ваше сообщение: <b>$comment</b></p>";
                    echo "</div>";
                } else {
                    echo "<p style='color: red;'>Некорректный email!</p>";
                }
            } else {
                echo "<p style='color: red;'>Пожалуйста, заполните все поля формы!</p>";
            }
        } else {
            echo "<p style='color: red;'>Пожалуйста, заполните все поля формы!</p>";
        }
    }
    ?>
</div>
