<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html;" />
        <title>CitShopp</title>
    </head>
    <body style="font-family: 'Gautami', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 15px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6; background: #f6f6f6; margin: 0; padding: 0;">
        <table style="width: 100%; background: #f6f6f6; margin: 0; padding: 0;">
            <tr style="font-size: 15px; margin: 0; padding: 0;">
                <td style="font-size: 15px; vertical-align: top; margin: 0; padding: 0;" valign="top"></td>
                <td width="440" style="font-size: 15px; vertical-align: top; display: block !important; max-width: 650px !important; margin: 0 auto; padding: 0;" valign="top">
                    <div style="font-size: 15px; line-height: 15px; background: #fff; margin: 0; padding: 20px; margin-top: 40px; margin-bottom: 40px; border: 1px solid #e9e9e9;">
                        <p style="text-align: center; font-size: 16px;">
                            Dados da semana <?PHP echo '<b>'.$data_semana.'</b> - <b>'.$data_hoje.'</b>'; ?>
                        </p>
                        <p style="margin-top: 30px; margin-bottom: 8px; text-align: center;">
                            <b>Cadastros</b>
                        </p>
                        <table style="border: 1px solid #e9e9e9; padding-top: 10px; margin-top: 0px; border-radius: 5px;" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="width: 210px; padding-right: 5px; text-align: right;">Novos Produtos:</td>
                                <td style="width: 210px;"><b><?PHP echo $data['produtos_cadastrados']; ?></b></td>
                            </tr>
                            <tr>
                                <td style="width: 210px; padding-right: 5px; text-align: right;">Contatos:</td>
                                <td style="width: 210px;"> <b><?PHP echo $data['contatos_lojistas']; ?></b> </td>
                            </tr>
                        </table>
                        <p style="margin-top: 30px; margin-bottom: 8px; text-align: center;">
                            <b>Cliques e visualizações </b>
                        </p>
                        <table style="border: 1px solid #e9e9e9; padding-top: 10px; margin-top: 0px; border-radius: 5px;">
                            <tr>
                                <td style="width: 210px;  text-align: right;">Produtos:</td>
                                <td style="width: 210px;"> <b><?PHP echo $data['vs_produtos']; ?></b> </td>
                            </tr>
                            <tr>
                                <td style="width: 210px; padding-right: 5px; text-align: right;">Perfil da Loja:</td>
                                <td style="width: 210px;"> <b><?PHP echo $data['vs_loja']; ?></b> </td>
                            </tr>
                            <tr>
                                <td style="width: 210px; padding-right: 5px; text-align: right;">WhatsApp:</td>
                                <td style="width: 210px;"> <b><?PHP echo $data['vs_whatsapp']; ?></b> </td>
                            </tr>
                            <tr>
                                <td style="width: 210px; padding-right: 5px; text-align: right;">Telefones:</td>
                                <td style="width: 210px;"> <b><?PHP echo $data['vs_telefone']; ?></b> </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
