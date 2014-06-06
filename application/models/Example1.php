<?php
class Application_Model_Example1 extends PHPSlickGrid_Db_Table
{

	/* Required setting for the SlickGrid */
	protected $_name = 'example1';
	protected $_primary = 'example1_id';
	protected $_upd_dtm_col = 'updt_dtm';

	protected $_friendlyName = 'Grid';
	
	
	protected function _gridInit() {
		
		// Hide the date/time column.
		$this->Hidden=array('updt_dtm');
	}
	
	/*
	 * Called when a user updates a row from the grid.
	 */
	public function _updateItem($row, $state=null) {
		
		// Uncomment the next two lines to see what this 
		// method dose in FireBug.
		  	
		//$this->log->debug($row);
		//$this->log->debug($state);
		
		return $row;
	}
	
	/*
	 * Called when a user adds a new row from the grid.
	 */
	public function _addItem($row, $state=null) {
		
		// Uncomment the next two lines to see what this
		// method dose in FireBug.
		
		//$this->log->debug($row);
		//$this->log->debug($state);
		
		return $row;
	}
	
	/*
	 * The method is called every time a select is built for the
	 * data cache.  Calling the where method from the passed
	 * select object will filter the data passed back to the grid.
	 */
	public function addConditionsToSelect(Zend_Db_Select $select) {
		
		return $select;
	}

}