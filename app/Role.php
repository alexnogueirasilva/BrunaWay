<?php

declare(strict_types=1);

namespace App;

enum Role: string
{
    case Parent = 'parent';
    case Child = 'child';
}
