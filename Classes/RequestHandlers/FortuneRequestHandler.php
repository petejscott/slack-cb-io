<?php 

class FortuneRequestHandler implements IRequestHandler 
{
	
	private $_token = ""; 
	
	public function Handle(ParsedRequest $parsedRequest)
	{
		if (strlen($this->_token) > 0)
		{
			$isValidRequest = $this->verifyToken($parsedRequest->Token);
			if ($isValidRequest === false) '{ "text" : "Invalid Token" }';
		}
		
		$fortune = `/usr/games/fortune`;
		return '{ "text" : "'.$fortune.'" }';
	}
	
	public function ValidateRequest(ParsedRequest $parsedRequest)
	{
		if ($submitted_token == $this->_token) return true;
		return false;
	}
}

?>