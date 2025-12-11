<?php
include "conexao.php";
session_start();


// Verifica se está logado
if(!isset($_SESSION['email'])) {
    $_SESSION['form_msg'] = "Você precisa estar logado para enviar o formulário.";
    header('Location: index.php');
    exit();
}

// Captura e sanitiza os dados do formulário
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$nasc = mysqli_real_escape_string($conexao, $_POST['data_nascimento']);
$rua = mysqli_real_escape_string($conexao, $_POST['rua']);
$numero = mysqli_real_escape_string($conexao, $_POST['numero']);
$bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
$cep = mysqli_real_escape_string($conexao, $_POST['cep']);
$responsavel = mysqli_real_escape_string($conexao, $_POST['responsavel']);
$tipo_responsavel = mysqli_real_escape_string($conexao, $_POST['tipo_responsavel']);
$curso = mysqli_real_escape_string($conexao, $_POST['curso']);
$obs = mysqli_real_escape_string($conexao, $_POST['obs']);

// INSERIR NO BANCO
$sql = "INSERT INTO alunos
(nome, data_nascimento, rua, numero, bairro, cep, responsavel, tipo_responsavel, curso, obs)
VALUES
('$nome', '$nasc', '$rua', '$numero', '$bairro', '$cep', '$responsavel', '$tipo_responsavel', '$curso', '$obs')";

if (mysqli_query($conexao, $sql)) {
    $_SESSION['form_msg'] = "Cadastro realizado com sucesso!";
} else {
    $_SESSION['form_msg'] = "Erro ao cadastrar: " . mysqli_error($conexao);
}

header('Location: telaformulario.php');
exit();
?>
