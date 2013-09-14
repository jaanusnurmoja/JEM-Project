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
	<legend><?php echo JText::_( 'COM_JEM_IMAGE_HANDLING' ); ?></legend>

		<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('sizelimit'); ?>
		</div>
	<div class="controls">
		 <?php echo $this->form->getInput('sizelimit'); ?>
		 </div>
				</div>
				
		
			<div class="control-group">
	<div class="control-label"> 
		<?php echo $this->form->getLabel('imagehight'); ?> 
		</div>
	<div class="controls">
		<?php echo $this->form->getInput('imagehight'); ?>
		</div>
				</div>
		
		
			<div class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('imagewidth'); ?> 
		</div>
	<div class="controls">
		<?php echo $this->form->getInput('imagewidth'); ?>
			<span class="error hasTip" title="<?php echo JText::_('COM_JEM_WARNING');?>::<?php echo JText::_('COM_JEM_WARNING_MAX_IMAGEWIDTH'); ?>">
				<?php echo $this->WarningIcon(); ?>
			</span>
		</div>
				</div>
		<?php
		//is the gd library installed on the server running JEM?
		if ($gdv = JEMImage::gdVersion())
		{
				//is it Version two or higher? If yes let the user the choice
				if ($gdv >= 2) {
?>




	<div class="control-group">
	<div class="control-label">
<?php echo $this->form->getLabel('gddisabled'); ?>
</div>
	<div class="controls">
<?php echo $this->form->getInput('gddisabled'); ?>
</div>
				</div>
<?php
						}
		}
		?>
		

			<div id="lb1" style="display:none" class="control-group">
	<div class="control-label">
		<?php echo $this->form->getLabel('lightbox'); ?> 
		</div>
	<div class="controls">
		<?php echo $this->form->getInput('lightbox'); ?>
		</div>
				</div>
</fieldset>



