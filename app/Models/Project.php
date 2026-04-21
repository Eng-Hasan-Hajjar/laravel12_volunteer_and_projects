<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_id', 'title', 'description', 'type', 'status', 'priority',
        'damage_percentage', 'address', 'city', 'latitude', 'longitude',
        'required_skills', 'volunteers_needed', 'volunteers_assigned',
        'estimated_days', 'start_date', 'end_date', 'progress_percentage',
        'before_images', 'after_images', 'rejection_reason', 'notes',
        'estimated_cost', 'actual_cost',
    ];

    protected $casts = [
        'required_skills' => 'array',
        'start_date'      => 'date',
        'end_date'        => 'date',
    ];

    // ─── Relationships ───────────────────────────────────────
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function volunteers()
    {
        return $this->belongsToMany(User::class, 'project_volunteer')
                    ->withPivot('status', 'role', 'joined_at', 'hours_contributed')
                    ->withTimestamps();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function updates()
    {
        return $this->hasMany(ProjectUpdate::class)->latest();
    }

    public function applications()
    {
        return $this->hasMany(VolunteerApplication::class);
    }

    // ─── Scopes ──────────────────────────────────────────────
    public function scopeApproved($q)    { return $q->where('status', 'approved'); }
    public function scopeInProgress($q)  { return $q->where('status', 'in_progress'); }
    public function scopePending($q)     { return $q->where('status', 'pending'); }
    public function scopeCompleted($q)   { return $q->where('status', 'completed'); }

    public function scopeByCity($q, $city)
    {
        return $city ? $q->where('city', $city) : $q;
    }

    public function scopeByPriority($q, $priority)
    {
        return $priority ? $q->where('priority', $priority) : $q;
    }

    // ─── Accessors ───────────────────────────────────────────
    public function getTypeArabicAttribute(): string
    {
        return match($this->type) {
            'shop'      => 'محل تجاري',
            'workshop'  => 'ورشة عمل',
            'clinic'    => 'عيادة',
            'bakery'    => 'مخبز',
            'restaurant'=> 'مطعم',
            'school'    => 'مدرسة',
            'mosque'    => 'مسجد',
            'pharmacy'  => 'صيدلية',
            default     => 'أخرى',
        };
    }

    public function getStatusArabicAttribute(): string
    {
        return match($this->status) {
            'pending'     => 'في الانتظار',
            'approved'    => 'موافق عليه',
            'in_progress' => 'جارٍ التنفيذ',
            'completed'   => 'مكتمل',
            'cancelled'   => 'ملغي',
            'rejected'    => 'مرفوض',
            default       => $this->status,
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending'     => 'warning',
            'approved'    => 'info',
            'in_progress' => 'primary',
            'completed'   => 'success',
            'cancelled'   => 'secondary',
            'rejected'    => 'danger',
            default       => 'secondary',
        };
    }

    public function getPriorityArabicAttribute(): string
    {
        return match($this->priority) {
            'low'      => 'منخفضة',
            'medium'   => 'متوسطة',
            'high'     => 'عالية',
            'critical' => 'حرجة',
            default    => $this->priority,
        };
    }

    public function getPriorityColorAttribute(): string
    {
        return match($this->priority) {
            'low'      => '#22c55e',
            'medium'   => '#f59e0b',
            'high'     => '#ef4444',
            'critical' => '#7c3aed',
            default    => '#6b7280',
        };
    }

    public function getBeforeImagesArrayAttribute(): array
    {
        return $this->before_images ? json_decode($this->before_images, true) : [];
    }

    public function getAfterImagesArrayAttribute(): array
    {
        return $this->after_images ? json_decode($this->after_images, true) : [];
    }

    public function getDamageLevelAttribute(): string
    {
        if ($this->damage_percentage >= 75) return 'شديد جداً';
        if ($this->damage_percentage >= 50) return 'شديد';
        if ($this->damage_percentage >= 25) return 'متوسط';
        return 'خفيف';
    }
}