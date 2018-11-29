<?php
declare(strict_types=1);

namespace Shippinno\Heartbeat;

interface Heart
{
    /**
     * @param mixed $channel
     */
    public function beat($channel): void;
}
