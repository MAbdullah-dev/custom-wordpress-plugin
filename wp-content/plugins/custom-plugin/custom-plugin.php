<?php
/*
* Plugin Name: Employee Management System
* Description:this is a CRUD Employee Management System.
* Plugin URI: http://example.com
* Author: Abdullah
* Version: 1.0
* Requires at least: 6.7.1
* Requires PHP: 7.4
*/
define("EMS_PLUGIN_PATH", plugin_dir_path(__FILE__));

define("EMS_PLUGIN_URL", plugin_dir_url(__FILE__));

add_action('admin_menu', "custom_plugin_menu");

function custom_plugin_menu()
{
    add_menu_page("Employee Management System", "Employee Management", "manage_options", "Employee-Management-System", "ems_crud_system", "dashicons-admin-site", "10");

    add_submenu_page("Employee-Management-System", "Add Employee", "Add Employee", "manage_options", "Employee-Management-System", "ems_crud_system");

    add_submenu_page(
        "Employee-Management-System",
        "View Employee",
        "View Employee",
        "manage_options",
        "ems_view_employee",
        "ems_view_employee"
    );
}
function ems_crud_system()
{
    include_once(EMS_PLUGIN_PATH . "pages/add-employee.php");
}

function ems_view_employee()
{
    include_once(EMS_PLUGIN_PATH . "pages/view-employee.php");
}

register_activation_hook(__FILE__, "ems_create_database");

function ems_create_database()
{
    global $wpdb;
    $table_prefix = $wpdb->prefix; //wp_
    $sql = "
CREATE TABLE {$table_prefix}ems_form_data (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(120) DEFAULT NULL,
   `email` varchar(50) DEFAULT NULL,
   `phoneNO` varchar(60) DEFAULT NULL,
   `gender` enum('Male','Female','Other','') DEFAULT NULL,
   `designation` varchar(50) DEFAULT NULL,  -- Update this line
   PRIMARY KEY (`id`)
);
";
    include_once(ABSPATH . "wp-admin/includes/upgrade.php");
    dbDelta($sql);
}

register_deactivation_hook(__FILE__, "ems_drop_database");

function ems_drop_database()
{
    global $wpdb;
    $table_prefix = $wpdb->prefix; //wp_
    $sql = "DROP TABLE IF EXISTS {$table_prefix}ems_form_data";

    $wpdb->query($sql);
}

add_action("admin_enqueue_scripts", "ems_admin_scripts");

function ems_admin_scripts()
{
    wp_enqueue_style("ems-boostrap-css", EMS_PLUGIN_URL . "css/bootstrap.min.css", array(), "1.0", "all");
    wp_enqueue_style("ems-datatable-css", EMS_PLUGIN_URL . "css/jquery.dataTables.min.css", array(), "1.0", "all");
    wp_enqueue_style("ems-custom-css", EMS_PLUGIN_URL . "css/custom.css", array(), "1.0", "all");

    // js

    // wp_enqueue_script("ems-jquery-js", EMS_PLUGIN_URL . "js/jquery-3.6.4.min.js", array(), "1.0");
    wp_enqueue_script("ems-boostrap-js", EMS_PLUGIN_URL . "js/bootstrap.bundle.min.js", array("jquery"), "1.0");
    wp_enqueue_script("ems-datatable-js", EMS_PLUGIN_URL . "js/jquery.dataTables.min.js", array(), "1.0", true);
    wp_enqueue_script("ems-custom-js", EMS_PLUGIN_URL . "js/custom.js", array("jquery"), "1.0");
    wp_enqueue_script('ems-validation-js', EMS_PLUGIN_URL . 'js/jquery.validate.min.js', array('jquery'), '1.0', true);
}
