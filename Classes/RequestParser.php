<?php 

class RequestParser implements IRequestParser
{
	public function Parse($request)
	{
		$data = $this->createArrayFromRawRequest($request);		
		$parsedRequest = $this->createParsedRequestFromData($data);
		
		return $parsedRequest;
	}
	
	private function createArrayFromRawRequest($request)
	{
		$data = array();
		$lines = explode("\n", $request);
		foreach($lines as $line)
		{
			$kv = $this->getKeyValueFromLine($line);
			if ($kv == null) continue;
			$data[$kv['key']] = $kv['value'];
		}
		return $data;
	}
	
	private function getKeyValueFromLine($line)
	{
		$line = trim($line);
		$lineParts = explode("=", $line);
		
		if (count($lineParts) < 2) return null;
		
		$key = trim($lineParts[0]);
		$value = trim($lineParts[1]);
	
		if (strlen($key) == 0 || strlen($value) == 0)
		{
			return null;
		}
		
		return [ 'key' => $key , 'value' => $value ];
	}
	
	private function createParsedRequestFromData($data)
	{
		$parsedRequest = new ParsedRequest();
		$parsedRequest->Trigger = $data['trigger_word'];
		$parsedRequest->Channel = $data['channel_name'];
		$parsedRequest->Username = $data['user_name'];
		$parsedRequest->Text = $data['text'];
		return $parsedRequest;
	}
}

?>