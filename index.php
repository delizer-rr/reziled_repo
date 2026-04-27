<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная | Мой красивый сайт</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🌟</text></svg>">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main>
        <section class="hero">
            <h1>Добро пожаловать!</h1>
            <p>Это мой современный сайт, созданный с любовью и PHP</p>
            <a href="/pages/about.php" class="btn">Узнать больше</a>
        </section>
        
        <section class="features">
            <div class="feature-card">
                <div class="emoji">🚀</div>
                <h3>Быстро</h3>
                <p>Оптимизированная производительность</p>
            </div>
            <div class="feature-card">
                <div class="emoji">🎨</div>
                <h3>Красиво</h3>
                <p>Современный дизайн</p>
            </div>
            <div class="feature-card">
                <div class="emoji">🔒</div>
                <h3>Безопасно</h3>
                <p>Надежная защита данных</p>
            </div>
        </section>
    </main>
    
    <?php include 'includes/footer.php'; ?>
</body>
</html>
