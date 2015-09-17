<?php 

class NullRequestHandler implements IRequestHandler 
{
	public function Handle(ParsedRequest $parsedRequest)
	{
		return '{ "text" : "I received a request that I was unable to handle!" }';
	}
	
	public function ValidateRequest(ParsedRequest $parsedRequest)
	{
		return true;
	}
}

?>