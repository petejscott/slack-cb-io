<?php 

require_once('SlackService.php');

$slackService = new SlackService(
	new RequestHandlerFactory(),
	new RequestParser());

$response = $slackService->SubmitRequest($_POST);

echo $response;

?>