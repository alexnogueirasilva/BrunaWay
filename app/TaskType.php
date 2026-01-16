<?php

declare(strict_types=1);

namespace App;

enum TaskType: string
{
    case Fixed = 'fixed';
    case Flexible = 'flexible';
    case Optional = 'optional';

    public function label(): string
    {
        return match ($this) {
            self::Fixed => 'Fixa',
            self::Flexible => 'Flexível',
            self::Optional => 'Opcional',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::Fixed => 'Horário fixo, não pode ser alterado',
            self::Flexible => 'Pode ser replanejada dentro da janela',
            self::Optional => 'Não obrigatória, mas conta para bônus',
        };
    }
}
