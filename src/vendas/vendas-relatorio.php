<?php

require_once('../../src/helpers/usuario-logado.php');

verificarUsuarioLogado();

// Estabelece conexão com banco de dados e lista os lançamentos.
require_once('../../src/conexao.php');
require_once('../../src/vendas/vendas-index.php');

// Carrega as movimentações no banco de dados
$movimentacoes = listarMovimentacoes([], $conn);

// Importa do autoload do DOMPDF
require_once('../../dompdf/autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;

ob_start();
include("../../views/relatorios/movimentacoes.php");
$html = ob_get_clean();

$options = new Options();
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);

// Define o tamanho do papel e a orientação
$dompdf->setPaper('A4', 'landscape');

// Renderiza o HTML como PDF
$dompdf->render();

// Mostra o PDF para o usuário no browser
$dompdf->stream();
