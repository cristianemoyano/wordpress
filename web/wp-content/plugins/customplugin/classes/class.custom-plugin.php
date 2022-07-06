<?php

class CustomPlugin {

    public static function create_plugin_table() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
    
        $tablename = $wpdb->prefix."customplugin";
    
        $sql = "CREATE TABLE $tablename (
        id mediumint(11) NOT NULL AUTO_INCREMENT,
        name varchar(80) NOT NULL,
        username varchar(80) NOT NULL,
        email varchar(80) NOT NULL,
        PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
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

    public static function submit_handler() {
        global $wpdb;

        // Add record
        if(isset($_POST['but_submit'])){
            $name = $_POST['txt_name'];
            $uname = $_POST['txt_uname'];
            $email = $_POST['txt_email'];
            $tablename = $wpdb->prefix."customplugin";

            if($name != '' && $uname != '' && $email != ''){
                $check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE username='".$uname."' ");
                if(count($check_data) == 0){
                $insert_sql = "INSERT INTO ".$tablename."(name,username,email) values('".$name."','".$uname."','".$email."') ";
                $wpdb->query($insert_sql);
                echo "
                <div class='alert success'>Registro guardado exitosamente.</div>
                ";
                }
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

}
