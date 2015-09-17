<?php

require_once('SlackService.php');
require_once('Tests/Doubles/FakeRequestParser.php');
require_once('Tests/Helpers/TestRequestFactory.php');

class SlackServiceTest extends PHPUnit_Framework_TestCase
{
	public function testSlackServiceWithTestRequestHandler()
	{		
		$expectedResponse = '{ "text" : "hello world" }';
		
		$requestFactory = new MockRequestFactory();
		$request = $requestFactory->MakeMockRequest();
		
		$requestParser = new FakeRequestParser("test", "test");
		
		$sut = new SlackService(
			new RequestHandlerFactory(),
			$requestParser);
		
		$response = $sut->SubmitRequest($request);
		$this->assertEquals($expectedResponse, $response);
	}
	
	public function testSlackServiceWithNullRequestHandler()
	{		
		$expectedResponse = '{ "text" : "I received a request that I was unable to handle!" }';
		
		$requestFactory = new MockRequestFactory();
		$request = $requestFactory->MakeMockRequest();
		
		$requestParser = new FakeRequestParser("Channel", "Trigger");
		
		$sut = new SlackService(
			new RequestHandlerFactory(),
			$requestParser);
		
		$response = $sut->SubmitRequest($request);
		$this->assertEquals($expectedResponse, $response);
	}
}
?>