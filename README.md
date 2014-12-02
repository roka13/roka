Dbtable
---------------------------

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/roka13/roka/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/roka13/roka/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/roka13/roka/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/roka13/roka/?branch=master)
Use it  to retrieve information of datatables 
in a Database. 
PHP classes for database handling upon PDO.

License 
------------------
This software is free software and carries a MIT license.

History
-----------------------------------
v 1 First edition
*Based upon mos/database and mos/cform package.
*The intention is to explore all datafiles in a database.

V2 Second Edition
* Decoupled from Anax so it can be used outside Anax-template

How to use Cdbtable  
===================
Copy the map Dbtables in vendor/roka/Dbtable/src to your app/src map  
and also the map Dbtables in vendor/roka/Dbtable/view to your app/view map    

Use inside Anax:
Insert to your Index-file in webroot  
  
> $di->set('DbtablesController', function() use ($di) {
    $controll = new \Roka\Dbtables\DbtablesController();
    $controll->setDI($di);
    return $controll;
});

You must have a database connection open ie like this   
  
> $di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
  // $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php');
	 $db->setOptions(require ANAX_APP_PATH . 'config/config_sqlite.php');
    $db->connect();
    return $db;
});

You can use it from the browsner like the link

/webroot/Dbtables/select

```
 .  
..:  Copyright (c) 2014 Göran Karlsson rgoran.karlsson@teila.com
```


