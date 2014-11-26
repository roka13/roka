<?php
namespace Roka\Dbtables;

/**
 * HTML Form elements.
 *
 */
class DbTablesTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test 
     *
     * @return void
     *
     */
    public function testShowTable() 
	
    {
	    $_SESSION['tblname'] = 'comments';
		 $dbtable = new \Roka\Dbtables\DbtablesController();

		
		try{
		$dbtable->listAction();
		}
		catch(Exception $e){
		}
	}
	// $cdby = new \Dlid\DbYuml\CDbYuml();
 
	
} // end of class