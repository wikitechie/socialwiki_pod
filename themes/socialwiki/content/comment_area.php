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
		
				<!-- comments area  -->
				<div class="comments_area appearOnHover" style="display:none;" >
				<div id="comments<?= $doc->id; ?>" >
					<p>Most Recent Comments :</p>
					<?php 
						$mostRecent = $POD->getComments(array('contentId'=>$doc->get('id')),'date DESC',2,0);
						$mostRecent->output('comment');
					?>
				</div>
				<ul class='content_options'>
				<a class='content_option' href="#listComments" data-content="<?= $doc->id; ?>" data-comments="#comments<?= $doc->id; ?>" >Show Comments</a>
				</ul>
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


