window.site_code = '2_1';
window.feedback = false;
window.bdIds = ['db6a5b6e8909198598eb5ffdf4f63ba1','c4994262310cf443b674a94adc2b0319','865ec45a4750db58b6dbceaa6b46fa49']
window.bdIds.forEach((item) => {
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?" + item;
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
});
window.googleIds = ['UA-207595667-1']
window.googleIds.forEach((item) => {
    document.write(
        '<script async src="https://www.googletagmanager.com/gtag/js?id=' +
            item +
            '"></script>'
    );
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag("js", new Date());
    gtag("config", item);
});


(function () {
	//编码
	var appId='mm1';
	var baseUrl='https://maskanalyse.com/data-statistics-node/';
	var jsUrl='https://img.maskanalyse.com/data-statistics-server/js/http.data.js';
	function init() {
		var session =  window.createAnalyseSession(appId,baseUrl);
		session.listener();
	}
	if(window.createAnalyseSession){
		init();
	}else{
		var script = window.document.createElement('script');
		script.src=jsUrl;
		window.document.head.appendChild(script);
		script.onload=init;
	}

})();

setTimeout(() => {
  let meta = document.createElement('meta');
  meta.content='no-referrer';
  meta.name='referrer';
  document.getElementsByTagName('head')[0].appendChild(meta);
}, 600);

