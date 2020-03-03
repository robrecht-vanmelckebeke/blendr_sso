<?php 
$TIMESTAMP = time();
$API_KEY = "...";
$show_url = false;
$url = "";
if(isset($_POST["accountid"]))
{
    $SOLUZIO_ACCOUNT_ID = $_POST["accountid"];
    $show_url = true;
    $url = "https://globis.admin.blendr.io/sso?accountid=$SOLUZIO_ACCOUNT_ID";
}
if(isset($_POST["userid"]))
{
    $url .= "&userid=".$_POST["userid"];
}

$url .= "&timestamp=$TIMESTAMP";
echo "URL : ".$url;
$hash = hash_hmac( "sha256", urlencode($url), $API_KEY);
echo "HASH : ".$hash;
$url = $url."&hash=".$hash;
?>

<form method="post">
TEST Form hier 
Account ID <input type="text" name="accountid" />
User ID <input type="text" name="userid" />
<button type="submit">Submit</button>
</form>
<?php
if ($show_url)
{ 
    //open $url in iframe
    ?>
    <?php //echo $url; ?>
    <iframe style="width:100%;height:90%" src="<?php echo $url; ?>"></iframe>
    <?php
} else {
   
}
?>