<?php 

require_once('Classes/RequestHandlers/TestRequestHandler.php');
require_once('Classes/RequestHandlers/NullRequestHandler.php');
require_once('Classes/RequestHandlers/FortuneRequestHandler.php');

class RequestHandlerFactory implements IRequestHandlerFactory
{
	public function MakeRequestHandler(ParsedRequest $parsedRequest)
	{
		if ($parsedRequest->Channel == "test" && $parsedRequest->Trigger == "test")
		{
			return new TestRequestHandler();
		}
		else if ($parsedRequest->Trigger == "cosine:" && strpos($parsedRequest->Text, "fortune") !== false)
		{
			return new FortuneRequestHandler();
		}
		return new NullRequestHandler();
	}
}

?>