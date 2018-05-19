<?php

class AccessibilityPlus_Form_Settings extends Omeka_Form
{
    public function init()
    {
        parent::init();

    $valueOptions = array(
        'Title',
        'Alternative Title',
        'Subject',
        'Description',
        'Abstract',
        'Table Of Contents',
        'Creator',
        'Source',
        'Publisher',
        'Date',
        'Date Available',
        'Date Created',
        'Date Accepted',
        'Date Copyrighted',
        'Date Submitted',
        'Date Issued',
        'Date Modified',
        'Date Valid',
        'Contributor',
        'Rights',
        'Access Rights',
        'License',
        'Relation',
        'Conforms To',
        'Has Format',
        'Has Part',
        'Has Version',
        'Is Format Of',
        'Is Part Of',
        'Is Referenced By',
        'Is Replaced By',
        'Is Required By',
        'Is Version Of',
        'References',
        'Replaces',
        'Requires',
        'Format',
        'Extent',
        'Medium',
        'Language',
        'Type',
        'Identifier',
        'Bibliographic Citation',
        'Coverage',
        'Spatial Coverage',
        'Temporal Coverage',
        'Accrual Method',
        'Accrual Periodicity',
        'Accrual Policy',
        'Audience',
        'Audience Education Level',
        'Mediator',
        'Instructional Method',
        'Provenance',
        'Rights Holder',
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
