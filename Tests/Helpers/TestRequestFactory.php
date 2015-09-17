<?php

class MockRequestFactory
{
	public function MakeMockRequest()
	{
		return "token=XXXXXXXXXXXXXXXXXX\n
team_id=T0001\n
team_domain=example\n
channel_id=C2147483705\n
channel_name=test\n
timestamp=1355517523.000005\n
user_id=U2147483697\n
user_name=Steve\n
text=googlebot: What is the air-speed velocity of an unladen swallow?\n
trigger_word=googlebot:\n";
	}
}

?>