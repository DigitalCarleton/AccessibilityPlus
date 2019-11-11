<?php

class AccessibilityPlus_IndexController extends Omeka_Controller_AbstractActionController
{
    public function indexAction()
    {
      $form = new AccessibilityPlus_Form_Settings();
      $this->view->form = $form;

      $request = $this->getRequest();
      if ($request->isPost()) {
          if ($form->isValid($request->getPost())) {
              $options = $form->getValues();
              foreach ($options as $key => $value) {
                  set_option($key, $value);
              }
          }
      }
      return;
    }
}
