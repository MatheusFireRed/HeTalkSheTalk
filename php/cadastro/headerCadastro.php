<div class="box-saudacao">
    <h1 class="saudacao">Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
</div>

<div class="box-menu">
    <ul class="menu">
        <li>
            <a href="cadastroTitulos.php">Cadastrar <br> Título</a>
        </li> 
        <li>
            <a href="#">Comentar <br> sobre <br> título</a>
        </li>
        <li>
            <a href="cadastroAtributosAtores.php">Cadastrar <br> Atributos <br> Atores</a>
        </li>
        <li>
            Editar <br> informações
            <ul class="dropdown">
                <li><a href="editarInformacoes.php">Editar Atores</a></li>
                <li><a href="editarTitulos.php">Editar Títulos</a></li>
            </ul>
        </li>
    </ul>
</div>

<form class="btn-sair" action="logout.php" method="post">
    <button type="submit">Sair</button>
</form>

<style>
    /* Estilizando o menu principal */
    .menu {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 20px;
    }

    .menu li {
        position: relative; /* Necessário para posicionar o drop-down */
    }

    .menu a {
        text-decoration: none;
        color: #000;
        font-size: 16px;
        text-align: center;
        display: block;
        padding: 10px 15px;
        background-color: #f0f0f0;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .menu a:hover {
        background-color: #ddd;
    }

    /* Estilo do drop-down */
    .dropdown {
        list-style: none;
        padding: 0;
        margin: 0;
        display: none; /* Esconde o drop-down por padrão */
        position: absolute;
        top: 100%; /* Alinha o drop-down abaixo do item */
        left: 0;
        background-color: #f9f9f9;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        z-index: 1;
    }

    .dropdown li {
        border-bottom: 1px solid #ddd;
    }

    .dropdown li:last-child {
        border-bottom: none;
    }

    .dropdown a {
        padding: 10px 20px;
        white-space: nowrap; /* Evita quebra de linha em textos longos */
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    /* Exibir o drop-down ao passar o mouse */
    .menu li:hover .dropdown {
        display: block;
    }
</style>
