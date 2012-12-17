if (typeof (Event) != "undefined" && typeof (Event.onDOMReady) == "function"
		&& typeof ($$) == "function" && AC && typeof (AC.Storage) == "object") {
	Event.onDOMReady(function() {
		function b(a, d) {
			a.observe("mousedown", function() {
				if (AC && typeof (AC.Storage) != "undefined") {
					AC.Storage.setItem("s_nav", d, "0")
				}
			})
		}
		$$("#globalheader a").each(function(a) {
			b(a, "global nav")
		});
		$$("#productheader a").each(function(a) {
			b(a, "product nav")
		});
		$$("#globalfooter a").each(function(a) {
			b(a, "global footer")
		});
		$$(".productbrowser .pb-slider .pb-slide ul li a").each(function(a) {
			b(a, "product browser")
		})
	})
}
if (document.location.search && s_account) {
	var dls = document.location.search;
	if (dls.indexOf("?cid=AOS-") > -1 || dls.indexOf("&cid=AOS-") > -1) {
		s_account += ",applestoreWW"
	}
}
var s = s_gi(s_account);
if (navigator && navigator.loadPurpose && navigator.loadPurpose == "preview") {
	s.t = new Function("return ''")
}
s._isSafari = false;
if (s.u.toLowerCase().indexOf("webkit") > -1) {
	if (s.u.toLowerCase().indexOf("safari") > -1
			&& s.u.toLowerCase().indexOf("chrome") < 0) {
		s._isSafari = true
	}
}
function safariHandler(b) {
	if (s.lt(b.href)) {
		b.addEventListener("mousedown",
				function(f) {
					if (((f.which) && (f.which == 1))
							|| ((f.button) && (f.button == 1))) {
						var e = f.currentTarget.href, a = s.lt(e);
						if (a == "d") {
							if (e.match(/\.rss|\.xml/)) {
								s.eVar16 = s.prop16 = "sign ups"
							} else {
								s.eVar11 = AC.Tracking.pageName()
										+ " - "
										+ e.substring(e.lastIndexOf("/") + 1,
												e.length);
								s.eVar11 = s.eVar11.toLowerCase();
								s.eVar16 = s.prop16 = "Downloads";
								s.events = s.apl(s.events, "event5", ",", 1)
							}
							s.linkTrackVars = "prop16,eVar16,eVar11,events";
							s.linkTrackEvents = "event5"
						}
						s.tl(this, a, "");
						s.linkTrackVars = "None";
						s.linkTrackEvents = "None"
					}
				}, false)
	}
}
s.currencyCode = "USD";
if (window.location.hostname.indexOf(".com.cn") > -1) {
	s.fpCookieDomainPeriods = "3"
}
s.trackDownloadLinks = true;
s.trackExternalLinks = true;
s.trackInlineStats = true;
s.linkDownloadFileTypes = "zip,wav,mp3,mp4,doc,pdf,xls,dmg,sit,pkg,exe,mov,m4a,rss,xml,extz,safariextz";
s.linkInternalFilters = "javascript:,apple.com";
s.linkLeaveQueryString = false;
s.linkTrackVars = "campaign";
s.linkTrackEvents = "None";
s.loadModule("Media");
s.Media.autoTrack = false;
s.Media.trackVars = "prop13,hier1";
s.Media.trackEvents = "None";
s.Media.trackWhilePlaying = true;
s.Media.trackMilestones = "10,50,90";
s.Media.monitor = function(p, m) {
	if (m.event == "CLOSE") {
		if (m.percent >= "99") {
			p.Media.trackVars = "prop13,prop16,eVar16";
			p.prop13 = "v@e: " + m.name;
			p.eVar16 = p.prop16 = "video ends";
			p.Media.track(m.name);
			p.prop13 = p.prop16 = p.eVar16 = ""
		}
		if (m.percent < "99") {
			var i = p.events, k = p.prop13, l = p.prop16, n = p.prop4, q = p.Media.trackVars, o = p.Media.trackEvents;
			p.events = p.prop13 = p.prop16 = p.eVar16 = p.prop4 = "";
			p.Media.trackVars = p.Media.trackEvents = "";
			p.Media.track(m.name);
			p.events = i;
			p.prop13 = k;
			p.prop16 = p.eVar16 = l;
			p.prop4 = n;
			p.Media.trackVars = q;
			p.Media.trackEvents = o
		}
	}
};
s.cookieLifetime = "63072000";
var s_vi_vnum = s.c_r("s_vnum_n2_us");
if (s_vi_vnum) {
	var date = new Date();
	date.setTime(date.getTime() + 63072000000);
	var expires = "; expires=" + date.toGMTString();
	document.cookie = "s_vnum_n2_us=" + s_vi_vnum + expires
			+ "; domain=apple.com; path=/"
}
var s_vi = s.c_r("s_vi");
if (s_vi) {
	var date = new Date();
	date.setTime(date.getTime() + 63072000000);
	var expires = "; expires=" + date.toGMTString();
	document.cookie = "s_vi=" + s_vi + expires + "; domain=apple.com; path=/"
}
function s_getObjectID(c) {
	var d = c.href;
	return d
}
s.getObjectID = s_getObjectID;
function QTCheck() {
	if (AC && typeof (AC.Detector) != "undefined"
			&& typeof (AC.Detector.getQTVersion) != "undefined") {
		return (AC.Detector.isMobile() || AC.Detector.isiPad()) ? "mobile"
				: ((AC.Detector.getQTVersion() == "0") ? "no quicktime"
						: ("quicktime "
								+ AC.Detector.getQTVersion().split(/\./)[0] + ".x"))
	}
	return "quicktime not detected"
}
if (typeof (iTunesDetected) === "function") {
	var activeX = document.createElement("object");
	activeX.setAttribute("width", 1);
	activeX.setAttribute("height", 1);
	activeX.id = "iTunesDetectorIE";
	activeX.setAttribute("classid",
			"clsid:D719897A-B07A-4C0C-AEA9-9B663A28DFCB");
	document.getElementsByTagName("head")[0].appendChild(activeX);
	s.prop12 = iTunesDetected() ? "itunes" : "no itunes"
}
if (typeof (AC) == "undefined") {
	AC = {}
}
if (!AC.Tracking) {
	AC.Tracking = {}
}
AC.Tracking._pageName = null;
AC.Tracking.pageName = function() {
	if (AC.Tracking._pageName) {
		return AC.Tracking._pageName
	}
	var f = document.getElementsByTagName("meta");
	for ( var e = 0, d; (d = f[e]); e++) {
		if ("omni_page" === d.getAttribute("name")) {
			AC.Tracking._pageName = d.getAttribute("content").toLowerCase();
			return AC.Tracking._pageName
		}
	}
	return AC.Tracking._pageNameForTitle_atHost_andPath(document.title,
			window.location.hostname, window.location.pathname)
};
AC.Tracking._pageNameForTitle_atHost_andPath = function(g, h, e) {
	var f = g.toLowerCase();
	if (/\s-\s/.test(f)) {
		f = f
				.replace(
						/\s*-?\s*(apple|�⢋�ċ�ы��|�� ��Γȫ�Ҭ�㡓ӑ��|��ܾ�|��ܾώ�ȏ�|apple����|�ܾϊ���)\s+[^-]*-?\s*/,
						"")
	}
	if (!e.match(/^\/(ws|pr|g5|go|ta|wm)\//)) {
		e = e.replace(/^\/(\w{2}|befr|benl|chfr|chde|asia|lae)(?=\/)/, "")
	}
	if ((e.match(/\//g).length <= 2) && !e.match(/support/)
			&& !h.match(/support/) && !h.match(/selfsolve/)
			&& (!!e.match(/index\.html/) || !e.match(/\.html/))) {
		f += " - index"
	}
	if (/\/pr\//.test(e)) {
		f = "pr - " + f
	}
	return f
};
s.usePlugins = true;
function s_doPlugins(P) {
	P.tcall = (typeof (P.linkType) == "undefined") ? true : false;
	if (P.pageName) {
		var aa = escape(P.pageName);
		aa = aa.replace(/(%u2018|%u2019|%u02BC|%u02BD)/g, "%27");
		aa = aa.replace(/(%u201C|%u201D|%E2%80%9C|%E2%80%9D)/g, "%22");
		aa = aa.replace(/(%09|%0A|%0D)/g, "");
		P.pageName = unescape(aa)
	}
	if (!P.d.URL
			.match(/(apple.com\/retail\/.+\/map\/|apple.com\/buy\/locator\/|discussions.apple.com|discussionsjapan.apple.com)/g)) {
		P.setupDynamicObjectIDs()
	}
	if (window.devicePixelRatio >= 2) {
		P.prop5 = navigator.platform + " 2x"
	} else {
		P.prop5 = navigator.platform
	}
	tempVar1 = P.getQueryParam("ref");
	if (tempVar1 && P.tcall) {
		P.referrer = tempVar1
	} else {
		if (tempVar1 && !P.tcall) {
			P.referrer = ""
		}
	}
	P.server = P.getQueryParam("alias");
	if (!P.server) {
		P.server = "new approach"
	}
	if (!P.campaign) {
		P.campaign = P.getQueryParam("cid");
		P.setClickMapEmail("Email_PageName,Email_OID", "Email_OT");
		if (P.campaign.match(/OAS-.+?-DOMAINS-/i)) {
			var ab = "http://" + P.campaign.replace(/OAS-.+?-DOMAINS-/i, "");
			P.referrer = (P.tcall) ? ab : ""
		}
	}
	P.campaign = P.getValOnce(P.campaign, "s_campaign", 0);
	P.prop6 = (!P.prop6) ? ('D="' + P.getQueryParam("cp").toLowerCase() + ': "+pageName')
			: P.prop6;
	P.prop11 = P.getQueryParam("sr");
	if (!P.d.URL.match(/\/channel\//) && !P.prop11 && P.c_r("s_3p")) {
		P.prop11 = P.c_r("s_3p");
		P.c_w("s_3p", "", -1)
	}
	P.eVar7 = (!P.eVar7) ? P.getQueryParam("aid") : "";
	P.eVar7 = P.getValOnce(P.eVar7, "s_var_7", 0);
	if (P.eVar2) {
		P.events = P.apl(P.events, "event6", ",", 1)
	}
	if ((!P.d.URL
			.match(/apple.com\/(\w{2}|befr|benl|chfr|chde|asia|lae)\/search\//) && !P.d.URL
			.match(/apple.com\/search\//))
			&& (P.d.referrer
					.match(/apple.com\/(\w{2}|befr|benl|chfr|chde|asia|lae)\/search\//) || P.d.referrer
					.match(/apple.com\/search\//))) {
		P.eVar2 = (P.d.referrer.match(/\/support\//)) ? "acs: "
				: ((P.d.referrer.match(/\/store\//) ? "aos: " : "www: "));
		P.events = P.apl(P.events, "event7", ",", 1);
		if (P.d.referrer
				.match(/apple.com\/(\w{2}|befr|benl|chfr|chde|asia|lae)\/search/)) {
			P.eVar2 += P.getQueryParam("q", "", P.d.referrer).replace(/\+/g,
					" ");
			var K = P.d.referrer
					.match(/\/(\w{2}|befr|benl|chfr|chde|asia|lae)\//i);
			P.eVar2 += " (" + K[0].replace(/\//g, "") + ")"
		} else {
			P.eVar2 += P.getQueryParam("q", "", P.d.referrer).replace(/\+/g,
					" ")
					+ " (us)"
		}
	}
	if (P.prop11 == "em" && P.tcall) {
		P.referrer = "imap://chatterbox.com"
	}
	if (P.prop11 == "app" && P.tcall) {
		P.referrer = "file://fromApp"
	}
	if (document.referrer
			&& document.referrer.indexOf("apple.com/startpage/") > -1
			&& P.tcall) {
		P.referrer = "news://startpage.com";
		P._1_referrer = 1
	}
	P.prop14 = P.getPreviousValue(P.pageName, "s_pv");
	if (!P.prop17) {
		var ad = P.getPercentPageViewed(P.pageName);
		if (ad && ad.length >= 5 && typeof (ad[1]) != "undefined") {
			P.prop17 = ad[1] + ":" + ad[2];
			P.prop28 = Math.round(ad[3] / 10) * 10;
			P.eVar17 = P.eVar18 = "";
			if (ad[4]) {
				var G = ad[4].split(/\|/g), I = "";
				for ( var F = 0; F < G.length; F++) {
					if (F != (G.length - 1)) {
						var T = G[F + 1].split(/:/)[0] - G[F].split(/:/)[0];
						if (T > 100) {
							I += G[F].split(/:/)[1];
							var R = T / 100;
							while (R > 1) {
								I += "0";
								R--
							}
						} else {
							I += G[F].split(/:/)[1]
						}
					} else {
						I += G[F].split(/:/)[1]
					}
				}
				if (I.length > 254) {
					P.eVar17 = I.substring(0, 254);
					P.eVar18 = I.substring(255, I.length)
				} else {
					P.eVar17 = I
				}
			}
			if (!P.tcall) {
				P.linkTrackVars = "prop17,prop28"
			}
		}
	}
	P.prop38 = P.tcall ? P.deviceOrientationChanges(true) : "";
	P.prop32 = P.eVar32 = P.getQueryParam("psid");
	if (P.prop32 || P.c_r("s_sid")) {
		var e = new Date(), Y = e.getTime();
		e.setTime(Y + 630720000);
		P.prop32 ? P.c_w("s_psid", P.prop32, e) : P.c_w("s_psid", P
				.c_r("s_sid"), e);
		P.c_w("s_sid", "", -1)
	}
	if (!P.prop32 && !P.c_r("s_pathLength")) {
		P.prop32 = P.c_r("s_psid")
	}
	P.prop15 = P.c_r("PostalCode") ? P.c_r("PostalCode") : "no zip";
	if (!P.prop20) {
		var N = navigator.userAgent.match(/foh:r\d{3}/i);
		P.prop20 = N ? ("store kiosk:" + N.toString().replace(/foh:/i, ""))
				: "non-store kiosk"
	}
	P.linkLeaveQueryString = true;
	var X = P.downloadLinkHandler();
	if (X) {
		if (X.match(/\.rss|\.xml/)) {
			P.eVar16 = P.prop16 = "sign ups"
		} else {
			P.eVar11 = AC.Tracking.pageName() + " - "
					+ X.substring(X.lastIndexOf("/") + 1, X.length);
			P.eVar16 = P.prop16 = "downloads";
			P.events = P.apl(P.events, "event5", ",", 1)
		}
		P.linkTrackVars = "prop16,eVar16,eVar11,events";
		P.linkTrackEvents = "event5"
	}
	P.linkLeaveQueryString = false;
	P.detectRIA("s_ria", "prop19", "", "12", "", "");
	if (typeof (Media) != "undefined" && P.tcall) {
		P.prop18 = QTCheck()
	}
	function O() {
		if (P.u.match(/windows/i)) {
			P.prop9 = "windows";
			return
		}
		if (P.u.match(/(kindle|silk-accelerated)/i)) {
			if (P.u.match(/(kindle fire|silk-accelerated)/i)) {
				P.prop9 = "kindle fire"
			} else {
				P.prop9 = "kindle"
			}
			return
		}
		if (P.u.match(/(iphone|ipod|ipad)/i)) {
			var a = P.u.match(/OS [0-9_]+/i);
			P.prop9 = "i" + a[0].replace(/_/g, ".");
			return
		}
		if (P.u.match(/android/i)) {
			P.prop9 = P.u.match(/android [0-9]\.?[0-9]?\.?[0-9]?/i);
			return
		}
		if (P.u.match(/webos\/[0-9\.]+/i)) {
			var a = P.u.match(/webos\/[0-9]\.?[0-9]?\.?[0-9]?/i);
			P.prop9 = a[0].replace(/webos\//i, "web os ");
			return
		}
		if (P.u.match(/rim tablet os [0-9\.]+/i)) {
			var a = P.u.match(/rim tablet os [0-9]\.?[0-9]?\.?[0-9]?/i);
			P.prop9 = a[0].replace(/rim tablet os/i, "rim os ");
			return
		}
		if ((P.u.match(/firefox\/(\d{2}||[3-9])/i) || P.u
				.match(/AppleWebKit\//))
				&& P.u.match(/Mac OS X [0-9_\.]+/)) {
			var b = P.u.match(/[0-9_\.]+/g);
			b = b[1].split(/_|\./);
			P.prop9 = b[0] + "." + b[1] + ".x";
			return
		}
		var c = P.u.match(/AppleWebKit\/\d*/i)
				&& P.u.match(/AppleWebKit\/\d*/i).toString().replace(
						/AppleWebKit\//i, "");
		if (c > 522) {
			P.prop9 = "10.5.x"
		} else {
			if (c > 400) {
				P.prop9 = "10.4.x"
			} else {
				if (c > 99) {
					P.prop9 = "10.3.x"
				} else {
					if (c > 80) {
						P.prop9 = "10.2.x"
					} else {
						P.prop9 = "mac unknown or non-safari"
					}
				}
			}
		}
	}
	O();
	if (P.pageName && P.pageName.match(/feedback - thank you/)) {
		P.prop16 = P.eVar16 = "feedback"
	}
	if (P.prop13 && (P.tcall || P.linkType == "o" || P.linkType == "")) {
		if (P.pageName && !P.pageName.match(/movie trailers -/)) {
			if (P.prop13.match(/(v@s|v@r)/i)) {
				P.prop16 = P.eVar16 = "video plays";
				P.events = "event2";
				if (!P.tcall) {
					P.linkTrackEvents += ",event2";
					P.linkTrackVars += ",events,prop16,eVar16"
				}
			}
			if (P.prop13.match(/v@e/i)) {
				P.prop16 = P.eVar16 = "video ends";
				if (!P.tcall) {
					P.linkTrackEvents = "";
					P.linkTrackVars += ",prop16,eVar16"
				}
			}
		}
	}
	P.linkLeaveQueryString = true;
	var i = P.linkHandler("itms.apple.com|itunes.apple.com", "e");
	var X = P
			.linkHandler(
					"ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/|rss.support.apple.com",
					"o");
	if (X) {
		P.eVar16 = P.prop16 = "sign ups";
		P.linkTrackVars = "eVar16,prop16"
	}
	P.linkLeaveQueryString = false;
	if (P.tcall) {
		var L, M = window.location.pathname, Q = false, H = true;
		if (P.c_r("iTunesPresent") || (P.prop12 && P.prop12 == "iTunes")) {
			L = L ? L + "it," : "it,"
		}
		if (P.c_r("hasMobileMe")) {
			L = L ? L + "mm," : "mm,"
		}
		if (P.c_r("DefaultAppleID")
				|| (P.pageName && P.pageName
						.match(/iforgot - cr or email option/))) {
			L = L ? L + "aid," : "aid,"
		}
		if (P.c_r("trackStartpage")) {
			L = L ? L + "sp," : "sp,"
		}
		if (P.prop11) {
			if (P.prop11.match("3p")) {
				L = L ? L + "3p," : "3p,"
			}
		}
		if (P.pageName) {
			if (P.pageName.match(/one to one - index/)) {
				L = L ? L + "o2o," : "o2o,"
			}
		}
		if (M.match("/welcomescreen/")) {
			var S;
			if (S = M.match("ilife.*")) {
				S = "il" + S.toString().match("[0-9]+") + ",";
				L = L ? L + S : S
			} else {
				if (S = M.match("iwork.*")) {
					S = "iwk" + S.toString().match("[0-9]+") + ",";
					L = L ? L + S : S
				} else {
					if (S = M.match("itunes.*")) {
						S = "it" + S.toString().match("[0-9]+") + ",";
						L = L ? L + S : S
					} else {
						if (S = M.match("aperture.*")) {
							S = "ap" + S.toString().match("[0-9]+") + ",";
							L = L ? L + S : S
						}
					}
				}
			}
		}
		if (P.getQueryParam("sr") && P.getQueryParam("vr")) {
			var Z = P.getQueryParam("vr");
			Z = Z.substring(0, Z.indexOf("-")) + ",";
			L = L ? L + Z : Z
		}
		if (typeof (L) != "undefined") {
			L = L.substring(0, L.length - 1).toLowerCase();
			L = L.split(",");
			if (P.c_r("s_membership")) {
				var J = P.c_r("s_membership").split(/:/);
				J.splice(0, 1);
				for (F = 0; F < L.length; F++) {
					for (j = 0; j < J.length; j++) {
						if (J[j] == L[F]) {
							H = false
						}
					}
					if (H) {
						J[J.length] = L[F];
						Q = true
					}
					H = true
				}
				if (Q) {
					L = J.length + ":" + J.toString().replace(/,/g, ":");
					var e = new Date(), Y = e.getTime();
					e.setTime(Y + 63072000);
					P.c_w("s_membership", L, e);
					P.prop31 = L
				}
			} else {
				L = L.length + ":" + L.toString().replace(/,/g, ":");
				var e = new Date(), Y = e.getTime();
				e.setTime(Y + 63072000);
				P.c_w("s_membership", L, e);
				P.prop31 = L
			}
		}
		if (!P.prop31 && !P.c_r("s_pathLength")) {
			P.prop31 = P.c_r("s_membership")
		}
	}
	if (AC && typeof (AC.Storage) != "undefined" && P.tcall && !P.prop25) {
		P.prop25 = (AC.Storage.getItem("s_nav")) ? AC.Storage.getItem("s_nav")
				: "other nav or none";
		AC.Storage.removeItem("s_nav");
		if (document.referrer
				.match(/(downloads|epp|store|storeint)\.apple\.com/)) {
			P.prop25 = "aos nav"
		}
	}
	if (((P.pageName && P.prop14 && P.pageName.toLowerCase() != P.prop14
			.toLowerCase()) || !P.prop14)
			&& P.tcall) {
		var U, W = P.c_r("s_pathLength"), ac = (W.indexOf(",") > -1) ? W
				.split(",") : [], e = new Date(), Y = e.getTime();
		e.setTime(Y + 30 * 60 * 1000);
		if (P.channel) {
			U = P.channel.substring(P.channel.indexOf(".") + 1,
					P.channel.length);
			U = U.substring(U.indexOf(".") + 1, U.length)
		} else {
			U = "no channel"
		}
		if (ac.length != 0 && ac.toString().indexOf(U + "=") > -1) {
			for (F = 0; F < ac.length; F++) {
				if (ac[F].toString().indexOf(U + "=") > -1) {
					var V = ac[F].split("=");
					++V[1];
					ac[F] = V[0] + "=" + V[1];
					P.prop48 = V[1]
				}
			}
			P.c_w("s_pathLength", ac, e)
		} else {
			var V = W + U + "=" + 1 + ",";
			P.c_w("s_pathLength", V, e);
			P.prop48 = "1"
		}
	}
	if (P.tcall) {
		P.prop50 = P.getVisitNumPerChannel()
	}
	P.hier1 = P.channel ? P.channel : "";
	P.linkTrackVars = P.apl(P.linkTrackVars, "hier1", ",", 1);
	P.prop49 = "D=s_vi";
	P.prop4 = P.prop4 ? P.prop4 : "D=g";
	P.manageVars("lowercaseVars",
			"purchaseID,pageType,events,products,transactionID", 2)
}
s.doPlugins = s_doPlugins;
s.getVisitNumPerChannel = function() {
	var K = this, e = new Date(), S, T, C = 0, U = false, Q = false, M = "no channel", V = e
			.getTime(), R = V + 30 * 60 * 1000, I = V + 1825 * 24 * 60 * 60
			* 1000, D = K.wd.location.pathname, N = "us", O = "", J = new Array(
			"no channel", "aos", "homepage", "support", "itunes",
			"myappleid.iforgot", "trailers", "ip", "discussions", "myappleid",
			"quicktime", "ipad", "ipadmini", "legal", "mac", "macosx",
			"safari", "ipod", "developer", "retailstore", "macbookair",
			"retail.concierge", "macosx.downloads", "ipodtouch", "ios",
			"macbookpro", "webapps", "search", "retail.onetoone", "icloud",
			"imac", "macmini", "ilife", "other", "findouthow", "jobs",
			"mobileme", "whymac", "macappstore", "hotnews", "redirects",
			"ipodnano", "education", "iwork", "ipodclassic", "macpro",
			"contact", "appletv", "finalcutstudio", "pr", "productpromotions",
			"ipodshuffle", "airportexpress", "environment", "aperture",
			"batteries", "mac.facetime", "productpromotions.rebate",
			"timecapsule", "displays", "airportextreme", "logicstudio", "buy",
			"about", "accessibility", "mightymouse", "thunderbolt", "html5",
			"remotedesktop", "magictrackpad", "keyboard", "business",
			"retail.jointventure", "itunesappstore", "pro", "science",
			"logicexpress", "channelprograms", "startpage", "advertising",
			"financialservices", "giftcards", "xsan", "server", "battery",
			"companystore", "ali", "supplier", "beatles", "usergroups",
			"webbadges", "procurement", "802.11n", "retail", "itunesnews",
			"ibooks-author", "osx", "apple-events");
	if (K.wd.location.hostname.match(/apple.com.cn/)) {
		N = "cn"
	} else {
		if (!D.match(/^\/(ws|pr|g5|go|ta|wm|kb)\//)) {
			if (D.match(/^\/(\w{2}|befr|benl|chfr|chde|asia|lae)(?=\/)/)) {
				N = D.split("/")[1].toLowerCase()
			}
		}
	}
	var c = "s_vnum_n2_" + N, G = "s_invisit_n2_" + N;
	if (K.channel) {
		M = K.channel.substring(K.channel.indexOf(".") + 1, K.channel.length);
		M = M.substring(M.indexOf(".") + 1, M.length)
	}
	function L(a) {
		for ( var b = 0; b <= J.length; b++) {
			if (a == J[b]) {
				return b + 1
			}
		}
	}
	O = L(M);
	if (!O) {
		O = "0"
	}
	K.c_w("s_vnum_" + N, "", 63072000);
	K.c_w("s_invisit_" + N, "", 63072000);
	K.c_w("s_invisit_n_" + N, "", 63072000);
	K.c_w("s_vnum_n_" + N, "", 63072000);
	S = K.c_r(c);
	T = K.c_r(G);
	if (O) {
		if (T) {
			var i = T.split(/,/);
			for ( var E = 0, H; (H = i[E]); E++) {
				if (O.toString() == H) {
					U = true;
					break
				}
			}
		}
		if (!U) {
			var P = S.split(/,/);
			for ( var E = 0, H; (H = P[E]); E++) {
				var F = H.split(/\|/);
				if (O.toString() == F[0]) {
					C = parseInt(F[1]) + 1;
					P[E] = F[0] + "|" + C;
					Q = true;
					break
				}
			}
			e.setTime(R);
			K.c_w(G, (T ? (T + "," + O) : O), e);
			e.setTime(I);
			if (Q) {
				K.c_w(c, P.toString(), e);
				return M + "=" + C
			} else {
				(P.toString()) ? (P.push(O + "|" + 1)) : (P = O + "|" + 1);
				K.c_w(c, P.toString(), e);
				return M + "=" + 1
			}
		}
	}
};
s.handlePPVevents = new Function(
		"",
		"if(!s.getPPVid)return;var dh=Math.max(Math.max(s.d.body.scrollHeight,s.d.documentElement.scrollHeight),Math.max(s.d.body.offsetHeight,s.d.documentElement.offsetHeight),Math.max(s.d.body.clientHeight,s.d.documentElement.clientHeight)),vph=s.wd.innerHeight||(s.d.documentElement.clientHeight||s.d.body.clientHeight),st=s.wd.pageYOffset||(s.wd.document.documentElement.scrollTop||s.wd.document.body.scrollTop),vh=st+vph,pv=Math.min(Math.round(vh/dh*100),100),c=s.c_r('s_ppv'),a=(c.indexOf(',')>-1)?c.split(',',5):[],id=(a.length>0)?(a[0]):escape(s.getPPVid),cv=(a.length>1)?parseInt(a[1]):(0),p0=(a.length>2)?parseInt(a[2]):(pv),cy=(a.length>3)?parseInt(a[3]):(0),pt=s._ct,ph=s._ch,t=new Date;t.setTime(t.getTime()+1800000);s._ct=new Date().getTime();s._ch=vh;var sa='',td=Math.round((s._ct-pt)/1000),hd=Math.abs(s._ch-ph),lowerBound,upperBound;if(hd&&td){lowerBound=Math.ceil(st/100)*100;upperBound=Math.ceil(s._ch/100)*100;while(lowerBound<=upperBound){if(lowerBound!=0){var value=lowerBound+':'+(td>10?'>':td);if(s.pxViewedArray.length==0){s.pxViewedArray.push(value);}else if(s.pxViewedArray.toString().indexOf(lowerBound)==-1){s.pxViewedArray.push(value);}else{for(i=0;i<s.pxViewedArray.length;i++){var av=s.pxViewedArray[i].split(':');if(lowerBound==av[0]){if(av[1]!='>'){var totalTime=Math.floor((Number(av[1])+Number(td))*100)/100;if(totalTime>10){totalTime='>';}s.pxViewedArray[i]=av[0]+':'+totalTime;}break;}}}}lowerBound=lowerBound+100;s.pxViewedArray.sort(function(a,b){return parseInt(a)-parseInt(b)});}}sa=s.pxViewedArray.toString().replace(/,/g,'|');cn=(pv>0)?(id+','+((pv>cv)?pv:cv)+','+p0+','+((vh>cy)?vh:cy)+','+((sa)?sa:'')):'';s.c_w('s_ppv',cn,t);");
s.getPercentPageViewed = new Function(
		"pid",
		"pid=pid?pid:'-';var s=this,ist=!s.getPPVid?true:false,t=new Date;t.setTime(t.getTime()+1800000);if(typeof(s.linkType)!='undefined'&&s.linkType!='e')return'';var v=s.c_r('s_ppv'),a=(v.indexOf(',')>-1)?v.split(',',5):[];if(a.length<5){for(var i=4;i>0;i--){a[i]=(i<a.length)?(a[i-1]):('');}a[0]='';}a[0]=unescape(a[0]);s.getPPVpid=pid;s.c_w('s_ppv',escape(pid),t);s.pxViewedArray=[];if(ist){s.getPPVid=(pid)?(pid):(s.pageName?s.pageName:document.location.href);s.c_w('s_ppv',escape(s.getPPVid),t);if(s.wd.addEventListener){s.wd.addEventListener('load',s.handlePPVevents,false);s.wd.addEventListener('scroll',s.handlePPVevents,false);s.wd.addEventListener('resize',s.handlePPVevents,false);}else if(s.wd.attachEvent){s.wd.attachEvent('onload',s.handlePPVevents);s.wd.attachEvent('onscroll',s.handlePPVevents);s.wd.attachEvent('onresize',s.handlePPVevents);}}return(pid!='-')?(a):(a[1]);");
s.p_oc = new Function(
		"evt",
		"var o=s.wd.orientation,ot=(Math.abs(o)==90)?'l':'p',cv,v;s.lc=(evt.type=='load')?s.lc+1:s.lc;if(s.lc==0)return;if(typeof(o)!='undefined'){ot=(evt.type=='load')?ot:ot+':'+s.c_r('s_orientationHeight');cv=s.c_r('s_orientation');v=cv?cv+=','+ot:ot;s.c_w('s_orientation',v)}");
s.p_och = new Function(
		"",
		"var dh=Math.max(Math.max(s.d.body.scrollHeight,s.d.documentElement.scrollHeight),Math.max(s.d.body.offsetHeight,s.d.documentElement.offsetHeight),Math.max(s.d.body.clientHeight,s.d.documentElement.clientHeight));vph=s.wd.innerHeight||(s.d.documentElement.clientHeight||s.d.body.clientHeight),st=s.wd.pageYOffset||(s.wd.document.documentElement.scrollTop||s.wd.document.body.scrollTop),vh=st+vph;s.c_w('s_orientationHeight',vh);");
s.deviceOrientationChanges = new Function(
		"ext",
		"var s=this,v;s.lc=0;if(typeof(s.linkType)!='undefined'&&s.linkType!='e')return'';var cv=s.c_r('s_orientation'),cva=(cv.indexOf(',')>-1)?cv.split(','):'';if(cv){if(cva){if(!ext){for(i=1;i<cva.length;i++){cva[i]=cva[i].split(':')[0];}}cva[0]+='@s';cva.push(cva[cva.length-1].split(':')[0]+'@e');v=cva.toString();}else{v=cv+'@s,'+cv+'@e';}}s.c_w('s_orientation','');if(s.wd.addEventListener){s.wd.addEventListener('orientationchange',s.p_oc,false);s.wd.addEventListener('load',s.p_oc,false);s.wd.addEventListener('load',s.p_och,false);s.wd.addEventListener('scroll',s.p_och,false);}return v;");
s.detectRIA = new Function(
		"cn",
		"fp",
		"sp",
		"mfv",
		"msv",
		"sf",
		"cn=cn?cn:'s_ria';msv=msv?msv:2;mfv=mfv?mfv:10;var s=this,sv='',fv=-1,dwi=0,fr='',sr='',w,mt=s.n.mimeTypes,uk=s.c_r(cn),k=s.c_w('s_cc','true',0)?'Y':'N';fk=uk.substring(0,uk.indexOf('|'));sk=uk.substring(uk.indexOf('|')+1,uk.length);if(k=='Y'&&s.p_fo('detectRIA')){if(uk&&!sf){if(fp){s[fp]=fk;}if(sp){s[sp]=sk;}return false;}if(!fk&&fp){if(s.pl&&s.pl.length){if(s.pl['Shockwave Flash 2.0'])fv=2;x=s.pl['Shockwave Flash'];if(x){fv=0;z=x.description;if(z)fv=z.substring(16,z.indexOf('.'));}}else if(navigator.plugins&&navigator.plugins.length){x=navigator.plugins['Shockwave Flash'];if(x){fv=0;z=x.description;if(z)fv=z.substring(16,z.indexOf('.'));}}else if(mt&&mt.length){x=mt['application/x-shockwave-flash'];if(x&&x.enabledPlugin)fv=0;}if(fv<=0)dwi=1;w=s.u.indexOf('Win')!=-1?1:0;if(dwi&&s.isie&&w&&execScript){result=false;for(var i=mfv;i>=3&&result!=true;i--){execScript('on error resume next: result = IsObject(CreateObject(\"ShockwaveFlash.ShockwaveFlash.'+i+'\"))','VBScript');fv=i;}}fr=fv==-1?'Flash Not Detected':fv==0?'Flash Enabled (No Version)':'Flash '+fv;}if(!sk&&sp&&s.apv>=4.1){var tc='try{x=new ActiveXObject(\"AgControl.A'+'gControl\");for(var i=msv;i>0;i--){for(var j=9;j>=0;j--){if(x.is'+'VersionSupported(i+\".\"+j)){sv=i+\".\"+j;break;}}if(sv){break;}'+'}}catch(e){try{x=navigator.plugins[\"Silverlight Plug-In\"];sv=x'+'.description.substring(0,x.description.indexOf(\".\")+2);}catch('+'e){}}';eval(tc);sr=sv==''?'Silverlight Not Detected':'Silverlight '+sv;}if((fr&&fp)||(sr&&sp)){s.c_w(cn,fr+'|'+sr,0);if(fr)s[fp]=fr;if(sr)s[sp]=sr;}}");
s.downloadLinkHandler = new Function(
		"p",
		"var s=this,h=s.p_gh(),n='linkDownloadFileTypes',i,t;if(!h||(s.linkType&&(h||s.linkName)))return '';i=h.indexOf('?');t=s[n];s[n]=p?p:t;if(s.lt(h)=='d')s.linkType='d';else h='';s[n]=t;return h;");
s.linkHandler = new Function(
		"p",
		"t",
		"var s=this,h=s.p_gh(),i,l;t=t?t:'o';if(!h||(s.linkType&&(h||s.linkName)))return '';i=h.indexOf('?');h=s.linkLeaveQueryString||i<0?h:h.substring(0,i);l=s.pt(p,'|','p_gn',h.toLowerCase());if(l){s.linkName=l=='[['?'':l;s.linkType=t;return h;}return '';");
s.p_gn = new Function(
		"t",
		"h",
		"var i=t?t.indexOf('~'):-1,n,x;if(t&&h){n=i<0?'':t.substring(0,i);x=t.substring(i+1);if(h.indexOf(x.toLowerCase())>-1)return n?n:'[[';}return 0;");
s.getPreviousValue = new Function(
		"v",
		"c",
		"el",
		"var s=this,t=new Date,i,j,r='';t.setTime(t.getTime()+1800000);if(el){if(s.events){i=s.split(el,',');j=s.split(s.events,',');for(x in i){for(y in j){if(i[x]==j[y]){if(s.c_r(c)) r=s.c_r(c);v?s.c_w(c,v,t):s.c_w(c,'no value',t);return r}}}}}else{if(s.c_r(c)) r=s.c_r(c);v?s.c_w(c,v,t):s.c_w(c,'no value',t);return r}");
s.setupDynamicObjectIDs = new Function(
		"var s=this;if(!s.doi){s.doi=1;if(s.apv>3&&(!s.isie||!s.ismac||s.apv>=5)){if(s.wd.attachEvent)s.wd.attachEvent('onload',s.setOIDs);else if(s.wd.addEventListener)s.wd.addEventListener('load',s.setOIDs,false);else{s.doiol=s.wd.onload;s.wd.onload=s.setOIDs}}s.wd.s_semaphore=1}");
s.setOIDs = new Function(
		"e",
		"var s=s_c_il["
				+ s._in
				+ "],b=s.eh(s.wd,'onload'),o='onclick',x,l,u,c,i,a=new Array;if(s.doiol){if(b)s[b]=s.wd[b];s.doiol(e)}if(s.d.links){for(i=0;i<s.d.links.length;i++){l=s.d.links[i];if(s._isSafari){safariHandler(l);}c=l[o]?''+l[o]:'';b=s.eh(l,o);z=l[b]?''+l[b]:'';u=s.getObjectID(l);if(u&&c.indexOf('s_objectID')<0&&z.indexOf('s_objectID')<0){u=s.repl(u,'\"','');u=s.repl(u,'\\n','').substring(0,97);l.s_oc=l[o];a[u]=a[u]?a[u]+1:1;x='';if(c.indexOf('.t(')>=0||c.indexOf('.tl(')>=0||c.indexOf('s_gs(')>=0)x='var x=\".tl(\";';x+='s_objectID=\"'+u+'_'+a[u]+'\";return this.s_oc?this.s_oc(e):true';if(s.isns&&s.apv>=5)l.setAttribute(o,x);l[o]=new Function('e',x)}}}s.wd.s_semaphore=0;return true");
s.getQueryParam = new Function(
		"p",
		"d",
		"u",
		"var s=this,v='',i,t;d=d?d:'';u=u?u:(s.pageURL?s.pageURL:s.wd.location);if(u=='f')u=s.gtfs().location;while(p){i=p.indexOf(',');i=i<0?p.length:i;t=s.p_gpv(p.substring(0,i),u+'');if(t){t=t.indexOf('#')>-1?t.substring(0,t.indexOf('#')):t;}if(t)v+=v?d+t:t;p=p.substring(i==p.length?i:i+1)}return v");
s.p_gpv = new Function(
		"k",
		"u",
		"var s=this,v='',i=u.indexOf('?'),q;if(k&&i>-1){q=u.substring(i+1);v=s.pt(q,'&','p_gvf',k)}return v");
s.p_gvf = new Function(
		"t",
		"k",
		"if(t){var s=this,i=t.indexOf('='),p=i<0?t:t.substring(0,i),v=i<0?'True':t.substring(i+1);if(p.toLowerCase()==k.toLowerCase())return s.epa(v)}return ''");
s.getValOnce = new Function(
		"v",
		"c",
		"e",
		"var s=this,a=new Date,v=v?v:v='',c=c?c:c='s_gvo',e=e?e:0,k=s.c_r(c);if(v){a.setTime(a.getTime()+e*86400000);s.c_w(c,v,e?a:0);}return v==k?'':v");
s.setClickMapEmail = new Function(
		"qp",
		"ot",
		"var s=this,v=s.getQueryParam(qp,'~'),d,pn,oid,ot=s.getQueryParam(ot),ot=ot?ot:'A',cv;d=v.indexOf('~');if(!v)return '';if(d>-1){pn=v.substring(0,d);oid=v.substring(d+1);}cv='&pid='+s.ape(s.fl(pn,255))+'&pidt=1&oid='+s.ape(s.fl(oid,100))+'&oidt=1&ot='+ot+'&oi=1';s.sq(cv);");
s.getAndPersistValue = new Function(
		"v",
		"c",
		"e",
		"var s=this,a=new Date;e=e?e:0;a.setTime(a.getTime()+e*86400000);if(v)s.c_w(c,v,e?a:0);return s.c_r(c);");
s.__se = new Function(
		"var l={'~':'tl:[\\'','^': 'kw:[\\'','%': 'ahoo','|': '\\'],','>': '\\']}','*': '.com','$': 'search',';':'query','#':'land','`':'oogle','+':'http://www','<':'keyword'};var f=this.___se+'';var g='';for(var i=0;i<f.length;i++){if(l[f.substring(i,i+1)]&&typeof l[f.substring(i,i+1)]!='undefined'){g+=l[f.substring(i,i+1)];}else{g+=f.substring(i,i+1);}}return eval('('+g+')');");
s.___se = "{}";
s.isEntry = new Function(
		"var s=this;var l=s.linkInternalFilters,r=s.referrer||typeof s.referrer!='undefined'?s.referrer:document.referrer,p=l.indexOf(','),b=0,v='';if(!r){return 1;}while(p=l.indexOf(',')){v=p>-1?l.substring(b,p):l;if(v=='.'||r.indexOf(v)>-1){return 0;}if(p==-1){break;}b=p+1;l=l.substring(b,l.length);}return 1;");
s.p_fo = new Function(
		"n",
		"var s=this;if(!s.__fo){s.__fo=new Object;}if(!s.__fo[n]){s.__fo[n]=new Object;return 1;}else {return 0;}");
s.manageVars = new Function(
		"c",
		"l",
		"f",
		"var s=this,vl,la,vla;l=l?l:'';f=f?f:1 ;if(!s[c])return false;vl='pageName,purchaseID,channel,server,pageType,campaign,state,zip,events,products,transactionID';for(var n=1;n<76;n++){vl+=',prop'+n+',eVar'+n+',hier'+n;}if(l&&(f==1||f==2)){if(f==1){vl=l;}if(f==2){la=s.split(l,',');vla=s.split(vl,',');vl='';for(x in la){for(y in vla){if(la[x]==vla[y]){vla[y]='';}}}for(y in vla){vl+=vla[y]?','+vla[y]:'';}}s.pt(vl,',',c,0);return true;}else if(l==''&&f==1){s.pt(vl,',',c,0);return true;}else{return false;}");
s.clearVars = new Function("t", "var s=this;s[t]='';");
s.lowercaseVars = new Function(
		"t",
		"var s=this;if(s[t]&&t!='events'){s[t]=s[t].toString();if(s[t].indexOf('D=')!=0){s[t]=s[t].toLowerCase();}}");
s.join = new Function(
		"v",
		"p",
		"var s = this;var f,b,d,w;if(p){f=p.front?p.front:'';b=p.back?p.back:'';d=p.delim?p.delim:'';w=p.wrap?p.wrap:'';}var str='';for(var x=0;x<v.length;x++){if(typeof(v[x])=='object' )str+=s.join( v[x],p);else str+=w+v[x]+w;if(x<v.length-1)str+=d;}return f+str+b;");
s.p_fo = new Function(
		"n",
		"var s=this;if(!s.__fo){s.__fo=new Object;}if(!s.__fo[n]){s.__fo[n]=new Object;return 1;}else {return 0;}");
s.p_gh = new Function(
		"var s=this;if(!s.eo&&!s.lnk)return '';var o=s.eo?s.eo:s.lnk,y=s.ot(o),n=s.oid(o),x=o.s_oidt;if(s.eo&&o==s.eo){while(o&&!n&&y!='BODY'){o=o.parentElement?o.parentElement:o.parentNode;if(!o)return '';y=s.ot(o);n=s.oid(o);x=o.s_oidt}}return o.href?o.href:'';");
s.apl = new Function(
		"L",
		"v",
		"d",
		"u",
		"var s=this,m=0;if(!L)L='';if(u){var i,n,a=s.split(L,d);for(i=0;i<a.length;i++){n=a[i];m=m||(u==1?(n==v):(n.toLowerCase()==v.toLowerCase()));}}if(!m)L=L?L+d+v:v;return L");
s.repl = new Function(
		"x",
		"o",
		"n",
		"var i=x.indexOf(o),l=n.length;while(x&&i>=0){x=x.substring(0,i)+n+x.substring(i+o.length);i=x.indexOf(o,i+l)}return x");
s.split = new Function(
		"l",
		"d",
		"var i,x=0,a=new Array;while(l){i=l.indexOf(d);i=i>-1?i:l.length;a[x++]=l.substring(0,i);l=l.substring(i+d.length);}return a");
s.vpr = new Function("vs", "v",
		"if(typeof(v)!='undefined'){var s=this; eval('s.'+vs+'=\"'+v+'\"')}");
s.trackingServer = "metrics.apple.com";
s.trackingServerSecure = "securemetrics.apple.com";
s.dc = 112;
s.m_Media_c = "var m=s.m_i('Media');m.cn=function(n){var m=this;return m.s.rep(m.s.rep(m.s.rep(n,\"\\n\",''),\"\\r\",''),'--**--','')};m.open=function(n,l,p,b){var m=this,i=new Object,tm=new Date,a='',x;n=m.cn(n);l=parseInt(l);if(!l)l=1;if(n&&p){if(!m.l)m.l=new Object;if(m.l[n])m.close(n);if(b&&b.id)a=b.id;for (x in m.l)if(m.l[x]&&m.l[x].a==a)m.close(m.l[x].n);i.n=n;i.l=l;i.p=m.cn(p);i.a=a;i.t=0;i.ts=0;i.s=Math.floor(tm.getTime()/1000);i.lx=0;i.lt=i.s;i.lo=0;i.e='';i.to=-1;m.l[n]=i}};m.close=function(n){this.e(n,0,-1)};m.play=function(n,o){var m=this,i;i=m.e(n,1,o);i.m=new Function('var m=s_c_il['+m._in+'],i;if(m.l){i=m.l[\"'+m.s.rep(i.n,'\"','\\\\\"')+'\"];if(i){if(i.lx==1)m.e(i.n,3,-1);i.mt=setTimeout(i.m,5000)}}');i.m()};m.stop=function(n,o){this.e(n,2,o)};m.track=function(n){var m=this;if (m.trackWhilePlaying) {m.e(n,4,-1)}};m.e=function(n,x,o){var m=this,i,tm=new Date,ts=Math.floor(tm.getTime()/1000),ti=m.trackSeconds,tp=m.trackMilestones,z=new Array,j,d='--**--',t=1,b,v=m.trackVars,e=m.trackEvents,pe='media',pev3,w=new Object,vo=new Object;n=m.cn(n);i=n&&m.l&&m.l[n]?m.l[n]:0;if(i){w.name=n;w.length=i.l;w.playerName=i.p;if(i.to<0)w.event=\"OPEN\";else w.event=(x==1?\"PLAY\":(x==2?\"STOP\":(x==3?\"MONITOR\":\"CLOSE\")));w.openTime=new Date();w.openTime.setTime(i.s*1000);if(x>2||(x!=i.lx&&(x!=2||i.lx==1))) {b=\"Media.\"+name;pev3 = m.s.ape(i.n)+d+i.l+d+m.s.ape(i.p)+d;if(x){if(o<0&&i.lt>0){o=(ts-i.lt)+i.lo;o=o<i.l?o:i.l-1}o=Math.floor(o);if(x>=2&&i.lo<o){i.t+=o-i.lo;i.ts+=o-i.lo;}if(x<=2){i.e+=(x==1?'S':'E')+o;i.lx=x;}else if(i.lx!=1)m.e(n,1,o);i.lt=ts;i.lo=o;pev3+=i.t+d+i.s+d+(m.trackWhilePlaying&&i.to>=0?'L'+i.to:'')+i.e+(x!=2?(m.trackWhilePlaying?'L':'E')+o:'');if(m.trackWhilePlaying){b=0;pe='m_o';if(x!=4){w.offset=o;w.percent=((w.offset+1)/w.length)*100;w.percent=w.percent>100?100:Math.floor(w.percent);w.timePlayed=i.t;if(m.monitor)m.monitor(m.s,w)}if(i.to<0)pe='m_s';else if(x==4)pe='m_i';else{t=0;v=e='None';ti=ti?parseInt(ti):0;z=tp?m.s.sp(tp,','):0;if(ti&&i.ts>=ti)t=1;else if(z){if(o<i.to)i.to=o;else{for(j=0;j<z.length;j++){ti=z[j]?parseInt(z[j]):0;if(ti&&((i.to+1)/i.l<ti/100)&&((o+1)/i.l>=ti/100)){t=1;j=z.length}}}}}}}else{m.e(n,2,-1);if(m.trackWhilePlaying){w.offset=i.lo;w.percent=((w.offset+1)/w.length)*100;w.percent=w.percent>100?100:Math.floor(w.percent);w.timePlayed=i.t;if(m.monitor)m.monitor(m.s,w)}m.l[n]=0;if(i.e){pev3+=i.t+d+i.s+d+(m.trackWhilePlaying&&i.to>=0?'L'+i.to:'')+i.e;if(m.trackWhilePlaying){v=e='None';pe='m_o'}else{t=0;m.s.fbr(b)}}else t=0;b=0}if(t){vo.linkTrackVars=v;vo.linkTrackEvents=e;vo.pe=pe;vo.pev3=pev3;m.s.t(vo,b);if(m.trackWhilePlaying){i.ts=0;i.to=o;i.e=''}}}}return i};m.ae=function(n,l,p,x,o,b){if(n&&p){var m=this;if(!m.l||!m.l[n])m.open(n,l,p,b);m.e(n,x,o)}};m.a=function(o,t){var m=this,i=o.id?o.id:o.name,n=o.name,p=0,v,c,c1,c2,xc=m.s.h,x,e,f1,f2='s_media_'+m._in+'_oc',f3='s_media_'+m._in+'_t',f4='s_media_'+m._in+'_s',f5='s_media_'+m._in+'_l',f6='s_media_'+m._in+'_m',f7='s_media_'+m._in+'_c',tcf,w;if(!i){if(!m.c)m.c=0;i='s_media_'+m._in+'_'+m.c;m.c++}if(!o.id)o.id=i;if(!o.name)o.name=n=i;if(!m.ol)m.ol=new Object;if(m.ol[i])return;m.ol[i]=o;if(!xc)xc=m.s.b;tcf=new Function('o','var e,p=0;try{if(o.versionInfo&&o.currentMedia&&o.controls)p=1}catch(e){p=0}return p');p=tcf(o);if(!p){tcf=new Function('o','var e,p=0,t;try{t=o.GetQuickTimeVersion();if(t)p=2}catch(e){p=0}return p');p=tcf(o);if(!p){tcf=new Function('o','var e,p=0,t;try{t=o.GetVersionInfo();if(t)p=3}catch(e){p=0}return p');p=tcf(o)}}v=\"var m=s_c_il[\"+m._in+\"],o=m.ol['\"+i+\"']\";if(p==1){p='Windows Media Player '+o.versionInfo;c1=v+',n,p,l,x=-1,cm,c,mn;if(o){cm=o.currentMedia;c=o.controls;if(cm&&c){mn=cm.name?cm.name:c.URL;l=cm.duration;p=c.currentPosition;n=o.playState;if(n){if(n==8)x=0;if(n==3)x=1;if(n==1||n==2||n==4||n==5||n==6)x=2;}';c2='if(x>=0)m.ae(mn,l,\"'+p+'\",x,x!=2?p:-1,o)}}';c=c1+c2;if(m.s.isie&&xc){x=m.s.d.createElement('script');x.language='jscript';x.type='text/javascript';x.htmlFor=i;x.event='PlayStateChange(NewState)';x.defer=true;x.text=c;xc.appendChild(x);o[f6]=new Function(c1+'if(n==3){x=3;'+c2+'}setTimeout(o.'+f6+',5000)');o[f6]()}}if(p==2){p='QuickTime Player '+(o.GetIsQuickTimeRegistered()?'Pro ':'')+o.GetQuickTimeVersion();f1=f2;c=v+',n,x,t,l,p,p2,mn;if(o){mn=o.GetMovieName()?o.GetMovieName():o.GetURL();n=o.GetRate();t=o.GetTimeScale();l=o.GetDuration()/t;p=o.GetTime()/t;p2=o.'+f5+';if(n!=o.'+f4+'||p<p2||p-p2>5){x=2;if(n!=0)x=1;else if(p>=l)x=0;if(p<p2||p-p2>5)m.ae(mn,l,\"'+p+'\",2,p2,o);m.ae(mn,l,\"'+p+'\",x,x!=2?p:-1,o)}if(n>0&&o.'+f7+'>=10){m.ae(mn,l,\"'+p+'\",3,p,o);o.'+f7+'=0}o.'+f7+'++;o.'+f4+'=n;o.'+f5+'=p;setTimeout(\"'+v+';o.'+f2+'(0,0)\",500)}';o[f1]=new Function('a','b',c);o[f4]=-1;o[f7]=0;o[f1](0,0)}if(p==3){p='RealPlayer '+o.GetVersionInfo();f1=n+'_OnPlayStateChange';c1=v+',n,x=-1,l,p,mn;if(o){mn=o.GetTitle()?o.GetTitle():o.GetSource();n=o.GetPlayState();l=o.GetLength()/1000;p=o.GetPosition()/1000;if(n!=o.'+f4+'){if(n==3)x=1;if(n==0||n==2||n==4||n==5)x=2;if(n==0&&(p>=l||p==0))x=0;if(x>=0)m.ae(mn,l,\"'+p+'\",x,x!=2?p:-1,o)}if(n==3&&(o.'+f7+'>=10||!o.'+f3+')){m.ae(mn,l,\"'+p+'\",3,p,o);o.'+f7+'=0}o.'+f7+'++;o.'+f4+'=n;';c2='if(o.'+f2+')o.'+f2+'(o,n)}';if(m.s.wd[f1])o[f2]=m.s.wd[f1];m.s.wd[f1]=new Function('a','b',c1+c2);o[f1]=new Function('a','b',c1+'setTimeout(\"'+v+';o.'+f1+'(0,0)\",o.'+f3+'?500:5000);'+c2);o[f4]=-1;if(m.s.isie)o[f3]=1;o[f7]=0;o[f1](0,0)}};m.as=new Function('e','var m=s_c_il['+m._in+'],l,n;if(m.autoTrack&&m.s.d.getElementsByTagName){l=m.s.d.getElementsByTagName(m.s.isie?\"OBJECT\":\"EMBED\");if(l)for(n=0;n<l.length;n++)m.a(l[n]);}');if(s.wd.attachEvent)s.wd.attachEvent('onload',m.as);else if(s.wd.addEventListener)s.wd.addEventListener('load',m.as,false)";
s.m_i("Media");
var s_code = "", s_objectID;
function s_gi(m, l, w) {
	var e = "s._c='s_c';s.wd=window;if(!s.wd.s_c_in){s.wd.s_c_il=new Array;s.wd.s_c_in=0;}s._il=s.wd.s_c_il;s._in=s.wd.s_c_in;s._il[s._in]=s;s.wd.s_c_in++;s.an=s_an;s.cls=function(x,c){var i,y='';if(!c)c=this.an;for(i=0;i<x.length;i++){n=x.substring(i,i+1);if(c.indexOf(n)>=0)y+=n}return y};s.fl=function(x,l){return x?(''+x).substring(0,l):x};s.co=function(o){if(!o)return o;var n=new Object,x;for(x in o)if(x.indexOf('select')<0&&x.indexOf('filter')<0)n[x]=o[x];return n};s.num=function(x){x=''+x;for(var p=0;p<x.length;p++)if(('0123456789').indexOf(x.substring(p,p+1))<0)return 0;return 1};s.rep=s_rep;s.sp=s_sp;s.jn=s_jn;s.ape=function(x){var s=this,h='0123456789ABCDEF',i,c=s.charSet,n,l,e,y='';c=c?c.toUpperCase():'';if(x){x=''+x;if(s.em==3)return encodeURIComponent(x);else if(c=='AUTO'&&('').charCodeAt){for(i=0;i<x.length;i++){c=x.substring(i,i+1);n=x.charCodeAt(i);if(n>127){l=0;e='';while(n||l<4){e=h.substring(n%16,n%16+1)+e;n=(n-n%16)/16;l++}y+='%u'+e}else if(c=='+')y+='%2B';else y+=escape(c)}return y}else{x=s.rep(escape(''+x),'+','%2B');if(c&&s.em==1&&x.indexOf('%u')<0&&x.indexOf('%U')<0){i=x.indexOf('%');while(i>=0){i++;if(h.substring(8).indexOf(x.substring(i,i+1).toUpperCase())>=0)return x.substring(0,i)+'u00'+x.substring(i);i=x.indexOf('%',i)}}}}return x};s.epa=function(x){var s=this;if(x){x=''+x;return s.em==3?decodeURIComponent(x):unescape(s.rep(x,'+',' '))}return x};s.pt=function(x,d,f,a){var s=this,t=x,z=0,y,r;while(t){y=t.indexOf(d);y=y<0?t.length:y;t=t.substring(0,y);r=s[f](t,a);if(r)return r;z+=y+d.length;t=x.substring(z,x.length);t=z<x.length?t:''}return ''};s.isf=function(t,a){var c=a.indexOf(':');if(c>=0)a=a.substring(0,c);if(t.substring(0,2)=='s_')t=t.substring(2);return (t!=''&&t==a)};s.fsf=function(t,a){var s=this;if(s.pt(a,',','isf',t))s.fsg+=(s.fsg!=''?',':'')+t;return 0};s.fs=function(x,f){var s=this;s.fsg='';s.pt(x,',','fsf',f);return s.fsg};s.si=function(){var s=this,i,k,v,c=s_gi+'var s=s_gi(\"'+s.oun+'\");s.sa(\"'+s.un+'\");';for(i=0;i<s.va_g.length;i++){k=s.va_g[i];v=s[k];if(v!=undefined){if(typeof(v)=='string')c+='s.'+k+'=\"'+s_fe(v)+'\";';else c+='s.'+k+'='+v+';'}}c+=\"s.lnk=s.eo=s.linkName=s.linkType=s.wd.s_objectID=s.ppu=s.pe=s.pev1=s.pev2=s.pev3='';\";return c};s.c_d='';s.c_gdf=function(t,a){var s=this;if(!s.num(t))return 1;return 0};s.c_gd=function(){var s=this,d=s.wd.location.hostname,n=s.fpCookieDomainPeriods,p;if(!n)n=s.cookieDomainPeriods;if(d&&!s.c_d){n=n?parseInt(n):2;n=n>2?n:2;p=d.lastIndexOf('.');if(p>=0){while(p>=0&&n>1){p=d.lastIndexOf('.',p-1);n--}s.c_d=p>0&&s.pt(d,'.','c_gdf',0)?d.substring(p):d}}return s.c_d};s.c_r=function(k){var s=this;k=s.ape(k);var c=' '+s.d.cookie,i=c.indexOf(' '+k+'='),e=i<0?i:c.indexOf(';',i),v=i<0?'':s.epa(c.substring(i+2+k.length,e<0?c.length:e));return v!='[[B]]'?v:''};s.c_w=function(k,v,e){var s=this,d=s.c_gd(),l=s.cookieLifetime,t;v=''+v;l=l?(''+l).toUpperCase():'';if(e&&l!='SESSION'&&l!='NONE'){t=(v!=''?parseInt(l?l:0):-60);if(t){e=new Date;e.setTime(e.getTime()+(t*1000))}}if(k&&l!='NONE'){s.d.cookie=k+'='+s.ape(v!=''?v:'[[B]]')+'; path=/;'+(e&&l!='SESSION'?' expires='+e.toGMTString()+';':'')+(d?' domain='+d+';':'');return s.c_r(k)==v}return 0};s.eh=function(o,e,r,f){var s=this,b='s_'+e+'_'+s._in,n=-1,l,i,x;if(!s.ehl)s.ehl=new Array;l=s.ehl;for(i=0;i<l.length&&n<0;i++){if(l[i].o==o&&l[i].e==e)n=i}if(n<0){n=i;l[n]=new Object}x=l[n];x.o=o;x.e=e;f=r?x.b:f;if(r||f){x.b=r?0:o[e];x.o[e]=f}if(x.b){x.o[b]=x.b;return b}return 0};s.cet=function(f,a,t,o,b){var s=this,r,tcf;if(s.apv>=5&&(!s.isopera||s.apv>=7)){tcf=new Function('s','f','a','t','var e,r;try{r=s[f](a)}catch(e){r=s[t](e)}return r');r=tcf(s,f,a,t)}else{if(s.ismac&&s.u.indexOf('MSIE 4')>=0)r=s[b](a);else{s.eh(s.wd,'onerror',0,o);r=s[f](a);s.eh(s.wd,'onerror',1)}}return r};s.gtfset=function(e){var s=this;return s.tfs};s.gtfsoe=new Function('e','var s=s_c_il['+s._in+'],c;s.eh(window,\"onerror\",1);s.etfs=1;c=s.t();if(c)s.d.write(c);s.etfs=0;return true');s.gtfsfb=function(a){return window};s.gtfsf=function(w){var s=this,p=w.parent,l=w.location;s.tfs=w;if(p&&p.location!=l&&p.location.host==l.host){s.tfs=p;return s.gtfsf(s.tfs)}return s.tfs};s.gtfs=function(){var s=this;if(!s.tfs){s.tfs=s.wd;if(!s.etfs)s.tfs=s.cet('gtfsf',s.tfs,'gtfset',s.gtfsoe,'gtfsfb')}return s.tfs};s.mrq=function(u){var s=this,l=s.rl[u],n,r;s.rl[u]=0;if(l)for(n=0;n<l.length;n++){r=l[n];s.mr(0,0,r.r,0,r.t,r.u)}};s.br=function(id,rs){var s=this;if(s.disableBufferedRequests||!s.c_w('s_br',rs))s.brl=rs};s.flushBufferedRequests=function(){this.fbr(0)};s.fbr=function(id){var s=this,br=s.c_r('s_br');if(!br)br=s.brl;if(br){if(!s.disableBufferedRequests)s.c_w('s_br','');s.mr(0,0,br)}s.brl=0};s.mr=function(sess,q,rs,id,ta,u){var s=this,dc=s.dc,t1=s.trackingServer,t2=s.trackingServerSecure,tb=s.trackingServerBase,p='.sc',ns=s.visitorNamespace,un=s.cls(u?u:(ns?ns:s.fun)),r=new Object,l,imn='s_i_'+(un),im,b,e;if(!rs){if(t1){if(t2&&s.ssl)t1=t2}else{if(!tb)tb='2o7.net';if(dc)dc=(''+dc).toLowerCase();else dc='d1';if(tb=='2o7.net'){if(dc=='d1')dc='112';else if(dc=='d2')dc='122';p=''}t1=un+'.'+dc+'.'+p+tb}rs='http'+(s.ssl?'s':'')+'://'+t1+'/b/ss/'+s.un+'/'+(s.mobile?'5.1':'1')+'/H.22.1/'+sess+'?AQB=1&ndh=1'+(q?q:'')+'&AQE=1';if(s.isie&&!s.ismac)rs=s.fl(rs,2047);if(id){s.br(id,rs);return}}if(s.d.images&&s.apv>=3&&(!s.isopera||s.apv>=7)&&(s.ns6<0||s.apv>=6.1)){if(!s.rc)s.rc=new Object;if(!s.rc[un]){s.rc[un]=1;if(!s.rl)s.rl=new Object;s.rl[un]=new Array;setTimeout('if(window.s_c_il)window.s_c_il['+s._in+'].mrq(\"'+un+'\")',750)}else{l=s.rl[un];if(l){r.t=ta;r.u=un;r.r=rs;l[l.length]=r;return ''}imn+='_'+s.rc[un];s.rc[un]++}im=s.wd[imn];if(!im)im=s.wd[imn]=new Image;im.s_l=0;im.onload=new Function('e','this.s_l=1;var wd=window,s;if(wd.s_c_il){s=wd.s_c_il['+s._in+'];s.mrq(\"'+un+'\");s.nrs--;if(!s.nrs)s.m_m(\"rr\")}');if(!s.nrs){s.nrs=1;s.m_m('rs')}else s.nrs++;im.src=rs;if((!ta||ta=='_self'||ta=='_top'||(s.wd.name&&ta==s.wd.name))&&rs.indexOf('&pe=')>=0){b=e=new Date;while(!im.s_l&&e.getTime()-b.getTime()<500)e=new Date}return ''}return '<im'+'g sr'+'c=\"'+rs+'\" width=1 height=1 border=0 alt=\"\">'};s.gg=function(v){var s=this;if(!s.wd['s_'+v])s.wd['s_'+v]='';return s.wd['s_'+v]};s.glf=function(t,a){if(t.substring(0,2)=='s_')t=t.substring(2);var s=this,v=s.gg(t);if(v)s[t]=v};s.gl=function(v){var s=this;if(s.pg)s.pt(v,',','glf',0)};s.rf=function(x){var s=this,y,i,j,h,l,a,b='',c='',t;if(x){y=''+x;i=y.indexOf('?');if(i>0){a=y.substring(i+1);y=y.substring(0,i);h=y.toLowerCase();i=0;if(h.substring(0,7)=='http://')i+=7;else if(h.substring(0,8)=='https://')i+=8;h=h.substring(i);i=h.indexOf(\"/\");if(i>0){h=h.substring(0,i);if(h.indexOf('google')>=0){a=s.sp(a,'&');if(a.length>1){l=',q,ie,start,search_key,word,kw,cd,';for(j=0;j<a.length;j++){t=a[j];i=t.indexOf('=');if(i>0&&l.indexOf(','+t.substring(0,i)+',')>=0)b+=(b?'&':'')+t;else c+=(c?'&':'')+t}if(b&&c){y+='?'+b+'&'+c;if(''+x!=y)x=y}}}}}}return x};s.hav=function(){var s=this,qs='',fv=s.linkTrackVars,fe=s.linkTrackEvents,mn,i;if(s.pe){mn=s.pe.substring(0,1).toUpperCase()+s.pe.substring(1);if(s[mn]){fv=s[mn].trackVars;fe=s[mn].trackEvents}}fv=fv?fv+','+s.vl_l+','+s.vl_l2:'';for(i=0;i<s.va_t.length;i++){var k=s.va_t[i],v=s[k],b=k.substring(0,4),x=k.substring(4),n=parseInt(x),q=k;if(v&&k!='linkName'&&k!='linkType'){if(s.pe||s.lnk||s.eo){if(fv&&(','+fv+',').indexOf(','+k+',')<0)v='';if(k=='events'&&fe)v=s.fs(v,fe)}if(v){if(k=='dynamicVariablePrefix')q='D';else if(k=='visitorID')q='vid';else if(k=='pageURL'){q='g';v=s.fl(v,255)}else if(k=='referrer'){q='r';v=s.fl(s.rf(v),255)}else if(k=='vmk'||k=='visitorMigrationKey')q='vmt';else if(k=='visitorMigrationServer'){q='vmf';if(s.ssl&&s.visitorMigrationServerSecure)v=''}else if(k=='visitorMigrationServerSecure'){q='vmf';if(!s.ssl&&s.visitorMigrationServer)v=''}else if(k=='charSet'){q='ce';if(v.toUpperCase()=='AUTO')v='ISO8859-1';else if(s.em==2||s.em==3)v='UTF-8'}else if(k=='visitorNamespace')q='ns';else if(k=='cookieDomainPeriods')q='cdp';else if(k=='cookieLifetime')q='cl';else if(k=='variableProvider')q='vvp';else if(k=='currencyCode')q='cc';else if(k=='channel')q='ch';else if(k=='transactionID')q='xact';else if(k=='campaign')q='v0';else if(k=='resolution')q='s';else if(k=='colorDepth')q='c';else if(k=='javascriptVersion')q='j';else if(k=='javaEnabled')q='v';else if(k=='cookiesEnabled')q='k';else if(k=='browserWidth')q='bw';else if(k=='browserHeight')q='bh';else if(k=='connectionType')q='ct';else if(k=='homepage')q='hp';else if(k=='plugins')q='p';else if(s.num(x)){if(b=='prop')q='c'+n;else if(b=='eVar')q='v'+n;else if(b=='list')q='l'+n;else if(b=='hier'){q='h'+n;v=s.fl(v,255)}}if(v)qs+='&'+q+'='+(k.substring(0,3)!='pev'?s.ape(v):v)}}}return qs};s.ltdf=function(t,h){t=t?t.toLowerCase():'';h=h?h.toLowerCase():'';var qi=h.indexOf('?');h=qi>=0?h.substring(0,qi):h;if(t&&h.substring(h.length-(t.length+1))=='.'+t)return 1;return 0};s.ltef=function(t,h){t=t?t.toLowerCase():'';h=h?h.toLowerCase():'';if(t&&h.indexOf(t)>=0)return 1;return 0};s.lt=function(h){var s=this,lft=s.linkDownloadFileTypes,lef=s.linkExternalFilters,lif=s.linkInternalFilters;lif=lif?lif:s.wd.location.hostname;h=h.toLowerCase();if(s.trackDownloadLinks&&lft&&s.pt(lft,',','ltdf',h))return 'd';if(s.trackExternalLinks&&h.substring(0,1)!='#'&&(lef||lif)&&(!lef||s.pt(lef,',','ltef',h))&&(!lif||!s.pt(lif,',','ltef',h)))return 'e';return ''};s.lc=new Function('e','var s=s_c_il['+s._in+'],b=s.eh(this,\"onclick\");s.lnk=s.co(this);s.t();s.lnk=0;if(b)return this[b](e);return true');s.bc=new Function('e','var s=s_c_il['+s._in+'],f,tcf;if(s.d&&s.d.all&&s.d.all.cppXYctnr)return;s.eo=e.srcElement?e.srcElement:e.target;tcf=new Function(\"s\",\"var e;try{if(s.eo&&(s.eo.tagName||s.eo.parentElement||s.eo.parentNode))s.t()}catch(e){}\");tcf(s);s.eo=0');s.oh=function(o){var s=this,l=s.wd.location,h=o.href?o.href:'',i,j,k,p;i=h.indexOf(':');j=h.indexOf('?');k=h.indexOf('/');if(h&&(i<0||(j>=0&&i>j)||(k>=0&&i>k))){p=o.protocol&&o.protocol.length>1?o.protocol:(l.protocol?l.protocol:'');i=l.pathname.lastIndexOf('/');h=(p?p+'//':'')+(o.host?o.host:(l.host?l.host:''))+(h.substring(0,1)!='/'?l.pathname.substring(0,i<0?0:i)+'/':'')+h}return h};s.ot=function(o){var t=o.tagName;t=t&&t.toUpperCase?t.toUpperCase():'';if(t=='SHAPE')t='';if(t){if((t=='INPUT'||t=='BUTTON')&&o.type&&o.type.toUpperCase)t=o.type.toUpperCase();else if(!t&&o.href)t='A';}return t};s.oid=function(o){var s=this,t=s.ot(o),p,c,n='',x=0;if(t&&!o.s_oid){p=o.protocol;c=o.onclick;if(o.href&&(t=='A'||t=='AREA')&&(!c||!p||p.toLowerCase().indexOf('javascript')<0))n=s.oh(o);else if(c){n=s.rep(s.rep(s.rep(s.rep(''+c,\"\\r\",''),\"\\n\",''),\"\\t\",''),' ','');x=2}else if(t=='INPUT'||t=='SUBMIT'){if(o.value)n=o.value;else if(o.innerText)n=o.innerText;else if(o.textContent)n=o.textContent;x=3}else if(o.src&&t=='IMAGE')n=o.src;if(n){o.s_oid=s.fl(n,100);o.s_oidt=x}}return o.s_oid};s.rqf=function(t,un){var s=this,e=t.indexOf('='),u=e>=0?t.substring(0,e):'',q=e>=0?s.epa(t.substring(e+1)):'';if(u&&q&&(','+u+',').indexOf(','+un+',')>=0){if(u!=s.un&&s.un.indexOf(',')>=0)q='&u='+u+q+'&u=0';return q}return ''};s.rq=function(un){if(!un)un=this.un;var s=this,c=un.indexOf(','),v=s.c_r('s_sq'),q='';if(c<0)return s.pt(v,'&','rqf',un);return s.pt(un,',','rq',0)};s.sqp=function(t,a){var s=this,e=t.indexOf('='),q=e<0?'':s.epa(t.substring(e+1));s.sqq[q]='';if(e>=0)s.pt(t.substring(0,e),',','sqs',q);return 0};s.sqs=function(un,q){var s=this;s.squ[un]=q;return 0};s.sq=function(q){var s=this,k='s_sq',v=s.c_r(k),x,c=0;s.sqq=new Object;s.squ=new Object;s.sqq[q]='';s.pt(v,'&','sqp',0);s.pt(s.un,',','sqs',q);v='';for(x in s.squ)if(x&&(!Object||!Object.prototype||!Object.prototype[x]))s.sqq[s.squ[x]]+=(s.sqq[s.squ[x]]?',':'')+x;for(x in s.sqq)if(x&&(!Object||!Object.prototype||!Object.prototype[x])&&s.sqq[x]&&(x==q||c<2)){v+=(v?'&':'')+s.sqq[x]+'='+s.ape(x);c++}return s.c_w(k,v,0)};s.wdl=new Function('e','var s=s_c_il['+s._in+'],r=true,b=s.eh(s.wd,\"onload\"),i,o,oc;if(b)r=this[b](e);for(i=0;i<s.d.links.length;i++){o=s.d.links[i];oc=o.onclick?\"\"+o.onclick:\"\";if((oc.indexOf(\"s_gs(\")<0||oc.indexOf(\".s_oc(\")>=0)&&oc.indexOf(\".tl(\")<0)s.eh(o,\"onclick\",0,s.lc);}return r');s.wds=function(){var s=this;if(s.apv>3&&(!s.isie||!s.ismac||s.apv>=5)){if(s.b&&s.b.attachEvent)s.b.attachEvent('onclick',s.bc);else if(s.b&&s.b.addEventListener)s.b.addEventListener('click',s.bc,false);else s.eh(s.wd,'onload',0,s.wdl)}};s.vs=function(x){var s=this,v=s.visitorSampling,g=s.visitorSamplingGroup,k='s_vsn_'+s.un+(g?'_'+g:''),n=s.c_r(k),e=new Date,y=e.getYear();e.setYear(y+10+(y<1900?1900:0));if(v){v*=100;if(!n){if(!s.c_w(k,x,e))return 0;n=x}if(n%10000>v)return 0}return 1};s.dyasmf=function(t,m){if(t&&m&&m.indexOf(t)>=0)return 1;return 0};s.dyasf=function(t,m){var s=this,i=t?t.indexOf('='):-1,n,x;if(i>=0&&m){var n=t.substring(0,i),x=t.substring(i+1);if(s.pt(x,',','dyasmf',m))return n}return 0};s.uns=function(){var s=this,x=s.dynamicAccountSelection,l=s.dynamicAccountList,m=s.dynamicAccountMatch,n,i;s.un=s.un.toLowerCase();if(x&&l){if(!m)m=s.wd.location.host;if(!m.toLowerCase)m=''+m;l=l.toLowerCase();m=m.toLowerCase();n=s.pt(l,';','dyasf',m);if(n)s.un=n}i=s.un.indexOf(',');s.fun=i<0?s.un:s.un.substring(0,i)};s.sa=function(un){var s=this;s.un=un;if(!s.oun)s.oun=un;else if((','+s.oun+',').indexOf(','+un+',')<0)s.oun+=','+un;s.uns()};s.m_i=function(n,a){var s=this,m,f=n.substring(0,1),r,l,i;if(!s.m_l)s.m_l=new Object;if(!s.m_nl)s.m_nl=new Array;m=s.m_l[n];if(!a&&m&&m._e&&!m._i)s.m_a(n);if(!m){m=new Object,m._c='s_m';m._in=s.wd.s_c_in;m._il=s._il;m._il[m._in]=m;s.wd.s_c_in++;m.s=s;m._n=n;m._l=new Array('_c','_in','_il','_i','_e','_d','_dl','s','n','_r','_g','_g1','_t','_t1','_x','_x1','_rs','_rr','_l');s.m_l[n]=m;s.m_nl[s.m_nl.length]=n}else if(m._r&&!m._m){r=m._r;r._m=m;l=m._l;for(i=0;i<l.length;i++)if(m[l[i]])r[l[i]]=m[l[i]];r._il[r._in]=r;m=s.m_l[n]=r}if(f==f.toUpperCase())s[n]=m;return m};s.m_a=new Function('n','g','e','if(!g)g=\"m_\"+n;var s=s_c_il['+s._in+'],c=s[g+\"_c\"],m,x,f=0;if(!c)c=s.wd[\"s_\"+g+\"_c\"];if(c&&s_d)s[g]=new Function(\"s\",s_ft(s_d(c)));x=s[g];if(!x)x=s.wd[\\'s_\\'+g];if(!x)x=s.wd[g];m=s.m_i(n,1);if(x&&(!m._i||g!=\"m_\"+n)){m._i=f=1;if((\"\"+x).indexOf(\"function\")>=0)x(s);else s.m_m(\"x\",n,x,e)}m=s.m_i(n,1);if(m._dl)m._dl=m._d=0;s.dlt();return f');s.m_m=function(t,n,d,e){t='_'+t;var s=this,i,x,m,f='_'+t,r=0,u;if(s.m_l&&s.m_nl)for(i=0;i<s.m_nl.length;i++){x=s.m_nl[i];if(!n||x==n){m=s.m_i(x);u=m[t];if(u){if((''+u).indexOf('function')>=0){if(d&&e)u=m[t](d,e);else if(d)u=m[t](d);else u=m[t]()}}if(u)r=1;u=m[t+1];if(u&&!m[f]){if((''+u).indexOf('function')>=0){if(d&&e)u=m[t+1](d,e);else if(d)u=m[t+1](d);else u=m[t+1]()}}m[f]=1;if(u)r=1}}return r};s.m_ll=function(){var s=this,g=s.m_dl,i,o;if(g)for(i=0;i<g.length;i++){o=g[i];if(o)s.loadModule(o.n,o.u,o.d,o.l,o.e,1);g[i]=0}};s.loadModule=function(n,u,d,l,e,ln){var s=this,m=0,i,g,o=0,f1,f2,c=s.h?s.h:s.b,b,tcf;if(n){i=n.indexOf(':');if(i>=0){g=n.substring(i+1);n=n.substring(0,i)}else g=\"m_\"+n;m=s.m_i(n)}if((l||(n&&!s.m_a(n,g)))&&u&&s.d&&c&&s.d.createElement){if(d){m._d=1;m._dl=1}if(ln){if(s.ssl)u=s.rep(u,'http:','https:');i='s_s:'+s._in+':'+n+':'+g;b='var s=s_c_il['+s._in+'],o=s.d.getElementById(\"'+i+'\");if(s&&o){if(!o.l&&s.wd.'+g+'){o.l=1;if(o.i)clearTimeout(o.i);o.i=0;s.m_a(\"'+n+'\",\"'+g+'\"'+(e?',\"'+e+'\"':'')+')}';f2=b+'o.c++;if(!s.maxDelay)s.maxDelay=250;if(!o.l&&o.c<(s.maxDelay*2)/100)o.i=setTimeout(o.f2,100)}';f1=new Function('e',b+'}');tcf=new Function('s','c','i','u','f1','f2','var e,o=0;try{o=s.d.createElement(\"script\");if(o){o.type=\"text/javascript\";'+(n?'o.id=i;o.defer=true;o.onload=o.onreadystatechange=f1;o.f2=f2;o.l=0;':'')+'o.src=u;c.appendChild(o);'+(n?'o.c=0;o.i=setTimeout(f2,100)':'')+'}}catch(e){o=0}return o');o=tcf(s,c,i,u,f1,f2)}else{o=new Object;o.n=n+':'+g;o.u=u;o.d=d;o.l=l;o.e=e;g=s.m_dl;if(!g)g=s.m_dl=new Array;i=0;while(i<g.length&&g[i])i++;g[i]=o}}else if(n){m=s.m_i(n);m._e=1}return m};s.vo1=function(t,a){if(a[t]||a['!'+t])this[t]=a[t]};s.vo2=function(t,a){if(!a[t]){a[t]=this[t];if(!a[t])a['!'+t]=1}};s.dlt=new Function('var s=s_c_il['+s._in+'],d=new Date,i,vo,f=0;if(s.dll)for(i=0;i<s.dll.length;i++){vo=s.dll[i];if(vo){if(!s.m_m(\"d\")||d.getTime()-vo._t>=s.maxDelay){s.dll[i]=0;s.t(vo)}else f=1}}if(s.dli)clearTimeout(s.dli);s.dli=0;if(f){if(!s.dli)s.dli=setTimeout(s.dlt,s.maxDelay)}else s.dll=0');s.dl=function(vo){var s=this,d=new Date;if(!vo)vo=new Object;s.pt(s.vl_g,',','vo2',vo);vo._t=d.getTime();if(!s.dll)s.dll=new Array;s.dll[s.dll.length]=vo;if(!s.maxDelay)s.maxDelay=250;s.dlt()};s.t=function(vo,id){var s=this,trk=1,tm=new Date,sed=Math&&Math.random?Math.floor(Math.random()*10000000000000):tm.getTime(),sess='s'+Math.floor(tm.getTime()/10800000)%10+sed,y=tm.getYear(),vt=tm.getDate()+'/'+tm.getMonth()+'/'+(y<1900?y+1900:y)+' '+tm.getHours()+':'+tm.getMinutes()+':'+tm.getSeconds()+' '+tm.getDay()+' '+tm.getTimezoneOffset(),tcf,tfs=s.gtfs(),ta=-1,q='',qs='',code='',vb=new Object;s.gl(s.vl_g);s.uns();s.m_ll();if(!s.td){var tl=tfs.location,a,o,i,x='',c='',v='',p='',bw='',bh='',j='1.0',k=s.c_w('s_cc','true',0)?'Y':'N',hp='',ct='',pn=0,ps;if(String&&String.prototype){j='1.1';if(j.match){j='1.2';if(tm.setUTCDate){j='1.3';if(s.isie&&s.ismac&&s.apv>=5)j='1.4';if(pn.toPrecision){j='1.5';a=new Array;if(a.forEach){j='1.6';i=0;o=new Object;tcf=new Function('o','var e,i=0;try{i=new Iterator(o)}catch(e){}return i');i=tcf(o);if(i&&i.next)j='1.7'}}}}}if(s.apv>=4)x=screen.width+'x'+screen.height;if(s.isns||s.isopera){if(s.apv>=3){v=s.n.javaEnabled()?'Y':'N';if(s.apv>=4){c=screen.pixelDepth;bw=s.wd.innerWidth;bh=s.wd.innerHeight}}s.pl=s.n.plugins}else if(s.isie){if(s.apv>=4){v=s.n.javaEnabled()?'Y':'N';c=screen.colorDepth;if(s.apv>=5){bw=s.d.documentElement.offsetWidth;bh=s.d.documentElement.offsetHeight;if(!s.ismac&&s.b){tcf=new Function('s','tl','var e,hp=0;try{s.b.addBehavior(\"#default#homePage\");hp=s.b.isHomePage(tl)?\"Y\":\"N\"}catch(e){}return hp');hp=tcf(s,tl);tcf=new Function('s','var e,ct=0;try{s.b.addBehavior(\"#default#clientCaps\");ct=s.b.connectionType}catch(e){}return ct');ct=tcf(s)}}}else r=''}if(s.pl)while(pn<s.pl.length&&pn<30){ps=s.fl(s.pl[pn].name,100)+';';if(p.indexOf(ps)<0)p+=ps;pn++}s.resolution=x;s.colorDepth=c;s.javascriptVersion=j;s.javaEnabled=v;s.cookiesEnabled=k;s.browserWidth=bw;s.browserHeight=bh;s.connectionType=ct;s.homepage=hp;s.plugins=p;s.td=1}if(vo){s.pt(s.vl_g,',','vo2',vb);s.pt(s.vl_g,',','vo1',vo)}if((vo&&vo._t)||!s.m_m('d')){if(s.usePlugins)s.doPlugins(s);var l=s.wd.location,r=tfs.document.referrer;if(!s.pageURL)s.pageURL=l.href?l.href:l;if(!s.referrer&&!s._1_referrer){s.referrer=r;s._1_referrer=1}s.m_m('g');if(s.lnk||s.eo){var o=s.eo?s.eo:s.lnk;if(!o)return '';var p=s.pageName,w=1,t=s.ot(o),n=s.oid(o),x=o.s_oidt,h,l,i,oc;if(s.eo&&o==s.eo){while(o&&!n&&t!='BODY'){o=o.parentElement?o.parentElement:o.parentNode;if(!o)return '';t=s.ot(o);n=s.oid(o);x=o.s_oidt}oc=o.onclick?''+o.onclick:'';if((oc.indexOf(\"s_gs(\")>=0&&oc.indexOf(\".s_oc(\")<0)||oc.indexOf(\".tl(\")>=0)return ''}if(n)ta=o.target;h=s.oh(o);i=h.indexOf('?');h=s.linkLeaveQueryString||i<0?h:h.substring(0,i);l=s.linkName;t=s.linkType?s.linkType.toLowerCase():s.lt(h);if(t&&(h||l))q+='&pe=lnk_'+(t=='d'||t=='e'?s.ape(t):'o')+(h?'&pev1='+s.ape(h):'')+(l?'&pev2='+s.ape(l):'');else trk=0;if(s.trackInlineStats){if(!p){p=s.pageURL;w=0}t=s.ot(o);i=o.sourceIndex;if(s.gg('objectID')){n=s.gg('objectID');x=1;i=1}if(p&&n&&t)qs='&pid='+s.ape(s.fl(p,255))+(w?'&pidt='+w:'')+'&oid='+s.ape(s.fl(n,100))+(x?'&oidt='+x:'')+'&ot='+s.ape(t)+(i?'&oi='+i:'')}}if(!trk&&!qs)return '';s.sampled=s.vs(sed);if(trk){if(s.sampled)code=s.mr(sess,(vt?'&t='+s.ape(vt):'')+s.hav()+q+(qs?qs:s.rq()),0,id,ta);qs='';s.m_m('t');if(s.p_r)s.p_r();s.referrer=''}s.sq(qs);}else{s.dl(vo);}if(vo)s.pt(s.vl_g,',','vo1',vb);s.lnk=s.eo=s.linkName=s.linkType=s.wd.s_objectID=s.ppu=s.pe=s.pev1=s.pev2=s.pev3='';if(s.pg)s.wd.s_lnk=s.wd.s_eo=s.wd.s_linkName=s.wd.s_linkType='';if(!id&&!s.tc){s.tc=1;s.flushBufferedRequests()}return code};s.tl=function(o,t,n,vo){var s=this;s.lnk=s.co(o);s.linkType=t;s.linkName=n;s.t(vo)};if(pg){s.wd.s_co=function(o){var s=s_gi(\"_\",1,1);return s.co(o)};s.wd.s_gs=function(un){var s=s_gi(un,1,1);return s.t()};s.wd.s_dc=function(un){var s=s_gi(un,1);return s.t()}}s.ssl=(s.wd.location.protocol.toLowerCase().indexOf('https')>=0);s.d=document;s.b=s.d.body;if(s.d.getElementsByTagName){s.h=s.d.getElementsByTagName('HEAD');if(s.h)s.h=s.h[0]}s.n=navigator;s.u=s.n.userAgent;s.ns6=s.u.indexOf('Netscape6/');var apn=s.n.appName,v=s.n.appVersion,ie=v.indexOf('MSIE '),o=s.u.indexOf('Opera '),i;if(v.indexOf('Opera')>=0||o>0)apn='Opera';s.isie=(apn=='Microsoft Internet Explorer');s.isns=(apn=='Netscape');s.isopera=(apn=='Opera');s.ismac=(s.u.indexOf('Mac')>=0);if(o>0)s.apv=parseFloat(s.u.substring(o+6));else if(ie>0){s.apv=parseInt(i=v.substring(ie+5));if(s.apv>3)s.apv=parseFloat(i)}else if(s.ns6>0)s.apv=parseFloat(s.u.substring(s.ns6+10));else s.apv=parseFloat(v);s.em=0;if(s.em.toPrecision)s.em=3;else if(String.fromCharCode){i=escape(String.fromCharCode(256)).toUpperCase();s.em=(i=='%C4%80'?2:(i=='%U0100'?1:0))}s.sa(un);s.vl_l='dynamicVariablePrefix,visitorID,vmk,visitorMigrationKey,visitorMigrationServer,visitorMigrationServerSecure,ppu,charSet,visitorNamespace,cookieDomainPeriods,cookieLifetime,pageName,pageURL,referrer,currencyCode';s.va_l=s.sp(s.vl_l,',');s.vl_t=s.vl_l+',variableProvider,channel,server,pageType,transactionID,purchaseID,campaign,state,zip,events,products,linkName,linkType';for(var n=1;n<76;n++)s.vl_t+=',prop'+n+',eVar'+n+',hier'+n+',list'+n;s.vl_l2=',tnt,pe,pev1,pev2,pev3,resolution,colorDepth,javascriptVersion,javaEnabled,cookiesEnabled,browserWidth,browserHeight,connectionType,homepage,plugins';s.vl_t+=s.vl_l2;s.va_t=s.sp(s.vl_t,',');s.vl_g=s.vl_t+',trackingServer,trackingServerSecure,trackingServerBase,fpCookieDomainPeriods,disableBufferedRequests,mobile,visitorSampling,visitorSamplingGroup,dynamicAccountSelection,dynamicAccountList,dynamicAccountMatch,trackDownloadLinks,trackExternalLinks,trackInlineStats,linkLeaveQueryString,linkDownloadFileTypes,linkExternalFilters,linkInternalFilters,linkTrackVars,linkTrackEvents,linkNames,lnk,eo,_1_referrer';s.va_g=s.sp(s.vl_g,',');s.pg=pg;s.gl(s.vl_g);if(!ss)s.wds()", a = window, u = a.s_c_il, B = navigator, C = B.userAgent, D = B.appVersion, i = D
			.indexOf("MSIE "), v = C.indexOf("Netscape6/"), c, n, A;
	if (m) {
		m = m.toLowerCase();
		if (u) {
			for (n = 0; n < u.length; n++) {
				A = u[n];
				if (!A._c || A._c == "s_c") {
					if (A.oun == m) {
						return A
					} else {
						if (A.fs && A.sa && A.fs(A.oun, m)) {
							A.sa(m);
							return A
						}
					}
				}
			}
		}
	}
	a.s_an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
	a.s_sp = new Function(
			"x",
			"d",
			"var a=new Array,i=0,j;if(x){if(x.split)a=x.split(d);else if(!d)for(i=0;i<x.length;i++)a[a.length]=x.substring(i,i+1);else while(i>=0){j=x.indexOf(d,i);a[a.length]=x.substring(i,j<0?x.length:j);i=j;if(i>=0)i+=d.length}}return a");
	a.s_jn = new Function(
			"a",
			"d",
			"var x='',i,j=a.length;if(a&&j>0){x=a[0];if(j>1){if(a.join)x=a.join(d);else for(i=1;i<j;i++)x+=d+a[i]}}return x");
	a.s_rep = new Function("x", "o", "n", "return s_jn(s_sp(x,o),n)");
	a.s_d = new Function(
			"x",
			"var t='`^@$#',l=s_an,l2=new Object,x2,d,b=0,k,i=x.lastIndexOf('~~'),j,v,w;if(i>0){d=x.substring(0,i);x=x.substring(i+2);l=s_sp(l,'');for(i=0;i<62;i++)l2[l[i]]=i;t=s_sp(t,'');d=s_sp(d,'~');i=0;while(i<5){v=0;if(x.indexOf(t[i])>=0) {x2=s_sp(x,t[i]);for(j=1;j<x2.length;j++){k=x2[j].substring(0,1);w=t[i]+k;if(k!=' '){v=1;w=d[b+l2[k]]}x2[j]=w+x2[j].substring(1)}}if(v)x=s_jn(x2,'');else{w=t[i]+' ';if(x.indexOf(w)>=0)x=s_rep(x,w,t[i]);i++;b+=62}}}return x");
	a.s_fe = new Function(
			"c",
			"return s_rep(s_rep(s_rep(c,'\\\\','\\\\\\\\'),'\"','\\\\\"'),\"\\n\",\"\\\\n\")");
	a.s_fa = new Function(
			"f",
			"var s=f.indexOf('(')+1,e=f.indexOf(')'),a='',c;while(s>=0&&s<e){c=f.substring(s,s+1);if(c==',')a+='\",\"';else if((\"\\n\\r\\t \").indexOf(c)<0)a+=c;s++}return a?'\"'+a+'\"':a");
	a.s_ft = new Function(
			"c",
			"c+='';var s,e,o,a,d,q,f,h,x;s=c.indexOf('=function(');while(s>=0){s++;d=1;q='';x=0;f=c.substring(s);a=s_fa(f);e=o=c.indexOf('{',s);e++;while(d>0){h=c.substring(e,e+1);if(q){if(h==q&&!x)q='';if(h=='\\\\')x=x?0:1;else x=0}else{if(h=='\"'||h==\"'\")q=h;if(h=='{')d++;if(h=='}')d--}if(d>0)e++}c=c.substring(0,s)+'new Function('+(a?a+',':'')+'\"'+s_fe(c.substring(o+1,e))+'\")'+c.substring(e+1);s=c.indexOf('=function(')}return c;");
	e = s_d(e);
	if (i > 0) {
		c = parseInt(n = D.substring(i + 5));
		if (c > 3) {
			c = parseFloat(n)
		}
	} else {
		if (v > 0) {
			c = parseFloat(C.substring(v + 10))
		} else {
			c = parseFloat(D)
		}
	}
	if (c >= 5 && D.indexOf("Opera") < 0 && C.indexOf("Opera") < 0) {
		a.s_c = new Function("un", "pg", "ss", "var s=this;" + e);
		return new s_c(m, l, w)
	} else {
		A = new Function("un", "pg", "ss", "var s=new Object;" + s_ft(e)
				+ ";return s")
	}
	return A(m, l, w)
};