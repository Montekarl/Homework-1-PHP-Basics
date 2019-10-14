Namu darbu uzduotis 1 / PHP Pagrindai

    1.echo "root\calculate: ".calculate(3,2.2,'1') . PHP_EOL;
    
    2. use function nfq\akademija\NotTyped_namespace\calculate as not_typed;
    echo "nfq\akademija\NotTyped_Namespace\calculate: ".not_typed(3,2.2,'1') . PHP_EOL;

    3. use function nfq\akademija\soft_namespace\calculate as soft;
    echo "nfq\akademija\Soft_Namespace\calculate: ".soft(3,2.2,'1') . PHP_EOL;

    4. use function nfq\akademija\strict_namespace\calculate as strict;
    try{
        echo "nfq\akademija\Strict_Namespace\calculate: ".strict(3,2.2,'1') . PHP_EOL;
    }catch(TypeError $e){
        echo "Klaida: ".$e->getMessage();
    }
<br>    
1. Root funkcija, kuri tiesiog sudeda visus tris atributus ir isveda realuji skaiciu.
var_dump(calculate(3,2.2,'1')) -> float(6.2)
<br><br>
2. funkcija: <i>function calculate(...$numbers)<b>:int</b></i> - grazina naturaluji skaiciu, nes :int to reikalauja.<br> Idomumo delei pakeiciau :int i :float. Grazino 6.2, kaip ir pries tai buvusi funkcija. <br>
<i>function calculate(...$numbers):<b>float</b></i><br>
var_dump(not_Typed(3,2.2,'1')) -> float(6.2)<br>
siuo atveju <i>function calculate(...$numbers):<b>int</b></i> grazina: <br>
var_dump(not_Typed(3,2.2,'1')) -> int(6)
<br><br>
3. iskviesta funkcija <i>function calculate(int...$numbers)<strike>:int</strike> </i> grazina naturaluji skaiciu. Siuo atveju isbraukiau :int, kaip aprasyta namu darbu salygoje, nes weak typing ir taip grazina naturaliaja reiksme. Patvirtinau megindamas sukurti konflikta.<br>
function calculate(<b>int</b>...$numbers):<b>float</b><br>
var_dump(soft(3,2.2,'1')) -> int(6)<br>
Isvada, calculate(<b>int</b>...$numbers):<b>int</b> = sviestas sviestuotas, o calculate(<b>int</b>...$numbers):<b>float</b> = bergzdzias kodas.<br> 
<br>
4. iskviesta funkcija grazina int(6), nors tikejausi kad ismes errora. Paieskojes radau sitai:
<br><br>
https://www.php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.strict
<br><br>
declare(strict_types=1) -> veikia tik faile, kuriame yra deklaruotas. Jeigu kvieciama funkcija is kito deklaruoto failo, si netenka galios, nes pagal nutylejima puslapyje galioja weak typing. Ismeginau sitai ikeles deklaracija i savo index.php. Abi, soft typing ir strict typing funkcijos grazino TypeError klaida. 
