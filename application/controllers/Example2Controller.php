<?php

class Example2Controller extends Zend_Controller_Action
{

	/**
	 * 
	 * @var PHPSlickGrid_Db_Table_Abstract
	 */
	public $model;
	
    public function init()
    {
        /* Initialize action controller here */
      	
    	// Setup our grid
    	$this->model = new Application_Model_Example2();
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
    	$this->view->headScript()->appendFile('/phpslickgrid/headerplugins/menubutton.js');
    	$this->view->headLink()->appendStylesheet('/phpslickgrid/headerplugins/menubutton.css','screen');
    	
    	$this->view->headScript()->appendFile('/phpslickgrid/headerplugins/menuitems/html.js');
    	$this->view->headScript()->appendFile('/phpslickgrid/headerplugins/menuitems/listfilter.js');
    	 
    	$this->view->headLink()->appendStylesheet('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css','screen');
		
    	
    	// Filter Menu
    	$filter_menu = new PHPSlickGrid_HeaderPlugins_MenuButton();
    	$filter_menu->Columns(array('column1','column2'));
    	$filter_menu->icon = "<i class='fa fa-caret-down fa-1x'></i>";
    	//$filter_menu->AddPlugin(new PHPSlickGrid_HeaderPlugins_MenuItems_HTML('<div> Hello World</div>'));
    	
    	$filter_menu->AddPlugin(new PHPSlickGrid_HeaderPlugins_MenuItems_ListFilter());
    	//$filter_menu->AddPlugin(new PHPSlickGrid_HeaderPlugins_MenuItems_HTML('test two'));
    	$this->model->AddPlugin($filter_menu);
    	
    	// Administrator Menu
    	//$admin_menu = new PHPSlickGrid_HeaderPlugins_MenuButton();
    	//$admin_menu->icon = "<i class='fa fa-cog fa-1x'></i>";
    	//$this->model->AddPlugin($admin_menu);
    	
    	// User Access Menu
    	//$users_menu = new PHPSlickGrid_HeaderPlugins_MenuButton();
    	//$users_menu->icon = "<i class='fa fa-users fa-1x'></i>";
    	//$this->model->AddPlugin($users_menu);

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

