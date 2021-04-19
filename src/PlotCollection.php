<?php

namespace V1V2;

class PlotCollection implements PlotCollectionInterface
{

    /** @var PlotInterface[] */
    private $plots;

    public function __construct(array $plots)
    {
        foreach ($plots as $plot) {
            if (!($plot instanceof PlotInterface)) {
                throw new \InvalidArgumentException(
                    PlotInterface::class . ' expected, ' . get_class($plot) . ' given.'
                );
            }
        }

        $this->plots = $plots;
    }


    public function toArray(): array
    {
        return $this->plots;
    }

    public function getByPlotTypes(array $plotTypes): array
    {
        $result = [];

        foreach ($plotTypes as $plotType) {
            $result[] = $this->getByPlotType($plotType);
        }

        return $result;
    }

    public function getByPlotType(PlotEnum $plotType): PlotInterface
    {
        $result = array_filter(
            $this->toArray(),
            static function(PlotInterface $plot) use ($plotType) {
                return $plotType->equals($plot->getMeta()->getPlotType());
            }
        );

        if (count($result) > 0) {
            return array_shift($result);
        }

        throw new \RuntimeException(
            'Plot collection has no given plot with type ' . $plotType->getValue()
        );
    }
}
