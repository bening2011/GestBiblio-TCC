<?php


class TabelaEmprestimo extends Eloquent {

	protected $table = 'emprestimo';
	public $timestamps = false;
	protected $primaryKey = 'id_emprestimo';
	protected $guarded = array('_token');
	
	
	public function emprestimos(){
		return $this->hasMany('TabelaEmprestimo');
	}
}
