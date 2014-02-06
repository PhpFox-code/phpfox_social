<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 11:30 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Photo
 * @version 		$Id: album.html.php 4132 2012-04-25 13:38:46Z Raymond_Benc $
 */
 
 

?>
<div class="item_view">
	<div class="item_info">
<?php echo Phpfox::getLib('date')->convertTime($this->_aVars['aForms']['time_stamp']); ?> <?php echo Phpfox::getPhrase('photo.by_lowercase'); ?> <?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aForms']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aForms']['user_name'], ((empty($this->_aVars['aForms']['user_name']) && isset($this->_aVars['aForms']['profile_page_id'])) ? $this->_aVars['aForms']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aForms']['user_id'], $this->_aVars['aForms']['full_name']), 50, '...') . '</a></span>'; ?>
	</div>
<?php if (( ( Phpfox ::getUserId() == $this->_aVars['aForms']['user_id'] && Phpfox ::getUserParam('photo.can_edit_own_photo_album')) || Phpfox ::getUserParam('photo.can_edit_other_photo_albums')) || ( Phpfox ::getUserId() == $this->_aVars['aForms']['user_id'] && $this->_aVars['aForms']['profile_id'] == '0' ) || ( $this->_aVars['aForms']['profile_id'] == '0' && ( ( ( Phpfox ::getUserId() == $this->_aVars['aForms']['user_id'] && Phpfox ::getUserParam('photo.can_delete_own_photo_album')) || Phpfox ::getUserParam('photo.can_delete_other_photo_albums'))))): ?>
	<div class="item_bar">
		<div class="item_bar_action_holder">
			<a href="#" class="item_bar_action"><span><?php echo Phpfox::getPhrase('photo.actions'); ?></span></a>		
			<ul>
				<?php
						Phpfox::getLib('template')->getBuiltFile('photo.block.menu-album');						
						?>
			</ul>			
		</div>		
	</div>
<?php endif; ?>
	<div id="js_album_description">
<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['description']); ?>
<?php if (! empty ( $this->_aVars['aForms']['description'] )): ?>
		<div class="separate"></div>
<?php endif; ?>
	</div>
	
	<div id="js_album_content">
		<?php
						Phpfox::getLib('template')->getBuiltFile('photo.block.photo-entry');						
						?>
<?php if (Phpfox ::getUserParam('photo.can_approve_photos') || Phpfox ::getUserParam('photo.can_delete_other_photos')): ?>
<?php Phpfox::getBlock('core.moderation'); ?>
<?php endif; ?>
	</div>
	
	<div <?php if ($this->_aVars['aForms']['view_id'] != 0): ?>style="display:none;" class="js_moderation_on"<?php endif; ?>>
<?php Phpfox::getBlock('feed.comment', array()); ?>
	</div>	

</div>
