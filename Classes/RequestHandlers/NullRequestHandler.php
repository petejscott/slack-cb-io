<?php 

class NullRequestHandler implements IRequestHandler 
{
	public function Handle(ParsedRequest $parsedrequest)
	{
		return '{ "text" : "I received a request that I was unable to handle!" }';
	}
}

?>