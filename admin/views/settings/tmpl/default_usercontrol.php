<?php
/**
 * @version 1.9.1
 * @package JEM
 * @copyright (C) 2013-2013 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;
?>


<fieldset class="adminform">
	<legend><?php echo JText::_( 'COM_JEM_USER_CONTROL' ); ?></legend>
	
			<?php
			foreach ($this->form->getFieldset('usercontrol') as $field):
			?>
					<div class="control-group">
	<div class="control-label">
					<?php echo $field->label; ?>
					</div>
	<div class="controls">
					<?php echo $field->input; ?>
					</div>
				</div>
			<?php
			endforeach;
			?>
	
</fieldset>



<fieldset class="adminform">
	<legend><?php echo JText::_( 'COM_JEM_AC_EVENTS' ); ?></legend>
	
			<?php
			foreach ($this->form->getFieldset('usercontrolacevent') as $field):
			?>
			<div class="control-group">
	<div class="control-label">
					<?php echo $field->label; ?>
					</div>
	<div class="controls">
					<?php echo $field->input; ?>
					</div>
				</div>
			<?php
			endforeach;
			?>
	
</fieldset>





<fieldset class="adminform">
	<legend><?php echo JText::_( 'COM_JEM_REGISTRATION' ); ?></legend>

	<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('showfroregistra'); ?> 
		</div>
	<div class="controls">
		<?php echo $this->form->getInput('showfroregistra'); ?>
		</div>
				</div>
		
		
		<div id="froreg1" class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('showfrounregistra'); ?> 
		</div>
	<div class="controls">
		<?php echo $this->form->getInput('showfrounregistra'); ?>
		</div>
				</div>
		
		
</fieldset>




		
<fieldset class="adminform">
	<legend><?php echo JText::_( 'COM_JEM_AC_VENUES' ); ?></legend>
	
			<?php
			foreach ($this->form->getFieldset('usercontrolacvenue') as $field):
			?>
					<div class="control-group">
	<div class="control-label">
					<?php echo $field->label; ?>
					</div>
	<div class="controls">
					<?php echo $field->input; ?>
					</div>
				</div>
			<?php
			endforeach;
			?>
	
</fieldset>



