<?php
session_start();
include('verifica_login.php');
include('menu.php');
include('conexao.php');

// ===== CONSULTA 1: TOTAL DE ALUNOS =====
$totalAlunos = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT COUNT(*) AS total FROM alunos"))['total'];

// ===== CONSULTA 2: ALUNOS POR CURSO =====
$cursosQuery = mysqli_query($conexao, "SELECT curso, COUNT(*) AS qtde FROM alunos GROUP BY curso");

// ===== CONSULTA 3: TIPOS DE RESPONSÁVEL =====
$tipoRespQuery = mysqli_query($conexao, "SELECT tipo_responsavel, COUNT(*) AS qtde FROM alunos GROUP BY tipo_responsavel");

// ===== CONSULTA 4: ALUNOS POR BAIRRO =====
$bairrosQuery = mysqli_query($conexao, "SELECT bairro, COUNT(*) AS qtde FROM alunos GROUP BY bairro");

// ===== CONSULTA 5: MENORES DE IDADE =====
$menores = mysqli_fetch_assoc(
    mysqli_query($conexao, "SELECT COUNT(*) AS qtd FROM alunos WHERE TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) < 18")
)['qtd'];

// ===== CONSULTA 6: FAIXA ETÁRIA =====
$faixas = mysqli_fetch_assoc(mysqli_query($conexao,"
    SELECT
        SUM(CASE WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) <= 12 THEN 1 END) AS criancas,
        SUM(CASE WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) BETWEEN 13 AND 17 THEN 1 END) AS adolescentes,
        SUM(CASE WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) BETWEEN 18 AND 30 THEN 1 END) AS jovens,
        SUM(CASE WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) BETWEEN 31 AND 60 THEN 1 END) AS adultos,
        SUM(CASE WHEN TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) > 60 THEN 1 END) AS idosos
    FROM alunos
"));

// ===== CONSULTA 7: ALUNOS POR CEP =====
$cepQuery = mysqli_query($conexao, "SELECT cep, COUNT(*) AS qtde FROM alunos GROUP BY cep");

// ===== CONSULTA 8: ORDER TIPO RESPONSÁVEL =====
$respOrderQuery = mysqli_query($conexao, "
    SELECT tipo_responsavel, COUNT(*) AS qtde 
    FROM alunos 
    GROUP BY tipo_responsavel 
    ORDER BY qtde DESC
");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { background: #f4fdf4; }
        .card { border: 1px solid #c9e6c9; }
        .bg-green { background-color: #8fce9d !important; }
        .bg-green-light { background-color: #8fce9d !important; }
        .bg-green-dark { background-color: #8fce9d !important; }
        h2 { color: #1f5e3b; }
    </style>
</head>

<body>

    <h2 class="text-center mt-3">Informações</h2>

    <div class="container mt-4">
        <div class="row g-3">

            <!-- CARD 1 -->
            <div class="col-3">
                <div class="card bg-green text-white shadow">
                    <div class="card-body">
                        <h5>Total de Alunos</h5>
                        <h2><?php echo $totalAlunos; ?></h2>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-3">
                <div class="card bg-green-dark text-white shadow">
                    <div class="card-body">
                        <h5>Menores de Idade</h5>
                        <h2><?php echo $menores; ?></h2>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-3">
                <div class="card bg-green-light text-white shadow">
                    <div class="card-body">
                        <h5>Cursos Registrados</h5>
                        <h2><?php echo mysqli_num_rows($cursosQuery); ?></h2>
                    </div>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="col-3">
                <div class="card bg-green text-white shadow">
                    <div class="card-body">
                        <h5>Tipos de Responsável</h5>
                        <h2><?php echo mysqli_num_rows($tipoRespQuery); ?></h2>
                    </div>
                </div>
            </div>

        </div>

        <hr class="my-4">

        <div class="row g-4">

            <!-- GRÁFICO CURSOS -->
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header bg-green text-white">Alunos por Curso</div>
                    <div class="card-body"><canvas id="grafCursos"></canvas></div>
                </div>
            </div>

            <!-- GRÁFICO BAIRROS -->
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header bg-green-dark text-white">Alunos por Bairro</div>
                    <div class="card-body"><canvas id="grafBairros"></canvas></div>
                </div>
            </div>

            <!-- GRÁFICO RESPONSÁVEL -->
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header bg-green-light text-white">Tipos de Responsável</div>
                    <div class="card-body"><canvas id="grafResp"></canvas></div>
                </div>
            </div>

            <!-- GRÁFICO FAIXA ETÁRIA -->
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header bg-green text-white">Faixa Etária</div>
                    <div class="card-body"><canvas id="grafFaixa"></canvas></div>
                </div>
            </div>

            <!-- GRÁFICO CEP -->
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header bg-green-dark text-white">Alunos por CEP</div>
                    <div class="card-body"><canvas id="grafCep"></canvas></div>
                </div>
            </div>

            <!-- RESPONSÁVEL ORDENADO -->
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header bg-green-light text-white">Responsáveis (Mais Comuns)</div>
                    <div class="card-body"><canvas id="grafRespOrder"></canvas></div>
                </div>
            </div>

        </div>
    </div>

<script>
// ==================== CURSOS ====================
new Chart(document.getElementById('grafCursos'), {
    type: 'pie',
    data: {
        labels: [
            <?php mysqli_data_seek($cursosQuery,0);
            while($c = mysqli_fetch_assoc($cursosQuery)) echo "'".$c['curso']."',"; ?>
        ],
        datasets: [{
            data: [
                <?php $c2 = mysqli_query($conexao,"SELECT curso, COUNT(*) AS qtde FROM alunos GROUP BY curso");
                while($c = mysqli_fetch_assoc($c2)) echo $c['qtde'].","; ?>
            ],
            backgroundColor: ['#006400','#228B22','#32CD32','#7CFC00','#90EE90'],
            borderColor: '#004d00',
            borderWidth: 2
        }]
    }
});

// ==================== BAIRROS ====================
new Chart(document.getElementById('grafBairros'), {
    type: 'bar',
    data: {
        labels: [
            <?php mysqli_data_seek($bairrosQuery,0);
            while($b = mysqli_fetch_assoc($bairrosQuery)) echo "'".$b['bairro']."',"; ?>
        ],
        datasets: [{
            data: [
                <?php $b2 = mysqli_query($conexao,"SELECT bairro, COUNT(*) AS qtde FROM alunos GROUP BY bairro");
                while($b = mysqli_fetch_assoc($b2)) echo $b['qtde'].","; ?>
            ],
            backgroundColor: '#32CD32',
            borderColor: '#006400',
            borderWidth: 2
        }]
    }
});

// ==================== RESPONSÁVEL ====================
new Chart(document.getElementById('grafResp'), {
    type: 'doughnut',
    data: {
        labels: [
            <?php 
            $resp2 = mysqli_query($conexao,"SELECT tipo_responsavel, COUNT(*) AS qtde FROM alunos GROUP BY tipo_responsavel");
            while($t = mysqli_fetch_assoc($resp2)) echo "'".$t['tipo_responsavel']."',"; ?>
        ],
        datasets: [{
            data: [
                <?php 
                $resp3 = mysqli_query($conexao,"SELECT tipo_responsavel, COUNT(*) AS qtde FROM alunos GROUP BY tipo_responsavel");
                while($t = mysqli_fetch_assoc($resp3)) echo $t['qtde'].","; ?>
            ],
            backgroundColor: ['#006400','#228B22','#32CD32','#7CFC00'],
            borderColor: '#004d00',
            borderWidth: 2
        }]
    }
});

// ==================== FAIXA ETÁRIA ====================
new Chart(document.getElementById('grafFaixa'), {
    type: 'bar',
    data: {
        labels: ['0-12','13-17','18-30','31-60','60+'],
        datasets: [{
            data: [
                <?php echo $faixas['criancas'];?>,
                <?php echo $faixas['adolescentes'];?>,
                <?php echo $faixas['jovens'];?>,
                <?php echo $faixas['adultos'];?>,
                <?php echo $faixas['idosos'];?>
            ],
            backgroundColor: '#32CD32',
            borderColor: '#006400',
            borderWidth: 2
        }]
    }
});

// ==================== CEP ====================
new Chart(document.getElementById('grafCep'), {
    type: 'bar',
    data: {
        labels: [
            <?php mysqli_data_seek($cepQuery,0);
            while($c = mysqli_fetch_assoc($cepQuery)) echo "'".$c['cep']."',"; ?>
        ],
        datasets: [{
            data: [
                <?php $cep2 = mysqli_query($conexao,"SELECT cep, COUNT(*) AS qtde FROM alunos GROUP BY cep");
                while($c = mysqli_fetch_assoc($cep2)) echo $c['qtde'].","; ?>
            ],
            backgroundColor: '#7CFC00',
            borderColor: '#006400',
            borderWidth: 2
        }]
    }
});

// ==================== RESPONSÁVEL ORDENADO ====================
new Chart(document.getElementById('grafRespOrder'), {
    type: 'bar',
    data: {
        labels: [
            <?php mysqli_data_seek($respOrderQuery,0);
            while($r = mysqli_fetch_assoc($respOrderQuery)) echo "'".$r['tipo_responsavel']."',"; ?>
        ],
        datasets: [{
            data: [
                <?php $respOrd2 = mysqli_query($conexao,"SELECT tipo_responsavel, COUNT(*) AS qtde FROM alunos GROUP BY tipo_responsavel ORDER BY qtde DESC");
                while($r = mysqli_fetch_assoc($respOrd2)) echo $r['qtde'].","; ?>
            ],
            backgroundColor: '#32CD32',
            borderColor: '#006400',
            borderWidth: 2
        }]
    }
});
</script>

</body>
</html>
