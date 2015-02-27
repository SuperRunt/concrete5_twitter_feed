<?php  
defined('C5_EXECUTE') or die("Access Denied.");
$c = Page::getCurrentPage();
?>
<style>
    .waitForIt, .twitter { width: 100%;text-align: center; }
    .twitter { height: 150px;overflow: hidden;position: relative;overflow:hidden; }

    .twitter div.container { display: inline-block;margin: 0 auto;height: 150px; }
    .twitter div.container.moving { -webkit-animation: moveUp 2s linear;  }
    .twitter div.container div.tweet { padding: 0 15px;text-align: center;height: 150px; }
    .twitter div.container div.tweet div.time { text-align: center;color: #f58220; }
    .twitter div.container div.tweet a.text { color: #959595 !important; }
    .twitter div.container div.tweet a.text:hover { text-decoration: none !important; }

    .twitter li { list-style: none;width: 100%;text-align: center; }


    @-webkit-keyframes moveUp {
        0% { -webkit-transform: translateY(0) }
        100% { -webkit-transform: translateY(-150px) }
    }

</style>
<div class="ccm-block-twitter-feed-wrapper">
    <div class="twitter" show-twitter-feed="<?php echo Loader::helper('concrete/urls')->getBlockTypeToolsURL($bt); ?>/feed?bID=<?php echo $this->controller->bID; ?>'">
        <ul class="errors" style="display: none;">
            <li ng-repeat="e in errors"> {{ e.message }} </li>
        </ul>
        <div class="container" style="display: none;" ng-class="{moving: moving}">
            <div ng-repeat="t in tweets | limitTo: <?php echo $tweetsHistoryNumber ?>" class="tweet clearfix">
                <a ng-href="http://twitter.com/{{t.user.screen_name}}">@{{t.user.screen_name}}</a>
                <a class="text" target="_blank" ng-href="http://twitter.com/{{t.user.screen_name}}/status/{{t.id_str}}">{{t.text}}</a>
                <div class="time">{{t.createdAt | timeAgo}}</div>
            </div>
        </div>
    </div>

</div>