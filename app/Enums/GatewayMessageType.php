<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class GatewayMessageType extends Enum
{
    const Blue = 0;
    const Box = 1;
    const Red = 2;
    const World = 3;
}
