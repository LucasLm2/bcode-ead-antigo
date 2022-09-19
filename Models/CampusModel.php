<?php
	/**
	 * Namespace: Models
	 * Class: CampusModel
	 * Description: Esta classe é responsável por interagir com o banco de dados, contendo métodos
	 * que retornam todas as operações de um CRUD.
	 * Author: Lucas Passos		Date:19/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */
	namespace Models;

	use Core\DatabaseMySql;

	class CampusModel
	{
		private $conn;
		private $table = '`tb_ead.courses`';

		public function __construct(){
            $this->conn = new DatabaseMySql();
		}

		public function consultLogin($email, $password){
			$login = new \Models\LoginModel();
			$result = $login->consultLogin($email, $password);
			return $result;
		}

		function selectCourseRegistered($idStudent){
			$result = $this->conn->executeQuery('SELECT * FROM '.$this->table.' AS cursos INNER JOIN `tb_ead.inscriptions` AS matriculado ON cursos.id = matriculado.id_course AND matriculado.id_student = :id_student', array(':id_student' => $idStudent));
			$courses = $result->fetchAll();
			$referenceLesson = [];
			foreach($courses as $key => $value){
				$referenceLesson[$key] = $this->selectLession($value['id']);
			}
			return array($courses,$referenceLesson);
		}

		function selectCourseNotRegistered($idStudent){
			$result = $this->conn->executeQuery('SELECT * FROM '.$this->table.'WHERE id NOT IN(SELECT id_course FROM `tb_ead.inscriptions` WHERE id_student = :id_student)', array(':id_student' => $idStudent));
			$courses = $result->fetchAll();
			$referenceLesson = [];
			foreach($courses as $key => $value){
				$referenceLesson[$key] = $this->selectLession($value['id']);
			}
			return array($courses,$referenceLesson);
		}

		function selectLession($idCourse){
			$result = $this->conn->executeQuery('SELECT `id` FROM `tb_ead.modules` WHERE id_course = :id_course', array(':id_course' => $idCourse));
			$idModule = $result->fetch();
			$result = $this->conn->executeQuery('SELECT `reference` FROM `tb_ead.lessons` WHERE id_module = :id_module', array(':id_module' => $idModule['id']));
			return $result->fetch();
		}
	}
?>