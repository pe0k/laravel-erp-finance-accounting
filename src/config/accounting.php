<?php
return [
    'record_tag' => env('PERLUR_ACCOUNTING_XML_RECORD_TAG', 'record'),
    'field_tag' => env('PERLUR_ACCOUNTING_XML_FIELD_TAG', 'field'),
    'field_mapping' => [
        env('PERLUR_ACCOUNTING_XML_FIELD_ID', 'code') =>
            env('PERLUR_ACCOUNTING_XML_MODEL_ID', 'id'),
        env('PERLUR_ACCOUNTING_XML_FIELD_ACCOUNT_NAME', 'name') =>
            env('PERLUR_ACCOUNTING_XML_MODEL_ACCOUNT_NAME', 'account_name'),
        env('PERLUR_ACCOUNTING_XML_FIELD_ACCOUNT_TYPE', 'type') =>
            env('PERLUR_ACCOUNTING_XML_MODEL_ACCOUNT_TYPE', 'account_type'),
        env('PERLUR_ACCOUNTING_XML_FIELD_PARENT_ID', 'parent_id') =>
            env('PERLUR_ACCOUNTING_XML_MODEL_PARENT_ID', 'account_parent_id')
    ]
];
