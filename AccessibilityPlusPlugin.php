<?php

class AccessibilityPlusPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'define_acl'
    );

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

    public function hookDefineAcl($args)
    {
        $acl = $args['acl'];
        $acl->addResource('AccessibilityPlus');
        $acl->allow(null, 'AccessibilityPlus');
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
        $metadata = $file->getProperty('metadata');
        foreach($metadata as $key => $value){
          echo $key;
          echo $value;
        }
        $newAlt = $metadata[get_option('alt_text_data')]
        $newCode = 'alt="'.$newAlt.'"';
        //replaces code generating the alt-text in the HTML with $newCode
        $html = substr_replace($html, $newCode, $posStart, $length);
      }
      return $html;
    }
}
