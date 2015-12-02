<?php

class DatabaseSeeder extends Seeder {
 
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
 
        $this->call('TabelaUsuarioSeeder');
    }
 
}
 
class TabelaUsuarioSeeder extends Seeder {
 
    public function run()
    {
        $usuarios = TabelaUsuario::get();
 
        if($usuarios->count() == 0) {
            TabelaUsuario::create(array(
                'email' => 'seu@email.com',
                'senha' => Hash::make('admin'),
                'nome'  => 'Seu Nome',
                'tipo'  => 'admin'
            ));
        }
    }
 
}
