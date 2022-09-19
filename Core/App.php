<?php	
	/**
	 * Namespace: Core
	 * Class: App
	 * Description: Esta classe é responsável por obter da URL o controller, método (ação)
	 * e os parâmetros e verificar a existência do mesmo.
	 * Author: Lucas Passos		Date:18/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */

	namespace Core;

	class App 
	{
		protected $controller = 'Controllers\\LoginController';
		protected $method = 'index';
		protected $page404 = false;
		protected $params = [];

		function __construct(){
			$URL_ARRAY = $this->parseUrl();
			$this->getControllerFromUrl($URL_ARRAY);
			$this->getMethodFromUrl($URL_ARRAY);
			$this->getParamsFromUrl($URL_ARRAY);
			
			// Chama um método de uma classe passando os parâmetros
			call_user_func_array(array($this->controller, $this->method), $this->params);
		}

		/**
		 * Este método pega as informações da URL (após o domínio do site) e retorna esses dados.
		 * @return array
		 */
		private function parseUrl() {
			//$REQUEST_URI = explode('/', substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), 14));
			$REQUEST_URI = isset($_GET['url']) ? explode('/',$_GET['url']) : array();
			return $REQUEST_URI;
		}

		/**
		 * Este método verifica se o array informado possui dados na posição 0 (Controlador)
		 * caso exista, verifica se existe um arquivo com aquele nome no diretório Controllers
		 * e instância um objeto contido no arquivo, caso contrário a variavel $page404 recebe
		 * true.
		 * @param array $url - Array contando informações ou não do controlador, método e
		 * parâmetros.
		 */
		private function getControllerFromUrl($url) {
			if(isset($url[0]) && !empty($url[0])) {
				$url = ucfirst($url[0]).'Controller';
				if(file_exists('./Controllers/'.$url.'.php')) {
					$this->controller = 'Controllers\\'.$url;
				} else {
					$this->page404 = true;
				}
			}
			//require './'.$this->controller.'.php';
			$this->controller = new $this->controller();
		}

		/**
		 * Este método verifica se o arrau informado possui dados na posição 1 (metodo)
		 * caso exista, verifica se o método existe naquele determinado controlador
		 * e atribui a váriavel $method da classe.
		 * @param array $url - Array contando informações ou não do controlador, método e
		 * parâmetros.
		 */
		private function getMethodFromUrl($url) {
			if(isset($url[1]) && !empty($url[1])) {
				if(method_exists($this->controller, $url[1]) && !$this->page404){
					$this->method = $url[1];
				} else {
					// Caso a classe ou o método não exista, o método pageNotFound do
					// Controller é chamado
					$this->method = 'pageNotFound';
				}
			}
		}

		/**
		 * Este método verifica se o array informado possui a quantidade de elementos maior que 2
		 * ($url[0] é o controller e $url[1] é o método (ação) a executar), caso seja, é atribuido
		 * a variável $params da classe um novo array a partir da posição 2 do $url.
		 * @param array $url - Array contando informações ou não do controlador, método e
		 * parâmetros.
		 */
		private function getParamsFromUrl($url) {
			if(count($url) > 2) {
				$this->params = array_slice($url, 2);
			}
		}
	}
?>