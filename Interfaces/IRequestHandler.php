<?php

interface IRequestHandler 
{
	public function Handle(ParsedRequest $parsedRequest);
}

?>