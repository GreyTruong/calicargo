/*
 * tweetable 2.1.1 - jQuery twitter feed plugin
 *
 * Copyright (c) 2009 Philip Beel (http://www.theodin.co.uk/)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * With modifications from Philipp Robbel (http://www.robbel.com/) & Patrick DW (stackoverflow)
 *
 * Revision: $Id: jquery.tweetable.min.js 2013-12-10 $
 *
 */
(function(e){jQuery.fn.tweetable=function(t){t=e.extend({},e.fn.tweetable.options,t);return this.each(function(){function c(){if(window.localStorage){var e=JSON.parse(localStorage.getItem("tweetable"));if(!e){return false}var n=e&&e.timestamp||0;return p(n,t.cacheInMilliseconds)}}function h(e){if(window.localStorage){var t=JSON.parse(localStorage.getItem("tweetable"));return t.value}}function p(e,t){var n=(new Date).getTime();return n-t<=e}function d(e){localStorage.removeItem(e)}function v(e){if(window.localStorage){var t={value:e,timestamp:(new Date).getTime()};localStorage.setItem("tweetable",JSON.stringify(t))}}function m(){jQuery("#tweet_loader").remove()}function g(){n.append('<p id="tweet_loader">'+t.loading+"</p>")}function y(){n.append('<li class="tweet_content item"><p class="tweet_link">'+t.failed+"</p></li>")}function b(e,t){n.append('<li class="tweet_content_'+e+'"><p class="tweet_link_'+e+'">'+t.response.replace(/#(.*?)(\s|$)/g,'<span class="hash">#$1 </span>').replace(/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig,'<a href="$&">$&</a> ').replace(/@(.*?)(\s|\(|\)|$)/g,'<a href="http://twitter.com/$1">@$1 </a>$2').replace(/:">/,' ">').replace(/: <\/a>/,"</a>:")+"</p></li>")}function w(e){return e&&e.error||null}function E(e,n){var i;var s;for(s=0;s<=12;s++){if(r[s]===n.tweet_date.substr(4,3)){a=s++;u=a<=9?"0"+a:a}}i=n.tweet_date.substr(26,4)+"-"+u+"-"+n.tweet_date.substr(8,2)+"T"+n.tweet_date.substr(11,8)+"Z";jQuery(".tweet_link_"+e).append('<p class="timestamp"><'+(t.html5?'time datetime="'+i+'"':"small")+"> "+n.tweet_date.substr(8,2)+"/"+u+"/"+n.tweet_date.substr(26,4)+", "+n.tweet_date.substr(11,5)+"</"+(t.html5?"time":"small")+"></p>")}function S(){function o(){e.eq(i++).fadeOut(400,function(){i=i===r?0:i;e.eq(i).fadeIn(400)})}var e=n.find("li");var r=e.length||null;var i=0;var s=t.speed;if(!r){return}e.slice(1).hide();setInterval(o,s)}function x(e){if(w(e)){y();return}else{v(e)}jQuery.each(e,function(e,n){if(e>=t.limit){return}b(e,n);if(t.time===true){E(e,n)}});if(t.rotate===true){S()}t.onComplete(n)}var e=jQuery(this);var n=jQuery('<ul class="tweetList">')[t.position.toLowerCase()+"To"](e);var r=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];var i="http://api.getmytweets.co.uk/?screenname=";var s="&limit=";var o="&callback=?";var u;var a;var f;var l;if(c()){var T=h();x(T)}else{g();jQuery.getJSON(i+t.username+s+t.limit).done(function(e){m();x(e.tweets)}).fail(function(e,t,n){m();y();return})}})};e.fn.tweetable.options={limit:5,username:"philipbeel",time:false,rotate:false,speed:5e3,replies:false,position:"append",failed:"No tweets available",loading:"Loading tweets...",html5:false,retweets:false,cacheInMilliseconds:36e5,onComplete:function(e){}}})(jQuery);jQuery.support.cors=true