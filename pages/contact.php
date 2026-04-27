<?php include '../includes/header.php'; ?>

<?php
$success = false;
$error = false;
$formData = ['name' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData['name'] = htmlspecialchars(trim($_POST['name'] ?? ''));
    $formData['email'] = htmlspecialchars(trim($_POST['email'] ?? ''));
    $formData['message'] = htmlspecialchars(trim($_POST['message'] ?? ''));
    
    if (empty($formData['name']) || empty($formData['email']) || empty($formData['message'])) {
        $error = "Пожалуйста, заполните все поля";
    } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $error = "Введите корректный email адрес";
    } else {
        $success = true;
        // Здесь можно добавить отправку email
    }
}
?>

<main>
    <section class="contact-hero">
        <h1>Свяжитесь с нами</h1>
        <p>Мы всегда рады ответить на ваши вопросы</p>
    </section>
    
    <section class="contact-content">
        <div class="contact-info">
            <div class="info-item">
                <div class="info-icon">📍</div>
                <div class="info-text">
                    <h3>Адрес</h3>
                    <p>г. Москва, ул. Примерная, д. 123</p>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon">📞</div>
                <div class="info-text">
                    <h3>Телефон</h3>
                    <p>+7 (999) 123-45-67</p>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon">✉️</div>
                <div class="info-text">
                    <h3>Email</h3>
                    <p>info@vasilev.com</p>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon">🕐</div>
                <div class="info-text">
                    <h3>Режим работы</h3>
                    <p>Пн-Пт: 9:00 - 18:00</p>
                </div>
            </div>
        </div>
        
        <div class="contact-form">
            <?php if ($success): ?>
                <div class="alert success">
                    ✨ Спасибо, <?= $formData['name'] ?>! Ваше сообщение отправлено. Мы свяжемся с вами в ближайшее время.
                </div>
            <?php elseif ($error): ?>
                <div class="alert error">
                    ⚠️ <?= $error ?>
                </div>
            <?php endif; ?>
            
            <form method="post">
                <div class="form-group">
                    <label for="name">Ваше имя *</label>
                    <input type="text" id="name" name="name" value="<?= $formData['name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" value="<?= $formData['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="message">Сообщение *</label>
                    <textarea id="message" name="message" rows="5" required><?= $formData['message'] ?></textarea>
                </div>
                <button type="submit" class="btn-submit">Отправить сообщение →</button>
            </form>
        </div>
    </section>
</main>
<?php include '../includes/footer.php'; ?>
