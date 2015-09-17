<?php 

class TestRequestHandler implements IRequestHandler 
{
	public function Handle(ParsedRequest $parsedRequest)
	{
		return '{ "text" : "hello world" }';
	}
	
	public function ValidateRequest(ParsedRequest $parsedRequest)
	{
		return true;
	}
}

?>