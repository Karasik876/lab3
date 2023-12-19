<?php


class MagicClass{

    public static $magicName = 'PHP';
    public $prop1 = 1;
    private $prop2 = 2;
    #private $id;
    private $data = array();
    public function sum($a, $b){
        return ($a+$b);
    }
    private function getDistance($x1, $y1, $x2, $y2){
        return sqrt(pow($x1-$x2, 2)+pow($y1-$y2,2));

    }
    public function __construct($id, $message){
        echo "MAGIC __construct";
        $this->id = $id;
        $this->message = $message;
    }
    #Как и в случае с конструкторами, деструкторы, объявленные в родительском классе, не будут вызываться автоматически
    public function __destruct(){
        echo "\n"."MAGIC __destruct ";
    }
    function __serialize(){
        echo PHP_EOL."MAGIC __serialize ";

        return [
            'id' => $this->id,
            'message' => $this->message,
        ];
    }

    function __unserialize(array $data){
        echo PHP_EOL."MAGIC __unserialize ";
        $this->id = $data['id'];
        $this->message = $data['message'];
        #Если в классе было сделано подключение к БД, то в __unserialize
        #Можно вернуть подключение, которое потерялось при использовании serialize
        #$this->link = new PDO($this->dsn, $this->username, $this->password);
    }
    public function __call($func, $args){
        return call_user_func_array([$this, $func], $args);
        echo PHP_EOL."MAGIC __call ";
        #throw new Exception('функция '. $func . ' не существует');
    }
    public static function __callStatic($func, $args)
    {
        echo PHP_EOL."MAGIC __callStatic ";
        echo PHP_EOL.self::$magicName.' static';
    }
    public function __set($name, $value) {
        echo PHP_EOL."MAGIC __set";
        echo PHP_EOL."Добавлено '$name' со значением '$value'" . PHP_EOL;
        $this->data[$name] = $value;
    }
    public function __get($name){
        echo PHP_EOL."MAGIC __get";
        if ($name=="magicName"){
            return self::$magicName;
        } else if (array_key_exists($name, $this->data)){
            return $this->data[$name];
        } else if (!is_null($this->$name)){
            return $this->$name;
        }
        return null;
    }
    public function __isset($name)
    {
        echo PHP_EOL."Установлено ли '$name'?\n";
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo PHP_EOL."Уничтожение '$name'\n";
        unset($this->data[$name]);
    }
    public function __toString()
    {
        echo PHP_EOL."MAGIC __toString";
        return $this->message;
    }
    public function __invoke($s){
        echo PHP_EOL.'MAGIC __invoke';
        if ($s == "magic"){
            return '◕‿‿◕';
        }
        return ':(';
    }
}

?>