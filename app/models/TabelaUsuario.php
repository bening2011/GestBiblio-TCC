<?php


class TabelaUsuario extends Eloquent {

	protected $table = 'usuario';
	public $timestamps = false;
	protected $primaryKey = 'id_usuario';
	protected $guarded = array('id_usuario');

}
