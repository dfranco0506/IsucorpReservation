<?php

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// Validation language settings
return [
    // Core Messages
    'noRuleSets' => 'No rules have been set in the validation configuration.',
    'ruleNotFound' => '{0} is not a valid validation rule.',
    'groupNotFound' => '{0} is not a group of validation rules.',
    'groupNotArray' => '{0} the validation group must be an array.',
    'invalidTemplate' => '{0} is not a valid validation model.',

// Rule Messages
    'alpha' => 'The field {field} can only contain alphabetic characters.',
    'alpha_dash' => 'The field {field} can only contain alphanumeric characters, underscores, and hyphens.',
    'alpha_numeric' => 'The field {field} can only contain alphanumeric characters.',
    'alpha_numeric_space' => 'The field {field} can only contain alphanumeric characters and spaces.',
    'alpha_space' => 'The field {field} can only contain alphabetic characters and spaces.',
    'decimal' => 'The field {field} must contain a decimal number.',
    'differs' => 'The field {field} must differ from the field {param}.',
    'equals' => 'The field {field} must be exactly: {param}.',
    'exact_length' => 'The field {field} must be exactly {param} characters long.',
    'greater_than' => 'The field {field} must contain a number greater than {param}.',
    'greater_than_equal_to' => 'The field {field} must contain a number greater than or equal to {param}.',
    'hex' => 'The field {field} can only contain hexadecimal characters.',
    'in_list' => 'The field {field} must be one of: {param}.',
    'integer' => 'The field {field} must contain an integer.',
    'is_natural' => 'The field {field} must contain only digits.',
    'is_natural_no_zero' => 'The field {field} must only contain digits and be greater than zero.',
    'is_unique' => 'The field {field} must contain a unique value.',
    'less_than' => 'The field {field} must contain a number less than {param}.',
    'less_than_equal_to' => 'The field {field} must contain a number less than or equal to {param}.',
    'matches' => 'The field {field} does not match the field {param}.',
    'max_length' => 'The field {field} could not exceed {param} characters in length.',
    'min_length' => 'The field {field} must be at least {param} characters long.',
    'not_equals' => 'The field {field} cannot be: {param}.',
    'numeric' => 'The field {field} must contain only numbers.',
    'regex_match' => 'The field {field} is not in the correct format.',
    'required' => 'The field {field} is required.',
    'required_with' => 'The field {field} is required when {param} is present.',
    'required_without' => 'The field {field} is required when {param} is not present.',
    'timezone' => 'The field {field} must be a valid time zone.',
    'valid_base64' => 'The field {field} must be a valid base64 string.',
    'valid_email' => 'The field {field} must contain a valid email address.',
    'valid_emails' => 'The field {field} must contain all valid email addresses.',
    'valid_ip' => 'The field {field} must contain a valid IP.',
    'valid_url' => 'The field {field} must contain a valid URL.',
    'valid_date' => 'The field {field} must contain a valid date',
    'format_date' => 'The field {field} must contain a valid date, with the format d/m/yyyy',
    'phone_valid_format'    => 'The field {field} must contain numbers and dash with the format 00-0000-0000',


// Credit Cards
    'valid_cc_num' => '{field} does not appear to be a valid credit card number.',

// Files
    'uploaded' => '{field} is not a valid file upload field.',
    'max_size' => '{field} is too big for a file.',
    'is_image' => '{field} is not valid, image file uploaded.',
    'mime_in' => '{field} does not have a valid mime type.',
    'ext_in' => '{field} does not have a valid file extension.',
    'max_dims' => '{field} is not an image or is too tall or wide.',
    'contact_process_fail'=>'Create contact process fail. Check provide information.',

    //Form fields
    'contact_name' => 'Contact Name...',
    'contact_type' => 'Contact Type',
    'contact_phone' => 'Phone Number',
    'contact_birthday' => 'Birth Date',


    'destination' => 'Destination',
    'reservation_date' => 'Reservation Date',
    'reservation_time' => 'Reservation Time',
    'sort_by' => 'Sort By',

    //messages
    'success_create'=>'Item created successfully.',
    'success_update'=>'Item updated successfully.',
    'success_delete'=>'Item deleted successfully.',
];
