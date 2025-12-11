<?php
session_start();
include('verifica_login.php');
include('menu.php');
include('conexao.php');

// Buscar os alunos do banco
$sql = "SELECT * FROM alunos ORDER BY id DESC";
$result = mysqli_query($conexao, $sql);

// Criando ID externo automático somente para exibição
$contador = 1;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h2 class="mb-4">Alunos Registrados</h2>

    <table class="table table-striped table-hover shadow-sm rounded">
      <thead class="table-primary">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Nascimento</th>
          <th scope="col">Responsável</th>
          <th scope="col">Tipo do Responsável</th>
          <th scope="col">Bairro</th>
          <th scope="col">Curso</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>

      <tbody>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                echo "<tr>
                        <th scope='row'>{$contador}</th>
                        <td>{$row['nome']}</td>
                        <td>{$row['data_nascimento']}</td>
                        <td>{$row['responsavel']}</td>
                        <td>{$row['tipo_responsavel']}</td>
                        <td>{$row['bairro']}</td>
                        <td>{$row['curso']}</td>

                        <td>
                            <a href='editar.php?id={$row['id']}' class='btn btn-sm btn-warning me-1'>
                                Editar
                            </a>

                            <a href='excluir.php?id={$row['id']}' 
                               class='btn btn-sm btn-danger'
                               onclick=\"return confirm('Tem certeza que deseja excluir este aluno?');\">
                                Excluir
                            </a>
                        </td>
                      </tr>";

                $contador++; // incrementa o ID externo
            }
        } else {
            echo "<tr>
                    <td colspan='8' class='text-center text-muted'>Nenhum aluno registrado ainda.</td>
                  </tr>";
        }
        ?>

      </tbody>
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
