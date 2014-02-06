<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 1:34 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: timezone.html.php 5089 2013-01-06 12:13:42Z Miguel_Espinoza $
 */
 
 

?>
<div class="timezone t_center" style="margin-top:30px;">
<?php echo Phpfox::getPhrase('forum.all_times_are_gmt_time_zone_the_time_now_is_current_time', array('time_zone' => $this->_aVars['sCurrentTimeZone'],'current_time' => $this->_aVars['sCurrentSiteTime'])); ?>
</div>
