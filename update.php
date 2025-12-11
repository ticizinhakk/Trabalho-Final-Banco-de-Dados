<?php
include('conexao.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$responsavel = $_POST['responsavel'];
$tipo_responsavel = $_POST['tipo_responsavel'];
$curso = $_POST['curso'];
$obs = $_POST['obs'];

$sql = "UPDATE alunos SET 
            nome='$nome', 
            data_nascimento='$data_nascimento',
            rua='$rua',
            numero='$numero',
            bairro='$bairro',
            cep='$cep',
            responsavel='$responsavel',
            tipo_responsavel='$tipo_responsavel',
            curso='$curso',
            obs='$obs'
        WHERE id=$id";

if (mysqli_query($conexao, $sql)) {
    header("Location: tabela.php?msg=editado");
    exit();
} else {
    echo "Erro ao atualizar!";
}
?>
