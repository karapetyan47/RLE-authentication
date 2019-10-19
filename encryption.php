<?php

function transposition($data) {

    $key_sz = 3;
    $encryptedData = '';
    for ($i = 0; $i < $key_sz; $i++) {
        for ($j = $i; $j < strlen($data); $j+=$key_sz) {
            $encryptedData .= $data[$j];
        }
    }
    return $encryptedData;
}

function addCrc($data){
    // $c=0;
    // for($i=0;$i<strlen($data);++$i){
    //     if($data[$i]==='1')
    //         ++$c;
    // }
    // return "$data".decbin($c);
 declare(encoding='UTF-8');
 $t='';
$str = $data;
for ( $pos=0; $pos < strlen($str); $pos ++ ) {
 $byte = substr($str, $pos);
$t.=ord($byte)%2;
}
$str.=$t;
return $str;
}