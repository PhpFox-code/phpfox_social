<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 1:59 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Forum
 * @version 		$Id: $
 */
 
 

 if (! $this->_aVars['bIsSearch'] && $this->_aVars['aPermissions']['can_view_thread_content']['value'] == 1): ?>
<?php if ($this->_aVars['aCallback'] === null): ?>
<?php if (! $this->_aVars['aForumData']['is_closed'] && Phpfox ::getUserParam('forum.can_add_new_thread') || Phpfox ::getService('forum.moderate')->hasAccess('' . $this->_aVars['aForumData']['forum_id'] . '' , 'add_thread' )): ?>
			<div class="sub_menu_bar_main"><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.post.thread', array('id' => $this->_aVars['aForumData']['forum_id'])); ?>"><?php echo Phpfox::getPhrase('forum.new_thread'); ?></a></div>
<?php endif; ?>
<?php else: ?>
		<div class="sub_menu_bar_main"><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.post.thread', array('module' => $this->_aVars['aCallback']['module_id'],'item' => $this->_aVars['aCallback']['item_id'])); ?>"><?php echo Phpfox::getPhrase('forum.new_thread'); ?></a></div>
<?php endif; ?>
<?php endif;  if (count ( $this->_aVars['aThreads'] )):  if (! $this->_aVars['bIsSearch']): ?>

<div class="forum_header_menu">
	<ul class="sub_menu_bar">	
<?php if (Phpfox ::isUser()): ?>
		<li class="sub_menu_bar_li"><a href="#" class="sJsDropMenu drop_down_link"><?php echo Phpfox::getPhrase('forum.forum_tools'); ?></a>
			<div class="link_menu dropContent">
				<ul>
<?php if ($this->_aVars['aCallback'] === null): ?>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.read', array('forum' => $this->_aVars['aForumData']['forum_id'])); ?>"><?php echo Phpfox::getPhrase('forum.mark_this_forum_read'); ?></a></li>
<?php else: ?>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.read', array('module' => $this->_aVars['aCallback']['module_id'],'item' => $this->_aVars['aCallback']['item_id'])); ?>"><?php echo Phpfox::getPhrase('forum.mark_this_forum_read'); ?></a></li>
<?php endif; ?>
				</ul>
			</div>		
		</li>
<?php endif; ?>
		<li class="sub_menu_bar_li"><a href="#" class="sJsDropMenu drop_down_link"><?php echo Phpfox::getPhrase('forum.search_this_forum'); ?></a>
			<div class="link_menu dropContent">
				<form method="post" action="<?php if ($this->_aVars['aCallback'] !== null):  echo Phpfox::getLib('phpfox.url')->makeUrl('forum.search', array('module' => $this->_aVars['aCallback']['module_id'],'item' => $this->_aVars['aCallback']['item_id']));  else:  echo Phpfox::getLib('phpfox.url')->makeUrl('forum.search');  endif; ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
<?php if ($this->_aVars['aCallback'] === null): ?>
				<div><input type="hidden" name="search[forum][]" value="<?php echo $this->_aVars['aForumData']['forum_id']; ?>" /></div>
<?php else: ?>
				<div><input type="hidden" name="search[item_id]" value="<?php echo $this->_aVars['aCallback']['item_id']; ?>" /></div>
<?php endif; ?>
					<div class="div_menu">
						<input type="text" name="search[keyword]" value="" class="v_middle" /> <input name="search[submit]" type="submit" value="Go" class="button v_middle" />
					</div>
					<div class="div_menu">
						<label><input type="radio" name="search[result]" value="0" class="v_middle checkbox" checked="checked" /> <?php echo Phpfox::getPhrase('forum.show_threads'); ?></label>
						<label><input type="radio" name="search[result]" value="1" class="v_middle checkbox" /> <?php echo Phpfox::getPhrase('forum.show_posts'); ?></label>
					</div>
				
</form>

				<ul>
<?php if ($this->_aVars['aCallback'] === null): ?>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.search', array('id' => $this->_aVars['aForumData']['forum_id'])); ?>"><?php echo Phpfox::getPhrase('forum.advanced_search'); ?></a></li>
<?php else: ?>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.search', array('module' => $this->_aVars['aCallback']['module_id'],'item' => $this->_aVars['aCallback']['item_id'])); ?>"><?php echo Phpfox::getPhrase('forum.advanced_search'); ?></a></li>
<?php endif; ?>
				</ul>
			</div>
		</li>		
		<li class="sub_menu_bar_li">
			<a href="<?php if ($this->_aVars['aCallback'] === null):  echo Phpfox::getLib('phpfox.url')->makeUrl('forum.rss', array('forum' => $this->_aVars['aForumData']['forum_id']));  else:  echo Phpfox::getLib('phpfox.url')->makeUrl('forum.rss', array('pages' => $this->_aVars['aCallback']['item_id']));  endif; ?>" title="<?php echo Phpfox::getPhrase('forum.subscribe_to_this_forum'); ?>" class="no_ajax_link">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'rss/tiny.png','class' => 'v_middle')); ?>
			</a>
		</li>
	</ul>
	<div class="clear"></div>
</div>
<?php endif; ?>

<?php endif; ?>

<?php if ($this->_aVars['aCallback'] === null && ! $this->_aVars['bIsSearch']): 
						Phpfox::getLib('template')->getBuiltFile('forum.block.entry');						
						 endif; ?>

<?php if (! $this->_aVars['bIsSearch'] && count ( $this->_aVars['aAnnouncements'] )): ?>
<div class="table_info">
<?php echo Phpfox::getPhrase('forum.announcements'); ?>
</div>
<?php if (count((array)$this->_aVars['aAnnouncements'])):  foreach ((array) $this->_aVars['aAnnouncements'] as $this->_aVars['aThread']): ?>
	<?php
						Phpfox::getLib('template')->getBuiltFile('forum.block.thread-entry');						
						 endforeach; endif;  endif; ?>

<?php if (count ( $this->_aVars['aThreads'] )): ?>

<?php if (isset ( $this->_aVars['bResult'] ) && $this->_aVars['bResult']): ?>

<div class="table_info">
<?php echo Phpfox::getPhrase('forum.posts'); ?>
</div>

<?php if (count((array)$this->_aVars['aThreads'])):  foreach ((array) $this->_aVars['aThreads'] as $this->_aVars['aPost']): ?>
	<?php
						Phpfox::getLib('template')->getBuiltFile('forum.block.post');						
						 endforeach; endif; ?>

<?php else: ?>

<div class="table_info">
<?php echo Phpfox::getPhrase('forum.threads'); ?>
</div>

<?php if (count((array)$this->_aVars['aThreads'])):  foreach ((array) $this->_aVars['aThreads'] as $this->_aVars['aThread']): ?>
	<?php
						Phpfox::getLib('template')->getBuiltFile('forum.block.thread-entry');						
						 endforeach; endif; ?>

<?php endif; ?>

<?php if (! isset ( $this->_aVars['bIsPostSearch'] ) && ( Phpfox ::getUserParam('forum.can_approve_forum_thread') || Phpfox ::getUserParam('forum.can_delete_other_posts'))):  Phpfox::getBlock('core.moderation');  endif;  if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager'); ?>

<?php if (! $this->_aVars['bIsSearch']):  if ($this->_aVars['aCallback'] === null): ?>
<?php if (! $this->_aVars['aForumData']['is_closed'] && Phpfox ::getUserParam('forum.can_add_new_thread') || Phpfox ::getService('forum.moderate')->hasAccess('' . $this->_aVars['aForumData']['forum_id'] . '' , 'add_thread' )): ?>
	<div class="sub_menu_bar_main sub_menu_bar_main_bottom"><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.post.thread', array('id' => $this->_aVars['aForumData']['forum_id'])); ?>"><?php echo Phpfox::getPhrase('forum.new_thread'); ?></a></div>
<?php endif;  else: ?>
	<div class="sub_menu_bar_main sub_menu_bar_main_bottom"><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.post.thread', array('module' => $this->_aVars['aCallback']['module_id'],'item' => $this->_aVars['aCallback']['item_id'])); ?>"><?php echo Phpfox::getPhrase('forum.new_thread'); ?></a></div>
<?php endif;  endif; ?>

<?php if (! $this->_aVars['bIsTagSearch']): ?>

<?php endif; ?>

<?php else: ?>
<div class="extra_info">
<?php if ($this->_aVars['bIsSearch']): ?>
<?php echo Phpfox::getPhrase('forum.nothing_found');  else: ?>
<?php echo Phpfox::getPhrase('forum.no_threads_found');  endif; ?>
	<br />
	<br />
</div>
<?php endif; ?>

<?php if ($this->_aVars['aCallback'] === null):  Phpfox::getBlock('forum.jump', array());  endif; ?>
