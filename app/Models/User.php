<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone',
        'address', 'city', 'avatar', 'bio', 'is_active',
        'latitude', 'longitude',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    // ─── Roles ──────────────────────────────────────────────
    public function isAdmin(): bool        { return $this->role === 'admin'; }
    public function isVolunteer(): bool    { return $this->role === 'volunteer'; }
    public function isProjectOwner(): bool { return $this->role === 'project_owner'; }

    // ─── Relationships ───────────────────────────────────────
    public function volunteerProfile()
    {
        return $this->hasOne(VolunteerProfile::class);
    }

    public function ownedProjects()
    {
        return $this->hasMany(Project::class, 'owner_id');
    }

    public function assignedProjects()
    {
        return $this->belongsToMany(Project::class, 'project_volunteer')
                    ->withPivot('status', 'role', 'joined_at', 'hours_contributed')
                    ->withTimestamps();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }

    public function applications()
    {
        return $this->hasMany(VolunteerApplication::class);
    }

    public function ratingsReceived()
    {
        return $this->hasMany(Rating::class, 'rated_user_id');
    }

    public function ratingsGiven()
    {
        return $this->hasMany(Rating::class, 'rater_id');
    }

    public function projectUpdates()
    {
        return $this->hasMany(ProjectUpdate::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    // ─── Accessors ───────────────────────────────────────────
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        $name = urlencode($this->name);
        return "https://ui-avatars.com/api/?name={$name}&background=4F7942&color=fff&size=128&font-size=0.4";
    }

    public function getRoleArabicAttribute(): string
    {
        return match($this->role) {
            'admin'         => 'مدير',
            'volunteer'     => 'متطوع',
            'project_owner' => 'صاحب مشروع',
            default         => $this->role,
        };
    }
}