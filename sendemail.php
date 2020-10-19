<?php
	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Email enviado!'
	);
       
    $subject  = 'Contato Viva Promotora';    
    $nome     = trim(stripslashes($_POST['nome'])); 
    $email    = trim(stripslashes($_POST['email'])); 
    $telefone = trim(stripslashes($_POST['telefone'])); 
    $cidade   = trim(stripslashes($_POST['cidade'])); 
    $mensagem = trim(stripslashes($_POST['mensagem'])); 

    $email_from = $email;
    
    $body = 'Nome: ' . $nome . '<br>Email: ' . $email . '<br>Cidade: '. $cidade . '<br>Telefone: ' . $telefone . '<br>Mensagem: ' . $mensagem;

    // Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
    include 'PHPMailer/PHPMailerAutoload.php';
    // Inicia a classe PHPMailer
    $mail = new PHPMailer();
    // Define os dados do servidor e tipo de conexão
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsSMTP(); // Define que a mensagem será SMTP
    $mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
    $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
    $mail->Username = 'thyago.pacher@gmail.com'; // Usuário do servidor SMTP
    $mail->Password = 'Brasil1602*'; // Senha do servidor SMTP
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";

//    $mail->SMTPDebug = 1;
    // Define o remetente
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->From = "thyago.pacher@gmail.com"; // Seu e-mail
    $mail->FromName = "Thyago H. Pacher"; // Seu nome
    // Define os destinatário(s)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->AddAddress('thyago.pacher@gmail.com', 'Thyago');
    $mail->AddAddress('tiagofranco.silveira@gmail.com', 'Tiago Franco');
    //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
    //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
    // Define os dados técnicos da Mensagem
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
    //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
    // Define a mensagem (Texto e Assunto)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->Subject  = $subject; // Assunto da mensagem
    $mail->Body = $body;
    // Define os anexos (opcional)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
    // Envia o e-mail
    $enviado = $mail->Send();
    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    // Exibe uma mensagem de resultado
    if ($enviado) {
	$status = array('type'=>'success','message'=>'Email enviado!');      
    } else {
        $status = array('type'=>'error','message'=>"Não foi possível enviar o e-mail.<b>Informações do erro:</b> " . $mail->ErrorInfo);      
    }    
    $success = mail('tiagofranco.silveira@gmail.com', $subject, $body); /*só para confirmar não custa nada*/
    echo json_encode($status);
    die;