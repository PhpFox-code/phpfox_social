<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 16, 2013, 2:29 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Video
 * @version 		$Id: index.html.php 3342 2011-10-21 12:59:32Z Raymond_Benc $
 */
 
 

 if (! count ( $this->_aVars['aVideos'] )): ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('video.no_videos_found'); ?>
</div>
<?php else: ?>
<div id="js_video_edit_form_outer" style="display:none;">
	<form method="post" action="#" onsubmit="$(this).ajaxCall('video.viewUpdate'); return false;">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
		<div id="js_video_edit_form"></div>
		<div class="table_clear">
			<ul class="table_clear_button">
				<li><input type="submit" value="<?php echo Phpfox::getPhrase('video.update'); ?>" class="button" /></li>
				<li><a href="#" id="js_video_go_advanced" class="button_off_link"><?php echo Phpfox::getPhrase('video.go_advanced_uppercase'); ?></a></li>
				<li><a href="#" onclick="$('#js_video_edit_form_outer').hide(); $('#js_video_outer_body').show(); return false;" class="button_off_link"><?php echo Phpfox::getPhrase('video.cancel_uppercase'); ?></a></li>
			</ul>
			<div class="clear"></div>
		</div>
	
</form>

</div>

<div id="js_video_outer_body">
<?php if (count((array)$this->_aVars['aVideos'])):  $this->_aPhpfoxVars['iteration']['videos'] = 0;  foreach ((array) $this->_aVars['aVideos'] as $this->_aVars['aVideo']):  $this->_aPhpfoxVars['iteration']['videos']++; ?>

		<?php
						Phpfox::getLib('template')->getBuiltFile('video.block.entry');						
						?>
<?php endforeach; endif; ?>
	<div class="clear"></div>
<?php if (Phpfox ::getUserParam('video.can_approve_videos') || Phpfox ::getUserParam('video.can_delete_other_video')): ?>
<?php Phpfox::getBlock('core.moderation'); ?>
<?php endif; ?>
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager'); ?>
</div>
<?php endif; ?>
