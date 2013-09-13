<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="styles.css">
  <title>Install Briefcase</title>
</head>
<body>

<?php
// get target selected
$target = $_GET["target"];

// prepare title and path
$filepath;
$downloadpath;
$pagetitle;
switch ($target) {
    case 0:
        $filepath = './builds/BriefcaseForEnterprise/plist/*.plist';
        $downloadpath = 'http://wiki.corporate.local/ios/builds/BriefcaseForEnterprise/plist/';
		$pagetitle = 'Briefcase for Enterprise';
        break;
    case 1:
        $filepath = './builds/BriefcaseForGood/plist/*.plist';
        $downloadpath = 'http://wiki.corporate.local/ios/builds/BriefcaseForGood/plist/';
		$pagetitle = 'Briefcase for Good';
        break;
    case 2:
        $filepath = './builds/BriefcasePro/plist/*.plist';
        $downloadpath = 'http://wiki.corporate.local/ios/builds/BriefcasePro/plist/';
		$pagetitle = 'Briefcase Pro';
        break;
    case 3:
        $filepath = './builds/BriefcaseLite/plist/*.plist';
        $downloadpath = 'http://wiki.corporate.local/ios/builds/BriefcaseLite/plist/';
		$pagetitle = 'Briefcase Lite';
        break;
    case 4:
        $filepath = './builds/BriefcaseTrial/plist/*.plist';
        $downloadpath = 'http://wiki.corporate.local/ios/builds/BriefcaseTrial/plist/';
		$pagetitle = 'Briefcase Trial';
        break;
}

// open this directory 
$files = glob($filepath);
usort($files, function($a, $b) {
    return filemtime($a) < filemtime($b);
});

$indexCount = count($files);
?>

<nav><?php echo $pagetitle ?></nav>
<div class="buildlist">
  <table>
<?php
for($index=0; $index < $indexCount; $index++) {
	// get file name
	$filename = basename($files[$index],".plist");
	// get final plist path
	$finalDownloadPath = $downloadpath.$filename;
	// hide hidden files
	if (substr("$filename", 0, 1) != "."){
?>
	<tr>
    	<td class="instructions">
			<?php
				echo $filename;
			?>
		</td>
    	<td>
      	<a href="itms-services://?action=download-manifest&url=<?php echo $finalDownloadPath; ?>.plist">
        	<div class="downloadbutton">Install</div>
      	</a>
    	</td>
  	</tr>
	
<?php
	}
}
?>
 </table>
</div>

</body>
</html>