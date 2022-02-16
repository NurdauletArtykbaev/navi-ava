<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Последующие языковые строки содержат сообщения по-умолчанию, используемые
    | классом, проверяющим значения (валидатором). Некоторые из правил имеют
    | несколько версий, например, size. Вы можете поменять их на любые
    | другие, которые лучше подходят для вашего приложения.
    |
    */

    'accepted' => 'Вы должны принять :attribute.',
    'active_url' => 'Поле :attribute содержит недействительный URL.',
    'after' => 'В поле :attribute должна быть дата после :date.',
    'after_or_equal' => 'В поле :attribute должна быть дата после или равняться :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, дефис и нижнее подчеркивание.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'before' => 'В поле :attribute должна быть дата до :date.',
    'before_or_equal' => 'В поле :attribute должна быть дата до или равняться :date.',
    'between' => [
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'file' => 'Размер файла в поле :attribute должен быть между :min и :max Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть между :min и :max.',
        'array' => 'Количество элементов в поле :attribute должно быть между :min и :max.',
    ],
    'boolean' => 'Поле :attribute должно иметь значение логического типа.',
    'confirmed' => 'Поле :attribute не совпадает с подтверждением.',
    'date' => 'Поле :attribute не является датой.',
    'date_equals' => 'Поле :attribute должно быть датой равной :date.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'different' => 'Поля :attribute и :other должны различаться.',
    'digits' => 'Длина цифрового поля :attribute должна быть :digits.',
    'digits_between' => 'Длина цифрового поля :attribute должна быть между :min и :max.',
    'dimensions' => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute содержит повторяющееся значение.',
    'email' => 'Поле :attribute должно быть действительным электронным адресом.',
    'ends_with' => 'Поле :attribute должно заканчиваться одним из следующих значений: :values',
    'exists' => 'Выбранное значение для :attribute некорректно.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute обязательно для заполнения.',
    'gt' => [
        'numeric' => 'Поле :attribute должно быть больше :value.',
        'file' => 'Размер файла в поле :attribute должен быть больше :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть больше :value.',
        'array' => 'Количество элементов в поле :attribute должно быть больше :value.',
    ],
    'gte' => [
        'numeric' => 'Поле :attribute должно быть больше или равно :value.',
        'file' => 'Размер файла в поле :attribute должен быть больше или равен :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть больше или равно :value.',
        'array' => 'Количество элементов в поле :attribute должно быть больше или равно :value.',
    ],
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для :attribute ошибочно.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть действительным IP-адресом.',
    'ipv4' => 'Поле :attribute должно быть действительным IPv4-адресом.',
    'ipv6' => 'Поле :attribute должно быть действительным IPv6-адресом.',
    'json' => 'Поле :attribute должно быть JSON строкой.',
    'lt' => [
        'numeric' => 'Поле :attribute должно быть меньше :value.',
        'file' => 'Размер файла в поле :attribute должен быть меньше :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть меньше :value.',
        'array' => 'Количество элементов в поле :attribute должно быть меньше :value.',
    ],
    'lte' => [
        'numeric' => 'Поле :attribute должно быть меньше или равно :value.',
        'file' => 'Размер файла в поле :attribute должен быть меньше или равен :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть меньше или равно :value.',
        'array' => 'Количество элементов в поле :attribute должно быть меньше или равно :value.',
    ],
    'max' => [
        'numeric' => 'Поле :attribute не может быть более :max.',
        'file' => 'Размер файла в поле :attribute не может быть более :max Килобайт(а).',
        'string' => 'Количество символов в поле :attribute не может превышать :max.',
        'array' => 'Количество элементов в поле :attribute не может превышать :max.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'min' => [
        'numeric' => 'Поле :attribute должно быть не менее :min.',
        'file' => 'Размер файла в поле :attribute должен быть не менее :min Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть не менее :min.',
        'array' => 'Количество элементов в поле :attribute должно быть не менее :min.',
    ],
    'not_in' => 'Выбранное значение для :attribute ошибочно.',
    'not_regex' => 'Выбранный формат для :attribute ошибочный.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Поле :attribute имеет ошибочный формат.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно для заполнения, когда :other не равно :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.',
    'same' => 'Значения полей :attribute и :other должны совпадать.',
    'size' => [
        'numeric' => 'Поле :attribute должно быть равным :size.',
        'file' => 'Размер файла в поле :attribute должен быть равен :size Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть равным :size.',
        'array' => 'Количество элементов в поле :attribute должно быть равным :size.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться из одного из следующих значений: :values',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть действительным часовым поясом.',
    'unique' => 'Такое значение поля :attribute уже существует.',
    'uploaded' => 'Загрузка поля :attribute не удалась.',
    'url' => 'Поле :attribute имеет ошибочный формат.',
    'uuid' => 'Поле :attribute должно быть корректным UUID.',

    /*
    |--------------------------------------------------------------------------
    | Собственные языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Здесь Вы можете указать собственные сообщения для атрибутов.
    | Это позволяет легко указать свое сообщение для заданного правила атрибута.
    |
    | http://laravel.com/docs/validation#custom-error-messages
    | Пример использования
    |
    |   'custom' => [
    |       'email' => [
    |           'required' => 'Нам необходимо знать Ваш электронный адрес!',
    |       ],
    |   ],
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Собственные названия атрибутов
    |--------------------------------------------------------------------------
    |
    | Последующие строки используются для подмены программных имен элементов
    | пользовательского интерфейса на удобочитаемые. Например, вместо имени
    | поля "email" в сообщениях будет выводиться "электронный адрес".
    |
    | Пример использования
    |
    |   'attributes' => [
    |       'email' => 'электронный адрес',
    |   ],
    |
    */

    'attributes' => [

        'name' => 'Название',
        'name.en' => 'Название на английском',
        'name.ru' => 'Название на русском',
        'name.kk' => 'Название на казахском',

        'icon' => 'Иконка',
        'new_icon' => 'Иконка',

        'info' => 'Информация',
        'info.en' => 'Информация на английском',
        'info.ru' => 'Информация на русском',
        'info.kk' => 'Информация на казахском',

        'contact_person' => 'Контактное лицо',
        'phone_1' => 'Номера телефонов',
        'phone_2' => 'Номера телефонов',
        'logo' => 'Логотип',

        'description' => 'Описание',
        'description.en' => 'Описание на английском',
        'description.ru' => 'Описание на русском',
        'description.kk' => 'Описание на казахском',

        'legend' => 'Легенда',
        'legend.en' => 'Легенда на английском',
        'legend.ru' => 'Легенда на русском',
        'legend.kk' => 'Легенда на казахском',

        'address' => 'Адрес',
        'address.en' => 'Адрес на английском',
        'address.ru' => 'Адрес на русском',
        'address.kk' => 'Адрес на казахском',

        'city' => 'Город',
        'city.en' => 'Город на английском',
        'city.ru' => 'Город на русском',
        'city.kk' => 'Город на казахском',

        'program' => 'Программа',
        'program.en' => 'Программа на английском',
        'program.ru' => 'Программа на русском',
        'program.kk' => 'Программа на казахском',

        'warning' => 'Предупреждение',
        'warning.en' => 'Предупреждение на английском',
        'warning.ru' => 'Предупреждение на русском',
        'warning.kk' => 'Предупреждение на казахском',

        'question' => 'Вопрос',
        'question.en' => 'Вопрос на английском',
        'question.ru' => 'Вопрос на русском',
        'question.kk' => 'Вопрос на казахском',

        'answer' => 'Ответ',
        'answer.en' => 'Ответ на английском',
        'answer.ru' => 'Ответ на русском',
        'answer.kk' => 'Ответ на казахском',
        'walk_distance' => 'Расстояние на машине',
        'car_distance' => 'Расстояние пешком',
        'text' => 'Текст',
        'text.en' => 'Текст на английском',
        'text.ru' => 'Текст на русском',
        'text.kk' => 'Текст на казахском',
        'gathering_place' => 'Место сбора',
        'gathering_place.en' => 'Место сбора на английском',
        'gathering_place.ru' => 'Место сбора на русском',
        'gathering_place.kk' => 'Место сбора на казахском',

        'participants' => 'Участники',
        'participants.*.full_name' => 'Имя участника',
        'participants.*.phone' => 'Телефон участника',

        'order_number' => 'Код',
        'user_name' => 'Имя',
        'location_id' => 'Локация',
        'image' => 'Фото',
        'main_image' => 'Главная изображения',
        'price' => 'Цена',
        'old_price' => 'Старая цена',
        'is_discount' => 'Скидка',
        'gathering_place_link' => 'Место сбора (2ГИС ссылка)',
        'departure_date' => 'Дата выезда',
        'arrival_date' => 'Дата приезда',
        'category_id' => 'Категория',
        'address_link' => '2ГИС ссылка',
        'is_active' => 'Активная',
        'notification_type_id' => 'Тип уведомлений',
        'status' => 'Статус',
        'card_number' => 'Номер карты',
        'full_name' => 'ФИО',
        'comment' => 'Комментария',
        'iin' => 'ИИН',
        'receipt' => 'Чек',

        'token' => 'Токен',
        'username' => 'Никнейм',
        'about_me' => 'Обо мне',
        'email' => 'E-Mail адрес',
        'first_name' => 'Имя',
        'last_name' => 'Фамилия',
        'password' => 'Пароль',
        'new_password' => 'Новый пароль',
        'password_confirmation' => 'Подтверждение пароля',
        'new_password_confirmation' => 'Подтверждение нового пароля',
        'country' => 'Страна',
        'phone' => 'Телефон',
        'mobile' => 'Моб. номер',
        'age' => 'Возраст',
        'sex' => 'Пол',
        'gender' => 'Пол',
        'day' => 'День',
        'month' => 'Месяц',
        'year' => 'Год',
        'hour' => 'Час',
        'minute' => 'Минута',
        'second' => 'Секунда',
        'title' => 'Наименование',
        'content' => 'Контент',
        'excerpt' => 'Выдержка',
        'date' => 'Дата',
        'time' => 'Время',
        'available' => 'Доступно',
        'size' => 'Размер',
        'rating' => 'Рейтинг',
        'old_phone' => 'Старый номер телефона',
        'new_phone' => 'Новый номер телефона',
        'code' => 'Код',
        'AccountId' => 'ID пользователя',
        'current_answer_number' => 'Правильный ответ',
        'answer_1' => 'Ответ A',
        'answer_2' => 'Ответ B',
        'answer_3' => 'Ответ C',
        'answer_4' => 'Ответ D',
        'answer_5' => 'Ответ Е',
        'video_1' => 'Видео 1',
        'video_2' => 'Видео 2',
        'video_3' => 'Видео 3',
        'file_1' => 'Материал 1',
        'file_2' => 'Материал 2',
        'file_3' => 'Материал 3',
        'old_password' => 'Текущий пароль',
        'certifications.*.name' => 'Название',
        'certifications.*.description' => 'Описание',
        'certifications.*.image' => 'Фото',
    ],
];
