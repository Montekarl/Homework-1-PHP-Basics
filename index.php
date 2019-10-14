<?php
    
    require __DIR__ . "/vendor/autoload.php";
    
    use function nfq\akademija\soft_namespace\calculate as soft;
    use function nfq\akademija\NotTyped_namespace\calculate as not_typed;
    use function nfq\akademija\strict_namespace\calculate as strict;
    
    $climate = new League\CLImate\CLImate;

    echo PHP_EOL;
    $climate->tab(3)->out('Namu darbai #1 PHP/Basics.');
    echo PHP_EOL;

    function calculate(...$numbers)
    {
        $ats = 0;
        foreach ($numbers as $res)
            {
                $ats += $res;
            }
        return $ats;
    }

    echo "root\calculate: ".calculate(3,2.2,'1') . PHP_EOL;
    echo "nfq\akademija\NotTyped_Namespace\calculate: ".not_typed(3,2.2,'1') . PHP_EOL;
    echo "nfq\akademija\Soft_Namespace\calculate: ".soft(3,2.2,'1') . PHP_EOL;
   
    try{
        echo "nfq\akademija\Strict_Namespace\calculate: ".strict(3,2.2,'1') . PHP_EOL;
    }catch(TypeError $e){
        echo "Klaida: ".$e->getMessage();
    }
    
    $climate->comment('The last Namespace would under normal circuimstances return and error, however since theres a weak typing in index.php it overrides the strict typing.');

