<?php 

class RequestParser implements IRequestParser
{
	public function Parse($request)
	{
		$parsedRequest = $this->createParsedRequestFromData($request);		
		return $parsedRequest;
	}
	
	private function createParsedRequestFromData($data)
	{
		$parsedRequest = new ParsedRequest();
		$parsedRequest->Trigger = $data['trigger_word'];
		$parsedRequest->Channel = $data['channel_name'];
		$parsedRequest->Username = $data['user_name'];
		$parsedRequest->Text = $data['text'];
		$parsedRequest->Token = $data['token'];
		return $parsedRequest;
	}
}

?>