<?php

//working_directory/emailBuilder.php

require_once(__DIR__ . '/vendor/autoload.php');

$credentials = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('AngelaRozov_2022-09-13', 'xkeysib144662072a5e0c5c746ababc635f954a5598b242d08a40c2604f5288ce315733-gjbKfIrAwY6Z175q');
$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(),$credentials);

$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
	'subject' => 'from the PHP SDK!',
	'sender' => ['name' => 'Sendinblue', 'email' => 'contact@sendinblue.com'],
	'replyTo' => ['name' => 'Sendinblue', 'email' => 'contact@sendinblue.com'],
	'to' => [[ 'name' => 'Max Mustermann', 'email' => 'angelarozova@gmail.com']],
	'htmlContent' => '<html><body><h1>This is a transactional email {{params.bodyMessage}}</h1></body></html>',
	'params' => ['bodyMessage' => 'made just for you!']
]);

try {
	$result = $apiInstance->sendTransacEmail($sendSmtpEmail);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage(),PHP_EOL;
}

?>