<?php

interface IRequestHandler 
{
	public function Handle(ParsedRequest $parsedRequest);
	public function ValidateRequest(ParsedRequest $parsedRequest);
}

?>