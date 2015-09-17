<?php 

interface IRequestHandlerFactory 
{
	public function MakeRequestHandler(ParsedRequest $parsedRequest);
	public function MakeInvalidRequestHandler(ParsedRequest $parsedRequest);
}

?>