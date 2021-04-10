<?php namespace ProcessWire;
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

if (isset($_GET)) {
	$id = $_GET['id'];
	$p = $pages->get("id={$id}");
	$loanAmount = $p->loan_amount;
	$tenure = $p->tenure;
	$custname = $p->fname." ".$p->lname;
	$empname = $p->employer_name;
	$email = $p->email;
	if ($email == "") {
		$email = "admin@example.com";
	}
}


$vendorId = "scbPL";
$client_txnId = $id;
$institutionId = "2";

//$returnUrl ="https://example.com/customer?id=%s";
$returnUrl ="http://imedia.iprospect.co/demo/lms/integrations/perfios-callback/?id=%s";


/* Read the public_key and private_key as a string. Change path appropriately */
$fp = fopen($config->urls->templates."perfios/public_key", "r");
$public_key_string = fread($fp, 8192);
fclose($fp);


$fp = fopen($config->urls->templates."perfios/private_key", "r");
$private_key_string = fread($fp, 8192);
fclose($fp);


$my_file = $config->urls->templates."start_perfios.php";
$file  = fopen($my_file, 'w');

$public_key = openssl_get_publickey($public_key_string);
/* Convert to public key */
$private_key = openssl_get_privatekey($private_key_string);


/* Please Enter Email_Id */
$emailid = $email;
/*static String email ="test@perfios.com";
	static String server ="demo.perfios.com";
	public static  String vendor = "scbPL";*/

/* Encrypt digest using key */
$encrypted_emailid = $email;
openssl_public_encrypt($emailid, $encrypted_emailid, $public_key);

/* Convert to Hex (base16)*/ 
$encrypted_emailid = bin2hex($encrypted_emailid);


$payload = '<payload><emailId>'.$encrypted_emailid.'</emailId><vendorId>'.$vendorId.'</vendorId><loanType>business</loanType><loanAmount>'.$loanAmount.'</loanAmount><destination>netbankingFetch</destination><txnId>'.$client_txnId.'</txnId><apiVersion>2.1</apiVersion><loanDuration>'.$tenure.'</loanDuration><yearMonthFrom>2020-01</yearMonthFrom><yearMonthTo>2020-07</yearMonthTo><returnUrl>'.$returnUrl.'</returnUrl><applicantName>'.$custname.'</applicantName><employerName>'.$empname.'</employerName><transactionCompleteCallbackUrl>'.$returnUrl.'</transactionCompleteCallbackUrl></payload>';


$sha_encrypt = (sha1($payload));
//echo "<br/>".$sha_encrypt;

//$signature;

$signature = $sha_encrypt;
openssl_private_encrypt($sha_encrypt,$signature,$private_key);

/* Convert to Hex (base16) */
$signature1 =  bin2hex($signature);

echo "<pre>";
echo "<br/> Encrypted Email Id: " . $encrypted_emailid;
echo "<br/> Payload: " . $payload;
echo "<br/> Signature: " . $signature1;
echo "</pre>";

/*$html_string = '<html><head></head>
<body onload="document.myform.submit()">
<form name="myform" method="post" action ="https://demo.perfios.com/KuberaVault/insights/start">
<input type="hidden" name = "payload" value="'.$payload.'"/></br>
<input type="hidden" name = "signature" value="'.$signature1.'"/><br>
</body></html>';

fwrite($file , $html_string);
fclose($file);*/

//$redirect = $config->urls->root."integrations/perfios/start/?id=".$id;
//$session->redirect($redirect);
?>
<!-- <html><head></head>
<body onload="document.myform.submit()">
<form name="myform" method="post" action ="https://app.perfios.com/KuberaVault/insights/start">
<input type="hidden" name = "payload" value="<?php echo $payload ?>"/></br>
<input type="hidden" name = "signature" value="<?php echo $signature1 ?>"/><br>
</body></html> -->