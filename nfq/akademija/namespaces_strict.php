<?php declare(strict_types=1);

namespace nfq\akademija\strict_namespace;

function calculate(int...$numbers):int
    {
        $ats = 0;
        foreach ($numbers as $res)
            {
                $ats += $res;
            }
        return $ats;
    }



