<?php 

interface IRequestHandlerFactory 
{
	public function MakeRequestHandler($parsedRequest);
}

?>