# Trabalho Final Banco de Dados
## Esse sistema é um projeto desenvolvido para o gerenciamento de cadastro de alunos, desenvolvido como um trabalho final na disciplina de banco de dados, com aulas ministradas pelo professor Adeilson. Foi desenvolvido usando o PHP como a principal linguagem de backend e um banco de dados MySQL para gerenciamento das tabelas.

## Funcionalidades
- Sistema de cadastro de usuários
-  Gerenciamento de alunos
-  Dados relevantes sobre os alunos Cadastrados (Dashboard completo)


## 📘 README – Sistema de Cadastro de Alunos

Este projeto foi desenvolvido para gerenciar alunos, cursos e responsáveis através de um painel administrativo simples, direto e funcional.
Ele utiliza PHP no backend, MySQL como banco de dados e Bootstrap + ChartJS no frontend, permitindo uma interface limpa e gráficos dinâmicos no painel.

A ideia é que qualquer usuário autorizado consiga realizar login, cadastrar alunos, editar, excluir e visualizar estatísticas gerais do sistema, como quantidade de alunos por curso, total de responsáveis, aniversariantes do mês e outras informações úteis.

## 💻 Tecnologias: Todo o sistema foi construído com base em:

- PHP para toda a lógica de backend
- MySQL / phpMyAdmin para armazenar e gerenciar os dados
- HTML, CSS e JavaScript para a estrutura e comportamento das páginas
- Bootstrap para deixar tudo responsivo e bem organizado
- ChartJS para gerar os gráficos mostrados no painel
- O resultado final é um painel administrativo leve, rápido e fácil de navegar.

## 🗂 Estrutura Geral do Projeto

- Dentro da pasta do sistema existem alguns arquivos centrais responsáveis pelo funcionamento:
- O arquivo conexao.php conecta o PHP ao MySQL.
- Os arquivos de login, criação de usuário e verificação de sessão garantem que apenas pessoas autenticadas acessem o painel.
- As páginas form.php, form_config.php, dados.php, editar_aluno.php, atualizar_aluno.php e remover_aluno.php fazem toda a parte de cadastro e gerenciamento dos alunos.
- O painel.php é a dashboard principal, onde aparecem os gráficos, cards e resumos importantes.
- O painel_admin.php é a página exclusiva para administradores.
- Os menus menu.php e menu_admin.php deixam a navegação organizada.
- O arquivo consultas.php faz todas as consultas ao banco para alimentar os gráficos e cards.

### Dentro da pasta database, ficam os arquivos SQL necessários para criar as tabelas do projeto:

- users.sql — tabela de usuários
- admin.sql — tabela de administradores (criados manualmente)
- dados.sql — tabela onde ficam os cadastros dos alunos



## Imagens:

### Painel 01
<img width="1880" height="1038" alt="image" src="https://github.com/user-attachments/assets/baa357c2-0d72-4488-befd-a9ffcb606501" />

### Painel 02
<img width="1123" height="890" alt="image" src="https://github.com/user-attachments/assets/94eeb367-c2af-4a8c-90d1-d2421608b55b" />

### Formulário (Registro)
<img width="1918" height="911" alt="image" src="https://github.com/user-attachments/assets/821634df-e5c0-4783-9010-da45602c2b51" />

### Tabela de Alunos Registrados
<img width="1918" height="927" alt="image" src="https://github.com/user-attachments/assets/d1170dd5-d3bb-473c-8936-3290bdedfa35" />

### Login
<img width="758" height="621" alt="image" src="https://github.com/user-attachments/assets/22c8f6a9-d54c-47dd-9f8c-4e36794c9f8f" />

### Registrar
<img width="528" height="745" alt="image" src="https://github.com/user-attachments/assets/ed59f31d-453a-4d1f-b35a-e6522f54f40f" />

