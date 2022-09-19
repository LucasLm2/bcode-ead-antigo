<?php
	/**
	 * Namespace: Models
	 * Class: MyAccountModel
	 * Description: Esta classe é responsável por interagir com o banco de dados, contendo métodos
	 * que retornam todas as operações de um CRUD.
	 * Author: Lucas Passos		Date:19/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */
	namespace Models;

	use Core\DatabaseMySql;

	class MyAccountModel
	{
		private $conn;
		private $table = '`tb_ead.students`';

		function __construct(){
			$this->conn = new DatabaseMySql();
		}

		/**
		 * Este método busca um dado da tabela armazenado na base de dados com um determinado
		 * ID.
		 * @param string $email - Identificador único do dado.
		 * @param string $password - Senha.
		 * @return array
		 */
		public function selectStudent(string $email, string $password) {
			$query = 'SELECT * FROM '.$this->table.' WHERE email = :email AND password = :password';
			$parameters = array(':email' => $email, ':password' => $password);
			$result = $this->conn->executeQuery($query, $parameters);
			return $result->fetch();
		}
		
		public function update(array $student, $setPassword) {
			$query = '';
			$parameters = '';

			if($setPassword){
				$query = 'UPDATE '.$this->table.' 
					SET name = :name,
						cpf = :cpf,
						birth_date = :birth_date,
						password = :password,
						image = :image
					WHERE id = :id ';
				$parameters = array(
								':id' => $student['id'],
								':name' => $student['name'],
								':cpf' => $student['cpf'],
								':birth_date' => $student['birth_date'],
								':password' => $student['password'],
								':image' => $student['image']
							);
			} else {
				$query = 'UPDATE '.$this->table.' 
					SET name = :name,
						cpf = :cpf,
						birth_date = :birth_date,
						image = :image
					WHERE id = :id ';
				$parameters = array(
								':id' => $student['id'],
								':name' => $student['name'],
								':cpf' => $student['cpf'],
								':birth_date' => $student['birth_date'],
								':image' => $student['image']
							);
			}
			
			$result = $this->conn->executeQuery($query, $parameters);
			return $result->rowCount();
		}	
	}
?>