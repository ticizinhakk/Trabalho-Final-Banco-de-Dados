<?php
// dados_grafico_tipo.php
session_start();
include('conexao.php');

header('Content-Type: application/json');

// Consulta #1: Total de Registros por Tipo (para Gráfico de Pizza)
$query = "SELECT tipo, COUNT(*) as total FROM informacoes GROUP BY tipo";
$result = mysqli_query($conexao, $query);

if (!$result) {
    echo json_encode(["error" => "Erro na consulta: " . mysqli_error($conexao)]);
    exit();
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>