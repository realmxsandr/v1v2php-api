<?php

namespace V1V2;

interface ClientInterface
{
    public function temperaturePiePlotsAllAge(): PlotCollectionInterface;
    public function temperaturePiePlotsByAges(): PlotCollectionInterface;
}
