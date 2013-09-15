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
	Joomla.submitbutton = function(task)
	{
		if (task == 'venue.cancel' || document.formvalidator.isValid(document.id('venue-form'))) {
			Joomla.submitform(task, document.getElementById('venue-form'));
		}
	}
</script>


<script type="text/javascript">
	window.addEvent('domready', function(){
		var form = document.getElementById('venue-form');
		var map = $('jform_map');
		setAttribute();
		test();

		if(map && map.checked == true) {
			addrequired();
		}

		if(map && map.checked == false) {
			removerequired();
		}

	});


	function setAttribute()
	{

		var attribute = document.createAttribute("geo-data");
	    attribute.nodeValue = "postal_code"
	    document.getElementById("jform_postalCode").setAttributeNode(attribute);

	    var attribute = document.createAttribute("geo-data");
	    attribute.nodeValue = "locality"
	    document.getElementById("jform_city").setAttributeNode(attribute);

	    var attribute = document.createAttribute("geo-data");
	    attribute.nodeValue = "administrative_area_level_1"
	    document.getElementById("jform_state").setAttributeNode(attribute);

	    var attribute = document.createAttribute("geo-data");
	    attribute.nodeValue = "street_address"
	    document.getElementById("jform_street").setAttributeNode(attribute);

	    var attribute = document.createAttribute("geo-data");
	    attribute.nodeValue = "lat"
	    document.getElementById("jform_latitude").setAttributeNode(attribute);

	    var attribute = document.createAttribute("geo-data");
	    attribute.nodeValue = "lng"
	    document.getElementById("jform_longitude").setAttributeNode(attribute);



	}




function meta()
{
	f=document.getElementById('venue-form');
	f.jform_meta_keywords.value=f.jform_venue.value+', '+f.jform_city.value+f.jform_meta_keywords.value;
}


function test()
{
	 var handler = function(e) {

		 var form = document.getElementById('venue-form');
			var map = $('jform_map');

			var streetcheck = $(form.jform_street).hasClass('required');

		 if(map && map.checked == true) {
			 var lat = $('jform_latitude');
				var lon = $('jform_longitude');
				if(lat.value == ('' || 0.000000) || lon.value == ('' || 0.000000)) {
						if(!streetcheck) {
							addrequired();
						}

			} else {
				if(lat.value != ('' || 0.000000) && lon.value != ('' || 0.000000) ) {

				removerequired();
					}
				}
			}



			if(map && map.checked == false) {
				removerequired();
			}
	    };
	    document.getElementById('jform_map').onchange = handler;
	    document.getElementById('jform_map').onkeyup = handler;
	    document.getElementById('jform_latitude').onchange = handler;
	    document.getElementById('jform_latitude').onkeyup = handler;
	    document.getElementById('jform_longitude').onchange = handler;
	    document.getElementById('jform_longitude').onkeyup = handler;
}

	function addrequired() {

		var form = document.getElementById('venue-form');

		$(form.jform_street).addClass('required');
		$(form.jform_postalCode).addClass('required');
		$(form.jform_city).addClass('required');
		$(form.jform_country).addClass('required');
	}

	function removerequired() {

		var form = document.getElementById('venue-form');

		$(form.jform_street).removeClass('required');
		$(form.jform_postalCode).removeClass('required');
		$(form.jform_city).removeClass('required');
		$(form.jform_country).removeClass('required');
	}

	</script>


    <script>
      $(function(){
    	  $("#geocomplete").geocomplete({
          map: ".map_canvas",
          /* location: "default address", */
          details: "form ",
          detailsAttribute: "geo-data",
          types: ['establishment', 'geocode'],
          markerOptions: {
            draggable: true
          }
        });

    	  $("#geocomplete").bind("geocode:dragged", function(event, latLng){
    		  $("input[id=jform_latitude]").val(latLng.lat());
    		  $("input[id=jform_longitude]").val(latLng.lng());
    		  $("#geocomplete").geocomplete("find", latLng.toString());
    		 /* option to show the reset-link */
    		 /* jQuery("#reset").show();*/
        });



    	  $("#geocomplete").bind("geocode:result", function(event, result){
    	  		var country = document.getElementById("country").value;
    	  		document.getElementById("jform_country").value = country;
        });


        /* option to attach a reset function to the reset-link
    	  jQuery("#reset").click(function(){
   		  jQuery("#geocomplete").geocomplete("resetMarker");
   		  jQuery("#reset").hide();
          return false;
        });
     	*/

    	  $("#find").click(function(){
    		  $("#geocomplete").trigger("geocode");
        }).click();
      });
    </script>

<form
	action="<?php echo JRoute::_('index.php?option=com_jem&layout=edit&id='.(int) $this->item->id); ?>"
	class="form-validate" method="post" name="adminForm" id="venue-form" enctype="multipart/form-data">

	<!-- Begin Venue -->
	<div class="span8 form-horizontal">

	<fieldset>
	<?php echo JHtml::_('bootstrap.startTabSet', 'venueTab', array('active' => 'venue-details')); ?>


		<!--  VENUE-DETAILS TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'venueTab', 'venue-details', JText::_('COM_JEM_VENUE_INFO_TAB', true)); ?>

		<fieldset class="adminform">

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('venue');?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('venue'); ?>
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
				<?php echo $this->form->getLabel('street'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('street'); ?>
				</div>
				</div>



				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('postalCode'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('postalCode'); ?>
				</div>
				</div>



				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('city'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('city'); ?>
				</div>
				</div>


				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('state'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('state'); ?>
				</div>
				</div>


				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('country'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('country'); ?>
				</div>
				</div>



				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('url'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('url'); ?>
				</div>
				</div>

		</fieldset>




		<fieldset class="adminform">
			<div>
				<?php echo $this->form->getLabel('locdescription'); ?>
				<div class="clr"></div>
				<?php echo $this->form->getInput('locdescription'); ?>
			</div>

		</fieldset>

		<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!-- VENUE-ATTACHMENTS TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'venueTab', 'venue-attachments', JText::_('COM_JEM_EVENT_ATTACHMENTS_TAB', true)); ?>
				<?php echo $this->loadTemplate('attachments'); ?>
		<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!-- VENUE-PUBLISHING TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'venueTab', 'venue-publishing', JText::_('COM_JEM_FIELDSET_PUBLISHING', true)); ?>

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
				<?php echo $this->form->getLabel('published'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('published'); ?>
				</div>
				</div>


				<?php foreach($this->form->getFieldset('publish') as $field): ?>

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




		<!-- VENUE-IMAGE TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'venueTab', 'venue-image', JText::_('COM_JEM_IMAGE', true)); ?>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('locimage'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('locimage'); ?>
				</div>
				</div>

		<?php echo JHtml::_('bootstrap.endTab'); ?>



		<!-- VENUE-META TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'venueTab', 'venue-meta', JText::_('COM_JEM_METADATA_INFORMATION', true)); ?>

		<input type="button" class="btn" value="<?php echo JText::_( 'COM_JEM_ADD_VENUE_CITY' ); ?>" onclick="meta()" />

				<?php foreach($this->form->getFieldset('meta') as $field): ?>

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



		<!-- VENUE-GEODATA TAB -->
		<?php echo JHtml::_('bootstrap.addTab', 'venueTab', 'venue-geodata', JText::_('COM_JEM_FIELDSET_GEODATA', true)); ?>



		<fieldset class="adminform" id="geodata">

 				<input id="geocomplete" type="text" placeholder="<?php echo JText::_( 'COM_JEM_VENUE_ADDRPLACEHOLDER' ); ?>" value="" />
      			<input id="find" class="btn" type="button" value="find" />
     			 <br><br>
 				<div class="map_canvas"></div>

     			 <a id="reset" href="#" style="display:none;">Reset Marker</a>

		</fieldset>


		<fieldset class="adminform">

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('latitude'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('latitude'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('longitude'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('longitude'); ?>
				</div>
				</div>

				<div class="control-group">
					<div class="control-label">
				<?php echo $this->form->getLabel('map'); ?>
				</div>
					<div class="controls">
				<?php echo $this->form->getInput('map'); ?>
				</div>
				</div>
		</fieldset>

		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
</fieldset>






<input type="hidden" name="task" value="" />
<input type="hidden" name="author_ip" value="<?php echo $this->item->author_ip; ?>" />


				<!--  END RIGHT DIV -->
				<?php echo JHTML::_( 'form.token' ); ?>
				</div>



		<div class="clearfix"></div>
       <input id="country" name="country" geo-data="country_short" type="hidden" value="">

</form>


