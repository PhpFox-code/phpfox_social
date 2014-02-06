<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 11:30 am */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Photo
 * @version 		$Id: photo-entry.html.php 6240 2013-07-12 10:45:09Z Raymond_Benc $
 */



?>


<?php if (count ( $this->_aVars['aPhotos'] ) < 1): ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('photo.no_photos_have_been_added_yet'); ?>
</div>
<?php endif; ?>

<?php if (count((array)$this->_aVars['aPhotos'])):  $this->_aPhpfoxVars['iteration']['photos'] = 0;  foreach ((array) $this->_aVars['aPhotos'] as $this->_aVars['aPhoto']):  $this->_aPhpfoxVars['iteration']['photos']++; ?>




<div class="<?php if ($this->_aVars['aPhoto']['view_id'] == 1 && ! isset ( $this->_aVars['bIsInApproveMode'] )): ?> row_moderate_image<?php endif; ?> <?php if ($this->_aVars['aPhoto']['is_sponsor'] && ! Phpfox ::getParam('photo.show_info_on_mouseover')): ?> row_sponsored_image<?php endif;  if (isset ( $this->_aVars['sView'] ) && $this->_aVars['sView'] == 'featured'):  else:  if ($this->_aVars['aPhoto']['is_featured'] && ! Phpfox ::getParam('photo.show_info_on_mouseover')): ?> row_featured_image<?php endif;  endif; ?> photo_row <?php if (! Phpfox ::getParam('photo.show_info_on_mouseover')): ?>photo_row_small<?php else: ?>photo_row_dynamic_view<?php endif;  if (isset ( $this->_aVars['iPhotosPerRow'] )): ?> photos_per_page_<?php echo $this->_aVars['iPhotosPerRow'];  endif; ?>" id="js_photo_id_<?php echo $this->_aVars['aPhoto']['photo_id']; ?>">
	<div class="js_outer_photo_div js_mp_fix_holder photo_row_holder"<?php if (! Phpfox ::getParam('photo.show_info_on_mouseover')): ?> style="display: inline-block;"<?php endif; ?>>

	<div class="photo_row_height image_hover_holder <?php if (Phpfox ::getParam('photo.show_info_on_mouseover')): ?>photo_row_height_dynamic_view<?php endif; ?>">
<?php if (Phpfox ::getParam('photo.auto_crop_photo') && ! Phpfox ::getParam('photo.show_info_on_mouseover')): ?>
		<div class="photo_clip_holder_main<?php if (Phpfox ::getParam('photo.show_info_on_mouseover')): ?>_big<?php endif; ?>">
<?php endif; ?>
<?php if (( $this->_aVars['aPhoto']['view_id'] == 1 && Phpfox ::getUserParam('photo.can_approve_photos') ) || ( $this->_aVars['aPhoto']['user_id'] == Phpfox ::getUserId() && ( Phpfox ::getUserParam('photo.can_edit_own_photo_album') || Phpfox ::getUserParam('photo.can_edit_own_photo') || Phpfox ::getUserParam('photo.can_delete_own_photo') ) ) || ( Phpfox ::getUserParam('photo.can_edit_other_photo_albums') || Phpfox ::getUserParam('photo.can_edit_other_photo') || Phpfox ::getUserParam('photo.can_delete_other_photos') ) || ( defined ( 'PHPFOX_IS_PAGES_VIEW' ) && Phpfox ::getService('pages')->isAdmin('' . $this->_aVars['aPage']['page_id'] . '' ) ) || ( Phpfox ::getUserParam('photo.can_purchase_sponsor') && ! defined ( 'PHPFOX_IS_GROUP_VIEW' ) && $this->_aVars['aPhoto']['user_id'] == Phpfox ::getUserId() && $this->_aVars['aPhoto']['is_sponsor'] != 1 )): ?>

			<a href="#" class="image_hover_menu_link"><?php echo Phpfox::getPhrase('photo.link'); ?></a>

			<div class="image_hover_menu">
				<ul>
<?php if (( ( Phpfox ::getUserParam('photo.can_delete_own_photo') && $this->_aVars['aPhoto']['user_id'] == Phpfox ::getUserId() ) || Phpfox ::getUserParam('photo.can_delete_other_photos') ) || ( defined ( 'PHPFOX_IS_PAGES_VIEW' ) && Phpfox ::getService('pages')->isAdmin('' . $this->_aVars['aPage']['page_id'] . '' ) )): ?>
					<li class="item_delete"><a href="#" title="<?php echo Phpfox::getPhrase('photo.delete_this_photo'); ?>" onclick="if (confirm('<?php echo Phpfox::getPhrase('photo.are_you_sure', array('phpfox_squote' => true)); ?>')) $.ajaxCall('photo.deletePhoto', 'photo_id=<?php echo $this->_aVars['aPhoto']['photo_id']; ?>'); return false;"><?php echo Phpfox::getPhrase('photo.delete_photo'); ?></a></li>
<?php endif; ?>

<?php if (Phpfox ::getUserParam('photo.can_sponsor_photo')): ?>
					<li id="js_photo_sponsor_<?php echo $this->_aVars['aPhoto']['photo_id']; ?>">
						<a href="#" onclick="$.ajaxCall('photo.sponsor', 'photo_id=<?php echo $this->_aVars['aPhoto']['photo_id']; ?>&type=<?php if ($this->_aVars['aPhoto']['is_sponsor'] == 1): ?>0<?php else: ?>1<?php endif; ?>');return false;"> <?php if ($this->_aVars['aPhoto']['is_sponsor'] == 1):  echo Phpfox::getPhrase('photo.unsponsor_this_photo');  else:  echo Phpfox::getPhrase('photo.sponsor_this_photo');  endif; ?></a>
					</li>
<?php endif; ?>

<?php if (Phpfox ::getUserParam('photo.can_purchase_sponsor') && ! defined ( 'PHPFOX_IS_GROUP_VIEW' ) && $this->_aVars['aPhoto']['user_id'] == Phpfox ::getUserId() && $this->_aVars['aPhoto']['is_sponsor'] != 1): ?>
					<li>
						<a href="<?php echo Phpfox::permalink('ad.sponsor', $this->_aVars['aPhoto']['photo_id'], null, false, null, (array) array (
)); ?>section_photo/">
<?php echo Phpfox::getPhrase('photo.sponsor_this_photo'); ?>
						</a>
					</li>

<?php endif; ?>


<?php if (isset ( $this->_aVars['aPage'] ) && isset ( $this->_aVars['aPage']['page_id'] )): ?>
					<li>
						<a href="#" title="<?php echo Phpfox::getPhrase('photo.set_this_as_your_page_s_cover_photo'); ?>" onclick="$Core.Pages.setAsCover(<?php echo $this->_aVars['aPage']['page_id']; ?>,<?php echo $this->_aVars['aPhoto']['photo_id']; ?>); return false;">
<?php echo Phpfox::getPhrase('photo.set_as_your_page_s_cover_photo'); ?>
						</a>
					</li>
<?php endif; ?>

<?php if (( ( isset ( $this->_aVars['aPhoto']['is_profile_photo'] ) && ! $this->_aVars['aPhoto']['is_profile_photo'] ) || ! isset ( $this->_aVars['aPhoto']['is_profile_photo'] ) )): ?>
<?php if (Phpfox ::getUserParam('photo.can_feature_photo') && ! $this->_aVars['aPhoto']['is_sponsor']): ?>
					<li id="js_photo_feature_<?php echo $this->_aVars['aPhoto']['photo_id']; ?>">
<?php if ($this->_aVars['aPhoto']['is_featured']): ?>
						<a href="#" title="<?php echo Phpfox::getPhrase('photo.un_feature_this_photo'); ?>" onclick="$.ajaxCall('photo.feature', 'photo_id=<?php echo $this->_aVars['aPhoto']['photo_id']; ?>&amp;type=0', 'GET'); return false;"><?php echo Phpfox::getPhrase('photo.un_feature'); ?></a>
<?php else: ?>
						<a href="#" title="<?php echo Phpfox::getPhrase('photo.feature_this_photo'); ?>" onclick="$.ajaxCall('photo.feature', 'photo_id=<?php echo $this->_aVars['aPhoto']['photo_id']; ?>&amp;type=1', 'GET'); return false;"><?php echo Phpfox::getPhrase('photo.feature'); ?></a>
<?php endif; ?>
					</li>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->_aVars['aPhoto']['user_id'] == Phpfox ::getUserId() && ! defined ( 'PHPFOX_IS_HOSTED_SCRIPT' )): ?>
					<li>
						<a href="#" title="<?php echo Phpfox::getPhrase('photo.set_this_photo_as_your_profile_image'); ?>" onclick="tb_show('', '', null, '<?php echo Phpfox::getPhrase('photo.setting_this_photo_as_your_profile_picture_please_hold'); ?>', true); $.ajaxCall('photo.makeProfilePicture', 'photo_id=<?php echo $this->_aVars['aPhoto']['photo_id']; ?>', 'GET'); return false;"><?php echo Phpfox::getPhrase('photo.make_profile_picture'); ?></a>
					</li>
<?php if (Phpfox ::getUserParam('profile.can_change_cover_photo')): ?>
					<li>
						<a href="#" title="<?php echo Phpfox::getPhrase('user.set_this_photo_as_your_profile_cover_photo'); ?>" onclick="$.ajaxCall('user.setCoverPhoto', 'photo_id=<?php echo $this->_aVars['aPhoto']['photo_id']; ?>', 'GET'); return false;"><?php echo Phpfox::getPhrase('user.set_as_cover_photo'); ?></a>
					</li>
<?php endif; ?>
<?php endif; ?>

<?php if (( Phpfox ::getUserParam('photo.can_edit_own_photo') && $this->_aVars['aPhoto']['user_id'] == Phpfox ::getUserId()) || Phpfox ::getUserParam('photo.can_edit_other_photo')): ?>
					<li><a href="#" title="<?php echo Phpfox::getPhrase('photo.edit_this_photo'); ?>"onclick="$Core.box('photo.editPhoto', 700, 'photo_id=<?php echo $this->_aVars['aPhoto']['photo_id']; ?>&amp;inline=true'); $('#js_tag_photo').hide();return false;"><?php echo Phpfox::getPhrase('photo.edit_photo'); ?></a></li>
<?php endif; ?>

<?php (($sPlugin = Phpfox_Plugin::get('photo.template_default_block_photo_entry_hover_end')) ? eval($sPlugin) : false); ?>
				</ul>
			</div>
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('photo.template_default_block_photo_entry_tool')) ? eval($sPlugin) : false); ?>


<?php if (isset ( $this->_aVars['sView'] ) && $this->_aVars['sView'] == 'featured'): ?>
<?php else: ?>
			<div class="js_featured_photo row_featured_link"<?php if (! $this->_aVars['aPhoto']['is_featured']): ?> style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getPhrase('photo.featured'); ?>
		</div>
<?php endif; ?>
		<div class="js_sponsor_photo row_sponsored_link"<?php if (! $this->_aVars['aPhoto']['is_sponsor']): ?> style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getPhrase('photo.sponsored'); ?>
	</div>
<?php if (isset ( $this->_aVars['sView'] ) && $this->_aVars['sView'] == 'pending'): ?>
<?php else: ?>
	<div class="js_pending_photo row_pending_link"<?php if ($this->_aVars['aPhoto']['view_id'] != '1'): ?> style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getPhrase('photo.pending'); ?>
</div>
<?php endif; ?>

<?php if (Phpfox ::getUserParam('photo.can_approve_photos') || Phpfox ::getUserParam('photo.can_delete_other_photos')): ?>
<div class="video_moderate_link"><a href="#<?php echo $this->_aVars['aPhoto']['photo_id']; ?>" class="moderate_link" rel="photo"><?php echo Phpfox::getPhrase('photo.moderate'); ?></a></div>
<?php endif; ?>

<?php if (Phpfox ::getParam('photo.auto_crop_photo') && ! Phpfox ::getParam('photo.show_info_on_mouseover')): ?>
<div class="photo_clip_holder_border<?php if (Phpfox ::getParam('photo.show_info_on_mouseover')): ?>_big<?php endif; ?>">
	<a href="<?php echo $this->_aVars['aPhoto']['link'];  if (isset ( $this->_aVars['iForceAlbumId'] )): ?>albumid_<?php echo $this->_aVars['iForceAlbumId']; ?>/<?php endif; ?>"
	   class="thickbox photo_holder_image photo_clip_holder<?php if (Phpfox ::getParam('photo.show_info_on_mouseover')): ?>_big<?php endif; ?>"
	   rel="<?php echo $this->_aVars['aPhoto']['photo_id']; ?>"
	   title="<?php echo Phpfox::getPhrase('photo.title_by_full_name', array('title' => Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPhoto']['title']),'full_name' => Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPhoto']['full_name']))); ?>">

<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aPhoto']['server_id'],'path' => 'photo.url_photo','file' => $this->_aVars['aPhoto']['destination'],'suffix' => '_240','max_width' => 240,'max_height' => 240,'title' => $this->_aVars['aPhoto']['title'])); ?>

	</a>
</div>
<?php if (Phpfox ::getParam('photo.show_info_on_mouseover')): 
						Phpfox::getLib('template')->getBuiltFile('photo.block.hoverinfo');						
						 endif;  else:  if (( $this->_aVars['aPhoto']['mature'] == 0 || ( ( $this->_aVars['aPhoto']['mature'] == 1 || $this->_aVars['aPhoto']['mature'] == 2 ) && Phpfox ::getUserId() && Phpfox ::getUserParam('photo.photo_mature_age_limit') <= Phpfox ::getUserBy('age'))) || $this->_aVars['aPhoto']['user_id'] == Phpfox ::getUserId()):  if (Phpfox ::getParam('photo.show_info_on_mouseover')): ?>
<a style="background-image:url('<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aPhoto']['server_id'],'path' => 'photo.url_photo','file' => $this->_aVars['aPhoto']['destination'],'suffix' => '_240','return_url' => true)); ?>')" href="<?php echo $this->_aVars['aPhoto']['link'];  if (isset ( $this->_aVars['iForceAlbumId'] )): ?>albumid_<?php echo $this->_aVars['iForceAlbumId']; ?>/<?php endif;  if (isset ( $this->_aVars['sPhotoCategory'] )): ?>category_<?php echo $this->_aVars['sPhotoCategory']; ?>/<?php endif; ?>" title="<?php echo Phpfox::getPhrase('photo.title_by_full_name', array('title' => Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPhoto']['title']),'full_name' => Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPhoto']['full_name']))); ?>" class="thickbox photo_holder_image photo_set_cover photo_clip_holder<?php if (Phpfox ::getParam('photo.show_info_on_mouseover')): ?>_big<?php endif; ?>" rel="<?php echo $this->_aVars['aPhoto']['photo_id']; ?>"><?php echo $this->_aVars['aPhoto']['title']; ?></a>
<?php else: ?>
<a href="<?php echo $this->_aVars['aPhoto']['link'];  if (isset ( $this->_aVars['iForceAlbumId'] )): ?>albumid_<?php echo $this->_aVars['iForceAlbumId']; ?>/<?php endif;  if (isset ( $this->_aVars['sPhotoCategory'] )): ?>category_<?php echo $this->_aVars['sPhotoCategory']; ?>/<?php endif; ?>" title="<?php echo Phpfox::getPhrase('photo.title_by_full_name', array('title' => Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPhoto']['title']),'full_name' => Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPhoto']['full_name']))); ?>" class="thickbox photo_holder_image photo_set_cover_small" rel="<?php echo $this->_aVars['aPhoto']['photo_id']; ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('defer' => true,'server_id' => $this->_aVars['aPhoto']['server_id'],'path' => 'photo.url_photo','file' => $this->_aVars['aPhoto']['destination'],'suffix' => '_240','max_height' => '150','max_width' => '150','title' => $this->_aVars['aPhoto']['title'])); ?></a>
<?php endif;  if (Phpfox ::getParam('photo.show_info_on_mouseover')): 
						Phpfox::getLib('template')->getBuiltFile('photo.block.hoverinfo');						
						 endif;  else: ?>
<a href="<?php echo $this->_aVars['aPhoto']['link'];  if (isset ( $this->_aVars['iForceAlbumId'] )): ?>albumid_<?php echo $this->_aVars['iForceAlbumId']; ?>/<?php endif; ?>"<?php if ($this->_aVars['aPhoto']['mature'] == 1): ?> onclick="tb_show('<?php echo Phpfox::getPhrase('photo.warning', array('phpfox_squote' => true)); ?>', $.ajaxBox('photo.warning', 'height=300&amp;width=350&amp;link=<?php echo $this->_aVars['aPhoto']['link']; ?>')); return false;"<?php endif; ?> class="no_ajax_link"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/no_access.png','alt' => '')); ?></a>
<?php endif;  endif; ?>

<?php if (Phpfox ::getParam('photo.auto_crop_photo') && ! Phpfox ::getParam('photo.show_info_on_mouseover')): ?>
</div>
<?php endif; ?>
</div>

<div class="photo_row_info">
<?php if (! isset ( $this->_aVars['bIsInAlbumMode'] ) && ! Phpfox ::getParam('photo.show_info_on_mouseover')): ?>
	<div class="extra_info_link">
<?php echo Phpfox::getPhrase('photo.by_user_info', array('user_info' => Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten('<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aPhoto']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aPhoto']['user_name'], ((empty($this->_aVars['aPhoto']['user_name']) && isset($this->_aVars['aPhoto']['profile_page_id'])) ? $this->_aVars['aPhoto']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aPhoto']['user_id'], $this->_aVars['aPhoto']['full_name']), Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>', 30, '...'), 20))); ?>
<?php if (! empty ( $this->_aVars['aPhoto']['album_name'] )): ?>
		<div><?php echo Phpfox::getPhrase('photo.in'); ?> <a href="<?php echo Phpfox::permalink('photo.album', $this->_aVars['aPhoto']['album_id'], $this->_aVars['aPhoto']['album_name'], false, null, (array) array (
)); ?>" title="<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPhoto']['album_name']); ?>"><?php if ($this->_aVars['aPhoto']['album_profile_id'] > 0):  echo Phpfox::getPhrase('photo.profile_pictures');  else:  echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPhoto']['album_name']), 45, '...'), 20);  endif; ?></a></div>
<?php endif; ?>
	</div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['sView'] ) && $this->_aVars['sView'] == 'top-rated'): ?>
	<div class="p_2">
<?php echo Phpfox::getPhrase('photo.total_rating_out_of_5', array('total_rating' => round($this->_aVars['aPhoto']['total_rating']))); ?>
	</div>
<?php elseif (isset ( $this->_aVars['sView'] ) && $this->_aVars['sView'] == 'top-battle'): ?>
	<div class="p_2">
<?php echo Phpfox::getPhrase('photo.total_battle_win_s', array('total_battle' => $this->_aVars['aPhoto']['total_battle'])); ?>
	</div>
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('photo.template_default_block_photo_entry_info')) ? eval($sPlugin) : false); ?>
</div>
</div>
</div>

<?php if (( ! Phpfox ::getParam('photo.show_info_on_mouseover') && isset ( $this->_aPhpfoxVars['iteration']['photos'] ) && is_int ( $this->_aPhpfoxVars['iteration']['photos'] / $this->_aVars['iPhotosPerRow'] ) ) || Phpfox ::isMobile()): ?>
<div class="clear"></div>
<?php endif; ?>

<?php endforeach; endif; ?>


<div class="clear"></div>

<div id="js_ajax_browse_content"></div>
<div class="t_right pager_container">
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager'); ?>
</div>
