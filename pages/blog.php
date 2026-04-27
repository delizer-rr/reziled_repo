<?php include '../includes/header.php'; ?>

<main>
    <section class="blog-hero">
        <h1>Наш блог</h1>
        <p>Последние новости и статьи</p>
    </section>
    
    <section class="blog-grid">
        <?php
        $posts = [
            ['title' => 'Как начать программировать на PHP', 'date' => '15.04.2025', 'excerpt' => 'PHP - один из самых популярных языков для веб-разработки...', 'icon' => '🐘'],
            ['title' => '10 советов по оптимизации сайта', 'date' => '10.04.2025', 'excerpt' => 'Скорость загрузки сайта влияет на SEO и конверсию...', 'icon' => '⚡'],
            ['title' => 'Знакомство с Git и GitHub', 'date' => '05.04.2025', 'excerpt' => 'Система контроля версий - must have для разработчика...', 'icon' => '📚'],
            ['title' => 'Современный CSS: Grid и Flexbox', 'date' => '01.04.2025', 'excerpt' => 'Создавайте красивые адаптивные макеты легко...', 'icon' => '🎨'],
        ];
        foreach ($posts as $post): ?>
            <div class="blog-card">
                <div class="blog-icon"><?= $post['icon'] ?></div>
                <h3><?= $post['title'] ?></h3>
                <div class="blog-date"><?= $post['date'] ?></div>
                <p><?= $post['excerpt'] ?></p>
                <a href="#" class="read-more">Читать далее →</a>
            </div>
        <?php endforeach; ?>
    </section>
</main>
<?php include '../includes/footer.php'; ?>
