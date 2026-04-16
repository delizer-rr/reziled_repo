<?php
class Page {
    protected string $name = "page";
    protected string $template = "<div><p>It is a default page</p></div>";
    
    public function render(): void {
        echo $this->template;
    }
}

class BlogPage extends Page {
    public function __construct() {
        $this->name = "blog";
        $this->template = "<div>
            <div style='border:1px solid #ccc; margin:10px; padding:10px; border-radius:5px;'>
                <h3>🥒 Огурец</h3>
                <p>Огурец - популярный овощ, используется в салатах</p>
            </div>
            <div style='border:1px solid #ccc; margin:10px; padding:10px; border-radius:5px;'>
                <h3>🍅 Помидор</h3>
                <p>Помидор - сочный овощ, богатый витаминами</p>
            </div>
            <div style='border:1px solid #ccc; margin:10px; padding:10px; border-radius:5px;'>
                <h3>🫑 Перец</h3>
                <p>Перец - хрустящий овощ, бывает разного цвета</p>
            </div>
            <div style='border:1px solid #ccc; margin:10px; padding:10px; border-radius:5px;'>
                <h3>🥕 Морковь</h3>
                <p>Морковь - полезный овощ, содержит бета-каротин</p>
            </div>
        </div>";
    }
}

echo "<div style='margin:20px;'>";
echo "<a href='?page=page' style='margin-right:20px; padding:10px; background:#4CAF50; color:white; text-decoration:none; border-radius:5px;'>Главная страница</a>";
echo "<a href='?page=blog' style='padding:10px; background:#2196F3; color:white; text-decoration:none; border-radius:5px;'>Блог об овощах</a>";
echo "</div>";

if(isset($_GET['page'])) {
    if($_GET['page'] === 'page') {
        $page = new Page();
        $page->render();
    } elseif($_GET['page'] === 'blog') {
        $blog = new BlogPage();
        $blog->render();
    } else {
        echo "<p>Страница не найдена</p>";
    }
} else {
    $page = new Page();
    $page->render();
}
?>
