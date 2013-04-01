<?php
/**
 * @version 1.1 $Id$
 * @package Joomla
 * @subpackage EventList
 * @copyright (C) 2005 - 2009 Christoph Lukes
 * @license GNU/GPL, see LICENSE.php
 * EventList is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.

 * EventList is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with EventList; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

/**
 * View class for the EventList editgroup screen
 *
 * @package Joomla
 * @subpackage EventList
 * @since 0.9
 */
class EventListViewGroup extends JViewLegacy {

	function display($tpl = null)
	{
		$app =  JFactory::getApplication();

		//Load pane behavior
		jimport('joomla.html.pane');
		
		// Load the form validation behavior
		JHTML::_('behavior.formvalidation');

		//initialise variables
		$document	=  JFactory::getDocument();
		$user 		=  JFactory::getUser();

		//get vars
		$template		= $app->getTemplate();
		$cid 			= JRequest::getInt( 'cid' );

		//add css
		$document->addStyleSheet('components/com_eventlist/assets/css/eventlistbackend.css');

		//Get data from the model
		$model				=  $this->getModel();
		$row      			=  $this->get( 'Data');
		
		//sticky forms
		/*$session = &JFactory::getSession();
		if ($session->has('groupform', 'com_eventlist')) {
			$groupform 	= $session->get('groupform', 0, 'com_eventlist');
			$maintainers = $groupform['maintainers'];
			//TODO: refactor model to make this work
		} else {		*/
			$maintainers 		=  $this->get( 'Members');
	//	}
		$available_users 	=  $this->get( 'Available');

		// fail if checked out not by 'me'
		if ($row->id) {
			if ($model->isCheckedOut( $user->get('id') )) {
				JError::raiseWarning( 'SOME_ERROR_CODE', $row->name.' '.JText::_( 'EDITED BY ANOTHER ADMIN' ));
				$app->redirect( 'index.php?option=com_eventlist&view=groups' );
			}
		}

		//make data safe
		JFilterOutput::objectHTMLSafe( $row );

		//build toolbar
		if ( $cid ) {
			JToolBarHelper::title( JText::_( 'COM_EVENTLIST_EDIT_GROUP' ), 'groupedit' );
			JToolBarHelper::spacer();
		} else {
			JToolBarHelper::title( JText::_( 'COM_EVENTLIST_ADD_GROUP' ), 'groupedit' );
			JToolBarHelper::spacer();

			//Create Submenu
			JSubMenuHelper::addEntry( JText::_( 'COM_EVENTLIST_EVENTLIST' ), 'index.php?option=com_eventlist');
			JSubMenuHelper::addEntry( JText::_( 'COM_EVENTLIST_EVENTS' ), 'index.php?option=com_eventlist&view=events');
			JSubMenuHelper::addEntry( JText::_( 'COM_EVENTLIST_VENUES' ), 'index.php?option=com_eventlist&view=venues');
			JSubMenuHelper::addEntry( JText::_( 'COM_EVENTLIST_CATEGORIES' ), 'index.php?option=com_eventlist&view=categories');
			JSubMenuHelper::addEntry( JText::_( 'COM_EVENTLIST_ARCHIVESCREEN' ), 'index.php?option=com_eventlist&view=archive');
			JSubMenuHelper::addEntry( JText::_( 'COM_EVENTLIST_GROUPS' ), 'index.php?option=com_eventlist&view=groups');
			JSubMenuHelper::addEntry( JText::_( 'COM_EVENTLIST_HELP' ), 'index.php?option=com_eventlist&view=help');
			if ($user->get('gid') > 24) {
				JSubMenuHelper::addEntry( JText::_( 'COM_EVENTLIST_SETTINGS' ), 'index.php?option=com_eventlist&controller=settings&task=edit');
			}
		}
		JToolBarHelper::save();
		JToolBarHelper::spacer();
		JToolBarHelper::cancel();
		JToolBarHelper::spacer();
		JToolBarHelper::help( 'el.editgroup', true );

		//create selectlists
		$lists = array();
		$lists['maintainers']		= JHTML::_('select.genericlist', $maintainers, 'maintainers[]', 'class="inputbox" size="20" onDblClick="moveOptions(document.adminForm[\'maintainers[]\'], document.adminForm[\'available_users\'])" multiple="multiple" style="padding: 6px; width: 250px;"', 'value', 'text' );
		$lists['available_users']	= JHTML::_('select.genericlist', $available_users, 'available_users', 'class="inputbox" size="20" onDblClick="moveOptions(document.adminForm[\'available_users\'], document.adminForm[\'maintainers[]\'])" multiple="multiple" style="padding: 6px; width: 250px;"', 'value', 'text' );

		//assign data to template
		$this->assignRef('row'      	, $row);
		$this->assignRef('template'		, $template);
		$this->assignRef('lists'      	, $lists);

		parent::display($tpl);
	}
}
?>