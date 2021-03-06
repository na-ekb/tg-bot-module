<?php

return [
    'main'  => 'Главное меню',
    'back'  => 'Назад',
    'yes'   => 'Да',
    'no'    => 'Нет',
    'and'   => 'и',
    'start' => [
        'description'   => 'Анонимные Наркоманы – это некоммерческое Сообщество мужчин и женщин, для которых наркотики стали главной проблемой. Мы – выздоравливающие наркоманы, которые встречаются регулярно для того, чтобы помогать друг другу оставаться чистыми. Это программа полного отказа от всех видов наркотиков. Есть только одно условие для членства в Анонимных Наркоманах – это желание прекратить употреблять.
                            <br><br>Этот бот создан с целью информирования и помощи зависимым и другим людям, кого касается эта тема.
                            <br><br>Скажите кто вы и мы сможем предоставить вам необходимую информацию.',
        'who'           => [
            'novice'        => 'Хочу бросить',
            'profi'         => 'Профессионал',
            'parent'        => 'Родственник/друг',
            'member'        => 'Член сообщества'
        ]
    ],
    'member' => [
        'description'   => 'Главное меню, описание, как пользоваться, что умеет.',
        'groups'        => 'Расписание собраний',
        'groups_in'     => 'Собрания в',
        'groups_region' => 'В области',
        'time'          => 'По времени',
        'channel'       => 'Подписаться на рассылку',
        'channel_post'  => 'Предложить пост в рассылку',
        'clean_time'    => 'Чистое время',
        'jft'           => 'Ежедневник',
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
        'geo'           => 'Ближайшая по геолокации',
        'error'         => 'Что-то пошло не так! Пожалуйста, попробуйте ещё раз, через минутку.'
    ],
    'daily' => [
        'text'          => 'Группы сегодня'
    ],
    'geo' => [
        'description'   => 'Отправьте свою геолокацию (доступно только с телефона).',
        'not_found'     => 'К сожалению собраний на сегодня не найдено.'
    ],
    'jft' => [
        'description'   => 'Медитация на сегодня (время по Москве)',
        'more'          => 'Читать дальше...'
    ],
    'clean_time' => [
        'description'           => 'Тут вы можете указать своё чистое время, чтобы бот мог поздравить вас.',
        'description_channel'   => 'Тут вы можете указать своё чистое время, чтобы бот мог поздравить вас в нашем телеграм канале.',
        'clean'                 => 'Вы чисты :date.',
        'jft'                   => 'первый день',
        'set'                   => 'Пришлите мне дату с которой вы остаётесь чистым(ой) и я смогу поздравлять вас с очередным месяцем чистоты. Формат даты: 01.01.1992',
        'set_channel'           => 'Пришлите мне дату с которой вы остаётесь чистым(ой) и я смогу поздравлять вас с очередным месяцем чистоты в нашем телеграм канале. Формат даты: 01.01.1992',
        'set_again'             => 'Установить другую дату',
        'setted'                => 'Отлично, теперь я буду спрашивать тебя, остался ли ты чистым, в дату твоего юбилея и если да — то поздравлю тебя.',
        'setted_channel'        => 'Отлично, теперь я буду спрашивать тебя, остался ли ты чистым, в дату твоего юбилея и если да — то я смогу опубликовать поздравление в нашем канале.',
        'deleted'               => 'Дата чистого времени удалена.',
        'schedule'              => 'Чисты ли вы сегодня?',
        'private'               => 'Не хочу поздравлений в канале.',
        'congr'                 => 'Поздравляю! Я бы обнял тебя, но у меня нет рук. Возвращайся!',
        'congr_channel'         => 'Поздравляю! Я бы обнял тебя, но у меня нет рук. Возвращайся!',
        'empathy'               => 'Очень жаль, что так произошло. Возвращайся, мы тебя ждём!',
        'error'                 => 'Ошибка, я не распознал дату, которую вы прислали. Попробуйте ещё раз, правильный формат даты: 01.01.1992'
    ],
    'channel' => [
        'congr' => 'Сегодня юбилей чистого времени у <a href="tg://user?id=:userId">:userName</a> — :date! Давайте поздравим от всей души!'
    ],
    'days' => [
        'Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'
    ],
];
