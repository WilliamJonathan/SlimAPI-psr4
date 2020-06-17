<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
 * 
 */
class Carga extends Model
{
	//protected $table = 'cargas';
	protected $primaryKey = 'crg_numero';
	public $timestamps = false;
	protected $fillable = [
		'crg_situacao'
	];

}
