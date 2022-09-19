<?php
	/**
	 * Namespace: Core
	 * Class: Functions
	 * Description: Esta classe é responsável por agrupar todas as funções necessárias.
	 * Author: Lucas Passos		Date:25/01/2021
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */

    namespace Core;

    use Models\LoginModel;

	class Functions
	{
        public static function uploadFile($file){
            $formatoArquivo = explode('.', $file['name']);
            $fileNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'], DIR_UPLOADS.$fileNome)){
                return $fileNome;
            } else {
                return false;
            }
        }

        public static function validateImage($image){
            if($image['type'] == 'image/jpeg' ||
                $image['type'] == 'image/jpg' ||
                $image['type'] == 'image/png'){

                $size = intval($image['size'] / 1024);
                if($size < 1024){
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public static function deleteFile($file){
            @unlink(DIR_UPLOADS.$file);
        }
    }
?>