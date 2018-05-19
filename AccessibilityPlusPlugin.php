<?php

class AccessibilityPlusPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_filters = array(
        'file_markup',
        'admin_navigation_main'
    );

    public function filterAdminNavigationMain($navArray)
    {
        $navArray['AccessibilityPlus'] = array(
            'label' => __("AccessibilityPlus"),
            'uri' => url('accessibility-plus')
        );
        return $navArray;
    }

    public function filterFileMarkup($html, $args)
    {
      //$this_id = $file->getProperty($item_id);
      $file = $args['file'];
      $callback = $args['callback']; // = 'derivativeImage';
      $options = $args['options'];

      //Checks if the file has a thumbnail or fullsize image
      //$file = $fileOptions['imgAttributes']['alt']
      if($file->hasThumbnail() || $file->hasFullsize()){
        $posStart = strpos($html, 'alt');
        $posStop = strpos($html, 'title');
        $length = $posStart - $posStop;
        $newAlt = "new-alt-text";
        $newCode = 'alt="'.$newAlt.'"';
        //replaces code generating the alt-text in the HTML with $newCode
        $html = substr_replace($html, $newCode, $posStart, $length);
      }
      return $html;
    }
}
