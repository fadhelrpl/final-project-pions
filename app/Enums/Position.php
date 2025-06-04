<?php

namespace App\Enums;

enum Position: string
{
    case PRESIDENT = 'President of Pions';
    case VICE_PRESIDENT = 'Vice President of Pions';
    case VICE_SECRETARY = 'Vice Secretary of Pions';
    case SECRETARY = 'Secretary of Pions';
    case TREASURER = 'Treasurer of Pions';

    case MEDIA_HEAD = 'President of Media Division';
    case EDUCATION_HEAD = 'President of Education Division';
    case EVENT_HEAD = 'President of Event Division';
    case UBUDIYYAH_HEAD = 'President of Ubudiyyah Division';
    case PR_HEAD = 'President of Public Relation';
    case SPORTS_HEAD = 'President of Sports Division';
    case CLEANLINESS_HEAD = 'President of Cleanliness Division';

    case UBUDIYYAH_MEMBER = 'Member of Ubudiyyah Division';
    case PR_MEMBER = 'Member of Public Relation';
    case SPORTS_MEMBER = 'Member of Sports Division';
    case CLEANLINESS_MEMBER = 'Member of Cleanliness Division';
    case MEDIA_MEMBER = 'Member of Media Division';
    case EDUCATION_MEMBER = 'Member of Education Division';
    case EVENT_MEMBER = 'Member of Event Division';

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [$case->value => $case->value])->toArray();
    }

    public static function badgeColors(): array
    {
        return [
            self::PRESIDENT->value => 'success',
            self::VICE_PRESIDENT->value => 'success',
            self::VICE_SECRETARY->value => 'success',
            self::SECRETARY->value => 'success',
            self::TREASURER->value => 'success',

            self::MEDIA_HEAD->value => 'primary',
            self::EDUCATION_HEAD->value => 'primary',
            self::EVENT_HEAD->value => 'primary',
            self::UBUDIYYAH_HEAD->value => 'primary',
            self::PR_HEAD->value => 'primary',
            self::SPORTS_HEAD->value => 'primary',
            self::CLEANLINESS_HEAD->value => 'primary',

            self::UBUDIYYAH_MEMBER->value => 'danger',
            self::PR_MEMBER->value => 'danger',
            self::SPORTS_MEMBER->value => 'danger',
            self::CLEANLINESS_MEMBER->value => 'danger',
            self::MEDIA_MEMBER->value => 'danger',
            self::EDUCATION_MEMBER->value => 'danger',
            self::EVENT_MEMBER->value => 'danger',
        ];
    }
}
