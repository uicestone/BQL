/* 
	this prevents dom flickering for elements hidden with js, needs to be outside of dom.ready event.also adds several extra classes for better browser support 
	this is a separate file that needs to be loaded at the top of the page. other js functions are loaded before the closing body tag to make the site render faster
*/
"use strict"
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && 'ontouchstart' in document.documentElement)
{
	document.documentElement.className += ' avia_mobile ';
}
else
{
	document.documentElement.className += ' avia_desktop ';
}
document.documentElement.className += ' js_active ';

(function(){
    var prefix = ['-webkit-','-moz-', '-ms-', ""];
    for (var i in prefix)
    { 
    	if(prefix[i]+'transform' in document.documentElement.style) document.documentElement.className += " avia_transform "; 
    	if(prefix[i]+'transform-origin-z' in document.documentElement.style) document.documentElement.className += " avia_transform3d "; 
	}
})();