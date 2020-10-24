<?php

namespace App;

use App\models\empresas;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoModel extends Model
{
    use HasFactory;

    protected $table="todos";
    protected $primaryKey = 'todo_id';
    protected $fillable = ['title', 'desc', 'status','empresas_id','fevento'];

    public function empresas() {
        return $this->belongsTo(empresas::class)->withDefault([
            'name_corto' => '(Sin empresa)'
        ]);
    }

    public function getFeventoAttribute($fevento){
        return Carbon::parse($fevento)->format('d-m-Y');
    }
    public function setFeventoAttribute($fevento){
        return Carbon::parse($fevento)->format('Y-m-d H:i:s');
    }
    public function getUpdatedAtAttribute($updated){
        return Carbon::parse($updated)->format('d-m-Y');
    }

}
