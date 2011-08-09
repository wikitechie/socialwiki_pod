<?php

include_once("../../lib/Core.php");

// some useful functions :)
	function inc_time_str($base,$format="Y-m-d H:i:s")
	{
		$temp	=strtotime($base);
		$newtime=strtotime("+1 second",$temp);
		$newtime=date($format,$newtime);
		return $newtime;
	}

// only allow logged in people
$POD = new PeoplePod();

$POD->header();
		define('WIKI_USERNAME','');
		define('WIKI_PASSWORD','');
		
		$wikis = $POD->getContents(array(
			'type'=>'wiki'
		));	
		
		
		foreach($wikis as $wiki){	
			$_GET["api"] = $wiki->get('api');
			$_SERVER['REQUEST_METHOD']="GET";
			include('default_requester.php');
		}		
		
$POD->footer();

?>
