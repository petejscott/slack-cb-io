<?php

require_once('Interfaces/IRequestParser.php');
require_once('Classes/ParsedRequest.php');
require_once('Classes/RequestParser.php');
require_once('Tests/Helpers/TestRequestFactory.php');

class RequestParserTest extends PHPUnit_Framework_TestCase
{
	public function testRequestParserGetsCorrectDataSet()
	{	
		$requestFactory = new MockRequestFactory();
		$request = $requestFactory->MakeMockRequest();
		
		$requestParser = new RequestParser();
		$parsedRequest = $requestParser->Parse($request);
		
		$this->assertEquals("googlebot:", $parsedRequest->Trigger);
		$this->assertEquals("test", $parsedRequest->Channel);
		$this->assertEquals("googlebot: What is the air-speed velocity of an unladen swallow?", $parsedRequest->Text);
		$this->assertEquals("Steve", $parsedRequest->Username);
	}
}
?>