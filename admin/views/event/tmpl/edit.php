<?php
/**
 * @version 1.9.1
 * @package JEM
 * @copyright (C) 2013-2013 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die('Restricted access');


//JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');

// Create shortcut to parameters.
$params = $this->state->get('params');
$params = $params->toArray();


?>

<script type="text/javascript">
	window.addEvent('domready', function(){

	setbgcats();
	seteventcats();
	checkmaxplaces();
	});

	function setbgcats()
	{
		var z=document.getElementById("cid");

		z.morph({
		    backgroundColor: '#D5EEFF'
		});
	}

	function seteventcats()
	{
		$('cid').addEvent('blur',function(){
		        testcid();
		});
	}

	function checkmaxplaces()
	{
		$('jform_maxplaces').addEvent('change', function(){
			if ($('event-available')) {
						var val = parseInt($('jform_maxplaces').value);
						var booked = parseInt($('event-booked').value);
						$('event-available').value = (val-booked);
			}
			});

		$('jform_maxplaces').addEvent('keyup', function(){
			if ($('event-available')) {
						var val = parseInt($('jform_maxplaces').value);
						var booked = parseInt($('event-booked').value);
						$('event-available').value = (val-booked);
			}
			});
	}

	function testcid()
	{
		var x=document.getElementById("cid").selectedIndex;
		var z2=document.getElementById("jform_cats-lbl");


		if (x == -1)
		{
			z2.addClass("invalid");
		} else
		{
			z2.removeClass('invalid');
		}
	}
</script>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		testcid();
		if (task == 'event.cancel' || document.formvalidator.isValid(document.id('event-form'))) {
			Joomla.submitform(task, document.getElementById('event-form'));

			$("meta_keywords").value = $keywords;
			$("meta_description").value = $description;
		}
	}
</script>



<form
	action="<?php echo JRoute::_('index.php?option=com_jem&layout=edit&id='.(int) $this->item->id); ?>"
	class="form-validate form-horizontal" method="post" name="adminForm" id="event-form" enctype="multipart/form-data">

<?php
// @todo fix this!
// it's not implemented as this code won't work in there (no title field)
// echo JLayoutHelper::render('joomla.edit.item_title', $this);
?>


<!-- Begin Event -->
<div class="span8 form-horizontal">



	<fieldset>
		<?php echo JHtml::_('bootstrap.startTabSet', 'eventTab', array('active' => 'event-details')); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'eventTab', 'event-details', JText::_('COM_JEM_EVENT_INFO_TAB', true)); ?>


		<fieldset class="adminform">

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('title');?>
				</div>
					<div class="controls">
				 <?php echo $this->form->getInput('title'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('alias'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('alias'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('dates'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('dates'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('enddates'); ?>
				</div>
					<div class="controls">
				 <?php echo $this->form->getInput('enddates'); ?>
				</div>
				</div>


				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('times'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('times'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('endtimes'); ?>
				</div>
					<div class="controls">
				 <?php echo $this->form->getInput('endtimes'); ?>
				</div>
				</div>


				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('cats'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('cats'); ?>
			</div>
				</div>
		</fieldset>



		<fieldset class="adminform">
			<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('locid'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('locid'); ?>
				</div>
				</div>



				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('contactid'); ?>
				</div>
					<div class="controls">
				 <?php echo $this->form->getInput('contactid'); ?>
				</div>
				</div>


				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('published'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('published'); ?>
				</div>
				</div>
		</fieldset>





			<fieldset class="adminform">
			<div>
				<?php echo $this->form->getLabel('datdescription'); ?>
				<div class="clr"></div>
				<?php echo $this->form->getInput('datdescription'); ?>
			</div>

		</fieldset>


			<?php echo JHtml::_('bootstrap.endTab'); ?>


			<?php echo JHtml::_('bootstrap.addTab', 'eventTab', 'event-attachments', JText::_('COM_JEM_EVENT_ATTACHMENTS_TAB', true)); ?>
			<?php echo $this->loadTemplate('attachments'); ?>
			<?php echo JHtml::_('bootstrap.endTab'); ?>




			<?php echo JHtml::_('bootstrap.addTab', 'eventTab', 'event-publishing', JText::_('COM_JEM_FIELDSET_PUBLISHING', true)); ?>

			<fieldset class="panelform">


		<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('id'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('id'); ?>
				</div>
				</div>

		<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('created_by'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('created_by'); ?>
				</div>
				</div>


		<div class="control-group">
					<div class="control-label">
				<label><?php echo JText::_ ( 'COM_JEM_HITS' );	?></label>
				</div>
					<div class="controls">
				<input class="inputbox" name="hits" value="<?php echo $this->item->hits; ?>" size="10" maxlength="10" id="a_hits" />
				<?php echo $this->resethits; ?>
				</div>
				</div>

		<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('created'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('created'); ?>
				</div>
				</div>

		<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('modified'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('modified'); ?>
				</div>
				</div>

		<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('version'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('version'); ?>
				</div>
				</div>


		</fieldset>

			<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!--   EVENT-CUSTOMFIELD TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'eventTab', 'event-custom', JText::_('COM_JEM_CUSTOMFIELDS', true)); ?>


				<?php foreach($this->form->getFieldset('custom') as $field): ?>

				<div class="control-group">
					<div class="control-label">
				<?php echo $field->label; ?>
				</div>
					<div class="controls">
				<?php echo $field->input; ?>
				</div>
				</div>
				<?php endforeach; ?>

			<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!--   EVENT-REGISTER TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'eventTab', 'event-register', JText::_('COM_JEM_REGISTRATION', true)); ?>



				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('registra'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('registra'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('unregistra'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('unregistra'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('maxplaces'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('maxplaces'); ?>
				</div>
				</div>


				<div class="control-group">
					<div class="control-label">
				<label><?php echo JText::_ ( 'COM_JEM_BOOKED_PLACES' ) . ':';?></label>
				</div>
					<div class="controls">
				<input id="event-booked" class="readonly" type="text"  value="<?php echo $this->item->booked; ?>" />
				</div>
				</div>


				<?php if ($this->item->maxplaces): ?>

				<div class="control-group">
					<div class="control-label">
				<label><?php echo JText::_ ( 'COM_JEM_AVAILABLE_PLACES' ) . ':';?></label>
				</div>
					<div class="controls">
				<input id="event-available" class="readonly" type="text"  value="<?php echo ($this->item->maxplaces-$this->item->booked); ?>" />
				</div>
				</div>
				<?php
				endif;
				?>


				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('waitinglist'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('waitinglist'); ?>
				</div>
				</div>

		<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!-- EVENT-IMAGE TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'eventTab', 'event-image', JText::_('COM_JEM_IMAGE', true)); ?>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('datimage'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('datimage'); ?>
				</div>
				</div>

		<?php echo JHtml::_('bootstrap.endTab'); ?>




		<!-- EVENT-RECURRENCE TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'eventTab', 'event-recurrence', JText::_('COM_JEM_RECURRING_EVENTS', true)); ?>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('recurrence_type'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('recurrence_type'); ?>
				</div>
				</div>



				<li id="recurrence_output">
				<label></label>
				</li>


				<li id="counter_row" style="display: none;">
					<div class="control-group">
					<div class="control-label">
					<?php echo $this->form->getLabel('recurrence_limit_date'); ?>
					</div>
					<div class="controls">
					<?php echo $this->form->getInput('recurrence_limit_date'); ?>
					</div>
					</div>
				</li>



				<input type="hidden" name="recurrence_number" id="recurrence_number" value="<?php echo $this->item->recurrence_number;?>" />
				<input type="hidden" name="recurrence_byday" id="recurrence_byday" value="<?php echo $this->item->recurrence_byday;?>" />

			<script
			type="text/javascript">
			<!--
				var $select_output = new Array();
				$select_output[1] = "<?php
				echo JText::_ ( 'COM_JEM_OUTPUT_DAY' );
				?>";
				$select_output[2] = "<?php
				echo JText::_ ( 'COM_JEM_OUTPUT_WEEK' );
				?>";
				$select_output[3] = "<?php
				echo JText::_ ( 'COM_JEM_OUTPUT_MONTH' );
				?>";
				$select_output[4] = "<?php
				echo JText::_ ( 'COM_JEM_OUTPUT_WEEKDAY' );
				?>";

				var $weekday = new Array();
				$weekday[0] = new Array("MO", "<?php echo JText::_ ( 'COM_JEM_MONDAY' ); ?>");
				$weekday[1] = new Array("TU", "<?php echo JText::_ ( 'COM_JEM_TUESDAY' ); ?>");
				$weekday[2] = new Array("WE", "<?php echo JText::_ ( 'COM_JEM_WEDNESDAY' ); ?>");
				$weekday[3] = new Array("TH", "<?php echo JText::_ ( 'COM_JEM_THURSDAY' ); ?>");
				$weekday[4] = new Array("FR", "<?php echo JText::_ ( 'COM_JEM_FRIDAY' ); ?>");
				$weekday[5] = new Array("SA", "<?php echo JText::_ ( 'COM_JEM_SATURDAY' ); ?>");
				$weekday[6] = new Array("SU", "<?php echo JText::_ ( 'COM_JEM_SUNDAY' ); ?>");

				var $before_last = "<?php
				echo JText::_ ( 'COM_JEM_BEFORE_LAST' );
				?>";
				var $last = "<?php
				echo JText::_ ( 'COM_JEM_LAST' );
				?>";
				start_recurrencescript();
			-->
			</script>
		<?php echo JHtml::_('bootstrap.endTab'); ?>




		<!-- EVENT-META TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'eventTab', 'event-meta', JText::_('COM_JEM_METADATA_INFORMATION', true)); ?>



		<fieldset class="panelform">
					<input class="btn" type="button" onclick="insert_keyword('[title]')" value="<?php echo JText::_ ( 'COM_JEM_EVENT_TITLE' );	?>" />
					<input class="btn" type="button" onclick="insert_keyword('[a_name]')" value="<?php	echo JText::_ ( 'COM_JEM_VENUE' );?>" />
					<input class="btn" type="button" onclick="insert_keyword('[categories]')" value="<?php	echo JText::_ ( 'COM_JEM_CATEGORIES' );?>" />
					<input class="btn" type="button" onclick="insert_keyword('[dates]')" value="<?php echo JText::_ ( 'COM_JEM_DATE' );?>" />

					<p>
						<input class="btn" type="button" onclick="insert_keyword('[times]')" value="<?php echo JText::_ ( 'COM_JEM_EVENT_TIME' );?>" />
						<input class="btn" type="button" onclick="insert_keyword('[enddates]')" value="<?php echo JText::_ ( 'COM_JEM_ENDDATE' );?>" />
						<input class="btn" type="button" onclick="insert_keyword('[endtimes]')" value="<?php echo JText::_ ( 'COM_JEM_END_TIME' );?>" />
					</p>
					<br />

			<br />
			<div class="control-group">
					<div class="control-label">
						<label for="meta_keywords">
						<?php echo JText::_ ( 'COM_JEM_META_KEYWORDS' ) . ':';?>
					</label>
					</div>
					<div class="controls">
						<?php
						if (! empty ( $this->item->meta_keywords )) {
							$meta_keywords = $this->item->meta_keywords;
						} else {
							$meta_keywords = $this->jemsettings->meta_keywords;
						}
						?>
					<textarea class="inputbox" name="meta_keywords" id="meta_keywords" rows="5" cols="40" maxlength="150" onfocus="get_inputbox('meta_keywords')" onblur="change_metatags()"><?php echo $meta_keywords; ?></textarea>
					</div>
					</div>


					<div class="control-group">
					<div class="control-label">
			<label for="meta_description">
						<?php echo JText::_ ( 'COM_JEM_META_DESCRIPTION' ) . ':';?>
					</label>
					</div>
					<div class="controls">
					<?php
					if (! empty ( $this->item->meta_description )) {
						$meta_description = $this->item->meta_description;
					} else {
						$meta_description = $this->jemsettings->meta_description;
					}
					?>
					<textarea class="inputbox" name="meta_description" id="meta_description" rows="5" cols="40" maxlength="200"	onfocus="get_inputbox('meta_description')" onblur="change_metatags()"><?php echo $meta_description;?></textarea>
					</div>
					</div>
		</fieldset>

		<script type="text/javascript">
		<!--
			starter("<?php
			echo JText::_ ( 'COM_JEM_META_ERROR' );
			?>");	// window.onload is already in use, call the function manualy instead
		-->
		</script>




	<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	</fieldset>

<input type="hidden" name="task" value="" />
<input type="hidden" name="author_ip" value="<?php echo $this->item->author_ip; ?>" />



				<?php echo JHtml::_( 'form.token' ); ?>


		<div class="clr"></div>
</div>
</form>

