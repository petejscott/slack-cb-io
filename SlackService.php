<?php 

require_once('Interfaces/IRequestHandlerFactory.php');
require_once('Interfaces/IRequestHandler.php');
require_once('Interfaces/IRequestParser.php');

require_once('Classes/RequestParser.php');
require_once('Classes/ParsedRequest.php');
require_once('Classes/RequestHandlers/TestRequestHandler.php');
require_once('Classes/RequestHandlers/NullRequestHandler.php');
require_once('Classes/RequestHandlerFactory.php');

class SlackService 
{
	private $_requestHandlerFactory = null;
	private $_requestParser = null;
	
	public function __construct(
		IRequestHandlerFactory $requestHandlerFactory,
		IRequestParser $requestParser)
	{
		if ($requestHandlerFactory === null) throw new InvalidArgumentException('Null $requestHandlerFactory');
		if ($requestParser === null) throw new InvalidArgumentException('Null $requestParser');
		
		$this->_requestHandlerFactory = $requestHandlerFactory;
		$this->_requestParser = $requestParser;
	}
	
	public function SubmitRequest($request)
	{
		$parsedRequest = $this->_requestParser->Parse($request);		
		$requestHandler = $this->_requestHandlerFactory->MakeRequestHandler($parsedRequest);
		$response = $requestHandler->Handle($parsedRequest);
		return $response; 
	}
}

?>