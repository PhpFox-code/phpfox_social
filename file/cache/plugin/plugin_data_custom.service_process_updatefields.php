<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (isset($aVals[\'music_genre\']))
{
	Phpfox::getService(\'music.genre.process\')->updateUser($iItemId, $iEditUserId, $aVals[\'music_genre\']);
} '; ?>