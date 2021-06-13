<?php

declare(strict_types=1);

class Form
{
    public function open(): string
    {
        return '<form>';
    }

    public function close(): string
    {
        return '</form>';
    }

    public function input(
        string $id,
        string $label,
        string $name = '',
        string $type = 'text',
        string $placeholder = 'Digite aqui',
        int $required = 0
    ): string {

        $name = $name !== '' ? $name : $id;

        $className = "form-control";

        $obrigatorio = $required == 1 ? 'required' : '';

        if ($type === 'radio') {
            $className = '';
        }

        return "
      <label for='{$id}'>{$label}</label>
      <input class='{$className}' type='{$type}' placeholder='{$placeholder}' name='{$name}' id='{$id}' {$obrigatorio}>
      <br>
    ";
    }


    public function password(
        string $id,
        string $label,
        string $name = '',
        string $placeholder = 'Digite aqui a senha',
        int $required = 0
    ): string {
        return $this->input($id, $label, $name, 'password', $placeholder, $required);
    }

    public function radio(
        string $id,
        string $label,
        string $name = ''
    ): string {
        self::input($id, $label, $name, 'radio');
    }

    public function submit(string $text = 'Enviar'): string
    {
        return "<button class='btn btn-primary'>{$text}</button>";
    }
}