<?php

class Shablon
{


    function getContent($tpl, array $data, $return = false)
    {

        $tpldir = ROOT . '/template/' . $tpl . '.tpl';

        ob_start();
        extract($data);
        include($tpldir);

        if ($return) {
            return ob_get_clean();
        }
        echo ob_get_clean();

    }

}
