<?php

return [
    'main'  => 'Главное меню',
    'start' => [
        'description'   => 'Главное меню, описание, как пользоваться, что умеет.',
        'groups'        => 'Расписание собраний',
        'groups_in'     => 'Собрания в',
        'groups_region' => 'В области',
        'geo'           => 'Ближайшая по геолокации',
        'geo_answer'    => 'Отправьте свою геолокацию (доступно только с телефона).',
        'time'          => 'По времени',
        'channel'       => 'Подписаться на рассылку',
        'channel_post'  => 'Предложить пост в рассылку',
        'clean_time'    => 'Чистое время',
        'admin'         => 'Администрирование',
        'error'         => 'Что-то пошло не так! Пожалуйста, попробуйте ещё раз, через минутку.'
        
    ],
    'group' => [
        'description'   => 'Выберите день.',
        'today'         => 'Сегодня',
        'tomorrow'      => 'Завтра',
        'after'         => 'Послезавтра',
        'mon'           => 'ПН',
        'tue'           => 'ВТ',
        'wed'           => 'СР',
        'thu'           => 'ЧТ',
        'fri'           => 'ПТ',
        'sat'           => 'СБ',
        'sun'           => 'ВС',
        'geo_answer'    => 'Отправьте свою геолокацию (доступно только с телефона).',
        'error'         => 'Что-то пошло не так! Пожалуйста, попробуйте ещё раз, через минутку.'
    ],
    'clean_time' => [
        'description'           => 'Тут вы можете указать своё чистое время, чтобы бот мог поздравить вас.',
        'description_channel'   => 'Тут вы можете указать своё чистое время, чтобы бот мог поздравить вас в нашем телеграм канале.',
        'set'                   => 'Пришлите мне дату с которой вы остаётесь чистым(ой) и я смогу поздравлять вас с очередным месяцем чистоты. Формат даты: 01.01.1992',
        'set_channel'           => 'Пришлите мне дату с которой вы остаётесь чистым(ой) и я смогу поздравлять вас с очередным месяцем чистоты в нашем телеграм канале. Формат даты: 01.01.1992',
        'setted'                => 'Дата чистого времени установлена.',
        'deleted'               => 'Дата чистого времени удалена.',
        'error'                 => 'Ошибка, я не распознал дату, которую вы прислали. Правильный формат даты: 01.01.1992'
    ],
    'days' => [
        'Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'
    ]
];
