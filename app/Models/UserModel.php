<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; //mendefinisikan nama tabel yang digunakan oleh model tabel ini
    protected $primaryKey = 'user_id'; //mendefinisikan primary key dari tabel yang digunakan
    protected $fillable = ['level_id', 'username', 'nama', 'password']; //mendefinisikan kolom-kolom yang dapat diisi secara massal

    protected $hidden = ['password']; //kolom yang disembunyikan saat model diubah menjadi array atau JSON  
    protected $casts = ['password' => 'hashed']; //kolom yang perlu di-cast ke tipe data tertentu

    //relasi many-to-one dengan LevelModel
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
    //method untuk mendapatkan nama peran pengguna
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }
    //method untuk memeriksa apakah pengguna memiliki peran tertentu
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }
    //method untuk mendapatkan kode peran pengguna
    public function getRole()
    {
        return $this->level->level_kode;
    }
}
