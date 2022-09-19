<?php 
	/**
	 * Namespace: Core
	 * Class: Email
	 * Description: Esta classe é responsável por instanciar um Model e chamar a View correta
	 * passando os dados que serão usados.
	 * Author: Lucas Passos		Date:18/12/2020
	 * Notes:
	 * Revision History:
	 * Name:		Date:		Description:
	 */

	namespace Core;

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	class Email
	{

		private $mailer;
		
		public function __construct()
		{
			// Instantiation and passing `true` enables exceptions
			$this->mailer = new PHPMailer(true);

			try {
			    //Server settings
			    //$this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;              // Enable verbose debug output
			    $this->mailer->isSMTP();                                    // Send using SMTP
			    $this->mailer->Host       = EMAIL_HOST;                    		// Set the SMTP server to send through
			    $this->mailer->SMTPAuth   = true;                           // Enable SMTP authentication
			    $this->mailer->Username   = EMAIL_USER;                     	// SMTP username
			    $this->mailer->Password   = EMAIL_PASSWORD;                      // SMTP password
			    $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $this->mailer->Port       = 587;                            // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			    //Recipients
			    $this->mailer->setFrom(EMAIL_USER, EMAIL_NAME);

			    // Attachments
			    //$this->mailer->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    //$this->mailer->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    // Content
				$this->mailer->isHTML(true);
				$this->mailer->CharSet = 'UTF-8';
			} catch (Exception $e) {
				throw $e;
			}
		}

		public function addAdress($email, $nome){
			$this->mailer->addAddress($email, $nome);     		// Add a recipient
		}

		public function formatEmail($info){
			                                  // Set email format to HTML
			$this->mailer->Subject = $info['assunto'];
			$this->mailer->Body    = $info['corpo'];
			$this->mailer->AltBody = strip_tags($info['corpo']);
		}

		public function sendEmail(){
			try {
				$this->mailer->send();
				return true;
			} catch (Exception $e) {
				throw $e;
			}
		}

	}

?>