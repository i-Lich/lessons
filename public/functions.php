<?php
    function tableOfTrue($op)
    {
        echo '<table border="1">';
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