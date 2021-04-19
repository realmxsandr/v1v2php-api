<?php

namespace V1V2;

interface PlotInterface
{
    /**
     * @return string[]
     */
    public function getXValues(): array;

    /**
     * @return string[]
     */
    public function getYValues(): array;

    public function getMeta(): PlotMetaInterface;
}
