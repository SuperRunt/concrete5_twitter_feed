<?php
$tp = new TaskPermission();
?>

<style type="text/css">

</style>

<div id="twitterForm">
    <div class="row">
        <div class="col-sm-12">
            <span>API KEYS AND TOKENS</span><br>
            <span>Set up your app <a href="https://apps.twitter.com">here</a>.</span>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label>Consumer Key</label>
            <input name="consumerKey" type="text" class="form-control" placeholder="" value="<?php echo $consumerKey; ?>" />
        </div>
        <div class="form-group col-sm-6">
            <label>Consumer Secret</label>
            <input name="consumerSecret" type="text" class="form-control" placeholder="" value="<?php echo $consumerSecret; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label>Access Token</label>
            <input name="accessToken" type="text" class="form-control" placeholder="" value="<?php echo $accessToken; ?>" />
        </div>
        <div class="form-group col-sm-6">
            <label>Access Token Secret</label>
            <input name="accessTokenSecret" type="text" class="form-control" placeholder="" value="<?php echo $accessTokenSecret; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <span>FEED CONFIGURATIONS</span><br>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label>List Slug **</label>
            <input name="listSlug" type="text" class="form-control" placeholder="" value="<?php echo $listSlug; ?>" />
        </div>
        <div class="form-group col-sm-6">
            <label>Creator Handle **</label>
            <div class="input-group">
                <div class="input-group-addon">@</div>
                <input name="listCreatorHandle" type="text" class="form-control" placeholder="" value="<?php echo $listCreatorHandle; ?>" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <span>** (twitter.com/[creatorHandle]/lists/[listSlug])</span>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <label>
                <input name="shouldFilterByHashtag" type="checkbox" value="<?php echo $shouldFilterByHashtag; ?>" /> Filter By Hashtag(s).
            </label>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <label>List Hashtags Here</label>
            <input name="hashtags" type="text" class="form-control" placeholder="coolstuff, iwanttosee" value="<?php echo $hashtags; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12">
            <label>
                <input name="shouldIncludeRetweets" type="checkbox" value="<?php echo $shouldIncludeRetweets; ?>" /> Include retweets.
            </label>
        </div>
    </div>
<!--    <div class="row">-->
<!--        <div class="form-group">-->
<!--            <label class="col-sm-10 control-label">How many tweets should show at a time?</label>-->
<!--            <div class="col-sm-2"><input name="tweetsToShow" type="text" class="form-control" placeholder="" value="--><?php //echo $tweetsToShow; ?><!--" /></div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="row">
        <div class="form-group">
            <label class="col-sm-10 control-label">How many tweets to rotate through?</label>
            <div class="col-sm-2"><input name="tweetsHistoryNumber" type="text" class="form-control" placeholder="" value="<?php echo $tweetsHistoryNumber; ?>" /></div>
        </div>
    </div>
</div>
