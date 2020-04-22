<?php

namespace Projeto\APRJ\Suport;

require_once __DIR__ . '/../../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Projeto\APRJ\Services\ServiceTraitErro;
use stdClass;

class Email
{
	use ServiceTraitErro;
	

	private $mail;
	private $data;
	public function __construct()
	{
		$this->mail = new PHPMailer(true);
		$this->data = new stdClass();

		$this->mail->isSMTP();
		$this->mail->isHTML();
		$this->mail->setLanguage("br");

		$this->mail->SMTPAuth = true;
		$this->mail->SMTPSecure = "tls";
		$this->mail->CharSet = "utf-8";
		
		$this->mail->Host = MAIL['host'];
		$this->mail->Port = MAIL['port'];
		echo $this->mail->Username = MAIL['user'];
		echo $this->mail->Password = MAIL['password'];


	}
	public function addMensagem(String $subject,String $body,String $recipient_name, String $recipient_email): Email
	{
		$this->data->subject = $subject;
		$this->data->body = $body;
		$this->data->recipient_name = $recipient_name;
		$this->data->recipient_email = $recipient_email;

		return $this;
	}

	public function attach(String $filePath, String $fileName): Email
	{
		$this->data->attach[$filePath] = $fileName;
	}
	public function sendEmail(String $from_name = MAIL['from_name'], String $from_email = MAIL['from_email'])
	{
		try{
		$this->mail->subject = $this->data->subject;
		$this->mail->msgHTML($this->data->body);
		$this->mail->addAddress($this->data->recipient_email,$this->data->recipient_name);
		$this->mail->setFrom($from_email,$from_name);

		if(!empty($this->data->attach)){
			foreach($this->data->attach as $path => $name){
				$this->mail->addAttachment($path,$name);
			}
		}

		$this->mail->send();
	}catch(\Exception $e){
		$this->trataErro($e);
	}

	}
}

