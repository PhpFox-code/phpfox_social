<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 15, 2013, 3:46 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Event
 * @version 		$Id: index.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */
 
 

 if (! count ( $this->_aVars['aEvents'] )): ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('event.no_events_found'); ?>
</div>
<?php else: ?>

<?php if (count((array)$this->_aVars['aEvents'])):  foreach ((array) $this->_aVars['aEvents'] as $this->_aVars['sDate'] => $this->_aVars['aGroups']): ?>
<div class="block">
	<div class="title"><?php echo $this->_aVars['sDate']; ?></div>	
	<div class="border">
		<div class="content">
<?php if (count((array)$this->_aVars['aGroups'])):  $this->_aPhpfoxVars['iteration']['events'] = 0;  foreach ((array) $this->_aVars['aGroups'] as $this->_aVars['aEvent']):  $this->_aPhpfoxVars['iteration']['events']++; ?>

			<article itemscope itemtype="http://schema.org/Event">
				<div id="js_event_item_holder_<?php echo $this->_aVars['aEvent']['event_id']; ?>" class="js_event_parent <?php if ($this->_aVars['aEvent']['is_sponsor'] && ! defined ( 'PHPFOX_IS_GROUP_VIEW' )): ?>row_sponsored <?php elseif ($this->_aVars['aEvent']['is_featured'] && $this->_aVars['sView'] != 'featured'): ?>row_featured <?php endif;  if (is_int ( $this->_aPhpfoxVars['iteration']['events'] )): ?>row1<?php else: ?>row2<?php endif;  if ($this->_aPhpfoxVars['iteration']['events'] == 1): ?> row_first<?php endif; ?>">
<?php if (! Phpfox ::isMobile()): ?>
					<div class="row_title_image_header">
						
<?php if (isset ( $this->_aVars['sView'] ) && $this->_aVars['sView'] == 'featured'): ?>
<?php else: ?>
						<div class="js_featured_event row_featured_link"<?php if (! $this->_aVars['aEvent']['is_featured']): ?> style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getPhrase('event.featured'); ?>
						</div>					
<?php endif; ?>
						<div id="js_sponsor_phrase_<?php echo $this->_aVars['aEvent']['event_id']; ?>" class="js_sponsor_event row_sponsored_link"<?php if (! $this->_aVars['aEvent']['is_sponsor']): ?> style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getPhrase('event.sponsored'); ?>
						</div>					
						
						<a href="<?php echo $this->_aVars['aEvent']['url']; ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aEvent']['server_id'],'title' => $this->_aVars['aEvent']['title'],'path' => 'event.url_image','file' => $this->_aVars['aEvent']['image_path'],'suffix' => '_120','max_width' => '120','max_height' => '120','itemprop' => 'image')); ?></a>
					</div>				
					<div class="row_title_image_header_body">	
<?php endif; ?>
						<div class="row_title">	
	
							<div class="row_title_image">		
								<a href="<?php echo $this->_aVars['aEvent']['url']; ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aEvent'],'suffix' => '_50_square','max_width' => '50','max_height' => '50')); ?></a>
<?php if (( $this->_aVars['aEvent']['user_id'] == Phpfox ::getUserId() && Phpfox ::getUserParam('event.can_edit_own_event')) || Phpfox ::getUserParam('event.can_edit_other_event') || ( $this->_aVars['aEvent']['view_id'] == 0 && ( $this->_aVars['aEvent']['user_id'] == Phpfox ::getUserId() && Phpfox ::getUserParam('event.can_edit_own_event')) || Phpfox ::getUserParam('event.can_edit_other_event')) || ( $this->_aVars['aEvent']['user_id'] == Phpfox ::getUserId() && Phpfox ::getUserParam('event.can_edit_own_event')) || Phpfox ::getUserParam('event.can_edit_other_event') || ( $this->_aVars['aEvent']['user_id'] == Phpfox ::getUserId() && Phpfox ::getUserParam('event.can_delete_own_event')) || Phpfox ::getUserParam('event.can_delete_other_event') || ( defined ( 'PHPFOX_IS_PAGES_VIEW' ) && Phpfox ::getService('pages')->isAdmin('' . $this->_aVars['aPage']['page_id'] . '' ) )): ?>
								<div class="row_edit_bar_parent">
									<div class="row_edit_bar_holder">
										<ul>
											<?php
						Phpfox::getLib('template')->getBuiltFile('event.block.menu');						
						?>
										</ul>			
									</div>
									<div class="row_edit_bar">				
											<a href="#" class="row_edit_bar_action"><span><?php echo Phpfox::getPhrase('event.actions'); ?></span></a>							
									</div>
								</div>		
<?php endif; ?>
<?php if (Phpfox ::getUserParam('event.can_approve_events') || Phpfox ::getUserParam('event.can_delete_other_event')): ?><a href="#<?php echo $this->_aVars['aEvent']['event_id']; ?>" class="moderate_link" rel="event"><?php echo Phpfox::getPhrase('event.moderate'); ?></a><?php endif; ?>
							</div>
							<div class="row_title_info">		
								<header>
									<h1 itemprop="name"><a href="<?php echo $this->_aVars['aEvent']['url']; ?>" class="link" itemprop="url"><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aEvent']['title']), 25); ?></a></h1>
								</header>
								<div class="extra_info">
									<ul class="extra_info_middot"><?php if (isset ( $this->_aVars['aEvent']['start_time_micro'] )): ?><li itemprop="startDate" style="display:none;"><?php echo $this->_aVars['aEvent']['start_time_micro']; ?><li><?php endif;  echo $this->_aVars['aEvent']['start_time_phrase']; ?> <?php echo Phpfox::getPhrase('event.at'); ?> <?php echo $this->_aVars['aEvent']['start_time_phrase_stamp']; ?></li><li><span>&middot;</span></li><li><?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aEvent']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aEvent']['user_name'], ((empty($this->_aVars['aEvent']['user_name']) && isset($this->_aVars['aEvent']['profile_page_id'])) ? $this->_aVars['aEvent']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aEvent']['user_id'], $this->_aVars['aEvent']['full_name']), Phpfox::getParam('user.maximum_length_for_full_name')) . '</a></span>'; ?></li></ul>
								</div>
								
<?php if (Phpfox ::isMobile()): ?>
								<a href="<?php echo $this->_aVars['aEvent']['url']; ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aEvent']['server_id'],'title' => $this->_aVars['aEvent']['title'],'path' => 'event.url_image','file' => $this->_aVars['aEvent']['image_path'],'suffix' => '_120','max_width' => '120','max_height' => '120')); ?></a>
<?php endif; ?>
		
<?php Phpfox::getBlock('feed.comment', array('aFeed' => $this->_aVars['aEvent']['aFeed'])); ?>
								
							</div>			
							
						</div>	
<?php if (! Phpfox ::isMobile()): ?>
					</div>
<?php endif; ?>
				</div>
			</article>
<?php endforeach; endif; ?>
		</div>
	</div>
</div>
<?php endforeach; endif; ?>

<?php if (Phpfox ::getUserParam('event.can_approve_events') || Phpfox ::getUserParam('event.can_delete_other_event')):  Phpfox::getBlock('core.moderation');  endif; ?>

<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager');  endif; ?>
