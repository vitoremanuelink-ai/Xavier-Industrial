<?php
/**
 * Template Name: Xavier - Contato
 * @package xavier-industrial-oficial
 */
get_header(); ?>

<main class="xi-main">
  <!-- PAGE HEADER -->
  <header class="page-header">
    <div class="page-header-bg"></div>
    <div class="page-header-content">
      <h1 class="page-title">Contato</h1>
      <p class="page-subtitle">Fale com a nossa equipe de atendimento</p>
    </div>
  </header>

  <!-- CONTENT -->
  <section class="page-section">
    <div class="page-container">
      <div class="content-grid content-grid-2">
        <div class="content-card">
          <div class="xi-section-label">FALE CONOSCO</div>
          <h3>Entre em contato</h3>
          
          <ul class="check-list" style="margin-top: 24px; margin-bottom: 40px;">
            <li class="check-item"><i class="fas fa-phone-alt"></i> (31) 3662-4553</li>
            <li class="check-item"><i class="fas fa-phone-alt"></i> (31) 3712-5462</li>
            <li class="check-item"><i class="fas fa-phone-alt"></i> (31) 3712-5094</li>
            <li class="check-item"><i class="fas fa-envelope"></i> contato@xavierindustrial.com.br</li>
          </ul>

          <div class="xi-section-label">LOCALIZAÇÃO</div>
          <h3>Endereço</h3>
          <p>Rua João Pereira Lima, 150 – Dist. Industrial, Matozinhos/MG<br>CEP: 35.720-000</p>
        </div>
        
        <div class="content-card">
          <div class="xi-section-label">MENSAGEM</div>
          <h3>Nos envie uma mensagem</h3>
          
          <!-- Formulário (Placeholder estrutural apenas, pois não há backend) -->
          <form class="contact-form" style="margin-top: 24px;">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" id="nome" class="form-control" placeholder="Seu nome">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" id="email" class="form-control" placeholder="Seu e-mail">
            </div>
            <div class="form-group">
              <label for="assunto">Assunto</label>
              <input type="text" id="assunto" class="form-control" placeholder="Assunto da mensagem">
            </div>
            <div class="form-group">
              <label for="mensagem">Mensagem</label>
              <textarea id="mensagem" class="form-control" placeholder="Escreva sua mensagem aqui..."></textarea>
            </div>
            <button type="button" class="xi-btn-primary" style="margin-top: 8px;">Enviar mensagem</button>
            <p style="font-size: 12px; margin-top: 16px; opacity: 0.6; text-align: center;">Informações serão inseridas futuramente</p>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  
</main>

<?php get_footer();
