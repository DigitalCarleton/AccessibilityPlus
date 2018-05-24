<?php

class AccessibilityPlus_Form_Settings extends Omeka_Form
{
    public function init()
    {
        parent::init();

    $valueOptions = array(
        'Title'=>'Title',
        'Alternative Title'=>'Alternative Title',
        'Subject'=>'Subject',
        'Description'=>'Description',
        'Abstract'=>'Abstract',
        'Table Of Contents'=>'Table Of Contents',
        'Creator'=>'Creator',
        'Source'=>'Source',
        'Publisher'=>'Publisher',
        'Date'=>'Date',
        'Date Available'=>'Date Available',
        'Date Created'=>'Date Created',
        'Date Accepted'=>'Date Accepted',
        'Date Copyrighted'=>'Date Copyrighted',
        'Date Submitted'=>'Date Submitted',
        'Date Issued'=>'Date Issued',
        'Date Modified'=>'Date Modified',
        'Date Valid'=>'Date Valid',
        'Contributor'=>'Contributor',
        'Rights'=>'Rights',
        'Access Rights'=>'Access Rights',
        'License'=>'License',
        'Relation'=>'Relation',
        'Conforms To'=>'Conforms To',
        'Has Format'=>'Has Format',
        'Has Part'=>'Has Part',
        'Has Version'=>'Has Version',
        'Is Format Of'=>'Is Format Of',
        'Is Part Of'=>'Is Part Of',
        'Is Referenced By'=>'Is Referenced By',
        'Is Replaced By'=>'Is Replaced By',
        'Is Required By'=>'Is Required By',
        'Is Version Of'=>'Is Version Of',
        'References'=>'References',
        'Replaces'=>'Replaces',
        'Requires'=>'Requires',
        'Format'=>'Format',
        'Extent'=>'Extent',
        'Medium'=>'Medium',
        'Language'=>'Language',
        'Type'=>'Type',
        'Identifier'=>'Identifier',
        'Bibliographic Citation'=>'Bibliographic Citation',
        'Coverage'=>'Coverage',
        'Spatial Coverage'=>'Spatial Coverage',
        'Temporal Coverage'=>'Temporal Coverage',
        'Accrual Method'=>'Accrual Method',
        'Accrual Periodicity'=>'Accrual Periodicity',
        'Accrual Policy'=>'Accrual Policy',
        'Audience'=>'Audience',
        'Audience Education Level'=>'Audience Education Level',
        'Mediator'=>'Mediator',
        'Instructional Method'=>'Instructional Method',
        'Provenance'=>'Provenance',
        'Rights Holder'=>'Rights Holder',
    );

    $front = get_option('alt_text_data');
    if($front){
        $valueOptions = array($front => $valueOptions[$front]) + $valueOptions;
    }

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
