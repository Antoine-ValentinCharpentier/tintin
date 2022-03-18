<?php
	include "db.php";

	function Tronquerdate_publication($date_publication){
		return date('d/m/y | G:i', strtotime($date_publication));
	}

	$allmsg = $bdd->query("SELECT * FROM chat ORDER BY id DESC LIMIT 0, 20");

	while ($msg = $allmsg->fetch()){

		$reqsender = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
		$reqsender->execute(array($msg['id_pseudo']));
		$senderinfo = $reqsender->fetch();


		$emoji_replace = array(':)',':-)', '(angry)',':3',":'(",':|',':(',':-(',';)',';-)');
		$emoji_new = array('<img src="images/emojis/emo_smile.png">','<img src="images/emojis/emo_smile.png">','<img src="images/emojis/emo_angry.png">','<img src="images/emojis/emo_cat.png">','<img src="images/emojis/emo_cry.png">','<img src="images/emojis/emo_noreaction.png">','<img src="images/emojis/emo_sad.png">','<img src="images/emojis/emo_sad.png">','<img src="images/emojis/emo_wink.png">','<img src="images/emojis/emo_wink.png">');
		$msg['message'] = str_replace($emoji_replace, $emoji_new, $msg['message']);
?>

		<?php

		if ($msg['id']%2 == 0) {
		?>
			<div id="message-chat-right">
				<img src="membres/avatars/<?php echo $senderinfo['avatar'];?>" alt="<?php echo $senderinfo['pseudo'];?>" class="left">
				<p class="pseudo">| <?php echo $senderinfo['pseudo'];?> | </p>
				<p><?php echo $msg['message']; ?></p>
				<span class="time-right"><?php echo Tronquerdate_publication($msg['date_publication']); ?></span>
			</div>

		<?php
		}else{
		?>
		<div id="message-chat-left">
			<img src="membres/avatars/<?php echo $senderinfo['avatar'];?>" alt="<?php echo $senderinfo['pseudo'];?>" class="right">
			<p class="pseudo">| <?php echo $senderinfo['pseudo'];?> | </p>
			<p><?php echo $msg['message']; ?></p>
			<span class="time-left"><?php echo Tronquerdate_publication($msg['date_publication']); ?></span>
		</div>

<?php
		}
	}
?>