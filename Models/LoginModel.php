<?php
    /**
	 * Namespace: Models
	 * Class: LoginModel
	 * Description: Esta classe é responsável por interagir com o banco de dados, contendo métodos
	 * que retornam todas as operações de um CRUD.
	 * Author: Lucas Passos		Date:19/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */
    namespace Models;

    use Core\DatabaseMySql;

    class LoginModel 
    {
        private $conn;
		private $table = '`tb_ead.students`';

		function __construct(){
			$this->conn = new DatabaseMySql();
		}

		public function consultLogin($email, $password){
			$result = $this->conn->executeQuery('SELECT * FROM '.$this->table.' WHERE email = :email AND password = :password', array(':email' => $email, ':password' => $password));
			return $result->fetchAll();
		}

    }
    
?>