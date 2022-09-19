<?php
	/**
	 * Namespace: Controllers
	 * Class: LoginController
	 * Description: Esta classe herda todos os métodos de Controller, ela se responsabiliza 
	 * por ações e processamentos que inclui chamar uma determinada View.
	 * Author: Lucas Passos		Date:19/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */

	namespace Controllers;

	use Core\Controller;

	class LoginController extends Controller
	{
		private $email;
		private $password;

		function __construct() {
			$this->nameModel = 'LoginModel';
			$this->nameView = 'login';
		}

		/**
		 * Chama a View index.php do /login ou somente / verifica se já esta logado
		 * ou se o cookie esta para relembrar o login.
		 */
		public function index(){
			if($this->logged()){
				$this->LogInto();
			} else {
				$cookieRemember = isset($_COOKIE[SYSTEM_ID.'remember']);
				$loggingIn = isset($_POST['login']);

				if ($cookieRemember || $loggingIn) {
					if($this->loggingIn($cookieRemember,$loggingIn)){
						$this->LogInto();
					} else {
						$this->view($this->nameView.'/index', array( 'titlePage' => $this->nameView, 'message' => array(true ,'Login Inválido!', 'Favor tente novamente.') ));
						die();
					}
				}

				$this->view($this->nameView.'/index', array( 'titlePage' => $this->nameView ));
			}
		}

		/**
		 * Este metodo redireciona o sistema para a página principal da plataforma.
		 */
		private function LogInto(){
			$campus = new \Controllers\CampusController();
			$campus->index();
			alterUrl(INCLUDE_PATH.'campus');
			die();
		}

		/**
		 * Este metodo verifica se o email e password passado ou salvo no cookie esta gravado no banco de dados,
		 * retornando assim seu resultado.
		 */
		private function loggingIn($cookieRemember,$loggingIn){
			if($loggingIn){
				$this->email = $_POST['email'];
				$this->password = $_POST['password'];
			} else if($cookieRemember) {
				$this->email = $_COOKIE[SYSTEM_ID.'email'];
				$this->password = $_COOKIE[SYSTEM_ID.'password'];
			}

			$login = $this->consultLogin($this->email, $this->password);
			
			if (Count($login) == 1) {
				$this->includeSectionData(true,$this->email,$this->password,$login[0]['name'],$login[0]['id']);
				if($loggingIn){
					if(isset($_POST['remember'])){
						setcookie(SYSTEM_ID.'remember','true',time()+(60*60*24*2),'/');
						setcookie(SYSTEM_ID.'email',$this->email,time()+(60*60*24*2),'/');
						setcookie(SYSTEM_ID.'password',$this->password,time()+(60*60*24*2),'/');
					}
					return true;
				} else if($cookieRemember){
					return true;
				} else {
					return false;
				}
			}
		}

		/**
		 * Este metodo chama a model e recebe os dados do banco referente ao email e password.
		 */
		private function consultLogin($email, $password){
			$model = $this->model($this->nameModel); // É retornado a instancia da classe LoginModel()
			return $model->consultLogin($email, $password);
		}

		/**
		 * Este metodo inclue os dados do usuário na sessão para consulta posterior.
		 */
		private function includeSectionData($login,$email,$password,$name,$id){
			$_SESSION[SYSTEM_ID.'id'] = $id;
			$_SESSION[SYSTEM_ID.'login'] = $login;
			$_SESSION[SYSTEM_ID.'email'] = $email;
			$_SESSION[SYSTEM_ID.'password'] = $password;
			$_SESSION[SYSTEM_ID.'name'] = $name;
		}
	}
?>