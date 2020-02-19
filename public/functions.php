<?php
    function tableOfTrue($op)
    {
        echo '<table>';
        echo '<tr><td>a</td><td>b</td><td>a '. $op .' b</td></tr>';
        for ($a = 0; $a <= 1; $a++){
            echo '<tr>';
            for ($b = 0; $b <= 1; $b++){
                switch ($op){
                    case '&': {
                        $c = ($a & $b);
                        break;
                    }
                    case '||':{
                        $c = ($a || $b);
                        break;
                    }
                    case 'xor':{
                        $c = ($a xor $b);
                        break;
                    }
                    default: {
                        $c = '&';
                        break;
                    }
                }
                echo '<td>' . $a . '</td><td>' . $b . '</td><td>' . (int)$c  . '</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
    }

    function discriminant($coefficient1,$coefficient2,$coefficient3)
    {
        return (pow($coefficient2,2) - 4 * $coefficient1 * $coefficient3);
    }

    function positiveRadical($coefficient1,$coefficient2,$D)
    {
        return ((-$coefficient2 + sqrt($D))/2*$coefficient1);
    }

    function negativeRadical($coefficient1,$coefficient2,$D)
    {
        return ((-$coefficient2 - sqrt($D))/2*$coefficient1);
    }