<?php 

class FortuneRequestHandler implements IRequestHandler 
{
	public function Handle(ParsedRequest $parsedrequest)
	{
		$fortune = `/usr/games/fortune`;
		return '{ "text" : "'.$fortune.'" }';
	}
}

?>