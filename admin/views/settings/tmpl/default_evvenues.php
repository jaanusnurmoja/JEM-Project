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
	<legend><?php echo JText::_( 'COM_JEM_VENUES' ); ?></legend>
	
	
	<div class="control-group">
	<div class="control-label">
			<?php echo $this->form->getLabel('showlocdescription'); ?>
			</div>
					<div class="controls"> 
			<?php echo $this->form->getInput('showlocdescription'); ?>
				</div>
				</div>
				
	<div class="control-group">
	<div class="control-label">			
			<?php echo $this->form->getLabel('showdetailsadress'); ?> 
			</div>
					<div class="controls">
			<?php echo $this->form->getInput('showdetailsadress'); ?>
			</div>
				</div>
				
				
	<div class="control-group">
	<div class="control-label">			
			<?php echo $this->form->getLabel('showdetlinkvenue'); ?> 
			</div>
					<div class="controls">
			<?php echo $this->form->getInput('showdetlinkvenue'); ?>
			</div>
				</div>
				
				
	<div class="control-group">
	<div class="control-label">			
			<?php echo $this->form->getLabel('showmapserv'); ?> 
			</div>
					<div class="controls">
			<?php echo $this->form->getInput('showmapserv'); ?>
			</div>
				</div>
				
				

	<div id="map1" style="display:none" class="control-group">	 
	<div class="control-label">
			<?php echo $this->form->getLabel('tld'); ?> 
			</div>
					<div class="controls">
			<?php echo $this->form->getInput('tld'); ?>
			</div>
				</div>
				
				
	<div id="map2" style="display:none" class="control-group">	
	<div class="control-label">
	<?php echo $this->form->getLabel('lg'); ?> 
	</div>
					<div class="controls">
	<?php echo $this->form->getInput('lg'); ?>
	</div>
				</div>
	
				
	
</fieldset>






