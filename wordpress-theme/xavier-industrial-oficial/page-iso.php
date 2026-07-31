<?php
/**
 * Template Name: Xavier - Iso
 * @package xavier-industrial-oficial
 */
get_header(); ?>

<main class="xi-main">
  <!-- PAGE HEADER -->
  <header class="page-header">
    <div class="page-header-bg"></div>
    <div class="page-header-content">
      <h1 class="page-title">Certificações ISO 9001 e ISO 14001</h1>
      <p class="page-subtitle">Compromisso com a excelência, qualidade e sustentabilidade ambiental</p>
    </div>
  </header>

  <!-- CONTENT -->
  <section class="xi-certificacoes-section" style="background: var(--branco);">
    <div class="xi-certificacoes-container">
      
      <!-- Top Header -->
      <div class="xi-certificacoes-header">
        <div class="xi-certificacoes-label">
          <span class="xi-label-dash"></span> CERTIFICAÇÕES
        </div>
        <h2 class="xi-certificacoes-title">Certificações ISO 9001 e ISO 14001</h2>
        <p class="xi-certificacoes-desc">
          Na Xavier Industrial, qualidade e responsabilidade ambiental caminham juntas. Nossas certificações ISO 9001 e ISO 14001 comprovam nosso compromisso com a excelência, a sustentabilidade e a melhoria contínua em tudo o que fazemos.
        </p>
      </div>

      <!-- Main Grid: Cards + Badges -->
      <div class="xi-certificacoes-grid">
        
        <!-- Cards Container (Side by side) -->
        <div class="xi-cert-cards-wrapper">
          
          <!-- CARD ISO 9001 -->
          <div class="xi-cert-card">
            <h3 class="xi-cert-card-title xi-title-blue">ISO 9001 – Gestão da Qualidade</h3>
            <ul class="xi-cert-list">
              <li class="xi-cert-item">
                <span class="xi-cert-icon xi-icon-blue"><i class="fas fa-check"></i></span>
                <span class="xi-cert-text">Respeitar os compromissos assumidos, visando sempre a satisfação dos clientes;</span>
              </li>
              <li class="xi-cert-item">
                <span class="xi-cert-icon xi-icon-blue"><i class="fas fa-check"></i></span>
                <span class="xi-cert-text">Buscar a melhoria contínua dos processos e serviços;</span>
              </li>
              <li class="xi-cert-item">
                <span class="xi-cert-icon xi-icon-blue"><i class="fas fa-check"></i></span>
                <span class="xi-cert-text">Capacitar nossos profissionais;</span>
              </li>
              <li class="xi-cert-item">
                <span class="xi-cert-icon xi-icon-blue"><i class="fas fa-check"></i></span>
                <span class="xi-cert-text">Atender aos requisitos do sistema de gestão implantado.</span>
              </li>
            </ul>
          </div>

          <!-- CARD ISO 14001 -->
          <div class="xi-cert-card">
            <h3 class="xi-cert-card-title xi-title-green">ISO 14001 – Gestão Ambiental</h3>
            <ul class="xi-cert-list">
              <li class="xi-cert-item">
                <span class="xi-cert-icon xi-icon-green"><i class="fas fa-check"></i></span>
                <span class="xi-cert-text">Reduzir impactos ambientais em nossas operações;</span>
              </li>
              <li class="xi-cert-item">
                <span class="xi-cert-icon xi-icon-green"><i class="fas fa-check"></i></span>
                <span class="xi-cert-text">Promover o uso consciente de recursos naturais;</span>
              </li>
              <li class="xi-cert-item">
                <span class="xi-cert-icon xi-icon-green"><i class="fas fa-check"></i></span>
                <span class="xi-cert-text">Prevenir a poluição e gerenciar resíduos de forma responsável;</span>
              </li>
              <li class="xi-cert-item">
                <span class="xi-cert-icon xi-icon-green"><i class="fas fa-check"></i></span>
                <span class="xi-cert-text">Atender à legislação ambiental e buscar melhoria contínua.</span>
              </li>
            </ul>
          </div>

        </div>

        <!-- Right Side Seals / Badges -->
        <div class="xi-cert-badges-col">
          <div class="xi-cert-badge-wrapper">
            <img src="<?php echo esc_url( 'https://cdn.jsdelivr.net/gh/vitoremanuelink-ai/Xavier-Industrial@main/img/iso-9001-badge.svg?v=10' ); ?>" alt="Selo Certificação ISO 9001" class="xi-cert-badge-img">
          </div>
          <div class="xi-cert-badge-wrapper">
            <img src="<?php echo esc_url( 'https://cdn.jsdelivr.net/gh/vitoremanuelink-ai/Xavier-Industrial@main/img/iso-14001-badge.svg?v=10' ); ?>" alt="Selo Certificação ISO 14001" class="xi-cert-badge-img">
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- FOOTER -->
  
</main>

<?php get_footer();
