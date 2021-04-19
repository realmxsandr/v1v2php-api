<?php

namespace V1V2;

interface PlotMetaInterface
{
    public function getPlotType(): PlotEnum;

    public function getN(): int;

    public function getStage(): ?   Stage;

    public function getAgeMin(): ?int;

    public function getAgeMax(): ?int;

    public function getTemperatureMin(): ?float;

    public function getTemperatureMax(): ?float;
}
