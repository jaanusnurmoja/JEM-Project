<?php
/**
 * @version 1.9.1
 * @package JEM
 * @copyright (C) 2013-2013 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;
// JEMHelper::headerDeclarations();
?>

<form action="index.php" method="post" name="adminForm" enctype="multipart/form-data" id="adminForm">



<div class="span8 form-horizontal">


	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_JEM_CSV_EXPORT'); ?></legend>

		<div class="control-group">
					<div class="control-label">
				<label><?php echo JText::_('COM_JEM_EXPORT_EVENTS'); ?></label>
				</div>
					<div class="controls">

		<a class="btn modal" title="<?php echo JText::_('COM_JEM_CSV_EXPORT'); ?>" onclick="window.open('index.php?option=com_jem&task=export.export')"><?php echo JText::_('COM_JEM_CSV_EXPORT'); ?></a>


				</div>
				</div>



				<div class="control-group">
					<div class="control-label">
				<label><?php echo JText::_('COM_JEM_EXPORT_CATEGORIES'); ?></label>
				</div>
					<div class="controls">

		<a class="btn modal" title="<?php echo JText::_('COM_JEM_CSV_EXPORT'); ?>" onclick="window.open('index.php?option=com_jem&task=export.exportcats')"><?php echo JText::_('COM_JEM_CSV_EXPORT'); ?></a>


				</div>
				</div>



		<div class="control-group">
					<div class="control-label">
				<label><?php echo JText::_('COM_JEM_EXPORT_VENUES'); ?></label>
				</div>
					<div class="controls">

		<a class="btn modal" title="<?php echo JText::_('COM_JEM_CSV_EXPORT'); ?>" onclick="window.open('index.php?option=com_jem&task=export.exportvenues')"><?php echo JText::_('COM_JEM_CSV_EXPORT'); ?></a>


				</div>
				</div>



		<div class="control-group">
					<div class="control-label">
				<label><?php echo JText::_('COM_JEM_EXPORT_CAT_EVENTS'); ?></label>
				</div>
					<div class="controls">

		<a class="btn modal" title="<?php echo JText::_('COM_JEM_CSV_EXPORT'); ?>" onclick="window.open('index.php?option=com_jem&task=export.exportcatevents')"><?php echo JText::_('COM_JEM_CSV_EXPORT'); ?></a>


				</div>
				</div>



   </fieldset>


	<input type="hidden" name="option" value="com_jem" />
	<input type="hidden" name="view" value="export" />
	<input type="hidden" name="controller" value="export" />
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>

	</div>
</form>

