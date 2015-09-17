<?php 

interface IRequestHandlerFactory 
{
	public function MakeRequestHandler(ParsedRequest $parsedRequest);
}

?>