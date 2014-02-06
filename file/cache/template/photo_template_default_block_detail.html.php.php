<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 3:45 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Photo
 * @version 		$Id: detail.html.php 4158 2012-05-11 19:00:36Z Raymond_Benc $
 */
 
 

 if (count((array)$this->_aVars['aPhotoDetails'])):  $this->_aPhpfoxVars['iteration']['photodetails'] = 0;  foreach ((array) $this->_aVars['aPhotoDetails'] as $this->_aVars['sKey'] => $this->_aVars['sValue']):  $this->_aPhpfoxVars['iteration']['photodetails']++; ?>

<div class="info">
	<div class="info_left">
<?php echo $this->_aVars['sKey']; ?>:
	</div>	
	<div class="info_right">
<?php echo $this->_aVars['sValue']; ?>
	</div>	
</div>
<?php endforeach; endif; ?>
