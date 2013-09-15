<?php
/**
 * @version 1.9.1
 * @package JEM
 * @copyright (C) 2013-2013 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$canOrder	= $user->authorise('core.edit.state', 'com_jem.category');
$saveOrder	= $listOrder=='ordering';

$params		= (isset($this->state->params)) ? $this->state->params : new JObject();

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');

?>


<form action="<?php echo JRoute::_('index.php?option=com_jem&view=groups'); ?>" method="post" name="adminForm" id="adminForm">


<!--  SIDEBAR -->

<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>


<!-- FILTER -->

<div id="filter-bar" class="btn-toolbar">
			<div class="filter-search btn-group pull-left">
				<label for="filter_search" class="element-invisible"><?php echo JText::_('COM_JEM_SEARCH');?></label>
				<input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_( 'COM_JEM_SEARCH' );?>" value="<?php echo $this->escape($this->state->get('filter_search')); ?>" class="hasTooltip" title="<?php echo JHtml::tooltipText('COM_JEM_SEARCH'); ?>" />
			</div>

			<div class="btn-group pull-left">
				<button type="submit" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
				<button type="button" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
			</div>

			<div class="btn-group pull-right hidden-phone">
				<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
				<?php echo $this->pagination->getLimitBox(); ?>
			</div>
</div>

<div class="clearfix"> </div>



<!-- TABLE -->

<table class="table table-striped" id="articleList">
		<thead>
			<tr>
			<th width="5" class="center"><?php echo JText::_( 'COM_JEM_NUM' ); ?></th>
			<th width="5" class="center"><input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" /></th>
			<th width="30%" class="title"><?php echo JHtml::_('grid.sort', 'COM_JEM_GROUP_NAME', 'name', $listDirn, $listOrder ); ?></th>
			<th><?php echo JText::_( 'COM_JEM_DESCRIPTION' ); ?></th>
			</tr>
		</thead>

		<tfoot>
		<tr>
			<td colspan="20">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>


		<tbody id="seach_in_here">
			<?php
			foreach ($this->items as $i => $row) :

				$ordering	= ($listOrder == 'ordering');
				/*	$row->cat_link = JRoute::_('index.php?option=com_categories&extension=com_jem&task=edit&type=other&cid[]='. $row->catid);*/
				$canCreate	= $user->authorise('core.create');
				$canEdit	= $user->authorise('core.edit');
				$canCheckin	= $user->authorise('core.manage',		'com_checkin') || $row->checked_out == $userId || $row->checked_out == 0;
				$canChange	= $user->authorise('core.edit.state') && $canCheckin;

				$link 		= 'index.php?option=com_jem&amp;task=group.edit&amp;id='.$row->id;


			?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center"><?php echo $this->pagination->getRowOffset( $i ); ?></td>
				<td class="center"><?php echo JHtml::_('grid.id', $i, $row->id); ?></td>
				<td>
					<?php if ($row->checked_out) : ?>
						<?php echo JHtml::_('jgrid.checkedout', $i, '', $row->checked_out_time, 'groups.', $canCheckin); ?>
					<?php endif; ?>
					<?php if ($canEdit) : ?>
						<a href="<?php echo $link; ?>">
							<?php echo $this->escape($row->name); ?></a>
					<?php else : ?>
							<?php echo $this->escape($row->name); ?>
					<?php endif; ?>
				</td>
				<td>
				<?php

				$desc = $row->description;
				$descoutput = strip_tags($desc);
				echo $this->escape($descoutput);

				?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>



	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo JHtml::_('form.token'); ?>
</form>