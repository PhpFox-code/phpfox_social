<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 11:22 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Photo
 * @version 		$Id: index.html.php 5109 2013-01-10 09:49:02Z Miguel_Espinoza $
 */
 
 

 if (isset ( $this->_aVars['bSpecialMenu'] ) && $this->_aVars['bSpecialMenu'] == true): ?>
    <?php
						Phpfox::getLib('template')->getBuiltFile('photo.block.specialmenu');						
						 endif;  if ($this->_aVars['sView'] == 'my' && count ( $this->_aVars['aPhotos'] )): ?>
		<div class="item_bar">
			<div class="item_bar_action_holder">				
				<a href="#" class="item_bar_action"><span><?php echo Phpfox::getPhrase('photo.actions'); ?></span></a>		
				<ul>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('photo', array('view' => 'my','mode' => 'edit')); ?>"><?php echo Phpfox::getPhrase('photo.mass_edit_photos'); ?></a></li>
				</ul>			
			</div>		
		</div>	    
<?php endif; ?>
<div id="js_actual_photo_content">
	<div id="js_album_outer_content">
<?php if (count ( $this->_aVars['aPhotos'] )): ?>
<?php if (isset ( $this->_aVars['bIsEditMode'] )): ?>
		    <form method="post" action="#" onsubmit="$('#js_photo_multi_edit_image').show(); $('#js_photo_multi_edit_submit').hide(); $(this).ajaxCall('photo.massUpdate'<?php if ($this->_aVars['bIsMassEditUpload']): ?>, 'is_photo_upload=1'<?php endif; ?>); return false;">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
<?php if (count((array)$this->_aVars['aPhotos'])):  foreach ((array) $this->_aVars['aPhotos'] as $this->_aVars['aForms']): ?>
				    <?php
						Phpfox::getLib('template')->getBuiltFile('photo.block.edit-photo');						
						?>
<?php endforeach; endif; ?>
			    
			    <div class="photo_table_clear">
				    <div id="js_photo_multi_edit_image" style="display:none;">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?>
				    </div>		
				    <div id="js_photo_multi_edit_submit">
					    <input type="submit" value="<?php echo Phpfox::getPhrase('photo.update_photo_s'); ?>" class="button" />
				    </div>
			    </div>
			    
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager'); ?>
		    
</form>

		    
<?php else: ?>
			<?php
						Phpfox::getLib('template')->getBuiltFile('photo.block.photo-entry');						
						?>			
<?php if (Phpfox ::getUserParam('photo.can_approve_photos') || Phpfox ::getUserParam('photo.can_delete_other_photos')): ?>
<?php Phpfox::getBlock('core.moderation'); ?>
<?php endif; ?>
<?php endif; ?>
<?php else: ?>
		    <div class="extra_info">
<?php echo Phpfox::getPhrase('photo.no_photos_found'); ?>
		    </div>
<?php endif; ?>
		
	</div>
    
</div>
