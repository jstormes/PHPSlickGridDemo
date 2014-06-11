<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */

    }

    public function indexAction()
    {
        // action body
        
    	// Add styles for this example
    	$this->view->headLink()->appendStylesheet('examples.css','screen');

    }

}

