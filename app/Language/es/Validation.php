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
return array(
    // Core Messages
    'noRuleSets' => 'No se han establecido reglas en la configuración de validación.',
    'ruleNotFound' => '{0} no es una regla de validación válida.',
    'groupNotFound' => '{0} no es un grupo de reglas de validación.',
    'groupNotArray' => '{0} el grupo de validación debe ser un array.',
    'invalidTemplate' => '{0} no es un modelo de validación válido.',

    // Rule Messages
    'alpha' => 'El campo {field} solo puede contener caracteres alfabéticos.',
    'alpha_dash' => 'El campo {field} solo puede contener caracteres alfanuméricos, subrayados, y guiones.',
    'alpha_numeric' => 'El campo {field} solo puede contener caracteres alfanuméricos.',
    'alpha_numeric_space' => 'El campo {field} solo puede contener caracteres alfanuméricos y espacios.',
    'alpha_space' => 'El campo {field} solo puede contener caracteres alfabéticos y espacios.',
    'decimal' => 'El campo {field} debe contener un número decimal.',
    'differs' => 'El campo {field} debe diferir del campo {param}.',
    'equals' => 'El campo {field} debe ser exactamente: {param}.',
    'exact_length' => 'El campo {field} debe tener exactamente {param} caractéres de longitud.',
    'greater_than' => 'El campo {field} debe contener un número mayor que {param}.',
    'greater_than_equal_to' => 'El campo {field} debe contener un número mayor o igual a {param}.',
    'hex' => 'El campo {field} solo puede contener caracteres hexadecimales.',
    'in_list' => 'El campo {field} debe ser uno de: {param}.',
    'integer' => 'El campo {field} debe contener un entero.',
    'is_natural' => 'El campo {field} debe contener solo dígitos.',
    'is_natural_no_zero' => 'El campo {field} debe solo contener dígitos y ser mayor que cero.',
    'is_unique' => 'El campo {field} debe contener un valor único.',
    'less_than' => 'El campo {field} debe contener un número menor que {param}.',
    'less_than_equal_to' => 'El campo {field} debe contener un número menor o igual a {param}.',
    'matches' => 'El campo {field} no coincide con el campo {param}.',
    'max_length' => 'El campo {field} no pude exceder los {param} caracteres de longitud.',
    'min_length' => 'El campo {field} debe tener al menos {param} caracteres de longitud.',
    'not_equals' => 'El campo {field} no puede ser: {param}.',
    'numeric' => 'El campo {field} debe contener solo números.',
    'regex_match' => 'El campo {field} no está en el formato correcto.',
    'required' => 'El campo {field} es requerido.',
    'required_with' => 'El campo {field} es obligatorio cuando {param} está presente.',
    'required_without' => 'El campo {field} es obligatorio cuando {param} no está presente.',
    'timezone' => 'El campo {field} debe ser una zona horaria válida.',
    'valid_base64' => 'El campo {field} debe ser una cadena base64 válida.',
    'valid_email' => 'El campo {field} debe contener una dirección de email válida.',
    'valid_emails' => 'El campo {field} debe contener todas las direcciones de email válidas.',
    'valid_ip' => 'El campo {field} debe contener una IP válida.',
    'valid_url' => 'El campo {field} debe contener una URL válida.',
    'valid_date' => 'El campo {field} debe contener una fecha válida.',
    'format_date' => 'El campo {field} debe contener una fecha válida, en el formato d/m/aaaa.',
    'valid_birthday_date' => 'El campo {field} debe contener una fecha menor o igual que la fecha actual.',
    'valid_reservation_date' => 'El campo {field} debe contener una fecha mayor o igual que la fecha actual.',
    'phone_valid_format' => 'El campo {field} debe contener numeros y guiones, en el formato 00-0000-0000.',
    // Credit Cards
    'valid_cc_num' => '{field} no parece ser un número de tarjeta de crédito válida.',

    // Files
    'uploaded' => '{field} no es un campo de subida de archivo válido.',
    'max_size' => '{field} es demasiado grande para un archivo.',
    'is_image' => '{field} no es válido, subido archivo de imagen.',
    'mime_in' => '{field} no tiene un tipo válido de mime.',
    'ext_in' => '{field} no tiene una extensión de archivo válida.',
    'max_dims' => '{field} no es una imagen o tiene demasiado alto o ancho.',
    'contact_process_fail' => 'El proceso de la creación del contacto ha fallado, revise los datos proporcionados.',

    //Form fields
    'contact_name' => 'Nombre...',
    'contact_type' => 'Tipo de contacto',
    'contact_phone' => 'Teléfono',
    'contact_birthday' => 'Fecha de nacimiento',

    'destination' => 'Destino',
    'reservation_date' => 'Fecha de reservación',
    'reservation_time' => 'Hora de reservación',
    'sort_by' => 'Ordenar por',
    'confirm_delete_title'=>'Confirmar Eliminación',
    'confirm_delete_message' => '¿Está seguro que desea eliminar el contacto?',

    //form fields messages
    'valid_name_format' => 'Debe contener al menos 3 letras',
    'valid_phone_format' => 'Debe contener numeros y guiones, en el formato 00-0000-0000.',
    'valid_date_format' => 'Debe tener un formato dd/mm/aaaa.',
    'valid_time_format' => 'Debe contener un formato hh:mm A.',

    'required_name_view' => 'El campo Nombre... es requerido',
    'required_contact_type_view' => 'El campo Tipo de contacto es requerido',
    'required_contact_birthday_view' => 'El campo Fecha de nacimiento es requerido',
    'required_contact_phone_view' => 'El campo Teléfono es requerido',
    'required_destination_view' => 'El campo Destino es requerido',
    'required_reservation_date_view' => 'El campo Fecha de reservación es requerido',
    'required_reservation_time_view' => 'El campo Hora de reservación es requerido',

    //messages
    'success_create' => '{object} creado(a) exitosamente.',
    'success_add_favorite' => 'La reservación se ha creado como favorita.',
    'success_remove_favorite' => 'La reservación ha dejado de ser favorita.',
    'success_update' => '{object} modificado(a) exitosamente.',
    'success_delete' => '{object} {object_name} eliminado(a) exitosamente.',
    'contact_non_delete' => 'El contacto {object_name} tiene al menos una reservación asociada, no es posible eliminarlo.'
);
