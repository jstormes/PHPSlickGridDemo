<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected $log 				= null; // Logging object
	
	protected function _initLogger() {
	
		// Setup logging
		$this->log = new Zend_Log();
			
		if (PHP_SAPI != 'cli')
			$this->log->setEventItem('request_uri', $_SERVER["REQUEST_URI"]);
		else
			$this->log->setEventItem('request_uri', 'command line');
			
		//$writer_db = new Zend_Log_Writer_Db(Zend_Registry::get('db'), 'log');
		//$this->log->addWriter($writer_db);
			
		// Prevent debug messages from going to the DB.
		//$filter = new Zend_Log_Filter_Priority(Zend_Log::INFO);
		//$writer_db->addFilter($filter);
			
		// if we are not in produciton enable Firebug
		// http://www.firephp.org/
		//if ( APPLICATION_ENV != 'production' ) {
			$writer_firebug = new Zend_Log_Writer_Firebug();
			$this->log->addWriter($writer_firebug);
		//}
	
		Zend_Registry::set( 'log', $this->log );
	
		// Examples:
		//Zend_Registry::get('log')->debug("this is a debug log test");	// least severe only shown on FireBug console
		//$this->log->debug("this is a debug log test");	// least severe only shown on FireBug console
		//Zend_Registry::get('log')->info("this is a info log test");
		//Zend_Registry::get('log')->notice("this is a notice log test");
		//Zend_Registry::get('log')->warn("this is a warn log test");
		//Zend_Registry::get('log')->err("this is a err log test");
		//Zend_Registry::get('log')->crit("this is a crit log test");
		//Zend_Registry::get('log')->alert("this is a alert log test");
		//Zend_Registry::get('log')->emerg("this is a emerg log test");	// Most severe
	}

}

