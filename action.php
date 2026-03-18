<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Результат регистрации</h1>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Проверяем обязательные поля
            if (!isset($_POST['email']) || empty($_POST['email'])) {
                echo '<div class="result error">Ошибка: Email не заполнен!</div>';
            }
            elseif (!isset($_POST['password']) || empty($_POST['password'])) {
                echo '<div class="result error">Ошибка: Пароль не заполнен!</div>';
            }
            else {
                // Все хорошо - показываем данные
                echo '<div class="result">';
                echo '<h3>Регистрация успешна!</h3>';
                echo '<p>Имя: ' . $_POST['name'] . '</p>';
                echo '<p>Email: ' . $_POST['email'] . '</p>';
                echo '<p>Пол: ' . $_POST['gender'] . '</p>';
                echo '<p>Статус: ' . $_POST['status'] . '</p>';
                echo '</div>';
            }
            
            echo '<p><a href="index.php" class="btn">Назад</a></p>';
        }
        ?>
    </div>
</body>
</html>
