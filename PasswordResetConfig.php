<?php

class PasswordResetConfig extends ModuleConfig
{
	function __construct() {
		$userFields = wire('templates')->get('user')->fields;
		$userFieldsArray = [];

		$userFieldsArray['name'] = 'name';
		foreach ($userFields as $field) {
			if (!in_array($field->name, ['pass', 'roles', 'language'])) {
				$userFieldsArray[$field->id] = $field->name;
			}
		}

		$this->add(array(
			array(
				'name' => 'fieldname',
				'label' => __('Validation field'),
				'type' => 'select',
				'options' => $userFieldsArray,
				'description' => __('The field to match user registration against.')
			),
			array(
				'name' => 'instructions',
				'label' => __('Instructions'),
				'type' => 'CKEditor',
				'description' => __('Optional text displayed under the reset form validation field.')
			),
			array(
				'name' => 'emailAddress',
				'label' => __('Email address to send reset link from'),
				'type' => 'text',
				'value' => 'passwords-service@example.com'
			),
			array(
				'name' => 'emailName',
				'label' => __('Name to use for the email address'),
				'type' => 'text',
				'value' => 'Passwords service'
			)
		));
	}
}