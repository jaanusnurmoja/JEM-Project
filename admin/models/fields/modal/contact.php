<?php
// No direct access
 defined('_JEXEC') or die;

 jimport('joomla.form.formfield');


 /**
  * Contact form field class
  */

 class JFormFieldModal_Contact extends JFormField
 {

		/**
		* field type
		* @var string
		*/
        protected $type = 'Modal_Contact';



 	/**
   * Method to get the field input markup
   */
  protected function getInput()
  {
          // Load modal behavior
          JHtml::_('behavior.modal', 'a.modal');

          // Build the script
          $script = array();
          $script[] = '    function jSelectContact_'.$this->id.'(id, name, object) {';
          $script[] = '        document.id("'.$this->id.'_id").value = id;';
          $script[] = '        document.id("'.$this->id.'_name").value = name;';
          $script[] = '        SqueezeBox.close();';
          $script[] = '    }';

          // Add to document head
          JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

          // Setup variables for display
          $html = array();

          $link = 'index.php?option=com_jem&amp;view=contactelement&amp;tmpl=component&amp;function=jSelectContact_'.$this->id;




          $db = JFactory::getDbo();
          $query = $db->getQuery(true);
          $query->select('name');
          $query->from('#__contact_details');
          $query->where('id='.(int)$this->value);
          $db->setQuery($query);


          $contactid = $db->loadResult();

          if ($error = $db->getErrorMsg()) {
          	JError::raiseWarning(500, $error);
          }


          if (empty($contactid)) {
                  $contactid = JText::_('COM_JEM_SELECTCONTACT');
          }
          $contactid = htmlspecialchars($contactid, ENT_QUOTES, 'UTF-8');

          // The contact input field
          $html[] = '<span class="input-append">';
          $html[] = '  <input type="text" class="input-medium" id="'.$this->id.'_name" value="'.$contactid.'" disabled="disabled" size="35" />';
          $html[] = '    <a class="modal btn hasTooltip" title="'.JHtml::tooltipText('COM_JEM_SELECT').'" href="'.$link.'&amp;'.JSession::getFormToken().'=1" rel="{handler: \'iframe\', size: {x:800, y:450}}">'.
          		JText::_('JSELECT').'</a>';
          $html[] = '</span>';


         // The active contact-id field
          if (0 == (int)$this->value) {
                  $value = '';
          } else {
                  $value = (int)$this->value;
          }

          // class='required' for client side validation
          $class = '';
          if ($this->required) {
                  $class = ' class="required modal-value"';
          }

          $html[] = '<input type="hidden" id="'.$this->id.'_id"'.$class.' name="'.$this->name.'" value="'.$value.'" />';

         return implode("\n", $html);
  }




















 }
 ?>