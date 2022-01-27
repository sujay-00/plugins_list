<?php
  2 /*
  3 Plugin Name: my plugins
  4 Description: A plugin that will show all the plugins present in your account
  5 Author: Sujay Singh
  6 Author URI: https://github.com/sujay-00
  7 Version: 1.0
  8  */
  9 
 10 
 11 function my_plugin(){
 12          
 13         if (isset($_GET['deactivate'])) {
 14                 deactivate_plugins($_GET['key']);
 15         }       
 16         if (isset($_GET['activate'])) {
 17                 activate_plugins($_GET['key']);
 18         }       
 19         echo '<table style= "background-color:white;" margin="70px" border="1px" cellpadding="8" cellspacing="0" padding="60">';
 20         $all_plugins = get_plugins();
 21         
 22         echo '<tr>';
 23         echo ' <th>No</th>';
 24         echo ' <th>Name</th>';
 25         echo ' <th>Slug</th>';
 26         echo ' <th>Version</th>';
 27         echo ' <th>Status</th>';
 28         echo '</tr>';
 29         
 30         $count = 1;             
 31         foreach ($all_plugins as $key => $arr){
 32                 $status=is_plugin_active($key) ? "Active":"Inactive";
 33                 
 34                 $plugins[$key] = array(
 35                         'name' => $arr['Name'],
 36                         'version'=> $arr['Version'],
 37                         'slug' => $key,
 38                         'status' => $status,
 39                 );      
 40                 
 41                 echo '<td>'. $count . '</td>';
 42                 echo '<td>'. $plugins[$key]['name'] . '</td>';
 43                 echo '<td>'. $plugins[$key]['slug'] . '</td>';
 44                 echo '<td>'. $plugins[$key]['version'] . '</td>';
 45                 echo '<td>'. $plugins[$key]['status'] . '</td>'; 
 46                 
 47                 if ( $plugins[$key] != "my plugins"){
 48                         if ($plugins[$key]['status'] == "Active")
 49                                 echo '<td><a href="/wp-admin/admin.php?page=myplugins.php&deactivate=true&key='.$key.'">deactivate</a></td>';
 50                         else echo '<td><a href="/wp-admin/admin.php?page=myplugins.php&activate=true&key='.$key.'">activate</a></td>';
 51                 }       
 52                 
 53                 $count = $count + 1 ;
 54                 echo '</tr>';   
 55         }       
 56         echo'</table>';
 57 }       
 58 
 59 
 60 function menu(){
 61         add_menu_page('My Plugin','My Plugin','administrator',__FILE__,'my_plugin');
 62 }       
 63 
 64 add_action ('admin_menu','menu');

?>

