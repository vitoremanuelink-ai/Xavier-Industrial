<#
.SYNOPSIS
  Publica alteracoes do site Xavier Industrial: add + commit + push para a branch main.
  Um unico push atualiza a Vercel e, via WP Pusher, o tema no WordPress.

.DESCRIPTION
  - Interrompe em caso de erro (sem force push, sem reescrever historico).
  - Nao armazena credenciais (usa a autenticacao ja configurada no Git/Antigravity).

.PARAMETER Message
  Mensagem de commit. Se omitida, sera solicitada.

.EXAMPLE
  ./publicar.ps1 -Message "Atualiza secao de servicos"
#>

[CmdletBinding()]
param(
  [Parameter(Mandatory = $false)]
  [string]$Message
)

$ErrorActionPreference = "Stop"

# 1. Verifica se estamos em um repositorio Git
try {
  git rev-parse --is-inside-work-tree > $null 2>&1
} catch {
  Write-Error "Este diretorio nao e um repositorio Git. Abra a pasta do projeto."
  exit 1
}

# 2. Verifica se ha alteracoes
$status = git status --porcelain
if ([string]::IsNullOrWhiteSpace($status)) {
  Write-Host "Nenhuma alteracao para publicar. Tudo ja esta commitado." -ForegroundColor Yellow
  exit 0
}

Write-Host "Alteracoes detectadas:" -ForegroundColor Cyan
git status --short

# 3. Mensagem de commit
if ([string]::IsNullOrWhiteSpace($Message)) {
  $Message = Read-Host "Mensagem de commit"
  if ([string]::IsNullOrWhiteSpace($Message)) {
    Write-Error "Mensagem de commit obrigatoria. Operacao cancelada."
    exit 1
  }
}

# 4. add + commit + push (sem --force)
git add -A
git commit -m "$Message"
git push origin main

if ($LASTEXITCODE -ne 0) {
  Write-Error "Falha no push. Nada foi forcado; verifique a conexao/credenciais e tente novamente."
  exit 1
}

Write-Host ""
Write-Host "Publicado com sucesso na branch main." -ForegroundColor Green
Write-Host "- Vercel: novo deployment em andamento." -ForegroundColor Green
Write-Host "- WordPress: WP Pusher recebera o webhook e atualizara o tema." -ForegroundColor Green
Write-Host "Verifique o webhook em: GitHub > Settings > Webhooks (Recent Deliveries = 200)." -ForegroundColor Green
