<?php

namespace Web136\PhpStack;

use RuntimeException;

class PhpStack
{

    /**
     * @var array
     */
    protected array $data = [];
    /**
     * @var int
     */
    protected int $length = 0;

    /**
     * Добавляет элемент в конец стека
     * @param $value
     * @return void
     */
    public function push($value = null)
    {
        $this->data[$this->length] = $value;
        $this->length++;
    }

    /**
     * Возвращает значение последнего элемента в стеке и удаляет его.
     * В случае, если элементов нет, выбрасывает RuntimeException
     * @return mixed
     * @throws RuntimeException
     */
    public function pop()
    {
        $result = $this->top();
        unset($this->data[$this->length - 1]);
        $this->length--;
        return $result;
    }

    /**
     * Возвращает значение последнего элемента в стеке не удаляя его.
     * В случае, если элементов нет, выбрасывает RuntimeException
     * @return mixed
     * @throws RuntimeException
     */
    public function top()
    {
        if ($this->length < 1) {
            throw new RuntimeException('Structure is empty');
        }

        return $this->data[$this->length - 1];
    }

    /**
     * Возвращает количество элементов
     * @return int
     */
    public function length(): int
    {
        return $this->length;
    }

    /**
     * Проверяет структуру на пустоту
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->length < 1;
    }

}
