<?php
class User{
	private $userId;
	private $userLogin;
	private $userEmail;
	private $userPassword;
	private $userGroup;
	private $dbm;
	private $dbA;

	function __construct()	{
	}

	/**
	 * SETTERS AND GETTERS
	 * @return unknown_type
	 */
	/*
	 * MYSQL DB
	 */
	private function getDb(){
		if(isset($this)){
			if(! $this->dbm){
				global $dbm;
				$this->setDb(clone $dbm);
			}
			return $this->dbm;
		}else{
			global $dbm;
			$clonedDb = clone $dbm;
			return $clonedDb;
		}
	}

	public function setDb($dbm){
		$this->dbm = $dbm;
	}


	/*
	 * EXIST DB
	 */
	private function getDbA(){
		if(isset($this)){
			if(! $this->dbA){
				global $dbA;
				$this->setDbA(clone $dbA);
			}
			return $this->dbA;
		}else{
			global $dbA;
			$clonedDbA = clone $dbA;
			return $clonedDbA;
		}
	}

	public function setDbA($dbA){
		$this->dbA = $dbA;
	}

	/**
	 * SETTERS AND GETTERS
	 * @return unknown_type
	 */

	public function getId(){
		return $this->userId;
	}

	public function getLogin(){
		return $this->userLogin;
	}
	public function getEmail(){
		return $this->userEmail;
	}
	public function getPassword(){
		return $this->userPassword;
	}

	public function getGroup(){
		return $this->userGroup;
	}

	public function setId($userId){
		$this->userId = $userId;
	}

	public function setLogin($userLogin){
		$this->userLogin = $userLogin;
	}
	public function setEmail($userEmail){
		$this->userEmail = $userEmail;
	}
	public function setPassword($userPassword){
		$this->userPassword = $userPassword;
	}

	public function setGroup($userGroup){
		$this->userGroup = $userGroup;
	}

	//---------FONCTION D'ENCODAGE ET DE DECODAGE DE MOT DE PASSE--------//
	public function passwordDecode($filter, $str)
	{
		$filter = md5($filter);
		$letter = -1;
		$newstr = '';
		$str = base64_decode($str);
		$strlen = strlen($str);

		for ( $i = 0; $i < $strlen; $i++ )
		{
			$letter++;

			if ( $letter > 31 )
			{
				$letter = 0;
			}

			$neword = ord($str{$i}) - ord($filter{$letter});

			if ( $neword < 1 )
			{
				$neword += 256;
			}

			$newstr .= chr($neword);
		}

		return $newstr;
	}

	public function passwordEncode($filter, $str)
	{
		$filter = md5($filter);
		$letter = -1;
		$newpass = '';
		$newstr = '';

		$strlen = strlen($str);

		for ( $i = 0; $i < $strlen; $i++ )
		{
			$letter++;

			if ( $letter > 31 )
			{
				$letter = 0;
			}

			$neword = ord($str{$i}) + ord($filter{$letter});

			if ( $neword > 255 )
			{
				$neword -= 256;
			}

			$newstr .= chr($neword);

		}

		return base64_encode($newstr);
	}

	public function userAuthentify($email,$password){
		$db = $this->getDb();
		$password = self::passwordEncode('dpweb', $password);
		$query="select * from user where user_email ='".$email."' and user_password ='".$password."'";
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows!=1){
			return null;
		}else{
			$user = $db->nextLine($resultSet);
			$this->setId($user['user_id']);
			$this->setLogin($user['user_login']);
			$this->setEmail($user['user_email']);
			$this->setPassword($user['user_password']);
			$this->setGroup($user['user_group']);
			return $this;
		}
	}

	//fonction de verification d'e.mail
	static public function verifiEmail($email)
	{
	 $regex = "/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i";
	 $_SESSION["mail"]=strtolower(trim($email));
	 $_SESSION["mp"]=$_POST['mp'];
	 $courriel=strtolower(trim($_SESSION["mail"]));
	 if (preg_match($regex, $courriel))
	 {
	 	return TRUE;
	 }
	 else
	 {
	 	return FALSE;
	 }
	}

	//fonction d'existence du mail dans notre base de donnï¿½es
	static public function existEmail($email)
	{
		$db = self::getDb();
		$flag = true;
		$query="select user_id from user where user_email='".$email."'";
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		$db->freeResult($resultSet);
		if ($numRows!=1){
			$flag = false;
		}
		return $flag;
	}


	//Envoyer un mail d'activation
	function sendMailActivation($login,$recipient,$mp){
	 $code = $_SESSION["code"] = md5(uniqid(rand(), true));
	 $sender = 'moubarak1@yahoo.fr';
	 $objet = 'Activez votre demande de logement en ligne!'; // Objet du message
	 $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
	 $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
	 $headers .= 'Disposition-Notification-To: '.$sender."\n"; // un accusï¿½ de rï¿½ception 
	 $headers .= 'Reply-To: '.$sender."\n"; // Mail de reponse
	 $headers .= 'From: "Service logement CROU-A"<'.$sender.'>'."\n"; // Expediteur
	 $headers .= 'Delivered-to: '.$recipient."\n"; // Destinataire
	 $message = '<p>Ce message  provient du service logement du CROU - Abidjan</p>
	<p>TRES IMPORTANT, Votre dossier est bien cr&eacute;&eacute; mais il ne sera pas actif tant que vous n\'aurez pas cliqu&eacute; sur ce lien: <br /><a href="http://www.inscription.gci-ci.com/index.php?phase=activation&id='.$code.'" target="_blank">http://www.inscription.gci-ci.com/index.php?phase=activation&id='.$code.'</a></p>
	<p><strong>Vous devez imp&eacute;rativement valider ce dossier avant la date limite de d&eacute;p&ocirc;t des dossiers en ligne </strong> (le  &agrave; Minuit, heure officielle en C&ocirc;te d\'Ivoire).</p>
	<p>Si votre dossier n\'est pas valid&eacute;, il ne sera pas trait&eacute; par nos services.</p>
	<p>Pour consulter, modifier ou valider votre dossier, connectez-vous &agrave; l\'adresse  suivante : 
	<a href="http://www.inscription.gci-ci.com/" target="_blank">http://www.inscription.gci-ci.com/</a><br />
	puis cliquez sur le choix <strong>\'Mon dossier\'</strong> de la rubrique <strong>\'Dossier\'</strong> du  menu g&eacute;n&eacute;ral et saisissez votre e.mail et votre mot de passe.</p>
	<p>E.mail: <strong>'.$recipient.'</strong><br />Mot de passe: <strong>'.$mp.'</strong><br /></p>
	<p>ATTENTION : Vous certifiez que les renseignements ci-apr&egrave;s &eacute;num&eacute;r&eacute;s sont dignes de foi. Vous &ecirc;tes avis&eacute; que toute fausse d&eacute;claration engage votre responsabilit&eacute; et vous expose &agrave; des sanctions graves. </p>';
	 if (mail($recipient, $objet, $message, $headers)){
	 	return TRUE;
	 }
	 else {
	 	return FALSE;
	 }
	}

	static public function getAllUser(){
		$db = self::getDb();
		$query = "select * from user";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet)){
			$users[$i]['num'] = $i+1;
			$users[$i]['id'] = $row["user_id"];
			$users[$i]['login'] = $row["user_login"];
			$users[$i]['email'] = $row["user_email"];
			if ($row['user_group'] == "administrator")
			{
				$users[$i]['group'] = "Administrateur";
			}
			elseif($row['user_group'] == "manager")
			{
				$users[$i]['group'] = "Gestionnaire";
			}
			elseif($row['user_group'] == "user")
			{
				$users[$i]['group'] = "Visiteur";
			}
			$i++;
		}
		$_SESSION['size'] = $db->resultSetNumRows($resultSet); ;
		return $users;
	}
	
	static public function getOneUser($id)
	{
		$db = self::getDb();
		$query = "select * from user where user_id='".$id."'";
		$resultSet = $db->execQuery($query);
		$row = $db->nextLine($resultSet);
		$user['user_id'] = $row["user_id"];
		$user['user_login'] = $row["user_login"];
		$user['user_email'] = $row["user_email"];
		$user['user_group'] = $row["user_group"];
		return $user;
	}
	
	public function newUser(){
		$db = $this->getDb();
		$flag = true;
		$this->userPassword = self::passwordEncode('dpweb', $this->userPassword);
		$query = "INSERT INTO user VALUES ('','".$this->userLogin."','".$this->userEmail."', '".$this->userPassword."', '".$this->userGroup."')";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	public function updateUser($id)
	{
		$db = $this->getDb();
		$flag = true;
		$query = "update user SET user_login='".$this->userLogin."', user_group='".$this->userGroup."' WHERE user_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	static public function deleteUser($id)
	{
		$db = self::getDb();
		$query = "delete from user where user_id='".$id."'";
		$resultSet = $db->execQuery($query);
	}
	
	static public function passwordGenerate()
	{
		// Génération d'un mot de passe de 8 caractères alpha-numériques
		$tableau = array("0","1","2","3","4","5","6","7","8","9",
		"a","b","c","d","e","f","g","h","i","j","k","l","m","n",
		"o","p","q","r","s","t","u","v","w","x","y","z",
		"A","B","C","D","E","F","G","H","I","J","K","L","M","N",
		"O","P","Q","R","S","T","U","V","W","X","Y","Z");
		
		$valeurs_aleatoires = array_rand($tableau, 8);
		// ----------
		$mot_de_passe = "";
		
		foreach($valeurs_aleatoires as $i)
		{
		     $mot_de_passe = $mot_de_passe . $tableau[$i];
		}
		return $mot_de_passe;
	}

}
?>