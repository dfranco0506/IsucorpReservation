<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
        'my_list' => '_errors_list'
	];

    public $reservation = [
        'contact_name' => [
            'label' => 'Validation.contact_name',
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Validation.contact_name.required'
            ]
        ],
        'contact_type' => [
            'label' => 'Validation.contact_type',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Validation.contact_type.required',
                'numeric'=>'Validation.contact_phone.required'
            ]
        ],
        'contact_phone' => [
            'label' => 'Validation.contact_phone',
            'rules' => 'required|regex_match[^\d{2}[\s\.-]?\d{4}[\s\.-]?\d{4}$]',
            'errors' => [
                'required' => 'Validation.contact_phone.required',
                'regex_match'=>'Validation.contact_phone.phone_valid_format'
            ]
        ],
        'contact_birthday' => [
            'label' => 'Validation.contact_birthday',
            'rules' => 'required|valid_date[d/m/Y]',
            'errors' => [
                'required' => 'Validation.contact_birthday.required',
                'valid_date'=>'Validation.contact_birthday.format_date'
            ]
        ],
        'reservation_date' => [
            'label' => 'Validation.reservation_date',
            'rules' => 'required|valid_date[d/m/Y]',
            'errors' => [
                'required' => 'Validation.reservation_date.required',
                'valid_date'=>'Validation.reservation_date.format_date'
            ]
        ],
        'reservation_time' => [
            'label' => 'Validation.reservation_time',
            'rules' => 'required',
            'errors' => [
                'required' => 'Validation.reservation_time.required',
            ]
        ],
    ];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
