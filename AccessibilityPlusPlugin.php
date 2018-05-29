<?php

class AccessibilityPlusPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'define_acl',
        'install',
        'uninstall'
    );

    protected $_filters = array(
        'file_markup',
        'admin_navigation_main'
    );

    //Adds AccessibilityPlus as part of the admin navigation sidebar menu
    public function filterAdminNavigationMain($navArray)
    {
        $navArray['AccessibilityPlus'] = array(
            'label' => __("AccessibilityPlus"),
            'uri' => url('accessibility-plus')
        );
        return $navArray;
    }

    //adds 'AccessibilityPlus' to the Access Control List
    public function hookDefineAcl($args)
    {
        $acl = $args['acl'];
        $acl->addResource('AccessibilityPlus');
        $acl->allow(null, 'AccessibilityPlus');
    }

    //sets the default chosen metadata to the alt_text_data as 'title'
    public function hookInstall()
    {
        set_option('alt_text_data', 'Title');
    }

    //removes the 'alt_text_data' option from the database when the plugin is uninstalled
    public function hookUninstall()
    {
        delete_option('alt_text_data');
    }

    //hooks into the File Markup filter
    public function filterFileMarkup($html, $args)
    {
      //Checks if the file has a thumbnail or fullsize image
      $file = $args['file'];
      if($file->hasThumbnail() || $file->hasFullsize()){
        //finds the position where alt-text is defined in the HTML
        $posStart = strpos($html, 'alt');
        $posStop = strpos($html, 'title');
        $length = $posStop - $posStart;
        $newAlt = NULL;
        $selected_option = get_option('alt_text_data');
        //checks if the option has been set in the options table or not
        if ($selected_option){
            $newAlt = metadata($file, array('Dublin Core', $selected_option));
        }
        //if no option set or if the requested metadata is missing, use the image title instead
        if (!$newAlt){
            //gets the item image and gets the requested metadata from it
            $item = $file->getItem();
            $newAlt = metadata($item, array('Dublin Core', 'Title'));
            //if the image is untitled, set the alt-text as "Untitled Image"
            if ("$newAlt" == '[Untitled]'){
                $newAlt = "Untitled Image";
            }
        }
        $newCode = 'alt="'.$newAlt.'"';
        //replaces code generating the alt-text in the HTML with $newCode
        $html = substr_replace($html, $newCode, $posStart, $length);
      }
      return $html;
    }
}
