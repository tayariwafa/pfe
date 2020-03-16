<?php



$schema = new \Doctrine\DBAL\Schema\Schema();


$Utilisateurs = $schema->createTable('users');
$Utilisateurs->addColumn('cin', 'integer', array('unsigned' => true,'length' => 11));
$Utilisateurs->addColumn('email', 'string', array('length' => 100));
$Utilisateurs->addColumn('password', 'string', array('length' => 255));
 $Utilisateurs->addColumn('roles', 'string', array('length' => 255));
$Utilisateurs->addColumn('name', 'string', array('length' => 100));
$Utilisateurs->addColumn('time_created', 'integer', array('length' => 11));
$Utilisateurs->addColumn('username', 'string', array('length' => 200));
$Utilisateurs->addColumn('isEnabled', 'integer', array('length' => 1));
$Utilisateurs->addColumn('confirmationToken', 'string', array('length' => 100));
$Utilisateurs->addColumn('timePasswordResetRequested', 'integer', array('length' => 11));
$Utilisateurs->setPrimaryKey(array('id'));


$project = $schema->createTable('Project');
$project->addColumn('IdProject', 'integer', array('unsigned' => true,'length' => 11));
$project->addColumn('NomProject', 'string', array('length' => 255));
$project->addColumn('DescriptionProject', 'string', array('length' => 255));
$project->addColumn('IsActive', 'integer', array('length' => 255));
$project->setPrimaryKey(array('IdProject'));



$Roles = $schema->createTable('Roles');
$Roles->addColumn('IdRole', 'integer', array('unsigned' => true,'length' => 11));
$Roles->addColumn('IdProject', 'integer', array('unsigned' => true,'length' => 11));
$Roles->addColumn('iduser', 'integer', array('unsigned' => true,'length' => 11));
$Roles->addColumn('NameRole', 'string', array('length' => 255));
$Roles->addColumn('DescriptionRole', 'string', array('length' => 255));
$Roles->addForeignKeyConstraint($project, array("IdProject"), array("IdProject"), array("onUpdate" => "CASCADE"));
$Roles->addForeignKeyConstraint($Utilisateurs, array("iduser"), array("id"), array("onUpdate" => "CASCADE"));
$Roles->setPrimaryKey(array('IdRole'));


$Droit_d_acces = $schema->createTable('Droit_d_acces');
$Droit_d_acces->addColumn('idDroit_d_acces', 'integer', array('unsigned' => true,'length' => 11));
$Droit_d_acces->addColumn('NameDroit_d_acces', 'string', array('length' => 255));
$Droit_d_acces->addColumn('DescriptionDroit_d_acces', 'string', array('length' => 255));
$Droit_d_acces->addColumn('IdRole', 'integer', array('unsigned' => true,'length' => 11));
$Droit_d_acces->addForeignKeyConstraint($Roles, array("IdRole"), array("IdRole"), array("onUpdate" => "CASCADE"));
$Droit_d_acces->setPrimaryKey(array('idDroit_d_acces'));


$Notifications = $schema->createTable('Notifications');
$Notifications->addColumn('idNotification', 'integer', array('unsigned' => true,'length' => 11));
$Notifications->addColumn('text', 'string', array('length' => 100));
$Notifications->addColumn('date', 'string', array('length' => 100));
$Notifications->addColumn('type', 'int', array('length' => 1));
$Notifications->addColumn('vu', 'int', array('length' => 1));



return $schema;
