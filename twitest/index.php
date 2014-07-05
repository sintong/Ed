<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
$content = $connection->get('account/verify_credentials');

/* Some example calls */
//$connection->get('users/show', array('screen_name' => 'abraham'));
//$connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

/* Include HTML to display on the page */
//include('html.inc');
//$connection->post('statuses/destroy', array('id' => 373674877607088129));
                  /*
			function makeShortURL($URLToConvert) { 
			     $shortURL= file_get_contents("http://tinyurl.com/api-create.php?url=" . $URLToConvert); 
			     return $shortURL; 
			}

		$short=makeShortURL("http://www.facebook.com/pages/Dev_1/459610310773757?sk=app_278742425582313&app_data=tn%7Cmemphis%7Cdonate-fixed-checking&ref=ts");
			$status ='yapyzal donate fixed checking -'.$short;
			$tweet = $connection->post('statuses/update', array('status' => $status));*/


//$filename = "image.jpg";
//$handle = fopen($filename, "rb");
//$image = fread($handle, filesize($filename));
//fclose($handle);


//$params = array('media[]' => "{$image};type=image/jpeg;filename={$filename}" ,
         //   'status'   => 'my status');
//$response =$connection->post('statuses/update_with_media', $params,true,true);
 


		/*$oauth_token=$access_token['oauth_token'];
		$oauth_token_secret=$access_token['oauth_token_secret'];
		echo $oauth_token;
		echo $oauth_token_secret;*/


                        $status ='yapyzal donate fixed checkingdddrr';
			//$tweet = $connection->post('statuses/update', array('status' => $status));


                  $connection->upload('statuses/update_with_media', array('media[]' => "ganesh.jpg" , 'status' => "$status" ));

 /*$image = '2.bp.blogspot.com/-gHMuO_huw0s/UjNEQl-fL_I/AAAAAAAAAWQ/HhqGo4MskrE/s320/srinu.jpg';

    $code = $connection->request( 'POST','https://upload.twitter.com/1.1/statuses/update_with_media.json',
       array(
            'media[]'  => "@{$image};type=image/jpeg;filename={$filename}",
            'status'   => 'hi this is sample',
       ),
        true, // use auth
        true  // multipart
    );

    if ($code == 200){
       tmhUtilities::pr(json_decode($connection->response['response']));
    }else{
       tmhUtilities::pr($connection->response['response']);
    }
    return tmhUtilities;
*/


/*$img='http://2.bp.blogspot.com/-gHMuO_huw0s/UjNEQl-fL_I/AAAAAAAAAWQ/HhqGo4MskrE/s320/srinu.jpg';
$txt='hi....';
$img = './'.$img; 
$code = $connection->post('statuses/update_with_media', array( 
'media[]' => "@{$img}",
 'status' => "$txt" ),
 true, // use auth 
 true // multipart
 ); 

echo $code;
 if ($code == 200){
 echo '<h1>Your image tweet has been sent successfully</h1>';
 }
else{
 //tmhUtilities::pr($tmhOAuth->response['response']); 
echo "sssssssss";
} */




/*if($_POST){
	if($_POST['hiddentext']=='instweet'){
		$status = $_POST['tweettext'];
		$tweet = $connection->post('statuses/update', array('status' => $status));
		$tweetid=$tweet->id_str;
		header('Location:index.php?tweetid='.$tweetid);
	}


}

//echo $connection->post('statuses/update', array('status' => $status));
if($_GET){
	if($_GET['action']=='delete'){
		$id = $_GET['tweetid'];
		$status = $connection->delete('statuses/destroy/'.$id);
		header('Location:index.php');
	}
}
?>

<form method="post">
	
	<textarea name="tweettext" id="tweettext" rows="5" cols="50">Awesome art - http://yappyzealz.net/l/tn/memphis/d/awesome-art</textarea>
	<input type="hidden" name="hiddentext" id="hiddentext" value="instweet" />
    <input type="submit" value="Tweet" /> 
</form>
<?php

if($_GET){
	echo "Updated your tweet status.";
	echo " .... <a href='index.php?action=delete&tweetid=".$_GET['tweetid']."'>Delete your tweet</a>";
}
?>*/
