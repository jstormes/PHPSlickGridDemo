<?php

class Example1Controller extends Zend_Controller_Action
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
    	$this->view->headLink()->appendStylesheet('/slickgrid/slick.grid.css','screen, print');
    	
    	// Add PHPSlickGrid assets
    	$this->view->headScript()->appendFile('/phpslickgrid/js/json/datacache.js');
    	$this->view->headScript()->appendFile('/phpslickgrid/js/editors/mysql.js');    	
    	
    	// Add styles for this example
    	$this->view->headLink()->appendStylesheet('examples.css','screen');
    	
    	// setup the view
    	$this->view->model = $this->model;
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

