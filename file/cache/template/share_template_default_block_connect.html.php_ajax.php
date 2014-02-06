<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 3:44 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: connect.html.php 3418 2011-11-02 10:26:15Z Raymond_Benc $
 */
 
 

 echo Phpfox::getPhrase('share.before_using_this_feature_you_will_have_to_setup_up_a_connection_with_this_3rd_party_service'); ?>
<div class="p_top_8">
	<a href="<?php echo $this->_aVars['sConnectUrl']; ?>" class="button_off_link"><?php echo Phpfox::getPhrase('share.connect_now'); ?></a>
</div>
