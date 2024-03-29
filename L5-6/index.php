<?php
echo "<h3>Задание 1</h3>";
// Создание файла и запись первых пяти записей
$data = "1. William Smith, 1990, 2344455666677\n"
      . "2. John Doe, 1988, 4445556666787\n"
      . "3. Michael Brown, 1991, 7748956996777\n"
      . "4. David Johnson, 1987, 5556667779999\n"
      . "5. Robert Jones, 1992, 99933456678888\n";
file_put_contents("file.txt", $data);

// Добавление трех записей с помощью file_put_contents()
$dataToAdd = "6. Emily Johnson, 1995, 7778889990011\n"
           . "7. Jessica Lee, 1985, 1234567890123\n"
           . "8. Christopher Brown, 1993, 9876543210987\n";
file_put_contents("file.txt", $dataToAdd, FILE_APPEND);

// Открытие файла для чтения и вывод содержимого
$fileContent = file_get_contents("file.txt");
?>
<div>Данные из файла: </div>
<?php
echo nl2br($fileContent);
echo '<br>';
?>

<?php
echo "<h3>Задание 2</h3>";
if (!isset($_REQUEST['start'])) {
?>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post" style="max-width: 400px; margin-left: 10px;">
 <div style="margin-bottom: 10px;">
 <label style="display: block;">Ваше имя: <input name="name" type="text" style="width: 100%;"></label>
 </div>
 <div style="margin-bottom: 10px;">
 <label style="display: block;">Ваш возраст: <input name="age" type="number" style="width: 100%;"></label>
 </div>
 <div style="margin-bottom: 10px;">
 <label style="display: block;">Ваш E-mail: <input name="email" type="email" style="width: 100%;"></label>
 </div>
 <div style="margin-bottom: 10px;">
 <label style="display: block;">Ваше мнение о нас напишите тут:
 <textarea name="message" cols="40" rows="4" placeholder="Ваше мнение..." style="width: 100%;"></textarea>
 </label>
 </div>
 <div style="text-align: center;">
 <input type="reset" value="Стереть" style="margin-right: 10px;">
 <input type="submit" value="Передать" name="start" style="margin-left: 10px;">
 </div>
</form>
<?php
} else {
 // Данные с формы
 $data = [
 'name' => $_POST['name'] ?? "",
 'age' => $_POST['age'] ?? "",
 'email' => $_POST['email'] ?? "",
 'message' => $_POST['message'] ?? "",
 ];
 // Сохранение данных в файл
 $file = fopen('messages.txt', 'a+') or die("Недоступный файл!");
 foreach ($data as $field => $value) {
     // Добавьте код для сохранения данных в файл
     fwrite($file, $field . ": " . $value . "\n");
 }
 fwrite($file, "\n");
 fclose($file);
 // Вывод данных на экран
 echo 'Данные были сохранены! Вот что хранится в файле: <br />';
 $file = fopen("messages.txt", "r") or die("Недоступный файл!");
 while (!feof($file)) {
     echo fgets($file) . "<br />";
 }
 fclose($file);
}
?>







<?php
echo "<h3>Задание 3</h3>";
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    // Валидация данных
    if (empty($_POST['login'])) {
        $errors['login'][] = 'Введите имя!';
    }
    if (empty($_POST['password'])) {
        $errors['password'][] = 'Введите пароль!';
    }
    // Проверка
    if (count($errors) === 0) {
        $login = htmlspecialchars($_POST['login']);
        $password = md5($_POST['password']); // Хеширование пароля

        $log = fopen("users.txt", "a+") or die("Недоступный файл!");
        $ifExist = false;
        while (!feof($log)) {
            $line = trim(fgets($log));
            if (strpos($line, $login) !== false) {
                $ifExist = true;
                $errors['login'][] = 'Пользователь с таким именем уже существует!';
                break;
            }
        }
        if (!$ifExist) {
            fwrite($log, "$login:$password" . PHP_EOL); // Сохранение данных в файл
            fclose($log);
            http_response_code(201); // Успешная регистрация
            exit('<script>window.location.href = "images.php";</script>'); // Перенаправление на страницу images.php
        }
        fclose($log);
    }
}
?>
<div style="max-width: 300px; margin: 0 auto; margin-left: 20px;">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" style="background-color: #f9f9f9; padding: 20px; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <label style="display: block; margin-bottom: 10px;">
            <span style="font-weight: bold;">Name</span>
            <input name="login" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 3px;">
            <?php if ($errors["login"]) : ?>
                <?php foreach ($errors["login"] as $error) : ?>
                    <p class="error" style="color: red; margin-top: 5px;"><?php echo $error; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </label>
        <label style="display: block; margin-bottom: 10px;">
            <span style="font-weight: bold;">Password</span>
            <input type="password" name="password" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 3px;">
        </label>
        <input type="submit" name="register" value="Регистрация" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer;">
    </form>
</div>


<?php
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["auth"])) {
    $login = htmlspecialchars($_POST['login']);
    $password = md5($_POST['password']); // Хеширование введенного пароля

    $log = fopen("users.txt", "r") or die("Недоступный файл!");
    $ifExist = false;
    while (!feof($log)) {
        $line = trim(fgets($log));
        if (strpos($line, $login) !== false) {
            $ifExist = true;
            list($savedLogin, $savedPassword) = explode(":", $line);
            if ($savedPassword === $password) { // Проверка хешированного пароля
                fclose($log);
                header("Location: images.php"); // Перенаправление на страницу с изображениями
                exit();
            } else {
                $errors['password'][] = 'Неверный пароль!';
                break;
            }
        }
    }
    fclose($log);
    if (!$ifExist) {
        $errors['login'][] = 'Пользователь не найден!';
    }
}
?>
<div>
<div style="max-width: 300px; margin: 0 auto; margin-left: 20px;">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" style="background-color: #f9f9f9; padding: 20px; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <label style="display: block; margin-bottom: 10px;">
            <span style="font-weight: bold;">Name</span>
            <input name="login" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 3px;">
            <?php if ($errors["login"]) : ?>
                <?php foreach ($errors["login"] as $error) : ?>
                    <p class="error" style="color: red; margin-top: 5px;"><?php echo $error; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </label>
        <label style="display: block; margin-bottom: 10px;">
            <span style="font-weight: bold;">Password</span>
            <input type="password" name="password" style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 3px;">
            <?php if ($errors["password"]) : ?>
                <?php foreach ($errors["password"] as $error) : ?>
                    <p class="error" style="color: red; margin-top: 5px;"><?php echo $error; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
        </label>
        <input type="submit" name="auth" value="Авторизация" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer;">
    </form>
</div>