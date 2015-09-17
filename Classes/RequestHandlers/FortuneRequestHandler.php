<?php 

class FortuneRequestHandler implements IRequestHandler 
{	
	private $_token = "";
	
	public function Handle(ParsedRequest $parsedRequest)
	{
		$fortune = `/usr/games/fortune`;
		return '{ "text" : '.json_encode($fortune).' }';
	}
	
	public function ValidateRequest(ParsedRequest $parsedRequest)
	{
		if ($this->skipTokenVerification()) return true;
		if ($parsedRequest->Token == $this->_token) return true;
		return false;
	}
	
	private function skipTokenVerification()
	{
    if (strlen($this->_token) == 0) return true;
    return false;
	}
}

?>
