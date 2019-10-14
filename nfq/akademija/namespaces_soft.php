<?php

namespace nfq\akademija\soft_namespace;

function calculate(int...$numbers):int
    {
        $ats = 0;
        foreach ($numbers as $res)
            {
                $ats += $res;
            }
        return $ats;
    }


