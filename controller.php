<?php namespace Concrete\Package\Sequence\Block\TwitterFeed;

    use Loader;
    require "src/twitteroauth/autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;

    class Controller extends \Concrete\Core\Block\BlockController {

        protected $btTable 									= 'btTwitterFeed';
        protected $btCacheBlockRecord 						= true;
        protected $btCacheBlockOutput 						= true;
        protected $btCacheBlockOutputOnPost 				= true;
        protected $btCacheBlockOutputForRegisteredUsers 	= false;
        protected $btCacheBlockOutputLifetime 				= 0;

        private $apiConnection;

        public function getBlockTypeDescription(){
            return t("Add a twitter feed");
        }


        public function getBlockTypeName(){
            return t("Twitter Feed");
        }


        public function view(){
            $this->requireAsset('css', 'core/font-awesome');
            // TODO: add a type parameter set in block edit: list, timeline, etc
//            $this->set('tweets', $this->_getTweets());
            $this->set('showLimit', $this->tweetsToShow);
        }


        public function add(){
            $this->edit();
        }


        public function composer(){
            $this->edit();
        }


        public function edit(){

        }

        public function save( $args ) {
            parent::save($args);
        }

        public function refreshFeed() {
            return $this->_getTweets();
        }

        private function _getTwitterAPIConnection() {
            if ( !$this->apiConnection ) {
                $this->apiConnection = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);
            }
            return $this->apiConnection;
        }

        private function _getTweets( $type = 'list' ) {
            $apiPath = "";
            switch ( $type ) {
                case 'list':
                    $apiPath = "lists/statuses";
                    break;
                default:
                    $apiPath = "statuses/home_timeline";
                    break;
            }

            $connection = $this->_getTwitterAPIConnection();
            $statuses = $connection->get($apiPath, array("count" => $this->tweetsHistoryNumber, "slug" => $this->listSlug, "owner_screen_name" => $this->listCreatorHandle));

            return $statuses;
        }

    }