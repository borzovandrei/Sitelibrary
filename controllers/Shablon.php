<?php

class Shablon
{

    private $vars = array();
    private $content;
    private $parse_tpl;


    function parse($tpl)
    {
        $this->parse_tpl = file_get_contents($tpl);
        foreach ($this->vars as $k => $v) {
            $this->parse_tpl = str_replace($k, $v, $this->parse_tpl);
        }
        return $this->parse_tpl;
    }



    function getContent($tpl, array $date)
    {
        $tpldir=ROOT.'/template/shablons/'.$tpl.'.tpl';
        $this->content = file_get_contents($tpldir);


        preg_match_all("/\{include\=(.*?[.tpl])\}/is", $this->content, $mas);
        foreach ($mas[0] as $k => $v) {
            $this->content = str_replace($mas[0][$k], $this->parse($mas[1][$k]), $this->content);
        }

        foreach ($date as $key => $val) {
            $this->content = str_replace($key, $val, $this->content);
        }
        echo $this->content;
    }


}
