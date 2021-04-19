<?php

namespace V1V2;

class Client
{
    private const DEFAULT_URL = 'https://cov19vacsideeffects.online';

    private const METHOD_PLOT_PIE_TEMP_ALL = '/api/v1/plot/pie/temperature/all_age';
    private const METHOD_PLOT_PIE_TEMP_BY_AGE = '/api/v1/plot/pie/temperature/by_age';
    
    private const KEY_TOKEN = 'token';

    private const RESPONSE_KEY_META             = 'meta';
    private const RESPONSE_KEY_META_PLOT        = 'plot';
    private const RESPONSE_KEY_META_N           = 'n';
    private const RESPONSE_KEY_META_STAGE       = 'stage';
    private const RESPONSE_KEY_META_AGE_MIN     = 'age_min';
    private const RESPONSE_KEY_META_AGE_MAX     = 'age_max';
    private const RESPONSE_KEY_META_TEMP_MIN    = 't_min';
    private const RESPONSE_KEY_META_TEMP_MAX    = 't_max';

    private const RESPONSE_KEY_DATA     = 'data';
    private const RESPONSE_KEY_DATA_X   = 'x';
    private const RESPONSE_KEY_DATA_Y   = 'y';

    /** @var Security */
    private $security;

    /** @var string */
    private $url;

    /** @var string */
    private $key;

    public function __construct(Security $security, string $key, string $url = self::DEFAULT_URL)
    {
        $this->security = $security;
        $this->url = $url;
        $this->key = $key;
    }

    public function getTemperaturePiePlotsAllAge(): PlotCollectionInterface
    {
        return $this->processPlotsResult(
            $this->doRequest(self::METHOD_PLOT_PIE_TEMP_ALL)
        );
    }

    public function getTemperaturePiePlotsByAge(): PlotCollectionInterface
    {
        return $this->processPlotsResult(
            $this->doRequest(self::METHOD_PLOT_PIE_TEMP_BY_AGE)
        );
    }

    private function doRequest(string $method): array
    {
        $ch = \curl_init($this->url . $method);

        \curl_setopt($ch, \CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($ch, \CURLOPT_POSTFIELDS, [self::KEY_TOKEN => $this->security->encrypt($this->key, $this->key)]);

        $response = \curl_exec($ch);
        $error    = \curl_error($ch);
        $errno    = \curl_errno($ch);

        if (\is_resource($ch)) {
            \curl_close($ch);
        }

        if (0 !== $errno) {
            throw new \RuntimeException($error, $errno);
        }

        $response = json_decode($response, JSON_OBJECT_AS_ARRAY);

        if (is_array($response)) {
            return $response;
        }

        throw new \RuntimeException('Failed to json decode');
    }

    private function processPlotsResult(array $plotsRawData): PlotCollectionInterface
    {
        $result = [];

        foreach ($plotsRawData as $plotsRawItem) {
            $plotMeta = new PlotMeta(
                PlotEnum::get($plotsRawItem[self::RESPONSE_KEY_META][self::RESPONSE_KEY_META_PLOT]),
                $plotsRawItem[self::RESPONSE_KEY_META][self::RESPONSE_KEY_META_N],
                is_null($plotsRawItem[self::RESPONSE_KEY_META][self::RESPONSE_KEY_META_STAGE]) ? null : Stage::get($plotsRawItem[self::RESPONSE_KEY_META][self::RESPONSE_KEY_META_STAGE]),
                $plotsRawItem[self::RESPONSE_KEY_META][self::RESPONSE_KEY_META_AGE_MIN],
                $plotsRawItem[self::RESPONSE_KEY_META][self::RESPONSE_KEY_META_AGE_MAX],
                $plotsRawItem[self::RESPONSE_KEY_META][self::RESPONSE_KEY_META_TEMP_MIN],
                $plotsRawItem[self::RESPONSE_KEY_META][self::RESPONSE_KEY_META_TEMP_MAX]
            );

            $result[] = new Plot(
                $plotMeta,
                $plotsRawItem[self::RESPONSE_KEY_DATA][self::RESPONSE_KEY_DATA_X],
                $plotsRawItem[self::RESPONSE_KEY_DATA][self::RESPONSE_KEY_DATA_Y]
            );
        }

        return new PlotCollection($result);
    }
}
