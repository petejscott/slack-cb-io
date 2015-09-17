<?php 

class RequestHandlerFactory implements IRequestHandlerFactory
{
	public function MakeRequestHandler(ParsedRequest $parsedRequest)
	{
		if ($parsedRequest->Channel == "test" && $parsedRequest->Trigger == "test")
		{
			return new TestRequestHandler();
		}
		return new NullRequestHandler();
	}
}

?>