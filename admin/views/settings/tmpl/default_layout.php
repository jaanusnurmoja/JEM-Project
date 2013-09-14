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
	<legend><?php echo JText::_( 'COM_JEM_VENUE_COLUMN' ); ?></legend>
	
	<div class="control-group">
			<div class="control-label">
	<?php echo $this->form->getLabel('showlocate'); ?>
	 </div>
			<div class="controls">
	<?php echo $this->form->getInput('showlocate'); ?>
	</div>
				</div>
	
	
	
				<div id="loc1" style="display:none" class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('locationwidth'); ?>
				 </div>
			<div class="controls">
				<?php echo $this->form->getInput('locationwidth'); ?>
				</div>
				</div>
				
				
				
			
				<div id="loc2" style="display:none" class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('showlinkvenue'); ?> 
				</div>
			<div class="controls">
				<?php echo $this->form->getInput('showlinkvenue'); ?>
				</div>
				</div>
	
</fieldset>



<fieldset class="adminform">
	<legend><?php echo JText::_( 'COM_JEM_STATE_COLUMN' ); ?></legend>
	
	<div class="control-group">
			<div class="control-label">
			<?php echo $this->form->getLabel('showstate'); ?> 
			</div>
			<div class="controls">
			<?php echo $this->form->getInput('showstate'); ?>
				</div>
				</div>
				
				
				
			
				<div id="state1" style="display:none" class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('statewidth'); ?> 
				</div>
			<div class="controls">
				<?php echo $this->form->getInput('statewidth'); ?>
				</div>
				</div>
	
</fieldset>



<fieldset class="adminform">
	<legend><?php echo JText::_( 'COM_JEM_CATEGORY_COLUMN' ); ?></legend>
	
	
	<div class="control-group">
			<div class="control-label">
			<?php echo $this->form->getLabel('showcat'); ?> 
			</div>
			<div class="controls">
			<?php echo $this->form->getInput('showcat'); ?>
				</div>
				</div>
				
				
			
				<div id="cat1" style="display:none" class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('catfrowidth'); ?> 
				</div>
			<div class="controls">
				<?php echo $this->form->getInput('catfrowidth'); ?>
				</div>
				</div>
				
				
			
				<div id="cat2" style="display:none" class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('catlinklist'); ?> 
				</div>
			<div class="controls">
				<?php echo $this->form->getInput('catlinklist'); ?>
				</div>
				</div>
	
</fieldset>




<fieldset class="adminform">
	<legend><?php echo JText::_( 'COM_JEM_LAYOUT_TABLE_EVENTIMAGE' ); ?></legend>
	
	
	
	<div class="control-group">
			<div class="control-label">
		<?php echo $this->form->getLabel('showeventimage'); ?>
		</div>
			<div class="controls">
		 <?php echo $this->form->getInput('showeventimage'); ?>
				</div>
				</div>
				
				
				
			
				<div id="evimage1" style="display:none" class="control-group">
			<div class="control-label">
				<?php echo $this->form->getLabel('tableeventimagewidth'); ?>
				</div>
			<div class="controls">
				 <?php echo $this->form->getInput('tableeventimagewidth'); ?>
				</div>
				</div>
	
</fieldset>




