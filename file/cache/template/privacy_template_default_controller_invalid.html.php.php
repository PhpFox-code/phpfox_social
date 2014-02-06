<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 3:45 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Privacy
 * @version 		$Id: invalid.html.php 3661 2011-12-05 15:42:26Z Miguel_Espinoza $
 */
 
 

?>
<div class="message">
<?php echo Phpfox::getPhrase('privacy.the_item_or_section_you_are_trying_to_view_has_specific_privacy_settings_enabled_and_cannot_be_viewed_at_this_time'); ?>
</div>
<ul>
	<li><a href="#" onclick="history.back(); return false;"><?php echo Phpfox::getPhrase('privacy.go_back'); ?></a></li>
	<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''); ?>"><?php echo Phpfox::getPhrase('privacy.go_to_our_homepage'); ?></a></li>
</ul>
