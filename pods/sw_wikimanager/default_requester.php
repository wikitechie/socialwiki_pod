<?php

	
include_once("../../lib/Core.php");

// $POD is already defined

	if (defined('WIKI_USERNAME')) 
	{
		
		include_once('wikimate/globals.php');
		if (isset($requester)) unset($requester);
		$requester = new Wikimate;
		$data = array(
			'list' => 'recentchanges',
			'rcprop' => 'user|comment|timestamp|title|ids|sizes|redirect|loginfo|flags',
			'rcend' => $wiki->get('rcstart'),		
			'rclimit' => 500
		);			
		$results = $requester->query( $data );
		$changes_count=count($results['query']['recentchanges']);

		if($results && (count($results)>0) && ($changes_count>0) ) 
		{
			foreach ($results['query']['recentchanges'] as $recentchange) 
			{					
				//first we check if the user is registered in our website
				$username = $recentchange['user'];				
				$sql = "SELECT value, userId from flags WHERE itemId=".$wiki->get('id')." AND name='mywiki' AND value='".mysql_real_escape_string($username)."';";	
				$res = mysql_query($sql,$POD->DATABASE);
				if($res) 
				{
					$num = mysql_num_rows($res);
					if ($num > 0)
					{
							//if the user is registered in our website, we are going to publish his activity
							echo "<p>User is here</p>";
							//user info
							$user = mysql_fetch_assoc($res);
							$userId = $user['userId'];
							
							//publishing..
							$new_activity = $POD->getContent();
							$new_activity->headline = $recentchange['title'] ;
							$new_activity->type = 'wikiactivity';
							$new_activity->userId = $userId;
							$new_activity->body = $recentchange['comment'];
							$new_activity->save(); // save the content to be able to add meta fields
							$recentchange['timestamp']= str_replace('T',' ',$recentchange['timestamp']);
							$recentchange['timestamp'] = str_replace('Z','',$recentchange['timestamp']);							
							$new_activity->addMeta('rcid',$recentchange['rcid']);
							$new_activity->addMeta('edit_type',$recentchange['type']);
							$new_activity->addMeta('wikiId',$wiki->get('id'));
							
					}
				}
			}		
			$rcts=$results['query']['recentchanges'][0]['timestamp'];
			$wiki->set('rcstart', inc_time_str($rcts));
			$wiki->set('last_rcid', $results['query']['recentchanges'][0]['rcid']);	
			$wiki->save();
		}		
		else
		{	echo "<b>";
			$wiki->write('headline');
			echo "</b>: no changes<br>";
		}
	}	
?>
