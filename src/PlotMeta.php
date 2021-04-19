<?php

namespace V1V2;

class PlotMeta implements PlotMetaInterface
{
    /** @var PlotEnum */
    private $plotType;

    /** @var int */
    private $n;

    /** @var ?Stage */
    private $stage;

    /** @var ?int */
    private $ageMin;

    /** @var ?int */
    private $ageMax;

    /** @var ?float */
    private $temperatureMin;

    /** @var ?float */
    private $temperatureMax;

    public function __construct(PlotEnum $plotType,
                                int $n,
                                ?Stage $stage = null,
                                ?int $ageMin = null,
                                ?int $ageMax = null,
                                ?float $temperatureMin = null,
                                ?float $temperatureMax = null
    )
    {
        $this->plotType = $plotType;
        $this->n = $n;
        $this->stage = $stage;
        $this->ageMin = $ageMin;
        $this->ageMax = $ageMax;
        $this->temperatureMin = $temperatureMin;
        $this->temperatureMax = $temperatureMax;
    }


    public function getPlotType(): PlotEnum
    {
        return $this->plotType;
    }

    public function getN(): int
    {
        return $this->n;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function getAgeMin(): ?int
    {
        return $this->ageMin;
    }

    public function getAgeMax(): ?int
    {
        return $this->ageMax;
    }

    public function getTemperatureMin(): ?float
    {
        return $this->temperatureMin;
    }

    public function getTemperatureMax(): ?float
    {
        return $this->temperatureMax;
    }
}

