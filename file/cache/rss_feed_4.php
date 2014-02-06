<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'feed_id' => '4',
  'module_id' => 'forum',
  'product_id' => 'phpfox',
  'group_id' => '3',
  'title_var' => 'forum.rss_title_4',
  'description_var' => 'forum.rss_description_4',
  'feed_link' => 'forum',
  'php_group_code' => NULL,
  'php_view_code' => '$aRows = Phpfox::getService(\'forum.thread\')->getForRss(Phpfox::getParam(\'rss.total_rss_display\'));',
  'is_active' => '1',
  'is_site_wide' => '1',
  'total_subscribed' => '2',
  'ordering' => '0',
); ?>