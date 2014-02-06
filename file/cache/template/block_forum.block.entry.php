<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 1:59 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Forum
 * @version 		$Id: index.html.php 140 2009-01-30 13:04:09Z Raymond_Benc $
 */
 
 

 if ($this->_aVars['aCallback'] === null && count ( $this->_aVars['aForums'] )):  if (isset ( $this->_aVars['bIsSubForum'] )): ?>
<div class="table_info">
	<b><?php echo Phpfox::getPhrase('forum.sub_forum'); ?>:</b> <?php echo Phpfox::getLib('locale')->convert(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForumData']['name'])); ?>	
</div>
<?php endif; ?>

<?php if (count((array)$this->_aVars['aForums'])):  $this->_aPhpfoxVars['iteration']['forums'] = 0;  foreach ((array) $this->_aVars['aForums'] as $this->_aVars['aForum']):  $this->_aPhpfoxVars['iteration']['forums']++; ?>

<?php if ($this->_aVars['aForum']['is_category']): ?>
<div class="table_info">
	<a href="<?php echo Phpfox::permalink('forum', $this->_aVars['aForum']['forum_id'], $this->_aVars['aForum']['name'], false, null, (array) array (
)); ?>"<?php if (! empty ( $this->_aVars['aForum']['description'] )): ?> title="<?php echo Phpfox::getLib('phpfox.parse.output')->parse($this->_aVars['aForum']['description']); ?>" <?php endif; ?>><?php echo Phpfox::getLib('locale')->convert(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForum']['name'])); ?></a>	
</div>
<?php if (count ( $this->_aVars['aForum']['sub_forum'] )): ?>
<?php if (count((array)$this->_aVars['aForum']['sub_forum'])):  foreach ((array) $this->_aVars['aForum']['sub_forum'] as $this->_aVars['aForum']): ?>
		<?php
						Phpfox::getLib('template')->getBuiltFile('forum.block.forum');						
						?>
<?php endforeach; endif; ?>
		<br />
<?php endif;  else: ?>
<?php if (! isset ( $this->_aVars['bIsSubForum'] ) && $this->_aPhpfoxVars['iteration']['forums'] == 1): ?>
	<div class="table_info">
<?php echo Phpfox::getPhrase('forum.forums'); ?>
	</div>
<?php endif; ?>
	<?php
						Phpfox::getLib('template')->getBuiltFile('forum.block.forum');						
						 endif;  endforeach; endif; ?>

<?php if (isset ( $this->_aVars['bIsSubForum'] )): ?>
<br />
<?php endif; ?>

<?php endif; ?>
