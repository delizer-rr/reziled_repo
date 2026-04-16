<?php
class Page {
    private string $name = "page";
    private string $template = "<div><p>It is a default page</p></div>";
    
    public function render(): void {
        echo $this->template;
    }
}

class BlogPage extends Page {
    public function __construct() {
        $this->name = "blog";
        $this->template = "<div>
            <div style='border:1px solid #ccc; margin:10px; padding:10px;'>
                <h3>Огурец</h3>
                <p>Огурец - популярный овощ, используется в салатах</p>
            </div>
            <div style='border:1px solid #ccc; margin:10px; padding:10px;'>
                <h3>Помидор</h3>
                <p>Помидор - сочный овощ, богатый витаминами</p>
            </div>
            <div style='border:1px solid #ccc; margin:10px; padding:10px;'>
                <h3>Перец</h3>
                <p>Перец - хрустящий овощ, бывает разного цвета</p>
            </div>
        </div>";
    }
}
?>
