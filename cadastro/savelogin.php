<?php

include_once('../conexoes/conect.php');

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $nome_de_guerra = strtoupper($_POST['nome_de_guerra']);
  $telefone = $_POST['telefone'];
  $graduacao = strtoupper($_POST['graduacao']);
  $antiguidade = $_POST['antiguidade'];
  $folga = $_POST['folga'];
  $servico = strtoupper($_POST['servico']);
  $atividade = $_POST['atividade'];

  $sqlUpdate = "UPDATE militares SET  folga='$folga', antiguidade='$antiguidade', nome_de_guerra='$nome_de_guerra',servico='$servico', telefone='$telefone',graduacao='$graduacao',atividade='$atividade'
  WHERE id='$id' ";

  $result = $conect->query($sqlUpdate);
}{  
header('Location: ../militar/militares.php');
}