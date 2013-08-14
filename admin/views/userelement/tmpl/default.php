<?php
/**
 * @version 1.9.1
 * @package JEM
 * @copyright (C) 2013-2013 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

JHTML::_('behavior.tooltip');
?>

<form action="index.php?option=com_jem&controller=attendees&tmpl=component" method="post" id="adminForm" name="adminForm">

<table class="adminform">
	<tr>
		<td width="100%">
			<input type="text" name="search" id="search" value="<?php echo $this->lists['search']; ?>" class="text_area" onChange="document.adminForm.submit();" />
			<button onclick="this.form.submit();"><?php echo JText::_('COM_JEM_GO'); ?></button>
			<button onclick="this.form.getElementById('search').value='';this.form.submit();"><?php echo JText::_('COM_JEM_RESET'); ?></button>
		</td>
	</tr>
</table>

<table class="table table-striped" id="articleList">
	<thead>
		<tr>
			<th class="center" width="5"><?php echo JText::_( 'COM_JEM_NUM' ); ?></th>
			<th class="title"><?php echo JHTML::_('grid.sort', 'Name', 'u.name', $this->lists['order_Dir'], $this->lists['order'], 'selectuser' ); ?></th>
			<th class="title"><?php echo JHTML::_('grid.sort', 'Username', 'u.username', $this->lists['order_Dir'], $this->lists['order'], 'selectuser' ); ?></th>
			<th class="title"><?php echo JHTML::_('grid.sort', 'Email', 'u.email', $this->lists['order_Dir'], $this->lists['order'], 'selectuser' ); ?></th>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<td colspan="4">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>

	<tbody>
		<?php
			$k = 0;
			for ($i=0, $n=count( $this->rows ); $i < $n; $i++) {
				$row = $this->rows[$i];
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td class="center"><?php echo $this->pagination->getRowOffset( $i ); ?></td>
			<td>
				<span class="editlinktip hasTip" title="<?php echo JText::_('COM_JEM_SELECT');?>::<?php echo $row->name; ?>">
				<a style="cursor:pointer" onclick="window.parent.elSelectUser('<?php echo $row->id; ?>', '<?php echo str_replace( array("'", "\""), array("\\'", ""), $row->username ); ?>');">
					<?php echo htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8'); ?>
				</a></span>
			</td>
			<td><?php echo $row->username; ?></td>
			<td><?php echo $row->email; ?></td>
		</tr>
			<?php $k = 1 - $k; } ?>
	</tbody>

</table>

<p class="copyright">
	<?php echo JEMAdmin::footer( ); ?>
</p>

<input type="hidden" name="task" value="selectuser" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
</form>