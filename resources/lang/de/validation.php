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

    'accepted'             => ':attribute muss akzeptiert werden.',
    'active_url'           => ':attribute ist keine zulässliche URL.',
    'after'                => ':attribute muss ein Datum nach :date sein.',
    'after_or_equal'       => ':attribute muss einem Datum nach oder gleich :date sein.',
    'alpha'                => ':attribute darf nur Buchstaben enthalten.',
    'alpha_dash'           => ':attribute darf nur Buchstaben, Zahlen und Bindestriche enthalten.',
    'alpha_num'            => ':attribute darf nur Buchstaben und Zahlen enthalten.',
    'array'                => ':attribute muss ein Array sein.',
    'before'               => ':attribute muss ein Datum vor :date sein.',
    'before_or_equal'      => ':attribute muss ein Datum vor oder gleich :date sein.',
    'between'              => [
        'numeric' => ':attribute muss zwischen :min und :max. sein',
        'file'    => ':attribute muss zwischen :min und :max Kilobytes sein.',
        'string'  => ':attribute muss zwischen :min und :max Zeichen sein.',
        'array'   => ':attribute muss zwischen :min und :max Objekten sein.',
    ],
    'boolean'              => ':attribute Feld muss true oder false sein.',
    'confirmed'            => ':attribute confirmation does not match.',
    'date'                 => ':attribute ist kein zulässiges Datum.',
    'date_format'          => ':attribute enstrpicht nicht dem Format :format.',
    'different'            => ':attribute und :other müssen sich unterscheiden.',
    'digits'               => ':attribute muss :digits Zahlen sein.',
    'digits_between'       => ':attribute muss zwischen :min und :max Zahlen sein.',
    'dimensions'           => ':attribute hat unzulässige Bildimensionen.',
    'distinct'             => ':attribute Feld hat einen duplizierten Wert.',
    'email'                => ':attribute muss eine echte E-Mail Adresse sein.',
    'exists'               => 'Ausgewähltes :attribute ist nicht zulässig.',
    'file'                 => ':attribute muss eine Datei sein.',
    'filled'               => ':attribute Feld muss einen Wert haben.',
    'image'                => ':attribute muss ein Bild sein.',
    'in'                   => 'Ausgewähltes :attribute ist nicht zulässig.',
    'in_array'             => ':attribute Feld exisitiert nicht in :other.',
    'integer'              => ':attribute muss ein ganzzahliger Wert sein.',
    'ip'                   => ':attribute muss eine zulässige IP-Adresse sein.',
    'ipv4'                 => ':attribute muss eine zulässige IPv4-Adresse sein.',
    'ipv6'                 => ':attribute muss eine zulässige IPv6-Adresse sein.',
    'json'                 => ':attribute muss eine zulüssige JSON Zeichenkette sein.',
    'max'                  => [
        'numeric' => ':attribute darf nicht größer als :max sein.',
        'file'    => ':attribute darf nicht größer als :max Kilobytes sein.',
        'string'  => ':attribute darf nicht mehr als :max Zeichen enthalten.',
        'array'   => ':attribute darf nicht mehr als :max Objekte enthalten.',
    ],
    'mimes'                => ':attribute muss dem Typen: :values entsprechen.',
    'mimetypes'            => ':attribute muss dem Typen: :values entsprechen.',
    'min'                  => [
        'numeric' => ':attribute muss mindestens :min sein.',
        'file'    => ':attribute muss mindestens :min Kilobytes groß sein.',
        'string'  => ':attribute muss mindestens :min Zeichen lang sein.',
        'array'   => ':attribute muss mindestens :min Objekte haben.',
    ],
    'not_in'               => 'Ausgewähltes :attribute ist nicht zulässig.',
    'numeric'              => ':attribute muss eine Zahl sein.',
    'present'              => ':attribute Feld must present sein.',
    'regex'                => ':attribute Format ist nicht zulässig.',
    'required'             => ':attribute Feld wird benötigt.',
    'required_if'          => ':attribute Feld wird benötigt, wenn :other gleich :value ist.',
    'required_unless'      => ':attribute Feld wird benötigt, solange :other in :values vorhanden ist.',
    'required_with'        => ':attribute Feld wird benötigt, wenn :values present ist.',
    'required_with_all'    => ':attribute Feld wir benötigt, wenn :values present ist.',
    'required_without'     => ':attribute Feld wird benötigt, wenn :values nicht present ist.',
    'required_without_all' => ':attribute Feld wird benötigt, wenn keines von :values present ist.',
    'same'                 => ':attribute und :other müssen übereinstimmen.',
    'size'                 => [
        'numeric' => ':attribute muss :size sein.',
        'file'    => ':attribute muss :size Kilobytes groß sein.',
        'string'  => ':attribute muss :size Zeichen lang sein.',
        'array'   => ':attribute muss :size Objekte beinhalten.',
    ],
    'string'               => ':attribute muss eine Zeichenkette sein.',
    'timezone'             => ':attribute muss eine zulässige Zone sein.',
    'unique'               => ':attribute wurde bereits verwendet.',
    'uploaded'             => ':attribute scheiterte beim Hochladen.',
    'url'                  => ':attribute Format ist unzulässig.',

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
