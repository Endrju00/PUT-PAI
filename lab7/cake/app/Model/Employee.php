<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 */
class Employee extends AppModel {
	var $validate = array(
		'etat' => array('rule' => 'notBlank'),
		'nazwisko' => array('rule' => 'notBlank'),
		'placa_pod' => array('rule' => array('range', 0, 2000), 'message' => 'placa_pod musi zawierac sie w przedziale 0-2000')
	);
}
