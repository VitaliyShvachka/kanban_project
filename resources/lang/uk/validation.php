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

    'accepted'             => 'Необхідно прийняти атрибут :attribute.',
    'active_url'           => ':attribute не є дійсною URL-адресою.',
    'after'                => ':attribute має бути датою після :date.',
    'alpha'                => 'Атрибут :може містити лише літери.',
    'alpha_dash'           => 'Атрибут :може містити лише літери, цифри та тире.',
    'alpha_num'            => ':attribute може містити лише літери та цифри.',
    'array'                => ':attribute має бути масивом.',
    'before'               => ':attribute має бути датою перед :date.',
    'between'              => [
        'numeric' => ':attribute має бути між :min та :max.',
        'file'    => ':attribute має бути між :min і :max кілобайтами.',
        'string'  => ':attribute має бути між символами :min і :max.',
        'array'   => ':attribute має містити між елементами :min і :max.',
    ],
    'boolean'              => 'Поле :attribute має мати значення true або false.',
    'confirmed'            => 'Підтвердження :attribute не збігається.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => ':attribute не є дійсною датою.',
    'different'            => ':attribute та :other мають бути різними.',
    'digits'               => ':attribute має бути :digits цифрами.',
    'digits_between'       => ':attribute має бути між :min та :max цифрами.',
    'distinct'             => 'Поле :attribute має повторюване значення.',
    'email'                => ':attribute має бути дійсною електронною адресою.',
    'exists'               => 'Вибраний :attribute недійсний.',
    'filled'                => 'Поле :attribute є обов’язковим.',
    'image'                => ':attribute має бути зображенням.',
    'in'                   => 'Вибраний :attribute недійсний.',
    'in_array'             => 'Поле :attribute не існує в :other.',
    'integer'              => ':attribute має бути цілим числом.',
    'ip'                   => ':attribute має бути дійсною IP-адресою.',
    'json'                 => ':attribute має бути дійсним рядком JSON.',
    'max'                  => [
        'numeric' => ':attribute не може перевищувати :max.',
        'file'    => ':attribute не може бути більшим за :max кілобайт.',
        'string'  => ':attribute не може містити більше :max символів.',
        'array'   => ':attribute не може містити більше ніж :max елементів.',
    ],
    'mimes'                => ':attribute має бути файлом типу: :values.',
    'min'                  => [
        'numeric' => ':attribute має бути принаймні :min.',
        'file'    => ':attribute має бути не менше :min кілобайт.',
        'string'  => ':attribute має містити принаймні :min символів.',
        'array'   => ':attribute має містити принаймні :min елементів.',
    ],
    'not_in'               => 'Вибраний :attribute недійсний.',
    'numeric'              => ':attribute має бути числом.',
    'present'              => 'Поле :attribute має бути присутнім.',
    'regex'                => 'Формат :attribute недійсний.',
    'required'             => 'Поле :attribute є обов’язковим.',
    'required_if'          => 'Поле :attribute є обов’язковим, якщо :other дорівнює :value.',
    'required_unless'      => 'Поле :attribute є обов’язковим, якщо :other не міститься в :values.',
    'required_with'        => 'Поле :attribute є обов’язковим, якщо присутній :values.',
    'required_with_all'    => 'Поле :attribute є обов’язковим, якщо присутній :values.',
    'required_without'     => 'Поле :attribute є обов’язковим, якщо немає :values.',
    'required_without_all' => 'Поле :attribute є обов’язковим, якщо немає жодного з :values.',
    'same'                 => ':attribute та :other мають збігатися.',
    'size'                 => [
        'numeric' => ':attribute має бути :size.',
        'file'    => ':attribute має бути :size кілобайт.',
        'string'  => ':attribute має бути символами :size.',
        'array'   => ':attribute повинен містити елементи :size.',
    ],
    'string'               => ':attribute має бути рядком.',
    'timezone'             => ':attribute має бути дійсною зоною.',
    'unique'               => 'Атрибут : уже використано.',
    'url'                  => 'Формат :attribute недійсний.',
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
        'user_teams' => [
            'unique_team' => 'Цей користувач вже доданий до цієї команди',
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
