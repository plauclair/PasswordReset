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
				'required' => true,
				'type' => 'Select',
				'options' => $userFieldsArray,
				'description' => __('The field to match user registration against.')
			))
		);

		if (class_exists("LanguageSupport", false)) {
			foreach($this->languages as $language) {
				$this->add(array(
					array(
						'name' => 'instructions' . $language->id,
						'label' => __('Instructions') . " ({$language->name})",
						'description' => __('Optional text displayed under the reset form validation field.'),
						'type' => 'CKEditor'
					)
				));
			}
		} else {
			$this->add(array(
				array(
					'name' => 'instructions',
					'label' => __('Instructions'),
					'type' => 'CKEditor',
					'description' => __('Optional text displayed under the reset form validation field.')
				)
			));
		}

		$this->add(array(
			array(
				'name' => 'emailAddress',
				'label' => __('Email address to send reset link from'),
				'required' => true,
				'type' => 'Text',
				'value' => 'passwords-service@example.com'
			),
			array(
				'name' => 'emailName',
				'label' => __('Name to use for the email address'),
				'type' => 'Text',
				'value' => 'Passwords service'
			),
			array(
				'name' => 'passwordLength',
				'label' => __('Required password length'),
				'required' => true,
				'type' => 'Integer',
				'value' => 8
			)
		));

		if (class_exists("LanguageSupport", false)) {
			foreach($this->languages as $language) {
				$this->add(array(
					array(
						'name' => 'passwordInstructions' . $language->id,
						'label' => __('Password instructions') . " ({$language->name})",
						'description' => __('Optional (but strongly recommended) instructions displayed under the password input field.'),
						'type' => 'CKEditor'
					)
				));
			}
		} else {
			$this->add(array(
				array(
					'name' => 'passwordInstructions',
					'label' => __('Password instructions'),
					'description' => __('Optional (but strongly recommended) instructions displayed under the password input field.'),
					'type' => 'CKEditor'
				)
			));
		}
	}
}