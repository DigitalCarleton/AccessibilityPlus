<?php

class AccessibilityPlusPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_filters = array(
        'file_markup'
    );

    public function filterFileMarkup($html, $args)
    {
      //$this_id = $file->getProperty($item_id);
      $file = $args['file'];
      $callback = $args['callback'];// = 'derivativeImage';
      $options = $args['options'];
      //html is a String - gettype($html) == 'string'
      //line break: echo nl2br ("\n");

      if($file->hasThumbnail() || $file->hasFullsize()){
        $posStart = strpos($html, 'alt');
        $posStop = strpos($html, 'title');
        $length = $posStart - $posStop;
        $newAlt = 'alt="new-alt-text"';

        $html = substr_replace($html, $newAlt, $posStart, $length);
      }
      return $html;
    }
}
