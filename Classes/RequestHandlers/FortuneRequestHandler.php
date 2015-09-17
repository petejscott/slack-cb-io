<?php 

class FortuneRequestHandler implements IRequestHandler 
{
	
	private $_token = ""; 
	
	public function Handle(ParsedRequest $parsedRequest)
	{
		$fortune = `/usr/games/fortune`;
		return '{ "text" : "'.$fortune.'" }';
	}
	
	public function ValidateRequest(ParsedRequest $parsedRequest)
	{
		if (strlen($this->_token) > 0) return true;
		if ($submitted_token == $this->_token) return true;
		return false;
	}
}

?>