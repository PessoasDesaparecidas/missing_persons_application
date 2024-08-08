# missing_persons_application
aplicação de web site e sitema web sobre pessoas desaparecidas


# como utilizar o sonner ?

## como implementar
para utilizar o sonner você deve implementar o componente com eguinte código 

    <html>
      <body>
      //meu sonner
      <?php
        include './components/sonner.php';
      ?>
      </body>
    </html>

## como ativar o sonner ?
voce deve atribuir o valor aos seguintes sessions

    <?php
      session_start();
      $_SESSION['sonner-type'] = 'success';
      $_SESSION['sonner-message'] = 'login efetuado com sucesso';
    ?>

o sonner type pode ser : **success** = *verde* | **alert** = *amarelo* | **error** = *vermelho*

indicado atribuir esses valores em paginas actions como por exemplo :
- *sing-in.action.php*
- *sing-up.action.php*
- *sing-out.action.php*

obs:sonner só será ativado uma vez por action


