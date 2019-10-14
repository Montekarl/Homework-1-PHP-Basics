<?php

namespace nfq\akademija\NotTyped_namespace;

function calculate(...$numbers):int
    {
        $ats = 0;
        foreach ($numbers as $res)
            {
                $ats += $res;
            }
        return $ats;
    }

