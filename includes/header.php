<header>
    <div class="logo">
        <span class="logo-icon">🌟</span>
        <span class="logo-text">Мой Сайт</span>
    </div>
    <nav>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-menu" id="navMenu">
            <li><a href="/index.php" class="<?= $_SERVER['REQUEST_URI'] == '/index.php' || $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?>">Главная</a></li>
            <li><a href="/pages/about.php" class="<?= strpos($_SERVER['REQUEST_URI'], 'about') !== false ? 'active' : '' ?>">О нас</a></li>
            <li><a href="/pages/contact.php" class="<?= strpos($_SERVER['REQUEST_URI'], 'contact') !== false ? 'active' : '' ?>">Контакты</a></li>
            <li><a href="/pages/blog.php" class="<?= strpos($_SERVER['REQUEST_URI'], 'blog') !== false ? 'active' : '' ?>">Блог</a></li>
        </ul>
    </nav>
</header>
