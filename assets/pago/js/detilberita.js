/*
 WhatsApp :
 https://api.whatsapp.com/send?text=[post-title] [post-url]


 Facebook
 https://www.facebook.com/sharer.php?u=[post-url]

 Twitter
 https://twitter.com/share?url=[post-url]&text=[post-title]&via=[via]&hashtags=[hashtags]
*/

const facebookBtn = document.querySelector(".facebook-btn");
const twitterBtn = document.querySelector(".twitter-btn");
const whatsappBtn = document.querySelector(".whatsapp-btn");


function init() {
    let postUrl = document.location.href;
    let postTitle =("Yuk, Lihat berita lainnya: ");
    facebookBtn.setAttribute(
        "href",
         `https://www.facebook.com/sharer.php?u=${postUrl}`
         );

    twitterBtn.setAttribute(
        "href",
        `https://twitter.com/share?url=${postUrl}&text=${postTitle}`
        );
  
     whatsappBtn.setAttribute(
        "href",
        `https://wa.me/?text=${postTitle} ${post-Url}`
        );
}


// share

jQuery(document).ready(function($){
	function getFBShares(page){
		var shares;
		$.getJSON("http://graph.facebook.com/?ids=" + page, function(data){
			if (data[page].shares > 1){
				shares = data[page].shares;
				$("#fb-share").append(" (" + shares + ")");
			}
		});
	}
	

	var Url = window.location.href;
	var UrlEncoded = encodeURIComponent(Url);
	var title = encodeURIComponent(document.getElementById("title").innerText);
	getFBShares(Url);
	getTweets(Url);
	getLinkedIn(Url);
	document.getElementById("fb-share").href="http://www.facebook.com/share.php?u=" + UrlEncoded;
	document.getElementById("tweet").href="http://twitter.com/home?status=" + title + " " + UrlEncoded;
	document.getElementById("linkedin").href="http://www.linkedin.com/shareArticle?mini=true&url=" + UrlEncoded + "&title=" + title;
	document.getElementById("gplus-share").href="https://plus.google.com/share?url=" + UrlEncoded;
	document.getElementById("email-share").href="mailto:?body=Take a look at this page I found: " + title + ". You can read it here: " + Url;
});

// end