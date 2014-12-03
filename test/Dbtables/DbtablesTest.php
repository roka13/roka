<?php
namespace Roka\Dbtables;

/**
 * HTML Form elements.
 *
 */
class DbTablesTest extends \PHPUnit_Framework_TestCase
{
public $dbTable;
public static $db;
public $dBase;


public static function setUpBeforeClass(){

	try {
			$data= "../roka/test/roka2.db";
		self::$db= new \PDO("sqlite:$data",'ATTR_DEFAULT_FETCH_MODE');
	//	self::$db= setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE);
	//$dbase= self::$db;
	// $this->dbTable =new \Roka\Dbtables\DbtablesController($dbase);
	 
		} catch(\Exception $e) {
			throw new \PDOException("Could not connect to database");          
		}
    }

    public static function tearDownAfterClass()
    {
       self::$db = NULL;
    }


public function setUp(){
	$dBase=self::$db;
	 $this->dbTable =new \Roka\Dbtables\DbtablesController($dBase);
	}	

	 /**
     * Test Create new table, populate it
     * with testdata and fetch it to compare
     * @return void
     *
     */
    public function testCreateReadDb() {
		$dBase=self::$db;

	$sql="DROP TABLE IF EXISTS 'test'";
	$stmt=$dBase->exec($sql);
	
	$sql="CREATE TABLE test(
		id integer primary key ,
		namn varchar(10),
		yrke varchar(10),
		betyg varchar(3)
	)";
	$dBase->exec($sql);
	
	$values =array(5,'jonte','sotare','aaa');
	$sql="INSERT INTO test VALUES( 5,'jonte','sotare','aaa')";
	$dBase->exec($sql);
	
	$sql="SELECT * FROM test";
	$stmt=$dBase->query($sql);
	$res=$stmt->fetchAll();

	$answer=array();
		foreach ( $res as $val){ 
			$answer[] =$val[0];
			$answer[] =$val[1];
			$answer[] =$val[2];
			$answer[] =$val[3];
	    }		
	 $this->assertEquals($values,$answer,' not equal');
	}
	

    /**
     * Test function SelectAction
     *
     * @return void
     *
     */
    public function testSelectTable() {
	$this->dbTable->selectAction();
	}
	
	 /**
     * Test function listAction
     *
     * @return void
     *
     */
    public function testListTable() {
	
	$_POST['tblName']= 'test';
	 $this->dbTable->listAction();

	}
	
	 /**
     * Test function emptyTable
     *
     * @return void
     *
     */
    public function testEmptyTable() {
	
	 $this->dbTable->emptyAction();
	
	}
	

} // end of class