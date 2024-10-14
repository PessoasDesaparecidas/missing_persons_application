<?php

function seed_missings($connection, $user_id, int $quantity_missings = 1)
{
    $missings = [
        [
            'missing_person_name' => 'Maria Silva',
            'missing_person_gender' => 'Feminino',
            'missing_person_photo' => 'foto_maria.jpg',
            'missing_person_contact' => '(11) 1234-5678',
            'missing_person_story' => 'Maria foi vista pela última vez em um mercado próximo ao seu bairro.',
            'missing_person_note' => 'Possui uma tatuagem de estrela no pulso.',
            'missing_person_date' => '2024-09-01',
            'missing_person_age' => 28,
            'missing_person_location' => 'São Paulo, SP',
            'illnesses'=> 'ezquizofrenia',
            'chemical_dependency' => 'alcool',
            'profile' => '@maria',
            'car_plate' =>'123A54'
        ]
        ,
        [
            'missing_person_name' => 'João Pereira',
            'missing_person_gender' => 'Masculino',
            'missing_person_photo' => 'foto_joao.jpg',
            'missing_person_contact' => '(21) 9876-5432',
            'missing_person_story' => 'João saiu para trabalhar e não retornou para casa.',
            'missing_person_note' => 'Usava óculos de grau.',
            'missing_person_date' => '2024-08-15',
            'missing_person_age' => 35,
            'missing_person_location' => 'Rio de Janeiro, RJ',
            'illnesses'=> 'ezquizofrenia',
            'chemical_dependency' => 'alcool',
            'profile' => '@joao',
            'car_plate' =>'123A54'
        ]
        ,
        [
            'missing_person_name' => 'Ana Costa',
            'missing_person_gender' => 'Feminino',
            'missing_person_photo' => 'foto_ana.jpg',
            'missing_person_contact' => '(31) 2345-6789',
            'missing_person_story' => 'Ana desapareceu enquanto fazia uma caminhada no parque.',
            'missing_person_note' => 'Tem uma cicatriz na testa.',
            'missing_person_date' => '2024-09-10',
            'missing_person_age' => 22,
            'missing_person_location' => 'Belo Horizonte, MG',
            'illnesses'=> 'ezquizofrenia',
            'chemical_dependency' => 'alcool',
            'profile' => '@ana',
            'car_plate' =>'123A54'
        ]
        ,
        [
            'missing_person_name' => 'Carlos Santos',
            'missing_person_gender' => 'Masculino',
            'missing_person_photo' => 'foto_carlos.jpg',
            'missing_person_contact' => '(41) 3456-7890',
            'missing_person_story' => 'Carlos foi visto pela última vez em um festival de música.',
            'missing_person_note' => 'Usava uma jaqueta vermelha.',
            'missing_person_date' => '2024-07-25',
            'missing_person_age' => 30,
            'missing_person_location' => 'Curitiba, PR',
            'illnesses'=> 'ezquizofrenia',
            'chemical_dependency' => 'alcool',
            'profile' => '@joao',
            'car_plate' =>'123A54'
        ]
        ,
        [
            'missing_person_name' => 'Lucas Martins',
            'missing_person_gender' => 'Masculino',
            'missing_person_photo' => 'foto_lucas.jpg',
            'missing_person_contact' => '(51) 4567-8901',
            'missing_person_story' => 'Lucas desapareceu durante uma viagem de camping.',
            'missing_person_note' => 'Tem um piercing no nariz.',
            'missing_person_date' => '2024-06-18',
            'missing_person_age' => 26,
            'missing_person_location' => 'Porto Alegre, RS',
            'illnesses'=> 'ezquizofrenia',
            'chemical_dependency' => 'alcool',
            'profile' => '@lucas',
            'car_plate' =>'123A54'
        ]
    ];

    include "./database/missings-repository.php";

    for ($i = 0; $i < $quantity_missings; $i++) {

        $random_index_missing = floor(rand(0, 4));
        $current_missing = $missings[$random_index_missing];

        create_missing(
            $connection,
            $user_id,
            $current_missing["missing_person_name"],
            $current_missing["missing_person_gender"],
            $current_missing["missing_person_photo"],
            $current_missing["missing_person_contact"],
            $current_missing["missing_person_story"],
            $current_missing["missing_person_note"],
            $current_missing["missing_person_date"],
            $current_missing["missing_person_age"],
            $current_missing["missing_person_location"],
            $current_missing["illnesses"],
            $current_missing["chemical_dependency"],
            $current_missing["profile"],
            $current_missing["car_plate"]
        );
    }
}