<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            [
                'nome' => 'Claudianus Boast',
                'email' => 'cboast0@fastcompany.com',
                'telefone' => '(19)95764-5371',
                'estado' => 'São Paulo',
                'cidade' => 'Araraquara',
                'data_de_nascimento' => '07/06/1993',
            ],
            [
                'nome' => 'Loni Jennions',
                'email' => 'ljennions1@va.gov',
                'telefone' => '(19)90561-3161',
                'estado' => 'São Paulo',
                'cidade' => 'Limeira',
                'data_de_nascimento' => '09/05/1985',
            ],
            [
                'nome' => 'Margi Gilhouley',
                'email' => 'mgilhouley2@telegraph.co.uk',
                'telefone' => '(19)96629-0104',
                'estado' => 'São Paulo',
                'cidade' => 'Araraquara',
                'data_de_nascimento' => '13/09/1984',
            ],
            [
                'nome' => 'Lexy Sprulls',
                'email' => 'lsprulls3@moonfruit.com',
                'telefone' => '(19)97612-1601',
                'estado' => 'São Paulo',
                'cidade' => 'Rio Claro',
                'data_de_nascimento' => '19/10/1999',
            ],
            [
                'nome' => 'Marie Shatliff',
                'email' => 'mshatliff4@cbslocal.com',
                'telefone' => '(19)99137-6354',
                'estado' => 'São Paulo',
                'cidade' => 'Rio Claro',
                'data_de_nascimento' => '20/07/1990',
            ],
            [
                'nome' => 'Graig Mouncey',
                'email' => 'gmouncey5@so-net.ne.jp',
                'telefone' => '(19)94180-6149',
                'estado' => 'São Paulo',
                'cidade' => 'Araraquara',
                'data_de_nascimento' => '27/03/1990',
            ],
            [
                'nome' => 'Laurice Liger',
                'email' => 'lliger0@php.net',
                'telefone' => '(35)97174-0954',
                'estado' => 'Minas Gerais',
                'cidade' => 'Areado',
                'data_de_nascimento' => '25/10/1992',
            ],
            [
                'nome' => 'Kendrick Sooper',
                'email' => 'ksooper1@slate.com',
                'telefone' => '(31)94432-4086',
                'estado' => 'Minas Gerais',
                'cidade' => 'Belo Horizonte',
                'data_de_nascimento' => '02/06/1981',
            ],
            [
                'nome' => 'Gordon Levington',
                'email' => 'glevington2@hpost.com',
                'telefone' => '(31)92240-5868',
                'estado' => 'Minas Gerais',
                'cidade' => 'Belo Horizonte',
                'data_de_nascimento' => '25/11/1993',
            ],
            [
                'nome' => 'Noam Scolland',
                'email' => 'nscolland3@mozilla.org',
                'telefone' => '(35)99681-7669',
                'estado' => 'Minas Gerais',
                'cidade' => 'Areado',
                'data_de_nascimento' => '31/12/1999',
            ],
            [
                'nome' => 'Lindon Skehens',
                'email' => 'lskehens4@npr.org',
                'telefone' => '(35)96767-1104',
                'estado' => 'Minas Gerais',
                'cidade' => 'Areado',
                'data_de_nascimento' => '10/01/1985',
            ],
            [
                'nome' => 'Kimbra Rase',
                'email' => 'krase5@topsy.com',
                'telefone' => '(35)99942-8030',
                'estado' => 'Minas Gerais',
                'cidade' => 'Areado',
                'data_de_nascimento' => '05/05/1999',
            ],
            [
                'nome' => 'Lorenzo Fisk',
                'email' => 'lfisk6@businessweek.com',
                'telefone' => '(31)91269-5467',
                'estado' => 'Minas Gerais',
                'cidade' => 'Belo Horizonte',
                'data_de_nascimento' => '22/12/1985',
            ],
            [
                'nome' => 'Bourke Flavelle',
                'email' => 'bflavelle7@fc2.com',
                'telefone' => '(35)95938-6145',
                'estado' => 'Minas Gerais',
                'cidade' => 'Itapeva',
                'data_de_nascimento' => '10/04/1984',
            ],
            [
                'nome' => 'Curran McSharry',
                'email' => 'cmcsharry8@webeden.co.uk',
                'telefone' => '(35)90291-6131',
                'estado' => 'Minas Gerais',
                'cidade' => 'Itapeva',
                'data_de_nascimento' => '15/01/1983',
            ],
            [
                'nome' => 'Aveline Dowtry',
                'email' => 'adowtry9@miibeian.gov.cn',
                'telefone' => '(31)94522-7500',
                'estado' => 'Minas Gerais',
                'cidade' => 'Belo Horizonte',
                'data_de_nascimento' => '23/12/1994',
            ],
            [
                'nome' => 'John Sebastian',
                'email' => 'jsebastiana@cbslocal.com',
                'telefone' => '(31)90736-6740',
                'estado' => 'Minas Gerais',
                'cidade' => 'Belo Horizonte',
                'data_de_nascimento' => '06/04/1998',
            ],
            [
                'nome' => 'Reynolds Greenan',
                'email' => 'rgreenanb@bloomberg.com',
                'telefone' => '(35)92355-1410',
                'estado' => 'Minas Gerais',
                'cidade' => 'Itapeva',
                'data_de_nascimento' => '19/07/1985',
            ],
        ];

        foreach ($clientes as $cliente) {
            (new Clientes($cliente))->save();
        }
    }
}
