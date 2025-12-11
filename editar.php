<?php
include('menu.php');
include('conexao.php');

if (!isset($_GET['id'])) {
    die("ID não informado!");
}

$id = $_GET['id'];

$sql = "SELECT * FROM alunos WHERE id = $id";
$result = mysqli_query($conexao, $sql);
$aluno = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Editar Aluno</h2>

    <form action="update.php" method="POST" class="p-4 bg-white shadow rounded">
        
        <input type="hidden" name="id" value="<?= $aluno['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="<?= $aluno['nome'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" value="<?= $aluno['data_nascimento'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rua</label>
            <input type="text" name="rua" class="form-control" value="<?= $aluno['rua'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Número</label>
            <input type="text" name="numero" class="form-control" value="<?= $aluno['numero'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bairro</label>
            <input type="text" name="bairro" class="form-control" value="<?= $aluno['bairro'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CEP</label>
            <input type="text" name="cep" class="form-control" value="<?= $aluno['cep'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Responsável</label>
            <input type="text" name="responsavel" class="form-control" value="<?= $aluno['responsavel'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo de Responsável</label>
            <select name="tipo_responsavel" class="form-select" required>
                <option value="pai" <?= ($aluno['tipo_responsavel'] == 'pai') ? 'selected' : '' ?>>Pai</option>
                <option value="mae" <?= ($aluno['tipo_responsavel'] == 'mae') ? 'selected' : '' ?>>Mãe</option>
                <option value="outro" <?= ($aluno['tipo_responsavel'] == 'outro') ? 'selected' : '' ?>>Outro</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Curso</label>
            <input type="text" name="curso" class="form-control" value="<?= $aluno['curso'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Observações</label>
            <textarea name="obs" class="form-control" rows="3"><?= $aluno['obs'] ?></textarea>
        </div>

        <button class="btn btn-primary">Salvar Alterações</button>
        <a href="tabela.php" class="btn btn-secondary">Voltar</a>

    </form>
</div>

</body>
</html>
