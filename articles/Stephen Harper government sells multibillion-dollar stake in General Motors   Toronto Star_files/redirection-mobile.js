if (!window.SA) {window.SA = {};}

SA.redirection_mobile = function(configuration) {

	var
	debug = 0,
	log = function(msg){
		if (debug && 'console' in window) window.console.log(msg);
	},
	loc = window.location,
	redirMobile = function(url){
		if (url.indexOf('#')<0) url += '#/';
		var
		hpos = url.indexOf('#'),
		tail = url.slice(hpos+1);
		url += (tail.indexOf('?')>-1) ? '&':'?';
		url += 'referrer='+encodeURIComponent(document.referrer);
		log("current location is "+loc.href);
		log('redirecting to '+url);
		loc.replace(url);
	};

	// Retrieve the User Agent of the browser
	var agent = navigator.userAgent.toLowerCase();

	// configuration object
	var config = configuration || {};

	// new url for the mobile site domain
	var mobile_host = config.mobile_url;
	var tablet_host = config.tablet_url;

	// protocol for the mobile site domain
	var mobile_protocol = config.mobile_scheme ? config.mobile_scheme + ":" : loc.protocol;

	var tablet_protocol = config.tablet_scheme ? config.tablet_scheme + ":" : loc.protocol;

	//Check if the UA is a ME Supported one
	var regex_ios = /((iPhone\sOS|iPod\sOS))\s(4_|5_|6_|7_|8_|9_)/i;
	var regex_ipad = /(\(iPad;)/i;
	var regex_androidtablet = /Android((?!(Mobile)).)*$/i;
	var regex_an = /Android\s+(2.3|4.|5.)/i;
	var regex_bb_mobile = /(BlackBerry 9900|BB10.+Mobile)/i;
	var regex_bb = /(BlackBerry)/i;

	var tabletscreen = false;
	if (screen != null && screen.width >= 768 &&  screen.height >= 768) {
		tabletscreen = true;
	}
	if (tabletscreen && (agent.match(regex_ipad) || agent.match(regex_androidtablet))) {
		if (!config.tablet_disable) {
			redirMobile(tablet_protocol + "//" + tablet_host);
		}
	}
	else if (agent.match(regex_ios) || agent.match(regex_an) || agent.match(regex_bb_mobile)) {
		if (!config.mobile_disable) {
			redirMobile(mobile_protocol + "//" + mobile_host);
		}
	} else if (agent.match(regex_bb)) {
		var selector = '.bb.html';
		// A cookie called "bb_disabled" is applied to force full-site view on Blackberry
		// Also don't redirect if "bb" selector is already there – avoids infinite redirecting
		if (!config.mobile_disable && document.cookie && document.cookie.indexOf('bb_disabled') == -1 && loc.pathname.indexOf(selector) == -1) {
			var path = (loc.pathname != '/' && loc.pathname != localprefix + '/') ? loc.pathname : localprefix + '/index.html';
			var url = loc.protocol + '//' + loc.host + (path).replace(/\.html$/gi, selector);
			loc.replace(url);
		}
	}
};