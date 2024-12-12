<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html;" />
        <title>amexcom</title>
    </head>
    <body style="font-family: 'Gautami', 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 15px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6; background: #f6f6f6; margin: 0; padding: 0;">
        <table style="width: 100%; background: #f6f6f6; margin: 0; padding: 0;">
            <tr style="font-size: 15px; margin: 0; padding: 0;">
                <td style="font-size: 15px; vertical-align: top; margin: 0; padding: 0;" valign="top"></td>
                <td width="480" style="font-size: 15px; vertical-align: top; display: block !important; max-width: 650px !important; margin: 0 auto; padding: 0;" valign="top">
                    <div style="font-size: 15px; line-height: 15px; background: #fff; margin: 0; padding: 20px; margin-top: 40px; margin-bottom: 40px; border: 1px solid #e9e9e9;">
                        <p style="text-align: center; font-size: 16px;">
                            Relatório de acessos semanal | <b><?PHP echo $data_semana; ?></b> - <b><?PHP echo $data_hoje; ?></b>
                        </p>
                        
                        <p style="margin-top: 30px; margin-bottom: 8px; text-align: center;">
                            <b>Páginas mais acessadas</b>
                        </p>
                        <table style="border: 1px solid #e9e9e9; padding-top: 10px; padding-bottom: 7px; margin-top: 0px; border-radius: 5px; width: 100%;" border="0" cellspacing="0" cellpadding="0">
                            <?PHP 
                                foreach ($paginas_mv as $mv) {
                                    echo '<tr>';
                                        echo '<td style="padding-left: 10px; padding-bottom: 3px;"><b>'.$mv[0]['Total'].'</b> - '.$mv['AcessoSite']['pagina'].'</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        
                        
                        <p style="margin-top: 30px; margin-bottom: 8px; text-align: center;">
                            <b>Plataforma </b>
                        </p>
                        <table style="border: 1px solid #e9e9e9; padding-top: 10px; padding-bottom: 10px; margin-top: 0px; border-radius: 5px; width: 100%;">
                            <?PHP 
                                foreach ($plataformas as $plataforma) {
                                    echo '<tr>';
                                        echo '<td style="width: 210px;  text-align: right;">'.$plataforma['AcessoSite']['plataforma'].':</td>';
                                        echo '<td style="width: 210px;"> <b>'.$plataforma[0]['Total'].'</b> </td>';
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        
                        <p style="margin-top: 30px; margin-bottom: 8px; text-align: center;">
                            <b>Cliques / Redirecionamentos </b>
                        </p>
                        <table style="border: 1px solid #e9e9e9; padding-top: 10px; padding-bottom: 10px; margin-top: 0px; border-radius: 5px; width: 100%;">
                            <tr>
                                <td style="width: 210px;  text-align: right;">WhatsApp:</td>
                                <td style="width: 210px;"> <b><?PHP echo $count_cr_whats; ?></b> </td>
                            </tr>
                            <tr>
                                <td style="width: 210px; padding-right: 5px; text-align: right;">Facebook:</td>
                                <td style="width: 210px;"> <b><?PHP echo $count_cr_facebook; ?></b> </td>
                            </tr>
                            <tr>
                                <td style="width: 210px; padding-right: 5px; text-align: right;">Instagram:</td>
                                <td style="width: 210px;"> <b><?PHP echo $count_cr_instagram; ?></b> </td>
                            </tr>
                            <tr>
                                <td style="width: 210px; padding-right: 5px; text-align: right;">Youtube:</td>
                                <td style="width: 210px;"> <b><?PHP echo $count_cr_youtube; ?></b> </td>
                            </tr>
                            <tr>
                                <td style="width: 210px; padding-right: 5px; text-align: right;">Twitter:</td>
                                <td style="width: 210px;"> <b><?PHP echo $count_cr_twitter; ?></b> </td>
                            </tr>
                            <tr>
                                <td style="width: 210px; padding-right: 5px; text-align: right;">Linkedin:</td>
                                <td style="width: 210px;"> <b><?PHP echo $count_cr_linkedin; ?></b> </td>
                            </tr>
                        </table>
                        
                        <p style="margin-top: 30px; margin-bottom: 8px; text-align: center;">
                            <b>Contatos / Leads </b>
                        </p>
                        <table style="border: 1px solid #e9e9e9; padding-top: 10px; padding-bottom: 10px; margin-top: 0px; border-radius: 5px; width: 100%;">
                            <tr>
                                <td style="width: 210px;  text-align: right;">Fale Conosco:</td>
                                <td style="width: 210px;"> <b><?PHP echo $count_contatos; ?></b> </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
