<?php
	/**
	 * Namespace: Models
	 * Class: CourseSingleModel
	 * Description: Esta classe é responsável por interagir com o banco de dados, contendo métodos
	 * que retornam todas as operações de um CRUD.
	 * Author: Lucas Passos		Date:23/03/2021
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */
	namespace Models;

	use Core\DatabaseMySql;

	class CourseSingleModel
	{
		private $conn;
		private $table = '`tb_ead.modules`';

		public function __construct(){
            $this->conn = new DatabaseMySql();
		}

		public function consultLogin($email, $password){
			$login = new \Models\LoginModel();
			$result = $login->consultLogin($email, $password);
			return $result;
		}

        function selectCourse(string $slug){
            $result = $this->conn->executeQuery('SELECT `id`, `name`, `reference` FROM `tb_ead.courses` WHERE reference=:reference', array(':reference' => $slug));
            return $result->fetch();
        }

		function selectLesson(string $slug){
			$result = $this->conn->executeQuery('SELECT `id`, `name`, `description`, `reference`, `url_lesson` FROM `tb_ead.lessons` WHERE reference=:reference', array(':reference' => $slug));
            return $result->fetch();
		}

		function selectModulesAndLessonsRegistered($idCourse){
			$result = $this->conn->executeQuery('SELECT modules.id AS id_modules, modules.name AS name_module, lessons.id AS id_lessons, lessons.name, lessons.id_module, lessons.reference FROM '.$this->table.' AS modules LEFT JOIN `tb_ead.lessons` AS lessons ON modules.id=lessons.id_module WHERE modules.id_course=:id_course', array(':id_course' => $idCourse));
			return $result->fetchAll();
		}

        function selectLessionCompleted($idUser,$idCourse){
            $result = $this->conn->executeQuery('SELECT id FROM `tb_ead.lessons_completed` WHERE id_student=:id_student AND id_course=:id_course', array(':id_student' => $idUser, ':id_course' => $idCourse));
            return $result->fetchAll();
        }

		function selectInscription($idUser,$idCourse){
			$result = $this->conn->executeQuery('SELECT last_lesson FROM `tb_ead.inscriptions` WHERE id_student=:id_student AND id_course=:id_course', array(':id_student' => $idUser, ':id_course' => $idCourse));
            return $result->fetchAll();
		}
	}
?>