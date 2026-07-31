# Xavier Industrial Oficial — Tema WordPress

Tema classico convertido fielmente do site estatico (HTML/CSS/JS) do repositorio
`vitoremanuelink-ai/Xavier-Industrial`. Preserva layout, responsividade,
animacoes, conteudo, certificacoes (ISO 9001 / ISO 14001) e a unidade de Canaa dos Carajas (Filial PA).

## Requisitos
- WordPress 6.0+ (site em producao: 7.0.2)
- PHP 7.4+ (compatibilidade validada com `php -l`)

## Estrutura
- `style.css` — cabecalho do tema (o design fica em `assets/css/styles.css`)
- `functions.php` — enfileira CSS/JS (`wp_enqueue_*`), menu, suportes do tema
- `header.php` / `footer.php` — cabecalho e rodape comuns (`wp_head()` / `wp_footer()`)
- `front-page.php` — pagina inicial
- `page-{slug}.php` — sobre, servicos, equipamentos, contato, iso, unidade-canaa
- `page.php` / `index.php` / `404.php` — fallbacks
- `assets/` — css, js, images (todas as imagens/video do repositorio), fonts, icons

## Paginas necessarias (slugs)
`/`, `/sobre/`, `/servicos/`, `/equipamentos/`, `/contato/`, `/iso/`, `/unidade-canaa/`.
A home e definida em Configuracoes > Leitura. Cada `page-{slug}.php` e aplicado automaticamente
pelo slug da pagina.

## Assets da Media Library
Logo, favicon e logos de clientes vem da Media Library do proprio site
(`/wp-content/uploads/...`, referenciados via `home_url()`, nunca fixados a um dominio literal).
Para embutir tais imagens no tema, coloque-as em `assets/images/` e ajuste as referencias.

## Deploy automatico
Push para a branch `main` do GitHub -> WP Pusher (Push-to-Deploy) atualiza o tema.
Veja `DEPLOY.md` na raiz do repositorio.

## Navegacao
O menu principal e renderizado por `xavier_default_nav()` em `header.php`, mantendo a marcacao
identica ao site original. No mobile os links sao ocultados por design (comportamento preservado
do site estatico). A localizacao de menu `principal` fica registrada para uso futuro.
