
<?php
function RLE($code): string{

$encode = '';

for ($i = 0; $i < strlen($code);$i++){
    $smb = $code[$i] ;
    $count = 1 ;
    for ($b = $i; $b < strlen($code);$b++){
        if ($code[$b + 1] != $smb) break ;
        $count++ ;

        $i++ ;
    }
    $encode .= $count . $smb ;
}
	return $encode;
}




