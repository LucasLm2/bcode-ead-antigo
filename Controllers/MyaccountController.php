<?php
	/**
	 * Namespace: Controllers
	 * Class: MyAccountController
	 * Description: Esta classe herda todos os métodos de Controller, ela se responsabiliza 
	 * por ações e processamentos que inclui chamar uma determinada View.
	 * Author: Lucas Passos		Date:19/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */

	namespace Controllers;

	use Core\Controller;
	use Core\Functions;
	use Core\Email;

	class MyAccountController extends Controller
	{
		function __construct() {
			$this->nameModel = 'MyAccountModel';
			$this->nameView = 'myaccount';
		}

		/**
		 * Este método chama a View index.php da seguinte forma /user/index ou somente /user
		 * e retorna para a View todos os usuários do banco de dados. 
		 */
		public function index() {
			if($this->logged()){
				$model = $this->model($this->nameModel); // É retornado o Model Users()
				$titlePage = 'Minha Conta';
				$message = '';

				if(count($_POST) != 0){
					$setPassword = false;
					$_POST['id'] = $_SESSION[SYSTEM_ID.'id'];
					
					$imageValidation = $this->imageValidation($_FILES, $titlePage);
					if($imageValidation){
						$nameImage = $this->uploadImage($_POST, $_FILES, $titlePage);
						$_POST['image'] = $nameImage;
						if(isset($_POST['last-image'])){
							if($_POST['last-image'] != ''){
								Functions::deleteFile($_POST['last-image']);
							}
						}
					} else {
						$_POST['image'] = $_POST['last-image'];
					}

					if($_POST['password'] != '' && $_POST['password'] == $_POST['confirm-password']){
						$setPassword = true;
					}

					if($model->update($_POST, $setPassword)){
						$message = array(true, 'Usuário alterado com sucesso');
						if($setPassword){
							$_SESSION[SYSTEM_ID.'password'] = $_POST['password'];
							$message[1] .= '. Senha alterada com sucesso';
						}
						$_SESSION[SYSTEM_ID.'name'] = $_POST['name'];
					} else {
						$message = array(false, 'Erro ao alterar usuário');
					}
				}

				$data = $model->selectStudent($_SESSION[SYSTEM_ID.'email'],$_SESSION[SYSTEM_ID.'password']);
				
				$this->view($this->nameView.'/index', array('student' => $data, 'titlePage' => $titlePage, 'message' => $message));
			} else {
				redirect(INCLUDE_PATH);
			}
		}

		private function imageValidation($file, $titlePage){
			if($file['image']['name'] != ''){ // Verifica se existe imagem para fazer upload
				if(Functions::validateImage($file['image'])){ // Verifica se imagem é válida
					return true;
				} else {
					$message = array(false, 'A imagem selecionada não é válida');

					$this->view(
						$this->nameView.'/index',
						array(
							'titlePage' => $titlePage,
							'message' => $message,
							'fieldsInvalid' => $fieldsInvalid,
							'post' => $_POST
						)
					);
					die();
				}
			} else {
				return false;
			}
		}

		private function uploadImage($post, $file, $titlePage){
			$nameImage = Functions::uploadFile($file['image']); // Tenta fazer o upload se não conseguir retorna false
			if($nameImage != false){ // Varifica se o upload foi feito corretamente
				return $nameImage;
			} else {
				$message = array(false, 'Erro ao fazer o upload da foto no servidor');

				$this->view(
					$this->nameView.'/index',
					array(
						'titlePage' => $titlePage,
						'message' => $message,
						'fieldsInvalid' => $fieldsInvalid,
						'post' => $_POST
					)
				);
				die();
			}
		}
	}
?>