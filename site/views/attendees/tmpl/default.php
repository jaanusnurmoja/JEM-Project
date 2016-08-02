<?php
/**
 * @version 2.1.7
 * @package JEM
 * @copyright (C) 2013-2016 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');

JHtml::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.'/helpers/html');

$colspan = ($this->event->waitinglist ? 10 : 9);

$detaillink = JRoute::_(JemHelperRoute::getEventRoute($this->event->id.':'.$this->event->alias));

$namefield = $this->settings->get('global_regname', '1') ? 'name' : 'username';
?>
<script type="text/javascript">
	function tableOrdering(order, dir, view)
	{
		var form = document.getElementById("adminForm");

		form.filter_order.value 	= order;
		form.filter_order_Dir.value	= dir;
		form.submit(view);
	}
</script>

<div id="jem" class="jem_attendees<?php echo $this->pageclass_sfx;?>">
	<div class="buttons">
		<?php
		$permissions = new stdClass();
		$btn_params = array('print_link' => $this->print_link, 'id' => $this->event->id);
		echo JemOutput::createButtonBar($this->getName(), $permissions, $btn_params);
		?>
	</div>

	<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<h1 class="componentheading">
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>

	<div class="clr"></div>

	<?php if ($this->params->get('showintrotext')) : ?>
	<div class="description no_space floattext">
		<?php echo $this->params->get('introtext'); ?>
	</div>
	<?php endif; ?>

	<h2><?php echo $this->escape($this->event->title); ?></h2>

	<form action="<?php echo htmlspecialchars($this->action); ?>"  method="post" name="adminForm" id="adminForm">
		<table class="adminlist">
			<tr>
				<td width="80%">
					<b><?php echo JText::_('COM_JEM_TITLE').':'; ?></b>&nbsp;
					<a href="<?php echo $detaillink ; ?>"><?php echo $this->escape($this->event->title); ?></a>
					<br />
					<b><?php echo JText::_('COM_JEM_DATE').':'; ?></b>&nbsp;<?php
						echo JemOutput::formatLongDateTime($this->event->dates, $this->event->times, $this->event->enddates, $this->event->endtimes,
						                                   $this->settings->get('global_show_timedetails', 1)); ?>
				</td>
			</tr>
		</table>
		<br />

		<div id="jem_filter" class="floattext">
			<div class="jem_fleft">
				<?php echo JText::_('COM_JEM_SEARCH').' '.$this->lists['filter']; ?>
				<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->lists['search']; ?>" class="inputbox" onChange="document.adminForm.submit();" />
				<button class="buttonfilter" type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
				<button class="buttonfilter" type="button" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
				&nbsp;
			</div>
			<div class="jem_fleft" style="white-space:nowrap;">
				<?php echo JText::_('COM_JEM_STATUS').' '.$this->lists['status']; ?>
			</div>
			<div class="jem_fright">
				<?php
				echo '<label for="limit">'.JText::_('COM_JEM_DISPLAY_NUM').'</label>&nbsp;';
				echo $this->pagination->getLimitBox();
				?>
			</div>
		</div>

		<table class="eventtable" style="width:100%" id="articleList">
			<thead>
				<tr>
					<th width="1%" class="center"><?php echo JText::_('COM_JEM_NUM'); ?></th>
					<!--th width="1%" class="center"><input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" /></th-->
					<th class="title"><?php echo JHtml::_('grid.sort', 'COM_JEM_USERNAME', 'u.'.$namefield, $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
					<?php if ($this->enableemailaddress == 1) {?>
					<th class="title"><?php echo JText::_('COM_JEM_EMAIL'); ?></th>
					<?php } ?>
					<th class="title"><?php echo JHtml::_('grid.sort', 'COM_JEM_REGDATE', 'r.uregdate', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
					<th class="center"><?php echo JHtml::_('grid.sort', 'COM_JEM_STATUS', 'r.status', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
					<?php if (!empty($this->jemsettings->regallowcomments)) : ?>
					<th class="title"><?php echo JText::_('COM_JEM_COMMENT'); ?></th>
					<?php endif;?>
					<th class="center"><?php echo JText::_('COM_JEM_REMOVE_USER'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($this->rows as $i => $row) : ?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center"><?php echo $this->pagination->getRowOffset($i); ?></td>
					<!--td class="center"><?php echo JHtml::_('grid.id', $i, $row->id); ?></td-->
					<td><?php echo $row->$namefield; ?></td>
					<?php if ($this->enableemailaddress == 1) {?>
					<td><a href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></a></td>
					<?php } ?>
					<td><?php if (!empty($row->uregdate)) { echo JHtml::_('date', $row->uregdate, JText::_('DATE_FORMAT_LC2')); } ?></td>
					<td class="center">
						<?php
						$status = (int)$row->status;
						if ($status === 1 && $row->waiting == 1) { $status = 2; }
						echo JHtml::_('jemhtml.toggleAttendanceStatus', $status, $row->id, true);
						?>
					</td>
					<?php if (!empty($this->jemsettings->regallowcomments)) : ?>
					<?php $cmnt = (strlen($row->comment) > 16) ? (substr($row->comment, 0, 14).'&hellip;') : $row->comment; ?>
					<td><?php if (!empty($cmnt)) { echo JHtml::_('tooltip', $row->comment, null, null, $cmnt, null, null); } ?></td>
					<?php endif;?>
					<td class="center"><a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i;?>','attendees.attendeeremove')"><?php echo
						JHtml::_('image','com_jem/publish_r.png', JText::_('COM_JEM_ATTENDEES_DELETE'), array('title' => JText::_('COM_JEM_ATTENDEES_DELETE'), 'class' => (version_compare(JVERSION, '3.3', 'lt')) ? 'hasTip' : 'hasTooltip'), true); ?></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>

		<?php echo JHtml::_('form.token'); ?>
		<input type="hidden" name="option" value="com_jem" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="view" value="attendees" />
		<input type="hidden" name="id" value="<?php echo $this->event->id; ?>" />
		<input type="hidden" name="Itemid" value="<?php echo $this->item->id;?>" />
		<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
		<input type="hidden" name="enableemailaddress" value="<?php echo $this->enableemailaddress; ?>" />
	</form>

	<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
	</div>

	<div class="copyright">
	<?php echo JemOutput::footer(); ?>
	</div>
</div>
