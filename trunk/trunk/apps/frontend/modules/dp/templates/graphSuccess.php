<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="800" height="600">
<param name="movie" value="<?php echo  public_path($viewerPath, true)?>">
<param name="quality" value="high">
<param name="flashVars" value="pagePath=<?php echo  public_path($pagePath, true)?>?>&xmlPath=<?php echo  public_path($xmlPath, true)?><?php echo ($id>0)?'&rootId='. $id:'' ?>"

<embed src="<?php echo  public_path($viewerPath, true)?>"
	quality="high"
	pluginspage="http://www.macromedia.com/go/getflashplayer"
	type="application/x-shockwave-flash"
	flashVars="pagePath=<?php echo  public_path($pagePath, true)?>&xmlPath=<?php echo  public_path($xmlPath, true)?><?php echo ($id>0)?'&rootId='. $id:''?>"
	width="100%"
	height="600">
	</embed></object>
<?php echo $pagePath;?>

