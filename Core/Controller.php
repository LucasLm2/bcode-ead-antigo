<?php
	/**
	 * Namespace: Core
	 * Class: Controller
	 * Description: Esta classe é responsável por instanciar um Model e chamar a View correta
	 * passando os dados que serão usados.
	 * Author: Lucas Passos		Date:18/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */

	namespace Core;

	class Controller
	{
		protected $nameModel = '';
		protected $nameView = '';
		protected $codIdentify = '';

		/**
		 * Este método é responsável por instanciar um model
		 * @param string $model - É o model que será instanciado para usar em uma View,
		 * seja seus métodos ou atributos.
		 */
		public function model($model) {
			require './Models/'.$model.'.php';
			$classe = 'Models\\'.$model;
			return new $classe(); 
		}

		/**
		 * Este método é responsável por chamar uma determinada View(página)
		 * @param string $view - A View que será chamada (ou requerida).
		 * @param array $data - São os dados que serão exibidos na View.
		 */
		public function view(string $view, $data = []) {
			require('./Views/assets/header.php');
			require('./Views/'.$view.'.php');
			require('./Views/assets/footer.php');
		}

		/**
		 * Este método é herdado para todas as classes filhas que o chamarão quando
		 * o método ou classe informada pelo usuário não forem encontrados.
		 */
		public function pageNotFound() {
			$this->view('assets/erro404', array('titlePage' => 'Erro404'));
			die();
		}

		/**
		 * Este método é herdado para todas as classes filhas que o chamarão para
		 * verificar se o usuário esta logado ou não.
		 */
		public function logged(){
			return isset($_SESSION[SYSTEM_ID.'login']) ? true : false;
		}

		/**
		 * Este método é herdado para todas as classes filhas que o chamarão para
		 * efetuar o logout do sistema.
		 */
		public function logout(){
			setcookie(SYSTEM_ID.'remember','',time()-1,'/');
			setcookie(SYSTEM_ID.'email','',time()-1,'/');
			setcookie(SYSTEM_ID.'password','',time()-1,'/');
			session_destroy();
			redirect(INCLUDE_PATH);
		}		
	}

?>