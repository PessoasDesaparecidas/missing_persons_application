<!--rodapé-->
<footer class="rodape" id="contato">
  <div class="rodape-div">
    <div class="rodape-div-1">
      <div class="rodape-div-1-coluna">
        <span><b>LOGO</b></span>
        <p>SIA Trecho 5 lote 000 bloco z sala 900 - Guará, Brasília - DF, 70000-010</p>
      </div>
    </div>

    <div class="rodape-div-2">
      <div class="rodape-div-2-coluna">
        <span><b>
            <?php if ($language == "pt"): ?>
              Contatos
            <?php elseif ($language == "en"): ?>
              Contacts
            <?php elseif ($language == "es"): ?>
              Contactos
            <?php endif; ?>
          </b></span>
        <p>contato@na.na</p>
        <p>+55 63 99200-0000</p>
      </div>
    </div>

    <div class="rodape-div-3">
      <div class="rodape-div-3-coluna">
        <span><b>Links</b></span>
        <p><a href="#servicos">Serviços</a></p>
        <p><a href="#empresa">Empresa</a></p>
        <p><a href="#sobre">Sobre</a></p>
      </div>
    </div>

    <div class="rodape-div-4">
      <div class="rodape-div-4-coluna">
        <span><b>
            <?php if ($language == "pt"): ?>
              Outros
            <?php elseif ($language == "en"): ?>
              Others
            <?php elseif ($language == "es"): ?>
              Otros
            <?php endif; ?>
          </b></span>
        <p id="button-privacy-policy">
          <?php if ($language == "pt"): ?>
            Políticas de Privacidade
          <?php elseif ($language == "en"): ?>
            Privacy Policies
          <?php elseif ($language == "es"): ?>
            Políticas de privacidad
          <?php endif; ?>
        </p>
        <dialog id="dialog">
          <h2>Hello, World!</h2>
          <p class="description">
            Velit magna qui laborum dolore fugiat elit magna consequat et cupidatat.
            Minim non anim nostrud dolore officia tempor mollit. Elit sint consequat
            velit sint ex enim amet exercitation.
          </p>
          <button id="close-modal" class="btn" autofocus="">Close</button>
        </dialog>
      </div>
    </div>

  </div>
  <p class="rodape-direitos">Copyright © 2024 –
    <?php if ($language == "pt"): ?>
      Todos os Direitos Reservados.
    <?php elseif ($language == "en"): ?>
      All rights reserved.
    <?php elseif ($language == "es"): ?>
      Reservados todos los derechos.
    <?php endif; ?>
  </p>
</footer>
<!--fim rodapé-->