<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
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

            <button type="submit" name="register_submit" class="btn">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>
