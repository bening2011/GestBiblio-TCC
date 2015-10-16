<?php


class TabelaExemEmp extends Eloquent {

	protected $table = 'exem-emp';
	public $timestamps = false;
	protected $primaryKey = 'id_exem-emp';
	protected $guarded = array('_token');
	
	
	
	public function exememp(){
		return $this->hasMany('TabelaExemEmp');
	}
}
