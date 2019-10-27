<?php

class AccessibilityPlusPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'install',
        'uninstall'
    );

    protected $_filters = array(
        'image_tag_attributes',
        'admin_navigation_main'
    );

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

    //Adds AccessibilityPlus to the admin navigation sidebar menu
    public function filterAdminNavigationMain($navArray)
    {
        $navArray['AccessibilityPlus'] = array(
            'label' => __("AccessibilityPlus"),
            'uri' => url('accessibility-plus')
        );
        return $navArray;
    }


    //hooks into the Image Tag Attributes filter
    public function filterImageTagAttributes($attrs, $args)
    {
      $file = $args['file'];

      echo "<h1>HELLOOOOOOooooooo</h1>";
      var_dump($attrs);

      //checks if the option has been set in the options table or not
      $selected_option = get_option('alt_text_data');
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

      echo "NEWALT: ";
      var_dump($newAlt);

      $attrs['alt'] = $newAlt;

      return $attrs;

    }


    /*
    //hooks into the File Markup filter
    public function oldFilterFunction($html, $args)
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
    */

}
