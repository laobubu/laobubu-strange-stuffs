// ==UserScript==
// @name        百度文库免积分下载补丁
// @namespace   baiduwenkudownload
// @author      laobubu.net
// @include     http://wenku.baidu.com/view/*
// @version     1
// ==/UserScript==

//如何安装到Chrome： 进入扩展管理页面，把这个文件(xxx.user.js)拖进去即可
var _bw1=document.getElementsByClassName("doc-header")[0];
var _bw2=document.createElement("a");
_bw2.textContent="免积分下载（另存为，需要自己输入文件名）";
_bw2.href = "http://appwk.baidu.com/?rt=dc&doc_id=" + window.location.href.match('([a-zA-Z0-9]+)\.htm')[1] + "&pn=0&rn=0&pw=1000&dt=0&uid=abd_123456789_mo_12:34:56:78:9a:bc&from=android_11111&ua=bd_480_800_4.0.3";
_bw2.style.backgroundColor="black";
_bw2.style.color="white";
_bw2.style.padding="0.5em";
_bw2.style.lineHeight="3em";
_bw2.style.borderRadius="5px";
_bw2.style.boxShadow = "0 0 10px #000";
_bw2.id="doc-cracker";
_bw1.appendChild(_bw2);
//For Chrome
var script = document.createElement('script');
script.setAttribute("type", "application/javascript");
script.textContent = '\nvar _lllls=document.getElementById("doc-cracker");_lllls.download = WkInfo.DocInfo.title + "." + WkInfo.DocInfo.docType;_lllls.textContent="免积分下载";_lllls.id="";_lllls=null;';
document.body.appendChild(script);