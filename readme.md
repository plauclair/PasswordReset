# Password Reset

A customizable frontend password reset module for ProcessWire.
 
## Requirements

- PHP >= 5.3.0
- ProcessWire >= 2.6

## Usage

Copy the password-reset.php file to your site's templates
folder and make the changes appropriate for your website's structure.

This file has a few tips and does this, basically:

It runs the controller ```$modules->get('PasswordReset')->controller()```
then loads the scripts  ```$modules->get('PasswordReset')->getScripts()```

## Configuration

Password Reset has different configuration options that you can access through Modules > Site > PasswordReset:

**Validation field**
The field to match user registration against. It is important that you make sure these fields remain unique.

**Instructions**
Optional text displayed under the reset form validation field on the first page of the reset process. This
field has *language support* and, when the Language Support module is loaded, will display one instruction field
for each language.


**Email address to send link from**
The email address used to send reset links.

**Name to use for the email address**
Name used to send reset links.

**Required password length**
Minimum recommended length: 8.


**Password instructions**

Optional text displayed under the reset password field. This field has *language support* and, when the
Language Support module is loaded, will display one instruction field for each language.

## Public methods

**getScripts()**
Returns the necessary JavaScript file url for use in ```<scripts>``` tags.

The scripts don't have any dependencies and **must** be loaded just before the
closing body tag to make sure it works properly.

**controller()**
Where the magic happens.

Make sure the controller is echo'ed somewhere. It will output the forms and any other markup to your pages.

## Todo

- Housekeeping script to delete expired requests
- Uninstall script
- Probably some markup tweaking
- Ajaxify (eventually)
- Progress bar?

## Versions

**0.0.2 Current beta**
First working release

