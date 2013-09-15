<?php
/**
 * @version 1.9.1
 * @package JEM
 * @copyright (C) 2013-2013 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');

$function = JRequest::getCmd('function', 'jSelectVenue');




?>

<form action="index.php?option=com_jem&amp;view=venueelement&amp;tmpl=component" method="post" name="adminForm" id="adminForm">

	<div id="filter-bar" class="btn-toolbar">
		<div class="filter-search btn-group pull-left">
			<?php echo JText::_( 'COM_JEM_SEARCH' ).' '.$this->lists['filter']; ?>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->lists['search']; ?>" class="text_area" onChange="document.adminForm.submit();" />
		</div>
	</div>

	<div class="btn-group pull-left">
			<button type="submit" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
			<button type="button" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
			<button type="button" class="btn" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('', '<?php echo JText::_('COM_JEM_SELECTVENUE') ?>');"><?php echo JText::_('COM_JEM_NOVENUE')?></button>
	</div>

	<div class="btn-group pull-right hidden-phone">
			<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
			<?php echo $this->pagination->getLimitBox(); ?>
	</div>


	<div class="btn-group pull-right">
			<?php echo $this->lists['state']; ?>
	</div>


<div class="clearfix"> </div>

<table class="table table-striped" id="articleList">
	<thead>
		<tr>
			<th class="center" width="7"><?php echo JText::_( 'COM_JEM_NUM' ); ?></th>
			<th align="left" class="title"><?php echo JHTML::_('grid.sort', 'COM_JEM_VENUE', 'l.venue', $this->lists['order_Dir'], $this->lists['order'], 'venueelement' ); ?></th>
			<th align="left" class="title"><?php echo JHTML::_('grid.sort', 'COM_JEM_CITY', 'l.city', $this->lists['order_Dir'], $this->lists['order'], 'venueelement' ); ?></th>
			<th align="left" class="title"><?php echo JHTML::_('grid.sort', 'COM_JEM_STATE', 'l.state', $this->lists['order_Dir'], $this->lists['order']); ?></th>
			<th align="left" class="title center"><?php echo JText::_( 'COM_JEM_COUNTRY' ); ?></th>
			<th class="title center"><?php echo JText::_( 'COM_JEM_PUBLISHED' ); ?></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<td colspan="6">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>

	<tbody>
		<?php foreach ($this->rows as $i => $row) : ?>
		 <tr class="row<?php echo $i % 2; ?>">
			<td class="center"><?php echo $this->pagination->getRowOffset( $i ); ?></td>
			<td align="left">
				 <a class="pointer" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('<?php echo $row->id; ?>', '<?php echo $this->escape(addslashes($row->venue)); ?>');"><?php echo $this->escape($row->venue); ?></a>
            </td>
			<td align="left"><?php echo htmlspecialchars($row->city, ENT_QUOTES, 'UTF-8'); ?></td>
			<td align="left"><?php echo htmlspecialchars($row->state, ENT_QUOTES, 'UTF-8'); ?></td>
			<td class="center"><?php echo htmlspecialchars($row->country, ENT_QUOTES, 'UTF-8'); ?></td>
			<td class="center">
				<?php $img = $row->published ? 'tick.png' : 'publish_x.png'; ?>
				<img src="../media/com_jem/images/<?php echo $img;?>" width="16" height="16" border="0" alt="" />
			</td>
		</tr>

		<?php endforeach; ?>

	</tbody>

</table>

<p class="copyright">
	<?php echo JEMAdmin::footer( ); ?>
</p>

<input type="hidden" name="task" value="" />
<input type="hidden" name="function" value="<?php echo $this->escape($function); ?>" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
</form>