<?php

namespace V1V2;

class Plot implements PlotInterface
{
    /** @var string[] */
    private $xValues;

    /** @var string[] */
    private $yValues;

    /** @var PlotMetaInterface */
    private $meta;

    public function __construct(PlotMetaInterface $meta, array $xValues, array $yValues)
    {
        $this->xValues = $xValues;
        $this->yValues = $yValues;
        $this->meta = $meta;
    }

    public function getXValues(): array
    {
        return $this->xValues;
    }

    public function getYValues(): array
    {
        return $this->yValues;
    }

    public function getMeta(): PlotMetaInterface
    {
        return $this->meta;
    }
}
