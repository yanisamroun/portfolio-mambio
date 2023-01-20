<?php
if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"VOTRE NOM"<email-expediteur@example.org>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur :</u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
				</div>
			</body>
		</html>
		';

		mail("yanisamroun@gmail.com", "CONTACT - Monsite.com", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}
}
?>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
    <div class="span-4-5">
										<h3 class="major">Me contacter rapidement</h3>
										<form method="POST" action="">
											<div class="fields">
												<div class="field third">
													<label for="nom">Nom</label>
													<input type="text" name="nom" id="nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" placeholder="Jane Doe" />
												</div>
												<div class="field third">
													<label for="email">Email</label>
													<input type="email" name="mail" id="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" placeholder="jane@untitled.tld" />
												</div>
												<div class="field third">
													<label for="category">Catégorie</label>
													<div class="select-wrapper">
														<select name="category" id="category">
															<option value="">-</option>
															<option value="1">Renseignement</option>
															<option value="1">Recrutement</option>
															<option value="1">Devis</option>
														</select>
													</div>
												</div>
												
												<div class="field">
													<label for="message">Message</label>
													<textarea name="message" id="message" placeholder="Enter your message" rows="2"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea>
												</div>
											</div>
											<ul class="actions">
												<li><input type="submit" value="Envoyer !" class="primary color2" name="mailform" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</form>
										
									</div>
		
		<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
	</body>
</html>