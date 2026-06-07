<?php

include_once "./database/db.class.php";

$db = new db('usuarios');

var_dump($db->all());
