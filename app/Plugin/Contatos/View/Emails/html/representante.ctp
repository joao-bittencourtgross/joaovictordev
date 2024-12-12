<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; " />
        <title>Contato</title>

        <style type="text/css">
            body {
                -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6;
            }
            body {
                background-color: #f6f6f6;
            }
        </style>
    </head>

    <body style="font-family: 'Gautami', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 15px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6; background: #f6f6f6; margin: 0; padding: 0;">
        <table class="body-wrap" style="font-family: 'Gautami', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 15px; width: 100%; background: #f6f6f6; margin: 0; padding: 0;">
            <tr style="font-family: 'Gautami', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 15px; margin: 0; padding: 0;">
                <td style="font-family: 'Gautami', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; margin: 0; padding: 0;" valign="top"></td>
                <td class="container" width="600" style="font-family: 'Gautami', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 15px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;" valign="top">
                    <div class="content" style="font-family: 'Gautami', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 15px; background: #fff; margin: 0; padding: 20px; margin-top: 40px; margin-bottom: 40px; border: 1px solid #e9e9e9;">
                        <p style="text-align: center; font-weight: bold;">
                            Representante - <?PHP echo date('d/m/Y H:i'); ?>
                        </p>
                            
                        <p style="margin-bottom: 5px;">
                            <b>Nome: </b> <?PHP echo $data['nome']; ?>
                        </p>
                            
                        <p style="margin-bottom: 5px; margin-top: 0px;">
                            <b>E-mail: </b> <?PHP echo $data['email']; ?>
                        </p>
                        <p style="margin-bottom: 5px; margin-top: 0px;">
                            <b>Telefone: </b> <?PHP echo $data['telefone']; ?>
                        </p>
                        <p style="margin-bottom: 5px; margin-top: 0px;">
                            <b>CNPJ: </b> <?PHP echo $data['cnpj']; ?>
                        </p>
                        <p style="margin-bottom: 5px; margin-top: 0px;">
                            <b>Cidade: </b> <?PHP echo $data['cidade']; ?>
                        </p>
                        <p style="margin-bottom: 5px; margin-top: 0px;">
                            <b>Estado: </b> <?PHP echo $data['estado']; ?>
                        </p>
                        
                        <p style="margin-bottom: 5px; margin-top: 0px;">
                            <b>Mensagem: </b> <?PHP echo $data['mensagem']; ?>
                        </p>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
