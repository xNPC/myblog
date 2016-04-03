<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 22.03.2016
 * Time: 22:00
 */
return [
    'post1' => [
        'title' => 'Yii 2 собирается разделить репозиторий',
        'alias' => 'yii2-sobiraetsya-razdelit-repositoriy',
        'anons' => 'Для ускорения процесса релизов и того, чтобы придать официальным расширениям большую независимость мы думаем разделить расширения и шаблоны приложений на отдельные проекты GitHub. Ниже приведён предварительный план. Прежде чем что-либо менять мы хотели бы услышать ваше мнение и возможные предложения. Спасибо!

UPD: отклик был положительный, разделили.',
        'content' => 'Для ускорения процесса релизов и того, чтобы придать официальным расширениям большую независимость мы думаем разделить расширения и шаблоны приложений на отдельные проекты GitHub. Ниже приведён предварительный план. Прежде чем что-либо менять мы хотели бы услышать ваше мнение и возможные предложения. Спасибо!

UPD: отклик был положительный, разделили.

Организация проекта

Отделить официальные расширения и шаблоны приложений от основного кода в отдельные независимые проекты GitHub.

Каждое расширение или приложение продолжит использовать то же имя для сохранения обратной совместимости. Например, расширение yii2-gii будет разрабатываться в проекте yiisoft/yii2-gii.
Документация переедет в директорию "docs” того же проекта. Документация по API будет генерироваться автоматически при релизе расширения или шаблона приложения.
Тесты переедут в репозитории расширений в директорию "tests".
Переводы сообщений и другие мета-данные переедут в репозиторий расширения.
Issue переедут в каждое отдельное расширение.
Релизы будут независимы от основного фреймворка.',
        'author_id' => '1',
        'category_id' => '2',
        'status' => '10',
        'created_at' => time(),
        'updated_at' => time(),
    ],

    'post2' => [
        'title' => 'DevConf 2014, отчёт',
        'alias' => 'DevConf-2014-otchet',
        'anons' => '14 июня, почти месяц назад, в Москве прошла одна из лучших разработческих конференций DevConf. Сразу опубликовать отчёт не вышло, но лучше сейчас, чем никогда, ведь рассказать есть о чём.',
        'content' => '14 июня, почти месяц назад, в Москве прошла одна из лучших разработческих конференций DevConf. Сразу опубликовать отчёт не вышло, но лучше сейчас, чем никогда, ведь рассказать есть о чём.

DevConf каждый год радует своей PHP-секцией. В этом году я практически из неё не вылезал и могу сказать, что она была довольно интересна.

Открывал секцию я с рассказом про Yii 2.0. Слайды остались практически те же, что были на UWDC, но рассказал совсем по-другому. Часто открывать секцию тяжело, но в случае DevConf это не так. Аудитория очень бодрая, у всех горят глаза и много вопросов. Очень приятно.

Далее был доклад про архитектуру AVITO.ru. Все крупные проекты разные. В каждом случае какие-то решения работают, какие-то нет и технологии надо подбирать в зависимости от имеющихся проблем и особенностей. От себя могу порекомендовать по теме ruhighload.com. Слайдов с доклада не нашлось.

Далее Дмитрий Стогов из Zend рассказывал про phpng — экспериментальную совместимую ветку PHP, призванную приблизить производительность PHP из коробки к HHVM. Штука пока неоднозначная, уже начала вызывать сильное бурление в php internals и не ясно, будет ли принята, но в любом случае доклад получился довольно интересный.

Михаил Боднарчук бодро рассказал про Codeception. Проект замечательный, всем советую.

Доклад про Pinboard + pinba я пропустил. Общался со старыми знакомыми и сообществом. А вот рассказ про Laravel послушал. Shawn McCool неплохо рассказывает и поговорить с ним интересно, но, на многие вопросы у него нет ответов. Конечно, хотелось бы пообщаться непосредственно с Taylor Otwell. Надеюсь, будет такая возможность на следующем DevConf.

Далее были «PHPCI: Система непрерывной интеграции для PHP-проектов» и «Асинхронный PHP - миф? Реальность!».

Закрывали секцию Иван Матвеев, Григорий Кочанов и я с холиварной темой про оператор @. Формат рассказа в три докладчика с постоянным общением с аудиторией для меня новый. Было интересно и, вроде, получилось. Доступно видео.

На тему фото, других отчётов и слайдов можно порыть официальный твиттер и посмотреть остальную программу.

Спасибо организаторам и участникам, всё было замечательно!',
        'author_id' => '1',
        'category_id' => '1',
        'status' => '10',
        'created_at' => time(),
        'updated_at' => time(),
    ],

    'post3' => [
        'title' => 'Переводим Yii 2.0 на русский',
        'alias' => 'perevodim-yii2-0-na-russkiy',
        'anons' => 'Наконец, подготовил всё для начала перевода документации Yii 2.0 на родной язык. Оригиналы пока готовы не все, но их достаточно, чтобы начать работу.

Самостоятельно перевёл только оглавление. Остальное оставляю тем, кто хочет помочь фреймворку.

Как работать над переводом на русский
Обсуждаем процесс и термины',
        'content' => 'Наконец, подготовил всё для начала перевода документации Yii 2.0 на родной язык. Оригиналы пока готовы не все, но их достаточно, чтобы начать работу.

Самостоятельно перевёл только оглавление. Остальное оставляю тем, кто хочет помочь фреймворку.

Как работать над переводом на русский
Обсуждаем процесс и термины',
        'author_id' => '1',
        'category_id' => '1',
        'status' => '10',
        'created_at' => time(),
        'updated_at' => time(),
    ],

];