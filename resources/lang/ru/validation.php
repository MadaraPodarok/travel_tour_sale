<?php

return [

    /*
    |----------------------------------------------------------------------
    | Сообщения об ошибках валидации
    |----------------------------------------------------------------------
    |
    | Следующие языковые строки содержат стандартные сообщения об ошибках,
    | используемые классом валидатора. Некоторые из этих правил имеют
    | несколько версий, например, правила для размера. Вы можете изменить
    | каждое из этих сообщений здесь.
    |
    */

    'accepted' => ':attribute должен быть принят.',
    'active_url' => ':attribute не является допустимым URL.',
    'after' => ':attribute должен быть датой после :date.',
    'after_or_equal' => ':attribute должен быть датой после или равной :date.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => ':attribute может содержать только буквы, цифры, дефисы и подчеркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'before' => ':attribute должен быть датой до :date.',
    'before_or_equal' => ':attribute должен быть датой до или равной :date.',
    'between' => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file' => ':attribute должен быть между :min и :max килобайтами.',
        'string' => ':attribute должен быть между :min и :max символами.',
        'array' => ':attribute должен содержать от :min до :max элементов.',
    ],
    'boolean' => 'Поле :attribute должно быть истинным или ложным.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'date' => ':attribute не является допустимой датой.',
    'date_equals' => ':attribute должен быть датой, равной :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'different' => ':attribute и :other должны быть разными.',
    'digits' => ':attribute должен содержать :digits цифр.',
    'digits_between' => ':attribute должен быть между :min и :max цифрами.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute имеет дублирующее значение.',
    'email' => ':attribute должен быть допустимым адресом электронной почты.',
    'ends_with' => ':attribute должен заканчиваться одним из следующих значений: :values.',
    'exists' => 'Выбранный :attribute недействителен.',
    'file' => ':attribute должен быть файлом.',
    'filled' => 'Поле :attribute должно иметь значение.',
    'gt' => [
        'numeric' => ':attribute должен быть больше чем :value.',
        'file' => ':attribute должен быть больше чем :value килобайт.',
        'string' => ':attribute должен содержать более :value символов.',
        'array' => ':attribute должен содержать более :value элементов.',
    ],
    'gte' => [
        'numeric' => ':attribute должен быть больше или равен :value.',
        'file' => ':attribute должен быть больше или равен :value килобайт.',
        'string' => ':attribute должен содержать не менее :value символов.',
        'array' => ':attribute должен содержать :value элементов или больше.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'Выбранный :attribute недействителен.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => ':attribute должен быть целым числом.',
    'ip' => ':attribute должен быть допустимым IP-адресом.',
    'ipv4' => ':attribute должен быть допустимым IPv4-адресом.',
    'ipv6' => ':attribute должен быть допустимым IPv6-адресом.',
    'json' => ':attribute должен быть допустимой JSON-строкой.',
    'lt' => [
        'numeric' => ':attribute должен быть меньше чем :value.',
        'file' => ':attribute должен быть меньше чем :value килобайт.',
        'string' => ':attribute должен содержать менее :value символов.',
        'array' => ':attribute должен содержать менее :value элементов.',
    ],
    'lte' => [
        'numeric' => ':attribute должен быть меньше или равен :value.',
        'file' => ':attribute должен быть меньше или равен :value килобайт.',
        'string' => ':attribute должен содержать не более :value символов.',
        'array' => ':attribute не должен содержать более :value элементов.',
    ],
    'max' => [
        'numeric' => ':attribute не может быть больше чем :max.',
        'file' => ':attribute не может быть больше чем :max килобайт.',
        'string' => ':attribute не может содержать более :max символов.',
        'array' => ':attribute не может содержать более :max элементов.',
    ],
    'mimes' => ':attribute должен быть файлом типа: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'min' => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file' => ':attribute должен быть не менее :min килобайт.',
        'string' => ':attribute должен содержать не менее :min символов.',
        'array' => ':attribute должен содержать не менее :min элементов.',
    ],
    'not_in' => 'Выбранный :attribute недействителен.',
    'not_regex' => 'Формат :attribute недопустим.',
    'numeric' => ':attribute должен быть числом.',
    'password' => 'Пароль неверен.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Формат :attribute недопустим.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно для заполнения, если :other не входит в :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда :values присутствуют.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда :values присутствуют.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда :values отсутствуют.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда ни одно из :values отсутствует.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'numeric' => ':attribute должен быть :size.',
        'file' => ':attribute должен быть :size килобайт.',
        'string' => ':attribute должен содержать :size символов.',
        'array' => ':attribute должен содержать :size элементов.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих значений: :values.',
    'string' => ':attribute должен быть строкой.',
    'timezone' => ':attribute должен быть допустимой зоной.',
    'unique' => ':attribute уже занят.',
    'uploaded' => 'Не удалось загрузить :attribute.',
    'url' => 'Формат :attribute недопустим.',
    'uuid' => ':attribute должен быть допустимым UUID.',

    /*
    |----------------------------------------------------------------------
    | Пользовательские языковые строки для валидации
    |----------------------------------------------------------------------
    |
    | Здесь вы можете указать пользовательские сообщения валидации для
    | атрибутов, используя соглашение "attribute.rule" для именования строк.
    | Это позволяет быстро указать конкретную пользовательскую языковую строку
    | для данного правила атрибута.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Пользовательские атрибуты валидации
    |----------------------------------------------------------------------
    |
    | Следующие языковые строки используются для замены плейсхолдера атрибута
    | на что-то более удобочитаемое, например "E-Mail Address" вместо
    | "email". Это помогает сделать наши сообщения более выразительными.
    |
    */

    'attributes' => [],

];