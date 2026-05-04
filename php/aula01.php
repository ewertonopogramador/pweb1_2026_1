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
        //teste
        echo"<br>";
        for($i = 0; $i<count($nomes); $i++) {
            echo $nomes[$i] . "<br>";
        }
        
        echo"<br>";
        foreach ($nomes as $item){
            echo $item . "<br>";
        }

        echo "<br>";
        $carros =[[ 'modelo' => "Mustang", 'cor' => "Branco", "ano" => 2026],
                 [ 'modelo' => "Fusca", 'cor' => "Azul", "ano" => 1973],
                 [ 'modelo' => "Brasilia", 'cor' => "Amarela", "ano" => 1979],
                 
        ];

        echo $carros[0]['modelo'] . " - " . $carros[0]['cor'];
        echo "<br>";

        foreach($carros as $indice => $carro) {
            echo $indice + 1;
            echo "Modelo". $carro['modelo']. "Ano:" . $carro['ano'];
            //var dump($carro);
            //exit;
            //foreach($carro as $item){
           //     echo"Modelo: " . $item['modelo']. "Ano: " . $item['ano'];
          //  }
          echo "<br>";
        }

    ?>
     
    <p>Meu site <?=  $carros[0]['modelo'] . " - Ano:" . $carros[0]['ano']  ?></p>

    <?php
    include "./aula02.php";
    ?>
    
</body>

</html>