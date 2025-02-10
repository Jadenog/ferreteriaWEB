<?php
if(!isset($_POST['buscar'])){$_POST['buscar'] = '';}

if(!empty($_POST)){
    function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>'){
        return ($string !== '' && $frase !== '')
        ?preg_replace('/('.preg_quote($frase, '/').')/i'.('true' ? 'u' : ''), $taga. '\\1'.$tagb, $string)
        :$string;

        $akeyword = explode("", $_POST['buscar']);
    }
}

?>