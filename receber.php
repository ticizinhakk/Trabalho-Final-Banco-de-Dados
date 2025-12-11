<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Dados Recebidos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #ffffff49;
      padding: 30px;
    }
    .card {
      max-width: 900px;
      margin: auto;
      background: #ffffffff;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(25, 82, 31, 0.64);
    }
    h2 {
      text-align: center;
      color: #0a2515ff;
    }
    p {
      font-size: 20px;
      margin: 3px 0;
    }
    .voltar {
      text-align: center;
      margin-top: 36px;
    }
    a {
      background: #000000ff;
      color: white;
      padding: 20px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-size: 17px;
    }
  </style>
</head>

<body>
  <div class="card">
    <h2>Dados do Cadastro Recebidos</h2>

    <?php
    foreach ($_POST as $campo => $valor) {
        echo "<p><strong>".ucwords(str_replace("_"," ",$campo)).":</strong> $valor</p>";
    }
    ?>

    <div class="voltar">
      <a href="telaformulario.php">Voltar ao formulário</a>
    </div>
  </div>
</body>
</html>
