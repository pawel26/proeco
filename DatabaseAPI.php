<?php

$host = '127.0.0.1';
$db   = 'test';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

function CreateConnObj($dsn,$user,$pass,$opt){
return new PDO($dsn, $user, $pass, $opt);

}
function InsertData($pdo,$table,$value){

if (isset($values['name'])) $name = $values['name'];
print($name);
$sql = $pdo->prepare("INSERT INTO ". $table ." (name) VALUES(?)");
$sql->bindParam(1,$name);
$sql->execute();
if ($sql){ return true; } else return false;
}

function GetPicByName($pdo,$tableName,$value){

if (isset($value)) $name = $value;
print($name);

$sql = $pdo->prepare("SELECT * FROM ". $tableName ." WHERE name=?");
$sql->execute(array($name));
$result = $sql->fetchAll();
print_r($result);
return result;
}

function GetALL($pdo,$tableName){

$sql = $pdo->prepare("SELECT * FROM ". $tableName);
$sql->execute();
$result = $sql->fetchAll();
print_r($result);
return result;
}

function UpdateField($pdo,$tableName,$values){

if (isset($values['name'])) $name = $values['name'];
if (isset($values['id'])) $id = $values['id'];

$sql = $pdo->prepare("UPDATE ".$tableName." SET name = ? WHERE id = ?");
$sql->bindParam(1,$name);
$sql->bindParam(2,$id);
$sql->execute();
if ($sql){ return true; } else return false;

}

function DeleteField($pdo,$tableName,$IDvalue){

if (isset($IDvalue)) $id = $IDvalue;

$sql = $pdo->prepare("DELETE FROM ".$tableName." WHERE id = ?");
$sql->bindParam(1,$id);
$sql->execute();
if ($sql){ return true; } else return false;

}
//$pdo = CreateConnObj($dsn, $user, $pass, $opt);
//$status = InsertData($pdo,'test',$value);
//var_dump($status);
//GetPicByName($pdo,'test','Pawel')
//GetALL($pdo,'test');
//$values = Array();
//$values['name'] = 'Pawel';
//$values['id'] = 2;
//$status = UpdateField($pdo,'test',$values);
//var_dump($status);
//$IDvalue = 6;
//$status = DeleteField($pdo,'test',$IDvalue);
//var_dump($status);
?>