<?php

namespace V1V2;

interface PlotCollectionInterface
{
    /**
     * @return PlotInterface[]
     */
    public function toArray(): array;

    /**
     * @param PlotEnum[] $plotTypes
     *
     * @return PlotInterface[]
     */
    public function getByPlotTypes(array $plotTypes): array;

    public function getByPlotType(PlotEnum $plotType): PlotInterface;
}
