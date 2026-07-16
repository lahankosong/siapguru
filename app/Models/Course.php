<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutor_id',
        'title',
        'description',
        'type',
        'file_path',
        'thumbnail',
        'price',
        'duration',
        'level',
        'subject',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Relationships
    public function tutor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Methods
    public function getTypeLabelAttribute(): string
    {
        $labels = [
            'video' => 'Video',
            'pdf' => 'PDF',
            'bank_soal' => 'Bank Soal',
            'template' => 'Template',
            'modul' => 'Modul',
            'ebook' => 'Ebook',
        ];

        return $labels[$this->type] ?? $this->type;
    }
}