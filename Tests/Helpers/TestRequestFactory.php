<?php

class MockRequestFactory
{
	public function MakeMockRequest()
	{
		$request = array();
		$request['token'] = 'XXXXXXXXXXXXXXXXXX';
		$request['team_id'] = 'T0001';
		$request['team_domain'] = 'example';
		$request['channel_id'] = 'C2147483705';
		$request['channel_name'] = 'test';
		$request['timestamp'] = '1355517523.000005';
		$request['user_id'] = 'U2147483697';
		$request['user_name'] = 'Steve';
		$request['text'] = 'googlebot: What is the air-speed velocity of an unladen swallow?';
		$request['trigger_word'] = 'googlebot:';
		return $request;
	}
}

?>