<?php 
$TIMESTAMP = time();
$API_KEY = "...";
$show_url = false;
$url = "https://globis.admin.blendr.io/sso";
$querystring = "";
if(isset($_POST["accountid"]))
{
    $SOLUZIO_ACCOUNT_ID = $_POST["accountid"];
    $show_url = true;
    $querystring .= "accountid=$SOLUZIO_ACCOUNT_ID";
}
if(isset($_POST["userid"]))
{
    $querystring .= "&userid=".$_POST["userid"];
}

$querystring .= "&timestamp=$TIMESTAMP";
$hash = hash_hmac( "sha256", $querystring, $API_KEY);
$url = $url."?".$querystring."&hash=".$hash;
?>

<form method="post">
Enter account and user<br/>
Account ID <input type="text" name="accountid" /> <br/>
User ID (opt.) <input type="text" name="userid" /> <br/>
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