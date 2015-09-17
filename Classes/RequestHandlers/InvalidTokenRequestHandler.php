<?php 

class InvalidTokenRequestHandler implements IRequestHandler 
{
	public function Handle(ParsedRequest $parsedRequest)
	{
		return '{ "text" : "Invalid token received" }';
	}
	
	public function ValidateRequest(ParsedRequest $parsedRequest)
	{
		return true;
	}
}

?>