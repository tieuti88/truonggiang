<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @file
 *
 * Configuration for ACL permissions
 *
 */

/**
 * Each controller or action can have its own permission array
 *
 * I've created some simple sample permissions based on the Drupal scheme
 *
 * Each controller or action can have add, edit own, edit all,
 * delete own and delete all - then add roles against the permissions
 */
$ci = get_instance();
$permissions = $ci->db->query('select * from permission where is_delete = 0')->result();
$temp_config['permission'] = array();
$old_permission = '';
foreach ($permissions as $permission) {
	if(!isset($temp_config['permission'][$permission->controller]))
		$temp_config['permission'][$permission->controller] = array();
	array_push($temp_config['permission'][$permission->controller],[$permission->action => json_decode($permission->role)]);

}
foreach ($temp_config['permission'] as $key => $value) {
	
	foreach ($value as $k => $arrAction) {
		$config['permission'][$key][key($arrAction)] = $arrAction[key($arrAction)];
	}
}
/*
$config['permission'] = array(
	'staff' => array(
		'index' 	=> array('admin','sub_admin'),
		'add' 		=> array('admin'),
		'delete' 	=> array('admin'),
		'info' 		=> array('admin','sub_admin'),
		'register' 	=> array('admin','sub_admin'),
		'edit own' 	=> array('admin'),
		'edit all' 	=> array('admin'),
		'delete own' => array('admin'),
		'delete all' => array('admin'),
	),
	'groups' => array(
		'index' 	=> array('admin'),
		'add' 		=> array('admin'),
		'delete' 	=> array('admin'),
		'view' 		=> array('admin'),
		'status' 	=> array('admin'),
		'permission'=> array('admin'),
		'add_permission'=> array('admin'),
		'edit own' 	=> array('admin'),
		'edit all' 	=> array('admin'),
		'delete own' => array('admin'),
		'delete all' => array('admin'),
	),
	'users' => array(
		'add' => array('admin'),
		'edit own' => array('blogger', 'editor', 'admin'),
		'edit all' => array('editor', 'admin'),
		'delete own' => array('blogger', 'editor', 'admin'),
		'delete all' => array('editor', 'admin'),
	),
	'umpires' => array(
		'add' => array('admin'),
		'edit own' => array('umpire', 'admin'),
		'edit all' => array('admin'),
		'delete own' => array('umpire', 'admin'),
		'delete all' => array('admin'),
	),
	'cricket' => array(
		'add' => array('umpire', 'admin'),
		'edit own' => array(), // not applicable
		'edit all' => array('umpire', 'admin'),
		'delete own' => array(), // not applicable
		'delete all' => array('umpire', 'admin'),
	),
);
v($config);*/
/**
 * You can have as many roles as you like, each user or object can have multiple roles.
 */
$config['roles'] = array('user', 'client', 'editor', 'sub_admin', 'admin');

/**
* @author UnoTrung
* acl about menu
*/
$config['menu'] = array('managers');
/* End of applications/config/acl.php */


