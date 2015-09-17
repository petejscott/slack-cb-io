<?php 

class TestRequestHandler implements IRequestHandler 
{
	public function Handle(ParsedRequest $parsedrequest)
	{
		return '{ "text" : "hello world" }';
	}
}

?>