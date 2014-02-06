<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: December 16, 2013, 2:38 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */
 
 

 if (! count ( $this->_aVars['aListings'] )): ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('marketplace.no_marketplace_listings_found'); ?>
</div>
<?php else: ?>

<?php if (count((array)$this->_aVars['aListings'])):  $this->_aPhpfoxVars['iteration']['listings'] = 0;  foreach ((array) $this->_aVars['aListings'] as $this->_aVars['aListing']):  $this->_aPhpfoxVars['iteration']['listings']++; ?>

<div id="js_mp_item_holder_<?php echo $this->_aVars['aListing']['listing_id']; ?>" class="js_listing_parent <?php if ($this->_aVars['aListing']['is_sponsor']): ?>row_sponsored <?php endif;  if ($this->_aVars['aListing']['is_featured']): ?>row_featured <?php endif;  if ($this->_aVars['aListing']['view_id'] == 1 && ! isset ( $this->_aVars['bIsInPendingMode'] )): ?>row_moderate <?php endif;  if (is_int ( $this->_aPhpfoxVars['iteration']['listings'] )): ?>row1<?php else: ?>row2<?php endif;  if ($this->_aPhpfoxVars['iteration']['listings'] == 1): ?> row_first<?php endif; ?>">
	<article itemscope itemtype="http://schema.org/Product">	
<?php if ($this->_aVars['aListing']['view_id'] == '1' && ! isset ( $this->_aVars['bIsInPendingMode'] )): ?>
		<div class="row_moderate_info">
<?php echo Phpfox::getPhrase('marketplace.pending_approval'); ?>
		</div>
<?php endif; ?>
					
<?php if (! Phpfox ::isMobile()): ?>
				<div class="row_title_image_header">
					
<?php if (isset ( $this->_aVars['aListing']['is_expired'] )): ?>
						<div class="row_featured_link">
<?php echo Phpfox::getPhrase('marketplace.expired'); ?>
						</div>
<?php else: ?>
<?php if (isset ( $this->_aVars['sView'] ) && $this->_aVars['sView'] == 'featured'): ?>
<?php else: ?>
							<div id="js_featured_phrase_<?php echo $this->_aVars['aListing']['listing_id']; ?>" class="row_featured_link"<?php if (! $this->_aVars['aListing']['is_featured']): ?> style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getPhrase('marketplace.featured'); ?>
							</div>					
<?php endif; ?>
						<div id="js_sponsor_phrase_<?php echo $this->_aVars['aListing']['listing_id']; ?>" class="js_sponsor_event row_sponsored_link"<?php if (! $this->_aVars['aListing']['is_sponsor']): ?> style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getPhrase('marketplace.sponsored'); ?>
						</div>					
<?php endif; ?>
					
					<a href="<?php echo $this->_aVars['aListing']['url']; ?>">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aListing']['server_id'],'title' => $this->_aVars['aListing']['title'],'path' => 'marketplace.url_image','file' => $this->_aVars['aListing']['image_path'],'suffix' => '_120','max_width' => '120','max_height' => '120','itemprop' => 'image')); ?>
					</a>
				</div>				
					
					<div class="row_title_image_header_body">				
<?php endif; ?>
				<div class="row_title">				
			
				
						<div class="row_title_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aListing'],'suffix' => '_50_square','max_width' => '50','max_height' => '50')); ?>
							
<?php if (( $this->_aVars['aListing']['user_id'] == Phpfox ::getUserId() && Phpfox ::getUserParam('marketplace.can_edit_own_listing')) || Phpfox ::getUserParam('marketplace.can_edit_other_listing') || ( $this->_aVars['aListing']['user_id'] == Phpfox ::getUserId() && Phpfox ::getUserParam('marketplace.can_delete_own_listing')) || Phpfox ::getUserParam('marketplace.can_delete_other_listings') || ( Phpfox ::getUserParam('marketplace.can_feature_listings'))): ?>
					<div class="row_edit_bar_parent">
						<div class="row_edit_bar_holder">
							<ul>
								<?php
						Phpfox::getLib('template')->getBuiltFile('marketplace.block.menu');						
						?>
							</ul>			
						</div>
						<div class="row_edit_bar">				
								<a href="#" class="row_edit_bar_action"><span><?php echo Phpfox::getPhrase('marketplace.actions'); ?></span></a>							
						</div>
					</div>		
<?php endif; ?>
							
<?php if (Phpfox ::getUserParam('event.can_approve_events') || Phpfox ::getUserParam('event.can_delete_other_event')): ?><a href="#<?php echo $this->_aVars['aListing']['listing_id']; ?>" class="moderate_link" rel="marketplace">Moderate</a><?php endif; ?>
						</div>
						<div class="row_title_info">		
							
								<header><h1 itemprop="name"><a href="<?php echo $this->_aVars['aListing']['url']; ?>" class="link" title="<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aListing']['title']); ?>" itemprop="url"><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aListing']['title']), 100, '...'), 25); ?></a><?php if ($this->_aVars['aListing']['view_id'] == '2'): ?><span class="marketplace_item_sold">(<?php echo Phpfox::getPhrase('marketplace.sold'); ?>)</span><?php endif; ?></h1></header>
							
	<div class="marketplace_price_tag" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<span itemprop="price">
<?php if ($this->_aVars['aListing']['price'] == '0.00'): ?>
<?php echo Phpfox::getPhrase('marketplace.free'); ?>
<?php else: ?>
<?php echo Phpfox::getService('core.currency')->getSymbol($this->_aVars['aListing']['currency_id']);  echo number_format($this->_aVars['aListing']['price'], 2); ?>
<?php endif; ?>
		    </span>
		    </div>																
							
							<div class="extra_info">
								<ul class="extra_info_middot"><li itemprop="releaseDate"><?php echo Phpfox::getLib('date')->convertTime($this->_aVars['aListing']['time_stamp']); ?></li><li><span>&middot;</span></li><li><?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aListing']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aListing']['user_name'], ((empty($this->_aVars['aListing']['user_name']) && isset($this->_aVars['aListing']['profile_page_id'])) ? $this->_aVars['aListing']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aListing']['user_id'], $this->_aVars['aListing']['full_name']), 30, '...') . '</a></span>'; ?></li><li>&middot;</li><li><a class="js_hover_title" href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('marketplace', array('location' => $this->_aVars['aListing']['country_iso'])); ?>"><?php echo Phpfox::getService('core.country')->getCountry($this->_aVars['aListing']['country_iso']); ?><span class="js_hover_info"><?php if (! empty ( $this->_aVars['aListing']['city'] )): ?> <?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aListing']['city']); ?> &raquo; <?php endif;  if (! empty ( $this->_aVars['aListing']['country_child_id'] )): ?> <?php echo Phpfox::getService('core.country')->getChild($this->_aVars['aListing']['country_child_id']); ?> &raquo; <?php endif; ?> <?php echo Phpfox::getService('core.country')->getCountry($this->_aVars['aListing']['country_iso']); ?></span></a></li></ul>
							</div>
							
						
<?php if (Phpfox ::isMobile()): ?>
							<a href="<?php echo $this->_aVars['aListing']['url']; ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => $this->_aVars['aListing']['server_id'],'title' => $this->_aVars['aListing']['title'],'path' => 'marketplace.url_image','file' => $this->_aVars['aListing']['image_path'],'suffix' => '_120','max_width' => '120','max_height' => '120')); ?></a>
<?php endif; ?>
							
							<div class="item_content" itemprop="description">
<?php echo Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aListing']['mini_description']), 25), 255); ?>
							</div>							
	
<?php Phpfox::getBlock('feed.comment', array('aFeed' => $this->_aVars['aListing']['aFeed'])); ?>
							
						</div>			

					
				</div>	
<?php if (! Phpfox ::isMobile()): ?>
					</div>
<?php endif; ?>
					<div class="clear"></div>		
	</article>
</div>
<?php endforeach; endif; ?>

<?php if (Phpfox ::getUserParam('marketplace.can_delete_other_listings') || Phpfox ::getUserParam('marketplace.can_feature_listings') || Phpfox ::getUserParam('marketplace.can_approve_listings')):  Phpfox::getBlock('core.moderation');  endif; ?>

<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager');  endif; ?>
