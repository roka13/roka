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
 
	//$this->dump('db');
	$dBase=self::$db;
	 $this->dbTable =new \Roka\Dbtables\DbtablesController($dBase);
	}	



    /**
     * Test 
     *
     * @return void
     *
     */
    public function testSelectTable() {
	

	   
	$this->dbTable->selectAction();
 	 /*
	try{
	

		}
		catch(Exception $e){
	}*/
	}
	
	 /**
     * Test 
     *
     * @return void
     *
     */
    public function testListTable() {
	
	$_POST['tblName']= 'jonte5';
	 $this->dbTable->listAction();

	}
	
	 /**
     * Test 
     *
     * @return void
     *
     */
    public function testEmptyTable() {
	
	 $this->dbTable->emptyAction();
	
	}
	
	 /**
     * Test 
     *
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
	$stmt=$dBase->exec($sql);
	
	$values =array(5,'jonte','sotare','aaa');
	$sql="INSERT INTO test VALUES( 5,'jonte','sotare','aaa')";
	$stmt=$dBase->exec($sql);
	
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
	
} // end of class