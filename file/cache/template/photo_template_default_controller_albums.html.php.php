<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 16, 2013, 12:37 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: albums.html.php 6060 2013-06-14 09:28:36Z Miguel_Espinoza $
 */
 
 

 if ($this->_aVars['bSpecialMenu']): ?>
    <?php
						Phpfox::getLib('template')->getBuiltFile('photo.block.specialmenu');						
						 endif; ?>


<?php if (count ( $this->_aVars['aAlbums'] )): ?>
    <div class="albums_container">
		<div class="albums_container_row">
<?php if (count((array)$this->_aVars['aAlbums'])):  $this->_aPhpfoxVars['iteration']['albums'] = 0;  foreach ((array) $this->_aVars['aAlbums'] as $this->_aVars['aAlbum']):  $this->_aPhpfoxVars['iteration']['albums']++; ?>
	
				<?php
						Phpfox::getLib('template')->getBuiltFile('photo.block.album-entry');						
						?>
<?php if (Phpfox ::getParam('photo.show_info_on_mouseover') && ( is_int ( $this->_aPhpfoxVars['iteration']['albums'] / 3 ) )): ?>
					</div>
<?php if ($this->_aPhpfoxVars['iteration']['albums'] < count ( $this->_aVars['aAlbums'] )): ?>
						<div class="albums_container_row">
<?php endif; ?>
<?php endif; ?>
<?php endforeach; endif; ?>
			
<?php if (Phpfox ::getParam('photo.show_info_on_mouseover') && ( ! is_int ( $this->_aPhpfoxVars['iteration']['albums'] / 3 ) )): ?>
				</div>
<?php endif; ?>
		</div>    
    </div>
    <div class="clear"></div>
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager');  else: ?>
    <div class="extra_info">
<?php echo Phpfox::getPhrase('photo.no_albums_found_here'); ?>
    </div>
<?php endif; ?>
