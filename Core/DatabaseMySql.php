<?php
	/**
	 * Namespace: Models
	 * Class: DatabaseMySql
	 * Description:
	 * Author: Lucas Passos		Date:18/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */

	namespace Core;

	use PDO;

	class DatabaseMySql extends PDO
	{
		// Configuração do banco de dados.
		// private const HOST = 'localhost';
		// private const DATABASE = 'ead_bcode_db_dev';
		// private const USER = 'root';
		// private const PASSWORD = '';

		// Armazena a conexão do Bando de Dados.
		private $conn;

		function __construct() {
			// Quando esta classe é instanciada, ela verifica se já existe conexão aberta
			// caso não tenha é atribuido a variável $conn a conexão com o banco de dados.
			if(!isset($this->conn)){
				try {
					$this->conn = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_PERSISTENT => true));

					// Mostrar todo os erros que acontecer, APENAS PARA DESENVOLVIMENTO.
					$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					return $this->conn;
				} catch (PDOException $e) {
					echo 'Erro ao conectar no Banco de Dados.';
				}
			}
		}

		/**
		 * Este método recebe um objeto com a query 'preparada' e atribui as chaves da query
		 * seus respectivos valores.
		 * @param PDOStatement $stmr - Contém a query ja 'preparada'.
		 * @param string $key - É a mesma chave informada na query.
		 * @param string $value - Valor de uma determinada chave.
		 */	
		private function setParameters($stmt, $key, $value) {
			$stmt->bindParam($key, $value);
		}

		/**
		 * Este método apenas percorre o array com os parâmetros obtendo as chaves e os valores
		 * para fornecer tais dados para setParameters.
		 * @param PDOStatement $stmt - Contém a query ja 'preparada'.
		 * @param array $parameters - Array associativo contendo chave e valores para fornecer
		 * a query.
		 */
		private function mountQuery($stmt, $parameters) {
			foreach ($parameters as $key => $value) {
				$this->setParameters($stmt, $key, $value);
			}
		}

		/**
		 * Este método é responsavel por receber a query e os parametros, preparar a query
		 * para receber os valores dos parametros informados, chamar o método mountQuery,
		 * executar a query e retornar para os métodos tratarem o resultado.
		 * @param string $query - Instrução SQL que será executada no banco de dados.
		 * @param array $parameters - Array associativo contendo chave e valores para fornecer
		 * a query.
		 */
		public function executeQuery(string $query, array $parameters = []) {
			try {
				$this->conn->beginTransaction();

				$stmt = $this->conn->prepare($query);
				$this->mountQuery($stmt, $parameters);
				$stmt->execute();

				$this->conn->commit();

				return $stmt;
			} catch (Exception $e) {
				//Reverte uma transação no banco de dados.
				$this->conn->rollBack();
			}
		}

		/**
		 * Este método é responsavel por receber a query e os parametros, preparar a query
		 * para receber os valores dos parametros informados, chamar o método mountQuery,
		 * executar a query e retornar o id.
		 * @param string $query - Instrução SQL que será executada no banco de dados.
		 * @param array $parameters - Array associativo contendo chave e valores para fornecer
		 * a query.
		 * @return int $id - Chave primária do dado inserido na tabela. 
		 */
		public function executeScalar(string $query, array $parameters = []) {
			try {
				$this->conn->beginTransaction();

				$stmt = $this->conn->prepare($query);
				$this->mountQuery($stmt, $parameters);
				$stmt->execute();

				$id = $this->conn->lastInsertId();

				$this->conn->commit();

				return $id;
			} catch (Exception $e) {
				//Reverte uma transação no banco de dados.
				$this->conn->rollBack();
			}
		}

		// /**
		//  * Este método inicia uma transação no banco de dados.
		//  */
		// public function beginTransaction() {
		// 	$this->conn->beginTransaction();
		// }

		// /**
		//  * Este método envia uma transação para o banco de dados.
		//  */
		// public function commit() {
		// 	$this->conn->commit();
		// }	
	}
?>