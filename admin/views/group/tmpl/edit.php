<?php
/**
 * @version 1.9.1
 * @package JEM
 * @copyright (C) 2013-2013 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;


//JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHTML::_('behavior.keepalive');

// Create shortcut to parameters.
$params = $this->state->get('params');
$params = $params->toArray();

?>

<script type="text/javascript">
	window.addEvent('domready', function(){



	});



	// moves elements from one select box to another one
	function moveOptions(from,to) {
		// Move them over
		for (var i=0; i<from.options.length; i++) {
			var o = from.options[i];
			if (o.selected) {
			  to.options[to.options.length] = new Option( o.text, o.value, false, false);
			}
		}

		// Delete them from original
		for (var i=(from.options.length-1); i>=0; i--) {
			var o = from.options[i];
			if (o.selected) {
			  from.options[i] = null;
			}
		}
		from.selectedIndex = -1;
		to.selectedIndex = -1;
	}

	/*
	function allSelected(element) {

		for (var i=0; i<element.options.length; i++) {
			var o = element.options[i];
			o.selected = true;
		}
	}
*/
	function selectAll()
    {
        selectBox = document.getElementById("maintainers");

        for (var i = 0; i < selectBox.options.length; i++)
        {
             selectBox.options[i].selected = true;
        }
    }


</script>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		selectAll();
		if (task == 'group.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {
			Joomla.submitform(task, document.getElementById('adminForm'));

			//allSelected(document.adminForm['maintainers[]']);

		}
	}

</script>



<form
	action="<?php echo JRoute::_('index.php?option=com_jem&layout=edit&id='.(int) $this->item->id); ?>"
	class="form-validate" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">


	<!-- Begin Group -->
	<div class="span8 form-horizontal">

	<fieldset>
	<?php echo JHtml::_('bootstrap.startTabSet', 'groupTab', array('active' => 'group-details')); ?>

	<!--  GROUP-DETAILS TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'groupTab', 'group-details', JText::_('COM_JEM_GROUP_INFO_TAB', true)); ?>



		<fieldset class="adminform">

			<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('name');?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('name'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('id');?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('id'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('maintainers2');?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('maintainers2'); ?>
				</div>
				</div>
		</fieldset>




		<fieldset class="adminform">
			<table class="adminform">
				<tr>
					<td><b><?php echo JText::_( 'COM_JEM_AVAILABLE_USERS' ).':'; ?></b></td>
					<td>&nbsp;</td>
					<td><b><?php echo JText::_( 'COM_JEM_MAINTAINERS' ).':'; ?></b></td>
				</tr>
				<tr>
					<td width="260px"><?php echo $this->lists['available_users']; ?></td>
					<td width="110px">
						<input style="width: 50px" type="button" name="right" value="&gt;" onClick="moveOptions(document.adminForm['available_users'], document.adminForm['maintainers[]'])" />
						<br /><br />
						<input style="width: 50px" type="button" name="left" value="&lt;" onClick="moveOptions(document.adminForm['maintainers[]'], document.adminForm['available_users'])" />
					</td>
					<td width="260px"><?php echo $this->lists['maintainers']; ?></td>
				</tr>
			</table>
		</fieldset>




			<fieldset class="adminform">

			<div>
			<br /><br />
				<?php echo $this->form->getLabel('description'); ?>
				<div class="clr"></div>
				<?php echo $this->form->getInput('description'); ?>
			</div>


		</fieldset>
		<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!-- GROUP-PERMISSION TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'groupTab', 'group-permissions', JText::_('COM_JEM_GROUP_PERMISSIONS', true)); ?>



				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('addvenue'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('addvenue'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('publishvenue'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('publishvenue'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('editvenue'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('editvenue'); ?>
				</div>
				</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
<?php echo JHtml::_('bootstrap.endTabSet'); ?>
</fieldset>

</div>


				<input type="hidden" name="task" value="" />


				<?php echo JHTML::_( 'form.token' ); ?>


		<div class="clr"></div>

</form>

