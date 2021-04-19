<?php

namespace V1V2;

use Elao\Enum\Enum;

class PlotEnum extends Enum
{
    // getTemperaturePiePlotsAllAge
    public const PIE_TEMP_ALL_STAGE_1   = 'pie_temp_all_stage_1';
    public const PIE_TEMP_ALL_STAGE_2   = 'pie_temp_all_stage_2';

    // getTemperaturePiePlotsByAge
    public const PIE_TEMP_BY_AGE_18_30_STAGE_1   = 'pie_temp_by_age_18_30_stage_1';
    public const PIE_TEMP_BY_AGE_31_40_STAGE_1   = 'pie_temp_by_age_31_40_stage_1';
    public const PIE_TEMP_BY_AGE_41_50_STAGE_1   = 'pie_temp_by_age_41_50_stage_1';
    public const PIE_TEMP_BY_AGE_51_60_STAGE_1   = 'pie_temp_by_age_51_60_stage_1';
    public const PIE_TEMP_BY_AGE_61_80_STAGE_1   = 'pie_temp_by_age_61_80_stage_1';
    public const PIE_TEMP_BY_AGE_18_30_STAGE_2   = 'pie_temp_by_age_18_30_stage_2';
    public const PIE_TEMP_BY_AGE_31_40_STAGE_2   = 'pie_temp_by_age_31_40_stage_2';
    public const PIE_TEMP_BY_AGE_41_50_STAGE_2   = 'pie_temp_by_age_41_50_stage_2';
    public const PIE_TEMP_BY_AGE_51_60_STAGE_2   = 'pie_temp_by_age_51_60_stage_2';
    public const PIE_TEMP_BY_AGE_61_80_STAGE_2   = 'pie_temp_by_age_61_80_stage_2';

    public static function values(): array
    {
        return [
            self::PIE_TEMP_ALL_STAGE_1,
            self::PIE_TEMP_ALL_STAGE_2,
            self::PIE_TEMP_BY_AGE_18_30_STAGE_1,
            self::PIE_TEMP_BY_AGE_31_40_STAGE_1,
            self::PIE_TEMP_BY_AGE_41_50_STAGE_1,
            self::PIE_TEMP_BY_AGE_51_60_STAGE_1,
            self::PIE_TEMP_BY_AGE_61_80_STAGE_1,
            self::PIE_TEMP_BY_AGE_18_30_STAGE_2,
            self::PIE_TEMP_BY_AGE_31_40_STAGE_2,
            self::PIE_TEMP_BY_AGE_41_50_STAGE_2,
            self::PIE_TEMP_BY_AGE_51_60_STAGE_2,
            self::PIE_TEMP_BY_AGE_61_80_STAGE_2,
        ];
    }
}
