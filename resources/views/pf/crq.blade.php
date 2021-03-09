{{-- <x-app-layout> --}}

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <style>

            body{
                width: 725px;
            }

            table.unstyledTable {
                width: 675px;
                padding-top: 135px;
            }

            table.unstyledTable thead {
                background: // DDDDDD;
            }
            table.unstyledTable thead th {
                font-weight: normal;
            }
            table.unstyledTable tfoot {
                font-weight: bold;
            }

            .centro{
                text-align: center;
                vertical-align: middle;
            }

            .direita{
                text-align: right;
                vertical-align: middle;
            }

            .esquerda{
                text-align: left;
                vertical-align: middle;
            }

            .justificado{
                text-align: justify;
                vertical-align: middle;
            }

            .titulo{
                height: 15px;
                width: 450px;
            }
            .assinatura{
                font-size: 11pt;
            }
            .data{
                font-size: 10pt;
            }
            .negrito{
                font-weight: bold;
            }

            @page {
                margin: 45px 50px;
            }

            header {
                position: fixed;
                top: -25px;
                left: 0px;
                right: 0px;
                height: 250px;
                margin-bottom: 25px;

                /** Extra personal styles **/
                background-color: #fff;
                color: #000;
                text-align: center;
                line-height: 25px;
            }

            footer {
                position: fixed;
                bottom: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                background-color: #fff;
                color: #000;
                font-size: 9pt;
                text-align: center;
                line-height: 25px;
            }

            </style>
        </head>
        <body class="font-sans antialiased">

            <script type="text/php">
                if (isset($pdf)) {
                    $x = 250;
                    $y = 10;
                    $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                    $font = null;
                    $size = 14;
                    $color = array(255,0,0);
                    $word_space = 0.0;  //  default
                    $char_space = 0.0;  //  default
                    $angle = 0.0;   //  default
                    $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                }
            </script>

        <div>

        <header>
            <img src="{{url('/img/brasao-da-republica.jpg')}}" width="15%"><br>
            SERVIÇO PÚBLICO FEDERAL<br>
            Conselho Regional de Engenharia e Agronomia do Distrito Federal – Crea-DF<br>
            CERTIDÃO DE REGISTRO E QUITAÇÃO Nº
        </header>

    <table class="unstyledTable">

        <tbody>

            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
            <td colspan="1" class="direita">Validade até: </td>
            <td colspan="3" class="esquerda">31/03/2021</td>
            </tr>
            <tr>
            <td colspan="1" class="direita">Nome: </td>
            <td colspan="3" class="esquerda negrito">PROFISSIONAL TESTE</td>
            </tr>
            <tr>
            <td colspan="1" class="direita">RNP: </td>
            <td colspan="3" class="esquerda negrito">9999999999 </td>
            </tr>
            <tr>
            <td colspan="1" class="direita">CPF: </td>
            <td colspan="3" class="esquerda negrito">034.270.631-43</td>
            </tr>
            <tr>
            <td colspan="1" class="direita">Data do Registro: </td>
            <td colspan="3" class="esquerda negrito">31/12/1969</td>
            </tr>
            <tr>
            <td colspan="1" class="direita">Título(s): </td>
            <td colspan="3" class="esquerda negrito">ENG AGRIMENSOR, ENG CIVIL, ENG DE SEGURANCA DO TRABALHO E TECNICO EM ESTRADAS</td>
            </tr>
            <tr>
            <td colspan="1" class="direita">Instituição Ensino: </td>
            <td colspan="3" class="esquerda negrito"></td>
            </tr>
            <tr>
            <td colspan="1" class="direita">Data Diplomação: </td>
            <td colspan="3" class="esquerda negrito"></td>
            </tr>
            <tr>
            <td colspan="1" class="direita">Atribuições: </td>
            <td colspan="3" class="esquerda negrito">&nbsp;</td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
            <td colspan="4" class="justificado">
            CERTIFICAMOS que o profissional acima se encontra registrado no Crea-DF, nos termos da Lei
            Federal n. 5.194, de 24 de dezembro de 1966.
            CERTIFICAMOS, ainda, em face do estabelecido no art. 63 da referida lei, que o profissional
            mencionado não se encontra em débito com este Conselho.
            A presente certidão perderá sua validade caso o profissional acima tenha seu registro cancelado ou
            interrompido ou, ainda, haja alteração nos dados acima descritos.
            Certidão expedida por delegação de competência, conforme Portaria AD n°. 079 de 08/06/2020.
            Esta certidão não quita nem invalida qualquer débito ou infração em nome do profissional acima.
            </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
            <td colspan="2" class="direita">&nbsp;</td>
            <td colspan="2" class="direita negrito data">Brasília, 09 de março de 2021</td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td colspan="4" class="esquerda assinatura">Carimbo do Crea-DF</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
            <td colspan="2" style="text-align: center;" class="assinatura">MARCOS ALFREDO GONZAGA JUNIOR <br>Chefe da Gerência de Atendimento e Registro</td>
            <td colspan="2" style="text-align: center;" class="assinatura">ENGª LÉLIA BARBOSA DE SOUSA SÁ <br>Superintendente Técnica e de Fiscalização </td>
            </tr>

        </tbody>
    </table>

<footer> SGAS Qd. 901 Conj. D - Brasília-DF - CEP 70390-010 - Tel: +55 (61) 3961-2800 - creadf@creadf.org.br - www.creadf.org.br </footer>

        </div>

        {{-- </x-app-layout> --}}

        </body>
        </html>
