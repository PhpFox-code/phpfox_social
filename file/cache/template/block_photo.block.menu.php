<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 3:45 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Photo
 * @version 		$Id: menu.html.php 6391 2013-07-31 10:08:17Z Miguel_Espinoza $
 */
 
 

?>
<?php if (( Phpfox ::getUserParam('photo.can_edit_own_photo') && $this->_aVars['aForms']['user_id'] == Phpfox ::getUserId()) || Phpfox ::getUserParam('photo.can_edit_other_photo')): ?>
		<li><a href="#" onclick="if ($Core.exists('.js_box_image_holder_full')) { js_box_remove($('.js_box_image_holder_full').find('.js_box_content')); } $Core.box('photo.editPhoto', 700, 'photo_id=<?php echo $this->_aVars['aForms']['photo_id']; ?>'); $('#js_tag_photo').hide();return false;"><?php echo Phpfox::getPhrase('photo.edit_this_photo'); ?></a></li>
<?php endif; ?>
		
<?php if ($this->_aVars['aForms']['user_id'] == Phpfox ::getUserId() && ! defined ( 'PHPFOX_IS_HOSTED_SCRIPT' )): ?>
			<li>
				<a href="#" title="Set this photo as your profile image." onclick="if ($Core.exists('.js_box_image_holder_full')) { js_box_remove($('.js_box_image_holder_full').find('.js_box_content')); } tb_show('', '', null, '<?php echo Phpfox::getPhrase('photo.setting_this_photo_as_your_profile_picture_please_hold'); ?>', true); $.ajaxCall('photo.makeProfilePicture', 'photo_id=<?php echo $this->_aVars['aForms']['photo_id']; ?>', 'GET'); return false;"><?php echo Phpfox::getPhrase('photo.make_profile_picture'); ?></a>
			</li>
<?php if (Phpfox ::getUserParam('profile.can_change_cover_photo')): ?>
				<li>
					<a href="#" title="<?php echo Phpfox::getPhrase('user.set_this_photo_as_your_profile_cover_photo'); ?>" onclick="$.ajaxCall('user.setCoverPhoto', 'photo_id=<?php echo $this->_aVars['aForms']['photo_id']; ?>', 'GET'); return false;"><?php echo Phpfox::getPhrase('user.set_as_cover_photo'); ?></a>
				</li>
<?php endif; ?>
<?php endif; ?>
		
<?php if (Phpfox ::isModule('feed') && Phpfox ::getUserParam('feed.can_sponsor_feeds')): ?>
			<li>
				<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('ad.sponsor', array('where' => 'feed','section' => 'photo','item' => $this->_aVars['aForms']['photo_id'])); ?>">
<?php echo Phpfox::getPhrase('feed.sponsor_in_feed'); ?>
				</a>
			</li>
<?php endif; ?>
		
<?php if (Phpfox ::getUserParam('photo.can_feature_photo') && ! $this->_aVars['aForms']['is_sponsor']): ?>
		    <li id="js_photo_feature_<?php echo $this->_aVars['aForms']['photo_id']; ?>">
<?php if ($this->_aVars['aForms']['is_featured']): ?>
			    <a href="#" title="<?php echo Phpfox::getPhrase('photo.un_feature_this_photo'); ?>" onclick="$.ajaxCall('photo.feature', 'photo_id=<?php echo $this->_aVars['aForms']['photo_id']; ?>&amp;type=0', 'GET'); return false;"><?php echo Phpfox::getPhrase('photo.un_feature'); ?></a>
<?php else: ?>
			    <a href="#" title="<?php echo Phpfox::getPhrase('photo.feature_this_photo'); ?>" onclick="$.ajaxCall('photo.feature', 'photo_id=<?php echo $this->_aVars['aForms']['photo_id']; ?>&amp;type=1', 'GET'); return false;"><?php echo Phpfox::getPhrase('photo.feature'); ?></a>
<?php endif; ?>
		    </li>
<?php endif; ?>

<?php if (Phpfox ::getUserParam('photo.can_sponsor_photo') && ! defined ( 'PHPFOX_IS_GROUP_VIEW' )): ?>
		<li id="js_sponsor_<?php echo $this->_aVars['aForms']['photo_id']; ?>" class="" style="<?php if ($this->_aVars['aForms']['is_sponsor']): ?>display:none;<?php endif; ?>">
			    <a href="#" onclick="$('#js_sponsor_<?php echo $this->_aVars['aForms']['photo_id']; ?>').hide();$('#js_unsponsor_<?php echo $this->_aVars['aForms']['photo_id']; ?>').show();$.ajaxCall('photo.sponsor','photo_id=<?php echo $this->_aVars['aForms']['photo_id']; ?>&type=1'); return false;">
<?php echo Phpfox::getPhrase('photo.sponsor_this_photo'); ?>
			    </a>
		</li>		    
		<li id="js_unsponsor_<?php echo $this->_aVars['aForms']['photo_id']; ?>" class="" style="<?php if ($this->_aVars['aForms']['is_sponsor'] != 1): ?>display:none;<?php endif; ?>">
			    <a href="#" onclick="$('#js_sponsor_<?php echo $this->_aVars['aForms']['photo_id']; ?>').show();$('#js_unsponsor_<?php echo $this->_aVars['aForms']['photo_id']; ?>').hide();$.ajaxCall('photo.sponsor','photo_id=<?php echo $this->_aVars['aForms']['photo_id']; ?>&type=0'); return false;">
<?php echo Phpfox::getPhrase('photo.unsponsor_this_photo'); ?>
			    </a>
		</li>
<?php elseif (Phpfox ::getUserParam('photo.can_purchase_sponsor') && ! defined ( 'PHPFOX_IS_GROUP_VIEW' ) && $this->_aVars['aForms']['user_id'] == Phpfox ::getUserId() && $this->_aVars['aForms']['is_sponsor'] != 1): ?>
		    <li>
			<a href="<?php echo Phpfox::permalink('ad.sponsor', $this->_aVars['aForms']['photo_id'], null, false, null, (array) array (
)); ?>section_photo/">
<?php echo Phpfox::getPhrase('photo.sponsor_this_photo'); ?>
			</a>
		    </li>
<?php endif; ?>
		
<?php if (PHPFOX_IS_AJAX && isset ( $this->_aVars['bIsTheater'] ) && $this->_aVars['bIsTheater'] && ( Phpfox ::getUserParam('photo.can_edit_own_photo') && $this->_aVars['aForms']['user_id'] == Phpfox ::getUserId()) || Phpfox ::getUserParam('photo.can_edit_other_photo')): ?>
					<li>
						<a href="#" onclick="$('#photo_view_ajax_loader').show(); $('#menu').remove(); $('#noteform').hide(); $('#js_photo_view_image').imgAreaSelect({ hide: true }); $('#js_photo_view_holder').hide(); $.ajaxCall('photo.rotate', 'photo_id=<?php echo $this->_aVars['aForms']['photo_id']; ?>&amp;photo_cmd=right&amp;currenturl=' + $('#js_current_page_url').html()); return false;">
<?php echo Phpfox::getPhrase('photo.rotate_right'); ?>
						</a>
					</li>
					<li>
						<a href="#" onclick="$('#photo_view_ajax_loader').show(); $('#menu').remove(); $('#noteform').hide(); $('#js_photo_view_image').imgAreaSelect({ hide: true }); $('#js_photo_view_holder').hide(); $.ajaxCall('photo.rotate', 'photo_id=<?php echo $this->_aVars['aForms']['photo_id']; ?>&amp;photo_cmd=left&amp;currenturl=' + $('#js_current_page_url').html()); return false;">		<?php echo Phpfox::getPhrase('photo.rotate_left'); ?>							
						</a>
					</li>		
<?php endif; ?>
		
<?php (($sPlugin = Phpfox_Plugin::get('photo.template_block_menu')) ? eval($sPlugin) : false); ?>
		
<?php if (( Phpfox ::getUserParam('photo.can_delete_own_photo') && $this->_aVars['aForms']['user_id'] == Phpfox ::getUserId()) || Phpfox ::getUserParam('photo.can_delete_other_photos')): ?>
<?php if (defined ( 'PHPFOX_IS_THEATER_MODE' )): ?>
		<li class="item_delete"><a href="#" onclick="if (confirm('Are you sure?')) { $.ajaxCall('photo.deleteTheaterPhoto', 'photo_id=<?php echo $this->_aVars['aForms']['photo_id']; ?>'); } return false;"><?php echo Phpfox::getPhrase('photo.delete_this_photo'); ?></a></li>
<?php else: ?>
		<li class="item_delete"><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('photo', array('delete' => $this->_aVars['aForms']['photo_id'])); ?>" class="sJsConfirm"><?php echo Phpfox::getPhrase('photo.delete_this_photo'); ?></a></li>
<?php endif; ?>
<?php endif; ?>
		
<?php if (isset ( $this->_aVars['aCallback'] )): ?>
			<li>
				<a href="#" onclick="$Core.Photo.setCoverPhoto(<?php echo $this->_aVars['aForms']['photo_id']; ?>,<?php echo $this->_aVars['aCallback']['item_id']; ?>); return false;" >
<?php echo Phpfox::getPhrase('photo.set_as_page_s_cover_photo'); ?>
				</a>
			</li>
<?php endif; ?>
