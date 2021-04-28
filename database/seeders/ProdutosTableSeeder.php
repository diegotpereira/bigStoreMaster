<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;
use DateTime;
use Illuminate\Support\Facades\DB;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $produtos = [
            [
                'nome' => "Jaquetas e Blusas para Homens",
                'descricao' => 'Produtos em Couro',
                'unidades' => 21,
                'preco' => 200.99,
                'image' => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/mens-better-than-naked-jacket-AVMH_LC9_hero.png',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],

            [
                'nome' => 'Jaquetas e Blusas para Mulheres',
                'descricao' => 'Produtos em Couro revestidos com lã',
                'unidades' => 400,
                'preco' => 1600.99,
                'image' => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/womens-better-than-naked-jacket-AVKL_NN4_hero.png',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],

            [
                'nome' => 'Sapatos para Mulheres',
                'descricao' => 'Sapatos leves para caminhada',
                'unidades' => 37,
                'preco' => 379.99,
                'image' => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/womens-single-track-shoe-ALQF_JM3_hero.png',
                'created_at' => new DateTime,
                'updated_at' => null,
            ],

            [
                'nome' => 'Mochila de Hidratacao Camelbak Hydrobak',
                'descricao' => 'Se o tempo estiver quente, a mochila lobo não permitirá que o seu costado fique encharcado: seu sistema de ventilação nas costas minimiza o suor e, consequentemente, traz um maior conforto ao usuário.',
                'unidades' => 37,
                'preco' => 472.99,
                'image' => 'http://images.thenorthface.com/is/image/TheNorthFace/236x204_CLR/enduro-boa-hydration-pack-AJQZ_JK3_hero.png',
                'created_at' => new DateTime,
                'updated_at' => null,
            ]
        ];

        DB::table('produtos')->insert($produtos);
    }
}
