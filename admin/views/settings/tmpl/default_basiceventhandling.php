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
	<legend><?php echo JText::_( 'COM_JEM_EVENT_HANDLING' ); ?></legend>

	<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('oldevent'); ?>
		</div>
	<div class="controls">	
		 <?php echo $this->form->getInput('oldevent'); ?>
			<span class="error hasTip" title="<?php echo JText::_( 'COM_JEM_WARNING' ); ?>::<?php echo JText::_( 'COM_JEM_OLD_EVENTS_WARN' ); ?>">
								<?php echo $this->WarningIcon(); ?>
			</span>
		</div>
				</div>		
		
	
			<div id="evhandler1" class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('minus'); ?> 
				</div>
	<div class="controls">	
		<?php echo $this->form->getInput('minus'); ?>
		</div>
				</div>	
</fieldset>



