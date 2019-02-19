<?php
     session_start();

     $id = $_SESSION['id'];
     $titulo = str_replace('#', '-', $_POST['titulo']);
     $categoria = str_replace('#', '-', $_POST['categoria']);
     $descricao = str_replace('#', '-', $_POST['descricao']);

     $texto = $id . '#' .$titulo . ' # ' . $categoria . ' # ' . $descricao . PHP_EOL;

     $arquivo = fopen('../dados/arquivo.hd', 'a');
     fwrite($arquivo, $texto);
     fclose($arquivo);

     header('Location: ../abrir_chamado.php');
     
?>