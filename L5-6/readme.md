# Лабораторная №5-6 (Обработка файлов и заголовки)
## Описание и цель лабораторной работы.
* Целью этой лабораторной работы является закрепление практических навыков, связанных с обработкой файлов и заголовками в языке программирования PHP.

* Описание: В ходе выполнения лабораторной были использованы различные функции fclose(), fwrite(), file_put_contents(), также были применены навыки для создания формы с сохранением данных в файл.
## Краткая документация к проекту и примеры использования кода.
### Задание №1 (Запись и чтение из файла)
```php
fclose($file);
```
`fclose()` в PHP используется для закрытия файла после завершения операций с ним. Это важно для освобождения ресурсов, связанных с файлом, и предотвращения утечек памяти. Кроме того, закрытие файла гарантирует сохранение всех записанных данных и очистку буферов.

```php
// Добавление еще трех записей с помощью функции fwrite()
    fwrite($file, "6. Emily Johnson, 1995, 7778889990011\n");
    fwrite($file, "7. Jessica Lee, 1985, 1234567890123\n");
    fwrite($file, "8. Cristopher Browb, 1993, 9876543210987\n");
```
Функция `fwrite()` в PHP используется для записи данных в файл. Она принимает два параметра: указатель на файл (который был открыт с помощью `fopen()`) и строку данных для записи. `fwrite()` позволяет добавлять или перезаписывать содержимое файла в зависимости от режима открытия файла.

### Задание №2 (Запись в файл с помощью функции `file_get_contents()`)
```php
file_put_contents("file.txt", $data);
```
Чем отличается функция `fwrite` и `file_put_contents`?
- `fwrite()` является функцией, которая позволяет записывать данные в файл, требует предварительного открытия файла с помощью `fopen()`.
- `file_put_contents()` - это более простая альтернатива `fwrite()`, которая позволяет записывать данные в файл без необходимости предварительно открывать его с помощью `fopen()`.

### Задание №3 (Обработка форм и файлов)
```php
// Сохранение данных в файл
 $file = fopen('messages.txt', 'a+') or die("Недоступный файл!");
 foreach ($data as $field => $value) {
     // Строка для сохранения данных в файл
     fwrite($file, $field . ": " . $value . "\n");
 }
 fwrite($file, "\n");
 fclose($file);
 ```
 Эта строка кода использует функцию `fwrite()` для записи строки данных в файл, который представлен указателем на файл `$file`. Строка данных формируется путем конкатенации значений переменных `$field` и `$value`, разделенных двоеточием и пробелом, с добавлением символа новой строки "\n" в конце строки.
 ### Задание №4 (Регистрация и авторизация пользователей)
 ```php
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
```
Этот PHP-скрипт обрабатывает данные, отправленные с формы регистрации и формы авторизации.

# Форма регистрации:

При отправке формы происходит проверка введенных данных (имени и пароля) на пустоту и наличие ошибок.
Если данные прошли валидацию, они сохраняются в файле "users.txt" с хешированным паролем и происходит перенаправление на страницу "images.php".
# Форма авторизации:

При отправке формы происходит считывание введенного логина и пароля.
Считывается файл "users.txt" для проверки наличия пользователя с таким логином.
Если пользователь найден, проверяется соответствие хешированного пароля.
При успешной авторизации происходит перенаправление на страницу "images.php".
В случае ошибки (неправильный пароль или отсутствие пользователя) выводится соответствующее сообщение об ошибке.

# Общее:

Используются различные методы PHP для обработки данных формы, включая чтение/запись файлов, хеширование паролей и проверку данных на валидность.
Для вывода сообщений об ошибках используется массив $errors.
## Вывод 
Лабораторная работа №5-6 посвящена практическому применению и обрабатке данных из форм регистрации и авторизации. Также были успешно применены функции для записи и чтения файла.