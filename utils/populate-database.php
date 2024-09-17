<?php


$pessoas_desaparecidas = [
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
    // Adicione mais 28 pessoas com dados fictícios semelhantes para completar o array
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
    // Continue adicionando os dados fictícios até o 30º elemento
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
    // Continue preenchendo até o 30º elemento
    // Adicione dados variados para cada entrada
    
    // Supondo que você preencha os dados até aqui, o código final seria como abaixo:

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
    ],
    // Continue adicionando elementos para completar 30 pessoas
];
foreach ($pessoas_desaparecidas as $pessoa) {
    create_missing(
        $connection,
  get_user_id(),
  $pessoa["nome_desaparecido"],
  $pessoa["genero_desaparecido"],
  $pessoa["foto_desaparecido"],
  $pessoa["contato_desaparecido"],
  $pessoa["historia_desaparecido"],
  $pessoa["observacao_desaparecido"],
  $pessoa["data_desaparecimento"],
  $pessoa["idade_desparecido"],
  $pessoa["local_desaparecimento"]
      );
}
      
  

?>