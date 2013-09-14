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
<fieldset>
	<legend><?php echo JText::_( 'COM_JEM_EVENTS' ); ?></legend>
			<?php
			foreach ($this->form->getFieldset('evevents') as $field):
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


