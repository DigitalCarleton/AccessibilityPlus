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
        $front = get_option('dublin_core_type');
        if($front){
            $valueOptions = array($front => $valueOptions[$front]) + $valueOptions;
        }

        //builds the dropdownmenu
        $this->addElement(
            'select',
            'dublin_core_type',
            array(
                'label' => 'Dublin Core Metadata Types',
                'multiOptions' => $valueOptions,
              )
        );


        //builds keyboard focus outline checkbox
        $checked = get_option('keyboard_focus_outline');
        $this->addElement(
          'checkbox',
          'keyboard_focus_outline',
          array(
            'label' => 'Turn on Keyboard Focus Outlines',
            'value' => $checked
          )
        );

        //builds outline color text field
        $outlineColor = get_option('outline_color');
        $this->addElement(
          'text',
          'outline_color',
          array(
            'value' => $outlineColor,
            'label' => 'Element Outline Color (#hexcode or CSS color name)'
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
            array('dublin_core_type'),
            'dropdownmenu-display-group'
        );

        $this->addDisplayGroup(
          array('keyboard_focus_outline', 'outline_color'),
          'keyboard-focus-display-group'
        );

        $this->addDisplayGroup(
            array('submit'),
            'submit-display-group'
        );

    }
}
