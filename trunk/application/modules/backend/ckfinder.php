<?php
/**
 *  ckfinder modules
 *
 * @package XGO CMS v3.0
 * @subpackage ckfinder
 * @link http://sunsoft.vn
 */

if(!$this->is_logged_in() || !defined('BASEPATH')){
	exit('No direct script access allowed');
}

if(!isset($_SESSION)){
    session_start();
}
$group_id = $this->user_model->get_group_id();

if($group_id == ADMIN_GROUP){
	$_SESSION['CKFINDER'] = array(
			'baseUrl' 				=> UPLOAD_DIR,
			'baseDir' 				=> FCPATH.UPLOAD_DIR,
			'IsAuthorized' 			=> true,
			'DefaultResourceTypes' 	=> '',
	);
}else{
	$username = $this->user_model->get_username();
	$_SESSION['CKFINDER'] = array(
			'baseUrl' 				=> UPLOAD_DIR.'users/' . $username . '/',
			'baseDir' 				=> FCPATH . UPLOAD_DIR.'users/' . $username . '/',
			'IsAuthorized' 			=> true,
			'DefaultResourceTypes' 	=> '',
	);
}


$_SESSION['CKFINDER']['Thumbnails'] = Array(
				'url' 			=> $_SESSION['CKFINDER']['baseUrl'] . '.thumbs',
				'directory' 	=> $_SESSION['CKFINDER']['baseDir'] . '.thumbs',
				'enabled' 		=> true,
				'directAccess' 	=> false,
				'maxWidth' 		=> 100,
				'maxHeight' 	=> 100,
				'bmpSupported' 	=> false,
				'quality' 		=> 80
);

$_SESSION['CKFINDER']['Images'] = Array(
				'maxWidth' 	=> 1600,
				'maxHeight' => 1200,
				'quality' 	=> 80
);

$_SESSION['CKFINDER']['AccessControl'][] = Array(
				'role' => '*',
				'resourceType' => '*',
				'folder' => '/',

				'folderView' => true,
				'folderCreate' => true,
				'folderRename' => true,
				'folderDelete' => true,

				'fileView' => true,
				'fileUpload' => true,
				'fileRename' => true,
				'fileDelete' => true
);

$_SESSION['CKFINDER']['DefaultResourceTypes'] = '';

$_SESSION['CKFINDER']['ResourceType'][] = Array(
				'name' 				=> 'Upload',
				'url' 				=> $_SESSION['CKFINDER']['baseUrl'],
				'directory' 		=> $_SESSION['CKFINDER']['baseDir'],
				'maxSize' 			=> UPLOAD_SIZE,
				'allowedExtensions' => UPLOAD_EXT,
				'deniedExtensions' 	=> ''
);

$_SESSION['CKFINDER']['plugin_imageresize'] = array(
		'smallThumb' 	=> '90x90',
		'mediumThumb' 	=> '120x120',
		'largeThumb' 	=> '180x180',
);

/* End of file ckfinder.php */
/* Location: ./application/modules/ckfinder.php */
