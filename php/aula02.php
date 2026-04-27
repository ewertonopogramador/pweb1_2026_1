<?php 

    $pessoas = [
        ["nome"=>"Jackson Five", "idade" =>38],
        ["nome"=>"Ana", "idade" =>18],
        ["nome"=>"Chaves", "idade" =>10],
    ]; 
    
    foreach ($pessoas as $key => $item){
         echo "Indice: $key valor: $item <br>"; 
         } 
?>