<<<<<<< HEAD
<?php
    $type       = 'mysql';
    $server     = 'localhost';
    $db         = 'hetalkshetalk';
    $port       = '3306';
    $charset    = 'utf8mb4';
    
    $dsn        = "$type:host=$server;dbname=$db;port=$port;charset=$charset";

    $username   ='root';
    $password   ='';

    $options    = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    try {
        $pdo        = new PDO($dsn, $username, $password, $options);
        //echo "Conexão com  Banco de Dados feita com sucesso!";
    } catch(PDOException $e){
        throw new PDOException($e->getMessage(), $e->getCode());
    }
    

?>
=======
<?php
    $type       = 'mysql';
    $server     = 'localhost';
    $db         = 'hetalkshetalk';
    $port       = '3306';
    $charset    = 'utf8mb4';
    
    $dsn        = "$type:host=$server;dbname=$db;port=$port;charset=$charset";

    $username   ='root';
    $password   ='';

    $options    = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    try {
        $pdo        = new PDO($dsn, $username, $password, $options);
        //echo "Conexão com  Banco de Dados feita com sucesso!";
    } catch(PDOException $e){
        throw new PDOException($e->getMessage(), $e->getCode());
    }
    

?>
>>>>>>> 8753e44551dbed5067c37469ca9cc7403a7f9a5b
