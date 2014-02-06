<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 11:54 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Photo
 * @version 		$Id: index.html.php 5083 2012-12-20 11:00:06Z Miguel_Espinoza $
 */
 
 

?>
<div class="profile_photo_special_menu">
    <a href="<?php echo $this->_aVars['sLinkPhotos']; ?>" <?php if ($this->_aVars['bShowPhotos']): ?> class="active"<?php endif; ?>>
    	<div>
<?php echo $this->_aVars['aInfo']['total_photos']; ?><span><?php echo Phpfox::getPhrase('photo.photos'); ?></span>
		</div>		    
    </a>
    <a href="<?php echo $this->_aVars['sLinkAlbums']; ?>" <?php if (! $this->_aVars['bShowPhotos']): ?> class="active"<?php endif; ?>>
    	<div>
<?php echo $this->_aVars['aInfo']['total_albums']; ?><span><?php echo Phpfox::getPhrase('photo.albums'); ?></span>
		</div> 
    </a>
</div>
<div class="clear"></div>
