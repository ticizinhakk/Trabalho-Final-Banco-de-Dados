<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar Bonita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #7bc98cff, #314f31ff); box-shadow: 0 4px 8px rgba(128, 118, 118, 0.43);">
  <div class="container-fluid px-4">

    <a class="navbar-brand fw-bold fs-3" href="painel.php"> Home</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto gap-2">

        <li class="nav-item">
          <a class="nav-link active fw-semibold" href="telaformulario.php">📝 Formulário</a>
        </li>

        <li class="nav-item">
          <a class="nav-link fw-semibold" href="tabela.php">📄 Tabela</a>
        </li>

        <li class="nav-item">
          <a class="nav-link fw-semibold text-warning" href="logout.php">🚪 Log out</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>