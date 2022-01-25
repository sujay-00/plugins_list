<?php

/*
Plugin Name: my plugins
Description: A plugin that will show all the plugins present in your account
Author: Sujay Singh
Author URI: https://github.com/sujay-00
Version: 1.0
 */


function my_plugin(){


	echo '<table style= "background-color:white;" margin="70px" border="1px" cellpadding="8" cellspacing="0" padding="60">';
	$all_plugins = get_plugins();

	echo '<tr>';
	echo ' <th>No</th>';
	echo ' <th>Name</th>';
	echo ' <th>Slug</th>';
	echo ' <th>Version</th>';
	echo ' <th>Status</th>';
	echo '</tr>';

	$count = 1;
	foreach ($all_plugins as $key => $arr){
		$status=is_plugin_active($key) ? "Active":"Inactive";

		$plugins[$key] = array(
			'name' => $arr['Name'],
			'version'=> $arr['Version'],
			'slug' => $key,
			'status' => $status,
		);
		echo '<td>'. $count . '</td>';
		echo '<td>'. $plugins[$key]['name'] . '</td>';
		echo '<td>'. $plugins[$key]['slug'] . '</td>';
		echo '<td>'. $plugins[$key]['version'] . '</td>';
		echo '<td>'. $plugins[$key]['status'] . '</td>';
		$count = $count + 1 ;
		echo '</tr>';
	}
	echo'</table>';
}

function menu(){
	add_menu_page('My Plugin','My Plugin','administrator',__FILE__,'my_plugin');
}

add_action ('admin_menu','menu');


?>

