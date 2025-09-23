<?php
    function occurences($str,$char)
    {
        $count = 0;
        foreach (str_split($str) as $c) {
           if ($char == $c) {
               $count+=1;
           }
        }
        return $count;
    }

    print_r(occurences("stephane","e"));




