<?php

class AccessibilityPlusPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'install',
        'uninstall',
        'public_head'
    );

    protected $_filters = array(
        'image_tag_attributes',
        'admin_navigation_main'
    );

    //sets the default chosen metadata to the alt_text_data as 'title'
    public function hookInstall()
    {
        set_option('dublin_core_type', 'Title');
        set_option('keyboard_focus_outline', '0');
        set_option('outline_color', 'eb4034');
    }

    //removes the 'alt_text_data' option from the database when the plugin is uninstalled
    public function hookUninstall()
    {
        delete_option('dublin_core_type');
        delete_option('keyboard_focus_outline');
        delete_option('outline_color');
    }

    //Adds AccessibilityPlus to the admin navigation sidebar menu
    public function filterAdminNavigationMain($navArray) {
        $navArray['AccessibilityPlus'] = array(
            'label' => __("AccessibilityPlus"),
            'uri' => url('accessibility-plus')
        );
        return $navArray;
    }


    //hooks into the Image Tag Attributes filter
    public function filterImageTagAttributes($attrs, $args) {
      $item = $args['file']->getItem();
      $newAlt = "";

      //checks if the option has been set in the options table or not
      $selected_option = get_option('dublin_core_type');
      if ($selected_option){
          $newAlt = metadata($item, array('Dublin Core', $selected_option));
      }
      //if no option set or if the requested metadata is missing, use the image title instead
      if (!$newAlt){
          $newAlt = metadata($item, array('Dublin Core', 'Title'));
          //if the image is untitled, set the alt-text as "Untitled Image"
          if ("$newAlt" == '[Untitled]'){
              $newAlt = "Untitled Image";
          }
      }

      $attrs['alt'] = $newAlt;

      return $attrs;
    }




    //Adds content to the Head of all public pages
    public function hookPublicHead($args) {

      //Adds border to focused elements
      if (get_option('keyboard_focus_outline') == 1) {
        $color = get_option('outline_color');
        queue_css_string("*:focus {outline: none !important; border: 4px solid "."#"."{$color} !important; border-radius: 3px;}");
      }

    }




}
