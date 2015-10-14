<?php


class TabelaUsuEmp extends Eloquent {

	protected $table = 'usu-emp';
	public $timestamps = false;
	protected $primaryKey = 'id_cliente';
	protected $guarded = array('_token');
	
	
	public function usuemp(){
		return $this->hasMany('TabelaUsuEmp');
	}
}
