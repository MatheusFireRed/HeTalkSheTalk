<?php
    session_start();
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 3600, '/');
    session_regenerate_id(true);

    header("Location: ../../login.php");
    exit;
?>