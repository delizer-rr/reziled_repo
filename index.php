<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Формы и калькулятор</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Регистрация</h1>
        
        <form action="action.php" method="POST">
            <!-- Имя -->
            <div class="form-group">
                <label>Имя:</label>
                <input type="text" name="name" placeholder="Введите имя" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" placeholder="email@example.com" required>
            </div>

            <!-- Пароль -->
            <div class="form-group">
                <label>Пароль:</label>
                <input type="password" name="password" placeholder="Введите пароль" required>
            </div>

            <!-- Пол -->
            <div class="form-group">
                <label>Пол:</label>
                <select name="gender" required>
                    <option value="">Выберите пол</option>
                    <option value="Мужской">Мужской</option>
                    <option value="Женский">Женский</option>
                </select>
            </div>

            <!-- Семейное положение -->
            <div class="form-group">
                <label>Семейное положение:</label>
                <div class="radio-group">
                    <label><input type="radio" name="status" value="Холост" required> Холост</label>
                    <label><input type="radio" name="status" value="Женат"> Женат</label>
                </div>
            </div>

            <!-- Согласие -->
            <div class="form-group">
                <label>
                    <input type="checkbox" name="agree" value="yes" required>
                    Согласен с условиями
                </label>
            </div>

            <button type="submit" class="btn">Зарегистрироваться</button>
        </form>

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
        ?>
    </div>
</body>
</html>
