<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportOption extends Model
{
    use HasFactory;
    protected $table = 'report_options';
    protected $fillable = [
        'content',
        'is_active',
    ];

}
