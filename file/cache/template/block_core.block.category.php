<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 2:22 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Miguel Espinoza
 * @package 		Phpfox
 * @version 		$Id: category.html.php 890 2009-12-14 13:54:49Z Miguel_Espinoza $
 */



?>
<ul <?php if (isset ( $this->_aVars['sUlClass'] )): ?>class="<?php echo $this->_aVars['sUlClass']; ?>"<?php else: ?>class="action"<?php endif; ?>>
<?php if (count((array)$this->_aVars['aCategories'])):  foreach ((array) $this->_aVars['aCategories'] as $this->_aVars['iCategoryCount'] => $this->_aVars['aCategory']): ?>
    <li class="<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>category" style="position:relative;">	   	
		
<?php if (Phpfox ::getParam('core.categories_to_show_at_first') < 1 && count ( $this->_aVars['aCategory']['sub'] ) > 0): ?>
	    <span onclick="isClicked_<?php echo $this->_aVars['aCategory']['category_id']; ?>=true; $Core.toggleCategory('<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>subcategory_<?php echo $this->_aVars['aCategory']['category_id']; ?>',<?php echo $this->_aVars['aCategory']['category_id']; ?>);" id="show_more_<?php echo $this->_aVars['aCategory']['category_id']; ?>" class="category_show_more_less" style="text-align:left;vertical-align:middle;">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/plus.gif','class' => 'v_middle')); ?>
	    </span>
	    <span onclick="isClicked_<?php echo $this->_aVars['aCategory']['category_id']; ?>=true; $Core.toggleCategory('<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>subcategory_<?php echo $this->_aVars['aCategory']['category_id']; ?>',<?php echo $this->_aVars['aCategory']['category_id']; ?>)" id="show_less_<?php echo $this->_aVars['aCategory']['category_id']; ?>" class="category_show_more_less" style="display:none;text-align:left;vertical-align:middle;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/minus.gif','class' => 'v_middle')); ?></span>
<?php endif; ?>
		
	<a <?php if (Phpfox ::getParam('core.categories_to_show_at_first') < 1 && count ( $this->_aVars['aCategory']['sub'] ) > 0): ?>class="no_ajax_link category_show_more_less_link"<?php endif; ?> href="<?php echo $this->_aVars['aCategory']['url'];  if (Phpfox ::getLib('request')->get('view') != ''): ?>view_<?php echo urlencode(Phpfox::getLib('request')->get('view')); ?>/<?php endif; ?>" id="<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>category_<?php echo $this->_aVars['aCategory']['category_id']; ?>">
	
<?php echo Phpfox::getLib('phpfox.parse.output')->clean(Phpfox::getLib('locale')->convert($this->_aVars['aCategory']['name'])); ?>
	</a>

<?php if (isset ( $this->_aVars['aCategory']['sub'] ) && count ( $this->_aVars['aCategory']['sub'] )): ?>
	<ul>
<?php if (count((array)$this->_aVars['aCategory']['sub'])):  foreach ((array) $this->_aVars['aCategory']['sub'] as $this->_aVars['iKey'] => $this->_aVars['aSubCategory']): ?>
	    <li <?php if ($this->_aVars['iKey'] >= Phpfox ::getParam('core.categories_to_show_at_first')): ?>style="display:none;" class="<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>subcategory_<?php echo $this->_aVars['aCategory']['category_id']; ?> special_subcategory"<?php endif; ?>>
		<a href="<?php echo $this->_aVars['aSubCategory']['url']; ?>" id="<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>subcategory_<?php echo $this->_aVars['aSubCategory']['category_id']; ?>">
<?php echo Phpfox::getLib('phpfox.parse.output')->clean(Phpfox::getLib('locale')->convert($this->_aVars['aSubCategory']['name'])); ?>
		</a>
	    </li>
<?php endforeach; endif; ?>

<?php if ($this->_aVars['iKey'] >= Phpfox ::getParam('core.categories_to_show_at_first') && Phpfox ::getParam('core.categories_to_show_at_first') > 0): ?>
	    <li onclick="$Core.toggleCategory('<?php if (isset ( $this->_aVars['sModule'] )):  echo $this->_aVars['sModule']; ?>_<?php endif; ?>subcategory_<?php echo $this->_aVars['aCategory']['category_id']; ?>',<?php echo $this->_aVars['aCategory']['category_id']; ?>)">
		<div id="show_more_<?php echo $this->_aVars['aCategory']['category_id']; ?>" style="text-align:right;vertical-align:middle;"><a href="#" onclick="return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/plus.gif','class' => 'v_middle'));  echo Phpfox::getPhrase('user.view_more'); ?></a></div>
		<div id="show_less_<?php echo $this->_aVars['aCategory']['category_id']; ?>" style="display:none;text-align:right;vertical-align:middle;"><a href="#" onclick="return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/minus.gif','class' => 'v_middle'));  echo Phpfox::getPhrase('core.view_less'); ?></a></div>
	    </li>
<?php endif; ?>
	</ul>
<?php endif; ?>
    </li>
<?php endforeach; endif; ?>
</ul>
