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

1. Root funkcija, PHP automatiskai priskiria kintamojo tipa, priklausomai nuo reikmes. Pvz ‘1’→string, taciau, kadangi nera grieztai nurodoma, koks kintamojo tipas, grazina float reiksme be erroru. 
 var_dump(calculate(3,2.2,'1')) -> float(6.2)

2. NOT TYPED funkcija: 
function calculate(...$numbers):int - grazina naturaluji skaiciu, nes 
Veikimas: iskvieciame funkcija su bet kiek, bet kokio tipo argumentu, funkcija grazina tipa, kuri norodome type declaracijoje. Pvz. <...>:float, grazins realuji skaiciu. 


3. SOFT_TYPED funkcija 
function calculate(int...$numbers):int, 
Veikimas. Funkcija iskvieciame su bet kiek, bet kokio tipo argumentu. Funkcija tikisi naturaliuju skaiciu, taciau jei bus realiuju ar stringu, klaidos neismes, tiesiog priskirs visas reiksmes naturaliuju skaiciu tipui. Rezultatas grazinamas naturaliuju skaiciu tipu, del type deklaracijos :int.  

4. STRICT TYPED
Veikimas. Esant “strict type” deklaracijai “soft_typing” funkcija tampa “strict_typing”. Kintamuju tipu neatitikimas fiksuojamas ir grazinama TypeError klaida. 
iskviesta funkcija grazina int(6), nors tikejausi kad ismes errora. Paieskojes radau sitai:

https://www.php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.strict

declare(strict_types=1) -> veikia tik faile, kuriame yra deklaruotas. Jeigu kvieciama funkcija is kito deklaruoto failo, si netenka galios, nes pagal nutylejima puslapyje galioja weak typing. Ismeginau sitai ikeles deklaracija i savo index.php. Abi, soft typing ir strict typing funkcijos grazino TypeError klaida.
