<?php

class CustomPluginModel {
    public static function get_table_name() {
        global $wpdb;    
        return $wpdb->prefix."customplugin";
    }

    public static function create_table() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
    
        $tablename = CustomPluginModel::get_table_name();
    
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

    public static function get($id) {
        global $wpdb;
        $tablename = CustomPluginModel::get_table_name();
        $get_sql = esc_sql("SELECT * FROM ".$tablename." WHERE id=".$id." ;");
        return $wpdb->get_results($get_sql);
    }

    public static function insert($name, $uname, $email) {
        global $wpdb;
        $tablename = CustomPluginModel::get_table_name();
        $insert_sql = "INSERT INTO ".$tablename." (name,username,email) values('".$name."','".$uname."','".$email."') ;";
        $wpdb->query($insert_sql);
    }
    public static function update($id, $name, $uname, $email) {
        global $wpdb;
        $tablename = CustomPluginModel::get_table_name();
        $update_sql = "UPDATE ".$tablename." SET name='".$name."',username='".$uname."',email='".$email."' WHERE id = ".$id.";";
        $wpdb->query($update_sql);
    }

    public static function bulk_delete($ids) {
        global $wpdb;
        $tablename = CustomPluginModel::get_table_name();
        $delete_sql = esc_sql("DELETE FROM ".$tablename." WHERE id in (".$ids.");");
        $wpdb->query($delete_sql);
    }
    public static function delete($id) {
        global $wpdb;
        $tablename = CustomPluginModel::get_table_name();
        $delete_sql = esc_sql("DELETE FROM ".$tablename." WHERE id=".$id);
        $wpdb->query($delete_sql);
    }

    public static function filter($search) {
        global $wpdb;
        if (!$search){
            return CustomPluginModel::all();
        }
        $tablename = CustomPluginModel::get_table_name();
        $filter_sql = "SELECT * FROM ".$tablename." WHERE name like '%{$search}%' or username like '%{$search}%' or email like '%{$search}%' ;";
        return $wpdb->get_results($filter_sql);
    }
    public static function all() {
        global $wpdb;
        $tablename = CustomPluginModel::get_table_name();
        $all_sql = esc_sql("SELECT * FROM ".$tablename." order by id desc;");
        return $wpdb->get_results($all_sql);
    }

}