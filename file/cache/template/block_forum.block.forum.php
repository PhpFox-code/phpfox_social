<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 1:59 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Forum
 * @version 		$Id: forum.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */
 
 

?>
<article itemscope itemtype="http://schema.org/Thing">
		<div class="table_row">
			<div class="forum_image">
				<div class="forum_large_<?php if ($this->_aVars['aForum']['is_closed']): ?>closed<?php else:  if ($this->_aVars['aForum']['is_seen']): ?>old<?php else: ?>new<?php endif;  endif; ?>" title="<?php if ($this->_aVars['aForum']['is_closed']):  echo Phpfox::getPhrase('forum.forum_is_closed_for_posting');  else:  if ($this->_aVars['aForum']['is_seen']):  echo Phpfox::getPhrase('forum.forum_contains_no_new_posts');  else:  echo Phpfox::getPhrase('forum.forum_contains_new_posts');  endif;  endif; ?>"><?php echo $this->_aVars['aForum']['is_seen']; ?></div>
			</div>			
			<div class="forum_title">
				<header>
					<h1 itemprop="name"><a href="<?php echo Phpfox::permalink('forum', $this->_aVars['aForum']['forum_id'], $this->_aVars['aForum']['name'], false, null, (array) array (
)); ?>"<?php if (! empty ( $this->_aVars['aForum']['description'] )): ?> title="<?php echo Phpfox::getLib('phpfox.parse.output')->parse($this->_aVars['aForum']['description']); ?>" <?php endif; ?> class="forum_title_link" itemprop="url"><?php echo Phpfox::getLib('locale')->convert(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForum']['name'])); ?></a></h1>
				</header>					
					<div class="extra_info">
						<ul class="extra_info_middot">						
							<li><?php echo Phpfox::getPhrase('forum.threads'); ?>: <?php echo number_format($this->_aVars['aForum']['total_thread']); ?></li>
							<li>&middot;</li>
							<li><?php echo Phpfox::getPhrase('forum.posts'); ?>: <?php echo number_format($this->_aVars['aForum']['total_post']); ?></li>
						</ul>
					</div>
<?php if (Phpfox ::isMobile() && ! empty ( $this->_aVars['aForum']['thread_title'] )): ?>
					<div class="forum_last_post">
						<a href="<?php if ($this->_aVars['aForum']['post_id']):  echo Phpfox::permalink('forum.thread', $this->_aVars['aForum']['thread_id'], $this->_aVars['aForum']['thread_title_url'], false, null, (array) array (
)); ?>post_<?php echo $this->_aVars['aForum']['post_id']; ?>/<?php else:  echo Phpfox::permalink('forum.thread', $this->_aVars['aForum']['thread_id'], $this->_aVars['aForum']['thread_title_url'], false, null, (array) array (
));  endif; ?>" title="<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForum']['thread_title']); ?>"><?php echo Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForum']['thread_title']), 20), 50, '...'); ?>
						</a>
						<div class="extra_info">
<?php echo Phpfox::getPhrase('forum.by_full_name_on_time', array('full_name' => '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aForum']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aForum']['user_name'], ((empty($this->_aVars['aForum']['user_name']) && isset($this->_aVars['aForum']['profile_page_id'])) ? $this->_aVars['aForum']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aForum']['user_id'], $this->_aVars['aForum']['full_name']), Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>','time' => Phpfox::getLib('date')->convertTime($this->_aVars['aForum']['thread_time_stamp']))); ?>
						</div>					
					</div>						
<?php endif; ?>
<?php if (isset ( $this->_aVars['aForum']['moderators'] )): ?>
<?php echo Phpfox::getPhrase('forum.moderated_by'); ?>: <?php if (count((array)$this->_aVars['aForum']['moderators'])):  $this->_aPhpfoxVars['iteration']['moderators'] = 0;  foreach ((array) $this->_aVars['aForum']['moderators'] as $this->_aVars['aModerator']):  $this->_aPhpfoxVars['iteration']['moderators']++;  if ($this->_aPhpfoxVars['iteration']['moderators'] != 1): ?>, <?php endif;  echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aModerator']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aModerator']['user_name'], ((empty($this->_aVars['aModerator']['user_name']) && isset($this->_aVars['aModerator']['profile_page_id'])) ? $this->_aVars['aModerator']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aModerator']['user_id'], $this->_aVars['aModerator']['full_name']), Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>';  endforeach; endif; ?>
<?php endif; ?>
			</div>
<?php if (! Phpfox ::isMobile() && ! empty ( $this->_aVars['aForum']['thread_title'] )): ?>
			<div class="forum_last_post">
				<a href="<?php if ($this->_aVars['aForum']['post_id']):  echo Phpfox::permalink('forum.thread', $this->_aVars['aForum']['thread_id'], $this->_aVars['aForum']['thread_title_url'], false, null, (array) array (
)); ?>post_<?php echo $this->_aVars['aForum']['post_id']; ?>/<?php else:  echo Phpfox::permalink('forum.thread', $this->_aVars['aForum']['thread_id'], $this->_aVars['aForum']['thread_title_url'], false, null, (array) array (
));  endif; ?>" title="<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForum']['thread_title']); ?>"><?php echo Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForum']['thread_title']), 50, '...'); ?>
				</a>
				<div class="extra_info">
<?php echo Phpfox::getPhrase('forum.by_full_name_on_time', array('full_name' => '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aForum']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aForum']['user_name'], ((empty($this->_aVars['aForum']['user_name']) && isset($this->_aVars['aForum']['profile_page_id'])) ? $this->_aVars['aForum']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aForum']['user_id'], $this->_aVars['aForum']['full_name']), 30, '...') . '</a></span>','time' => Phpfox::getLib('date')->convertTime($this->_aVars['aForum']['thread_time_stamp']))); ?>
				</div>					
			</div>	
<?php endif; ?>
		</div>
</article>
