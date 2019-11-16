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

        //sets description for alt text selector
        $altTextDescription = 'Alternate Text or Alt-Text is the text read by screenreaders '
        . 'when coming across images on a website. Omeka by default uses the filename, '
        . 'which can frequently be indecipherable (i.e. DSC00891.jpg). '
        . 'To address this issue, this plugin lets you choose a metadata element '
        . 'from the Dublin Core (such as "Title" or "Description") to be used as the alt-text. '
        . 'So far this only works for when looking at fullsized images, not thumbnails. '
        . 'The plugin <a href="https://omeka.org/classic/plugins/DublinCoreExtended/">'
        . 'Dublin Core Extended </a> adds the full set of Dublin Core properties, '
        . 'include alternative title for alt-text. If the element you choose is missing, '
        . 'from an image this plugin uses the item title by default.';

        //builds the dropdownmenu
        $this->addElement(
            'select',
            'dublin_core_type',
            array(
                'label' => 'Dublin Core Metadata Types',
                'multiOptions' => $valueOptions,
                'description' => $altTextDescription,
              )
        );



        //sets description for keyboard focus checkbox
        $keyboardFocusDescription = "Some users prefer to navigate a website by tabbing through elemements "
        . "using their keyboard. This setting places a colorful border around the currently selected element "
        . "when the user is using their keyboard to make it easier to see which element is currently "
        . "highlighted and stay oriented on the page.";

        //builds keyboard focus outline checkbox
        $checked = get_option('keyboard_focus_outline');
        $this->addElement(
          'checkbox',
          'keyboard_focus_outline',
          array(
            'label' => 'Turn on Keyboard Focus Outlines',
            'value' => $checked,
            'description' => $keyboardFocusDescription,
          )
        );

        //sets the description for the keyboard focus color selector
        $keyboardFocusColorDescription = "This setting allows you to choose the color "
        . "of the borders around highlighted elements. "
        . "Choose a color that is easily visible and contrasts well with your background colors. "
        . "This field accepts <a href='https://www.w3schools.com/cssref/css_colors.asp'>CSS Color Names</a> "
        . " or six-digit <a href='https://www.google.com/search?q=color+picker'>hex codes</a> that start with '#', "
        . "for example #0000FF, which means blue.";

        //builds outline color text field
        $outlineColor = get_option('outline_color');
        $this->addElement(
          'text',
          'outline_color',
          array(
            'value' => $outlineColor,
            'label' => 'Element Outline Color (#hexcode or CSS color name)',
            'description' => $keyboardFocusColorDescription,
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
