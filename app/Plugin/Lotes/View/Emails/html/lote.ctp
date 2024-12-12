<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; " />
        <title>Contato</title>
        <style type="text/css">
            body {
                width: 100%;
                font-family: Verdana, Geneva, sans-serif;
                border: 1px solid transparent;
                display: table;
                line-height: 1.6;
                background-color: #f6f6f6;
                color: #494B4B;
                padding-top: 40px;
            }
            .content {
                width: 600px; 
                margin-top: 40px; 
                margin: 0 auto;
                display: block;
                font-family: 'Gautami', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; 
                box-sizing: border-box; 
                background: #fff; 
                padding: 20px; 
                border: 1px solid #e9e9e9;
            }
            .maintitle {
                font-size: 18px;
                font-weight: bold;	
                text-align: center;
            }
            .title2 {
                margin-top: 20px;
                font-size: 16px;
                text-align: left;
                font-weight: bold;
            }
            #corpo {
                margin-top: 10px;
                margin-bottom: 10px;
                font-size: 15px;
                margin-left: 10px;
            }
            .titulo {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="maintitle">Acesso aos Valores - <?PHP echo date('d/m/Y H:i'); ?> </div>

            <table id="corpo">
                <tr class="linha">
                    <td class="titulo">Nome:</td>
                    <td class="descricao"><?PHP echo $data['nome']; ?></td>
                </tr>
                
                <tr class="linha">
                    <td class="titulo">E-mail:</td>
                    <td class="descricao"><?PHP echo $data['email']; ?></td>
                </tr>
                
                <tr class="linha">
                    <td class="titulo">Telefone:</td>
                    <td class="descricao"><?PHP echo $data['telefone']; ?></td>
                </tr>
                
                <tr class="linha">
                    <td class="titulo">Lote:</td>
                    <td class="descricao"><?PHP echo $data['lote_nome']; ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>