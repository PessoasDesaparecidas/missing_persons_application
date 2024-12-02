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
          <h2>Políticas de privacidad</h2>
          <div class="description">
            <h4>
              Objeto:
            </h4>
            <p>
              A plataforma oferece ferramentas para cadastro de pessoas desaparecidas, incluindo informações e localização de usuários.
            </p>

            <h4>Aceitação:</h4>
            <p>
              Ao usar a plataforma, o usuário aceita os Termos de Uso e compromete-se a cumpri-los, sob risco de sanções.
            </p>

            <h4>Acesso:</h4>
            <p>O serviço é disponibilizado 24/7, mas pode haver interrupções para manutenção ou ajustes.</p>

            <h4>
              Cadastro:
            </h4>
            <p>É necessário cadastro com dados válidos e atualizados. Alguns serviços podem exigir pagamento.
            </p>

            <h4>Suporte:</h4>
            <p>
              Contato para dúvidas ou problemas via e-mail: etecpj.ds.2024@gmail.com.

            </p>

            <h4> Responsabilidades:
            </h4>
            <p>
              <strong>Usuário:</strong> Uso correto da plataforma, proteção de dados de acesso e respeito às regras.
              <br>
              <strong>Plataforma:</strong> Garantir informações corretas sobre os serviços e atender às legislações aplicáveis. Não se responsabiliza por links externos ou conteúdos ilícitos divulgados por terceiros.
              Direitos Autorais: Todos os direitos da plataforma são reservados. O uso é pessoal, intransferível, e qualquer uso não autorizado será punido conforme a lei.
            </p>

            <h4>
              Sanções:
            </h4>
            <p>
              Contas podem ser suspensas ou canceladas em caso de violação das regras, comportamento fraudulento ou ofensivo.
            </p>

            <h4> Rescisão: </h4>
            <p>O descumprimento das obrigações poderá levar ao cancelamento imediato dos serviços.
            </p>

            <h4>Alterações:</h4>
            <p> Os Termos podem ser modificados unilateralmente, e as mudanças serão publicadas no site. O usuário pode aceitar ou encerrar o uso.
            </p>

            <h4>Política de Privacidade:</h4>
            <p> O usuário deve consentir com os termos da Política de Privacidade.</p>

            <h4>Foro: </h4>
            <p>Controvérsias serão resolvidas segundo o Direito brasileiro, no foro da comarca da sede da empresa.
            </p>
          </div>
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