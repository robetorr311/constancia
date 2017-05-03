<?php

/*
 * Convierte un ARRAY de postgres 
 * 
 * */
function pg_array_parse($s,$start=0,&$end=NULL){
    if (empty($s) || $s[0]!='{') return NULL;
    $return = array();
    $br = 0;
    $string = false;
    $quote='';
    $len = strlen($s);
    $v = '';
    for($i=$start+1; $i<$len;$i++){
        $ch = $s[$i];

        if (!$string && $ch=='}'){
            if ($v!=='' || !empty($return)){
                $return[] = $v;
            }
            $end = $i;
            break;
        }else
        if (!$string && $ch=='{'){
            $v = pg_array_parse($s,$i,$i);
        }else
        if (!$string && $ch==','){
            $return[] = $v;
            $v = '';
        }else
        if (!$string && ($ch=='"' || $ch=="'")){
            $string = TRUE;
            $quote = $ch;
        }else
        if ($string && $ch==$quote && $s[$i-1]=="\\"){
            $v = substr($v,0,-1).$ch;
        }else
        if ($string && $ch==$quote && $s[$i-1]!="\\"){
            $string = FALSE;
        }else{
            $v .= $ch;
        }
    }
    return $return;
}
?>
