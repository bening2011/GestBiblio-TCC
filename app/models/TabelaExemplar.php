<?php


class TabelaExemplar extends Eloquent {

	protected $table = 'exemplar';
	public $timestamps = false;
	protected $primaryKey = 'id_exemplar';
	protected $guarded = array('_token');
	
	
	public function livros(){
		return $this->hasMany('TabelaLivro');
	}
}
