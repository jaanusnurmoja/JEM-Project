<?php
/**
 * @version 1.9.1
 * @package JEM
 * @copyright (C) 2013-2013 joomlaeventmanager.net
 * @copyright (C) 2005-2009 Christoph Lukes
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;
JHTML::_('behavior.formvalidation');

$options = array(
		'onActive' => 'function(title, description){
		description.setStyle("display", "block");
		title.addClass("open").removeClass("closed");
}',
		'onBackground' => 'function(title, description){
		description.setStyle("display", "none");
		title.addClass("closed").removeClass("open");
}',
		'startOffset' => 0,  // 0 starts on the first tab, 1 starts the second, etc...
		'useCookie' => false, // this must not be a string. Don't use quotes.
);



?>

<script type="text/javascript">
     Joomla.submitbutton = function(task)
	{
    	 var form = document.adminForm;

 		if (task == 'category.cancel') {
 			submitform( task );
 		} else if (form.catname.value == ""){
 			alert( "<?php echo JText::_ ( 'COM_JEM_ADD_NAME_CATEGORY' ); ?>" );
 			form.catname.focus();
   		} else {
   			<?php echo $this->editor->save( 'catdescription' ); ?>
   			submitform( task );
   		}

	}
</script>


<form action="<?php echo JRoute::_('index.php?option=com_jem&view=category'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate" enctype="multipart/form-data">


<!-- Begin Category -->
	<div class="span8 form-horizontal">



	<fieldset>
	<?php echo JHtml::_('bootstrap.startTabSet', 'categoryTab', array('active' => 'category-details')); ?>


		<!--  CATEGORY-DETAILS TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'categoryTab', 'category-details', JText::_('COM_JEM_CATEGORY_INFO_TAB', true)); ?>

				<fieldset class="adminform">

						<div class="control-group">
							<div class="control-label">
						<label for="catname"> <?php echo JText::_( 'COM_JEM_CATEGORY' ).':'; ?></label>
						</div>
							<div class="controls">
						<input name="catname" type="text" class="inputbox required" id="catname"
							value="<?php echo $this->row->catname; ?>" size="50"
							maxlength="100" />
						</div>
						</div>


						<div class="control-group">
							<div class="control-label">
						<label for="published"> <?php echo JText::_( 'COM_JEM_PUBLISHED' ).':'; ?></label>
						</div>
							<div class="controls">

						<?php
						$html = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $this->row->published );
						echo $html;
						?>
						</div>
						</div>


						<div class="control-group">
							<div class="control-label">
					<label for="alias"> <?php echo JText::_( 'COM_JEM_ALIAS' ).':'; ?></label>
						</div>
							<div class="controls">
						<input class="inputbox" type="text" name="alias" id="alias"
							size="50" maxlength="100"
							value="<?php echo $this->row->alias; ?>" />
						</div>
						</div>


						<div class="control-group">
							<div class="control-label">
						<?php echo JText::_( 'COM_JEM_PARENT_CATEGORY' ).':'; ?>
						</div>
							<div class="controls">
						<?php echo $this->Lists['parent_id']; ?>
						</div>
						</div>

						<?php
						// parameters : areaname, content, hidden field, width, height, rows, cols
						echo $this->editor->display( 'catdescription',  $this->row->catdescription, '100%;', '350', '75', '20', array('pagebreak', 'readmore') ) ;
						?>

			</fieldset>
		<?php echo JHtml::_('bootstrap.endTab'); ?>


		<!--  CATEGORY-ATTACHMENTS TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'categoryTab', 'category-attachments', JText::_('COM_JEM_CATEGORY_ATTACHMENTS_TAB', true)); ?>
				<?php echo $this->loadTemplate('attachments'); ?>
		<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!--  CATEGORY-ACCESS TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'categoryTab', 'category-access', JText::_('COM_JEM_ACCESS', true)); ?>

						<div class="control-group">
							<div class="control-label">
						<label for="access"> <?php echo JText::_( 'COM_JEM_ACCESS' ).':'; ?></label>
						</div>
							<div class="controls">
						<?php echo $this->Lists['access']; ?>
						</div>
						</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!--  CATEGORY-GROUP TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'categoryTab', 'category-group', JText::_('COM_JEM_GROUP', true)); ?>
						<div class="control-group">
							<div class="control-label">

			<label for="groups"> <?php echo JText::_( 'COM_JEM_GROUP' ).':'; ?></label>
						</div>
							<div class="controls">
						<?php echo $this->Lists['groups']; ?>
						</div>
						</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!--  CATEGORY-IMAGE TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'categoryTab', 'category-image', JText::_('COM_JEM_IMAGE', true)); ?>
						<div class="control-group">
							<div class="control-label">

			<label for="catimage"> <?php echo JText::_( 'COM_JEM_CHOOSE_IMAGE' ).':'; ?></label>
						</div>
							<div class="controls">
						<?php echo $this->imageselect; ?>
						<br>
						<img src="../media/system/images/blank.png" name="imagelib"
							id="imagelib" width="80" height="80" border="2" alt="Preview" />
							<script type="text/javascript">
						if (document.forms[0].a_imagename.value!=''){
							var imname = document.forms[0].a_imagename.value;
							jsimg='../images/jem/categories/' + imname;
							document.getElementById('imagelib').src= jsimg;
						}
						</script>
						</div>
						</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>




		<!--  CATEGORY-COLOR TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'categoryTab', 'category-color', JText::_('COM_JEM_CHOOSE_COLOR', true)); ?>
						<div class="control-group">
							<div class="control-label">
					<label for="color"> <?php echo JText::_( 'COM_JEM_CHOOSE_COLOR' ).':'; ?></label>
						</div>
							<div class="controls">

					<input class="inputbox" type="text" style="background: <?php echo ( $this->row->color == '' )?"transparent":$this->row->color; ?>;"
                   name="color" id="color" size="10" maxlength="20" value="<?php echo $this->row->color; ?>" />

					<input type="button" class="button"
							value="<?php echo JText::_( 'COM_JEM_PICK' ); ?>"
							onclick="openPicker('color', -200, 20);" />

						</div>
						</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!--  CATEGORY-META TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'categoryTab', 'category-meta', JText::_('COM_JEM_METADATA_INFORMATION', true)); ?>

					<div class="control-group">
							<div class="control-label">
						<label for="metadesc"> <?php echo JText::_( 'COM_JEM_META_DESCRIPTION' ); ?>:</label>
						</div>
							<div class="controls">

						<br />
						<textarea class="inputbox" cols="40" rows="5"
								name="meta_description" id="metadesc" style="width: 300px;">
								<?php echo str_replace('&','&amp;',$this->row->meta_description); ?>
						</textarea>

						</div>
						</div>


						<div class="control-group">
							<div class="control-label">
						<label for="metakey"> <?php echo JText::_( 'COM_JEM_META_KEYWORDS' ); ?>:</label>
						</div>
							<div class="controls">
						<br />

						<textarea class="inputbox" cols="40" rows="5"
								name="meta_keywords" id="metakey" style="width: 300px;">
								<?php echo str_replace('&','&amp;',$this->row->meta_keywords); ?>
						</textarea>

						<br />

						<input type="button" class="button"
							value="<?php echo JText::_( 'COM_JEM_ADD_CATNAME' ); ?>"
							onclick="f=document.adminForm;f.metakey.value=f.catname.value;" />

						</div>
						</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.endTabSet'); ?>




	<?php echo JHTML::_( 'form.token' ); ?>
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<input type="hidden" name="task" value="" />
</form>

<p class="copyright">
	<?php echo JEMAdmin::footer( ); ?>
</p>

<?php
//keep session alive while editing
JHTML::_('behavior.keepalive');
?>