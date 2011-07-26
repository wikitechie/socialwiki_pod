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
				<ul class="content_options">
					<li class="comments_option">
						<a id="comments_num<?= $doc->id; ?>" href="<? $doc->write('permalink'); ?>"><?  if ($doc->comments()->totalCount() > 0) {  echo $doc->comments()->totalCount() . " comments"; } else { echo "No comments"; } ?></a>
					</li>
					<? if ($doc->POD->isAuthenticated()) { ?>
						<li class="watching_option">
							<a href="#toggleFlag" data-flag="watching" data-active="Stop tracking" title="Track new comments on the dashboard" data-inactive="Track" data-content="<?= $doc->id; ?>" class="trackingLink <? if ($doc->hasFlag('watching',$POD->currentUser())) {?>active<? } ?>">Track</a>
						</li>
					<? } ?>				
					<? if ($doc->get('privacy')=="friends_only") { ?>
						<li class="friends_only_option">Friends Only</li>
					<? } else if ($doc->get('privacy')=="group_only") { ?>
						<li class="group_only_option">Group Members Only</li>
					<? } else if ($doc->get('privacy')=="owner_only") { ?>
						<li class="owner_only_option">Only you can see this.</li>
					<? } ?>
					<? if ($doc->isEditable()) { ?>
						<li class="delete_option">
							<a href="#deleteContent" data-content="<?= $doc->id; ?>">Delete</a>
						</li>
					<? } ?>
					<li>
						<a href="#listComments" data-active="hidden" data-content="<?= $doc->id; ?>" data-comments="#comments<?= $doc->id; ?>" >Show Comments</a>
					</li>
				</ul>
				<!-- comments area  -->
				<div id="comments_area<?= $doc->id;?>" style="display:none;" >
				<div id="comments<?= $doc->id; ?>" ></div>
				<? if ($this->POD->isAuthenticated()) { ?>
					<div id="comment_form" >
					<h3 id="reply">Leave a comment</h3>
					<? $POD->currentUser()->output('avatar'); ?>
					<div class="attributed_content">
					<form method="post" id="add_comment" action="#addComment" data-inline="true" data-comments="#comments<?= $doc->id; ?>" data-content="<?= $doc->id; ?>">
					<textarea border="1px solid" name="comment" class="expanding" id="comment"></textarea>	
					<input type="submit" value="Post" />
					</form>
					</div>
					<div class="clearer"></div>		
					</div>
				<? } else { ?>
					<div id="comment_form">
					<a name="reply"></a>
					<p>
					<a href="<? $POD->siteRoot(); ?>/join">Register for an account</a> to leave a comment.	
					If you've already got an account, <a href="<? $POD->siteRoot(); ?>/login">login here</a>.
					</p>
					</div>
				<? } ?>
				</div>

		</article>
		<div class="amjad">Hello!</div>


