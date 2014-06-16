<?php

class Example2Controller extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
      	
    	// Setup our grid
    	$this->model = new Application_Model_Example1();
    }

    public function indexAction()
    {
        // action body
        
    	// Add jQuery assets
    	$this->view->headScript()->appendFile('/js/jquery-1.11.0.min.js');
    	$this->view->headScript()->appendFile('/js/jquery-ui-1.10.3.custom.min.js');
    	$this->view->headLink()->appendStylesheet('/css/jquery-ui.css','screen');
    	$this->view->headScript()->appendFile('/js/jquery.event.drag-2.2.js');
    	$this->view->headScript()->appendFile('/js/jquery.event.drop-2.2.js');
    	
    	// Add AJAX JSON RPC assets
    	$this->view->headScript()->appendFile('/js/json2.js');
    	$this->view->headScript()->appendFile('/js/jquery.zend.jsonrpc.js');
    	
    	// Add store.js to manage local storage
    	$this->view->headScript()->appendFile('/js/store.min.js');
    	
    	// Add SlickGrid assets
    	$this->view->headScript()->appendFile('/slickgrid/slick.core.js');
    	$this->view->headScript()->appendFile('/slickgrid/slick.grid.js');
//    	$this->view->headLink()->appendStylesheet('/slickgrid/slick.grid.css','screen, print');
    	
    	// Add PHPSlickGrid assets
    	$this->view->headScript()->appendFile('/phpslickgrid/js/json/datacache.js');
    	$this->view->headScript()->appendFile('/phpslickgrid/js/editors/mysql.js');  
    	// This next line replaces  /slickgrid/slick.grid.css
    	$this->view->headLink()->appendStylesheet('/phpslickgrid/css/phpslickgrid.css','screen, print');
    	
    	// Add styles for this example
    	$this->view->headLink()->appendStylesheet('examples.css','screen');
    	
    	// setup the view
    	$this->view->model = $this->model;
    	
    	
    	
    	// Add our header menu
    	$this->view->headScript()->appendFile('/phpslickgrid/js/headermenu/headermenu.js');
    	$this->view->headLink()->appendStylesheet('/phpslickgrid/js/headermenu/headermenu.css','screen');
    	 
    	$this->view->headLink()->appendStylesheet('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css','screen');
		
    	
    	// Ideas for HeaderMenu
    	//$filter_menu = new PHPSlickGrid.HeaderMenu($this->model);
    	//$filter_menu->icon = "<i class='fa fa-caret-down fa-1x'></i>";
    	//$filter_menu->addPlugin(new PHPSlickGrid.HeaderMenu.CheboxFilter());
    	//$filter_menu->addPlugin(new PHPSlickGrid.HeaderMenu.BootStrapModel('SuperFilter'));
    	//$this->view->$filter_menu = $filter_menu;
    	
    	// Ideas for HeaderModel
    	//$admin_menu = new PHPSlickGrid.HeaderModel('ColumnAdminScreen');
    	//$this->view->admin_menu = $admin_menu;
    	
    	
    	
    	$this->view->filterOptions = array("icon"=>"<i class='fa fa-caret-down fa-1x'></i>");
    	$this->view->adminOptions = array("icon"=>"<i class='fa fa-cog fa-1x'></i>");
    	$this->view->usersOptions = array("icon"=>"<i class='fa fa-users fa-1x'></i>");
    }
    
    public function jsonAction()
    {
    	// Disable view and layout
    	$this->_helper->layout()->disableLayout(true);
    	$this->_helper->viewRenderer->setNoRender(true);
    
    	// Create a new instance of a JSON web-service service using our grid.
    	$server = new PHPSlickGrid_JSON($this->model);
    
    	// Expose the JSON database table service trough this action.
    	$server->handle();
    }


}

