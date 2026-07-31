# DEPLOY.md — Xavier Industrial

Fluxo oficial de publicacao do site. O tema WordPress vive em
`wordpress-theme/xavier-industrial-oficial/` dentro do repositorio
`vitoremanuelink-ai/Xavier-Industrial` (branch `main`).

## Fluxo padrao (Antigravity)

```bash
git add .
git commit -m "Descricao da atualizacao"
git push origin main
```

O que acontece a cada push para `main`:

- A **Vercel** recebe um deployment do site estatico (raiz do repositorio).
- O **WP Pusher** (Push-to-Deploy) recebe o webhook do GitHub e atualiza o tema
  `xavier-industrial-oficial` no WordPress automaticamente.
- `https://xavierindustrial.com.br` passa a exibir a nova versao.

> `vercel --prod --force` **nao** e necessario para atualizar o WordPress.
> O WordPress e atualizado exclusivamente pelo push no GitHub via WP Pusher.

## Regras

- **Nao** edite o tema pelo editor interno do WordPress (Aparencia > Editor de temas).
- Toda alteracao deve ser feita no repositorio e enviada por push.
- Faca backup (All-in-One WP Migration) antes de grandes mudancas.
- Ao mexer no visual, altere os arquivos em `wordpress-theme/xavier-industrial-oficial/`
  (CSS de design em `assets/css/styles.css`).

## Como o tema atualiza (WP Pusher)

- Plugin: **WP Pusher** (fonte oficial: https://wppusher.com).
- Repositorio: `vitoremanuelink-ai/Xavier-Industrial` (publico).
- Branch: `main`.
- Subdiretorio do repositorio: `wordpress-theme/xavier-industrial-oficial`.
- Push-to-Deploy: **ativado** (webhook no GitHub).

### Verificar o webhook
GitHub > repositorio > **Settings > Webhooks**. O webhook do WP Pusher deve
existir, responder com **HTTP 200** na aba *Recent Deliveries* e disparar no
evento *push*.

### Forcar atualizacao manual do tema
WordPress > **WP Pusher > Themes** > tema `xavier-industrial-oficial` >
botao **Update / Pull**. Isso puxa a versao atual da branch `main` sem push.

### Desativar temporariamente o Push-to-Deploy
WordPress > **WP Pusher > Themes** > tema > desmarque **Push-to-Deploy** e salve.
(O webhook no GitHub pode ser desabilitado em Settings > Webhooks > Edit > *Active*.)

## Versionamento do tema
A cada alteracao relevante, incremente `Version:` no cabecalho de
`wordpress-theme/xavier-industrial-oficial/style.css` (ex.: 1.0.0 -> 1.0.1).
Os assets CSS/JS usam `filemtime()` como versao, entao o cache quebra
automaticamente a cada deploy.

---

# ROLLBACK — voltar ao estado anterior

1. **Tema anterior preservado:** o tema ativo antes da migracao e
   **`Hello Elementor`**. Ele **nao** foi excluido.
2. **Reverter o tema no WordPress:** Aparencia > Temas > passe o mouse sobre
   **Hello Elementor** > **Ativar**. O site volta imediatamente ao layout anterior.
3. **Nao apague** o backup gerado pelo All-in-One WP Migration.
4. **ZIP estavel** do novo tema: `wordpress-theme/xavier-industrial-oficial.zip`
   (guarde a versao 1.0.0 como referencia).
5. **Tag Git da versao estavel:**
   ```bash
   git tag wordpress-theme-v1.0.0
   git push origin wordpress-theme-v1.0.0
   ```
6. **Voltar a uma tag anterior** (recuperar o codigo do tema de uma versao):
   ```bash
   git checkout wordpress-theme-v1.0.0 -- wordpress-theme/xavier-industrial-oficial
   git commit -m "Rollback do tema para v1.0.0"
   git push origin main
   ```
   Com Push-to-Deploy ativo, o WordPress recebe a versao revertida.
7. **Desativar o webhook** (parar deploys automaticos): GitHub > Settings >
   Webhooks > Edit > desmarque **Active**; ou desmarque Push-to-Deploy no WP Pusher.
8. **Atualizacao manual do tema:** WP Pusher > Themes > Update (puxa a `main` atual).

## Restauracao total (pior caso)
All-in-One WP Migration > **Importar** > selecione o arquivo de backup gerado
antes da migracao. Isso restaura banco, midias, plugins e configuracoes.
