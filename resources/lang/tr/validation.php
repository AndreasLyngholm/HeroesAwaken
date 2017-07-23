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

    'accepted'             => 'Bu :attribute kabul edilmelidir.',
    'active_url'           => ':attribute Geçerli bir URL değil.',
    'after'                => ':attribute tarihten sonraki bir :date olmalıdır.',
    'after_or_equal'       => ':attribute tarihten veya sonrasına ait bir :date olmalıdır',
    'alpha'                => ':attribute yalnızca harf içerebilir.',
    'alpha_dash'           => ':attribute yalnızca harf, rakam ve çizgi içerebilir.',
    'alpha_num'            => ':attribute yalnızca harf ve rakam içerebilir.',
    'array'                => ':attribute bir dizi olmalıdır.',
    'before'               => ':attribute bir tarihten önce olmalıdır :date.',
    'before_or_equal'      => ':attribute tarihten önce veya ona eşit bir tarih olmalıdır :date.',
    'between'              => [
        'numeric' => ':attribute :min ve :max arasında olmalıdır.',
        'file'    => ':attribute :min ve :max kilobayt arasında olmalıdır.',
        'string'  => ':attribute :min ve :max karakterleri arasında olmalıdır.',
        'array'   => ':attribute :min ve :max öğeleri arasında olmalıdır.',
    ],
    'boolean'              => ':attribute alanı doğru veya yanlış olmalıdır.',
    'confirmed'            => ':attribute doğrulaması eşleşmiyor.',
    'date'                 => ':attribute geçerli bir tarih değil.',
    'date_format'          => ':attribute biçimiyle eşleşmiyor :format.',
    'different'            => ':attribute ve :other farklı olmalıdır.',
    'digits'               => ':attribute :digits basamakları olmalıdır.',
    'digits_between'       => ':attribute :min ve :max haneleri arasında olmalıdır.',
    'dimensions'           => ':attribute geçersiz görüntü boyutlarına sahip.',
    'distinct'             => ':attribute alanı yinelenen bir değere sahiptir.',
    'email'                => ':attribute geçerli bir e-posta adresi olmalıdır.',
    'exists'               => 'Seçilen :attribute geçersiz.',
    'file'                 => ':attribute bir dosya olmalıdır.',
    'filled'               => ':attribute alanının bir değeri olmalıdır.',
    'image'                => ':attribute bir resim olmalıdır.',
    'in'                   => 'Seçilen :attribute geçersiz.',
    'in_array'             => ':attribute alanı, diğerinde yok.',
    'integer'              => ':attribute bir tamsayı olmalıdır.',
    'ip'                   => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4'                 => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6'                 => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json'                 => ':attribute geçerli bir JSON dizesi olmalıdır.',
    'max'                  => [
        'numeric' => ':attribute aşağıdakilerden daha büyük olmayabilir :max.',
        'file'    => ':attribute :max kilobayttan fazla olmayabilir.',
        'string'  => ':attribute :max karakterden büyük olamaz.',
        'array'   => ':attribute :max öğelerden fazla olamaz.',
    ],
    'mimes'                => ':attribute type: :values bir dosyası olmalıdır.',
    'mimetypes'            => ':attribute type: :values bir dosyası olmalıdır.',
    'min'                  => [
        'numeric' => ':attribute en azından :min dakika olmalıdır.',
        'file'    => ':attribute en azından :min kilobayt olmalıdır.',
        'string'  => ':attribute en azından :min karakter olmalıdır.',
        'array'   => ':attribute en azından :min dakika öğeleri olmalıdır.',
    ],
    'not_in'               => 'Seçilen :attribute geçersiz.',
    'numeric'              => ':attribute bir sayı olmalıdır.',
    'present'              => ':attribute alanı bulunmalıdır.',
    'regex'                => ':attribute biçimi geçersiz.',
    'required'             => ':attribute alanı gerekiyor.',
    'required_if'          => ':attribute alanı, :other ve :values durumlarda gereklidir.',
    'required_unless'      => ':attribute alanı, :other ve :values şartlar haricinde gereklidir.',
    'required_with'        => ':attribute alanı, şu durumlarda gereklidir :values mevcut',
    'required_with_all'    => ':values varsa :attribute alanı gerekir.',
    'required_without'     => ':values mevcut olmadığında, :attribute alanı zorunludur.',
    'required_without_all' => 'Hiçbir :values bulunmadığında :attribute alanı gereklidir.',
    'same'                 => ':attribute ve :other eşleşmelidir.',
    'size'                 => [
        'numeric' => ':attribute, :size olmalıdır.',
        'file'    => ':attribute, :size kilobayt olmalıdır.',
        'string'  => ':attribute, :size karakter olmalıdır.',
        'array'   => ':attribute, :size öğeleri içermelidir.',
    ],
    'string'               => ':attribute bir dize olmalıdır.',
    'timezone'             => ':attribute geçerli bir bölge olmalıdır.',
    'unique'               => ':attribute zaten alındı.',
    'uploaded'             => ':attribute yüklenemedi.',
    'url'                  => ':attribute biçimi geçersiz.',

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
