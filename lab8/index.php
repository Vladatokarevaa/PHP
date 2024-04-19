<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>

    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #e8eff1;
    }

    header {
        background-color: #4a77d4;
        color: #ffffff;
        padding: 20px 0;
        text-align: center;
    }

    header h1 {
        margin: 0;
        font-size: 26px;
    }

    nav ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
        text-align: center;
    }

    nav ul li {
        display: inline;
        margin-right: 15px;
    }

    nav ul li a {
        color: #ffffff;
        text-decoration: none;
        font-weight: bold;
    }

    main {
        padding: 30px 15px;
    }

    section {
        margin-bottom: 30px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    form {
        background-color: #ffffff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    form label {
        display: block;
        margin-bottom: 10px;
        color: #333333;
        font-weight: bold;
    }

    form input[type="text"],
    form textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    form input[type="submit"] {
        background-color: #4a77d4;
        color: #ffffff;
        border: none;
        padding: 12px 25px;
        cursor: pointer;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    form input[type="submit"]:hover {
        background-color: #3561a7;
    }

    .comments {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .comments h2 {
        margin-top: 0;
        color: #333333;
    }

    footer {
        background-color: #4a77d4;
        color: #ffffff;
        padding: 20px 0;
        text-align: center;
    }

    footer p {
        margin: 5px 0;
    }

    footer ul {
        padding: 0;
        list-style-type: none;
        margin-top: 10px;
        text-align: center;
    }

    footer ul li {
        display: inline;
        margin-right: 15px;
    }

    footer ul li a {
        color: #ffffff;
        text-decoration: none;
    }
</style>


</head>
<body>

<?php
require_once('Page.php');
?>

<?php Page::part('views/header'); ?>
    <main>
        <section>
            <h2>My Website</h2>
            <p>Тут вы можете оставить свой комментарий и прочитать комментарии других пользователей!</p>
        </section>

        <!-- Форма для комментариев -->
        <?php include('views/components/form.php'); ?>

        <!-- Комментарии -->
        <?php include('views/components/comments.php'); ?>
    </main>
</body>
<?php Page::part('views/footer'); ?>
</html>
