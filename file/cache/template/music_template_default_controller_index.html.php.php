<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 16, 2013, 1:42 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 2569 2011-04-27 19:03:20Z Raymond_Benc $
 */
 
 

 if (count ( $this->_aVars['aSongs'] )):  if (count((array)$this->_aVars['aSongs'])):  $this->_aPhpfoxVars['iteration']['songs'] = 0;  foreach ((array) $this->_aVars['aSongs'] as $this->_aVars['aSong']):  $this->_aPhpfoxVars['iteration']['songs']++; ?>

	<?php
						Phpfox::getLib('template')->getBuiltFile('music.block.entry');						
						 endforeach; endif;  if (Phpfox ::getUserParam('music.can_approve_songs') || Phpfox ::getUserParam('music.can_delete_other_tracks') || Phpfox ::getUserParam('music.can_feature_songs')):  Phpfox::getBlock('core.moderation');  endif;  if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager');  else: ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('music.no_songs_found'); ?>
</div>
<?php endif; ?>
