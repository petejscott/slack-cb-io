<?php 

require_once('Classes/RequestHandlers/InvalidTokenRequestHandler.php');
require_once('Classes/RequestHandlers/TestRequestHandler.php');
require_once('Classes/RequestHandlers/NullRequestHandler.php');
require_once('Classes/RequestHandlers/FortuneRequestHandler.php');
require_once('Classes/RequestHandlers/ChanceOfMarkovResponseRequestHandler.php');

class RequestHandlerFactory implements IRequestHandlerFactory
{
	public function MakeRequestHandler(ParsedRequest $parsedRequest)
	{
		$requestHandler = null;
		
		switch($parsedRequest->Trigger)
		{
			case "test":
				$requestHandler = $this->makeTestRequestHandler($parsedRequest);
				break;
			case "cosine:":
				$requestHandler = $this->makeCosineRequestHandler($parsedRequest);
				break;
			default:
				$requestHandler = $this->makeDefaultRequestHandler($parsedRequest);
				break;
		}
		
		if ($requestHandler == null) $requestHandler = new NullRequestHandler();
		return $requestHandler;
	}
	
	public function MakeInvalidRequestHandler(ParsedRequest $parsedRequest)
	{
		return new InvalidTokenRequestHandler();
	}
	
	private function makeTestRequestHandler(ParsedRequest $parsedRequest)
	{
		if ($parsedRequest->Channel == "test")
		{
			return new TestRequestHandler();
		}
	}
	
	private function makeCosineRequestHandler(ParsedRequest $parsedRequest)
	{
		if (strpos($parsedRequest->Text, "fortune") !== false)
		{
			return new FortuneRequestHandler();
		}
		else 
		{
			return new ChanceOfMarkovResponseRequestHandler();
		}
	}
	
	private function makeDefaultRequestHandler(ParsedRequest $parsedRequest)
	{
		return new NullRequestHandler();
	}
}

?>
