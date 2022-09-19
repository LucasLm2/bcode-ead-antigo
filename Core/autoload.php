<?php
	/**
	 * Archive: autoload.php
	 * Description: Este arquivo carrega de forma automática as classes utilizando o SPL(Standard PHP Library).
	 * Author: Lucas Passos		Date:20/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */
	$autoload = function($class) {
		$file = '.'.DIRECTORY_SEPARATOR.$class.'.php';
		if(DIRECTORY_SEPARATOR === '/'){
			$file = str_replace('\\', '/', $file);
		}

		if(file_exists($file)) {
			require_once $file;
		} else {
			echo 'Erro ao importar o arquivo!';
			//redirect(INCLUDE_PATH);
		}
	};

	spl_autoload_register($autoload);

?>