<?php
/***********************************************
* This file is part of PeoplePods
* (c) xoxco, inc  
* http://peoplepods.net http://xoxco.com
*
* theme/content/short.php
* Default short template for content.
* Used by core_usercontent/list.php
*
* Documentation for this pod can be found here:
* http://peoplepods.net/readme/themes
/**********************************************/
?>	<li class="content_short content_<? $doc->write('type'); ?> <? if ($doc->get('isOddItem')) {?>odd<? } ?> <? if ($doc->get('isEvenItem')) {?>even<? } ?> <? if ($doc->get('isLastItem')) {?>last<? } ?> <? if ($doc->get('isFirstItem')) {?>first<? } ?>" id="content<? $doc->write('id'); ?>">	
		<? if($doc->get('type')!='wiki') $doc->author()->output('avatar'); ?>
		<? switch ($doc->get('type')) {
			case 'wiki':	
				$doc->output('short_wiki');
				break;
				
			case 'wikiactivity':
				$doc->output('short_wikiactivity');
				break;
				
			default:
				$doc->output('short_body');		
		}
				 ?>
				 
		<div class="clearer"></div>
	</li>
