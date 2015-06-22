<?php


//require_once(PATH_typo3.'interfaces/interface.filelist_editiconshook.php');

class tx_manipulateFileListIcon implements \TYPO3\CMS\Filelist\FileListEditIconHookInterface{

   public function manipulateEditIcons(&$cells, &$parentObject){

   	// extract path of file 
	$pattern = "/1\:\/(.*)'/";
	preg_match($pattern, $cells['info'], $matches);

	$domain = (( $_SERVER['HTTPS'] == 'on ') ? 'https://' : 'http://').$_SERVER['SERVER_NAME'];
	$fullPath = $domain.'/fileadmin/'.$matches[1];

	$img = '<img src="'.$parentObject->backPath.'../typo3conf/ext/ps_geturlfromfileadmin/res/url.png" style="vertical-align: middle" height="16" width="16" title="Show url" />';

	//$cells['copyPath'] = '<a href="#" onclick="$(this).next().toggle(); return false;">'.$img.'</a><input type="text" value="'.$fullPath.'" size="30" style="margin-left: 3px;display: none"/>';
	$cells['copyPath'] = '<a href="#" onclick="window.prompt(\'Copy to clipboard: Ctrl+C, Enter\', \''.$fullPath.'\');">'.$img.'</a><input type="text" value="'.$fullPath.'" size="30" style="margin-left: 3px;display: none"/>';

   }

 }
?>