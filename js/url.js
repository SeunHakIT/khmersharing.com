var newURL = (function(){
 var Hash = window.location.hash;
 var URLBase_and_QS = window.location.href.split('#')[0];
 var newParams = (URLBase_and_QS.indexOf('?')==-1) ? '?' : '&';
 newParams += "[QueryParameterGoesHere]=[QueryParamValue]";
 return URLBase_and_QS + newParams + Hash;
})();