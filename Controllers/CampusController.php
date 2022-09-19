<?php
	/**
	 * Namespace: Controllers
	 * Class: CampusController
	 * Description: Esta classe herda todos os métodos de Controller, ela se responsabiliza 
	 * por ações e processamentos que inclui chamar uma determinada View.
	 * Author: Lucas Passos		Date:19/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */

	namespace Controllers;

	use Core\Controller;

	class CampusController extends Controller
	{
		function __construct() {
			$this->nameModel = 'CampusModel';
			$this->nameView = 'campus';
		}

		/**
		 * Chama a View index.php do /home ou somente /
		 */
		public function index(){
			if($this->logged()){
				$model = $this->model($this->nameModel); // É retornado o Model Users()
				$idUser = $model->consultLogin($_SESSION[SYSTEM_ID.'email'], $_SESSION[SYSTEM_ID.'password'])[0]['id'];
				$coursesRegistered = $model->selectCourseRegistered($idUser);
				$coursesNotRegistered = $model->selectCourseNotRegistered($idUser);

				$this->view($this->nameView.'/index', array( 'titlePage' => $this->nameView, 'coursesRegistered' => $coursesRegistered, 'coursesNotRegistered' => $coursesNotRegistered));
			} else {
				redirect(INCLUDE_PATH);
			}
		}
		
	}
?>