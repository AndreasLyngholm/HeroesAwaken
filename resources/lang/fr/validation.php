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

    'accepted'             => 'The :attribute doit être accepté.',
    'active_url'           => "The :attribute n''est pas une URL valide.",
    'after'                => 'The :attribute doit être une date après :date.',
    'after_or_equal'       => 'The :attribute doit être une date après ou equivalente à :date.',
    'alpha'                => 'The :attribute ne peut contenir que des lettres.',
    'alpha_dash'           => 'The :attribute ne peut contenir que des lettres, chiffres, et tirets.',
    'alpha_num'            => 'The :attribute ne peut contenir que des lettres et des chiffres.',
    'array'                => 'The :attribute doit être un tableau.',
    'before'               => 'The :attribute doit être une date avant :date.',
    'before_or_equal'      => 'The :attribute doit être une date avant ou équivalente à :date.',
    'between'              => [
        'numeric' => 'The :attribute doit être entre :min et :max.',
        'file'    => 'The :attribute doit être entre :min et :max kilo octets.',
        'string'  => 'The :attribute doit être entre :min et :max charactères.',
        'array'   => 'The :attribute doit être entre :min et :max items.',
    ],
    'boolean'              => 'The :attribute champ doit être vrai ou faux.',
    'confirmed'            => 'The :attribute confirmation ne correspond pas.',
    'date'                 => "The :attribute n''est pas une date valide.",
    'date_format'          => 'The :attribute ne correspond pas au format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute doit être :digits digits.',
    'digits_between'       => 'The :attribute doit être entre :min and :max digits.',
    'dimensions'           => "The :attribute a une dimension d''image invalide.",
    'distinct'             => 'The :attribute champ a des valeurs dupliquées.',
    'email'                => 'The :attribute doit-être une adresse email valide.',
    'exists'               => "The selected :attribute n''est pas valide.",
    'file'                 => 'The :attribute doit être un fichier.',
    'filled'               => 'The :attribute champ doit avoir une valeur.',
    'image'                => 'The :attribute doit être une image.',
    'in'                   => 'The selected :attribute est invalide.',
    'in_array'             => "The :attribute champ n''existe pas dans :other.",
    'integer'              => 'The :attribute doit etre un entier.',
    'ip'                   => 'The :attribute doit être une adresse IP valide.',
    'ipv4'                 => 'The :attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => 'The :attribute doit être une adresse IPv6 valide.',
    'json'                 => 'The :attribute doit être une chaîne JSON valide.',
    'max'                  => [
        'numeric' => 'The :attribute peut ne pas être meilleur que :max.',
        'file'    => 'The :attribute peut ne pas être meilleur que :max kilo octets.',
        'string'  => 'The :attribute peut ne pas être meilleur que :max caractère(s).',
        'array'   => 'The :attribute peut ne pas avoir plus que :max items.',
    ],
    'mimes'                => 'The :attribute doit être un fichier de type : :values.',
    'mimetypes'            => 'The :attribute doit être un fichier de type : :values.',
    'min'                  => [
        'numeric' => 'The :attribute doit être au moins :min.',
        'file'    => 'The :attribute doit être au moins :min kilobytes.',
        'string'  => 'The :attribute doit être au moins :min characters.',
        'array'   => 'The :attribute doit avoir au moins :min items.',
    ],
    'not_in'               => 'The selected :attribute est invalide.',
    'numeric'              => 'The :attribute doit être un nombre.',
    'present'              => 'The :attribute champ doit être présent.',
    'regex'                => 'The :attribute format est invalide.',
    'required'             => 'The :attribute champ est requis.',
    'required_if'          => 'The :attribute champ est requis quand :other is :value.',
    'required_unless'      => 'The :attribute champ est requis sauf si :other is in :values.',
    'required_with'        => 'The :attribute champ est requis quand :values is present.',
    'required_with_all'    => 'The :attribute champ est requis quand :values is present.',
    'required_without'     => 'The :attribute champ est requis quand :values is not present.',
    'required_without_all' => 'The :attribute champ est requis quand aucune des :values are present.',
    'same'                 => 'The :attribute and :other doivent correspondre.',
    'size'                 => [
        'numeric' => 'The :attribute doit être :size.',
        'file'    => 'The :attribute doit être :size kilobytes.',
        'string'  => 'The :attribute doit être :size characters.',
        'array'   => 'The :attribute doit contenir :size items.',
    ],
    'string'               => 'The :attribute doit être une chaîne.',
    'timezone'             => 'The :attribute doit être une zone valide.',
    'unique'               => 'The :attribute a déjà était pris.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format est invalide.',

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
