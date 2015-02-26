<?php
// Inclui o arquivo com o sistema de segurança
include ("seguranca.php");

//Verifica se um formulario foi enviado

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
//Salva duas variaveis com o que foi digitado no formulario
//Detelhe: faz uma verificacao com isset() pra saber se o compo foi preenchido

	$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
	$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
	
//Utiliza uma funcao criada no seguranca.php ŕa validar os dados digitados
	if (validaUsuario($usuario, $senha) == true) {

//O usuario e a asenha digitados foram validados, manda pra pagina interna
		header("Location: index.php"); }
		else {
//O usuario e/ou a senha são invalidos, manda de volta pro form de login
//Pra alterar o endereço da pagina de login, verifique o arquivo seguranca.php
expulsaVisitante();
		
	}
}
echo "Olá, " . $_SESSION['usuarioNome'];
?>