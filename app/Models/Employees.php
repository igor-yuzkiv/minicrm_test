<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employees
 * @package App\Models
 */
class Employees extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'employees';

    /**
     * @var string[]
     */
    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "phone",
        "company_id"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company () {
        return $this->hasOne(Companies::class, 'id', 'company_id');
    }

}
