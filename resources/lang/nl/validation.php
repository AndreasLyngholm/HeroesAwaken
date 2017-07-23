<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'De :attribute moet worden geaccepteerd.',
    'active_url'           => 'De :attribute is geen geldige URL.',
    'after'                => 'De :attribute moet een datum zijn na :date.',
    'after_or_equal'       => 'De :attribute moet een datum zijn na of gelijk aan :date.',
    'alpha'                => 'De :attribute mag alleen uit letters bestaan.',
    'alpha_dash'           => 'De :attribute mag alleen uit letters, cijfers en streepjes bestaan.',
    'alpha_num'            => 'De :attribute mag alleen uit letters en cijfers bestaan.',
    'array'                => 'De :attribute moet een rij zijn.',
    'before'               => 'De :attribute moet een datum zijn voor :date.',
    'before_or_equal'      => 'De :attribute moet een datum zijn voor of gelijk aan :date.',
    'between'              => [
        'numeric' => 'De :attribute moet tussen de :min en :max zijn.',
        'file'    => 'De :attribute moet tussen de :min en :max kilobytes zijn.',
        'string'  => 'De :attribute moet tussen de :min en :max karakters zijn.',
        'array'   => 'De :attribute moet tussen de :min en :max items zijn.',
    ],
    'boolean'              => 'De :attribute moet waar of onwaar bevatten.',
    'confirmed'            => 'De :attribute bevestiging komt niet overheen.',
    'date'                 => 'De :attribute geen geldige datum.',
    'date_format'          => 'De :attribute heeft niet het formaat :format.',
    'different'            => 'De :attribute en :other moeten verschillen.',
    'digits'               => 'De :attribute moet :digits cijfers zijn.',
    'digits_between'       => 'De :attribute moet tussen de :min en :max cijfers zijn.',
    'dimensions'           => 'De :attribute heeft ongeldige dimensies voor een plaatje.',
    'distinct'             => 'De :attribute heeft een dubbele waarde.',
    'email'                => 'De :attribute moet een geldig e-mailadres zijn.',
    'exists'               => 'Het geselecteerde :attribute is ongeldig.',
    'file'                 => 'De :attribute moet een bestand zijn.',
    'filled'               => 'De :attribute moet een waarde bevatten.',
    'image'                => 'De :attribute moet een plaatje zijn.',
    'in'                   => 'Het geselecteerde :attribute is ongeldig.',
    'in_array'             => 'Het :attribute veld bestaat niet in :other.',
    'integer'              => 'De :attribute moet een cijfer zijn.',
    'ip'                   => 'De :attribute moet een geldig IP adres zijn.',
    'ipv4'                 => 'De :attribute moet een geldig IPv4 adres zijn.',
    'ipv6'                 => 'De :attribute moet een geldig IPv6 adres zijn.',
    'json'                 => 'De :attribute moet een geldige JSON string zijn.',
    'max'                  => [
        'numeric' => 'De :attribute mag niet groter zijn dan :max.',
        'file'    => 'De :attribute mag niet groter zijn dan :max kilobytes.',
        'string'  => 'De :attribute mag niet meer karakters bevatten dan :max.',
        'array'   => 'De :attribute mag niet meer items bevatten dan :max.',
    ],
    'mimes'                => 'De :attribute moet van het bestandstype zijn :values.',
    'mimetypes'            => 'De :attribute moet van het bestandstype zijn :values.',
    'min'                  => [
        'numeric' => 'De :attribute moet groter zijn dan :min.',
        'file'    => 'De :attribute moet groter zijn dan :min kilobytes.',
        'string'  => 'De :attribute moet op zijn minst :min karakters bevatten.',
        'array'   => 'De :attribute moet op zijn minst :min items hebben.',
    ],
    'not_in'               => 'Het geselecteerde :attribute is ongeldig.',
    'numeric'              => 'De :attribute moet een cijfer zijn.',
    'present'              => 'De :attribute veld moet bestaan..',
    'regex'                => 'De :attribute formaat is ongeldig.',
    'required'             => 'Het :attribute veld is verplicht.',
    'required_if'          => 'Het :attribute veld is verplicht wanneer :other gelijk is aan :value.',
    'required_unless'      => 'Het :attribute veld is verplicht behalve als :other gelijk is aan :values.',
    'required_with'        => 'Het :attribute veld is required when :values is present.',
    'required_with_all'    => 'Het :attribute veld is verplicht wanneer :values bestaan.',
    'required_without'     => 'Het :attribute veld is verplicht wanneer :values niet bestaan.',
    'required_without_all' => 'Het :attribute veld is verplicht wanneer geen van de :values bestaan.',
    'same'                 => 'De :attribute en :other moeten gelijk zijn.',
    'size'                 => [
        'numeric' => 'De :attribute de grootte :size hebben.',
        'file'    => 'De :attribute moet de grootte :size kilobytes hebben.',
        'string'  => 'De :attribute moet :size karakters bevatten.',
        'array'   => 'De :attribute moet bestaan uit :size items.',
    ],
    'string'               => 'De :attribute moet een geldige string zijn.',
    'timezone'             => 'De :attribute must be a valid zone.',
    'unique'               => 'De :attribute is al in gebruik.',
    'uploaded'             => 'De :attribute heeft mislukt tijdens het uploaden.',
    'url'                  => 'De :attribute formaat is ongeldig.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
