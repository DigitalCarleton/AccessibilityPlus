<?php

class AccessibilityPlus_Form_Settings extends Omeka_Form
{
    public function init()
    {
        parent::init();

    $valueOptions = array(
        'a', 'b', 'c',
    );

    $this->addElement(
        'select',
        'DublinCore',
        array(
            'label' => 'Dublin Core Metadata Types',
            'multiOptions' => $valueOptions,
        )
      );

    $this->addElement('submit', 'submit', array(
            'label' => __('Upload'),
            'class' => 'submit submit-medium',
            'decorators' => (array(
                'ViewHelper',
                array('HtmlTag', array('tag' => 'div', 'class' => 'field')))),
        ));
    }
}
