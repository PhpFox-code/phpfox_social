<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: January 11, 2014, 10:40 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Quiz
 * @version 		$Id: index.html.php 3342 2011-10-21 12:59:32Z Raymond_Benc $
 */
 
 

 if (count ( $this->_aVars['aQuizzes'] )):  if (count((array)$this->_aVars['aQuizzes'])):  $this->_aPhpfoxVars['iteration']['quizzes'] = 0;  foreach ((array) $this->_aVars['aQuizzes'] as $this->_aVars['aQuiz']):  $this->_aPhpfoxVars['iteration']['quizzes']++; ?>

	<?php
						Phpfox::getLib('template')->getBuiltFile('quiz.block.entry');						
						 endforeach; endif;  if (Phpfox ::getUserParam('quiz.can_approve_quizzes')):  Phpfox::getBlock('core.moderation');  endif;  if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager');  else: ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('quiz.no_quizzes_found'); ?>
</div>
<?php endif; ?>
