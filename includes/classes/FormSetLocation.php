<?php

use \libAllure\Form;
use \libAllure\Session;
use \libAllure\ElementInput;

class FormSetLocation extends Form {
	public function __construct() {
		parent::__construct('formSetLocation', 'Set My Location', 'eventsMap.php');

		$this->addElement(new ElementInput('location', 'Your location (postcode)'));

		$this->addButtons(Form::BTN_SUBMIT);
	}

	public function process() {
		if (Session::isLoggedIn()) {
			Session::getUser()->setData('location', $this->getElementValue('location'));
		}

		setcookie('mylocation', $this->getElementValue('location'));
	}
}

?>
