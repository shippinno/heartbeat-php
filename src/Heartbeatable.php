<?php

namespace Shippinno\Heartbeat;

trait Heartbeatable
{
    /**
     * @var Heart
     */
    protected $heart;

    /**
     * @param Heart $heart
     */
    public function setHeart(Heart $heart): void
    {
        $this->heart = $heart;
    }

    /**
     * @return void
     */
    public function heartbeat(): void
    {
        if (is_null($this->heart)) {
            return;
        }
        $this->heart->beat();
    }
}
