<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: January 1, 2014, 8:52 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Forum
 * @version 		$Id: index.html.php 4074 2012-03-28 14:02:40Z Raymond_Benc $
 */
 
 

?>
<div class="p_bottom_10">
	<ul class="sub_menu_bar">
<?php if (Phpfox ::isUser()): ?>
		<li><a href="#" class="sJsDropMenu drop_down_link"><?php echo Phpfox::getPhrase('forum.quick_links'); ?></a>
			<div class="link_menu dropContent">
				<ul>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.read'); ?>"><?php echo Phpfox::getPhrase('forum.mark_forums_read'); ?></a></li>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.search', array('view' => 'new')); ?>"><?php echo Phpfox::getPhrase('forum.new_posts'); ?></a></li>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.search', array('view' => 'my-thread')); ?>"><?php echo Phpfox::getPhrase('forum.my_threads'); ?></a></li>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.search', array('view' => 'subscribed')); ?>"><?php echo Phpfox::getPhrase('forum.subscribed_threads'); ?></a></li>					
				</ul>
			</div>		
		</li>	
<?php endif; ?>
		<li><a href="#" class="sJsDropMenu drop_down_link"><?php echo Phpfox::getPhrase('forum.search'); ?></a>
			<div class="link_menu dropContent">
				<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.search'); ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
					<div class="div_menu">
						<input type="text" name="search[keyword]" value="" class="v_middle" /> <input name="search[submit]" type="submit" value="<?php echo Phpfox::getPhrase('forum.go'); ?>" class="button v_middle" />
					</div>
					<div class="div_menu">
						<label><input type="radio" name="search[result]" value="0" class="v_middle checkbox" checked="checked" /> <?php echo Phpfox::getPhrase('forum.show_threads'); ?></label>
						<label><input type="radio" name="search[result]" value="1" class="v_middle checkbox" /> <?php echo Phpfox::getPhrase('forum.show_posts'); ?></label>
					</div>
				
</form>

				<ul>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('forum.search'); ?>"><?php echo Phpfox::getPhrase('forum.advanced_search'); ?></a></li>
				</ul>
			</div>
		</li>		
	</ul>
	<div class="clear"></div>
</div>

<?php if (! count ( $this->_aVars['aForums'] )): ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('forum.no_forums_have_been_created'); ?>
<?php if (Phpfox ::getUserParam('forum.can_add_new_forum')): ?>
	<ul class="action">
		<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.forum.add'); ?>"><?php echo Phpfox::getPhrase('forum.create_a_new_forum'); ?></a></li>
	</ul>
<?php endif; ?>
</div>
<?php else: 
						Phpfox::getLib('template')->getBuiltFile('forum.block.entry');						
						 endif; ?>
