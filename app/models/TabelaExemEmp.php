<?php


class TabelaExemEmp extends Eloquent {

	protected $table = 'exem-emp';
	public $timestamps = false;
	protected $primaryKey = 'id';
	protected $guarded = array('_token');
	
	
	
	public function exememp(){
		return $this->hasMany('TabelaExemEmp');
	}
}
