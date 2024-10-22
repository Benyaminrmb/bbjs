<?php

namespace Modules\User\Enum;

use App\Traits\EnumToArray;

enum UserEntryTypeEnum: string
{
    use EnumToArray;
    case phone_number = 'phone_number';
    case email = 'email';
}
