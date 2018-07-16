<?php
function u8_title_substr($str, $width = 0, $end = '...', $x3 = 0) {  
    global $CFG; // 全局变量保存 x3 的值  
    if ($width <= 0 || $width >= strlen($str)) {  
        return $str;  
    }  
    $arr = str_split($str);  
    $len = count($arr);  
    $w = 0;  
    $width *= 10;  
  
    // 不同字节编码字符宽度系数  
    $x1 = 11;   // ASCII  
    $x2 = 16;  
    $x3 = $x3===0 ? ( $CFG['cf3']  > 0 ? $CFG['cf3']*10 : $x3 = 21 ) : $x3*10;  
    $x4 = $x3;  
  
    // http://zh.wikipedia.org/zh-cn/UTF8  
    for ($i = 0; $i < $len; $i++) {  
        if ($w >= $width) {  
            $e = $end;  
            break;  
        }  
        $c = ord($arr[$i]);  
        if ($c <= 127) {  
            $w += $x1;  
        }  
        elseif ($c >= 192 && $c <= 223) { // 2字节头  
            $w += $x2;  
            $i += 1;  
        }  
        elseif ($c >= 224 && $c <= 239) { // 3字节头  
            $w += $x3;  
            $i += 2;  
        }  
        elseif ($c >= 240 && $c <= 247) { // 4字节头  
            $w += $x4;  
            $i += 3;  
        }  
    }  
  
    return implode('', array_slice($arr, 0, $i) ). $e;
}
?>