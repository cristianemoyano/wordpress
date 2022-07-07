<?php

include_once(dirname(__DIR__).'/models/CustomPluginModel.php' );

class CustomPlugin {

    public static function create_plugin_table() {
        CustomPluginModel::create_table();
    }

    public static function add_menu() {
        add_menu_page("Custom Plugin", "Custom Plugin","manage_options", "customplugin", "CustomPlugin::admin_entry_list", plugins_url('/customplugin/img/icon.png'));
        add_submenu_page("customplugin","Todos los registros", "Todos los registros","manage_options", "allentries", "CustomPlugin::admin_entry_list");
        add_submenu_page("customplugin","Añadir nuevo registro", "Añadir nuevo registro","manage_options", "addnewentry", "CustomPlugin::admin_add_entry");
    }

    public static function add_stylesheet_to_admin() {
        wp_enqueue_style( 'prefix-style', plugins_url('css/styles.css', dirname(__FILE__)) );
    }

    public static function prepare_table() {
        $parent_dir = dirname(__DIR__);
        include( $parent_dir.'/views/table.php');

        //Create an instance of our package class...
        $testListTable = new Entry_Table();
        //Fetch, prepare, sort, and filter our data...
        $testListTable->prepare_items();
        
        return $testListTable;
    }

    public static function alert($msg) {
        echo "
            <div class='alert success'>".$msg."</div>
        ";
    }

    public static function get_entry() {
        global $wpdb;
        $tablename = $wpdb->prefix."customplugin";
        if(isset($_GET['entry'])){
            $entry_id = $_GET['entry'];
            $entry = CustomPluginModel::get($entry_id);
            return $entry;
        }
    }
 
    public static function submit_handler() {
        global $wpdb;

        $is_update = isset($_GET['entry']);
        $name = isset($_POST['txt_name']) ? $_POST['txt_name'] : "";
        $uname = isset($_POST['txt_uname']) ? $_POST['txt_uname'] : "";
        $email = isset($_POST['txt_email']) ? $_POST['txt_email'] : "";
        $tablename = $wpdb->prefix."customplugin";
        // Add record
        if(isset($_POST['but_submit']) && !$is_update){
            if($name != '' && $uname != '' && $email != ''){
                $check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE username='".$uname."' ");
                if(count($check_data) == 0){
                    CustomPluginModel::insert($name, $uname,$email);
                    CustomPlugin::alert("Registro guardado exitosamente.");
                }
            }
        } elseif (isset($_POST['but_submit']) && $is_update) {
            $entry = CustomPlugin::get_entry();
            if(count($entry) == 1){
                CustomPluginModel::update($entry[0]->id, $name, $uname,$email);
                CustomPlugin::alert("Registro actualizado exitosamente.");
            }
        }
    }

    public static function admin_entry_list(){
        $parent_dir = dirname(__DIR__);
        include $parent_dir.'/views/admin_entry_list.php';
    }
      
    public static function admin_add_entry(){
        $parent_dir = dirname(__DIR__);
        include $parent_dir.'/views/admin_add_entry.php';
    }

	public static function _( $msg ) {
        /*
        Display translated text.

        The _e fucntion do the same thing than __ function but the only difference between them is
        _e echo directly whereas __ we need to echo them.
        */
		return _e( $msg, 'custom-plugin' );
	}

    public static function _r( $msg ) {
        /*
        Return translated text.
        */
		return __( $msg, 'custom-plugin' );
	}

}
