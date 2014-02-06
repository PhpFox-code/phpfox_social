<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'feed_id' => '1',
  'module_id' => 'blog',
  'product_id' => 'phpfox',
  'group_id' => '1',
  'title_var' => 'blog.rss_title_1',
  'description_var' => 'blog.rss_description_1',
  'feed_link' => 'blog',
  'php_group_code' => NULL,
  'php_view_code' => '$aRows = $this->database()->select(\'bt.text_parsed AS text, b.blog_id, b.title, u.user_name, u.full_name, b.time_stamp\')
	->from(Phpfox::getT(\'blog\'), \'b\')
        ->join(Phpfox::getT(\'user\'), \'u\', \'u.user_id = b.user_id\') 
	->join(Phpfox::getT(\'blog_text\'), \'bt\',\'bt.blog_id = b.blog_id\')
	->where(\'b.is_approved = 1 AND b.privacy = 0 AND b.post_status = 1\')
	->limit(Phpfox::getParam(\'rss.total_rss_display\'))
	->order(\'b.blog_id DESC\')
	->execute(\'getSlaveRows\');
$iCnt = count($aRows);

foreach ($aRows as $iKey => $aRow)
{
	$aRows[$iKey][\'description\'] = $aRow[\'text\'];
	$aRows[$iKey][\'link\'] = Phpfox::permaLink(\'blog\', $aRow[\'blog_id\'], $aRow[\'title\']);
	$aRows[$iKey][\'creator\'] = $aRow[\'full_name\'];
}',
  'is_active' => '1',
  'is_site_wide' => '1',
  'total_subscribed' => '2',
  'ordering' => '0',
); ?>