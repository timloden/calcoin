var _gaq = _gaq || [];
_gaq.push(["_setAccount", args.ca_google_analytic_id]);
_gaq.push(["_gat._anonymizeIp"]);
_gaq.push(["_setDomainName", ".ca.gov"]);
_gaq.push(["_trackPageview"]);
_gaq.push(["b._setAccount", "UA-3419582-2"]);
_gaq.push(["b._setDomainName", ".ca.gov"]);
_gaq.push(["b._trackPageview"]);
if ("" !== args.caweb_multi_ga) { _gaq.push(["b._setAccount", args.caweb_multi_ga]);
				_gaq.push(["b._setDomainName", ".ca.gov"]);
				_gaq.push(["b._trackPageview"]) }(function() { var b = document.createElement("script");
				b.type = "text/javascript";
				b.async = true;
				b.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js"; var a = document.getElementsByTagName("script")[0];
				a.parentNode.insertBefore(b, a) })();
(function() { window.__gcse = { callback: d };

				function d() { var e = $("#head-search"); var f = e.find(".search-box"); var j = $(".search-results-container"); var g = $("body"); if (4 == args.ca_site_version) { f.attr("placeholder", "Search") } $("input.gsc-search-button").before("<span class='ca-gov-icon-search search-icon' aria-hidden='true'></span>");
								f.on("click", function() { i();
												e.addClass("search-freeze-width") });
								f.blur(function() { e.removeClass("search-freeze-width") });
								$("div.clear-search").on("click", function() { h() });
								$(".top-level-nav .nav-item .ca-gov-icon-search, #nav-item-search").parents(".nav-item").on("click", function(k) { f.focus().trigger("focus"); if (true == args.ca_frontpage_search_enabled) { $(".primary #head-search").addClass("play-animation").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function() { $(this).removeClass("play-animation") }) } else { i() } });

								function i() { g.addClass("active-search");
												e.addClass("active");
												j.addClass("visible");
												$("#navigation").addClass("mobile-closed");
												$(window).scroll();
												$.event.trigger("cagov.searchresults.show") }

								function h() { g.removeClass("active-search");
												e.removeClass("active");
												j.removeClass("visible");
												$(window).scroll();
												$.event.trigger("cagov.searchresults.hide") } } if ("" !== args.ca_google_search_id) { var a = args.ca_google_search_id; var c = document.createElement("script");
								c.type = "text/javascript";
								c.async = true;
								c.src = "https://cse.google.com/cse.js?cx=" + a; var b = document.getElementsByTagName("script");
								b[b.length - 1].parentNode.insertBefore(c, b[b.length - 1]) } })();
if (args.ca_google_trans_enabled) {
				function googleTranslateElementInit() { new google.translate.TranslateElement({ pageLanguage: "en", gaTrack: true, autoDisplay: false, layout: google.translate.TranslateElement.InlineLayout.VERTICAL }, "google_translate_element") } var gtrans = document.createElement("script");
				gtrans.type = "text/javascript";
				gtrans.async = true;
				gtrans.src = "https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"; var s = document.getElementsByTagName("script");
				s[s.length - 1].parentNode.insertBefore(gtrans, s[s.length - 1]) };
