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

1. Root funkcija:

automatiskai priskiriamas labiausiai tinkantis kintamojo tipas
*Jei yra realiuju skaiciu - priskirs realiesiems, jei nera priskirs naturaliesiems. <br>
**Pastaba: Realieji 'stringai' irgi priskiriami realiesiems skaiciams.

        *var_dump(calculate(3,2.2,'1')) -> float(6.2)
        **var_dump(calculate(3,'2.2')) -> float(5.2), siuo pavyzdziu meginau isimti 'naturaluji stringa' ir pameginau paziuret ar realieji stringai irgi konvertuojami. 

2. NOT TYPED funkcija: 

Pries grazinant funkcijos reiksme visi argumentai konvertuojami i deklaracijoje nurodyta tipa. 
                        
       Pvz.: function calculate(...$x):float // ∀ x ∈ R
        
Pastaba: atliekant papildomus veiksmus su grazinta reiksme, reiksmes konvertuojamos i funkcijos kintamojo tipa. 

        return $y+'1.2'; // prie realios reiksmes meginu prideti stringa. 
        echo not_typed(3,2.2,'1');
        7.4
        
3. SOFT_TYPED funkcija 

Naudojamas vadinama 'Coercive Scalar Type' deklaracija. Veikia taip. 

function calculate(int...$numbers):int, 
Funkcija iskvieciame su bet kiek, bet kokio tipo argumentu. Tuomet konvertuoja ivestus argumentus pagal nurodyta type deklaracija (int...). Tuomet funkcijos reiksme konvertuojama i 'return type' deklaracija ir grazinama. 
Taigi: 
calculate(int...$numbers):float
echo calculate('1', 2.2, 3) -> 1 + 2 + 3 -> konvertuojama i 6.0 
Pastaba: rodoma kaip 6, kas gali klaidinti, nors istiesu yra realusis skaicius. 
var_dump(soft(3,2.2,'1')); ->  float(6)

Jeigu meginsime atlikti papildomus veiksmus su grazinta reiksme, visos papildomos reiksmes konvertuojamos i funkcijos grazinta kintamojo tipa. 
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

Tuomet prieiname vieta, kur svarbu turim strict typing ar ne. 

4. STRICT TYPED funkcija. 
STRICT tikrina ar funkcijos grazinta reiksme turi tipu konflikta. Pvz siame pavyzdyje ismes TypeError klaida. 

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

Kadangi NAMING DECLARATION (:int) turetu ∈ N, return reiksme irgi turetu ∈ N. Pridejus realuji skaiciu, atsiranda konfliktas ir metamas erroras. 

Namu darbe iskviesta funkcija grazina int(6), nors tikejausi kad ismes errora. Paieskojes radau sitai:
https://www.php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.strict

declare(strict_types=1) -> veikia tik faile, kuriame yra deklaruotas. Jeigu kvieciama funkcija is kito deklaruoto failo, si netenka galios, nes pagal nutylejima puslapyje galioja weak typing. Ismeginau sitai ikeles deklaracija i savo index.php. Abi, soft typing ir strict typing funkcijos grazino TypeError klaida.

