<?php
print("Hola team!");
echo "Hola con echo";
$nombre = "John";
$nombre = 1;
$nombre = true;
$dec = 2.1;
//string types
$t1 = "Hola {$nombre}
sdsd 
";

$t2 = 'Hola $nombre
sdsddsd
kshdkd
';

$heredoc = <<<EOF
lkfjdslkfjslkdf
#almf;dsmv
d;l,fs;df
$nombre
" '  
EOF;

// = - * / %
$sqr = 30**2;

echo "<hr/>";
$hola = "Hola Mundo";
$array = explode(' ',$hola);
echo $array[0]."\n";
echo $hola[1];

$array_demo = [
    "uno" => 1,
];
$array_demo['dos'] = 2;
echo "<hr/>";
foreach ($array_demo as $key => $value) {
    echo $key;
    echo $value;
    echo "<hr/>";
}
echo "<hr/>";
print_r($array_demo);
echo "<hr/>";
var_dump($array_demo);
echo "<hr/>";
// phpinfo();

//clases -> Objetos -> herencia  -> polimorfismo
define("GLOBAL_CONSTANTE",1);
GLOBAL_CONSTANTE;

class Shape {
    public $area;
    private $color;
    protected $noAngles;

    const NAME="FIGURA";

    public function calculateArea($sidea, $sideb){
        $this->area = $sidea*$sideb;
    }

    public function getColor() {
        return $this->color;
    }
    public function setColor($color) {
        $this->color = $color;
    }

    public function __construct($color="red", $noAngles=2){
        $this->color = $color;
        $this->noAngles = $noAngles;
    }

    public function __destruct(){

    }

    public static function showVersion(){
        return 1;
    }
}

class Square extends Shape{
    protected $noLados;
    public function perimeter(){
        $this->area = $this->area *4;
    }
    public function __construct($color="red", $noAngles=4){
        parent::__construct($color,$noAngles);
    } 
    public function calculateArea($sidea, $sideb){
        parent::calculateArea($sidea, $sideb);
        $this->area = 2 *$sidea + $sideb;
    }
    public function getColor() {
        $color = parent::getColor();
        if($color === "red"){
            return "green";
        }
        return $color;
    }
}

$square = new Shape();
$square2 = new Shape("blue");
$square3 = new Square("green", 4);
$square->area;
$square::NAME;
Shape::NAME;
$square = null; //destruccion objeto
Shape::showVersion();
// $square->noAngles;
// $square->color;