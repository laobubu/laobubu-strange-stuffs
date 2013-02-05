// ==UserScript==
// @name        YouTube Crack
// @namespace   youtubecrack
// @author      laobubu.net
// @include     https://www.youtube.com/watch*
// @version     1
// ==/UserScript==

//注意！可能在Chrome下因为google诡异的强制HTTPS工作不正常，但是在火狐下还OK啦

var _yp1=document.getElementsByTagName("embed")[0].parentElement;
_yp1.innerHTML=_yp1.innerHTML.replace(/c\.youtube/g,'c.docs.google');
