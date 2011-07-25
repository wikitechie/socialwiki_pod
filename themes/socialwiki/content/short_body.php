<?php
/***********************************************
* This file is part of PeoplePods
* (c) xoxco, inc  
* http://peoplepods.net http://xoxco.com
*
* theme/content/short_body.php
* Defines the body output as included by short.php
*
* Documentation for this pod can be found here:
* http://peoplepods.net/readme/themes
/**********************************************/
?>
		<article class="attributed_content content_body">
				<header>
					<span class="content_meta">
						<span class="content_author"><? $doc->author()->permalink(); ?></span> posted (<span class="content_time"><? echo $doc->write('timesince'); ?></span>)
					</span>
					<h1><a href="<? $doc->write('permalink'); ?>" title="<? $doc->write('headline'); ?>"><? $doc->write('headline'); ?></a></h1>
				</header>
				
				<? if ($doc->get('video')) {
					if ($embed = $POD->GetVideoEmbedCode($doc->get('video'),530,400,'true','always')) { 
						echo $embed; 
					} else { ?>
						<p>Watch Video: <a href="<? $doc->write('video'); ?>"><? $doc->write('video'); ?></a></p>
					<? }
				} ?>	

				<? if ($img = $doc->files()->contains('file_name','img')) { ?>
					<p class="content_image"><a href="<? $doc->write('permalink'); ?>"><img src="<? $img->write('resized') ?>" /></a></p>
				<? } ?>			


				<? if ($doc->get('link')) { ?>
					<p>View Link: <a href="<? $doc->write('link'); ?>"><? $doc->write('link'); ?></a></p>
				<? } ?>		

				<? if ($doc->get('body')) { 
					$doc->writeFormatted('body');
				} ?>

				<div class="clearer"></div>


		</article>
		<div class="amjad">Hello!</div>


