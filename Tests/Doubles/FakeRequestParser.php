<?php 

class FakeRequestParser implements IRequestParser
{
	private $_testChannel = "";
	private $_testTrigger = "";
	
	public function __construct($channel, $trigger)
	{
		$this->_testChannel = $channel;
		$this->_testTrigger = $trigger;
	}
	
	public function Parse($request) 
	{
		$parsed = new ParsedRequest();
		$parsed->Channel = $this->_testChannel;
		$parsed->Trigger = $this->_testTrigger;
		return $parsed;
	}
	
}

?>