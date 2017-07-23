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

    'accepted'             => ':attribute должен быть одобрен.',
    'active_url'           => ':attribute является некорректной ссылкой.',
    'after'                => 'Дата :attribute должна быть позже :date.',
    'after_or_equal'       => 'Дата :attribute должна быть не раньше :date.',
    'alpha'                => ':attribute может содержать только буквы.',
    'alpha_dash'           => ':attribute может содержать буквы, цифры и дефисы.',
    'alpha_num'            => ':attribute может содержатьтолько буквы и цифры',
    'array'                => ':attribute должен быть массивом',
    'before'               => 'Дата :attribute должна быть раньше :date.',
    'before_or_equal'      => 'Дата :attribute должна быть не позже :date.',
    'between'              => [
        'numeric' => 'Значение :attribute должно находиться между :min и :max.',
        'file'    => 'Размер файла :attribute должен быть между :min и :max килобайт.',
        'string'  => 'Кол-во символов в строке :attribute должно быть между :min и :max.',
        'array'   => 'Кол-во элементов в массиве :attribute должно быть между :min и :max.',
    ],
    'boolean'              => 'Поле :attribute должно быть true или false.',
    'confirmed'            => ':attribute не совпадает с подтверждением.',
    'date'                 => 'Дата :attribute некорректна.',
    'date_format'          => ':attribute не отвечает формату :format.',
    'different'            => ':attribute и :other должны отличаться.',
    'digits'               => ':attribute должен содержать :digits цифр.',
    'digits_between'       => ':attribute должен содержать между :min и :max цифр.',
    'dimensions'           => ':attribute имеет недопустимые размеры изображентя.',
    'distinct'             => 'Поле :attribute  имеет дублированное значение.',
    'email'                => ':attribute должен быть электронным адресом.',
    'exists'               => 'Выбранный :attribute некорректный.',
    'file'                 => ':attribute должен быть файлом.',
    'filled'               => 'Поле :attribute должно иметь значение.',
    'image'                => ':attribute должен быть изображением.',
    'in'                   => 'Выбранный :attribute некорректный.',
    'in_array'             => 'Поле :attribute отсутствует в :other.',
    'integer'              => ':attribute должен быть целым числом.',
    'ip'                   => ':attribute должен быть IP адресом.',
    'ipv4'                 => ':attribute должен быть IPv4 адресом.',
    'ipv6'                 => ':attribute должен быть IPv6 адресом.',
    'json'                 => ':attribute должен быть строкой JSON.',
    'max'                  => [
        'numeric' => 'Значение :attribute должно быть не больше :max.',
        'file'    => 'Размер файла :attribute должен быть не больше :max килобайт.',
        'string'  => 'Кол-во символов в строке :attribute должно быть не более :max.',
        'array'   => 'Кол-во элементов в массиве :attribute должно быть не более :max.',
    ],
    'mimes'                => ':attribute должен быть файлом типа: :values.',
    'mimetypes'            => ':attribute должен быть файлом типа: :values.',
    'min'                  => [
        'numeric' => 'Значение :attribute должно быть не меньше :min.',
        'file'    => 'Размер файла :attribute должен быть не меньше :min килобайт.',
        'string'  => 'Кол-во символов в строке :attribute должно быть не меньше :min.',
        'array'   => 'Кол-во элементов в массиве :attribute должно быть не менее :min.',
    ],
    'not_in'               => 'Выбранный :attribute некорректный.',
    'numeric'              => ':attribute должен быть числом.',
    'present'              => 'Поле :attribute должно присутствовать.',
    'regex'                => 'Формат :attribute недопустим.',
    'required'             => 'Поле :attribute обязательно к заполнению.',
    'required_if'          => 'Поле :attribute обязательно к заполнению, если :other :value.',
    'required_unless'      => 'Поле :attribute обязательно к заполнению, если  :other не :value.',
    'required_with'        => 'Поле :attribute обязательно к заполнению, если имеется :values.',
    'required_with_all'    => 'Поле :attribute обязательно к заполнению, если всё из :values имеется.',
    'required_without'     => 'Поле :attribute нужно заполнить, если не имеется :values.',
    'required_without_all' => 'Поле :attribute нужно заполнить, если ничего из :values не имеется.',
    'same'                 => ':attribute и :other должны совпадать.',
    'size'                 => [
        'numeric' => 'Размер :attribute должен быть :size.',
        'file'    => 'Размер файла :attribute должен быть :size килобайт.',
        'string'  => 'Размер строки :attribute должен быть :size символов.',
        'array'   => 'Массив :attribute должен содержать :size элементов.',
    ],
    'string'               => ':attribute должен быть строкой',
    'timezone'             => ':attribute должен быть зоной.',
    'unique'               => ':attribute уже занят.',
    'uploaded'             => ':attribute не удалось загрузить.',
    'url'                  => 'Формат :attribute недопустим.',

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
