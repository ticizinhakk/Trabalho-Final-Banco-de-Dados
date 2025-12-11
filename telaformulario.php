<?php
$bg = "https://eeepmanoelmano.com.br/assets/img1-6ab8cf64.png";
$logo = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSSj9P09qb619OHN0NZxe7D8rGsYQU3uiU3TQ&s";
include('menu.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <title>Página de Cadrastramento - EEEP MANOEL MANO</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Arial, sans-serif;
    }

    body {
      background: url('<?php echo $bg; ?>') no-repeat center center fixed;
      background-size: cover;
    }

    .overlay {
      background: rgba(255, 255, 255, 0.85);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      padding: 40px 20px;
    }

    .container {
      width: 100%;
      max-width: 900px;
      background: #ffffff;
      padding: 35px;
      border-radius: 18px;
      box-shadow: 0 5px 25px rgba(0,0,0,0.25);
      animation: fade 0.5s ease;
    }

    @keyframes fade {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    .header {
      text-align: center;
      margin-bottom: 25px;
    }

    .logo {
      width: 160px;
      height: 160px;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid #2d6a2d;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
      margin-bottom: 15px;
    }

    h1 {
      font-size: 28px;
      font-weight: bold;
      color: #1e4f22;
    }

    .form-row {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .form-group {
      flex: 1;
      min-width: 250px;
    }

    label {
      font-weight: bold;
      margin-bottom: 6px;
      display: block;
      color: #1e4f22;
    }

    input,
    select {
      width: 100%;
      padding: 12px;
      border: 2px solid #247323;
      border-radius: 10px;
      background: #f8fff8;
      font-size: 16px;
      transition: 0.2s;
    }

    input:focus,
    select:focus {
      border-color: #1e4f22;
      outline: none;
      background: #ffffff;
      box-shadow: 0 0 8px rgba(46,140,58,0.4);
    }

    .submit-btn {
      text-align: center;
      margin-top: 20px;
    }

    button {
      background: #1e4f22;
      color: #fff;
      padding: 13px 30px;
      font-size: 18px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.2s;
      font-weight: bold;
    }

    button:hover {
      background: #16411a;
      transform: scale(1.03);
    }

    @media (max-width: 600px) {
      h1 { font-size: 22px; }
      .logo { width: 120px; height: 120px; }
    }
  </style>
</head>

<body>

<div class="overlay">
  <div class="container">

    <div class="header">
      <img src="<?php echo $logo; ?>" class="logo">
      <h1>Formulário de Cadastro</h1>
    </div>

   <form action="formulario.php" method="POST">


      <div class="form-row">
        <div class="form-group">
          <label>Nome Completo</label>
          <input type="text" name="nome" required>
        </div>

        <div class="form-group">
          <label>Data de Nascimento</label>
          <input type="date" name="data_nascimento" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Rua</label>
          <input type="text" name="rua" required>
        </div>

        <div class="form-group">
          <label>Número</label>
          <input type="text" name="numero" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Bairro</label>
          <input type="text" name="bairro" required>
        </div>

        <div class="form-group">
          <label>CEP</label>
          <input type="text" name="cep" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Nome do Responsável</label>
          <input type="text" name="responsavel" required>
        </div>

        <div class="form-group">
          <label>Pessoa Responsável</label>
          <select name="tipo_responsavel" required>
            <option value="pai">Pai</option>
            <option value="mae">Mãe</option>
            <option value="avo_materna">Avó</option>
            <option value="avo_paterno">Avô</option>
            <option value="tia">Tia</option>
            <option value="tio">Tio</option>
            <option value="padrasto">Padrasto</option>
            <option value="madrastra">Madrasta</option>
            <option value="bisavo">Bisavó</option>
            <option value="bisavo2">Bisavô</option>
            <option value="irma ( DE MAIOR )">Irmã ( DE MAIOR )</option>
            <option value="irmao ( DE MAIOR )">Irmão ( DE MAIOR )</option>
            <option value="outro">Outro</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group" style="min-width:100%;">
          <label>Curso Desejado</label>
          <select name="curso" required>
            <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
            <option value="Informática">Informática</option>
            <option value="Administração">Administração</option>
            <option value="Enfermagem">Enfermagem</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group" style="min-width:100%;">
          <label>Observações (Opcional)</label>
          <input type="text" name="obs" placeholder="Incluir pedidos específicos">
        </div>
      </div>

      <div class="submit-btn">
        <button type="submit">Enviar Formulário</button>
      </div>

    </form>

  </div>
</div>

</body>
</html>