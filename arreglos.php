<?php
# Los arreglos se crean utilizando el operador array()
#Pueden contener cualquier tipo de dato.$_COOKIE

$arreglo = array('cadena',1234,3.1416,true,false,'otro');

for($i = 0; $i < count($arreglo); $i++){
    echo $arreglo[$i]."<br>";
}

rsort($arreglo);
foreach($arreglo as $elem){
    echo $elem. '<br>';
}

sort($arreglo);
echo '<ul>'
foreach($arreglo as $elem){
    echo '<li>'.$elem.'</li>';
}
echo '</ul>'
?>