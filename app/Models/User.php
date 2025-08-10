<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Panel;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Метод, який Filament викликає для перевірки доступу
    public function canAccessFilament(): bool
    {
        return str_ends_with($this->email, '@skoda-kremen.com.ua');
    }

    // Твій метод для інших перевірок, якщо потрібен
    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@skoda-kremen.com.ua');
    }
}
