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
	<legend><?php echo JText::_( 'COM_JEM_TITLE_COLUMN' ); ?></legend>
	
		<div class="control-group">
			<div class="control-label">
			<?php echo $this->form->getLabel('showtitle'); ?> 
			</div>
			<div class="controls">
			<?php echo $this->form->getInput('showtitle'); ?>
				</div>
				</div>
				
				
				<div id="title1" style="display:none" class="control-group">
	<div class="control-label">
				<?php echo $this->form->getLabel('titlewidth'); ?> 
				</div>
				<div class="controls">
				<?php echo $this->form->getInput('titlewidth'); ?>
			</div>
				</div>
	
</fieldset>







