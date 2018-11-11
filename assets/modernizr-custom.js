/*! modernizr 3.2.0 (Custom Build) | MIT *
 * http://modernizr.com/download/?-backgroundsize-bgpositionxy-bgrepeatspace_bgrepeatround-bgsizecover-borderradius-cssanimations-csscalc-cssremunit-csstransitions-cssvhunit-cssvwunit-displaytable-flexbox-flexboxlegacy-flexwrap-fontface-ie8compat-mediaqueries-opacity-svg-svgasimg-unicode-wrapflow !*/
!function(e,t,n){function r(e,t){return typeof e===t}function i(){var e,t,n,i,s,o,a;for(var d in x)if(x.hasOwnProperty(d)){if(e=[],t=x[d],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(i=r(t.fn,"function")?t.fn():t.fn,s=0;s<e.length;s++)o=e[s],a=o.split("."),1===a.length?Modernizr[a[0]]=i:(!Modernizr[a[0]]||Modernizr[a[0]]instanceof Boolean||(Modernizr[a[0]]=new Boolean(Modernizr[a[0]])),Modernizr[a[0]][a[1]]=i),w.push((i?"":"no-")+a.join("-"))}}function s(e){var t=b.className,n=Modernizr._config.classPrefix||"";if(C&&(t=t.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(r,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),C?b.className.baseVal=t:b.className=t)}function o(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):C?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function a(e,t){if("object"==typeof e)for(var n in e)_(e,n)&&a(n,e[n]);else{e=e.toLowerCase();var r=e.split("."),i=Modernizr[r[0]];if(2==r.length&&(i=i[r[1]]),"undefined"!=typeof i)return Modernizr;t="function"==typeof t?t():t,1==r.length?Modernizr[r[0]]=t:(!Modernizr[r[0]]||Modernizr[r[0]]instanceof Boolean||(Modernizr[r[0]]=new Boolean(Modernizr[r[0]])),Modernizr[r[0]][r[1]]=t),s([(t&&0!=t?"":"no-")+r.join("-")]),Modernizr._trigger(e,t)}return Modernizr}function d(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function l(){var e=t.body;return e||(e=o(C?"svg":"body"),e.fake=!0),e}function u(e,n,r,i){var s,a,d,u,f="modernizr",c=o("div"),p=l();if(parseInt(r,10))for(;r--;)d=o("div"),d.id=i?i[r]:f+(r+1),c.appendChild(d);return s=o("style"),s.type="text/css",s.id="s"+f,(p.fake?p:c).appendChild(s),p.appendChild(c),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(t.createTextNode(e)),c.id=f,p.fake&&(p.style.background="",p.style.overflow="hidden",u=b.style.overflow,b.style.overflow="hidden",b.appendChild(p)),a=n(c,e),p.fake?(p.parentNode.removeChild(p),b.style.overflow=u,b.offsetHeight):c.parentNode.removeChild(c),!!a}function f(e,t){return!!~(""+e).indexOf(t)}function c(e,t){return function(){return e.apply(t,arguments)}}function p(e,t,n){var i;for(var s in e)if(e[s]in t)return n===!1?e[s]:(i=t[e[s]],r(i,"function")?c(i,n||t):i);return!1}function m(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function h(t,r){var i=t.length;if("CSS"in e&&"supports"in e.CSS){for(;i--;)if(e.CSS.supports(m(t[i]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var s=[];i--;)s.push("("+m(t[i])+":"+r+")");return s=s.join(" or "),u("@supports ("+s+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return n}function g(e,t,i,s){function a(){u&&(delete A.style,delete A.modElem)}if(s=r(s,"undefined")?!1:s,!r(i,"undefined")){var l=h(e,i);if(!r(l,"undefined"))return l}for(var u,c,p,m,g,v=["modernizr","tspan"];!A.style;)u=!0,A.modElem=o(v.shift()),A.style=A.modElem.style;for(p=e.length,c=0;p>c;c++)if(m=e[c],g=A.style[m],f(m,"-")&&(m=d(m)),A.style[m]!==n){if(s||r(i,"undefined"))return a(),"pfx"==t?m:!0;try{A.style[m]=i}catch(y){}if(A.style[m]!=g)return a(),"pfx"==t?m:!0}return a(),!1}function v(e,t,n,i,s){var o=e.charAt(0).toUpperCase()+e.slice(1),a=(e+" "+L.join(o+" ")+o).split(" ");return r(t,"string")||r(t,"undefined")?g(a,t,i,s):(a=(e+" "+N.join(o+" ")+o).split(" "),p(a,t,n))}function y(e,t,r){return v(e,n,n,t,r)}var w=[],x=[],T={_version:"3.2.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){x.push({name:e,fn:t,options:n})},addAsyncTest:function(e){x.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=T,Modernizr=new Modernizr,Modernizr.addTest("ie8compat",!e.addEventListener&&!!t.documentMode&&7===t.documentMode),Modernizr.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect);var b=t.documentElement,C="svg"===b.nodeName.toLowerCase();Modernizr.addTest("cssremunit",function(){var e=o("a").style;try{e.fontSize="3rem"}catch(t){}return/rem/.test(e.fontSize)});var S=T._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):[];T._prefixes=S,Modernizr.addTest("csscalc",function(){var e="width:",t="calc(10px);",n=o("a");return n.style.cssText=e+S.join(t+e),!!n.style.length}),Modernizr.addTest("opacity",function(){var e=o("a").style;return e.cssText=S.join("opacity:.55;"),/^0.55$/.test(e.opacity)});var _;!function(){var e={}.hasOwnProperty;_=r(e,"undefined")||r(e.call,"undefined")?function(e,t){return t in e&&r(e.constructor.prototype[t],"undefined")}:function(t,n){return e.call(t,n)}}(),T._l={},T.on=function(e,t){this._l[e]||(this._l[e]=[]),this._l[e].push(t),Modernizr.hasOwnProperty(e)&&setTimeout(function(){Modernizr._trigger(e,Modernizr[e])},0)},T._trigger=function(e,t){if(this._l[e]){var n=this._l[e];setTimeout(function(){var e,r;for(e=0;e<n.length;e++)(r=n[e])(t)},0),delete this._l[e]}},Modernizr._q.push(function(){T.addTest=a}),Modernizr.addTest("svgasimg",t.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1"));var z=T.testStyles=u;Modernizr.addTest("unicode",function(){var e,t=o("span"),n=o("span");return z("#modernizr{font-family:Arial,sans;font-size:300em;}",function(r){t.innerHTML=C?"妇":"&#5987",n.innerHTML=C?"☆":"&#9734",r.appendChild(t),r.appendChild(n),e="offsetWidth"in t&&t.offsetWidth!==n.offsetWidth}),e}),z("#modernizr{display: table; direction: ltr}#modernizr div{display: table-cell; padding: 10px}",function(e){var t,n=e.childNodes;t=n[0].offsetLeft<n[1].offsetLeft,Modernizr.addTest("displaytable",t,{aliases:["display-table"]})},2);var E=function(){var e=navigator.userAgent,t=e.match(/applewebkit\/([0-9]+)/gi)&&parseFloat(RegExp.$1),n=e.match(/w(eb)?osbrowser/gi),r=e.match(/windows phone/gi)&&e.match(/iemobile\/([0-9])+/gi)&&parseFloat(RegExp.$1)>=9,i=533>t&&e.match(/android/gi);return n||i||r}();E?Modernizr.addTest("fontface",!1):z('@font-face {font-family:"font";src:url("https://")}',function(e,n){var r=t.getElementById("smodernizr"),i=r.sheet||r.styleSheet,s=i?i.cssRules&&i.cssRules[0]?i.cssRules[0].cssText:i.cssText||"":"",o=/src/i.test(s)&&0===s.indexOf(n.split(" ")[0]);Modernizr.addTest("fontface",o)}),z("#modernizr { height: 50vh; }",function(t){var n=parseInt(e.innerHeight/2,10),r=parseInt((e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).height,10);Modernizr.addTest("cssvhunit",r==n)}),z("#modernizr { width: 50vw; }",function(t){var n=parseInt(e.innerWidth/2,10),r=parseInt((e.getComputedStyle?getComputedStyle(t,null):t.currentStyle).width,10);Modernizr.addTest("cssvwunit",r==n)});var R=function(){var t=e.matchMedia||e.msMatchMedia;return t?function(e){var n=t(e);return n&&n.matches||!1}:function(t){var n=!1;return u("@media "+t+" { #modernizr { position: absolute; } }",function(t){n="absolute"==(e.getComputedStyle?e.getComputedStyle(t,null):t.currentStyle).position}),n}}();T.mq=R,Modernizr.addTest("mediaqueries",R("only all"));var k="Moz O ms Webkit",L=T._config.usePrefixes?k.split(" "):[];T._cssomPrefixes=L;var P=function(t){var r,i=S.length,s=e.CSSRule;if("undefined"==typeof s)return n;if(!t)return!1;if(t=t.replace(/^@/,""),r=t.replace(/-/g,"_").toUpperCase()+"_RULE",r in s)return"@"+t;for(var o=0;i>o;o++){var a=S[o],d=a.toUpperCase()+"_"+r;if(d in s)return"@-"+a.toLowerCase()+"-"+t}return!1};T.atRule=P;var N=T._config.usePrefixes?k.toLowerCase().split(" "):[];T._domPrefixes=N;var j={elem:o("modernizr")};Modernizr._q.push(function(){delete j.elem});var A={style:j.elem.style};Modernizr._q.unshift(function(){delete A.style}),T.testAllProps=v,T.testAllProps=y,Modernizr.addTest("cssanimations",y("animationName","a",!0)),Modernizr.addTest("bgpositionxy",function(){return y("backgroundPositionX","3px",!0)&&y("backgroundPositionY","5px",!0)}),Modernizr.addTest("bgrepeatround",y("backgroundRepeat","round")),Modernizr.addTest("bgrepeatspace",y("backgroundRepeat","space")),Modernizr.addTest("backgroundsize",y("backgroundSize","100%",!0)),Modernizr.addTest("bgsizecover",y("backgroundSize","cover")),Modernizr.addTest("borderradius",y("borderRadius","0px",!0)),Modernizr.addTest("flexbox",y("flexBasis","1px",!0)),Modernizr.addTest("flexboxlegacy",y("boxDirection","reverse",!0)),Modernizr.addTest("flexwrap",y("flexWrap","wrap",!0)),Modernizr.addTest("csstransitions",y("transition","all",!0));var M=T.prefixed=function(e,t,n){return 0===e.indexOf("@")?P(e):(-1!=e.indexOf("-")&&(e=d(e)),t?v(e,t,n):v(e,"pfx"))};Modernizr.addTest("wrapflow",function(){var e=M("wrapFlow");if(!e||C)return!1;var t=e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-"),r=o("div"),i=o("div"),s=o("span");i.style.cssText="position: absolute; left: 50px; width: 100px; height: 20px;"+t+":end;",s.innerText="X",r.appendChild(i),r.appendChild(s),b.appendChild(r);var a=s.offsetLeft;return b.removeChild(r),i=s=r=n,150==a}),i(),s(w),delete T.addTest,delete T.addAsyncTest;for(var O=0;O<Modernizr._q.length;O++)Modernizr._q[O]();e.Modernizr=Modernizr}(window,document);