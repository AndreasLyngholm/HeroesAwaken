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

    'accepted'             => 'Le :attribute doit être accepté.',
    'active_url'           => 'Le :attribute n"est pas une URL valide.',
    'after'                => 'Le :attribute doit être une date après :date.',
    'after_or_equal'       => 'Le :attribute doit être une date après ou équivalente à :date.',
    'alpha'                => 'Le :attribute ne peut contenir que des lettres.',
    'alpha_dash'           => 'Le :attribute ne peut contenir que des lettres, chiffres, et tirets.',
    'alpha_num'            => 'Le :attribute ne peut contenir que des lettres et des chiffres.',
    'array'                => 'Le :attribute doit être un tableau.',
    'before'               => 'The :attribute doit être une date avant :date.',
    'before_or_equal'      => 'Le :attribute doit être une date avant ou équivalente à :date.',
    'between'              => [
        'numeric' => 'Le :attribute doit être entre :min et :max.',
        'file'    => 'Le :attribute doit être entre :min et :max kilo octets.',
        'string'  => 'Le :attribute doit être entre :min et :max caractères.',
        'array'   => 'Le :attribute doit être entre :min et :max items.',
    ],
    'boolean'              => 'Le :attribute champ doit être vrai ou faux.',
    'confirmed'            => 'Le :attribute confirmation ne correspond pas.',
    'date'                 => 'The :attribute n''est pas une date valide.',
    'date_format'          => 'Le :attribute ne correspond pas au format :format.',
    'different'            => 'Le :attribute et :other doivent être différent.',
    'digits'               => 'Le :attribute doit être :digits digits.',
    'digits_between'       => 'Le :attribute doit être entre :min and :max digits.',
    'dimensions'           => 'Le :attribute a une dimension d''image invalide.',
    'distinct'             => 'Le :attribute champ a des valeurs dupliquées.',
    'email'                => 'Le :attribute doit-être une adresse email valide.',
    'exists'               => 'Le :attribute choisi n''est pas valide.',
    'file'                 => 'Le :attribute doit être un fichier.',
    'filled'               => 'Le :attribute champ doit avoir une valeur.',
    'image'                => 'Le :attribute doit être une image.',
    'in'                   => 'Le :attribute sélectionné est invalide.',
    'in_array'             => 'Le :attribute champ n''existe pas dans :other.',
    'integer'              => 'Le :attribute doit être un entier.',
    'ip'                   => 'Le :attribute doit être une adresse IP valide.',
    'ipv4'                 => 'The :attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => 'Le :attribute doit être une adresse IPv6 valide.',
    'json'                 => 'Le :attribute doit être une chaîne JSON valide.',
    'max'                  => [
        'numeric' => 'Le :attribute peut ne pas être plus grand que :max.',
        'file'    => 'Le :attribute peut ne pas être meilleur que :max kilo octets.',
        'string'  => 'Le :attribute peut ne pas être plus grand que :max caractère(s).',
        'array'   => 'Le :attribute peut ne pas avoir plus que :max items.',
    ],
    'mimes'                => 'Le :attribute doit être un fichier de type : :values.',
    'mimetypes'            => 'Le :attribute doit être un fichier de type : :values.',
    'min'                  => [
        'numeric' => 'The :attribute doit être au moins :min.',
        'file'    => 'Le :attribute doit être au moins :min kilobytes.',
        'string'  => 'Le :attribute doit être au moins :min characters.',
        'array'   => 'The :attribute doit avoir au moins :min items.',
    ],
    'not_in'               => 'Le :attribute choisi est invalide.',
    'numeric'              => 'Le :attribute doit être un nombre.',
    'present'              => 'Le :attribute champ doit être présent.',
    'regex'                => 'Le :attribute format est invalide.',
    'required'             => 'Le :attribute champ est requis.',
    'required_if'          => 'Le :attribute champ est requis quand :other est :value.',
    'required_unless'      => 'Le :attribute champ est requis sauf si :other est dans :values.',
    'required_with'        => 'Le :attribute champ est requis quand :values est présente.',
    'required_with_all'    => 'Le :attribute champ est requis quand :values est présent.',
    'required_without'     => 'Le :attribute champ est requis quand :values n'est pas présent.',
    'required_without_all' => 'Le :attribute champ est requis quand aucunes des :values sont présentes.',
    'same'                 => 'Le :attribute et :other doivent correspondre.',
    'size'                 => [
        'numeric' => 'Le :attribute doit être :size.',
        'file'    => 'Le :attribute doit être :size kilobytes.',
        'string'  => 'Le :attribute doit être :size caractères.',
        'array'   => 'Le :attribute doit contenir :size items.',
    ],
    'string'               => 'Le :attribute doit être une chaîne.',
    'timezone'             => 'Le :attribute doit être une zone valide.',
    'unique'               => 'Le :attribute a déjà été pris.',
    'uploaded'             => 'Le :attribute a échoué à se mettre en ligne.',
    'url'                  => 'Le :attribute format est invalide.',

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
