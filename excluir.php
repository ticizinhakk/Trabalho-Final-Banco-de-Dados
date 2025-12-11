<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM alunos WHERE id = $id";

    if (mysqli_query($conexao, $sql)) {
        header("Location: tabela.php?msg=excluido");
        exit();
    } else {
        echo "Erro ao excluir!";
    }
} else {
    echo "ID não informado!";
}
?>


