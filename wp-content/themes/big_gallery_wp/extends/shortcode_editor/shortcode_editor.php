<?php
class add_shortcode_button {
    var $pluginname = 'shortcode_editor';
    var $path = '';
    var $internalVersion = 100;
    function add_shortcode_button() {
        $this->path = get_template_directory_uri() . '/extends/shortcode_editor/';
        add_action('init', array (&$this, 'add_button') );
    }
    function add_button() {
        if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') )
        return;
				add_filter("mce_external_plugins", array (&$this, 'add_tinymce_plugin' ), 5);
        add_filter('mce_buttons', array (&$this, 'place_button' ), 5);

    }
    function place_button($buttons) {
        array_push($buttons, 'separator', $this->pluginname );
        return $buttons;
    }
    function add_tinymce_plugin($plugin_array) {
            $plugin_array[$this->pluginname] = $this->path . 's_editor.js';
        return $plugin_array;
    }

}
if (is_admin()){
    $tinymce_button = new add_shortcode_button();
}
?>