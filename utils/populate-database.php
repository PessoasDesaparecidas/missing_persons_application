<?php

function seed_missings($connection, $user_id, int $quantity_missings = 1)
{
    $missings = [
        [
            'nome_desaparecido' => 'Maria Silva',
            'genero_desaparecido' => 'Feminino',
            'foto_desaparecido' => 'foto_maria.jpg',
            'contato_desaparecido' => '(11) 1234-5678',
            'historia_desaparecido' => 'Maria foi vista pela última vez em um mercado próximo ao seu bairro.',
            'observacao_desaparecido' => 'Possui uma tatuagem de estrela no pulso.',
            'data_desaparecimento' => '2024-09-01',
            'idade_desparecido' => 28,
            'local_desaparecimento' => 'São Paulo, SP'
        ],
        [
            'nome_desaparecido' => 'João Pereira',
            'genero_desaparecido' => 'Masculino',
            'foto_desaparecido' => 'foto_joao.jpg',
            'contato_desaparecido' => '(21) 9876-5432',
            'historia_desaparecido' => 'João saiu para trabalhar e não retornou para casa.',
            'observacao_desaparecido' => 'Usava óculos de grau.',
            'data_desaparecimento' => '2024-08-15',
            'idade_desparecido' => 35,
            'local_desaparecimento' => 'Rio de Janeiro, RJ'
        ],
        [
            'nome_desaparecido' => 'Ana Costa',
            'genero_desaparecido' => 'Feminino',
            'foto_desaparecido' => 'foto_ana.jpg',
            'contato_desaparecido' => '(31) 2345-6789',
            'historia_desaparecido' => 'Ana desapareceu enquanto fazia uma caminhada no parque.',
            'observacao_desaparecido' => 'Tem uma cicatriz na testa.',
            'data_desaparecimento' => '2024-09-10',
            'idade_desparecido' => 22,
            'local_desaparecimento' => 'Belo Horizonte, MG'
        ],
        [
            'nome_desaparecido' => 'Carlos Santos',
            'genero_desaparecido' => 'Masculino',
            'foto_desaparecido' => 'foto_carlos.jpg',
            'contato_desaparecido' => '(41) 3456-7890',
            'historia_desaparecido' => 'Carlos foi visto pela última vez em um festival de música.',
            'observacao_desaparecido' => 'Usava uma jaqueta vermelha.',
            'data_desaparecimento' => '2024-07-25',
            'idade_desparecido' => 30,
            'local_desaparecimento' => 'Curitiba, PR'
        ],
        [
            'nome_desaparecido' => 'Lucas Martins',
            'genero_desaparecido' => 'Masculino',
            'foto_desaparecido' => 'foto_lucas.jpg',
            'contato_desaparecido' => '(51) 4567-8901',
            'historia_desaparecido' => 'Lucas desapareceu durante uma viagem de camping.',
            'observacao_desaparecido' => 'Tem um piercing no nariz.',
            'data_desaparecimento' => '2024-06-18',
            'idade_desparecido' => 26,
            'local_desaparecimento' => 'Porto Alegre, RS'
        ]
    ];

    include "./database/missings-repository.php";

    for ($i = 0; $i < $quantity_missings; $i++) {

        $random_index_missing = floor(rand(0, 4));
        $current_missing = $missings[$random_index_missing];

        create_missing(
            $connection,
            $user_id,
            $current_missing["nome_desaparecido"],
            $current_missing["genero_desaparecido"],
            $current_missing["foto_desaparecido"],
            $current_missing["contato_desaparecido"],
            $current_missing["historia_desaparecido"],
            $current_missing["observacao_desaparecido"],
            $current_missing["data_desaparecimento"],
            $current_missing["idade_desparecido"],
            $current_missing["local_desaparecimento"]
        );
    }
}