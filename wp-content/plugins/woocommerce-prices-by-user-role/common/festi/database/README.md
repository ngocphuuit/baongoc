PDO Usage
===================

```php
<?php
$db = new PDO(
    $GLOBALS['config']['db']['dsn'],
    $GLOBALS['config']['db']['user'],
    $GLOBALS['config']['db']['pass']
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
$db->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING); 
$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL); 


$res = $db->query('SET NAMES utf8');

if (!$res) {
    throw new Exception('Database connection error);
}

$db = Object::factory($db);
```

Wordpress Usage
===================

```php
$db = Object::factory($GLOBALS['wpdb']);
```