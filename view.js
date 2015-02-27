/**
 * Created by superrunt on 2/23/15.
 */
angular.module('sequence.elements').
    filter("timeAgo", [ "moment", function (moment) {
        return function (datetime) {
            return moment(datetime).fromNow()
        }
    }]).
    directive("showTwitterFeed", [ "$http", "$interval", "$timeout", function($http, $interval, $timeout) {
        return {
            restrict : "A",
            link : function(scope, element, attrs) {

                var _errorMsg = angular.element( document.querySelectorAll("ul.errors") );
                var _twContainer = angular.element( document.querySelectorAll(".twitter div.container") );
                _errorMsg.hide();
                var _waitForIt = angular.element("<div class='waitForIt'><i class='fa fa-circle-o-notch fa-spin fa-5x'></i></div>")
                element.append(_waitForIt)

                scope.moving = false;
                scope.tweetWatcher;
                scope.$watch('tweetWatcher', function(newData, oldData) {
                    if (newData && newData !== oldData) {
                        scope.tweets = newData;
                    }
                });

                var getTweets = function () {
                    $http.get(attrs['showTwitterFeed']).
                    success(function(data, status) {
                        if ( !data.errors ) {
                            console.log(data)
                            _waitForIt.hide()
                            _errorMsg.hide()
                            _twContainer.show()
                            scope.tweetWatcher = data;
                        } else {
                            scope.errors = data.errors;
                            _twContainer.hide()
                            _waitForIt.show()
                            _errorMsg.show()
                        }
                    }).
                    error(function(data, status) {
                        console.log("ERROR")
                        console.log(data)
                        console.log(status)
                    });
                };

                var reListTweets = function () {
                    if ( scope.moving ){
                        scope.tweets.push(scope.tweets.shift());
                    }
                    scope.moving = !scope.moving;
                }
                // get first data set, then look every 120 secs after that
                getTweets();
                $interval(getTweets, 120000);
                // rotate tweets
                $interval(reListTweets, 2000);
//                $interval(function () {
//                    $timeout(reListTweets, 2000)
//                }, 4000);
            }
        };
    }]);