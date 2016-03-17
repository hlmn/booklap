<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenislap extends Model

{
	protected $table ='jenislap';
 	protected $fillable = array('nama_jenis_lap');
    protected $primaryKey = 'nama_jenis_lap';
    public function lap($query, $type){

 	return $query->whereType($type);

}
}
