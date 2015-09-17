<?php

require_once('SlackService.php');
require_once('Tests/Helpers/TestRequestFactory.php');

class SlackServiceTest extends PHPUnit_Framework_TestCase
{
	public function testSlackServiceWithTestRequestHandler()
	{		
		$expectedResponse = '{ "text" : "hello world" }';
		
		$requestFactory = new TestRequestFactory();
		$request = $requestFactory->MakeMockRequest();
		$request['trigger_word'] = "test";
		$request['channel_name'] = "test";
		
		$sut = new SlackService(
			new RequestHandlerFactory(),
			new RequestParser());
		
		$response = $sut->SubmitRequest($request);
		$this->assertEquals($expectedResponse, $response);
	}
	
	public function testSlackServiceWithNullRequestHandler()
	{		
		$expectedResponse = '{ "text" : "I received a request that I was unable to handle!" }';
		
		$requestFactory = new TestRequestFactory();
		$request = $requestFactory->MakeMockRequest();
		$request['trigger_word'] = "InvalidData";
		$request['channel_name'] = "InvalidData";
		
		$sut = new SlackService(
			new RequestHandlerFactory(),
			new RequestParser());
		
		$response = $sut->SubmitRequest($request);
		$this->assertEquals($expectedResponse, $response);
	}
}
?>