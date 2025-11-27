<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        @page { margin: 0; size: A4 landscape; } /* A4 paisagem, sem margem */

        html, body {
            margin: 0;
            padding: 0;
        }

        /* cada .page corresponde a uma página */
        .page {
            width: 297mm;            /* A4 landscape width */
            height: 210mm;           /* A4 landscape height */
            position: relative;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        /* garante quebra de página */
        .page-break { page-break-after: always; }

        /* container para o texto sobre o fundo */
        .conteudo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* ajuste de padding para não colar nas bordas */
            padding: 20mm;
            box-sizing: border-box;
        }

        /* exemplo de posicionamento do nome — ajuste top/left conforme necessário */
        .nome {
            font-family: sans-serif;
            position: absolute;
            top: {{$curso->coord_nome_cpf_y}};    /* ajuste vertical */
            left: {{$curso->coord_nome_cpf_x}};   /* ajuste horizontal */
            font-size: 12pt;
            font-weight: 700;
            color: #000; 
        }

        /* outros estilos de texto */
        .detalhe {
            position: absolute;
            top: 110mm;
            left: 40mm;
            font-size: 14pt;
        }
    </style>
</head>
<body>

    <!-- PÁGINA 1 (FRENTE) -->
    <div class="page"
         style="background-image: url('file://{{ str_replace('\\','/', public_path($curso->certificado_frente)) }}');">
        <div class="conteudo">
            <div class="nome">{{ $participante->nome }}</div>
        </div>
    </div>

    <div class="page-break"></div>

    <!-- PÁGINA 2 (VERSO) -->
    <div class="page"
         style="background-image: url('file://{{ str_replace('\\','/', public_path($curso->certificado_verso)) }}');">
        <div class="conteudo">
        </div>
    </div>

</body>
</html>
