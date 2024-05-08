<?php
session_start(); // Inicia a sessão
session_unset(); // Limpa todas as variáveis de sessão
session_destroy(); // Destrói a sessão

// Redireciona para a página inicial ou qualquer outra página desejada
header("Location: ../home/pgHome.php");
exit;
?>
