--TEST--
PHPC-940: php_phongo_free_ssl_opt() attempts to free interned strings (context option)
--SKIPIF--
<?php require __DIR__ . "/../utils/basic-skipif.inc"; ?>
<?php skip_if_not_libmongoc_ssl(); /* SSL opts are ignored without MONGOC_ENABLE_SSL */ ?>
--FILE--
<?php

$context = stream_context_create(['ssl' => ['cafile' => false]]); 

var_dump(new MongoDB\Driver\Manager(null, [], ['context' => $context]));

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
object(MongoDB\Driver\Manager)#%d (%d) {
  ["uri"]=>
  string(20) "mongodb://127.0.0.1/"
  ["cluster"]=>
  array(0) {
  }
}
===DONE===
