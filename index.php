<?php
class Employee {
    public $name;
    public $age;
    public $salary;
    
    public function getName(){
        return $this->name;
    }
    
    public function getAge(){
        return $this->age;
    }
    
    public function getSalary(){
        return $this->salary;
    }
    
    public function setAge($age){
        if($age >= 18){
            $this->age = $age;
        } else {
            echo "Вам работать в нашей компании еще рано<br>";
        }
    }
    
    private function checkAge($age){
        if($age >= 18){
            return true;
        } else {
            echo "Вам работать в нашей компании еще рано<br>";
            return false;
        }
    }
}

$worker1 = new Employee();
$worker2 = new Employee();

$worker1->name = "Ivan";
$worker1->age = 25;
$worker1->salary = 50000;

$worker2->name = "Maria";
$worker2->age = 30;
$worker2->salary = 60000;

$sumSalary = $worker1->salary + $worker2->salary;
$sumAge = $worker1->age + $worker2->age;
echo "Сумма зарплат: " . $sumSalary . "<br>";
echo "Сумма возрастов: " . $sumAge . "<br>";

echo "Имя: " . $worker1->getName() . "<br>";
echo "Возраст: " . $worker1->getAge() . "<br>";
echo "Зарплата: " . $worker1->getSalary() . "<br>";

$sumSalaryMethod = $worker1->getSalary() + $worker2->getSalary();
echo "Сумма зарплат через метод: " . $sumSalaryMethod . "<br>";

$worker1->setAge(20);
echo "Новый возраст Ivan: " . $worker1->getAge() . "<br>";
$worker1->setAge(16);
echo "Возраст Ivan после попытки установить 16: " . $worker1->getAge() . "<br>";

if($worker1->getAge() >= 18){
    echo "Работнику больше 18 лет: true<br>";
} else {
    echo "Работнику больше 18 лет: false<br>";
}
?>
