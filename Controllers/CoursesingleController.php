<?php
	/**
	 * Namespace: Controllers
	 * Class: CourseSingleController
	 * Description: Esta classe herda todos os métodos de Controller, ela se responsabiliza 
	 * por ações e processamentos que inclui chamar uma determinada View.
	 * Author: Lucas Passos		Date:23/03/2021
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */

	namespace Controllers;

	use Core\Controller;

	class CourseSingleController extends Controller
	{
		function __construct() {
			$this->nameModel = 'CourseSingleModel';
			$this->nameView = 'coursesingle';
		}

		/**
		 * Chama a View index.php do /home ou somente /
		 */
		public function index(string $slugCourse, string $slugLesson){
			
			if($this->logged()){
                $model = $this->model($this->nameModel); // É retornado o Model Users()
                $course = $model->selectCourse($slugCourse);
				$lesson = $model->selectLesson($slugLesson);
                $idUser = $model->consultLogin($_SESSION[SYSTEM_ID.'email'], $_SESSION[SYSTEM_ID.'password'])[0]['id'];
				$inscription = $model->selectInscription($idUser,$course['id']);
				if(isset($lesson[0])){
					$lessionsCompleted = $model->selectLessionCompleted($idUser,$course['id']);
					$modulesLesson = $model->selectModulesAndLessonsRegistered($course['id']);
					$module = [];
					$lessons = [];
					$previosNext = [];
					$contPreviosNext = 0;
					$verificadorPreviusNext = true;
					$checkLessionPrevios = true;
					foreach($modulesLesson as $key => $value){
						if(!isset($module[$value['id_modules']][0])){
							$module[$value['id_modules']] = $value['name_module'];
						}
						if(isset($value['id_lessons'])){
							$lessons[$value['id_modules']][] = array('id_lesson' => $value['id_lessons'], 'name_lesson' => $value['name'], 'reference' => $value['reference']);
							
							if($verificadorPreviusNext){
								if($lesson['id'] == $value['id_lessons'] && $checkLessionPrevios){
									$checkLessionPrevios = false;
									$contPreviosNext++;
								} else {
									if($contPreviosNext == 1){
										$previosNext[$contPreviosNext] = $value['reference'];
										$verificadorPreviusNext = false;
									} else {
										$previosNext[$contPreviosNext] = $value['reference'];
									}
								}								
							}
							
						}
					}
					$this->view($this->nameView.'/index', array( 'titlePage' => $this->nameView, 'module' => $module, 'lessons' => $lessons, 'lessonsCompleted' => $lessionsCompleted, 'course' => $course, 'lessonCurrent' => $lesson, 'inscription' => isset($inscription[0]),'previosNext' =>  $previosNext));
				} else {
					$teste = new CampusController();
					$teste->index();
				}
			} else {
				redirect(INCLUDE_PATH);
			}
		}
		
	}
?>