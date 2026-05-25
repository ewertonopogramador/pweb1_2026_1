<?php


include_once '../database/db.class.php';


$conn = new db("aluno");


$dados = [
    'nome'=> "Ewerton",
    'telefone' => "4433",
    'email' => "ewerton@gmail.com",
];
$conn->store($dados);


echo "inserido bem rui";


?>
