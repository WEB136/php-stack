# Структура данных стек на php

## Для чего?

В первую очередь в учебных целях.
Данный код не рассчитан на использование в продакшене.
Данный код никак не может конкурировать с [SplStack](https://www.php.net/manual/ru/class.splstack.php) по функциональности и с обычным массивом по быстродействию.

## Использование

### Установка

Я пропущу пункт с установкой, потому как не рассчитываю, что кому-то понадобится этот код. Соответственно, не собираюсь его публиковать на [Packagist](https://packagist.org/).

Если вы все же решите, что именно этот класс вам нужен, воспользуйтесь этой [инструкцией](https://getcomposer.org/doc/05-repositories.md#loading-a-package-from-a-vcs-repository).

### Создание экземпляра
Для использования нужно создать объект. У конструктора нет параметров.
```php
$Stack = new \Web136\PhpStack\PhpStack();
```

Свежесозданный объект пуст. Количество элементов 0.

```php

$Stack = new \Web136\PhpStack\PhpStack();
echo $Stack->length(); // 0
var_dump($Stack->isEmpty()); // boolean: true

```

### Добавление элементов

Эта картина меняется, стоит нам добавить первый элемент
```php
$Stack = new \Web136\PhpStack\PhpStack();
$Stack->push('Some value');
echo $Stack->length(); // 1
var_dump($Stack->isEmpty()); // boolean: false
```

### Получение элементов

Как и положено, при работе со стеком нам доступен только первый элемент. Мы можем получить его значение как без удаления, так и удалив:

```php

$Stack = new \Web136\PhpStack\PhpStack();
$Stack->push('Some value');
echo $Stack->length(); // 1
var_dump($Stack->isEmpty()); // boolean: false

// Получение значения без удаления
echo $Stack->top()// Some value
echo $Stack->length(); // 1
var_dump($Stack->isEmpty()); // boolean: false

// Получение значения с удалением
echo $Stack->pop()// Some value
echo $Stack->length(); // 0
var_dump($Stack->isEmpty()); // boolean: true

```

Однако, при попытке получить элемент из пустой структуры (не имеет значения, с удалением или без), получим исключение ```RuntimeException```:

```php

$Stack = new \Web136\PhpStack\PhpStack();
echo $Stack->length(); // 0
var_dump($Stack->isEmpty()); // boolean: true

$Stack->top(); // RuntimeException

```
