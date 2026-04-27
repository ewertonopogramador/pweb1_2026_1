<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site PHP</title>
</head>
<body>
    <?php
        echo "Olá Mundo!<br>";

        $idade = 17;
        $nome = "Ewerton";

        echo " O  nome é $nome<br>";
        if($idade <= 18){
            echo "$nome é de menor<br>" ;
        } else {
            echo "$nome é de maior<br> " ;
        }
        echo "ele tem $idade anos ";

        $notas = [5,7,10,9];

        //print_r($notas);
        echo"<br>";
        for($i = 0; $i<count($notas); $i++) {
            echo $notas[$i] . "<br>";
        }
        
        //mais dinamico o foreach
        echo"<br>";
        foreach ($notas as $item){
            echo $item . "<br>";
        }


        $nomes = ["Jackson Five", "Maria", "Ellen", "Arthur"];

        echo"<br>";
        for($i = 0; $i<count($nomes); $i++) {
            echo $nomes[$i] . "<br>";
        }
        
        echo"<br>";
        foreach ($nomes as $item){
            echo $item . "<br>";
        }


        $carro = [ 'modelo' => "Mustang", 'cor' => "Branco", "ano" => 2026];
        
        echo"<br>";
        echo $carro['modelo'] . " - " . $carro['cor'];

    ?>
     
    <p>Meu site <?=  $carro['modelo'] . " - Ano:" . $carro['ano']  ?></p>
    
</body>

</html>