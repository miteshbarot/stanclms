<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

switch ($input->urlSegment(1)) {
	case 'companies':
		$q = $input->get->q;

		//master: $pages->get("id=19701");

		$result = [];

		if ($q != "") {
			$companies = $pages->find("template='company-master',title^={$q}");
			if (count($companies)) {
				foreach ($companies as $c) {
					$result[] = array('id' => $c->id, 'code' => $c->code, 'title' => $c->title);
				}
			}else{
				$result = "No company found";
			}
			
		}
		
		$message = $result;
		$code = 200;
		break;

	case 'sendmail':
		$to = $input->post->to;
		$toName = $input->post->name;
		$subject = $input->post->subject;
		$body = $input->post->body;
		$htmlBody = "<html><head></head><body style='font-family: sans-serif; font-size: 16px; line-height: 1.5;'>{$body}</body></html>";

		$mail = wireMail();
		$mail->to($to, $toName);
		$mail->subject($subject);
		$mail->bodyHTML($htmlBody);
		$numSent = $mail->send();
		if ($numSent) {
			$message = "Email sent.";
			$code = 200;
		}else{
			$message = "Email NOT sent.";
			$code = 400;
		}

	break;
	
	default:
		$message = "No URL segment found";
		$code = 404;
		break;
}

$output = array('message' => $message, 'code' => $code);
echo json_encode($output);