<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        // Проверяем, это отправка формы регистрации или калькулятора?
        if (isset($_POST['register_submit'])) {
            // Это форма регистрации
            ?>
            <h1>Результат регистрации</h1>
            <?php
            
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
        }
        ?>
        
        <!-- Калькулятор всегда виден -->
        <h2>Калькулятор</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Число 1:</label>
                <input type="number" name="num1" step="any" required>
            </div>
            
            <div class="form-group">
                <label>Число 2:</label>
                <input type="number" name="num2" step="any" required>
            </div>
            
            <div class="calc-buttons">
                <button type="submit" name="operation" value="add" class="btn">+</button>
                <button type="submit" name="operation" value="subtract" class="btn">-</button>
                <button type="submit" name="operation" value="multiply" class="btn">×</button>
                <button type="submit" name="operation" value="divide" class="btn">÷</button>
            </div>
        </form>

        <?php
        // Обработка калькулятора
        if (isset($_POST['operation'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $op = $_POST['operation'];
            
            if (is_numeric($num1) && is_numeric($num2)) {
                switch($op) {
                    case 'add':
                        $result = $num1 + $num2;
                        break;
                    case 'subtract':
                        $result = $num1 - $num2;
                        break;
                    case 'multiply':
                        $result = $num1 * $num2;
                        break;
                    case 'divide':
                        if ($num2 == 0) {
                            echo '<div class="result error">Ошибка: деление на ноль!</div>';
                            $result = null;
                        } else {
                            $result = $num1 / $num2;
                        }
                        break;
                }
                
                if (isset($result)) {
                    echo '<div class="result">Результат: ' . $result . '</div>';
                }
            }
        }
        
        echo '<p><a href="index.php" class="btn">На главную</a></p>';
        ?>
    </div>
</body>
</html>
