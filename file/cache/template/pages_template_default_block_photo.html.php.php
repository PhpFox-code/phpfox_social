<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 16, 2013, 1:21 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: controller.html.php 64 2009-01-19 15:05:54Z Raymond_Benc $
 */
 
 

?>
<div class="profile_image">
    <div class="profile_image_holder">
<?php if ($this->_aVars['aPage']['is_app']): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => 0,'path' => 'app.url_image','file' => $this->_aVars['aPage']['aApp']['image_path'],'suffix' => '_120','max_width' => '175','max_height' => '300','title' => $this->_aVars['aPage']['aApp']['app_title'])); ?>
<?php else: ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('thickbox' => true,'server_id' => $this->_aVars['aPage']['image_server_id'],'title' => $this->_aVars['aPage']['title'],'path' => 'core.url_user','file' => $this->_aVars['aPage']['image_path'],'suffix' => '_120','max_width' => '175','max_height' => '300')); ?>
<?php endif; ?>
	</div>
	<div class="profile_no_timeline">

<?php if (isset ( $this->_aVars['aPage']['title'] )): ?>
		<?php
						Phpfox::getLib('template')->getBuiltFile('pages.block.joinpage');						
						?>
<?php endif; ?>

	</div>
</div>
<?php if ($this->_aVars['bCanViewPage']): ?>
<div class="sub_section_menu">
	<ul>		
<?php if (count((array)$this->_aVars['aPageLinks'])):  foreach ((array) $this->_aVars['aPageLinks'] as $this->_aVars['aPageLink']): ?>
			<li class="<?php if (isset ( $this->_aVars['aPageLink']['is_selected'] )): ?> active<?php endif; ?>">
				<a href="<?php echo $this->_aVars['aPageLink']['url']; ?>" class="ajax_link"<?php if (isset ( $this->_aVars['aPageLink']['icon'] )): ?> style="background-image:url('<?php if (isset ( $this->_aVars['aPageLink']['icon_pass'] ) && $this->_aVars['aPageLink']['icon_pass']):  echo Phpfox::getLib('phpfox.image.helper')->display(array('thickbox' => true,'server_id' => $this->_aVars['aPageLink']['icon_server'],'path' => 'pages.url_image','file' => $this->_aVars['aPageLink']['icon'],'suffix' => '_16','return_url' => true));  else:  echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => $this->_aVars['aPageLink']['icon'],'return_url' => true));  endif; ?>');"<?php endif; ?>><?php echo $this->_aVars['aPageLink']['phrase'];  if (isset ( $this->_aVars['aPageLink']['total'] )): ?><span>(<?php echo number_format($this->_aVars['aPageLink']['total']); ?>)</span><?php endif; ?></a>				
<?php if (isset ( $this->_aVars['aPageLink']['sub_menu'] ) && is_array ( $this->_aVars['aPageLink']['sub_menu'] ) && count ( $this->_aVars['aPageLink']['sub_menu'] )): ?>
				<ul>
<?php if (count((array)$this->_aVars['aPageLink']['sub_menu'])):  foreach ((array) $this->_aVars['aPageLink']['sub_menu'] as $this->_aVars['aProfileLinkSub']): ?>
					<li class="<?php if (isset ( $this->_aVars['aProfileLinkSub']['is_selected'] )): ?> active<?php endif; ?>"><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aPageLink']['url']);  echo $this->_aVars['aProfileLinkSub']['url']; ?>"><?php echo $this->_aVars['aProfileLinkSub']['phrase'];  if (isset ( $this->_aVars['aProfileLinkSub']['total'] ) && $this->_aVars['aProfileLinkSub']['total'] > 0): ?><span class="pending"><?php echo number_format($this->_aVars['aProfileLinkSub']['total']); ?></span><?php endif; ?></a></li>
<?php endforeach; endif; ?>
				</ul>
<?php endif; ?>
			</li>
<?php endforeach; endif; ?>
	</ul>
    <div class="clear"></div>
</div>
<?php endif; ?>
