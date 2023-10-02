<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class GatewayUpdateType extends Enum
{
    const UpdateMessages = 1;
    const UpdateFirewall = 2;
    const UpdateFarming = 3;
    const UpdateForging = 4;
}
