<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $senha1 = $_POST["senha1"];
    $senha2 = $_POST["senha2"];

}
if($senha1 === $senha2){
    echo "Estão iguais\n\n";
}else{
    echo "Estão Diferentes\n\n";
    require 'error-senhas-diferentes.php';
    session_destroy();
    exit();
}



echo "Você passou da segurança\n\n";

$letra = 'ç~^´`,/?!#$%¨&*()';
function emailSemCaracteresEspeciais($email, $letra) {
    // Verifica se a letra está presente no email
    foreach (str_split($letra) as $char) {
        if (strpos($email, $char) !== false) {
            session_destroy();
            exit();
        }
    }
    return true; // O email não contém nenhum dos caracteres especiais
}

echo "Email não tem caracteres especiais! \n\n";