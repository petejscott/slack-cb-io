<?php 

require_once('SlackService.php');

$slackService = new SlackService(
	new RequestHandlerFactory(),
	new RequestParser());

$request = $_POST;
$response = $slackService->SubmitRequest($request);

echo $response;

?>