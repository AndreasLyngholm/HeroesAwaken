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

    'accepted'             => ':attribute on hyväksyttävä.',
    'active_url'           => ':attribute ei ole kelpaava URL.',
    'after'                => ':attribute on oltava :date jälkeinen päivämäärä.',
    'after_or_equal'       => ':attribute on oltava :date jälkeinen tai sama päivämäärä.',
    'alpha'                => ':attribute voi sisältää ainoastaan kirjaimia.',
    'alpha_dash'           => ':attribute voi sisältää ainoastaan kirjaimia, numeroita, ja viivoja.',
    'alpha_num'            => ':attribute voi sisältää ainoastaan kirjaimia ja numeroita.',
    'array'                => ':attribute on oltava taulukko.',
    'before'               => ':attribute on oltava päivämäärä ennen :date.',
    'before_or_equal'      => ':attribute on oltava päivämäärä ennen tai sama kuin :date.',
    'between'              => [
        'numeric' => ':attribute on oltava :min - :max.',
        'file'    => ':attribute on oltava :min - :max kilobittiä.',
        'string'  => ':attribute on oltava :min - :max merkkiä.',
        'array'   => ':attribute täytyy olla :min - :max kohdetta.',
    ],
    'boolean'              => ':attribute kentän on oltava true tai false.',
    'confirmed'            => ':attribute vahvistus ei täsmää.',
    'date'                 => ':attribute ei ole kelpaava päivämäärä.',
    'date_format'          => ':attribute ei täsmää muotoon :format.',
    'different'            => ':attribute ja :other on oltava erilaisia.',
    'digits'               => ':attribute on oltava :digits numeroa.',
    'digits_between'       => ':attribute täytyy olla :min - :max numeroa.',
    'dimensions'           => ':attribute omaa väärät mittasuhteet.',
    'distinct'             => ':attribute kentällä on kaksoisarvo.',
    'email'                => ':attribute on oltava kelpaava sähköpostiosoite.',
    'exists'               => 'Valittu :attribute ei kelpaa.',
    'file'                 => ':attribute on oltava tiedosto.',
    'filled'               => ':attribute kentällä on oltava arvo.',
    'image'                => ':attribute on oltava kuva.',
    'in'                   => 'Valittu :attribute ei kelpaa.',
    'in_array'             => ':attribute kenttää ei löydy :other.',
    'integer'              => ':attribute on oltava kokonaisluku.',
    'ip'                   => ':attribute on oltava kelpaava IP osoite.',
    'ipv4'                 => ':attribute on oltava kelpaava IPv4 osoite.',
    'ipv6'                 => ':attribute on oltava kelpaava IPv6 osoite.',
    'json'                 => ':attribute on oltava kelpaava JSON merkkijono.',
    'max'                  => [
        'numeric' => ':attribute ei voi olla suurempi kuin :max.',
        'file'    => ':attribute ei voi olla suurempi kuin :max kilobittiä.',
        'string'  => ':attribute ei voi olla pidempi kuin :max merkkiä.',
        'array'   => ':attribute ei voi sisältää enemmän kuin :max kohdetta.',
    ],
    'mimes'                => ':attribute on oltava tiedostomuotoa: :values.',
    'mimetypes'            => ':attribute on oltava tiedostomuotoa: :values.',
    'min'                  => [
        'numeric' => ':attribute on oltava vähintään :min.',
        'file'    => ':attribute on oltava vähintään :min kilobittiä.',
        'string'  => ':attribute on oltava vähintään :min merkkiä.',
        'array'   => ':attribute täytyy sisältää vähintään :min kohdetta.',
    ],
    'not_in'               => 'Valittu :attribute ei kelpaa.',
    'numeric'              => ':attribute on oltava numero.',
    'present'              => ':attribute taulukon on oltava paikalla.',
    'regex'                => ':attribute muoto ei kelpaa.',
    'required'             => ':attribute on pakollinen kenttä.',
    'required_if'          => ':attribute kenttä on pakollinen kun :other on :value.',
    'required_unless'      => ':attribute kenttä on pakollinen paitsi jos :other sisältyy :values.',
    'required_with'        => ':attribute kenttä on pakollinen kun :values on läsnä.',
    'required_with_all'    => ':attribute kenttä on pakollinen kun :values on läsnä.',
    'required_without'     => ':attribute kenttä on pakollinen kun :values ei ole läsnä.',
    'required_without_all' => ':attribute kenttä on pakollinen kun yksikään :values ei ole läsnä.',
    'same'                 => ':attribute ja :other on täsmättävä.',
    'size'                 => [
        'numeric' => ':attribute on oltava :size.',
        'file'    => ':attribute on oltava :size kilobittiä.',
        'string'  => ':attribute on oltava :size merkkiä.',
        'array'   => ':attribute täytyy sisältää :size kohdetta.',
    ],
    'string'               => ':attribute on oltava merkkijono.',
    'timezone'             => ':attribute on oltava kelpaava vyöhyke.',
    'unique'               => ':attribute on jo käytössä.',
    'uploaded'             => ':attribute lataaminen epäonnistui.',
    'url'                  => ':attribute muoto ei kelpaa.',

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
