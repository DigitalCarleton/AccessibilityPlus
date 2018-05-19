<?php

class AccessibilityPlus_IndexController extends Omeka_Controller_AbstractActionController
{
    public function indexAction()
    {
      $form = new AccessibilityPlus_Form_Settings();
      $this->view->form = $form;
      $request = $this->getRequest();
      if ($request->isPost()) {
          if ($form->isValid($_POST)) {
              $options = $form->getValues();
              //unset($options['alt_text_data']);
              //foreach ($options as $key => $value) {
              //    set_option($key, $value);
              //}
            }
          }
        return $this->redirect('accessibility-plus');
    }
}
