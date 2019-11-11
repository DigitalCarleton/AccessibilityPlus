<?php

class AccessibilityPlus_Form_Settings extends Omeka_Form
{
    public function init()
    {
        parent::init();
        //makes a call to the database to get all the dublin core elements
        $db = get_db();
        $valueOptions = array();
        $table = $db->getTable('Element');
        $tableName = $db->getTableName('Element');
        $elements = $table->fetchObjects("SELECT * FROM {$tableName} WHERE element_set_id = 1");
        foreach ($elements as $element){
          $element_title = $element->getProperty('name');
          $valueOptions["$element_title"] = "$element_title";
        }

        //puts the currently chosen element in the first slot of the dropdownmenu
        $front = get_option('dublin-core-type');
        if($front){
            $valueOptions = array($front => $valueOptions[$front]) + $valueOptions;
        }

        //builds the dropdownmenu
        $this->addElement(
            'select',
            'dublin-core-type',
            array(
                'label' => 'Dublin Core Metadata Types',
                'multiOptions' => $valueOptions,
              )
        );


        //builds keyboard focus outline checkbox
        $checked = get_option('keyboard-focus-outline');
        $this->addElement(
          'checkbox',
          'keyboard-focus-outline',
          array(
            'label' => 'Turn on Keyboard Focus Outlines',
            'value' => $checked
          )
        );

        $outlineColor = get_option('outline-color');
        $this->addElement(
          'text',
          'outline-color',
          array(
            'value' => $outlineColor,
            'label' => 'Element Outline Color'
          )
        );

        //builds the submit button
        $this->addElement('submit', 'submit', array(
                'label' => __('Save Settings'),
                'class' => 'submit submit-medium',
                'decorators' => (array(
                    'ViewHelper',
                    array('HtmlTag', array('tag' => 'div', 'class' => 'field')))),
        ));

        //makes display separate groups for visual formatting
        $this->addDisplayGroup(
            array('dublin-core-type'),
            'dropdownmenu-display-group'
        );

        $this->addDisplayGroup(
          array('keyboard-focus-outline', 'outline-color'),
          'keyboard-focus-display-group'
        );

        $this->addDisplayGroup(
            array('submit'),
            'submit-display-group'
        );

    }
}
