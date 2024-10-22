<?php

namespace Modules\User\Enum;



use App\Traits\EnumToArray;

enum RoleEnum: string
{
    use EnumToArray;
    case Admin = 'admin';
    case Normal = 'normal';
}
