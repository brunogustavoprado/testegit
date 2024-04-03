<?php
session_start()
?>

<form action="verificador.php" method="post">
    <label for="email">SEU EMAIL:</label><br>
    <input type="text" name="email" id="email"><br><br>
    <label for="senha1">SUA SENHA:</label><br>
    <input type="password" name="senha1" id="senha1"><br><br>
    <label for="senha2">SUA SENHA NOVAMENTE:</label><br>
    <input type="password" name="senha2" id="senha2"><br><br>
    <input type="submit" value="ENVIAR CREDENCIAIS">
</form>
