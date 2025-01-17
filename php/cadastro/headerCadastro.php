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
                    <a href="editarInformacoes.php">Editar <br> Informações</a>
                </li>
            </ul>
        </div>
        <form class="btn-sair" action="logout.php" method="post">
            <button type="submit">Sair</button>
        </form>