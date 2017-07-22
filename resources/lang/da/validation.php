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

    'accepted'             => 'Den valgte :attribute skal accepteres.',
    'active_url'           => 'Den valgte :attribute er ikke en valid URL.',
    'after'                => 'Den valgte :attribute skal være en dag efter :date.',
    'after_or_equal'       => 'Den valgte:attribute skal være en dag efter eller ligeledes med :date.',
    'alpha'                => 'Den valgte :attribute må kun bestå af bogstaver.',
    'alpha_dash'           => 'Den valgte :attribute må kun bestå af bogstaver, tal og mellemrum.',
    'alpha_num'            => 'Den valgte :attribute må kun indholde bestemte bogstaver eller tal.', 
    'array'                => 'Den valgte :attribute skal være en række.',
    'before'               => 'Den valgte :attribute skal være en dag før :date.',
    'before_or_equal'      => 'Den valgte :attribute skal være en dag før eller ligeledes med :date.',
    'between'              => [
        'numeric' => 'Den valgte :attribute skal være mellem :min og :max.',
        'file'    => 'Den valgte :attribute skal være mellem :min og :max kilobytes.',
        'string'  => 'Den valgte :attribute skal være mellem :min og :max tegn.',
        'array'   => 'Den valgte :attribute skal være mellem :min og :max genstande.',
    ],
    'boolean'              => 'Den valgte :attribute området skal være sandt eller falsk.',
    'confirmed'            => 'Den valgte :attribute bekræftigelse matcher ikke.',
    'date'                 => 'Den valgte:attribute eller ikke en valid dato.',
    'date_format'          => 'Den valgte :attribute matcher ikke formatet :format.',
    'different'            => 'Den valgte :attribute og :other skal være anderledes.',
    'digits'               => 'Den valgte :attribute skal være :digits cifre.',
    'digits_between'       => 'Den valgte :attribute skal være mellem :min and :max cifre.',
    'dimensions'           => 'Den valgte :attribute har invalide billedstørrelse.',
    'distinct'             => 'Den valgte :attribute området har en gengivende værdi.',
    'email'                => 'Den valgte :attribute skal være en valid email.',
    'exists'               => 'Den valgte selected :attribute er invalid.',
    'file'                 => 'Den valgte :attribute skal være en fil.',
    'filled'               => 'Den valgte :attribute området skal have en værdi.',
    'image'                => 'Den valgte :attribute skal være et billed.',
    'in'                   => 'Den valgte selected :attribute er invalid.',
    'in_array'             => 'Den valgte :attribute området eksistere ikke i :other.',
    'integer'              => 'Den valgte :attribute skal være heltal.',
    'ip'                   => 'Den valgte :attribute skal være en valid IP addresse.',
    'ipv4'                 => 'Den valgte :attribute skal være en valid IPv4 addresse.',
    'ipv6'                 => 'Den valgte :attribute skal være en valid IPv6 addresse.',
    'json'                 => 'Den valgte :attribute skal være en valid JSON string.',
    'max'                  => [
        'numeric' => 'Den valgte :attribute må ikke være større end :max.',
        'file'    => 'Den valgte :attribute må ikke være større end :max kilobytes.',
        'string'  => 'Den valgte :attribute må ikke være større end :max characters.',
        'array'   => 'Den valgte :attribute må ikke have flere end :max items.',
    ],
    'mimes'                => 'Den valgte :attribute skal være den rigtige type fil: :values.',
    'mimetypes'            => 'Den valgte :attribute skal være den rigtige type fil: :values.',
    'min'                  => [
        'numeric' => 'Den valgte :attribute skal være mindst :min.',
        'file'    => 'Den valgte :attribute skal være mindst :min kilobytes.',
        'string'  => 'Den valgte :attribute skal være mindst :min characters.',
        'array'   => 'Den valgte :attribute skal være mindst :min items.',
    ],
    'not_in'               => 'The selected :attribute er invalid.',
    'numeric'              => 'The :attribute skal være et tal.',
    'present'              => 'The :attribute området skal være nutid.',
    'regex'                => 'The :attribute formatet er invalid.',
    'required'             => 'The :attribute området er et krav.',
    'required_if'          => 'The :attribute området er et krav når :other er :value.',
    'required_unless'      => 'The :attribute området er et krav medmindre :other er in :values.',
    'required_with'        => 'The :attribute området er et krav når :values er nutid.',
    'required_with_all'    => 'The :attribute området er et krav når :values er nutid.',
    'required_without'     => 'The :attribute området er et krav når :values ikke er nutid.',
    'required_without_all' => 'The :attribute området er et krav når ingen af :values are nutid.',
    'same'                 => 'The :attribute og :other skal matche.',
    'size'                 => [
        'numeric' => 'The :attribute skal være :size.',
        'file'    => 'The :attribute skal være :size kilobytes.',
        'string'  => 'The :attribute skal være :size characters.',
        'array'   => 'The :attribute skal indholde :size items.',
    ],
    'string'               => 'The :attribute skal være en string.',
    'timezone'             => 'The :attribute skal være en valid zone.',
    'unique'               => 'The :attribute er desværre ellerede taget.',
    'uploaded'             => 'The :attribute upload fejlede.',
    'url'                  => 'The :attribute formatet er invalid.',

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
