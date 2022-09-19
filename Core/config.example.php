<?php
	/**
	 * Archive: config.php
	 * Description: Este arquivo contem todas as configurações globais necessárias para o sistema e faz o inicio da sessão.
	 * Author: Lucas Passos		Date:07/11/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */

	//Iniciando a sessão
	session_start();

	//Configura o fuso horário padrão utilizado por todas as funções de data e hora em um script
	date_default_timezone_set('America/Sao_Paulo');

	//Titulo do Sistema
	define('SYSTEM_TITLE', 'EAD BCode');

	// Criar novo ID para o sistema
	// define('SYSTEM_ID_CREATE', uniqid(rand(), true));
	// echo SYSTEM_ID_CREATE;
	define('SYSTEM_ID', '1670611334601184fe657543_86890642');

	//Constantes de direcionamento Desenvolvimento
	define('INCLUDE_PATH', 'http://localhost/bcode_ead/');
	define('INCLUDE_PATH_ASSETS', INCLUDE_PATH.'Views/assets/');
	define('DIR_UPLOADS', __DIR__.'\\uploads\\');

	//Constantes do Banco de Dados Desenvolvimento
	// define('HOST', 'localhost');
	// define('DATABASE', 'db_ead_bcode');
	// define('USER', 'root');
	// define('PASSWORD', '');
	
	//Constantes para envio de e-mail
	define('EMAIL_HOST', '');
	define('EMAIL_USER', '');
	define('EMAIL_PASSWORD', '!');
	define('EMAIL_NAME', 'EAD - BCode Soluções');
	

	//Função para efetuar o redirecionamento via JavaScript
	function redirect($url) {
		try {
			header('location:'.$url);
		} catch (Exception $e) {
			echo '<script>location.href="'.$url.'"</script>';
		} finally {
			die();
		}
	}

	// Função para alterar o valor da URL via JavaScript
	function alterUrl($url) {
		echo '<script>history.pushState({}, null, "'.$url.'")</script>';
	}

	/**
	 * Esta função verifica se existe na URL o valor passado no parametro
	 * caso exista ela retorna verdadeiro.
	 * @param string $action - Valor a ser verificado se exite na URL.
	 */
	function verifyValueUrl(string $action){
		$valid = false;
		if(isset($_GET['url'])){
			$url = explode('/', $_GET['url']);
			foreach ($url as $key => $value) {
				if($value == $action){
					$valid = true;
					break;
				}
			}
		}
		return $valid;
	}
?>