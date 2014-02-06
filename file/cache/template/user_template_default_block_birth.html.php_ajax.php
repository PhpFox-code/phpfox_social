<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: January 11, 2014, 7:33 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: birth.html.php 5302 2013-02-01 09:39:26Z Miguel_Espinoza $
 */
 
 

 if ($this->_aVars['aUser']['dob_setting'] == '3'): ?>
	<div class="message js_no_feed_to_show"><?php echo Phpfox::getPhrase('feed.there_are_no_new_feeds_to_view_at_this_time'); ?></div>
<?php else: ?>
<?php if (! defined ( 'PHPFOX_IS_PAGES_VIEW' )): ?>
        <div class="timeline_holder">    
            <div class="timeline_birth_title">		
<?php echo Phpfox::getPhrase('profile.born_on_birthday', array('birthday' => $this->_aVars['sBirthDisplay'])); ?>
            </div>

        </div>
<?php endif;  endif; ?>
