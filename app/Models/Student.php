<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
   protected $table = 'studentes';
    public $timestamps = true;
    protected $fillable = [
        'name', 'email','contact_no', 'status','upload',
    ];
    public static function getstudent(){
        $records = DB::table('studentes')->select('id','name','email','contact_no','status')->get()->toArray();
        return $records;
    }
}
