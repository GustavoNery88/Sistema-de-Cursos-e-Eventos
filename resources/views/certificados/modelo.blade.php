<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        @page {
            margin: 40px;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 16px;
            text-align: center;
            background-color: #f7f7f7;
        }

        .certificado-container {
            border: 8px solid #2c3e50;
            padding: 40px;
            background: #ffffff;
        }

        .titulo {
            font-size: 36px;
            font-weight: bold;
            color: #2c3e50;
            margin-top: 20px;
            text-transform: uppercase;
        }

        .subtitulo {
            font-size: 20px;
            margin-top: 10px;
            color: #444;
        }

        .conteudo {
            margin-top: 40px;
            font-size: 18px;
            line-height: 1.6;
            padding: 0 20px;
        }

        .nome-participante {
            font-size: 28px;
            font-weight: bold;
            color: #34495e;
            margin-top: 20px;
        }

        .rodape {
            margin-top: 60px;
            font-size: 14px;
            color: #555;
        }

        .assinatura-area {
            margin-top: 70px;
            text-align: center;
        }

        .linha-assinatura {
            width: 50%;
            border-top: 1px solid #333;
            margin: 0 auto;
        }

        .assinatura-label {
            margin-top: 5px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="certificado-container">

    <div class="titulo">Certificado de Conclusão</div>
    <div class="subtitulo">Certificamos que</div>

    <div class="nome-participante">
        {{ $participante->nome }}
    </div>

    <div class="conteudo">
        concluiu com êxito o curso<br>
        <strong>{{ $curso->nome }}</strong><br>
        realizado na data de<br>
        <strong>{{ date('d/m/Y', strtotime($participante->data_conclusao)) }}</strong>.
        <br><br>
        CPF: {{ $participante->cpf }}
    </div>

    <div class="assinatura-area">
        <div class="linha-assinatura"></div>
        <div class="assinatura-label">Assinatura da Instituição</div>
    </div>
</div>
</body>
</html>
