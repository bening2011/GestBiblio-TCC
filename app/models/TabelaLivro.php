<?php


class TabelaLivro extends Eloquent {

	protected $table = 'livro';
	public $timestamps = false;
	protected $primaryKey = 'id_livro';
	protected $guarded = array('id_livro');

}
