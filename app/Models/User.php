<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'full_name',
        'avatar',
        'city',
        'classes',
        'bio',
        'subjects',
        'phone',
        'province',
        'district',
        'subdistrict',
        'village',
        'gender',
        'interests',
        'school_name',
        'school_history',
        'is_active',
        'is_suspended',
        'last_grade_update_year',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'is_suspended' => 'boolean',
        'last_grade_update_year' => 'integer',
    ];

    // Role check methods
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isTutor(): bool
    {
        return $this->role === 'tutor';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function isParent(): bool
    {
        return $this->role === 'parent';
    }

    public function isAuthor(): bool
    {
        return $this->role === 'author';
    }

    // Relationships
    public function articles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    public function privateTutor(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PrivateTutor::class, 'user_id');
    }

    public function followedTutors(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'tutor_follows', 'student_id', 'tutor_id');
    }

    public function followers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'tutor_follows', 'tutor_id', 'student_id');
    }
}