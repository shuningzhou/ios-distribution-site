<?php 
// namespace CFPropertyList;

// just in case...
error_reporting( E_ALL );
ini_set( 'display_errors', 'on' );

/**
 * Require CFPropertyList
 */

require_once('classes/CFPropertyList/CFPropertyList.php');

 $target = $_POST['target'];
 $targetname = '';
 $bundleid = '';
 switch ($target) {
 	case '0':
 		$targetname = 'BriefcaseForEnterprise';
 		$bundleid = 'com.colligo.briefcaseenterprise';
 		break;
 	case '1':
 		$targetname = 'BriefcaseForGood';
 		$bundleid = 'com.colligo.briefcasegood';
 		break;
	case '2':
 		$targetname = 'BriefcasePro';
 		$bundleid = 'com.colligo.briefcasepro';
 		break;
	case '3':
 		$targetname = 'BriefcaseLite';
 		$bundleid = 'com.colligo.briefcaselite';
 		break;
	case '4':
 		$targetname = 'BriefcaseTrial';
 		$bundleid = 'com.colligo.briefcasetrial';
 		break;
 }
 $filename = basename( $_FILES['uploaded']['name']);

 $savepath = 'builds/'.$targetname.'/ipa/'; 
 $savepath = $savepath . basename( $_FILES['uploaded']['name']) ; 
 	
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $savepath)) 
 {
 	print_r($filename.'has been uploadd to'.$savepath);
	createPlist($targetname, $bundleid, $filename);
 } 
 else {
 	echo "Error code ". $_FILES["file"]["error"];
 	echo "Sorry, there was a problem uploading your file.";
 }

 function createPlist($target, $bundleid, $ipa)
	{
	// $target = $targetnamein;
	// $ipa = $ipanamein;
	   $filename = basename($ipa, ".ipa");
	// $bundleid = $bundleidin;
	   $version = '*';
	   $savepath = 'builds/'.$target.'/plist/';
	   $url = 'http://wiki.corporate.local/ios/builds/'.$target.'/ipa/'.$ipa;

	// debug logs
	 // print_r($target);
	 // echo "<br>";
	 // print_r($ipa);
	 // echo "<br>";
	 // print_r($filename);
	 // echo "<br>";
	 // print_r($bundleid);
	 // echo "<br>";
	 // print_r($version);
	 // echo "<br>";
	 // print_r($savepath);
	 // echo "<br>";
	 // print_r($url);
	 // echo "<br>";

	//generating plist
	$plist = new CFPropertyList\CFPropertyList();

	$plist->add( $rootdict = new CFPropertyList\CFDictionary() );


	$rootdict->add( 'items', $itemsarray = new CFPropertyList\CFArray() );
	$itemsarray->add( $items0dict = new CFPropertyList\CFDictionary() );
	$items0dict->add( 'assets', $assetsarray = new CFPropertyList\CFArray() );
	$assetsarray->add( $seconditems0dict = new CFPropertyList\CFDictionary() );
	$seconditems0dict->add( 'kind', new CFPropertyList\CFString( 'software-package' ));
	$seconditems0dict->add( 'url', new CFPropertyList\CFString( $url ));
	$items0dict->add( 'metadata', $metadatadict = new CFPropertyList\CFDictionary());
	$metadatadict->add( 'bundle-identifier', new CFPropertyList\CFString( $bundleid ));
	$metadatadict->add( 'bundle-version', new CFPropertyList\CFString( $version ));
	$metadatadict->add( 'kind', new CFPropertyList\CFString( 'software'));
	$metadatadict->add( 'title', new CFPropertyList\CFString( 'Briefcase' ));


	// /*
	//  * Save PList as XML
	//  */
	$plist->saveXML( $savepath.$filename.'.plist' );
	}
 ?> 
