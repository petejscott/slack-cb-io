<?php 

class ChanceOfMarkovResponseRequestHandler implements IRequestHandler 
{	
	private $_token = "";
	
	public function Handle(ParsedRequest $parsedRequest)
	{
		if ($this->shouldWeRespond() === false) return;
		
		$markovResponse = $this->makeMarkov();
		
		return '{ "text" : '.json_encode($markovResponse).' }';
	}
	
	public function ValidateRequest(ParsedRequest $parsedRequest)
	{
		if ($this->skipTokenVerification()) return true;
		if ($parsedRequest->Token == $this->_token) return true;
		return false;
	}
	
	private function makeMarkov()
	{
		$fakeMarkov[0] = "LIMITED TO WARRANTIES OF ANY fault in himself. Then Mashenka saw, running out of my former hatred I could rouse in you the same time, in the tone of a railway, or a boarding school, you know.";
		$fakeMarkov[1] = "How open, how free, how still it is not joking, perhaps she will come and see you want clouds for? Yes, now then, clumsy seal!";
		$fakeMarkov[2] = "Crimea, he agreed, though he received a professorship at the police-station. George, my darling, I am a bad, low woman I made out a madman....";
		
		$index = mt_rand(0,2);
		return $fakeMarkov[$index];
	}
	
	private function shouldWeRespond()
	{
		return mt_rand (0,20) == 0;
	}
	
	private function skipTokenVerification()
	{
		if (strlen($this->_token) == 0) return true;
		return false;
	}
}

?>
