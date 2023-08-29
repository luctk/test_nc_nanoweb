<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['name','taikhoan','manager_id'];
    public function manager(){
        return $this->belongsTo(Employee::class,'manager_id');
    }
    public function employees(){
        return $this->hasMany(Employee::class,'manager_id');
    }
    public function tinhTongDiem(){
        $tongDiem=0;
        foreach ($this->employees as $employee){
            $tongDiem+=$employee->taikhoan;
            if(!empty($this->employees)){
                $tongDiem+=$employee->tinhTongDiem();
            }
        }
        return $tongDiem;
    }





}
