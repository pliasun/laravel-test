/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icon-arrowRignt': '&#xe933;',
		'icon-arrowLeft': '&#xe934;',
		'icon-collapse': '&#xe937;',
		'icon-expand': '&#xe936;',
		'icon-logo-small': '&#xe935;',
		'icon-case': '&#xe932;',
		'icon-people': '&#xe92c;',
		'icon-people1': '&#xe92d;',
		'icon-people2': '&#xe92e;',
		'icon-pdf': '&#xe92b;',
		'icon-hours': '&#xe926;',
		'icon-pliers': '&#xe927;',
		'icon-quality': '&#xe928;',
		'icon-service2': '&#xe929;',
		'icon-time': '&#xe92a;',
		'icon-document': '&#xe925;',
		'icon-arrow-down': '&#xe91f;',
		'icon-arrow-up': '&#xe924;',
		'icon-night': '&#xe920;',
		'icon-officeworker': '&#xe921;',
		'icon-resume': '&#xe922;',
		'icon-worker': '&#xe923;',
		'icon-marker': '&#xe91e;',
		'icon-arrow-left': '&#xe91a;',
		'icon-arrow-left-big': '&#xe91b;',
		'icon-arrow-right': '&#xe91c;',
		'icon-arrow-right-big': '&#xe91d;',
		'icon-new-window': '&#xe918;',
		'icon-logo1': '&#xe90f;',
		'icon-search': '&#xe931;',
		'icon-logo': '&#xe930;',
		'icon-logo2': '&#xe92f;',
		'icon-world': '&#xe919;',
		'icon-service': '&#xe910;',
		'icon-catering': '&#xe911;',
		'icon-hr-club': '&#xe912;',
		'icon-academy': '&#xe913;',
		'icon-volyn-hub': '&#xe914;',
		'icon-engineering': '&#xe915;',
		'icon-planing': '&#xe916;',
		'icon-forum': '&#xe917;',
		'icon-mirrolab': '&#xe90e;',
		'icon-helmet': '&#xe908;',
		'icon-f': '&#xe909;',
		'icon-g': '&#xe90a;',
		'icon-in': '&#xe90b;',
		'icon-tw': '&#xe90c;',
		'icon-yt': '&#xe90d;',
		'icon-modern-1': '&#xe900;',
		'icon-modern-2': '&#xe901;',
		'icon-modern-3': '&#xe902;',
		'icon-modern-4': '&#xe903;',
		'icon-modern-5': '&#xe904;',
		'icon-modern-6': '&#xe905;',
		'icon-modern-7': '&#xe906;',
		'icon-modern-8': '&#xe907;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
