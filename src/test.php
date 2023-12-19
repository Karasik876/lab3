<?php
class Product {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public static function __set_state($data) {
        $obj = new self($data['name'], $data['price']);
        return $obj;
    }
}

// Создаем объект класса Product
$product = new Product("Laptop", 999);

// Сериализуем объект в виде массива
$serializedProduct = var_export($product, true);

// Создаем объект из массива данных с помощью метода __set_state()
$recreatedProduct = eval('return ' . $serializedProduct . ';');

// Проверяем восстановленный объект
echo $recreatedProduct->name; // Выведет: Laptop
echo $recreatedProduct->price; // Выведет: 999
var_dump($product);
var_dump($recreatedProduct);
?>