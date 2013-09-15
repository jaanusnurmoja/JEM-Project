<?php
/**
 * @version 1.9.1
 * @package JEM
 * @copyright (C) 2013-2013 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

//JHtml::_('behavior.multiselect');
//JHtml::_('dropdown.init');
JHtml::_('bootstrap.tooltip');
JHtml::_('formbehavior.chosen', 'select');

$function = JRequest::getCmd('function', 'jSelectContact');

?>

<form action="index.php?option=com_jem&amp;view=contactelement&amp;tmpl=component" method="post" name="adminForm" id="adminForm">


<fieldset class="filter">

	<div id="filter-bar" class="btn-toolbar">
		<div class="filter-search btn-group pull-left">
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->lists['search']; ?>" onChange="document.adminForm.submit();" />
		</div>

	<div class="btn-group pull-left">
			<button type="submit" class="btn" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
			<button type="button" class="btn" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
			<button type="button" class="btn" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('', '<?php echo JText::_('COM_JEM_SELECTCONTACT') ?>');"><?php echo JText::_('COM_JEM_NOCONTACT')?></button>
	</div>

	<div class="btn-group pull-right hidden-phone">
			<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
			<?php echo $this->pagination->getLimitBox(); ?>
	</div>


	<div class="btn-group pull-right">
			<br>
			<?php
			echo $this->lists['filter'];
			?>
			<?php echo $this->lists['state']; ?>
	</div>

	</div>
</fieldset>




<table class="table table-striped table-condensed">
	<thead>
		<tr>
			<th width="7" class="center"><?php echo JText::_( 'COM_JEM_NUM' ); ?></th>
			<th align="left" class="title"><?php echo JHtml::_('grid.sort', 'COM_JEM_NAME', 'con.name', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
			<th align="left" class="title"><?php echo JHtml::_('grid.sort', 'COM_JEM_ADDRESS', 'con.address', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
			<th align="left" class="title"><?php echo JHtml::_('grid.sort', 'COM_JEM_CITY', 'con.suburb', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
			<th align="left" class="title"><?php echo JHtml::_('grid.sort', 'COM_JEM_STATE', 'con.state', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
			<th align="left" class="title"><?php echo JText::_( 'COM_JEM_EMAIL' ); ?></th>
			<th align="left" class="title"><?php echo JText::_( 'COM_JEM_TELEPHONE' ); ?></th>
			<th class="title center"><?php echo JText::_( 'COM_JEM_PUBLISHED' ); ?></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<td colspan="12">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>

	<tbody>
		<?php foreach ($this->rows as $i => $row) : ?>
		 <tr class="row<?php echo $i % 2; ?>">
			<td class="center"><?php echo $this->pagination->getRowOffset( $i ); ?></td>
			<td align="left">
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'COM_JEM_SELECT' );?>::<?php echo $row->name; ?>">
				<a style="cursor:pointer;" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('<?php echo $row->id; ?>', '<?php echo $this->escape(addslashes($row->name)); ?>');"><?php echo $this->escape($row->name); ?></a>
				</span>
			</td>
			<td align="left"><?php echo htmlspecialchars($row->address, ENT_QUOTES, 'UTF-8'); ?></td>
			<td align="left"><?php echo htmlspecialchars($row->suburb, ENT_QUOTES, 'UTF-8'); ?></td>
			<td align="left"><?php echo htmlspecialchars($row->state, ENT_QUOTES, 'UTF-8'); ?></td>
			<td align="left"><?php echo htmlspecialchars($row->email_to, ENT_QUOTES, 'UTF-8'); ?></td>
			<td align="left"><?php echo htmlspecialchars($row->telephone, ENT_QUOTES, 'UTF-8'); ?></td>
			<td class="center">
				<?php $img = $row->published ? 'tick.png' : 'publish_x.png'; ?>
				<img src="../media/com_jem/images/<?php echo $img;?>" width="16" height="16" border="0" alt="" />
			</td>
		</tr>

		<?php endforeach; ?>

	</tbody>

</table>



<div>
<input type="hidden" name="task" value="" />
<input type="hidden" name="function" value="<?php echo $this->escape($function); ?>" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<?php echo JHtml::_('form.token'); ?>
</div>

</form>