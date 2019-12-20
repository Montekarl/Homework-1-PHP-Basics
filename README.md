Namų darbų užduotis 1 / PHP Pagrindai

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

1. Root funkcija:

automatiškai priskiriamas labiausiai tinkantis kintamojo tipas
*Jei yra realiųjų skaičių - priskirs realiesiems, jei nėra priskirs natūraliesiems. <br>
**Pastaba: Realieji 'stringai' irgi priskiriami realiesiems skaičiams.

        *var_dump(calculate(3,2.2,'1')) -> float(6.2)
        **var_dump(calculate(3,'2.2')) -> float(5.2), siuo pavyzdziu meginau pakeisti 'naturaluji stringa' i 'realuji stringa' ir  paziuret ar sie irgi konvertuojami i floatus. 

2. NOT TYPED funkcija: 

Prieš grąžinant funkcijos reikšmę visi argumentai konvertuojami į deklaracijoje nurodytą tipą. 
                        
       Pvz.: function calculate(...$x):float // ∀ x ∈ R
        
Pastaba (sau): atliekant papildomus veiksmus su grąžinta reikšme, šios konvertuojamos į funkcijoje naudotą kintamojo tipą. 

        return $y+'1.2'; // prie realios reiksmes meginu prideti stringa. 
        echo not_typed(3,2.2,'1');
        7.4
        
3. SOFT_TYPED funkcija 

Naudojama vadinama 'Coercive Scalar Type' deklaracija. Veikia taip. 

function calculate(int...$numbers):int, 
Funkcija iškviečiame su bet kiek, bet kokio tipo argumentų. Tuomet konvertuoja įvestus argumentus pagal nurodytą type deklaraciją (int...) toliau funkcijos reikšmė konvertuojama į 'return type' deklaracija ir gražinama. 
Taigi: 
calculate(int...$numbers):float
echo calculate('1', 2.2, 3) -> 1 + 2 + 3 -> konvertuojama į 6.0 
Pastaba: rodoma kaip 6, kas gali klaidinti, nors ištiesų yra realusis skaičius. 
var_dump(soft(3,2.2,'1')); ->  float(6)

Jeigu meginsime atlikti papildomus veiksmus su gražinta reikšme, visos papildomos reikšmės konvertuojamos į funkcijos gražintą kintamojo tipą. 
Pvz. 
function calculate(int...$numbers):float
    {
        $ats = 0;
        foreach ($numbers as $res)
            {
                $ats += $res;
            }
       <b><u> return $ats+1; </u></b> 1 bus FLOAT
    }

Tuomet prieiname vietą, kur svarbu turim strict typing ar ne. 

4. STRICT TYPED funkcija. 
STRICT tikrina ar funkcijos gražinta reikmšė turi tipų konfliktą. Pvz šiame pavyzdyje išmes TypeError klaidą. 

            function calculate(int...$numbers):int
            {
                $ats = 0;
                foreach ($numbers as $res)
                    {
                        $ats += $res;
                    }
                return $ats+1.0; <-Type Error
                return $ats; <- No Type Error
            }

Kadangi NAMING DECLARATION (:int) turėtų ∈ N, return reikšmė irgi turėtų ∈ N. Pridėjus realųjį skaičių, atsiranda konfliktas ir metamas erroras. 

Namų darbe iškviesta funkcija grąžina int(6), nors tikėjausi, kad išmes klaidą. Paieškojęs radau:
https://www.php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.strict

declare(strict_types=1) -> veikia tik faile, kuriame yra deklaruotas. Jeigu kviečiama funkcija iš kito deklaruoto failo, ši netenka galios, nes pagal nutylėjimą puslapyje galioja weak typing. Išmeginau šitai įkelęs deklaraciją į savo index.php. Abi, soft typing ir strict typing funkcijos grazino TypeError klaidą.

