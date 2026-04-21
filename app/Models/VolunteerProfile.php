<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'skills', 'availability', 'hours_per_week',
        'total_hours_contributed', 'points', 'experience_level',
        'certifications', 'has_vehicle', 'travel_distance_km',
        'completed_projects', 'rating', 'rating_count',
    ];

    protected $casts = [
        'skills'       => 'array',
        'availability' => 'array',
        'has_vehicle'  => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function allSkills(): array
    {
        return [
            'carpentry'    => 'نجارة',
            'electrical'   => 'كهرباء',
            'plumbing'     => 'سباكة',
            'painting'     => 'دهان',
            'masonry'      => 'بناء وتشييد',
            'ironwork'     => 'حدادة',
            'tiling'       => 'تبليط',
            'plastering'   => 'لياسة',
            'cleaning'     => 'تنظيف وترتيب',
            'logistics'    => 'لوجستيات ونقل',
            'coordination' => 'تنسيق وإدارة',
            'other'        => 'أخرى',
        ];
    }

    public function getBadgeAttribute(): array
    {
        if ($this->points >= 500)      return ['label' => 'بلاتيني', 'color' => '#94a3b8', 'icon' => '🏆'];
        if ($this->points >= 200)      return ['label' => 'ذهبي',    'color' => '#f59e0b', 'icon' => '🥇'];
        if ($this->points >= 100)      return ['label' => 'فضي',     'color' => '#6b7280', 'icon' => '🥈'];
        if ($this->points >= 50)       return ['label' => 'برونزي',  'color' => '#a16207', 'icon' => '🥉'];
        return                                ['label' => 'مبتدئ',   'color' => '#4F7942', 'icon' => '🌱'];
    }

    public function getSkillsArabicAttribute(): array
    {
        $all = self::allSkills();
        return array_filter($all, fn($key) => in_array($key, $this->skills ?? []), ARRAY_FILTER_USE_KEY);
    }
}