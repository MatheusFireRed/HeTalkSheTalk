<?php
   session_start();

   if (!isset($_SESSION['user_id'])) {
       header("Location: login.php");
       exit;
   }
   
   header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
   header("Pragma: no-cache");
   header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
   
   $tituloDaPagina = 'Área de Criação';
   
   require_once '../DB/conexaoDB.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tituloDaPagina; ?></title>
    <link rel="stylesheet" href="../../style/styleCadastroTitulo.css">

    <style>
        .pesquisa {
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        .informacoes {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <header>
        <?php include 'headerCadastro.php'; ?>
    </header>
    <main>
        <div class="card">
            <!-- Formulário de busca -->
            <form class="pesquisa" method="GET" action="">
                <input type="text" name="busca" placeholder="Digite o nome ou id..." value="<?php echo isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : ''; ?>">
                <button type="submit">Pesquisar</button>
            </form>

            <h2>Editar Registro</h2>

            <?php
            $id =
            $nome =
            $nascimento =
            $nacionalidade =
            $nomeArtistico =
            $cidadeNascimento =
            $estadoNascimento =
            $filhos =
            $conjuges =
            $txtApresentacao = '';

            // Exibição dos resultados da busca
            if (isset($_GET['busca']) && !empty(trim($_GET['busca']))) {
                $busca = trim($_GET['busca']);

                try {
                    // Consulta todos os registros correspondentes
                    $sql = "SELECT id, 
                    nome, 
                    nascimento, 
                    nacionalidade,
                    nome_artistico,
                    cidade_nascimento,
                    estado_nascimento,
                    filhos,
                    conjuges,
                    txt_apresentacao
                      FROM atores 
                            WHERE id = :busca OR nome LIKE :nome";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':busca', $busca, PDO::PARAM_INT);
                    $stmt->bindValue(':nome', "%$busca%", PDO::PARAM_STR);
                    $stmt->execute();

                    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($dados) {
                        echo "<table>";
                        echo "<tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Nome Artístico</th>
                        <th>Ações</th>
                        </tr>";

                        foreach ($dados as $registro) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($registro['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($registro['nome']) . "</td>";
                            echo "<td>" . htmlspecialchars($registro['nome_artistico']) . "</td>";
                            echo "<td><a href='?editar=" . $registro['id'] . "'>Editar</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p style='color: red;'>Nenhum registro encontrado.</p>";
                    }
                } catch (PDOException $e) {
                    echo "Erro ao buscar registros: " . $e->getMessage();
                }
            }

            // Carregar os dados do registro selecionado para edição
            if (isset($_GET['editar'])) {
                $idSelecionado = intval($_GET['editar']);

                try {
                    $sql = "SELECT id,
                    nome,
                    nascimento,
                    nacionalidade,
                    nome_artistico,
                    cidade_nascimento,
                    estado_nascimento,
                    filhos,
                    conjuges,
                    txt_apresentacao FROM atores WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':id', $idSelecionado, PDO::PARAM_INT);
                    $stmt->execute();

                    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($registro) {
                        $id                     = $registro['id'];
                        $nome                   = $registro['nome'];
                        $nascimento             = $registro['nascimento'];
                        $nacionalidade          = $registro['nacionalidade'];
                        $nomeArtistico          = $registro['nome_artistico'];
                        $cidadeNascimento       = $registro['cidade_nascimento'];
                        $estadoNascimento       = $registro['estado_nascimento'];
                        $filhos                 = $registro['filhos'];
                        $conjuges               = $registro['conjuges'];
                        $txtApresentacao        = $registro['txt_apresentacao'];
                    } else {
                        echo "<p style='color: red;'>Registro não encontrado.</p>";
                    }
                } catch (PDOException $e) {
                    echo "Erro ao carregar registro para edição: " . $e->getMessage();
                }
            }

            // Atualizar o registro no banco de dados
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id                         = $_POST['id'];
                $nome                       = $_POST['nome'];
                $nascimento                 = $_POST['nascimento'];
                $nacionalidade              = $_POST['nacionalidade'];
                $nomeArtistico              = $_POST['nome_artistico'];
                $cidadeNascimento           = $_POST['cidade_nascimento'];
                $estadoNascimento           = $_POST['estado_nascimento'];
                $filhos                     = $_POST['filhos'];
                $conjuges                   = $_POST['conjuges'];
                $txtApresentacao            = $_POST['txt_apresentacao'];

                try {
                    $sql = "UPDATE atores SET 
                                nome = :nome,
                                nascimento = :nascimento,
                                nacionalidade = :nacionalidade,
                                nome_artistico = :nome_artistico,
                                cidade_nascimento = :cidade_nascimento,
                                estado_nascimento = :estado_nascimento,
                                filhos = :filhos,
                                conjuges = :conjuges,
                                txt_apresentacao = :txt_apresentacao
                            WHERE id = :id";

                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':nome', $nome);
                    $stmt->bindParam(':nascimento', $nascimento);
                    $stmt->bindParam(':nacionalidade', $nacionalidade);
                    $stmt->bindParam(':nome_artistico', $nomeArtistico);
                    $stmt->bindParam(':cidade_nascimento', $cidadeNascimento);
                    $stmt->bindParam(':estado_nascimento', $estadoNascimento);
                    $stmt->bindParam(':filhos', $filhos);
                    $stmt->bindParam(':conjuges', $conjuges);
                    $stmt->bindParam(':txt_apresentacao', $txtApresentacao);

                    $stmt->execute();

                    echo "<p style='color: green;'>Registro atualizado com sucesso!</p>";
                } catch (PDOException $e) {
                    echo "Erro ao atualizar registro: " . $e->getMessage();
                }
            }
            ?>

            <!-- Formulário de edição -->
            <?php if ($id): ?>
                <form class="informacoes" method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <div class="label-input">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>">
                    </div>
                    <div class="label-input">
                        <label for="nascimento">Data de Nascimento:</label>
                        <input type="date" id="nascimento" name="nascimento" value="<?php echo htmlspecialchars($nascimento); ?>">
                    </div>
                    <div class="label-input">
                        <label for="nacionalidade">Nacionalidade:</label>
                        <input type="text" id="nacionalidade" name="nacionalidade" value="<?php echo htmlspecialchars($nacionalidade); ?>">
                    </div>
                    <div class="label-input">
                        <label for="nome_artistico">Nome Artístico:</label>
                        <input type="text" id="nome_artistico" name="nome_artistico" value="<?php echo htmlspecialchars($nomeArtistico); ?>">
                    </div>
                    <div class="label-input">
                        <label for="cidade_nascimento">Cidade nascimento:</label>
                        <input type="text" id="cidade_nascimento" name="cidade_nascimento" value="<?php echo htmlspecialchars($cidadeNascimento); ?>">
                    </div>
                    <div class="label-input">
                        <label for="estado_nascimento">Estado nascimento:</label>
                        <input type="text" id="estado_nascimento" name="estado_nascimento" value="<?php echo htmlspecialchars($estadoNascimento); ?>">
                    </div>
                    <div class="label-input">
                        <label for="filhos">Filhos:</label>
                        <input type="text" id="filhos" name="filhos" value="<?php echo htmlspecialchars($filhos); ?>">
                    </div>
                    <div class="label-input">
                        <label for="conjuges">Cônjuges:</label>
                        <input type="text" id="conjuges" name="conjuges" value="<?php echo htmlspecialchars($conjuges); ?>">
                    </div>
                    <div class="label-input">
                        <label for="txt_apresentacao">Texto de apresentacao:</label>
                        <input type="text" id="txt_apresentacao" name="txt_apresentacao" value="<?php echo htmlspecialchars($txtApresentacao); ?>">
                    </div>


                    
                    <button type="submit">Salvar Alterações</button>
                </form>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
