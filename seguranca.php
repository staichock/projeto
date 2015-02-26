<?php
/**
 * Sistema de seguranca com acesso retrito
 * 
 * Usado para restringir o acesso de certas paginas do seu site
 */

// Configuração do Script
// =====
$_SG['conectaServidor'] = true;
// Abre um conexão com o servidor MySQL
$_SG['abreSessao'] = true;
//Inicia a sessão com um session_start()

$_SG['caseSensitive'] = false;
//Usar case-sensitive

$_SG['validaSempre'] = true;
//Deseja validar o usuario e a senha a cada carregamento de pagina
//Evide que, ao mudar os dados do usuario no banco de dado o mesmo continue logado

$_SG['servidor'] = 'staichock.no-ip.biz'; //Servidor MySQL
$_SG['usuario'] = 'root';		//Usuario MySQL
$_SG['senha']= '1234';				//Senha MySQL
$_SG['banco'] = 'projeto';		//Banco de dados MySQL

$_SG['paginaLogin'] = 'login.php'; //Pagina de login

$_SG['tabela'] = 'usuarios';	//Nome da tabela onde os usuarios são salvos

//=======================================

//Verifica se precisa fazer a conexao com o MySQL

if ($_SG['conectaServidor'] == true) {
	$_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die ("MySQL: Não foi possivel conectar-se ao servidor [".$_SG['servidor']."].");
			mysql_select_db($_SG['banco'], $_SG['link']) or die ("MySQL: Não foi possivel conectar-se ao banco de dados [".$_SG['banco']."].");
	}
	
	// Verifica se precisa iniciar a sessão
	
	if ($_SG['abreSessao'] == true) {
		session_start();
	}

	/**
	 * Funcao que valida um usuario e senha
	 * 
	 * @param string $usuario - O usuario a ser validado
	 * @param string $senha  - A senha a ser validada
	 * 
	 * @return bool - Se o usuario foi validado ou nao (true/false)
	 */
	function validaUsuario($usuario, $senha) {
		global $_SG;
		
		$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
		
		//Usa a funcao addslashes para escapar as aspas
		
		$nusuario = addslashes($usuario);
		$nsenha = addslashes($senha);
	
		// Monta uma consulta SQL (query) para procurar um usuario
		
		$sql = "SELECT `id`, `nome` FROM `".$_SG['tabela']."` WHERE ".$cS." `usuario` = '".$nusuario."' AND ".$cS." `senha` = '".$nsenha."' LIMIT 1";
		
		$query = mysql_query($sql);
		$resultado = mysql_fetch_assoc($query);
		
		//Verifica se encontrou algum registro
		if (empty($resultado)){
			//Nenhum registro foi encontrado =>o usuario é invalido
			return false;
		} else {
			//O registro foi encontrado => o usuario é valido
			
			//Definimos dois valores na sessao como os dados do usuario
			$_SESSION['usuarioID'] = $resultado['id'];
			
			$_SESSION['usuarioNome'] = $resultado['nome'];
			
			//Verifica a opção se sempre validar o login
			
			if ($_SG['validaSempre'] == true) {
				//Definimos dois valores na sessao com os dados do login
				
				$_SESSION['usuarioLogin'] = $usuario;
				$_SESSION['usuarioSenha'] = $senha;
		}
		return true;
	} 
}

/**
 * Função que protege uma pagina
 */
	function protegePagina() {
		global $_SG;
		if (!isset ($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
			//Não há usuário logado, manda pra página de login
			expulsaVisitante();
		} else if (!isset ($_SESSION['usuarioID']) OR !isset ($_SESSION['usuarioNome'])) {
			// Há usuario logado, verifica se precisa validar o login novamente
			if ($_SG['validaSempre'] == true) {
				//Verifica se os dados salvos na sessao batem com os dados do DB
				if (!validaUsuario ($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
					//Os dados nao batem, manda pra tela de login
					expulsaVisitantes();
				}
			}
		}
	}
	
	/**
	 * Função para expulsar um visitantes
	 */
	function expulsaVisitante() {
		global $_SG;
		
		//Remove as variaveis da sessao (caso elas existam)
		
		unset ($_SESSION ['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
		
		//Manda pra tela de login
		
		header("Location: ".$_SG['paginaLogin']);
	}
	