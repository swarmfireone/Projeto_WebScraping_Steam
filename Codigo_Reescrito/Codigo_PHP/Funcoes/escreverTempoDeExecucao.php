<?php

// Para mais informações : https://www.w3schools.com/php/php_file_create.asp

require_once '.\Config.php';
require_once 'data.php';
require_once 'hora.php';
require_once 'formatarNumero.php';

function escreverTempoDeExecucao(int $count_listaOrdenada, int $tempoTotal, string $horaZero, string $tempoTotalString)
{
    global $enderecoDaPasta;
    
    $arquivoExecucaoUm = fopen("$enderecoDaPasta\Tempo_de_execucao.txt", 'w');
    fwrite($arquivoExecucaoUm, "⭐ $horaZero\n");
    fwrite($arquivoExecucaoUm, "\nTempo de Execução : $tempoTotalString");
    fclose($arquivoExecucaoUm);


    $arquivoExecucaoDois = fopen("$enderecoDaPasta\Tempo_de_execucao.txt", 'a');
    $frase1 = "\n\t$tempoTotalString\t->->\t $count_listaOrdenada games em ";
    $frase2 = data() . '. Finalizado às ' . hora() . '. ';

    $segundosPorJogo = $tempoTotal / $count_listaOrdenada;
    $frase3 = formatarNumero($segundosPorJogo, 1, 3) . 's por jogo' . PHP_EOL;

    $fraseToda = $frase1 . $frase2 . $frase3;
    fwrite($arquivoExecucaoDois, $fraseToda);
    fclose($arquivoExecucaoDois);
}