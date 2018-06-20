(function(d) {
	var a = /^\s*|\s*$/g, e, c = "B".replace(/A(.)|B/, "$1") === "$1";
	var b = {
		majorVersion : "3",
		minorVersion : "4.9",
		releaseDate : "2012-02-23",
		_init : function() {
			var s = this, q = document, o = navigator, g = o.userAgent, m, f, l, k, j, r;
			s.isOpera = d.opera && opera.buildNumber;
			s.isWebKit = /WebKit/.test(g);
			s.isIE = !s.isWebKit && !s.isOpera && (/MSIE/gi).test(g)
					&& (/Explorer/gi).test(o.appName);
			s.isIE6 = s.isIE && /MSIE [56]/.test(g);
			s.isIE7 = s.isIE && /MSIE [7]/.test(g);
			s.isIE8 = s.isIE && /MSIE [8]/.test(g);
			s.isIE9 = s.isIE && /MSIE [9]/.test(g);
			s.isGecko = !s.isWebKit && /Gecko/.test(g);
			s.isMac = g.indexOf("Mac") != -1;
			s.isAir = /adobeair/i.test(g);
			s.isIDevice = /(iPad|iPhone)/.test(g);
			s.isIOS5 = s.isIDevice && g.match(/AppleWebKit\/(\d*)/)[1] >= 534;
			if (d.tinyMCEPreInit) {
				s.suffix = tinyMCEPreInit.suffix;
				s.baseURL = tinyMCEPreInit.base;
				s.query = tinyMCEPreInit.query;
				return
			}
			s.suffix = "";
			f = q.getElementsByTagName("base");
			for (m = 0; m < f.length; m++) {
				if (r = f[m].href) {
					if (/^https?:\/\/[^\/]+$/.test(r)) {
						r += "/"
					}
					k = r ? r.match(/.*\//)[0] : ""
				}
			}
			function h(i) {
				if (i.src
						&& /tiny_mce(|_gzip|_jquery|_prototype|_full)(_dev|_src)?.js/
								.test(i.src)) {
					if (/_(src|dev)\.js/g.test(i.src)) {
						s.suffix = "_src"
					}
					if ((j = i.src.indexOf("?")) != -1) {
						s.query = i.src.substring(j + 1)
					}
					s.baseURL = i.src.substring(0, i.src.lastIndexOf("/"));
					if (k && s.baseURL.indexOf("://") == -1
							&& s.baseURL.indexOf("/") !== 0) {
						s.baseURL = k + s.baseURL
					}
					return s.baseURL
				}
				return null
			}
			f = q.getElementsByTagName("script");
			for (m = 0; m < f.length; m++) {
				if (h(f[m])) {
					return
				}
			}
			l = q.getElementsByTagName("head")[0];
			if (l) {
				f = l.getElementsByTagName("script");
				for (m = 0; m < f.length; m++) {
					if (h(f[m])) {
						return
					}
				}
			}
			return
		},
		is : function(g, f) {
			if (!f) {
				return g !== e
			}
			if (f == "array" && (g.hasOwnProperty && g instanceof Array)) {
				return true
			}
			return typeof (g) == f
		},
		makeMap : function(f, j, h) {
			var g;
			f = f || [];
			j = j || ",";
			if (typeof (f) == "string") {
				f = f.split(j)
			}
			h = h || {};
			g = f.length;
			while (g--) {
				h[f[g]] = {}
			}
			return h
		},
		each : function(i, f, h) {
			var j, g;
			if (!i) {
				return 0
			}
			h = h || i;
			if (i.length !== e) {
				for (j = 0, g = i.length; j < g; j++) {
					if (f.call(h, i[j], j, i) === false) {
						return 0
					}
				}
			} else {
				for (j in i) {
					if (i.hasOwnProperty(j)) {
						if (f.call(h, i[j], j, i) === false) {
							return 0
						}
					}
				}
			}
			return 1
		},
		map : function(g, h) {
			var i = [];
			b.each(g, function(f) {
				i.push(h(f))
			});
			return i
		},
		grep : function(g, h) {
			var i = [];
			b.each(g, function(f) {
				if (!h || h(f)) {
					i.push(f)
				}
			});
			return i
		},
		inArray : function(g, h) {
			var j, f;
			if (g) {
				for (j = 0, f = g.length; j < f; j++) {
					if (g[j] === h) {
						return j
					}
				}
			}
			return -1
		},
		extend : function(k, j) {
			var h, g, f = arguments;
			for (h = 1, g = f.length; h < g; h++) {
				j = f[h];
				b.each(j, function(i, l) {
					if (i !== e) {
						k[l] = i
					}
				})
			}
			return k
		},
		trim : function(f) {
			return (f ? "" + f : "").replace(a, "")
		},
		create : function(o, f, j) {
			var n = this, g, i, k, l, h, m = 0;
			o = /^((static) )?([\w.]+)(:([\w.]+))?/.exec(o);
			k = o[3].match(/(^|\.)(\w+)$/i)[2];
			i = n.createNS(o[3].replace(/\.\w+$/, ""), j);
			if (i[k]) {
				return
			}
			if (o[2] == "static") {
				i[k] = f;
				if (this.onCreate) {
					this.onCreate(o[2], o[3], i[k])
				}
				return
			}
			if (!f[k]) {
				f[k] = function() {
				};
				m = 1
			}
			i[k] = f[k];
			n.extend(i[k].prototype, f);
			if (o[5]) {
				g = n.resolve(o[5]).prototype;
				l = o[5].match(/\.(\w+)$/i)[1];
				h = i[k];
				if (m) {
					i[k] = function() {
						return g[l].apply(this, arguments)
					}
				} else {
					i[k] = function() {
						this.parent = g[l];
						return h.apply(this, arguments)
					}
				}
				i[k].prototype[k] = i[k];
				n.each(g, function(p, q) {
					i[k].prototype[q] = g[q]
				});
				n.each(f, function(p, q) {
					if (g[q]) {
						i[k].prototype[q] = function() {
							this.parent = g[q];
							return p.apply(this, arguments)
						}
					} else {
						if (q != k) {
							i[k].prototype[q] = p
						}
					}
				})
			}
			n.each(f["static"], function(p, q) {
				i[k][q] = p
			});
			if (this.onCreate) {
				this.onCreate(o[2], o[3], i[k].prototype)
			}
		},
		walk : function(i, h, j, g) {
			g = g || this;
			if (i) {
				if (j) {
					i = i[j]
				}
				b.each(i, function(k, f) {
					if (h.call(g, k, f, j) === false) {
						return false
					}
					b.walk(k, h, j, g)
				})
			}
		},
		createNS : function(j, h) {
			var g, f;
			h = h || d;
			j = j.split(".");
			for (g = 0; g < j.length; g++) {
				f = j[g];
				if (!h[f]) {
					h[f] = {}
				}
				h = h[f]
			}
			return h
		},
		resolve : function(j, h) {
			var g, f;
			h = h || d;
			j = j.split(".");
			for (g = 0, f = j.length; g < f; g++) {
				h = h[j[g]];
				if (!h) {
					break
				}
			}
			return h
		},
		addUnload : function(j, i) {
			var h = this;
			j = {
				func : j,
				scope : i || this
			};
			if (!h.unloads) {
				function g() {
					var f = h.unloads, l, m;
					if (f) {
						for (m in f) {
							l = f[m];
							if (l && l.func) {
								l.func.call(l.scope, 1)
							}
						}
						if (d.detachEvent) {
							d.detachEvent("onbeforeunload", k);
							d.detachEvent("onunload", g)
						} else {
							if (d.removeEventListener) {
								d.removeEventListener("unload", g, false)
							}
						}
						h.unloads = l = f = w = g = 0;
						if (d.CollectGarbage) {
							CollectGarbage()
						}
					}
				}
				function k() {
					var l = document;
					if (l.readyState == "interactive") {
						function f() {
							l.detachEvent("onstop", f);
							if (g) {
								g()
							}
							l = 0
						}
						if (l) {
							l.attachEvent("onstop", f)
						}
						d.setTimeout(function() {
							if (l) {
								l.detachEvent("onstop", f)
							}
						}, 0)
					}
				}
				if (d.attachEvent) {
					d.attachEvent("onunload", g);
					d.attachEvent("onbeforeunload", k)
				} else {
					if (d.addEventListener) {
						d.addEventListener("unload", g, false)
					}
				}
				h.unloads = [ j ]
			} else {
				h.unloads.push(j)
			}
			return j
		},
		removeUnload : function(i) {
			var g = this.unloads, h = null;
			b.each(g, function(j, f) {
				if (j && j.func == i) {
					g.splice(f, 1);
					h = i;
					return false
				}
			});
			return h
		},
		explode : function(f, g) {
			return f ? b.map(f.split(g || ","), b.trim) : f
		},
		_addVer : function(g) {
			var f;
			if (!this.query) {
				return g
			}
			f = (g.indexOf("?") == -1 ? "?" : "&") + this.query;
			if (g.indexOf("#") == -1) {
				return g + f
			}
			return g.replace("#", f + "#")
		},
		_replace : function(h, f, g) {
			if (c) {
				return g.replace(h, function() {
					var l = f, j = arguments, k;
					for (k = 0; k < j.length - 2; k++) {
						if (j[k] === e) {
							l = l.replace(new RegExp("\\$" + k, "g"), "")
						} else {
							l = l.replace(new RegExp("\\$" + k, "g"), j[k])
						}
					}
					return l
				})
			}
			return g.replace(h, f)
		}
	};
	b._init();
	d.tinymce = d.tinyMCE = b
})(window);
tinymce.create("tinymce.util.Dispatcher", {
	scope : null,
	listeners : null,
	Dispatcher : function(a) {
		this.scope = a || this;
		this.listeners = []
	},
	add : function(a, b) {
		this.listeners.push( {
			cb : a,
			scope : b || this.scope
		});
		return a
	},
	addToTop : function(a, b) {
		this.listeners.unshift( {
			cb : a,
			scope : b || this.scope
		});
		return a
	},
	remove : function(a) {
		var b = this.listeners, c = null;
		tinymce.each(b, function(e, d) {
			if (a == e.cb) {
				c = a;
				b.splice(d, 1);
				return false
			}
		});
		return c
	},
	dispatch : function() {
		var f, d = arguments, e, b = this.listeners, g;
		for (e = 0; e < b.length; e++) {
			g = b[e];
			f = g.cb.apply(g.scope, d.length > 0 ? d : [ g.scope ]);
			if (f === false) {
				break
			}
		}
		return f
	}
});
(function() {
	var a = tinymce.each;
	tinymce
			.create(
					"tinymce.util.URI",
					{
						URI : function(e, g) {
							var f = this, i, d, c, h;
							e = tinymce.trim(e);
							g = f.settings = g || {};
							if (/^([\w\-]+):([^\/]{2})/i.test(e)
									|| /^\s*#/.test(e)) {
								f.source = e;
								return
							}
							if (e.indexOf("/") === 0 && e.indexOf("//") !== 0) {
								e = (g.base_uri ? g.base_uri.protocol || "http"
										: "http")
										+ "://mce_host" + e
							}
							if (!/^[\w-]*:?\/\//.test(e)) {
								h = g.base_uri ? g.base_uri.path
										: new tinymce.util.URI(location.href).directory;
								e = ((g.base_uri && g.base_uri.protocol) || "http")
										+ "://mce_host" + f.toAbsPath(h, e)
							}
							e = e.replace(/@@/g, "(mce_at)");
							e = /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@\/]*):?([^:@\/]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/
									.exec(e);
							a( [ "source", "protocol", "authority", "userInfo",
									"user", "password", "host", "port",
									"relative", "path", "directory", "file",
									"query", "anchor" ], function(b, j) {
								var k = e[j];
								if (k) {
									k = k.replace(/\(mce_at\)/g, "@@")
								}
								f[b] = k
							});
							if (c = g.base_uri) {
								if (!f.protocol) {
									f.protocol = c.protocol
								}
								if (!f.userInfo) {
									f.userInfo = c.userInfo
								}
								if (!f.port && f.host == "mce_host") {
									f.port = c.port
								}
								if (!f.host || f.host == "mce_host") {
									f.host = c.host
								}
								f.source = ""
							}
						},
						setPath : function(c) {
							var b = this;
							c = /^(.*?)\/?(\w+)?$/.exec(c);
							b.path = c[0];
							b.directory = c[1];
							b.file = c[2];
							b.source = "";
							b.getURI()
						},
						toRelative : function(b) {
							var c = this, d;
							if (b === "./") {
								return b
							}
							b = new tinymce.util.URI(b, {
								base_uri : c
							});
							if ((b.host != "mce_host" && c.host != b.host && b.host)
									|| c.port != b.port
									|| c.protocol != b.protocol) {
								return b.getURI()
							}
							d = c.toRelPath(c.path, b.path);
							if (b.query) {
								d += "?" + b.query
							}
							if (b.anchor) {
								d += "#" + b.anchor
							}
							return d
						},
						toAbsolute : function(b, c) {
							var b = new tinymce.util.URI(b, {
								base_uri : this
							});
							return b.getURI(this.host == b.host
									&& this.protocol == b.protocol ? c : 0)
						},
						toRelPath : function(g, h) {
							var c, f = 0, d = "", e, b;
							g = g.substring(0, g.lastIndexOf("/"));
							g = g.split("/");
							c = h.split("/");
							if (g.length >= c.length) {
								for (e = 0, b = g.length; e < b; e++) {
									if (e >= c.length || g[e] != c[e]) {
										f = e + 1;
										break
									}
								}
							}
							if (g.length < c.length) {
								for (e = 0, b = c.length; e < b; e++) {
									if (e >= g.length || g[e] != c[e]) {
										f = e + 1;
										break
									}
								}
							}
							if (f == 1) {
								return h
							}
							for (e = 0, b = g.length - (f - 1); e < b; e++) {
								d += "../"
							}
							for (e = f - 1, b = c.length; e < b; e++) {
								if (e != f - 1) {
									d += "/" + c[e]
								} else {
									d += c[e]
								}
							}
							return d
						},
						toAbsPath : function(e, f) {
							var c, b = 0, h = [], d, g;
							d = /\/$/.test(f) ? "/" : "";
							e = e.split("/");
							f = f.split("/");
							a(e, function(i) {
								if (i) {
									h.push(i)
								}
							});
							e = h;
							for (c = f.length - 1, h = []; c >= 0; c--) {
								if (f[c].length == 0 || f[c] == ".") {
									continue
								}
								if (f[c] == "..") {
									b++;
									continue
								}
								if (b > 0) {
									b--;
									continue
								}
								h.push(f[c])
							}
							c = e.length - b;
							if (c <= 0) {
								g = h.reverse().join("/")
							} else {
								g = e.slice(0, c).join("/") + "/"
										+ h.reverse().join("/")
							}
							if (g.indexOf("/") !== 0) {
								g = "/" + g
							}
							if (d && g.lastIndexOf("/") !== g.length - 1) {
								g += d
							}
							return g
						},
						getURI : function(d) {
							var c, b = this;
							if (!b.source || d) {
								c = "";
								if (!d) {
									if (b.protocol) {
										c += b.protocol + "://"
									}
									if (b.userInfo) {
										c += b.userInfo + "@"
									}
									if (b.host) {
										c += b.host
									}
									if (b.port) {
										c += ":" + b.port
									}
								}
								if (b.path) {
									c += b.path
								}
								if (b.query) {
									c += "?" + b.query
								}
								if (b.anchor) {
									c += "#" + b.anchor
								}
								b.source = c
							}
							return b.source
						}
					})
})();
(function() {
	var a = tinymce.each;
	tinymce.create("static tinymce.util.Cookie", {
		getHash : function(d) {
			var b = this.get(d), c;
			if (b) {
				a(b.split("&"), function(e) {
					e = e.split("=");
					c = c || {};
					c[unescape(e[0])] = unescape(e[1])
				})
			}
			return c
		},
		setHash : function(j, b, g, f, i, c) {
			var h = "";
			a(b, function(e, d) {
				h += (!h ? "" : "&") + escape(d) + "=" + escape(e)
			});
			this.set(j, h, g, f, i, c)
		},
		get : function(i) {
			var h = document.cookie, g, f = i + "=", d;
			if (!h) {
				return
			}
			d = h.indexOf("; " + f);
			if (d == -1) {
				d = h.indexOf(f);
				if (d != 0) {
					return null
				}
			} else {
				d += 2
			}
			g = h.indexOf(";", d);
			if (g == -1) {
				g = h.length
			}
			return unescape(h.substring(d + f.length, g))
		},
		set : function(i, b, g, f, h, c) {
			document.cookie = i + "=" + escape(b)
					+ ((g) ? "; expires=" + g.toGMTString() : "")
					+ ((f) ? "; path=" + escape(f) : "")
					+ ((h) ? "; domain=" + h : "") + ((c) ? "; secure" : "")
		},
		remove : function(e, b) {
			var c = new Date();
			c.setTime(c.getTime() - 1000);
			this.set(e, "", c, b, c)
		}
	})
})();
(function() {
	function serialize(o, quote) {
		var i, v, t;
		quote = quote || '"';
		if (o == null) {
			return "null"
		}
		t = typeof o;
		if (t == "string") {
			v = "\bb\tt\nn\ff\rr\"\"''\\\\";
			return quote
					+ o.replace(/([\u0080-\uFFFF\x00-\x1f\"\'\\])/g, function(
							a, b) {
						if (quote === '"' && a === "'") {
							return a
						}
						i = v.indexOf(b);
						if (i + 1) {
							return "\\" + v.charAt(i + 1)
						}
						a = b.charCodeAt().toString(16);
						return "\\u" + "0000".substring(a.length) + a
					}) + quote
		}
		if (t == "object") {
			if (o.hasOwnProperty && o instanceof Array) {
				for (i = 0, v = "["; i < o.length; i++) {
					v += (i > 0 ? "," : "") + serialize(o[i], quote)
				}
				return v + "]"
			}
			v = "{";
			for (i in o) {
				if (o.hasOwnProperty(i)) {
					v += typeof o[i] != "function" ? (v.length > 1 ? ","
							+ quote : quote)
							+ i + quote + ":" + serialize(o[i], quote) : ""
				}
			}
			return v + "}"
		}
		return "" + o
	}
	tinymce.util.JSON = {
		serialize : serialize,
		parse : function(s) {
			try {
				return eval("(" + s + ")")
			} catch (ex) {
			}
		}
	}
})();
tinymce.create("static tinymce.util.XHR", {
	send : function(g) {
		var a, e, b = window, h = 0;
		g.scope = g.scope || this;
		g.success_scope = g.success_scope || g.scope;
		g.error_scope = g.error_scope || g.scope;
		g.async = g.async === false ? false : true;
		g.data = g.data || "";
		function d(i) {
			a = 0;
			try {
				a = new ActiveXObject(i)
			} catch (c) {
			}
			return a
		}
		a = b.XMLHttpRequest ? new XMLHttpRequest() : d("Microsoft.XMLHTTP")
				|| d("Msxml2.XMLHTTP");
		if (a) {
			if (a.overrideMimeType) {
				a.overrideMimeType(g.content_type)
			}
			a.open(g.type || (g.data ? "POST" : "GET"), g.url, g.async);
			if (g.content_type) {
				a.setRequestHeader("Content-Type", g.content_type)
			}
			a.setRequestHeader("X-Requested-With", "XMLHttpRequest");
			a.send(g.data);
			function f() {
				if (!g.async || a.readyState == 4 || h++ > 10000) {
					if (g.success && h < 10000 && a.status == 200) {
						g.success.call(g.success_scope, "" + a.responseText, a,
								g)
					} else {
						if (g.error) {
							g.error.call(g.error_scope, h > 10000 ? "TIMED_OUT"
									: "GENERAL", a, g)
						}
					}
					a = null
				} else {
					b.setTimeout(f, 10)
				}
			}
			if (!g.async) {
				return f()
			}
			e = b.setTimeout(f, 10)
		}
	}
});
(function() {
	var c = tinymce.extend, b = tinymce.util.JSON, a = tinymce.util.XHR;
	tinymce.create("tinymce.util.JSONRequest", {
		JSONRequest : function(d) {
			this.settings = c( {}, d);
			this.count = 0
		},
		send : function(f) {
			var e = f.error, d = f.success;
			f = c(this.settings, f);
			f.success = function(h, g) {
				h = b.parse(h);
				if (typeof (h) == "undefined") {
					h = {
						error : "JSON Parse error."
					}
				}
				if (h.error) {
					e.call(f.error_scope || f.scope, h.error, g)
				} else {
					d.call(f.success_scope || f.scope, h.result)
				}
			};
			f.error = function(h, g) {
				if (e) {
					e.call(f.error_scope || f.scope, h, g)
				}
			};
			f.data = b.serialize( {
				id : f.id || "c" + (this.count++),
				method : f.method,
				params : f.params
			});
			f.content_type = "application/json";
			a.send(f)
		},
		"static" : {
			sendRPC : function(d) {
				return new tinymce.util.JSONRequest().send(d)
			}
		}
	})
}());
(function(a) {
	a.VK = {
		DELETE : 46,
		BACKSPACE : 8,
		ENTER : 13,
		TAB : 9,
		SPACEBAR : 32,
		UP : 38,
		DOWN : 40,
		modifierPressed : function(b) {
			return b.shiftKey || b.ctrlKey || b.altKey
		}
	}
})(tinymce);
(function(l) {
	var j = l.VK, k = j.BACKSPACE, h = j.DELETE;
	function c(n) {
		var p = n.dom, o = n.selection;
		n.onKeyDown.add(function(r, v) {
			var q, x, t, u, s;
			s = v.keyCode == h;
			if ((s || v.keyCode == k) && !j.modifierPressed(v)) {
				v.preventDefault();
				q = o.getRng();
				x = p.getParent(q.startContainer, p.isBlock);
				if (s) {
					x = p.getNext(x, p.isBlock)
				}
				if (x) {
					t = x.firstChild;
					while (t && t.nodeType == 3 && t.nodeValue.length == 0) {
						t = t.nextSibling
					}
					if (t && t.nodeName === "SPAN") {
						u = t.cloneNode(false)
					}
				}
				r.getDoc().execCommand(s ? "ForwardDelete" : "Delete", false,
						null);
				x = p.getParent(q.startContainer, p.isBlock);
				l.each(p.select("span.Apple-style-span,font.Apple-style-span",
						x), function(y) {
					var z = o.getBookmark();
					if (u) {
						p.replace(u.cloneNode(false), y, true)
					} else {
						p.remove(y, true)
					}
					o.moveToBookmark(z)
				})
			}
		})
	}
	function d(n) {
		function o(r) {
			var q = n.dom.create("body");
			var s = r.cloneContents();
			q.appendChild(s);
			return n.selection.serializer.serialize(q, {
				format : "html"
			})
		}
		function p(q) {
			var s = o(q);
			var t = n.dom.createRng();
			t.selectNode(n.getBody());
			var r = o(t);
			return s === r
		}
		n.onKeyDown.addToTop(function(r, t) {
			var s = t.keyCode;
			if (s == h || s == k) {
				var q = r.selection.getRng(true);
				if (!q.collapsed && p(q)) {
					r.setContent("", {
						format : "raw"
					});
					r.nodeChanged();
					t.preventDefault()
				}
			}
		})
	}
	function b(n) {
		n.dom.bind(n.getDoc(), "focusin", function() {
			n.selection.setRng(n.selection.getRng())
		})
	}
	function e(n) {
		n.onKeyDown.add(function(o, r) {
			if (r.keyCode === k) {
				if (o.selection.isCollapsed()
						&& o.selection.getRng(true).startOffset === 0) {
					var q = o.selection.getNode();
					var p = q.previousSibling;
					if (p && p.nodeName && p.nodeName.toLowerCase() === "hr") {
						o.dom.remove(p);
						l.dom.Event.cancel(r)
					}
				}
			}
		})
	}
	function g(n) {
		if (!Range.prototype.getClientRects) {
			n.onMouseDown.add(function(p, q) {
				if (q.target.nodeName === "HTML") {
					var o = p.getBody();
					o.blur();
					setTimeout(function() {
						o.focus()
					}, 0)
				}
			})
		}
	}
	function f(n) {
		n.onClick.add(function(o, p) {
			p = p.target;
			if (/^(IMG|HR)$/.test(p.nodeName)) {
				o.selection.getSel().setBaseAndExtent(p, 0, p, 1)
			}
			if (p.nodeName == "A" && o.dom.hasClass(p, "mceItemAnchor")) {
				o.selection.select(p)
			}
			o.nodeChanged()
		})
	}
	function i(n) {
		n.onKeyDown.add(function(o, p) {
			function q(r) {
				var s = r.selection.getNode();
				var t = "h1,h2,h3,h4,h5,h6";
				return r.dom.is(s, t) || r.dom.getParent(s, t) !== null
			}
			if (p.keyCode === j.ENTER && !j.modifierPressed(p) && q(o)) {
				setTimeout(function() {
					var r = o.selection.getNode();
					if (o.dom.is(r, "p")) {
						o.dom.setAttrib(r, "style", null);
						o.execCommand("mceCleanup")
					}
				}, 0)
			}
		})
	}
	function m(n) {
		var p, o;
		n.dom.bind(n.getDoc(), "selectionchange", function() {
			if (o) {
				clearTimeout(o);
				o = 0
			}
			o = window.setTimeout(function() {
				var q = n.selection.getRng();
				if (!p || !l.dom.RangeUtils.compareRanges(q, p)) {
					n.nodeChanged();
					p = q
				}
			}, 50)
		})
	}
	function a(n) {
		document.body.setAttribute("role", "application")
	}
	l.create("tinymce.util.Quirks", {
		Quirks : function(n) {
			if (l.isWebKit) {
				c(n);
				d(n);
				b(n);
				f(n);
				if (l.isIDevice) {
					m(n)
				}
			}
			if (l.isIE) {
				e(n);
				d(n);
				a(n);
				i(n)
			}
			if (l.isGecko) {
				e(n);
				g(n)
			}
		}
	})
})(tinymce);
(function(j) {
	var a, g, d, k = /[&<>\"\u007E-\uD7FF\uE000-\uFFEF]|[\uD800-\uDBFF][\uDC00-\uDFFF]/g, b = /[<>&\u007E-\uD7FF\uE000-\uFFEF]|[\uD800-\uDBFF][\uDC00-\uDFFF]/g, f = /[<>&\"\']/g, c = /&(#x|#)?([\w]+);/g, i = {
		128 : "\u20AC",
		130 : "\u201A",
		131 : "\u0192",
		132 : "\u201E",
		133 : "\u2026",
		134 : "\u2020",
		135 : "\u2021",
		136 : "\u02C6",
		137 : "\u2030",
		138 : "\u0160",
		139 : "\u2039",
		140 : "\u0152",
		142 : "\u017D",
		145 : "\u2018",
		146 : "\u2019",
		147 : "\u201C",
		148 : "\u201D",
		149 : "\u2022",
		150 : "\u2013",
		151 : "\u2014",
		152 : "\u02DC",
		153 : "\u2122",
		154 : "\u0161",
		155 : "\u203A",
		156 : "\u0153",
		158 : "\u017E",
		159 : "\u0178"
	};
	g = {
		'"' : "&quot;",
		"'" : "&#39;",
		"<" : "&lt;",
		">" : "&gt;",
		"&" : "&amp;"
	};
	d = {
		"&lt;" : "<",
		"&gt;" : ">",
		"&amp;" : "&",
		"&quot;" : '"',
		"&apos;" : "'"
	};
	function h(l) {
		var m;
		m = document.createElement("div");
		m.innerHTML = l;
		return m.textContent || m.innerText || l
	}
	function e(m, p) {
		var n, o, l, q = {};
		if (m) {
			m = m.split(",");
			p = p || 10;
			for (n = 0; n < m.length; n += 2) {
				o = String.fromCharCode(parseInt(m[n], p));
				if (!g[o]) {
					l = "&" + m[n + 1] + ";";
					q[o] = l;
					q[l] = o
				}
			}
			return q
		}
	}
	a = e(
			"50,nbsp,51,iexcl,52,cent,53,pound,54,curren,55,yen,56,brvbar,57,sect,58,uml,59,copy,5a,ordf,5b,laquo,5c,not,5d,shy,5e,reg,5f,macr,5g,deg,5h,plusmn,5i,sup2,5j,sup3,5k,acute,5l,micro,5m,para,5n,middot,5o,cedil,5p,sup1,5q,ordm,5r,raquo,5s,frac14,5t,frac12,5u,frac34,5v,iquest,60,Agrave,61,Aacute,62,Acirc,63,Atilde,64,Auml,65,Aring,66,AElig,67,Ccedil,68,Egrave,69,Eacute,6a,Ecirc,6b,Euml,6c,Igrave,6d,Iacute,6e,Icirc,6f,Iuml,6g,ETH,6h,Ntilde,6i,Ograve,6j,Oacute,6k,Ocirc,6l,Otilde,6m,Ouml,6n,times,6o,Oslash,6p,Ugrave,6q,Uacute,6r,Ucirc,6s,Uuml,6t,Yacute,6u,THORN,6v,szlig,70,agrave,71,aacute,72,acirc,73,atilde,74,auml,75,aring,76,aelig,77,ccedil,78,egrave,79,eacute,7a,ecirc,7b,euml,7c,igrave,7d,iacute,7e,icirc,7f,iuml,7g,eth,7h,ntilde,7i,ograve,7j,oacute,7k,ocirc,7l,otilde,7m,ouml,7n,divide,7o,oslash,7p,ugrave,7q,uacute,7r,ucirc,7s,uuml,7t,yacute,7u,thorn,7v,yuml,ci,fnof,sh,Alpha,si,Beta,sj,Gamma,sk,Delta,sl,Epsilon,sm,Zeta,sn,Eta,so,Theta,sp,Iota,sq,Kappa,sr,Lambda,ss,Mu,st,Nu,su,Xi,sv,Omicron,t0,Pi,t1,Rho,t3,Sigma,t4,Tau,t5,Upsilon,t6,Phi,t7,Chi,t8,Psi,t9,Omega,th,alpha,ti,beta,tj,gamma,tk,delta,tl,epsilon,tm,zeta,tn,eta,to,theta,tp,iota,tq,kappa,tr,lambda,ts,mu,tt,nu,tu,xi,tv,omicron,u0,pi,u1,rho,u2,sigmaf,u3,sigma,u4,tau,u5,upsilon,u6,phi,u7,chi,u8,psi,u9,omega,uh,thetasym,ui,upsih,um,piv,812,bull,816,hellip,81i,prime,81j,Prime,81u,oline,824,frasl,88o,weierp,88h,image,88s,real,892,trade,89l,alefsym,8cg,larr,8ch,uarr,8ci,rarr,8cj,darr,8ck,harr,8dl,crarr,8eg,lArr,8eh,uArr,8ei,rArr,8ej,dArr,8ek,hArr,8g0,forall,8g2,part,8g3,exist,8g5,empty,8g7,nabla,8g8,isin,8g9,notin,8gb,ni,8gf,prod,8gh,sum,8gi,minus,8gn,lowast,8gq,radic,8gt,prop,8gu,infin,8h0,ang,8h7,and,8h8,or,8h9,cap,8ha,cup,8hb,int,8hk,there4,8hs,sim,8i5,cong,8i8,asymp,8j0,ne,8j1,equiv,8j4,le,8j5,ge,8k2,sub,8k3,sup,8k4,nsub,8k6,sube,8k7,supe,8kl,oplus,8kn,otimes,8l5,perp,8m5,sdot,8o8,lceil,8o9,rceil,8oa,lfloor,8ob,rfloor,8p9,lang,8pa,rang,9ea,loz,9j0,spades,9j3,clubs,9j5,hearts,9j6,diams,ai,OElig,aj,oelig,b0,Scaron,b1,scaron,bo,Yuml,m6,circ,ms,tilde,802,ensp,803,emsp,809,thinsp,80c,zwnj,80d,zwj,80e,lrm,80f,rlm,80j,ndash,80k,mdash,80o,lsquo,80p,rsquo,80q,sbquo,80s,ldquo,80t,rdquo,80u,bdquo,810,dagger,811,Dagger,81g,permil,81p,lsaquo,81q,rsaquo,85c,euro",
			32);
	j.html = j.html || {};
	j.html.Entities = {
		encodeRaw : function(m, l) {
			return m.replace(l ? k : b, function(n) {
				return g[n] || n
			})
		},
		encodeAllRaw : function(l) {
			return ("" + l).replace(f, function(m) {
				return g[m] || m
			})
		},
		encodeNumeric : function(m, l) {
			return m.replace(l ? k : b, function(n) {
				if (n.length > 1) {
					return "&#"
							+ (((n.charCodeAt(0) - 55296) * 1024)
									+ (n.charCodeAt(1) - 56320) + 65536) + ";"
				}
				return g[n] || "&#" + n.charCodeAt(0) + ";"
			})
		},
		encodeNamed : function(n, l, m) {
			m = m || a;
			return n.replace(l ? k : b, function(o) {
				return g[o] || m[o] || o
			})
		},
		getEncodeFunc : function(l, o) {
			var p = j.html.Entities;
			o = e(o) || a;
			function m(r, q) {
				return r.replace(q ? k : b, function(s) {
					return g[s] || o[s] || "&#" + s.charCodeAt(0) + ";" || s
				})
			}
			function n(r, q) {
				return p.encodeNamed(r, q, o)
			}
			l = j.makeMap(l.replace(/\+/g, ","));
			if (l.named && l.numeric) {
				return m
			}
			if (l.named) {
				if (o) {
					return n
				}
				return p.encodeNamed
			}
			if (l.numeric) {
				return p.encodeNumeric
			}
			return p.encodeRaw
		},
		decode : function(l) {
			return l.replace(c, function(n, m, o) {
				if (m) {
					o = parseInt(o, m.length === 2 ? 16 : 10);
					if (o > 65535) {
						o -= 65536;
						return String.fromCharCode(55296 + (o >> 10),
								56320 + (o & 1023))
					} else {
						return i[o] || String.fromCharCode(o)
					}
				}
				return d[n] || a[n] || h(n)
			})
		}
	}
})(tinymce);
tinymce.html.Styles = function(d, f) {
	var k = /rgb\s*\(\s*([0-9]+)\s*,\s*([0-9]+)\s*,\s*([0-9]+)\s*\)/gi, h = /(?:url(?:(?:\(\s*\"([^\"]+)\"\s*\))|(?:\(\s*\'([^\']+)\'\s*\))|(?:\(\s*([^)\s]+)\s*\))))|(?:\'([^\']+)\')|(?:\"([^\"]+)\")/gi, b = /\s*([^:]+):\s*([^;]+);?/g, l = /\s+$/, m = /rgb/, e, g, a = {}, j;
	d = d || {};
	j = "\\\" \\' \\; \\: ; : \uFEFF".split(" ");
	for (g = 0; g < j.length; g++) {
		a[j[g]] = "\uFEFF" + g;
		a["\uFEFF" + g] = j[g]
	}
	function c(n, q, p, i) {
		function o(r) {
			r = parseInt(r).toString(16);
			return r.length > 1 ? r : "0" + r
		}
		return "#" + o(q) + o(p) + o(i)
	}
	return {
		toHex : function(i) {
			return i.replace(k, c)
		},
		parse : function(r) {
			var y = {}, p, n, v, q, u = d.url_converter, x = d.url_converter_scope
					|| this;
			function o(C, F) {
				var E, B, A, D;
				E = y[C + "-top" + F];
				if (!E) {
					return
				}
				B = y[C + "-right" + F];
				if (E != B) {
					return
				}
				A = y[C + "-bottom" + F];
				if (B != A) {
					return
				}
				D = y[C + "-left" + F];
				if (A != D) {
					return
				}
				y[C + F] = D;
				delete y[C + "-top" + F];
				delete y[C + "-right" + F];
				delete y[C + "-bottom" + F];
				delete y[C + "-left" + F]
			}
			function t(B) {
				var C = y[B], A;
				if (!C || C.indexOf(" ") < 0) {
					return
				}
				C = C.split(" ");
				A = C.length;
				while (A--) {
					if (C[A] !== C[0]) {
						return false
					}
				}
				y[B] = C[0];
				return true
			}
			function z(C, B, A, D) {
				if (!t(B)) {
					return
				}
				if (!t(A)) {
					return
				}
				if (!t(D)) {
					return
				}
				y[C] = y[B] + " " + y[A] + " " + y[D];
				delete y[B];
				delete y[A];
				delete y[D]
			}
			function s(A) {
				q = true;
				return a[A]
			}
			function i(B, A) {
				if (q) {
					B = B.replace(/\uFEFF[0-9]/g, function(C) {
						return a[C]
					})
				}
				if (!A) {
					B = B.replace(/\\([\'\";:])/g, "$1")
				}
				return B
			}
			if (r) {
				r = r.replace(/\\[\"\';:\uFEFF]/g, s).replace(
						/\"[^\"]+\"|\'[^\']+\'/g, function(A) {
							return A.replace(/[;:]/g, s)
						});
				while (p = b.exec(r)) {
					n = p[1].replace(l, "").toLowerCase();
					v = p[2].replace(l, "");
					if (n && v.length > 0) {
						if (n === "font-weight" && v === "700") {
							v = "bold"
						} else {
							if (n === "color" || n === "background-color") {
								v = v.toLowerCase()
							}
						}
						v = v.replace(k, c);
						v = v.replace(h, function(B, A, E, D, F, C) {
							F = F || C;
							if (F) {
								F = i(F);
								return "'" + F.replace(/\'/g, "\\'") + "'"
							}
							A = i(A || E || D);
							if (u) {
								A = u.call(x, A, "style")
							}
							return "url('" + A.replace(/\'/g, "\\'") + "')"
						});
						y[n] = q ? i(v, true) : v
					}
					b.lastIndex = p.index + p[0].length
				}
				o("border", "");
				o("border", "-width");
				o("border", "-color");
				o("border", "-style");
				o("padding", "");
				o("margin", "");
				z("border", "border-width", "border-style", "border-color");
				if (y.border === "medium none") {
					delete y.border
				}
			}
			return y
		},
		serialize : function(p, r) {
			var o = "", n, q;
			function i(t) {
				var x, u, s, v;
				x = f.styles[t];
				if (x) {
					for (u = 0, s = x.length; u < s; u++) {
						t = x[u];
						v = p[t];
						if (v !== e && v.length > 0) {
							o += (o.length > 0 ? " " : "") + t + ": " + v + ";"
						}
					}
				}
			}
			if (r && f && f.styles) {
				i("*");
				i(r)
			} else {
				for (n in p) {
					q = p[n];
					if (q !== e && q.length > 0) {
						o += (o.length > 0 ? " " : "") + n + ": " + q + ";"
					}
				}
			}
			return o
		}
	}
};
(function(m) {
	var h = {}, j, l, g, f, c = {}, b, e, d = m.makeMap, k = m.each;
	function i(o, n) {
		return o.split(n || ",")
	}
	function a(r, q) {
		var o, p = {};
		function n(s) {
			return s.replace(/[A-Z]+/g, function(t) {
				return n(r[t])
			})
		}
		for (o in r) {
			if (r.hasOwnProperty(o)) {
				r[o] = n(r[o])
			}
		}
		n(q).replace(/#/g, "#text").replace(/(\w+)\[([^\]]+)\]\[([^\]]*)\]/g,
				function(v, t, s, u) {
					s = i(s, "|");
					p[t] = {
						attributes : d(s),
						attributesOrder : s,
						children : d(u, "|", {
							"#comment" : {}
						})
					}
				});
		return p
	}
	l = "h1,h2,h3,h4,h5,h6,hr,p,div,address,pre,form,table,tbody,thead,tfoot,th,tr,td,li,ol,ul,caption,blockquote,center,dl,dt,dd,dir,fieldset,noscript,menu,isindex,samp,header,footer,article,section,hgroup";
	l = d(l, ",", d(l.toUpperCase()));
	h = a(
			{
				Z : "H|K|N|O|P",
				Y : "X|form|R|Q",
				ZG : "E|span|width|align|char|charoff|valign",
				X : "p|T|div|U|W|isindex|fieldset|table",
				ZF : "E|align|char|charoff|valign",
				W : "pre|hr|blockquote|address|center|noframes",
				ZE : "abbr|axis|headers|scope|rowspan|colspan|align|char|charoff|valign|nowrap|bgcolor|width|height",
				ZD : "[E][S]",
				U : "ul|ol|dl|menu|dir",
				ZC : "p|Y|div|U|W|table|br|span|bdo|object|applet|img|map|K|N|Q",
				T : "h1|h2|h3|h4|h5|h6",
				ZB : "X|S|Q",
				S : "R|P",
				ZA : "a|G|J|M|O|P",
				R : "a|H|K|N|O",
				Q : "noscript|P",
				P : "ins|del|script",
				O : "input|select|textarea|label|button",
				N : "M|L",
				M : "em|strong|dfn|code|q|samp|kbd|var|cite|abbr|acronym",
				L : "sub|sup",
				K : "J|I",
				J : "tt|i|b|u|s|strike",
				I : "big|small|font|basefont",
				H : "G|F",
				G : "br|span|bdo",
				F : "object|applet|img|map|iframe",
				E : "A|B|C",
				D : "accesskey|tabindex|onfocus|onblur",
				C : "onclick|ondblclick|onmousedown|onmouseup|onmouseover|onmousemove|onmouseout|onkeypress|onkeydown|onkeyup",
				B : "lang|xml:lang|dir",
				A : "id|class|style|title"
			},
			"script[id|charset|type|language|src|defer|xml:space][]style[B|id|type|media|title|xml:space][]object[E|declare|classid|codebase|data|type|codetype|archive|standby|width|height|usemap|name|tabindex|align|border|hspace|vspace][#|param|Y]param[id|name|value|valuetype|type][]p[E|align][#|S]a[E|D|charset|type|name|href|hreflang|rel|rev|shape|coords|target][#|Z]br[A|clear][]span[E][#|S]bdo[A|C|B][#|S]applet[A|codebase|archive|code|object|alt|name|width|height|align|hspace|vspace][#|param|Y]h1[E|align][#|S]img[E|src|alt|name|longdesc|width|height|usemap|ismap|align|border|hspace|vspace][]map[B|C|A|name][X|form|Q|area]h2[E|align][#|S]iframe[A|longdesc|name|src|frameborder|marginwidth|marginheight|scrolling|align|width|height][#|Y]h3[E|align][#|S]tt[E][#|S]i[E][#|S]b[E][#|S]u[E][#|S]s[E][#|S]strike[E][#|S]big[E][#|S]small[E][#|S]font[A|B|size|color|face][#|S]basefont[id|size|color|face][]em[E][#|S]strong[E][#|S]dfn[E][#|S]code[E][#|S]q[E|cite][#|S]samp[E][#|S]kbd[E][#|S]var[E][#|S]cite[E][#|S]abbr[E][#|S]acronym[E][#|S]sub[E][#|S]sup[E][#|S]input[E|D|type|name|value|checked|disabled|readonly|size|maxlength|src|alt|usemap|onselect|onchange|accept|align][]select[E|name|size|multiple|disabled|tabindex|onfocus|onblur|onchange][optgroup|option]optgroup[E|disabled|label][option]option[E|selected|disabled|label|value][]textarea[E|D|name|rows|cols|disabled|readonly|onselect|onchange][]label[E|for|accesskey|onfocus|onblur][#|S]button[E|D|name|value|type|disabled][#|p|T|div|U|W|table|G|object|applet|img|map|K|N|Q]h4[E|align][#|S]ins[E|cite|datetime][#|Y]h5[E|align][#|S]del[E|cite|datetime][#|Y]h6[E|align][#|S]div[E|align][#|Y]ul[E|type|compact][li]li[E|type|value][#|Y]ol[E|type|compact|start][li]dl[E|compact][dt|dd]dt[E][#|S]dd[E][#|Y]menu[E|compact][li]dir[E|compact][li]pre[E|width|xml:space][#|ZA]hr[E|align|noshade|size|width][]blockquote[E|cite][#|Y]address[E][#|S|p]center[E][#|Y]noframes[E][#|Y]isindex[A|B|prompt][]fieldset[E][#|legend|Y]legend[E|accesskey|align][#|S]table[E|summary|width|border|frame|rules|cellspacing|cellpadding|align|bgcolor][caption|col|colgroup|thead|tfoot|tbody|tr]caption[E|align][#|S]col[ZG][]colgroup[ZG][col]thead[ZF][tr]tr[ZF|bgcolor][th|td]th[E|ZE][#|Y]form[E|action|method|name|enctype|onsubmit|onreset|accept|accept-charset|target][#|X|R|Q]noscript[E][#|Y]td[E|ZE][#|Y]tfoot[ZF][tr]tbody[ZF][tr]area[E|D|shape|coords|href|nohref|alt|target][]base[id|href|target][]body[E|onload|onunload|background|bgcolor|text|link|vlink|alink][#|Y]");
	j = d("checked,compact,declare,defer,disabled,ismap,multiple,nohref,noresize,noshade,nowrap,readonly,selected,autoplay,loop,controls");
	g = d("area,base,basefont,br,col,frame,hr,img,input,isindex,link,meta,param,embed,source");
	f = m.extend(d("td,th,iframe,video,audio,object"), g);
	b = d("pre,script,style,textarea");
	e = d("colgroup,dd,dt,li,options,p,td,tfoot,th,thead,tr");
	m.html.Schema = function(r) {
		var A = this, n = {}, o = {}, y = [], q, p;
		r = r || {};
		if (r.verify_html === false) {
			r.valid_elements = "*[*]"
		}
		if (r.valid_styles) {
			q = {};
			k(r.valid_styles, function(C, B) {
				q[B] = m.explode(C)
			})
		}
		p = r.whitespace_elements ? d(r.whitespace_elements) : b;
		function z(B) {
			return new RegExp("^" + B.replace(/([?+*])/g, ".$1") + "$")
		}
		function t(I) {
			var H, D, W, S, X, C, F, R, U, N, V, Z, L, G, T, B, P, E, Y, aa, M, Q, K = /^([#+-])?([^\[\/]+)(?:\/([^\[]+))?(?:\[([^\]]+)\])?$/, O = /^([!\-])?(\w+::\w+|[^=:<]+)?(?:([=:<])(.*))?$/, J = /[*?+]/;
			if (I) {
				I = i(I);
				if (n["@"]) {
					P = n["@"].attributes;
					E = n["@"].attributesOrder
				}
				for (H = 0, D = I.length; H < D; H++) {
					C = K.exec(I[H]);
					if (C) {
						T = C[1];
						N = C[2];
						B = C[3];
						U = C[4];
						L = {};
						G = [];
						F = {
							attributes : L,
							attributesOrder : G
						};
						if (T === "#") {
							F.paddEmpty = true
						}
						if (T === "-") {
							F.removeEmpty = true
						}
						if (P) {
							for (aa in P) {
								L[aa] = P[aa]
							}
							G.push.apply(G, E)
						}
						if (U) {
							U = i(U, "|");
							for (W = 0, S = U.length; W < S; W++) {
								C = O.exec(U[W]);
								if (C) {
									R = {};
									Z = C[1];
									V = C[2].replace(/::/g, ":");
									T = C[3];
									Q = C[4];
									if (Z === "!") {
										F.attributesRequired = F.attributesRequired
												|| [];
										F.attributesRequired.push(V);
										R.required = true
									}
									if (Z === "-") {
										delete L[V];
										G.splice(m.inArray(G, V), 1);
										continue
									}
									if (T) {
										if (T === "=") {
											F.attributesDefault = F.attributesDefault
													|| [];
											F.attributesDefault.push( {
												name : V,
												value : Q
											});
											R.defaultValue = Q
										}
										if (T === ":") {
											F.attributesForced = F.attributesForced
													|| [];
											F.attributesForced.push( {
												name : V,
												value : Q
											});
											R.forcedValue = Q
										}
										if (T === "<") {
											R.validValues = d(Q, "?")
										}
									}
									if (J.test(V)) {
										F.attributePatterns = F.attributePatterns
												|| [];
										R.pattern = z(V);
										F.attributePatterns.push(R)
									} else {
										if (!L[V]) {
											G.push(V)
										}
										L[V] = R
									}
								}
							}
						}
						if (!P && N == "@") {
							P = L;
							E = G
						}
						if (B) {
							F.outputName = N;
							n[B] = F
						}
						if (J.test(N)) {
							F.pattern = z(N);
							y.push(F)
						} else {
							n[N] = F
						}
					}
				}
			}
		}
		function v(B) {
			n = {};
			y = [];
			t(B);
			k(h, function(D, C) {
				o[C] = D.children
			})
		}
		function s(C) {
			var B = /^(~)?(.+)$/;
			if (C) {
				k(i(C),
						function(G) {
							var E = B.exec(G), F = E[1] === "~", H = F ? "span"
									: "div", D = E[2];
							o[D] = o[H];
							c[D] = H;
							if (!F) {
								l[D] = {}
							}
							k(o, function(I, J) {
								if (I[H]) {
									I[D] = I[H]
								}
							})
						})
			}
		}
		function u(C) {
			var B = /^([+\-]?)(\w+)\[([^\]]+)\]$/;
			if (C) {
				k(i(C), function(G) {
					var F = B.exec(G), D, E;
					if (F) {
						E = F[1];
						if (E) {
							D = o[F[2]]
						} else {
							D = o[F[2]] = {
								"#comment" : {}
							}
						}
						D = o[F[2]];
						k(i(F[3], "|"), function(H) {
							if (E === "-") {
								delete D[H]
							} else {
								D[H] = {}
							}
						})
					}
				})
			}
		}
		function x(B) {
			var D = n[B], C;
			if (D) {
				return D
			}
			C = y.length;
			while (C--) {
				D = y[C];
				if (D.pattern.test(B)) {
					return D
				}
			}
		}
		if (!r.valid_elements) {
			k(h, function(C, B) {
				n[B] = {
					attributes : C.attributes,
					attributesOrder : C.attributesOrder
				};
				o[B] = C.children
			});
			k(i("strong/b,em/i"), function(B) {
				B = i(B, "/");
				n[B[1]].outputName = B[0]
			});
			n.img.attributesDefault = [ {
				name : "alt",
				value : ""
			} ];
			k(i("ol,ul,sub,sup,blockquote,span,font,a,table,tbody,tr"),
					function(B) {
						n[B].removeEmpty = true
					});
			k(i("p,h1,h2,h3,h4,h5,h6,th,td,pre,div,address,caption"), function(
					B) {
				n[B].paddEmpty = true
			})
		} else {
			v(r.valid_elements)
		}
		s(r.custom_elements);
		u(r.valid_children);
		t(r.extended_valid_elements);
		u("+ol[ul|ol],+ul[ul|ol]");
		if (!x("span")) {
			t("span[!data-mce-type|*]")
		}
		if (r.invalid_elements) {
			m.each(m.explode(r.invalid_elements), function(B) {
				if (n[B]) {
					delete n[B]
				}
			})
		}
		A.children = o;
		A.styles = q;
		A.getBoolAttrs = function() {
			return j
		};
		A.getBlockElements = function() {
			return l
		};
		A.getShortEndedElements = function() {
			return g
		};
		A.getSelfClosingElements = function() {
			return e
		};
		A.getNonEmptyElements = function() {
			return f
		};
		A.getWhiteSpaceElements = function() {
			return p
		};
		A.isValidChild = function(B, D) {
			var C = o[B];
			return !!(C && C[D])
		};
		A.getElementRule = x;
		A.getCustomElements = function() {
			return c
		};
		A.addValidElements = t;
		A.setValidElements = v;
		A.addCustomElements = s;
		A.addValidChildren = u
	};
	m.html.Schema.boolAttrMap = j;
	m.html.Schema.blockElementsMap = l
})(tinymce);
(function(a) {
	a.html.SaxParser = function(c, e) {
		var b = this, d = function() {
		};
		c = c || {};
		b.schema = e = e || new a.html.Schema();
		if (c.fix_self_closing !== false) {
			c.fix_self_closing = true
		}
		a.each("comment cdata text start end pi doctype".split(" "),
				function(f) {
					if (f) {
						b[f] = c[f] || d
					}
				});
		b.parse = function(D) {
			var n = this, g, F = 0, H, A, z = [], M, P, B, q, y, r, L, G, N, u, m, k, s, Q, o, O, E, R, K, f, I, l, C, J, h, v = 0, j = a.html.Entities.decode, x, p;
			function t(S) {
				var U, T;
				U = z.length;
				while (U--) {
					if (z[U].name === S) {
						break
					}
				}
				if (U >= 0) {
					for (T = z.length - 1; T >= U; T--) {
						S = z[T];
						if (S.valid) {
							n.end(S.name)
						}
					}
					z.length = U
				}
			}
			l = new RegExp(
					"<(?:(?:!--([\\w\\W]*?)-->)|(?:!\\[CDATA\\[([\\w\\W]*?)\\]\\]>)|(?:!DOCTYPE([\\w\\W]*?)>)|(?:\\?([^\\s\\/<>]+) ?([\\w\\W]*?)[?/]>)|(?:\\/([^>]+)>)|(?:([^\\s\\/<>]+)((?:\\s+[^\"'>]+(?:(?:\"[^\"]*\")|(?:'[^']*')|[^>]*))*|\\/)>))",
					"g");
			C = /([\w:\-]+)(?:\s*=\s*(?:(?:\"((?:\\.|[^\"])*)\")|(?:\'((?:\\.|[^\'])*)\')|([^>\s]+)))?/g;
			J = {
				script : /<\/script[^>]*>/gi,
				style : /<\/style[^>]*>/gi,
				noscript : /<\/noscript[^>]*>/gi
			};
			L = e.getShortEndedElements();
			I = e.getSelfClosingElements();
			G = e.getBoolAttrs();
			u = c.validate;
			r = c.remove_internals;
			x = c.fix_self_closing;
			p = a.isIE;
			o = /^:/;
			while (g = l.exec(D)) {
				if (F < g.index) {
					n.text(j(D.substr(F, g.index - F)))
				}
				if (H = g[6]) {
					H = H.toLowerCase();
					if (p && o.test(H)) {
						H = H.substr(1)
					}
					t(H)
				} else {
					if (H = g[7]) {
						H = H.toLowerCase();
						if (p && o.test(H)) {
							H = H.substr(1)
						}
						N = H in L;
						if (x && I[H] && z.length > 0
								&& z[z.length - 1].name === H) {
							t(H)
						}
						if (!u || (m = e.getElementRule(H))) {
							k = true;
							if (u) {
								O = m.attributes;
								E = m.attributePatterns
							}
							if (Q = g[8]) {
								y = Q.indexOf("data-mce-type") !== -1;
								if (y && r) {
									k = false
								}
								M = [];
								M.map = {};
								Q.replace(C, function(T, S, X, W, V) {
									var Y, U;
									S = S.toLowerCase();
									X = S in G ? S : j(X || W || V || "");
									if (u && !y && S.indexOf("data-") !== 0) {
										Y = O[S];
										if (!Y && E) {
											U = E.length;
											while (U--) {
												Y = E[U];
												if (Y.pattern.test(S)) {
													break
												}
											}
											if (U === -1) {
												Y = null
											}
										}
										if (!Y) {
											return
										}
										if (Y.validValues
												&& !(X in Y.validValues)) {
											return
										}
									}
									M.map[S] = X;
									M.push( {
										name : S,
										value : X
									})
								})
							} else {
								M = [];
								M.map = {}
							}
							if (u && !y) {
								R = m.attributesRequired;
								K = m.attributesDefault;
								f = m.attributesForced;
								if (f) {
									P = f.length;
									while (P--) {
										s = f[P];
										q = s.name;
										h = s.value;
										if (h === "{$uid}") {
											h = "mce_" + v++
										}
										M.map[q] = h;
										M.push( {
											name : q,
											value : h
										})
									}
								}
								if (K) {
									P = K.length;
									while (P--) {
										s = K[P];
										q = s.name;
										if (!(q in M.map)) {
											h = s.value;
											if (h === "{$uid}") {
												h = "mce_" + v++
											}
											M.map[q] = h;
											M.push( {
												name : q,
												value : h
											})
										}
									}
								}
								if (R) {
									P = R.length;
									while (P--) {
										if (R[P] in M.map) {
											break
										}
									}
									if (P === -1) {
										k = false
									}
								}
								if (M.map["data-mce-bogus"]) {
									k = false
								}
							}
							if (k) {
								n.start(H, M, N)
							}
						} else {
							k = false
						}
						if (A = J[H]) {
							A.lastIndex = F = g.index + g[0].length;
							if (g = A.exec(D)) {
								if (k) {
									B = D.substr(F, g.index - F)
								}
								F = g.index + g[0].length
							} else {
								B = D.substr(F);
								F = D.length
							}
							if (k && B.length > 0) {
								n.text(B, true)
							}
							if (k) {
								n.end(H)
							}
							l.lastIndex = F;
							continue
						}
						if (!N) {
							if (!Q || Q.indexOf("/") != Q.length - 1) {
								z.push( {
									name : H,
									valid : k
								})
							} else {
								if (k) {
									n.end(H)
								}
							}
						}
					} else {
						if (H = g[1]) {
							n.comment(H)
						} else {
							if (H = g[2]) {
								n.cdata(H)
							} else {
								if (H = g[3]) {
									n.doctype(H)
								} else {
									if (H = g[4]) {
										n.pi(H, g[5])
									}
								}
							}
						}
					}
				}
				F = g.index + g[0].length
			}
			if (F < D.length) {
				n.text(j(D.substr(F)))
			}
			for (P = z.length - 1; P >= 0; P--) {
				H = z[P];
				if (H.valid) {
					n.end(H.name)
				}
			}
		}
	}
})(tinymce);
(function(d) {
	var c = /^[ \t\r\n]*$/, e = {
		"#text" : 3,
		"#comment" : 8,
		"#cdata" : 4,
		"#pi" : 7,
		"#doctype" : 10,
		"#document-fragment" : 11
	};
	function a(k, l, j) {
		var i, h, f = j ? "lastChild" : "firstChild", g = j ? "prev" : "next";
		if (k[f]) {
			return k[f]
		}
		if (k !== l) {
			i = k[g];
			if (i) {
				return i
			}
			for (h = k.parent; h && h !== l; h = h.parent) {
				i = h[g];
				if (i) {
					return i
				}
			}
		}
	}
	function b(f, g) {
		this.name = f;
		this.type = g;
		if (g === 1) {
			this.attributes = [];
			this.attributes.map = {}
		}
	}
	d
			.extend(
					b.prototype,
					{
						replace : function(g) {
							var f = this;
							if (g.parent) {
								g.remove()
							}
							f.insert(g, f);
							f.remove();
							return f
						},
						attr : function(h, l) {
							var f = this, g, j, k;
							if (typeof h !== "string") {
								for (j in h) {
									f.attr(j, h[j])
								}
								return f
							}
							if (g = f.attributes) {
								if (l !== k) {
									if (l === null) {
										if (h in g.map) {
											delete g.map[h];
											j = g.length;
											while (j--) {
												if (g[j].name === h) {
													g = g.splice(j, 1);
													return f
												}
											}
										}
										return f
									}
									if (h in g.map) {
										j = g.length;
										while (j--) {
											if (g[j].name === h) {
												g[j].value = l;
												break
											}
										}
									} else {
										g.push( {
											name : h,
											value : l
										})
									}
									g.map[h] = l;
									return f
								} else {
									return g.map[h]
								}
							}
						},
						clone : function() {
							var g = this, n = new b(g.name, g.type), h, f, m, j, k;
							if (m = g.attributes) {
								k = [];
								k.map = {};
								for (h = 0, f = m.length; h < f; h++) {
									j = m[h];
									if (j.name !== "id") {
										k[k.length] = {
											name : j.name,
											value : j.value
										};
										k.map[j.name] = j.value
									}
								}
								n.attributes = k
							}
							n.value = g.value;
							n.shortEnded = g.shortEnded;
							return n
						},
						wrap : function(g) {
							var f = this;
							f.parent.insert(g, f);
							g.append(f);
							return f
						},
						unwrap : function() {
							var f = this, h, g;
							for (h = f.firstChild; h;) {
								g = h.next;
								f.insert(h, f, true);
								h = g
							}
							f.remove()
						},
						remove : function() {
							var f = this, h = f.parent, g = f.next, i = f.prev;
							if (h) {
								if (h.firstChild === f) {
									h.firstChild = g;
									if (g) {
										g.prev = null
									}
								} else {
									i.next = g
								}
								if (h.lastChild === f) {
									h.lastChild = i;
									if (i) {
										i.next = null
									}
								} else {
									g.prev = i
								}
								f.parent = f.next = f.prev = null
							}
							return f
						},
						append : function(h) {
							var f = this, g;
							if (h.parent) {
								h.remove()
							}
							g = f.lastChild;
							if (g) {
								g.next = h;
								h.prev = g;
								f.lastChild = h
							} else {
								f.lastChild = f.firstChild = h
							}
							h.parent = f;
							return h
						},
						insert : function(h, f, i) {
							var g;
							if (h.parent) {
								h.remove()
							}
							g = f.parent || this;
							if (i) {
								if (f === g.firstChild) {
									g.firstChild = h
								} else {
									f.prev.next = h
								}
								h.prev = f.prev;
								h.next = f;
								f.prev = h
							} else {
								if (f === g.lastChild) {
									g.lastChild = h
								} else {
									f.next.prev = h
								}
								h.next = f.next;
								h.prev = f;
								f.next = h
							}
							h.parent = g;
							return h
						},
						getAll : function(g) {
							var f = this, h, i = [];
							for (h = f.firstChild; h; h = a(h, f)) {
								if (h.name === g) {
									i.push(h)
								}
							}
							return i
						},
						empty : function() {
							var g = this, f, h, j;
							if (g.firstChild) {
								f = [];
								for (j = g.firstChild; j; j = a(j, g)) {
									f.push(j)
								}
								h = f.length;
								while (h--) {
									j = f[h];
									j.parent = j.firstChild = j.lastChild = j.next = j.prev = null
								}
							}
							g.firstChild = g.lastChild = null;
							return g
						},
						isEmpty : function(k) {
							var f = this, j = f.firstChild, h, g;
							if (j) {
								do {
									if (j.type === 1) {
										if (j.attributes.map["data-mce-bogus"]) {
											continue
										}
										if (k[j.name]) {
											return false
										}
										h = j.attributes.length;
										while (h--) {
											g = j.attributes[h].name;
											if (g === "name"
													|| g.indexOf("data-") === 0) {
												return false
											}
										}
									}
									if (j.type === 8) {
										return false
									}
									if ((j.type === 3 && !c.test(j.value))) {
										return false
									}
								} while (j = a(j, f))
							}
							return true
						},
						walk : function(f) {
							return a(this, null, f)
						}
					});
	d.extend(b, {
		create : function(g, f) {
			var i, h;
			i = new b(g, e[g] || 1);
			if (f) {
				for (h in f) {
					i.attr(h, f[h])
				}
			}
			return i
		}
	});
	d.html.Node = b
})(tinymce);
(function(b) {
	var a = b.html.Node;
	b.html.DomParser = function(g, h) {
		var f = this, e = {}, d = [], i = {}, c = {};
		g = g || {};
		g.validate = "validate" in g ? g.validate : true;
		g.root_name = g.root_name || "body";
		f.schema = h = h || new b.html.Schema();
		function j(m) {
			var o, p, x, v, z, n, q, l, t, u, k, s, y, r;
			s = b.makeMap("tr,td,th,tbody,thead,tfoot,table");
			k = h.getNonEmptyElements();
			for (o = 0; o < m.length; o++) {
				p = m[o];
				if (!p.parent) {
					continue
				}
				v = [ p ];
				for (x = p.parent; x && !h.isValidChild(x.name, p.name)
						&& !s[x.name]; x = x.parent) {
					v.push(x)
				}
				if (x && v.length > 1) {
					v.reverse();
					z = n = f.filterNode(v[0].clone());
					for (t = 0; t < v.length - 1; t++) {
						if (h.isValidChild(n.name, v[t].name)) {
							q = f.filterNode(v[t].clone());
							n.append(q)
						} else {
							q = n
						}
						for (l = v[t].firstChild; l && l != v[t + 1];) {
							r = l.next;
							q.append(l);
							l = r
						}
						n = q
					}
					if (!z.isEmpty(k)) {
						x.insert(z, v[0], true);
						x.insert(p, z)
					} else {
						x.insert(p, v[0], true)
					}
					x = v[0];
					if (x.isEmpty(k) || x.firstChild === x.lastChild
							&& x.firstChild.name === "br") {
						x.empty().remove()
					}
				} else {
					if (p.parent) {
						if (p.name === "li") {
							y = p.prev;
							if (y && (y.name === "ul" || y.name === "ul")) {
								y.append(p);
								continue
							}
							y = p.next;
							if (y && (y.name === "ul" || y.name === "ul")) {
								y.insert(p, y.firstChild, true);
								continue
							}
							p.wrap(f.filterNode(new a("ul", 1)));
							continue
						}
						if (h.isValidChild(p.parent.name, "div")
								&& h.isValidChild("div", p.name)) {
							p.wrap(f.filterNode(new a("div", 1)))
						} else {
							if (p.name === "style" || p.name === "script") {
								p.empty().remove()
							} else {
								p.unwrap()
							}
						}
					}
				}
			}
		}
		f.filterNode = function(m) {
			var l, k, n;
			if (k in e) {
				n = i[k];
				if (n) {
					n.push(m)
				} else {
					i[k] = [ m ]
				}
			}
			l = d.length;
			while (l--) {
				k = d[l].name;
				if (k in m.attributes.map) {
					n = c[k];
					if (n) {
						n.push(m)
					} else {
						c[k] = [ m ]
					}
				}
			}
			return m
		};
		f.addNodeFilter = function(k, l) {
			b.each(b.explode(k), function(m) {
				var n = e[m];
				if (!n) {
					e[m] = n = []
				}
				n.push(l)
			})
		};
		f.addAttributeFilter = function(k, l) {
			b.each(b.explode(k), function(m) {
				var n;
				for (n = 0; n < d.length; n++) {
					if (d[n].name === m) {
						d[n].callbacks.push(l);
						return
					}
				}
				d.push( {
					name : m,
					callbacks : [ l ]
				})
			})
		};
		f.parse = function(v, m) {
			var n, H, A, z, C, B, x, r, E, K, y, o, D, J = [], t, k, s, p, u, q;
			m = m || {};
			i = {};
			c = {};
			o = b.extend(b
					.makeMap("script,style,head,html,body,title,meta,param"), h
					.getBlockElements());
			u = h.getNonEmptyElements();
			p = h.children;
			y = g.validate;
			q = "forced_root_block" in m ? m.forced_root_block
					: g.forced_root_block;
			s = h.getWhiteSpaceElements();
			D = /^[ \t\r\n]+/;
			t = /[ \t\r\n]+$/;
			k = /[ \t\r\n]+/g;
			function F() {
				var L = H.firstChild, l, M;
				while (L) {
					l = L.next;
					if (L.type == 3
							|| (L.type == 1 && L.name !== "p" && !o[L.name] && !L
									.attr("data-mce-type"))) {
						if (!M) {
							M = I(q, 1);
							H.insert(M, L);
							M.append(L)
						} else {
							M.append(L)
						}
					} else {
						M = null
					}
					L = l
				}
			}
			function I(l, L) {
				var M = new a(l, L), N;
				if (l in e) {
					N = i[l];
					if (N) {
						N.push(M)
					} else {
						i[l] = [ M ]
					}
				}
				return M
			}
			function G(M) {
				var N, l, L;
				for (N = M.prev; N && N.type === 3;) {
					l = N.value.replace(t, "");
					if (l.length > 0) {
						N.value = l;
						N = N.prev
					} else {
						L = N.prev;
						N.remove();
						N = L
					}
				}
			}
			n = new b.html.SaxParser(
					{
						validate : y,
						fix_self_closing : !y,
						cdata : function(l) {
							A.append(I("#cdata", 4)).value = l
						},
						text : function(M, l) {
							var L;
							if (!s[A.name]) {
								M = M.replace(k, " ");
								if (A.lastChild && o[A.lastChild.name]) {
									M = M.replace(D, "")
								}
							}
							if (M.length !== 0) {
								L = I("#text", 3);
								L.raw = !!l;
								A.append(L).value = M
							}
						},
						comment : function(l) {
							A.append(I("#comment", 8)).value = l
						},
						pi : function(l, L) {
							A.append(I(l, 7)).value = L;
							G(A)
						},
						doctype : function(L) {
							var l;
							l = A.append(I("#doctype", 10));
							l.value = L;
							G(A)
						},
						start : function(l, T, M) {
							var R, O, N, L, P, U, S, Q;
							N = y ? h.getElementRule(l) : {};
							if (N) {
								R = I(N.outputName || l, 1);
								R.attributes = T;
								R.shortEnded = M;
								A.append(R);
								Q = p[A.name];
								if (Q && p[R.name] && !Q[R.name]) {
									J.push(R)
								}
								O = d.length;
								while (O--) {
									P = d[O].name;
									if (P in T.map) {
										E = c[P];
										if (E) {
											E.push(R)
										} else {
											c[P] = [ R ]
										}
									}
								}
								if (o[l]) {
									G(R)
								}
								if (!M) {
									A = R
								}
							}
						},
						end : function(l) {
							var P, M, O, L, N;
							M = y ? h.getElementRule(l) : {};
							if (M) {
								if (o[l]) {
									if (!s[A.name]) {
										for (P = A.firstChild; P
												&& P.type === 3;) {
											O = P.value.replace(D, "");
											if (O.length > 0) {
												P.value = O;
												P = P.next
											} else {
												L = P.next;
												P.remove();
												P = L
											}
										}
										for (P = A.lastChild; P && P.type === 3;) {
											O = P.value.replace(t, "");
											if (O.length > 0) {
												P.value = O;
												P = P.prev
											} else {
												L = P.prev;
												P.remove();
												P = L
											}
										}
									}
									P = A.prev;
									if (P && P.type === 3) {
										O = P.value.replace(D, "");
										if (O.length > 0) {
											P.value = O
										} else {
											P.remove()
										}
									}
								}
								if (M.removeEmpty || M.paddEmpty) {
									if (A.isEmpty(u)) {
										if (M.paddEmpty) {
											A.empty().append(
													new a("#text", "3")).value = "\u00a0"
										} else {
											if (!A.attributes.map.name) {
												N = A.parent;
												A.empty().remove();
												A = N;
												return
											}
										}
									}
								}
								A = A.parent
							}
						}
					}, h);
			H = A = new a(m.context || g.root_name, 11);
			n.parse(v);
			if (y && J.length) {
				if (!m.context) {
					j(J)
				} else {
					m.invalid = true
				}
			}
			if (q && H.name == "body") {
				F()
			}
			if (!m.invalid) {
				for (K in i) {
					E = e[K];
					z = i[K];
					x = z.length;
					while (x--) {
						if (!z[x].parent) {
							z.splice(x, 1)
						}
					}
					for (C = 0, B = E.length; C < B; C++) {
						E[C](z, K, m)
					}
				}
				for (C = 0, B = d.length; C < B; C++) {
					E = d[C];
					if (E.name in c) {
						z = c[E.name];
						x = z.length;
						while (x--) {
							if (!z[x].parent) {
								z.splice(x, 1)
							}
						}
						for (x = 0, r = E.callbacks.length; x < r; x++) {
							E.callbacks[x](z, E.name, m)
						}
					}
				}
			}
			return H
		};
		if (g.remove_trailing_brs) {
			f
					.addNodeFilter(
							"br",
							function(n, m) {
								var r, q = n.length, o, u = h
										.getBlockElements(), k = h
										.getNonEmptyElements(), s, p, t;
								u.body = 1;
								for (r = 0; r < q; r++) {
									o = n[r];
									s = o.parent;
									if (u[o.parent.name] && o === s.lastChild) {
										p = o.prev;
										while (p) {
											t = p.name;
											if (t !== "span"
													|| p.attr("data-mce-type") !== "bookmark") {
												if (t !== "br") {
													break
												}
												if (t === "br") {
													o = null;
													break
												}
											}
											p = p.prev
										}
										if (o) {
											o.remove();
											if (s.isEmpty(k)) {
												elementRule = h
														.getElementRule(s.name);
												if (elementRule) {
													if (elementRule.removeEmpty) {
														s.remove()
													} else {
														if (elementRule.paddEmpty) {
															s
																	.empty()
																	.append(
																			new b.html.Node(
																					"#text",
																					3)).value = "\u00a0"
														}
													}
												}
											}
										}
									}
								}
							})
		}
	}
})(tinymce);
tinymce.html.Writer = function(e) {
	var c = [], a, b, d, f, g;
	e = e || {};
	a = e.indent;
	b = tinymce.makeMap(e.indent_before || "");
	d = tinymce.makeMap(e.indent_after || "");
	f = tinymce.html.Entities.getEncodeFunc(e.entity_encoding || "raw",
			e.entities);
	g = e.element_format == "html";
	return {
		start : function(m, k, p) {
			var n, j, h, o;
			if (a && b[m] && c.length > 0) {
				o = c[c.length - 1];
				if (o.length > 0 && o !== "\n") {
					c.push("\n")
				}
			}
			c.push("<", m);
			if (k) {
				for (n = 0, j = k.length; n < j; n++) {
					h = k[n];
					c.push(" ", h.name, '="', f(h.value, true), '"')
				}
			}
			if (!p || g) {
				c[c.length] = ">"
			} else {
				c[c.length] = " />"
			}
			if (p && a && d[m] && c.length > 0) {
				o = c[c.length - 1];
				if (o.length > 0 && o !== "\n") {
					c.push("\n")
				}
			}
		},
		end : function(h) {
			var i;
			c.push("</", h, ">");
			if (a && d[h] && c.length > 0) {
				i = c[c.length - 1];
				if (i.length > 0 && i !== "\n") {
					c.push("\n")
				}
			}
		},
		text : function(i, h) {
			if (i.length > 0) {
				c[c.length] = h ? i : f(i)
			}
		},
		cdata : function(h) {
			c.push("<![CDATA[", h, "]]>")
		},
		comment : function(h) {
			c.push("<!--", h, "-->")
		},
		pi : function(h, i) {
			if (i) {
				c.push("<?", h, " ", i, "?>")
			} else {
				c.push("<?", h, "?>")
			}
			if (a) {
				c.push("\n")
			}
		},
		doctype : function(h) {
			c.push("<!DOCTYPE", h, ">", a ? "\n" : "")
		},
		reset : function() {
			c.length = 0
		},
		getContent : function() {
			return c.join("").replace(/\n$/, "")
		}
	}
};
(function(a) {
	a.html.Serializer = function(c, d) {
		var b = this, e = new a.html.Writer(c);
		c = c || {};
		c.validate = "validate" in c ? c.validate : true;
		b.schema = d = d || new a.html.Schema();
		b.writer = e;
		b.serialize = function(h) {
			var g, i;
			i = c.validate;
			g = {
				3 : function(k, j) {
					e.text(k.value, k.raw)
				},
				8 : function(j) {
					e.comment(j.value)
				},
				7 : function(j) {
					e.pi(j.name, j.value)
				},
				10 : function(j) {
					e.doctype(j.value)
				},
				4 : function(j) {
					e.cdata(j.value)
				},
				11 : function(j) {
					if ((j = j.firstChild)) {
						do {
							f(j)
						} while (j = j.next)
					}
				}
			};
			e.reset();
			function f(k) {
				var t = g[k.type], j, o, s, r, p, u, n, m, q;
				if (!t) {
					j = k.name;
					o = k.shortEnded;
					s = k.attributes;
					if (i && s && s.length > 1) {
						u = [];
						u.map = {};
						q = d.getElementRule(k.name);
						for (n = 0, m = q.attributesOrder.length; n < m; n++) {
							r = q.attributesOrder[n];
							if (r in s.map) {
								p = s.map[r];
								u.map[r] = p;
								u.push( {
									name : r,
									value : p
								})
							}
						}
						for (n = 0, m = s.length; n < m; n++) {
							r = s[n].name;
							if (!(r in u.map)) {
								p = s.map[r];
								u.map[r] = p;
								u.push( {
									name : r,
									value : p
								})
							}
						}
						s = u
					}
					e.start(k.name, s, o);
					if (!o) {
						if ((k = k.firstChild)) {
							do {
								f(k)
							} while (k = k.next)
						}
						e.end(j)
					}
				} else {
					t(k)
				}
			}
			if (h.type == 1 && !c.inner) {
				f(h)
			} else {
				g[11](h)
			}
			return e.getContent()
		}
	}
})(tinymce);
(function(h) {
	var f = h.each, e = h.is, d = h.isWebKit, b = h.isIE, c = h.html.Entities, a = /^([a-z0-9],?)+$/i, g = h.html.Schema.blockElementsMap, i = /^[ \t\r\n]*$/;
	h
			.create(
					"tinymce.dom.DOMUtils",
					{
						doc : null,
						root : null,
						files : null,
						pixelStyles : /^(top|left|bottom|right|width|height|borderWidth)$/,
						props : {
							"for" : "htmlFor",
							"class" : "className",
							className : "className",
							checked : "checked",
							disabled : "disabled",
							maxlength : "maxLength",
							readonly : "readOnly",
							selected : "selected",
							value : "value",
							id : "id",
							name : "name",
							type : "type"
						},
						DOMUtils : function(o, m) {
							var l = this, j, k;
							l.doc = o;
							l.win = window;
							l.files = {};
							l.cssFlicker = false;
							l.counter = 0;
							l.stdMode = !h.isIE || o.documentMode >= 8;
							l.boxModel = !h.isIE
									|| o.compatMode == "CSS1Compat"
									|| l.stdMode;
							l.hasOuterHTML = "outerHTML" in o
									.createElement("a");
							l.settings = m = h.extend( {
								keep_values : false,
								hex_colors : 1
							}, m);
							l.schema = m.schema;
							l.styles = new h.html.Styles( {
								url_converter : m.url_converter,
								url_converter_scope : m.url_converter_scope
							}, m.schema);
							if (h.isIE6) {
								try {
									o.execCommand("BackgroundImageCache",
											false, true)
								} catch (n) {
									l.cssFlicker = true
								}
							}
							if (b && m.schema) {
								("abbr article aside audio canvas details figcaption figure footer header hgroup mark menu meter nav output progress section summary time video")
										.replace(/\w+/g, function(p) {
											o.createElement(p)
										});
								for (k in m.schema.getCustomElements()) {
									o.createElement(k)
								}
							}
							h.addUnload(l.destroy, l)
						},
						getRoot : function() {
							var j = this, k = j.settings;
							return (k && j.get(k.root_element)) || j.doc.body
						},
						getViewPort : function(k) {
							var l, j;
							k = !k ? this.win : k;
							l = k.document;
							j = this.boxModel ? l.documentElement : l.body;
							return {
								x : k.pageXOffset || j.scrollLeft,
								y : k.pageYOffset || j.scrollTop,
								w : k.innerWidth || j.clientWidth,
								h : k.innerHeight || j.clientHeight
							}
						},
						getRect : function(m) {
							var l, j = this, k;
							m = j.get(m);
							l = j.getPos(m);
							k = j.getSize(m);
							return {
								x : l.x,
								y : l.y,
								w : k.w,
								h : k.h
							}
						},
						getSize : function(m) {
							var k = this, j, l;
							m = k.get(m);
							j = k.getStyle(m, "width");
							l = k.getStyle(m, "height");
							if (j.indexOf("px") === -1) {
								j = 0
							}
							if (l.indexOf("px") === -1) {
								l = 0
							}
							return {
								w : parseInt(j) || m.offsetWidth
										|| m.clientWidth,
								h : parseInt(l) || m.offsetHeight
										|| m.clientHeight
							}
						},
						getParent : function(l, k, j) {
							return this.getParents(l, k, j, false)
						},
						getParents : function(u, p, l, s) {
							var k = this, j, m = k.settings, q = [];
							u = k.get(u);
							s = s === undefined;
							if (m.strict_root) {
								l = l || k.getRoot()
							}
							if (e(p, "string")) {
								j = p;
								if (p === "*") {
									p = function(o) {
										return o.nodeType == 1
									}
								} else {
									p = function(o) {
										return k.is(o, j)
									}
								}
							}
							while (u) {
								if (u == l || !u.nodeType || u.nodeType === 9) {
									break
								}
								if (!p || p(u)) {
									if (s) {
										q.push(u)
									} else {
										return u
									}
								}
								u = u.parentNode
							}
							return s ? q : null
						},
						get : function(j) {
							var k;
							if (j && this.doc && typeof (j) == "string") {
								k = j;
								j = this.doc.getElementById(j);
								if (j && j.id !== k) {
									return this.doc.getElementsByName(k)[1]
								}
							}
							return j
						},
						getNext : function(k, j) {
							return this._findSib(k, j, "nextSibling")
						},
						getPrev : function(k, j) {
							return this._findSib(k, j, "previousSibling")
						},
						select : function(l, k) {
							var j = this;
							return h.dom.Sizzle(l, j.get(k)
									|| j.get(j.settings.root_element) || j.doc,
									[])
						},
						is : function(l, j) {
							var k;
							if (l.length === undefined) {
								if (j === "*") {
									return l.nodeType == 1
								}
								if (a.test(j)) {
									j = j.toLowerCase().split(/,/);
									l = l.nodeName.toLowerCase();
									for (k = j.length - 1; k >= 0; k--) {
										if (j[k] == l) {
											return true
										}
									}
									return false
								}
							}
							return h.dom.Sizzle.matches(j, l.nodeType ? [ l ]
									: l).length > 0
						},
						add : function(m, q, j, l, o) {
							var k = this;
							return this.run(m,
									function(s) {
										var r, n;
										r = e(q, "string") ? k.doc
												.createElement(q) : q;
										k.setAttribs(r, j);
										if (l) {
											if (l.nodeType) {
												r.appendChild(l)
											} else {
												k.setHTML(r, l)
											}
										}
										return !o ? s.appendChild(r) : r
									})
						},
						create : function(l, j, k) {
							return this.add(this.doc.createElement(l), l, j, k,
									1)
						},
						createHTML : function(r, j, p) {
							var q = "", m = this, l;
							q += "<" + r;
							for (l in j) {
								if (j.hasOwnProperty(l)) {
									q += " " + l + '="' + m.encode(j[l]) + '"'
								}
							}
							if (typeof (p) != "undefined") {
								return q + ">" + p + "</" + r + ">"
							}
							return q + " />"
						},
						remove : function(j, k) {
							return this.run(j, function(m) {
								var n, l = m.parentNode;
								if (!l) {
									return null
								}
								if (k) {
									while (n = m.firstChild) {
										if (!h.isIE || n.nodeType !== 3
												|| n.nodeValue) {
											l.insertBefore(n, m)
										} else {
											m.removeChild(n)
										}
									}
								}
								return l.removeChild(m)
							})
						},
						setStyle : function(m, j, k) {
							var l = this;
							return l
									.run(
											m,
											function(p) {
												var o, n;
												o = p.style;
												j = j
														.replace(
																/-(\D)/g,
																function(r, q) {
																	return q
																			.toUpperCase()
																});
												if (l.pixelStyles.test(j)
														&& (h.is(k, "number") || /^[\-0-9\.]+$/
																.test(k))) {
													k += "px"
												}
												switch (j) {
												case "opacity":
													if (b) {
														o.filter = k === "" ? ""
																: "alpha(opacity="
																		+ (k * 100)
																		+ ")";
														if (!m.currentStyle
																|| !m.currentStyle.hasLayout) {
															o.display = "inline-block"
														}
													}
													o[j] = o["-moz-opacity"] = o["-khtml-opacity"] = k
															|| "";
													break;
												case "float":
													b ? o.styleFloat = k
															: o.cssFloat = k;
													break;
												default:
													o[j] = k || ""
												}
												if (l.settings.update_styles) {
													l.setAttrib(p,
															"data-mce-style")
												}
											})
						},
						getStyle : function(m, j, l) {
							m = this.get(m);
							if (!m) {
								return
							}
							if (this.doc.defaultView && l) {
								j = j.replace(/[A-Z]/g, function(n) {
									return "-" + n
								});
								try {
									return this.doc.defaultView
											.getComputedStyle(m, null)
											.getPropertyValue(j)
								} catch (k) {
									return null
								}
							}
							j = j.replace(/-(\D)/g, function(o, n) {
								return n.toUpperCase()
							});
							if (j == "float") {
								j = b ? "styleFloat" : "cssFloat"
							}
							if (m.currentStyle && l) {
								return m.currentStyle[j]
							}
							return m.style ? m.style[j] : undefined
						},
						setStyles : function(m, n) {
							var k = this, l = k.settings, j;
							j = l.update_styles;
							l.update_styles = 0;
							f(n, function(o, p) {
								k.setStyle(m, p, o)
							});
							l.update_styles = j;
							if (l.update_styles) {
								k.setAttrib(m, l.cssText)
							}
						},
						removeAllAttribs : function(j) {
							return this.run(j, function(m) {
								var l, k = m.attributes;
								for (l = k.length - 1; l >= 0; l--) {
									m.removeAttributeNode(k.item(l))
								}
							})
						},
						setAttrib : function(l, m, j) {
							var k = this;
							if (!l || !m) {
								return
							}
							if (k.settings.strict) {
								m = m.toLowerCase()
							}
							return this.run(l, function(q) {
								var p = k.settings;
								var n = q.getAttribute(m);
								if (j !== null) {
									switch (m) {
									case "style":
										if (!e(j, "string")) {
											f(j, function(r, s) {
												k.setStyle(q, s, r)
											});
											return
										}
										if (p.keep_values) {
											if (j && !k._isRes(j)) {
												q.setAttribute(
														"data-mce-style", j, 2)
											} else {
												q.removeAttribute(
														"data-mce-style", 2)
											}
										}
										q.style.cssText = j;
										break;
									case "class":
										q.className = j || "";
										break;
									case "src":
									case "href":
										if (p.keep_values) {
											if (p.url_converter) {
												j = p.url_converter.call(
														p.url_converter_scope
																|| k, j, m, q)
											}
											k.setAttrib(q, "data-mce-" + m, j,
													2)
										}
										break;
									case "shape":
										q.setAttribute("data-mce-style", j);
										break
									}
								}
								if (e(j) && j !== null && j.length !== 0) {
									q.setAttribute(m, "" + j, 2)
								} else {
									q.removeAttribute(m, 2)
								}
								if (tinyMCE.activeEditor && n != j) {
									var o = tinyMCE.activeEditor;
									o.onSetAttrib.dispatch(o, q, m, j)
								}
							})
						},
						setAttribs : function(k, l) {
							var j = this;
							return this.run(k, function(m) {
								f(l, function(o, p) {
									j.setAttrib(m, p, o)
								})
							})
						},
						getAttrib : function(o, p, l) {
							var j, k = this, m;
							o = k.get(o);
							if (!o || o.nodeType !== 1) {
								return l === m ? false : l
							}
							if (!e(l)) {
								l = ""
							}
							if (/^(src|href|style|coords|shape)$/.test(p)) {
								j = o.getAttribute("data-mce-" + p);
								if (j) {
									return j
								}
							}
							if (b && k.props[p]) {
								j = o[k.props[p]];
								j = j && j.nodeValue ? j.nodeValue : j
							}
							if (!j) {
								j = o.getAttribute(p, 2)
							}
							if (/^(checked|compact|declare|defer|disabled|ismap|multiple|nohref|noshade|nowrap|readonly|selected)$/
									.test(p)) {
								if (o[k.props[p]] === true && j === "") {
									return p
								}
								return j ? p : ""
							}
							if (o.nodeName === "FORM" && o.getAttributeNode(p)) {
								return o.getAttributeNode(p).nodeValue
							}
							if (p === "style") {
								j = j || o.style.cssText;
								if (j) {
									j = k.serializeStyle(k.parseStyle(j),
											o.nodeName);
									if (k.settings.keep_values && !k._isRes(j)) {
										o.setAttribute("data-mce-style", j)
									}
								}
							}
							if (d && p === "class" && j) {
								j = j.replace(/(apple|webkit)\-[a-z\-]+/gi, "")
							}
							if (b) {
								switch (p) {
								case "rowspan":
								case "colspan":
									if (j === 1) {
										j = ""
									}
									break;
								case "size":
									if (j === "+0" || j === 20 || j === 0) {
										j = ""
									}
									break;
								case "width":
								case "height":
								case "vspace":
								case "checked":
								case "disabled":
								case "readonly":
									if (j === 0) {
										j = ""
									}
									break;
								case "hspace":
									if (j === -1) {
										j = ""
									}
									break;
								case "maxlength":
								case "tabindex":
									if (j === 32768 || j === 2147483647
											|| j === "32768") {
										j = ""
									}
									break;
								case "multiple":
								case "compact":
								case "noshade":
								case "nowrap":
									if (j === 65535) {
										return p
									}
									return l;
								case "shape":
									j = j.toLowerCase();
									break;
								default:
									if (p.indexOf("on") === 0 && j) {
										j = h
												._replace(
														/^function\s+\w+\(\)\s+\{\s+(.*)\s+\}$/,
														"$1", "" + j)
									}
								}
							}
							return (j !== m && j !== null && j !== "") ? "" + j
									: l
						},
						getPos : function(s, m) {
							var k = this, j = 0, q = 0, o, p = k.doc, l;
							s = k.get(s);
							m = m || p.body;
							if (s) {
								if (s.getBoundingClientRect) {
									s = s.getBoundingClientRect();
									o = k.boxModel ? p.documentElement : p.body;
									j = s.left
											+ (p.documentElement.scrollLeft || p.body.scrollLeft)
											- o.clientTop;
									q = s.top
											+ (p.documentElement.scrollTop || p.body.scrollTop)
											- o.clientLeft;
									return {
										x : j,
										y : q
									}
								}
								l = s;
								while (l && l != m && l.nodeType) {
									j += l.offsetLeft || 0;
									q += l.offsetTop || 0;
									l = l.offsetParent
								}
								l = s.parentNode;
								while (l && l != m && l.nodeType) {
									j -= l.scrollLeft || 0;
									q -= l.scrollTop || 0;
									l = l.parentNode
								}
							}
							return {
								x : j,
								y : q
							}
						},
						parseStyle : function(j) {
							return this.styles.parse(j)
						},
						serializeStyle : function(k, j) {
							return this.styles.serialize(k, j)
						},
						loadCSS : function(j) {
							var l = this, m = l.doc, k;
							if (!j) {
								j = ""
							}
							k = l.select("head")[0];
							f(j.split(","), function(n) {
								var o;
								if (l.files[n]) {
									return
								}
								l.files[n] = true;
								o = l.create("link", {
									rel : "stylesheet",
									href : h._addVer(n)
								});
								if (b && m.documentMode && m.recalc) {
									o.onload = function() {
										if (m.recalc) {
											m.recalc()
										}
										o.onload = null
									}
								}
								k.appendChild(o)
							})
						},
						addClass : function(j, k) {
							return this.run(j, function(l) {
								var m;
								if (!k) {
									return 0
								}
								if (this.hasClass(l, k)) {
									return l.className
								}
								m = this.removeClass(l, k);
								return l.className = (m != "" ? (m + " ") : "")
										+ k
							})
						},
						removeClass : function(l, m) {
							var j = this, k;
							return j.run(l, function(o) {
								var n;
								if (j.hasClass(o, m)) {
									if (!k) {
										k = new RegExp("(^|\\s+)" + m
												+ "(\\s+|$)", "g")
									}
									n = o.className.replace(k, " ");
									n = h.trim(n != " " ? n : "");
									o.className = n;
									if (!n) {
										o.removeAttribute("class");
										o.removeAttribute("className")
									}
									return n
								}
								return o.className
							})
						},
						hasClass : function(k, j) {
							k = this.get(k);
							if (!k || !j) {
								return false
							}
							return (" " + k.className + " ").indexOf(" " + j
									+ " ") !== -1
						},
						show : function(j) {
							return this.setStyle(j, "display", "block")
						},
						hide : function(j) {
							return this.setStyle(j, "display", "none")
						},
						isHidden : function(j) {
							j = this.get(j);
							return !j || j.style.display == "none"
									|| this.getStyle(j, "display") == "none"
						},
						uniqueId : function(j) {
							return (!j ? "mce_" : j) + (this.counter++)
						},
						setHTML : function(l, k) {
							var j = this;
							return j.run(l, function(n) {
								if (b) {
									while (n.firstChild) {
										n.removeChild(n.firstChild)
									}
									try {
										n.innerHTML = "<br />" + k;
										n.removeChild(n.firstChild)
									} catch (m) {
										n = j.create("div");
										n.innerHTML = "<br />" + k;
										f(n.childNodes, function(p, o) {
											if (o) {
												n.appendChild(p)
											}
										})
									}
								} else {
									n.innerHTML = k
								}
								return k
							})
						},
						getOuterHTML : function(l) {
							var k, j = this;
							l = j.get(l);
							if (!l) {
								return null
							}
							if (l.nodeType === 1 && j.hasOuterHTML) {
								return l.outerHTML
							}
							k = (l.ownerDocument || j.doc)
									.createElement("body");
							k.appendChild(l.cloneNode(true));
							return k.innerHTML
						},
						setOuterHTML : function(m, k, n) {
							var j = this;
							function l(p, o, r) {
								var s, q;
								q = r.createElement("body");
								q.innerHTML = o;
								s = q.lastChild;
								while (s) {
									j.insertAfter(s.cloneNode(true), p);
									s = s.previousSibling
								}
								j.remove(p)
							}
							return this.run(m, function(p) {
								p = j.get(p);
								if (p.nodeType == 1) {
									n = n || p.ownerDocument || j.doc;
									if (b) {
										try {
											if (b && p.nodeType == 1) {
												p.outerHTML = k
											} else {
												l(p, k, n)
											}
										} catch (o) {
											l(p, k, n)
										}
									} else {
										l(p, k, n)
									}
								}
							})
						},
						decode : c.decode,
						encode : c.encodeAllRaw,
						insertAfter : function(j, k) {
							k = this.get(k);
							return this.run(j, function(m) {
								var l, n;
								l = k.parentNode;
								n = k.nextSibling;
								if (n) {
									l.insertBefore(m, n)
								} else {
									l.appendChild(m)
								}
								return m
							})
						},
						isBlock : function(k) {
							var j = k.nodeType;
							if (j) {
								return !!(j === 1 && g[k.nodeName])
							}
							return !!g[k]
						},
						replace : function(p, m, j) {
							var l = this;
							if (e(m, "array")) {
								p = p.cloneNode(true)
							}
							return l.run(m, function(k) {
								if (j) {
									f(h.grep(k.childNodes), function(n) {
										p.appendChild(n)
									})
								}
								return k.parentNode.replaceChild(p, k)
							})
						},
						rename : function(m, j) {
							var l = this, k;
							if (m.nodeName != j.toUpperCase()) {
								k = l.create(j);
								f(l.getAttribs(m), function(n) {
									l.setAttrib(k, n.nodeName, l.getAttrib(m,
											n.nodeName))
								});
								l.replace(k, m, 1)
							}
							return k || m
						},
						findCommonAncestor : function(l, j) {
							var m = l, k;
							while (m) {
								k = j;
								while (k && m != k) {
									k = k.parentNode
								}
								if (m == k) {
									break
								}
								m = m.parentNode
							}
							if (!m && l.ownerDocument) {
								return l.ownerDocument.documentElement
							}
							return m
						},
						toHex : function(j) {
							var l = /^\s*rgb\s*?\(\s*?([0-9]+)\s*?,\s*?([0-9]+)\s*?,\s*?([0-9]+)\s*?\)\s*$/i
									.exec(j);
							function k(m) {
								m = parseInt(m).toString(16);
								return m.length > 1 ? m : "0" + m
							}
							if (l) {
								j = "#" + k(l[1]) + k(l[2]) + k(l[3]);
								return j
							}
							return j
						},
						getClasses : function() {
							var n = this, j = [], m, o = {}, p = n.settings.class_filter, l;
							if (n.classes) {
								return n.classes
							}
							function q(r) {
								f(r.imports, function(s) {
									q(s)
								});
								f(
										r.cssRules || r.rules,
										function(s) {
											switch (s.type || 1) {
											case 1:
												if (s.selectorText) {
													f(
															s.selectorText
																	.split(","),
															function(t) {
																t = t
																		.replace(
																				/^\s*|\s*$|^\s\./g,
																				"");
																if (/\.mce/
																		.test(t)
																		|| !/\.[\w\-]+$/
																				.test(t)) {
																	return
																}
																l = t;
																t = h
																		._replace(
																				/.*\.([a-z0-9_\-]+).*/i,
																				"$1",
																				t);
																if (p
																		&& !(t = p(
																				t,
																				l))) {
																	return
																}
																if (!o[t]) {
																	j
																			.push( {
																				"class" : t
																			});
																	o[t] = 1
																}
															})
												}
												break;
											case 3:
												q(s.styleSheet);
												break
											}
										})
							}
							try {
								f(n.doc.styleSheets, q)
							} catch (k) {
							}
							if (j.length > 0) {
								n.classes = j
							}
							return j
						},
						run : function(m, l, k) {
							var j = this, n;
							if (j.doc && typeof (m) === "string") {
								m = j.get(m)
							}
							if (!m) {
								return false
							}
							k = k || this;
							if (!m.nodeType && (m.length || m.length === 0)) {
								n = [];
								f(m, function(p, o) {
									if (p) {
										if (typeof (p) == "string") {
											p = j.doc.getElementById(p)
										}
										n.push(l.call(k, p, o))
									}
								});
								return n
							}
							return l.call(k, m)
						},
						getAttribs : function(k) {
							var j;
							k = this.get(k);
							if (!k) {
								return []
							}
							if (b) {
								j = [];
								if (k.nodeName == "OBJECT") {
									return k.attributes
								}
								if (k.nodeName === "OPTION"
										&& this.getAttrib(k, "selected")) {
									j.push( {
										specified : 1,
										nodeName : "selected"
									})
								}
								k.cloneNode(false).outerHTML
										.replace(
												/<\/?[\w:\-]+ ?|=[\"][^\"]+\"|=\'[^\']+\'|=[\w\-]+|>/gi,
												"").replace(/[\w:\-]+/gi,
												function(l) {
													j.push( {
														specified : 1,
														nodeName : l
													})
												});
								return j
							}
							return k.attributes
						},
						isEmpty : function(m, k) {
							var r = this, o, n, q, j, l, p;
							m = m.firstChild;
							if (m) {
								j = new h.dom.TreeWalker(m);
								k = k || r.schema ? r.schema
										.getNonEmptyElements() : null;
								do {
									q = m.nodeType;
									if (q === 1) {
										if (m.getAttribute("data-mce-bogus")) {
											continue
										}
										l = m.nodeName.toLowerCase();
										if (k && k[l]) {
											p = m.parentNode;
											if (l === "br" && r.isBlock(p)
													&& p.firstChild === m
													&& p.lastChild === m) {
												continue
											}
											return false
										}
										n = r.getAttribs(m);
										o = m.attributes.length;
										while (o--) {
											l = m.attributes[o].nodeName;
											if (l === "name"
													|| l === "data-mce-bookmark") {
												return false
											}
										}
									}
									if (q == 8) {
										return false
									}
									if ((q === 3 && !i.test(m.nodeValue))) {
										return false
									}
								} while (m = j.next())
							}
							return true
						},
						destroy : function(k) {
							var j = this;
							if (j.events) {
								j.events.destroy()
							}
							j.win = j.doc = j.root = j.events = null;
							if (!k) {
								h.removeUnload(j.destroy)
							}
						},
						createRng : function() {
							var j = this.doc;
							return j.createRange ? j.createRange()
									: new h.dom.Range(this)
						},
						nodeIndex : function(n, o) {
							var j = 0, l, m, k;
							if (n) {
								for (l = n.nodeType, n = n.previousSibling, m = n; n; n = n.previousSibling) {
									k = n.nodeType;
									if (o && k == 3) {
										if (k == l || !n.nodeValue.length) {
											continue
										}
									}
									j++;
									l = k
								}
							}
							return j
						},
						split : function(n, m, q) {
							var s = this, j = s.createRng(), o, l, p;
							function k(x) {
								var u, t = x.childNodes, v = x.nodeType;
								function y(B) {
									var A = B.previousSibling
											&& B.previousSibling.nodeName == "SPAN";
									var z = B.nextSibling
											&& B.nextSibling.nodeName == "SPAN";
									return A && z
								}
								if (v == 1
										&& x.getAttribute("data-mce-type") == "bookmark") {
									return
								}
								for (u = t.length - 1; u >= 0; u--) {
									k(t[u])
								}
								if (v != 9) {
									if (v == 3 && x.nodeValue.length > 0) {
										var r = h.trim(x.nodeValue).length;
										if (!s.isBlock(x.parentNode) || r > 0
												|| r == 0 && y(x)) {
											return
										}
									} else {
										if (v == 1) {
											t = x.childNodes;
											if (t.length == 1
													&& t[0]
													&& t[0].nodeType == 1
													&& t[0]
															.getAttribute("data-mce-type") == "bookmark") {
												x.parentNode.insertBefore(t[0],
														x)
											}
											if (t.length
													|| /^(br|hr|input|img)$/i
															.test(x.nodeName)) {
												return
											}
										}
									}
									s.remove(x)
								}
								return x
							}
							if (n && m) {
								j.setStart(n.parentNode, s.nodeIndex(n));
								j.setEnd(m.parentNode, s.nodeIndex(m));
								o = j.extractContents();
								j = s.createRng();
								j.setStart(m.parentNode, s.nodeIndex(m) + 1);
								j.setEnd(n.parentNode, s.nodeIndex(n) + 1);
								l = j.extractContents();
								p = n.parentNode;
								p.insertBefore(k(o), n);
								if (q) {
									p.replaceChild(q, m)
								} else {
									p.insertBefore(m, n)
								}
								p.insertBefore(k(l), n);
								s.remove(n);
								return q || m
							}
						},
						bind : function(n, j, m, l) {
							var k = this;
							if (!k.events) {
								k.events = new h.dom.EventUtils()
							}
							return k.events.add(n, j, m, l || this)
						},
						unbind : function(m, j, l) {
							var k = this;
							if (!k.events) {
								k.events = new h.dom.EventUtils()
							}
							return k.events.remove(m, j, l)
						},
						_findSib : function(m, j, k) {
							var l = this, n = j;
							if (m) {
								if (e(n, "string")) {
									n = function(o) {
										return l.is(o, j)
									}
								}
								for (m = m[k]; m; m = m[k]) {
									if (n(m)) {
										return m
									}
								}
							}
							return null
						},
						_isRes : function(j) {
							return /^(top|left|bottom|right|width|height)/i
									.test(j)
									|| /;\s*(top|left|bottom|right|width|height)/i
											.test(j)
						}
					});
	h.DOM = new h.dom.DOMUtils(document, {
		process_html : 0
	})
})(tinymce);
(function(a) {
	function b(c) {
		var N = this, e = c.doc, S = 0, E = 1, j = 2, D = true, R = false, U = "startOffset", h = "startContainer", P = "endContainer", z = "endOffset", k = tinymce.extend, n = c.nodeIndex;
		k(N, {
			startContainer : e,
			startOffset : 0,
			endContainer : e,
			endOffset : 0,
			collapsed : D,
			commonAncestorContainer : e,
			START_TO_START : 0,
			START_TO_END : 1,
			END_TO_END : 2,
			END_TO_START : 3,
			setStart : q,
			setEnd : s,
			setStartBefore : g,
			setStartAfter : I,
			setEndBefore : J,
			setEndAfter : u,
			collapse : A,
			selectNode : x,
			selectNodeContents : F,
			compareBoundaryPoints : v,
			deleteContents : p,
			extractContents : H,
			cloneContents : d,
			insertNode : C,
			surroundContents : M,
			cloneRange : K
		});
		function q(V, t) {
			B(D, V, t)
		}
		function s(V, t) {
			B(R, V, t)
		}
		function g(t) {
			q(t.parentNode, n(t))
		}
		function I(t) {
			q(t.parentNode, n(t) + 1)
		}
		function J(t) {
			s(t.parentNode, n(t))
		}
		function u(t) {
			s(t.parentNode, n(t) + 1)
		}
		function A(t) {
			if (t) {
				N[P] = N[h];
				N[z] = N[U]
			} else {
				N[h] = N[P];
				N[U] = N[z]
			}
			N.collapsed = D
		}
		function x(t) {
			g(t);
			u(t)
		}
		function F(t) {
			q(t, 0);
			s(t, t.nodeType === 1 ? t.childNodes.length : t.nodeValue.length)
		}
		function v(Y, t) {
			var ab = N[h], W = N[U], aa = N[P], V = N[z], Z = t.startContainer, ad = t.startOffset, X = t.endContainer, ac = t.endOffset;
			if (Y === 0) {
				return G(ab, W, Z, ad)
			}
			if (Y === 1) {
				return G(aa, V, Z, ad)
			}
			if (Y === 2) {
				return G(aa, V, X, ac)
			}
			if (Y === 3) {
				return G(ab, W, X, ac)
			}
		}
		function p() {
			m(j)
		}
		function H() {
			return m(S)
		}
		function d() {
			return m(E)
		}
		function C(Y) {
			var V = this[h], t = this[U], X, W;
			if ((V.nodeType === 3 || V.nodeType === 4) && V.nodeValue) {
				if (!t) {
					V.parentNode.insertBefore(Y, V)
				} else {
					if (t >= V.nodeValue.length) {
						c.insertAfter(Y, V)
					} else {
						X = V.splitText(t);
						V.parentNode.insertBefore(Y, X)
					}
				}
			} else {
				if (V.childNodes.length > 0) {
					W = V.childNodes[t]
				}
				if (W) {
					V.insertBefore(Y, W)
				} else {
					V.appendChild(Y)
				}
			}
		}
		function M(V) {
			var t = N.extractContents();
			N.insertNode(V);
			V.appendChild(t);
			N.selectNode(V)
		}
		function K() {
			return k(new b(c), {
				startContainer : N[h],
				startOffset : N[U],
				endContainer : N[P],
				endOffset : N[z],
				collapsed : N.collapsed,
				commonAncestorContainer : N.commonAncestorContainer
			})
		}
		function O(t, V) {
			var W;
			if (t.nodeType == 3) {
				return t
			}
			if (V < 0) {
				return t
			}
			W = t.firstChild;
			while (W && V > 0) {
				--V;
				W = W.nextSibling
			}
			if (W) {
				return W
			}
			return t
		}
		function l() {
			return (N[h] == N[P] && N[U] == N[z])
		}
		function G(X, Z, V, Y) {
			var aa, W, t, ab, ad, ac;
			if (X == V) {
				if (Z == Y) {
					return 0
				}
				if (Z < Y) {
					return -1
				}
				return 1
			}
			aa = V;
			while (aa && aa.parentNode != X) {
				aa = aa.parentNode
			}
			if (aa) {
				W = 0;
				t = X.firstChild;
				while (t != aa && W < Z) {
					W++;
					t = t.nextSibling
				}
				if (Z <= W) {
					return -1
				}
				return 1
			}
			aa = X;
			while (aa && aa.parentNode != V) {
				aa = aa.parentNode
			}
			if (aa) {
				W = 0;
				t = V.firstChild;
				while (t != aa && W < Y) {
					W++;
					t = t.nextSibling
				}
				if (W < Y) {
					return -1
				}
				return 1
			}
			ab = c.findCommonAncestor(X, V);
			ad = X;
			while (ad && ad.parentNode != ab) {
				ad = ad.parentNode
			}
			if (!ad) {
				ad = ab
			}
			ac = V;
			while (ac && ac.parentNode != ab) {
				ac = ac.parentNode
			}
			if (!ac) {
				ac = ab
			}
			if (ad == ac) {
				return 0
			}
			t = ab.firstChild;
			while (t) {
				if (t == ad) {
					return -1
				}
				if (t == ac) {
					return 1
				}
				t = t.nextSibling
			}
		}
		function B(V, Y, X) {
			var t, W;
			if (V) {
				N[h] = Y;
				N[U] = X
			} else {
				N[P] = Y;
				N[z] = X
			}
			t = N[P];
			while (t.parentNode) {
				t = t.parentNode
			}
			W = N[h];
			while (W.parentNode) {
				W = W.parentNode
			}
			if (W == t) {
				if (G(N[h], N[U], N[P], N[z]) > 0) {
					N.collapse(V)
				}
			} else {
				N.collapse(V)
			}
			N.collapsed = l();
			N.commonAncestorContainer = c.findCommonAncestor(N[h], N[P])
		}
		function m(ab) {
			var aa, X = 0, ad = 0, V, Z, W, Y, t, ac;
			if (N[h] == N[P]) {
				return f(ab)
			}
			for (aa = N[P], V = aa.parentNode; V; aa = V, V = V.parentNode) {
				if (V == N[h]) {
					return r(aa, ab)
				}
				++X
			}
			for (aa = N[h], V = aa.parentNode; V; aa = V, V = V.parentNode) {
				if (V == N[P]) {
					return T(aa, ab)
				}
				++ad
			}
			Z = ad - X;
			W = N[h];
			while (Z > 0) {
				W = W.parentNode;
				Z--
			}
			Y = N[P];
			while (Z < 0) {
				Y = Y.parentNode;
				Z++
			}
			for (t = W.parentNode, ac = Y.parentNode; t != ac; t = t.parentNode, ac = ac.parentNode) {
				W = t;
				Y = ac
			}
			return o(W, Y, ab)
		}
		function f(Z) {
			var ab, Y, X, aa, t, W, V;
			if (Z != j) {
				ab = e.createDocumentFragment()
			}
			if (N[U] == N[z]) {
				return ab
			}
			if (N[h].nodeType == 3) {
				Y = N[h].nodeValue;
				X = Y.substring(N[U], N[z]);
				if (Z != E) {
					N[h].deleteData(N[U], N[z] - N[U]);
					N.collapse(D)
				}
				if (Z == j) {
					return
				}
				ab.appendChild(e.createTextNode(X));
				return ab
			}
			aa = O(N[h], N[U]);
			t = N[z] - N[U];
			while (t > 0) {
				W = aa.nextSibling;
				V = y(aa, Z);
				if (ab) {
					ab.appendChild(V)
				}
				--t;
				aa = W
			}
			if (Z != E) {
				N.collapse(D)
			}
			return ab
		}
		function r(ab, Y) {
			var aa, Z, V, t, X, W;
			if (Y != j) {
				aa = e.createDocumentFragment()
			}
			Z = i(ab, Y);
			if (aa) {
				aa.appendChild(Z)
			}
			V = n(ab);
			t = V - N[U];
			if (t <= 0) {
				if (Y != E) {
					N.setEndBefore(ab);
					N.collapse(R)
				}
				return aa
			}
			Z = ab.previousSibling;
			while (t > 0) {
				X = Z.previousSibling;
				W = y(Z, Y);
				if (aa) {
					aa.insertBefore(W, aa.firstChild)
				}
				--t;
				Z = X
			}
			if (Y != E) {
				N.setEndBefore(ab);
				N.collapse(R)
			}
			return aa
		}
		function T(Z, Y) {
			var ab, V, aa, t, X, W;
			if (Y != j) {
				ab = e.createDocumentFragment()
			}
			aa = Q(Z, Y);
			if (ab) {
				ab.appendChild(aa)
			}
			V = n(Z);
			++V;
			t = N[z] - V;
			aa = Z.nextSibling;
			while (t > 0) {
				X = aa.nextSibling;
				W = y(aa, Y);
				if (ab) {
					ab.appendChild(W)
				}
				--t;
				aa = X
			}
			if (Y != E) {
				N.setStartAfter(Z);
				N.collapse(D)
			}
			return ab
		}
		function o(Z, t, ac) {
			var W, ae, Y, aa, ab, V, ad, X;
			if (ac != j) {
				ae = e.createDocumentFragment()
			}
			W = Q(Z, ac);
			if (ae) {
				ae.appendChild(W)
			}
			Y = Z.parentNode;
			aa = n(Z);
			ab = n(t);
			++aa;
			V = ab - aa;
			ad = Z.nextSibling;
			while (V > 0) {
				X = ad.nextSibling;
				W = y(ad, ac);
				if (ae) {
					ae.appendChild(W)
				}
				ad = X;
				--V
			}
			W = i(t, ac);
			if (ae) {
				ae.appendChild(W)
			}
			if (ac != E) {
				N.setStartAfter(Z);
				N.collapse(D)
			}
			return ae
		}
		function i(aa, ab) {
			var W = O(N[P], N[z] - 1), ac, Z, Y, t, V, X = W != N[P];
			if (W == aa) {
				return L(W, X, R, ab)
			}
			ac = W.parentNode;
			Z = L(ac, R, R, ab);
			while (ac) {
				while (W) {
					Y = W.previousSibling;
					t = L(W, X, R, ab);
					if (ab != j) {
						Z.insertBefore(t, Z.firstChild)
					}
					X = D;
					W = Y
				}
				if (ac == aa) {
					return Z
				}
				W = ac.previousSibling;
				ac = ac.parentNode;
				V = L(ac, R, R, ab);
				if (ab != j) {
					V.appendChild(Z)
				}
				Z = V
			}
		}
		function Q(aa, ab) {
			var X = O(N[h], N[U]), Y = X != N[h], ac, Z, W, t, V;
			if (X == aa) {
				return L(X, Y, D, ab)
			}
			ac = X.parentNode;
			Z = L(ac, R, D, ab);
			while (ac) {
				while (X) {
					W = X.nextSibling;
					t = L(X, Y, D, ab);
					if (ab != j) {
						Z.appendChild(t)
					}
					Y = D;
					X = W
				}
				if (ac == aa) {
					return Z
				}
				X = ac.nextSibling;
				ac = ac.parentNode;
				V = L(ac, R, D, ab);
				if (ab != j) {
					V.appendChild(Z)
				}
				Z = V
			}
		}
		function L(t, Y, ab, ac) {
			var X, W, Z, V, aa;
			if (Y) {
				return y(t, ac)
			}
			if (t.nodeType == 3) {
				X = t.nodeValue;
				if (ab) {
					V = N[U];
					W = X.substring(V);
					Z = X.substring(0, V)
				} else {
					V = N[z];
					W = X.substring(0, V);
					Z = X.substring(V)
				}
				if (ac != E) {
					t.nodeValue = Z
				}
				if (ac == j) {
					return
				}
				aa = t.cloneNode(R);
				aa.nodeValue = W;
				return aa
			}
			if (ac == j) {
				return
			}
			return t.cloneNode(R)
		}
		function y(V, t) {
			if (t != j) {
				return t == E ? V.cloneNode(D) : V
			}
			V.parentNode.removeChild(V)
		}
	}
	a.Range = b
})(tinymce.dom);
(function() {
	function a(d) {
		var b = this, h = d.dom, c = true, f = false;
		function e(i, j) {
			var k, t = 0, q, n, m, l, o, r, p = -1, s;
			k = i.duplicate();
			k.collapse(j);
			s = k.parentElement();
			if (s.ownerDocument !== d.dom.doc) {
				return
			}
			while (s.contentEditable === "false") {
				s = s.parentNode
			}
			if (!s.hasChildNodes()) {
				return {
					node : s,
					inside : 1
				}
			}
			m = s.children;
			q = m.length - 1;
			while (t <= q) {
				r = Math.floor((t + q) / 2);
				l = m[r];
				k.moveToElementText(l);
				p = k.compareEndPoints(j ? "StartToStart" : "EndToEnd", i);
				if (p > 0) {
					q = r - 1
				} else {
					if (p < 0) {
						t = r + 1
					} else {
						return {
							node : l
						}
					}
				}
			}
			if (p < 0) {
				if (!l) {
					k.moveToElementText(s);
					k.collapse(true);
					l = s;
					n = true
				} else {
					k.collapse(false)
				}
				k.setEndPoint(j ? "EndToStart" : "EndToEnd", i);
				if (k.compareEndPoints(j ? "StartToStart" : "StartToEnd", i) > 0) {
					k = i.duplicate();
					k.collapse(j);
					o = -1;
					while (s == k.parentElement()) {
						if (k.move("character", -1) == 0) {
							break
						}
						o++
					}
				}
				o = o || k.text.replace("\r\n", " ").length
			} else {
				k.collapse(true);
				k.setEndPoint(j ? "StartToStart" : "StartToEnd", i);
				o = k.text.replace("\r\n", " ").length
			}
			return {
				node : l,
				position : p,
				offset : o,
				inside : n
			}
		}
		function g() {
			var i = d.getRng(), r = h.createRng(), l, k, p, q, m, j;
			l = i.item ? i.item(0) : i.parentElement();
			if (l.ownerDocument != h.doc) {
				return r
			}
			k = d.isCollapsed();
			if (i.item) {
				r.setStart(l.parentNode, h.nodeIndex(l));
				r.setEnd(r.startContainer, r.startOffset + 1);
				return r
			}
			function o(A) {
				var u = e(i, A), s, y, z = 0, x, v, t;
				s = u.node;
				y = u.offset;
				if (u.inside && !s.hasChildNodes()) {
					r[A ? "setStart" : "setEnd"](s, 0);
					return
				}
				if (y === v) {
					r[A ? "setStartBefore" : "setEndAfter"](s);
					return
				}
				if (u.position < 0) {
					x = u.inside ? s.firstChild : s.nextSibling;
					if (!x) {
						r[A ? "setStartAfter" : "setEndAfter"](s);
						return
					}
					if (!y) {
						if (x.nodeType == 3) {
							r[A ? "setStart" : "setEnd"](x, 0)
						} else {
							r[A ? "setStartBefore" : "setEndBefore"](x)
						}
						return
					}
					while (x) {
						t = x.nodeValue;
						z += t.length;
						if (z >= y) {
							s = x;
							z -= y;
							z = t.length - z;
							break
						}
						x = x.nextSibling
					}
				} else {
					x = s.previousSibling;
					if (!x) {
						return r[A ? "setStartBefore" : "setEndBefore"](s)
					}
					if (!y) {
						if (s.nodeType == 3) {
							r[A ? "setStart" : "setEnd"](x, s.nodeValue.length)
						} else {
							r[A ? "setStartAfter" : "setEndAfter"](x)
						}
						return
					}
					while (x) {
						z += x.nodeValue.length;
						if (z >= y) {
							s = x;
							z -= y;
							break
						}
						x = x.previousSibling
					}
				}
				r[A ? "setStart" : "setEnd"](s, z)
			}
			try {
				o(true);
				if (!k) {
					o()
				}
			} catch (n) {
				if (n.number == -2147024809) {
					m = b.getBookmark(2);
					p = i.duplicate();
					p.collapse(true);
					l = p.parentElement();
					if (!k) {
						p = i.duplicate();
						p.collapse(false);
						q = p.parentElement();
						q.innerHTML = q.innerHTML
					}
					l.innerHTML = l.innerHTML;
					b.moveToBookmark(m);
					i = d.getRng();
					o(true);
					if (!k) {
						o()
					}
				} else {
					throw n
				}
			}
			return r
		}
		this.getBookmark = function(m) {
			var j = d.getRng(), o, i, l = {};
			function n(u) {
				var u, t, p, s, r, q = [];
				t = u.parentNode;
				p = h.getRoot().parentNode;
				while (t != p && t.nodeType !== 9) {
					s = t.children;
					r = s.length;
					while (r--) {
						if (u === s[r]) {
							q.push(r);
							break
						}
					}
					u = t;
					t = t.parentNode
				}
				return q
			}
			function k(q) {
				var p;
				p = e(j, q);
				if (p) {
					return {
						position : p.position,
						offset : p.offset,
						indexes : n(p.node),
						inside : p.inside
					}
				}
			}
			if (m === 2) {
				if (!j.item) {
					l.start = k(true);
					if (!d.isCollapsed()) {
						l.end = k()
					}
				} else {
					l.start = {
						ctrl : true,
						indexes : n(j.item(0))
					}
				}
			}
			return l
		};
		this.moveToBookmark = function(k) {
			var j, i = h.doc.body;
			function m(o) {
				var r, q, n, p;
				r = h.getRoot();
				for (q = o.length - 1; q >= 0; q--) {
					p = r.children;
					n = o[q];
					if (n <= p.length - 1) {
						r = p[n]
					}
				}
				return r
			}
			function l(r) {
				var n = k[r ? "start" : "end"], q, p, o;
				if (n) {
					q = n.position > 0;
					p = i.createTextRange();
					p.moveToElementText(m(n.indexes));
					offset = n.offset;
					if (offset !== o) {
						p.collapse(n.inside || q);
						p.moveStart("character", q ? -offset : offset)
					} else {
						p.collapse(r)
					}
					j.setEndPoint(r ? "StartToStart" : "EndToStart", p);
					if (r) {
						j.collapse(true)
					}
				}
			}
			if (k.start) {
				if (k.start.ctrl) {
					j = i.createControlRange();
					j.addElement(m(k.start.indexes));
					j.select()
				} else {
					j = i.createTextRange();
					l(true);
					l();
					j.select()
				}
			}
		};
		this.addRange = function(i) {
			var n, l, k, p, s, q, r = d.dom.doc, m = r.body;
			function j(z) {
				var u, y, t, x, v;
				t = h.create("a");
				u = z ? k : s;
				y = z ? p : q;
				x = n.duplicate();
				if (u == r || u == r.documentElement) {
					u = m;
					y = 0
				}
				if (u.nodeType == 3) {
					u.parentNode.insertBefore(t, u);
					x.moveToElementText(t);
					x.moveStart("character", y);
					h.remove(t);
					n.setEndPoint(z ? "StartToStart" : "EndToEnd", x)
				} else {
					v = u.childNodes;
					if (v.length) {
						if (y >= v.length) {
							h.insertAfter(t, v[v.length - 1])
						} else {
							u.insertBefore(t, v[y])
						}
						x.moveToElementText(t)
					} else {
						t = r.createTextNode("\uFEFF");
						u.appendChild(t);
						x.moveToElementText(t.parentNode);
						x.collapse(c)
					}
					n.setEndPoint(z ? "StartToStart" : "EndToEnd", x);
					h.remove(t)
				}
			}
			k = i.startContainer;
			p = i.startOffset;
			s = i.endContainer;
			q = i.endOffset;
			n = m.createTextRange();
			if (k == s && k.nodeType == 1 && p == q - 1) {
				if (p == q - 1) {
					try {
						l = m.createControlRange();
						l.addElement(k.childNodes[p]);
						l.select();
						return
					} catch (o) {
					}
				}
			}
			j(true);
			j();
			n.select()
		};
		this.getRangeAt = g
	}
	tinymce.dom.TridentSelection = a
})();
(function() {
	var p = /((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g, j = 0, d = Object.prototype.toString, o = false, i = true;
	[ 0, 0 ].sort(function() {
		i = false;
		return 0
	});
	var b = function(v, e, z, A) {
		z = z || [];
		e = e || document;
		var C = e;
		if (e.nodeType !== 1 && e.nodeType !== 9) {
			return []
		}
		if (!v || typeof v !== "string") {
			return z
		}
		var x = [], s, E, H, r, u = true, t = b.isXML(e), B = v, D, G, F, y;
		do {
			p.exec("");
			s = p.exec(B);
			if (s) {
				B = s[3];
				x.push(s[1]);
				if (s[2]) {
					r = s[3];
					break
				}
			}
		} while (s);
		if (x.length > 1 && k.exec(v)) {
			if (x.length === 2 && f.relative[x[0]]) {
				E = h(x[0] + x[1], e)
			} else {
				E = f.relative[x[0]] ? [ e ] : b(x.shift(), e);
				while (x.length) {
					v = x.shift();
					if (f.relative[v]) {
						v += x.shift()
					}
					E = h(v, E)
				}
			}
		} else {
			if (!A && x.length > 1 && e.nodeType === 9 && !t
					&& f.match.ID.test(x[0])
					&& !f.match.ID.test(x[x.length - 1])) {
				D = b.find(x.shift(), e, t);
				e = D.expr ? b.filter(D.expr, D.set)[0] : D.set[0]
			}
			if (e) {
				D = A ? {
					expr : x.pop(),
					set : a(A)
				} : b.find(x.pop(),
						x.length === 1 && (x[0] === "~" || x[0] === "+")
								&& e.parentNode ? e.parentNode : e, t);
				E = D.expr ? b.filter(D.expr, D.set) : D.set;
				if (x.length > 0) {
					H = a(E)
				} else {
					u = false
				}
				while (x.length) {
					G = x.pop();
					F = G;
					if (!f.relative[G]) {
						G = ""
					} else {
						F = x.pop()
					}
					if (F == null) {
						F = e
					}
					f.relative[G](H, F, t)
				}
			} else {
				H = x = []
			}
		}
		if (!H) {
			H = E
		}
		if (!H) {
			b.error(G || v)
		}
		if (d.call(H) === "[object Array]") {
			if (!u) {
				z.push.apply(z, H)
			} else {
				if (e && e.nodeType === 1) {
					for (y = 0; H[y] != null; y++) {
						if (H[y]
								&& (H[y] === true || H[y].nodeType === 1
										&& b.contains(e, H[y]))) {
							z.push(E[y])
						}
					}
				} else {
					for (y = 0; H[y] != null; y++) {
						if (H[y] && H[y].nodeType === 1) {
							z.push(E[y])
						}
					}
				}
			}
		} else {
			a(H, z)
		}
		if (r) {
			b(r, C, z, A);
			b.uniqueSort(z)
		}
		return z
	};
	b.uniqueSort = function(r) {
		if (c) {
			o = i;
			r.sort(c);
			if (o) {
				for ( var e = 1; e < r.length; e++) {
					if (r[e] === r[e - 1]) {
						r.splice(e--, 1)
					}
				}
			}
		}
		return r
	};
	b.matches = function(e, r) {
		return b(e, null, null, r)
	};
	b.find = function(y, e, z) {
		var x;
		if (!y) {
			return []
		}
		for ( var t = 0, s = f.order.length; t < s; t++) {
			var v = f.order[t], u;
			if ((u = f.leftMatch[v].exec(y))) {
				var r = u[1];
				u.splice(1, 1);
				if (r.substr(r.length - 1) !== "\\") {
					u[1] = (u[1] || "").replace(/\\/g, "");
					x = f.find[v](u, e, z);
					if (x != null) {
						y = y.replace(f.match[v], "");
						break
					}
				}
			}
		}
		if (!x) {
			x = e.getElementsByTagName("*")
		}
		return {
			set : x,
			expr : y
		}
	};
	b.filter = function(C, B, F, u) {
		var s = C, H = [], z = B, x, e, y = B && B[0] && b.isXML(B[0]);
		while (C && B.length) {
			for ( var A in f.filter) {
				if ((x = f.leftMatch[A].exec(C)) != null && x[2]) {
					var r = f.filter[A], G, E, t = x[1];
					e = false;
					x.splice(1, 1);
					if (t.substr(t.length - 1) === "\\") {
						continue
					}
					if (z === H) {
						H = []
					}
					if (f.preFilter[A]) {
						x = f.preFilter[A](x, z, F, H, u, y);
						if (!x) {
							e = G = true
						} else {
							if (x === true) {
								continue
							}
						}
					}
					if (x) {
						for ( var v = 0; (E = z[v]) != null; v++) {
							if (E) {
								G = r(E, x, v, z);
								var D = u ^ !!G;
								if (F && G != null) {
									if (D) {
										e = true
									} else {
										z[v] = false
									}
								} else {
									if (D) {
										H.push(E);
										e = true
									}
								}
							}
						}
					}
					if (G !== undefined) {
						if (!F) {
							z = H
						}
						C = C.replace(f.match[A], "");
						if (!e) {
							return []
						}
						break
					}
				}
			}
			if (C === s) {
				if (e == null) {
					b.error(C)
				} else {
					break
				}
			}
			s = C
		}
		return z
	};
	b.error = function(e) {
		throw "Syntax error, unrecognized expression: " + e
	};
	var f = b.selectors = {
		order : [ "ID", "NAME", "TAG" ],
		match : {
			ID : /#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,
			CLASS : /\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,
			NAME : /\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,
			ATTR : /\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(['"]*)(.*?)\3|)\s*\]/,
			TAG : /^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,
			CHILD : /:(only|nth|last|first)-child(?:\((even|odd|[\dn+\-]*)\))?/,
			POS : /:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/,
			PSEUDO : /:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/
		},
		leftMatch : {},
		attrMap : {
			"class" : "className",
			"for" : "htmlFor"
		},
		attrHandle : {
			href : function(e) {
				return e.getAttribute("href")
			}
		},
		relative : {
			"+" : function(x, r) {
				var t = typeof r === "string", v = t && !/\W/.test(r), y = t
						&& !v;
				if (v) {
					r = r.toLowerCase()
				}
				for ( var s = 0, e = x.length, u; s < e; s++) {
					if ((u = x[s])) {
						while ((u = u.previousSibling) && u.nodeType !== 1) {
						}
						x[s] = y || u && u.nodeName.toLowerCase() === r ? u || false
								: u === r
					}
				}
				if (y) {
					b.filter(r, x, true)
				}
			},
			">" : function(x, r) {
				var u = typeof r === "string", v, s = 0, e = x.length;
				if (u && !/\W/.test(r)) {
					r = r.toLowerCase();
					for (; s < e; s++) {
						v = x[s];
						if (v) {
							var t = v.parentNode;
							x[s] = t.nodeName.toLowerCase() === r ? t : false
						}
					}
				} else {
					for (; s < e; s++) {
						v = x[s];
						if (v) {
							x[s] = u ? v.parentNode : v.parentNode === r
						}
					}
					if (u) {
						b.filter(r, x, true)
					}
				}
			},
			"" : function(t, r, v) {
				var s = j++, e = q, u;
				if (typeof r === "string" && !/\W/.test(r)) {
					r = r.toLowerCase();
					u = r;
					e = n
				}
				e("parentNode", r, s, t, u, v)
			},
			"~" : function(t, r, v) {
				var s = j++, e = q, u;
				if (typeof r === "string" && !/\W/.test(r)) {
					r = r.toLowerCase();
					u = r;
					e = n
				}
				e("previousSibling", r, s, t, u, v)
			}
		},
		find : {
			ID : function(r, s, t) {
				if (typeof s.getElementById !== "undefined" && !t) {
					var e = s.getElementById(r[1]);
					return e ? [ e ] : []
				}
			},
			NAME : function(s, v) {
				if (typeof v.getElementsByName !== "undefined") {
					var r = [], u = v.getElementsByName(s[1]);
					for ( var t = 0, e = u.length; t < e; t++) {
						if (u[t].getAttribute("name") === s[1]) {
							r.push(u[t])
						}
					}
					return r.length === 0 ? null : r
				}
			},
			TAG : function(e, r) {
				return r.getElementsByTagName(e[1])
			}
		},
		preFilter : {
			CLASS : function(t, r, s, e, x, y) {
				t = " " + t[1].replace(/\\/g, "") + " ";
				if (y) {
					return t
				}
				for ( var u = 0, v; (v = r[u]) != null; u++) {
					if (v) {
						if (x
								^ (v.className && (" " + v.className + " ")
										.replace(/[\t\n]/g, " ").indexOf(t) >= 0)) {
							if (!s) {
								e.push(v)
							}
						} else {
							if (s) {
								r[u] = false
							}
						}
					}
				}
				return false
			},
			ID : function(e) {
				return e[1].replace(/\\/g, "")
			},
			TAG : function(r, e) {
				return r[1].toLowerCase()
			},
			CHILD : function(e) {
				if (e[1] === "nth") {
					var r = /(-?)(\d*)n((?:\+|-)?\d*)/.exec(e[2] === "even"
							&& "2n" || e[2] === "odd" && "2n+1"
							|| !/\D/.test(e[2]) && "0n+" + e[2] || e[2]);
					e[2] = (r[1] + (r[2] || 1)) - 0;
					e[3] = r[3] - 0
				}
				e[0] = j++;
				return e
			},
			ATTR : function(u, r, s, e, v, x) {
				var t = u[1].replace(/\\/g, "");
				if (!x && f.attrMap[t]) {
					u[1] = f.attrMap[t]
				}
				if (u[2] === "~=") {
					u[4] = " " + u[4] + " "
				}
				return u
			},
			PSEUDO : function(u, r, s, e, v) {
				if (u[1] === "not") {
					if ((p.exec(u[3]) || "").length > 1 || /^\w/.test(u[3])) {
						u[3] = b(u[3], null, null, r)
					} else {
						var t = b.filter(u[3], r, s, true ^ v);
						if (!s) {
							e.push.apply(e, t)
						}
						return false
					}
				} else {
					if (f.match.POS.test(u[0]) || f.match.CHILD.test(u[0])) {
						return true
					}
				}
				return u
			},
			POS : function(e) {
				e.unshift(true);
				return e
			}
		},
		filters : {
			enabled : function(e) {
				return e.disabled === false && e.type !== "hidden"
			},
			disabled : function(e) {
				return e.disabled === true
			},
			checked : function(e) {
				return e.checked === true
			},
			selected : function(e) {
				e.parentNode.selectedIndex;
				return e.selected === true
			},
			parent : function(e) {
				return !!e.firstChild
			},
			empty : function(e) {
				return !e.firstChild
			},
			has : function(s, r, e) {
				return !!b(e[3], s).length
			},
			header : function(e) {
				return (/h\d/i).test(e.nodeName)
			},
			text : function(e) {
				return "text" === e.type
			},
			radio : function(e) {
				return "radio" === e.type
			},
			checkbox : function(e) {
				return "checkbox" === e.type
			},
			file : function(e) {
				return "file" === e.type
			},
			password : function(e) {
				return "password" === e.type
			},
			submit : function(e) {
				return "submit" === e.type
			},
			image : function(e) {
				return "image" === e.type
			},
			reset : function(e) {
				return "reset" === e.type
			},
			button : function(e) {
				return "button" === e.type
						|| e.nodeName.toLowerCase() === "button"
			},
			input : function(e) {
				return (/input|select|textarea|button/i).test(e.nodeName)
			}
		},
		setFilters : {
			first : function(r, e) {
				return e === 0
			},
			last : function(s, r, e, t) {
				return r === t.length - 1
			},
			even : function(r, e) {
				return e % 2 === 0
			},
			odd : function(r, e) {
				return e % 2 === 1
			},
			lt : function(s, r, e) {
				return r < e[3] - 0
			},
			gt : function(s, r, e) {
				return r > e[3] - 0
			},
			nth : function(s, r, e) {
				return e[3] - 0 === r
			},
			eq : function(s, r, e) {
				return e[3] - 0 === r
			}
		},
		filter : {
			PSEUDO : function(s, y, x, z) {
				var e = y[1], r = f.filters[e];
				if (r) {
					return r(s, x, y, z)
				} else {
					if (e === "contains") {
						return (s.textContent || s.innerText
								|| b.getText( [ s ]) || "").indexOf(y[3]) >= 0
					} else {
						if (e === "not") {
							var t = y[3];
							for ( var v = 0, u = t.length; v < u; v++) {
								if (t[v] === s) {
									return false
								}
							}
							return true
						} else {
							b.error("Syntax error, unrecognized expression: "
									+ e)
						}
					}
				}
			},
			CHILD : function(e, t) {
				var x = t[1], r = e;
				switch (x) {
				case "only":
				case "first":
					while ((r = r.previousSibling)) {
						if (r.nodeType === 1) {
							return false
						}
					}
					if (x === "first") {
						return true
					}
					r = e;
				case "last":
					while ((r = r.nextSibling)) {
						if (r.nodeType === 1) {
							return false
						}
					}
					return true;
				case "nth":
					var s = t[2], A = t[3];
					if (s === 1 && A === 0) {
						return true
					}
					var v = t[0], z = e.parentNode;
					if (z && (z.sizcache !== v || !e.nodeIndex)) {
						var u = 0;
						for (r = z.firstChild; r; r = r.nextSibling) {
							if (r.nodeType === 1) {
								r.nodeIndex = ++u
							}
						}
						z.sizcache = v
					}
					var y = e.nodeIndex - A;
					if (s === 0) {
						return y === 0
					} else {
						return (y % s === 0 && y / s >= 0)
					}
				}
			},
			ID : function(r, e) {
				return r.nodeType === 1 && r.getAttribute("id") === e
			},
			TAG : function(r, e) {
				return (e === "*" && r.nodeType === 1)
						|| r.nodeName.toLowerCase() === e
			},
			CLASS : function(r, e) {
				return (" " + (r.className || r.getAttribute("class")) + " ")
						.indexOf(e) > -1
			},
			ATTR : function(v, t) {
				var s = t[1], e = f.attrHandle[s] ? f.attrHandle[s](v)
						: v[s] != null ? v[s] : v.getAttribute(s), x = e + "", u = t[2], r = t[4];
				return e == null ? u === "!="
						: u === "=" ? x === r
								: u === "*=" ? x.indexOf(r) >= 0
										: u === "~=" ? (" " + x + " ")
												.indexOf(r) >= 0
												: !r ? x && e !== false
														: u === "!=" ? x !== r
																: u === "^=" ? x
																		.indexOf(r) === 0
																		: u === "$=" ? x
																				.substr(x.length
																						- r.length) === r
																				: u === "|=" ? x === r
																						|| x
																								.substr(
																										0,
																										r.length + 1) === r
																								+ "-"
																						: false
			},
			POS : function(u, r, s, v) {
				var e = r[2], t = f.setFilters[e];
				if (t) {
					return t(u, s, r, v)
				}
			}
		}
	};
	var k = f.match.POS, g = function(r, e) {
		return "\\" + (e - 0 + 1)
	};
	for ( var m in f.match) {
		f.match[m] = new RegExp(f.match[m].source
				+ (/(?![^\[]*\])(?![^\(]*\))/.source));
		f.leftMatch[m] = new RegExp(/(^(?:.|\r|\n)*?)/.source
				+ f.match[m].source.replace(/\\(\d+)/g, g))
	}
	var a = function(r, e) {
		r = Array.prototype.slice.call(r, 0);
		if (e) {
			e.push.apply(e, r);
			return e
		}
		return r
	};
	try {
		Array.prototype.slice.call(document.documentElement.childNodes, 0)[0].nodeType
	} catch (l) {
		a = function(u, t) {
			var r = t || [], s = 0;
			if (d.call(u) === "[object Array]") {
				Array.prototype.push.apply(r, u)
			} else {
				if (typeof u.length === "number") {
					for ( var e = u.length; s < e; s++) {
						r.push(u[s])
					}
				} else {
					for (; u[s]; s++) {
						r.push(u[s])
					}
				}
			}
			return r
		}
	}
	var c;
	if (document.documentElement.compareDocumentPosition) {
		c = function(r, e) {
			if (!r.compareDocumentPosition || !e.compareDocumentPosition) {
				if (r == e) {
					o = true
				}
				return r.compareDocumentPosition ? -1 : 1
			}
			var s = r.compareDocumentPosition(e) & 4 ? -1 : r === e ? 0 : 1;
			if (s === 0) {
				o = true
			}
			return s
		}
	} else {
		if ("sourceIndex" in document.documentElement) {
			c = function(r, e) {
				if (!r.sourceIndex || !e.sourceIndex) {
					if (r == e) {
						o = true
					}
					return r.sourceIndex ? -1 : 1
				}
				var s = r.sourceIndex - e.sourceIndex;
				if (s === 0) {
					o = true
				}
				return s
			}
		} else {
			if (document.createRange) {
				c = function(t, r) {
					if (!t.ownerDocument || !r.ownerDocument) {
						if (t == r) {
							o = true
						}
						return t.ownerDocument ? -1 : 1
					}
					var s = t.ownerDocument.createRange(), e = r.ownerDocument
							.createRange();
					s.setStart(t, 0);
					s.setEnd(t, 0);
					e.setStart(r, 0);
					e.setEnd(r, 0);
					var u = s.compareBoundaryPoints(Range.START_TO_END, e);
					if (u === 0) {
						o = true
					}
					return u
				}
			}
		}
	}
	b.getText = function(e) {
		var r = "", t;
		for ( var s = 0; e[s]; s++) {
			t = e[s];
			if (t.nodeType === 3 || t.nodeType === 4) {
				r += t.nodeValue
			} else {
				if (t.nodeType !== 8) {
					r += b.getText(t.childNodes)
				}
			}
		}
		return r
	};
	(function() {
		var r = document.createElement("div"), s = "script"
				+ (new Date()).getTime();
		r.innerHTML = "<a name='" + s + "'/>";
		var e = document.documentElement;
		e.insertBefore(r, e.firstChild);
		if (document.getElementById(s)) {
			f.find.ID = function(u, v, x) {
				if (typeof v.getElementById !== "undefined" && !x) {
					var t = v.getElementById(u[1]);
					return t ? t.id === u[1]
							|| typeof t.getAttributeNode !== "undefined"
							&& t.getAttributeNode("id").nodeValue === u[1] ? [ t ]
							: undefined
							: []
				}
			};
			f.filter.ID = function(v, t) {
				var u = typeof v.getAttributeNode !== "undefined"
						&& v.getAttributeNode("id");
				return v.nodeType === 1 && u && u.nodeValue === t
			}
		}
		e.removeChild(r);
		e = r = null
	})();
	(function() {
		var e = document.createElement("div");
		e.appendChild(document.createComment(""));
		if (e.getElementsByTagName("*").length > 0) {
			f.find.TAG = function(r, v) {
				var u = v.getElementsByTagName(r[1]);
				if (r[1] === "*") {
					var t = [];
					for ( var s = 0; u[s]; s++) {
						if (u[s].nodeType === 1) {
							t.push(u[s])
						}
					}
					u = t
				}
				return u
			}
		}
		e.innerHTML = "<a href='#'></a>";
		if (e.firstChild && typeof e.firstChild.getAttribute !== "undefined"
				&& e.firstChild.getAttribute("href") !== "#") {
			f.attrHandle.href = function(r) {
				return r.getAttribute("href", 2)
			}
		}
		e = null
	})();
	if (document.querySelectorAll) {
		(function() {
			var e = b, s = document.createElement("div");
			s.innerHTML = "<p class='TEST'></p>";
			if (s.querySelectorAll && s.querySelectorAll(".TEST").length === 0) {
				return
			}
			b = function(x, v, t, u) {
				v = v || document;
				if (!u && v.nodeType === 9 && !b.isXML(v)) {
					try {
						return a(v.querySelectorAll(x), t)
					} catch (y) {
					}
				}
				return e(x, v, t, u)
			};
			for ( var r in e) {
				b[r] = e[r]
			}
			s = null
		})()
	}
	(function() {
		var e = document.createElement("div");
		e.innerHTML = "<div class='test e'></div><div class='test'></div>";
		if (!e.getElementsByClassName
				|| e.getElementsByClassName("e").length === 0) {
			return
		}
		e.lastChild.className = "e";
		if (e.getElementsByClassName("e").length === 1) {
			return
		}
		f.order.splice(1, 0, "CLASS");
		f.find.CLASS = function(r, s, t) {
			if (typeof s.getElementsByClassName !== "undefined" && !t) {
				return s.getElementsByClassName(r[1])
			}
		};
		e = null
	})();
	function n(r, x, v, A, y, z) {
		for ( var t = 0, s = A.length; t < s; t++) {
			var e = A[t];
			if (e) {
				e = e[r];
				var u = false;
				while (e) {
					if (e.sizcache === v) {
						u = A[e.sizset];
						break
					}
					if (e.nodeType === 1 && !z) {
						e.sizcache = v;
						e.sizset = t
					}
					if (e.nodeName.toLowerCase() === x) {
						u = e;
						break
					}
					e = e[r]
				}
				A[t] = u
			}
		}
	}
	function q(r, x, v, A, y, z) {
		for ( var t = 0, s = A.length; t < s; t++) {
			var e = A[t];
			if (e) {
				e = e[r];
				var u = false;
				while (e) {
					if (e.sizcache === v) {
						u = A[e.sizset];
						break
					}
					if (e.nodeType === 1) {
						if (!z) {
							e.sizcache = v;
							e.sizset = t
						}
						if (typeof x !== "string") {
							if (e === x) {
								u = true;
								break
							}
						} else {
							if (b.filter(x, [ e ]).length > 0) {
								u = e;
								break
							}
						}
					}
					e = e[r]
				}
				A[t] = u
			}
		}
	}
	b.contains = document.compareDocumentPosition ? function(r, e) {
		return !!(r.compareDocumentPosition(e) & 16)
	} : function(r, e) {
		return r !== e && (r.contains ? r.contains(e) : true)
	};
	b.isXML = function(e) {
		var r = (e ? e.ownerDocument || e : 0).documentElement;
		return r ? r.nodeName !== "HTML" : false
	};
	var h = function(e, y) {
		var t = [], u = "", v, s = y.nodeType ? [ y ] : y;
		while ((v = f.match.PSEUDO.exec(e))) {
			u += v[0];
			e = e.replace(f.match.PSEUDO, "")
		}
		e = f.relative[e] ? e + "*" : e;
		for ( var x = 0, r = s.length; x < r; x++) {
			b(e, s[x], t)
		}
		return b.filter(u, t)
	};
	window.tinymce.dom.Sizzle = b
})();
(function(d) {
	var f = d.each, c = d.DOM, b = d.isIE, e = d.isWebKit, a;
	d.create("tinymce.dom.EventUtils", {
		EventUtils : function() {
			this.inits = [];
			this.events = []
		},
		add : function(m, p, l, j) {
			var g, h = this, i = h.events, k;
			if (p instanceof Array) {
				k = [];
				f(p, function(o) {
					k.push(h.add(m, o, l, j))
				});
				return k
			}
			if (m && m.hasOwnProperty && m instanceof Array) {
				k = [];
				f(m, function(n) {
					n = c.get(n);
					k.push(h.add(n, p, l, j))
				});
				return k
			}
			m = c.get(m);
			if (!m) {
				return
			}
			g = function(n) {
				if (h.disabled) {
					return
				}
				n = n || window.event;
				if (n && b) {
					if (!n.target) {
						n.target = n.srcElement
					}
					d.extend(n, h._stoppers)
				}
				if (!j) {
					return l(n)
				}
				return l.call(j, n)
			};
			if (p == "unload") {
				d.unloads.unshift( {
					func : g
				});
				return g
			}
			if (p == "init") {
				if (h.domLoaded) {
					g()
				} else {
					h.inits.push(g)
				}
				return g
			}
			i.push( {
				obj : m,
				name : p,
				func : l,
				cfunc : g,
				scope : j
			});
			h._add(m, p, g);
			return l
		},
		remove : function(l, m, k) {
			var h = this, g = h.events, i = false, j;
			if (l && l.hasOwnProperty && l instanceof Array) {
				j = [];
				f(l, function(n) {
					n = c.get(n);
					j.push(h.remove(n, m, k))
				});
				return j
			}
			l = c.get(l);
			f(g, function(o, n) {
				if (o.obj == l && o.name == m
						&& (!k || (o.func == k || o.cfunc == k))) {
					g.splice(n, 1);
					h._remove(l, m, o.cfunc);
					i = true;
					return false
				}
			});
			return i
		},
		clear : function(l) {
			var j = this, g = j.events, h, k;
			if (l) {
				l = c.get(l);
				for (h = g.length - 1; h >= 0; h--) {
					k = g[h];
					if (k.obj === l) {
						j._remove(k.obj, k.name, k.cfunc);
						k.obj = k.cfunc = null;
						g.splice(h, 1)
					}
				}
			}
		},
		cancel : function(g) {
			if (!g) {
				return false
			}
			this.stop(g);
			return this.prevent(g)
		},
		stop : function(g) {
			if (g.stopPropagation) {
				g.stopPropagation()
			} else {
				g.cancelBubble = true
			}
			return false
		},
		prevent : function(g) {
			if (g.preventDefault) {
				g.preventDefault()
			} else {
				g.returnValue = false
			}
			return false
		},
		destroy : function() {
			var g = this;
			f(g.events, function(j, h) {
				g._remove(j.obj, j.name, j.cfunc);
				j.obj = j.cfunc = null
			});
			g.events = [];
			g = null
		},
		_add : function(h, i, g) {
			if (h.attachEvent) {
				h.attachEvent("on" + i, g)
			} else {
				if (h.addEventListener) {
					h.addEventListener(i, g, false)
				} else {
					h["on" + i] = g
				}
			}
		},
		_remove : function(i, j, h) {
			if (i) {
				try {
					if (i.detachEvent) {
						i.detachEvent("on" + j, h)
					} else {
						if (i.removeEventListener) {
							i.removeEventListener(j, h, false)
						} else {
							i["on" + j] = null
						}
					}
				} catch (g) {
				}
			}
		},
		_pageInit : function(h) {
			var g = this;
			if (g.domLoaded) {
				return
			}
			g.domLoaded = true;
			f(g.inits, function(i) {
				i()
			});
			g.inits = []
		},
		_wait : function(i) {
			var g = this, h = i.document;
			if (i.tinyMCE_GZ && tinyMCE_GZ.loaded) {
				g.domLoaded = 1;
				return
			}
			if (h.readyState === "complete") {
				g._pageInit(i);
				return
			}
			if (h.attachEvent) {
				h.attachEvent("onreadystatechange", function() {
					if (h.readyState === "complete") {
						h.detachEvent("onreadystatechange", arguments.callee);
						g._pageInit(i)
					}
				});
				if (h.documentElement.doScroll && i == i.top) {
					(function() {
						if (g.domLoaded) {
							return
						}
						try {
							h.documentElement.doScroll("left")
						} catch (j) {
							setTimeout(arguments.callee, 0);
							return
						}
						g._pageInit(i)
					})()
				}
			} else {
				if (h.addEventListener) {
					g._add(i, "DOMContentLoaded", function() {
						g._pageInit(i)
					})
				}
			}
			g._add(i, "load", function() {
				g._pageInit(i)
			})
		},
		_stoppers : {
			preventDefault : function() {
				this.returnValue = false
			},
			stopPropagation : function() {
				this.cancelBubble = true
			}
		}
	});
	a = d.dom.Event = new d.dom.EventUtils();
	a._wait(window);
	d.addUnload(function() {
		a.destroy()
	})
})(tinymce);
(function(a) {
	a.dom.Element = function(f, d) {
		var b = this, e, c;
		b.settings = d = d || {};
		b.id = f;
		b.dom = e = d.dom || a.DOM;
		if (!a.isIE) {
			c = e.get(b.id)
		}
		a
				.each(
						("getPos,getRect,getParent,add,setStyle,getStyle,setStyles,setAttrib,setAttribs,getAttrib,addClass,removeClass,hasClass,getOuterHTML,setOuterHTML,remove,show,hide,isHidden,setHTML,get")
								.split(/,/), function(g) {
							b[g] = function() {
								var h = [ f ], j;
								for (j = 0; j < arguments.length; j++) {
									h.push(arguments[j])
								}
								h = e[g].apply(e, h);
								b.update(g);
								return h
							}
						});
		a.extend(b, {
			on : function(i, h, g) {
				return a.dom.Event.add(b.id, i, h, g)
			},
			getXY : function() {
				return {
					x : parseInt(b.getStyle("left")),
					y : parseInt(b.getStyle("top"))
				}
			},
			getSize : function() {
				var g = e.get(b.id);
				return {
					w : parseInt(b.getStyle("width") || g.clientWidth),
					h : parseInt(b.getStyle("height") || g.clientHeight)
				}
			},
			moveTo : function(g, h) {
				b.setStyles( {
					left : g,
					top : h
				})
			},
			moveBy : function(g, i) {
				var h = b.getXY();
				b.moveTo(h.x + g, h.y + i)
			},
			resizeTo : function(g, i) {
				b.setStyles( {
					width : g,
					height : i
				})
			},
			resizeBy : function(g, j) {
				var i = b.getSize();
				b.resizeTo(i.w + g, i.h + j)
			},
			update : function(h) {
				var g;
				if (a.isIE6 && d.blocker) {
					h = h || "";
					if (h.indexOf("get") === 0 || h.indexOf("has") === 0
							|| h.indexOf("is") === 0) {
						return
					}
					if (h == "remove") {
						e.remove(b.blocker);
						return
					}
					if (!b.blocker) {
						b.blocker = e.uniqueId();
						g = e.add(d.container || e.getRoot(), "iframe", {
							id : b.blocker,
							style : "position:absolute;",
							frameBorder : 0,
							src : 'javascript:""'
						});
						e.setStyle(g, "opacity", 0)
					} else {
						g = e.get(b.blocker)
					}
					e.setStyles(g, {
						left : b.getStyle("left", 1),
						top : b.getStyle("top", 1),
						width : b.getStyle("width", 1),
						height : b.getStyle("height", 1),
						display : b.getStyle("display", 1),
						zIndex : parseInt(b.getStyle("zIndex", 1) || 0) - 1
					})
				}
			}
		})
	}
})(tinymce);
(function(c) {
	function e(f) {
		return f.replace(/[\n\r]+/g, "")
	}
	var b = c.is, a = c.isIE, d = c.each;
	c
			.create(
					"tinymce.dom.Selection",
					{
						Selection : function(i, h, g) {
							var f = this;
							f.dom = i;
							f.win = h;
							f.serializer = g;
							d( [ "onBeforeSetContent", "onBeforeGetContent",
									"onSetContent", "onGetContent" ], function(
									j) {
								f[j] = new c.util.Dispatcher(f)
							});
							if (!f.win.getSelection) {
								f.tridentSel = new c.dom.TridentSelection(f)
							}
							if (c.isIE && i.boxModel) {
								this._fixIESelection()
							}
							c.addUnload(f.destroy, f)
						},
						setCursorLocation : function(h, i) {
							var f = this;
							var g = f.dom.createRng();
							g.setStart(h, i);
							g.setEnd(h, i);
							f.setRng(g);
							f.collapse(false)
						},
						getContent : function(g) {
							var f = this, h = f.getRng(), l = f.dom
									.create("body"), j = f.getSel(), i, k, m;
							g = g || {};
							i = k = "";
							g.get = true;
							g.format = g.format || "html";
							g.forced_root_block = "";
							f.onBeforeGetContent.dispatch(f, g);
							if (g.format == "text") {
								return f.isCollapsed() ? ""
										: (h.text || (j.toString ? j.toString()
												: ""))
							}
							if (h.cloneContents) {
								m = h.cloneContents();
								if (m) {
									l.appendChild(m)
								}
							} else {
								if (b(h.item) || b(h.htmlText)) {
									l.innerHTML = "<br>"
											+ (h.item ? h.item(0).outerHTML
													: h.htmlText);
									l.removeChild(l.firstChild)
								} else {
									l.innerHTML = h.toString()
								}
							}
							if (/^\s/.test(l.innerHTML)) {
								i = " "
							}
							if (/\s+$/.test(l.innerHTML)) {
								k = " "
							}
							g.getInner = true;
							g.content = f.isCollapsed() ? "" : i
									+ f.serializer.serialize(l, g) + k;
							f.onGetContent.dispatch(f, g);
							return g.content
						},
						setContent : function(g, i) {
							var n = this, f = n.getRng(), j, k = n.win.document, m, l;
							i = i || {
								format : "html"
							};
							i.set = true;
							g = i.content = g;
							if (!i.no_events) {
								n.onBeforeSetContent.dispatch(n, i)
							}
							g = i.content;
							if (f.insertNode) {
								g += '<span id="__caret">_</span>';
								if (f.startContainer == k
										&& f.endContainer == k) {
									k.body.innerHTML = g
								} else {
									f.deleteContents();
									if (k.body.childNodes.length == 0) {
										k.body.innerHTML = g
									} else {
										if (f.createContextualFragment) {
											f
													.insertNode(f
															.createContextualFragment(g))
										} else {
											m = k.createDocumentFragment();
											l = k.createElement("div");
											m.appendChild(l);
											l.outerHTML = g;
											f.insertNode(m)
										}
									}
								}
								j = n.dom.get("__caret");
								f = k.createRange();
								f.setStartBefore(j);
								f.setEndBefore(j);
								n.setRng(f);
								n.dom.remove("__caret");
								try {
									n.setRng(f)
								} catch (h) {
								}
							} else {
								if (f.item) {
									k.execCommand("Delete", false, null);
									f = n.getRng()
								}
								if (/^\s+/.test(g)) {
									f
											.pasteHTML('<span id="__mce_tmp">_</span>' + g);
									n.dom.remove("__mce_tmp")
								} else {
									f.pasteHTML(g)
								}
							}
							if (!i.no_events) {
								n.onSetContent.dispatch(n, i)
							}
						},
						getStart : function() {
							var g = this.getRng(), h, f, j, i;
							if (g.duplicate || g.item) {
								if (g.item) {
									return g.item(0)
								}
								j = g.duplicate();
								j.collapse(1);
								h = j.parentElement();
								f = i = g.parentElement();
								while (i = i.parentNode) {
									if (i == h) {
										h = f;
										break
									}
								}
								return h
							} else {
								h = g.startContainer;
								if (h.nodeType == 1 && h.hasChildNodes()) {
									h = h.childNodes[Math.min(
											h.childNodes.length - 1,
											g.startOffset)]
								}
								if (h && h.nodeType == 3) {
									return h.parentNode
								}
								return h
							}
						},
						getEnd : function() {
							var g = this, h = g.getRng(), i, f;
							if (h.duplicate || h.item) {
								if (h.item) {
									return h.item(0)
								}
								h = h.duplicate();
								h.collapse(0);
								i = h.parentElement();
								if (i && i.nodeName == "BODY") {
									return i.lastChild || i
								}
								return i
							} else {
								i = h.endContainer;
								f = h.endOffset;
								if (i.nodeType == 1 && i.hasChildNodes()) {
									i = i.childNodes[f > 0 ? f - 1 : f]
								}
								if (i && i.nodeType == 3) {
									return i.parentNode
								}
								return i
							}
						},
						getBookmark : function(r, s) {
							var v = this, m = v.dom, g, j, i, n, h, o, p, l = "\uFEFF", u;
							function f(x, y) {
								var t = 0;
								d(m.select(x), function(A, z) {
									if (A == y) {
										t = z
									}
								});
								return t
							}
							if (r == 2) {
								function k() {
									var x = v.getRng(true), t = m.getRoot(), y = {};
									function z(C, H) {
										var B = C[H ? "startContainer"
												: "endContainer"], G = C[H ? "startOffset"
												: "endOffset"], A = [], D, F, E = 0;
										if (B.nodeType == 3) {
											if (s) {
												for (D = B.previousSibling; D
														&& D.nodeType == 3; D = D.previousSibling) {
													G += D.nodeValue.length
												}
											}
											A.push(G)
										} else {
											F = B.childNodes;
											if (G >= F.length && F.length) {
												E = 1;
												G = Math.max(0, F.length - 1)
											}
											A
													.push(v.dom.nodeIndex(F[G],
															s)
															+ E)
										}
										for (; B && B != t; B = B.parentNode) {
											A.push(v.dom.nodeIndex(B, s))
										}
										return A
									}
									y.start = z(x, true);
									if (!v.isCollapsed()) {
										y.end = z(x)
									}
									return y
								}
								if (v.tridentSel) {
									return v.tridentSel.getBookmark(r)
								}
								return k()
							}
							if (r) {
								return {
									rng : v.getRng()
								}
							}
							g = v.getRng();
							i = m.uniqueId();
							n = tinyMCE.activeEditor.selection.isCollapsed();
							u = "overflow:hidden;line-height:0px";
							if (g.duplicate || g.item) {
								if (!g.item) {
									j = g.duplicate();
									try {
										g.collapse();
										g
												.pasteHTML('<span data-mce-type="bookmark" id="'
														+ i
														+ '_start" style="'
														+ u
														+ '">'
														+ l
														+ "</span>");
										if (!n) {
											j.collapse(false);
											g.moveToElementText(j
													.parentElement());
											if (g.compareEndPoints(
													"StartToEnd", j) == 0) {
												j.move("character", -1)
											}
											j
													.pasteHTML('<span data-mce-type="bookmark" id="'
															+ i
															+ '_end" style="'
															+ u
															+ '">'
															+ l
															+ "</span>")
										}
									} catch (q) {
										return null
									}
								} else {
									o = g.item(0);
									h = o.nodeName;
									return {
										name : h,
										index : f(h, o)
									}
								}
							} else {
								o = v.getNode();
								h = o.nodeName;
								if (h == "IMG") {
									return {
										name : h,
										index : f(h, o)
									}
								}
								j = g.cloneRange();
								if (!n) {
									j.collapse(false);
									j.insertNode(m.create("span", {
										"data-mce-type" : "bookmark",
										id : i + "_end",
										style : u
									}, l))
								}
								g.collapse(true);
								g.insertNode(m.create("span", {
									"data-mce-type" : "bookmark",
									id : i + "_start",
									style : u
								}, l))
							}
							v.moveToBookmark( {
								id : i,
								keep : 1
							});
							return {
								id : i
							}
						},
						moveToBookmark : function(n) {
							var r = this, l = r.dom, i, h, f, q, j, s, o, p;
							if (n) {
								if (n.start) {
									f = l.createRng();
									q = l.getRoot();
									function g(z) {
										var t = n[z ? "start" : "end"], v, x, y, u;
										if (t) {
											y = t[0];
											for (x = q, v = t.length - 1; v >= 1; v--) {
												u = x.childNodes;
												if (t[v] > u.length - 1) {
													return
												}
												x = u[t[v]]
											}
											if (x.nodeType === 3) {
												y = Math.min(t[0],
														x.nodeValue.length)
											}
											if (x.nodeType === 1) {
												y = Math.min(t[0],
														x.childNodes.length)
											}
											if (z) {
												f.setStart(x, y)
											} else {
												f.setEnd(x, y)
											}
										}
										return true
									}
									if (r.tridentSel) {
										return r.tridentSel.moveToBookmark(n)
									}
									if (g(true) && g()) {
										r.setRng(f)
									}
								} else {
									if (n.id) {
										function k(A) {
											var u = l.get(n.id + "_" + A), z, t, x, y, v = n.keep;
											if (u) {
												z = u.parentNode;
												if (A == "start") {
													if (!v) {
														t = l.nodeIndex(u)
													} else {
														z = u.firstChild;
														t = 1
													}
													j = s = z;
													o = p = t
												} else {
													if (!v) {
														t = l.nodeIndex(u)
													} else {
														z = u.firstChild;
														t = 1
													}
													s = z;
													p = t
												}
												if (!v) {
													y = u.previousSibling;
													x = u.nextSibling;
													d(
															c
																	.grep(u.childNodes),
															function(B) {
																if (B.nodeType == 3) {
																	B.nodeValue = B.nodeValue
																			.replace(
																					/\uFEFF/g,
																					"")
																}
															});
													while (u = l.get(n.id + "_"
															+ A)) {
														l.remove(u, 1)
													}
													if (y
															&& x
															&& y.nodeType == x.nodeType
															&& y.nodeType == 3
															&& !c.isOpera) {
														t = y.nodeValue.length;
														y
																.appendData(x.nodeValue);
														l.remove(x);
														if (A == "start") {
															j = s = y;
															o = p = t
														} else {
															s = y;
															p = t
														}
													}
												}
											}
										}
										function m(t) {
											if (l.isBlock(t) && !t.innerHTML) {
												t.innerHTML = !a ? '<br data-mce-bogus="1" />'
														: " "
											}
											return t
										}
										k("start");
										k("end");
										if (j) {
											f = l.createRng();
											f.setStart(m(j), o);
											f.setEnd(m(s), p);
											r.setRng(f)
										}
									} else {
										if (n.name) {
											r.select(l.select(n.name)[n.index])
										} else {
											if (n.rng) {
												r.setRng(n.rng)
											}
										}
									}
								}
							}
						},
						select : function(k, j) {
							var i = this, l = i.dom, g = l.createRng(), f;
							if (k) {
								f = l.nodeIndex(k);
								g.setStart(k.parentNode, f);
								g.setEnd(k.parentNode, f + 1);
								if (j) {
									function h(m, o) {
										var n = new c.dom.TreeWalker(m, m);
										do {
											if (m.nodeType == 3
													&& c.trim(m.nodeValue).length != 0) {
												if (o) {
													g.setStart(m, 0)
												} else {
													g.setEnd(m,
															m.nodeValue.length)
												}
												return
											}
											if (m.nodeName == "BR") {
												if (o) {
													g.setStartBefore(m)
												} else {
													g.setEndBefore(m)
												}
												return
											}
										} while (m = (o ? n.next() : n.prev()))
									}
									h(k, 1);
									h(k)
								}
								i.setRng(g)
							}
							return k
						},
						isCollapsed : function() {
							var f = this, h = f.getRng(), g = f.getSel();
							if (!h || h.item) {
								return false
							}
							if (h.compareEndPoints) {
								return h.compareEndPoints("StartToEnd", h) === 0
							}
							return !g || h.collapsed
						},
						collapse : function(f) {
							var h = this, g = h.getRng(), i;
							if (g.item) {
								i = g.item(0);
								g = h.win.document.body.createTextRange();
								g.moveToElementText(i)
							}
							g.collapse(!!f);
							h.setRng(g)
						},
						getSel : function() {
							var g = this, f = this.win;
							return f.getSelection ? f.getSelection()
									: f.document.selection
						},
						getRng : function(l) {
							var g = this, h, i, k, j = g.win.document;
							if (l && g.tridentSel) {
								return g.tridentSel.getRangeAt(0)
							}
							try {
								if (h = g.getSel()) {
									i = h.rangeCount > 0 ? h.getRangeAt(0)
											: (h.createRange ? h.createRange()
													: j.createRange())
								}
							} catch (f) {
							}
							if (c.isIE && i && i.setStart
									&& j.selection.createRange().item) {
								k = j.selection.createRange().item(0);
								i = j.createRange();
								i.setStartBefore(k);
								i.setEndAfter(k)
							}
							if (!i) {
								i = j.createRange ? j.createRange() : j.body
										.createTextRange()
							}
							if (g.selectedRange && g.explicitRange) {
								if (i.compareBoundaryPoints(i.START_TO_START,
										g.selectedRange) === 0
										&& i.compareBoundaryPoints(
												i.END_TO_END, g.selectedRange) === 0) {
									i = g.explicitRange
								} else {
									g.selectedRange = null;
									g.explicitRange = null
								}
							}
							return i
						},
						setRng : function(i) {
							var h, g = this;
							if (!g.tridentSel) {
								h = g.getSel();
								if (h) {
									g.explicitRange = i;
									try {
										h.removeAllRanges()
									} catch (f) {
									}
									h.addRange(i);
									g.selectedRange = h.rangeCount > 0 ? h
											.getRangeAt(0) : null
								}
							} else {
								if (i.cloneRange) {
									g.tridentSel.addRange(i);
									return
								}
								try {
									i.select()
								} catch (f) {
								}
							}
						},
						setNode : function(g) {
							var f = this;
							f.setContent(f.dom.getOuterHTML(g));
							return g
						},
						getNode : function() {
							var h = this, g = h.getRng(), i = h.getSel(), l, k = g.startContainer, f = g.endContainer;
							if (!g) {
								return h.dom.getRoot()
							}
							if (g.setStart) {
								l = g.commonAncestorContainer;
								if (!g.collapsed) {
									if (g.startContainer == g.endContainer) {
										if (g.endOffset - g.startOffset < 2) {
											if (g.startContainer
													.hasChildNodes()) {
												l = g.startContainer.childNodes[g.startOffset]
											}
										}
									}
									if (k.nodeType === 3 && f.nodeType === 3) {
										function j(p, m) {
											var o = p;
											while (p && p.nodeType === 3
													&& p.length === 0) {
												p = m ? p.nextSibling
														: p.previousSibling
											}
											return p || o
										}
										if (k.length === g.startOffset) {
											k = j(k.nextSibling, true)
										} else {
											k = k.parentNode
										}
										if (g.endOffset === 0) {
											f = j(f.previousSibling, false)
										} else {
											f = f.parentNode
										}
										if (k && k === f) {
											return k
										}
									}
								}
								if (l && l.nodeType == 3) {
									return l.parentNode
								}
								return l
							}
							return g.item ? g.item(0) : g.parentElement()
						},
						getSelectedBlocks : function(o, g) {
							var m = this, j = m.dom, l, k, h, i = [];
							l = j.getParent(o || m.getStart(), j.isBlock);
							k = j.getParent(g || m.getEnd(), j.isBlock);
							if (l) {
								i.push(l)
							}
							if (l && k && l != k) {
								h = l;
								var f = new c.dom.TreeWalker(l, j.getRoot());
								while ((h = f.next()) && h != k) {
									if (j.isBlock(h)) {
										i.push(h)
									}
								}
							}
							if (k && l != k) {
								i.push(k)
							}
							return i
						},
						normalize : function() {
							var g = this, f, i;
							if (c.isIE) {
								return
							}
							function h(p) {
								var k, o, n, m = g.dom, j = m.getRoot(), l;
								k = f[(p ? "start" : "end") + "Container"];
								o = f[(p ? "start" : "end") + "Offset"];
								if (k.nodeType === 9) {
									k = k.body;
									o = 0
								}
								if (k === j) {
									if (k.hasChildNodes()) {
										k = k.childNodes[Math.min(
												!p && o > 0 ? o - 1 : o,
												k.childNodes.length - 1)];
										o = 0;
										if (k.hasChildNodes()) {
											l = k;
											n = new c.dom.TreeWalker(k, j);
											do {
												if (l.nodeType === 3) {
													o = p ? 0
															: l.nodeValue.length - 1;
													k = l;
													i = true;
													break
												}
												if (/^(BR|IMG)$/
														.test(l.nodeName)) {
													o = m.nodeIndex(l);
													k = l.parentNode;
													if (l.nodeName == "IMG"
															&& !p) {
														o++
													}
													i = true;
													break
												}
											} while (l = (p ? n.next() : n
													.prev()))
										}
									}
								}
								if (i) {
									f["set" + (p ? "Start" : "End")](k, o)
								}
							}
							f = g.getRng();
							h(true);
							if (!f.collapsed) {
								h()
							}
							if (i) {
								g.setRng(f)
							}
						},
						destroy : function(g) {
							var f = this;
							f.win = null;
							if (!g) {
								c.removeUnload(f.destroy)
							}
						},
						_fixIESelection : function() {
							var g = this.dom, m = g.doc, h = m.body, j, n, f;
							m.documentElement.unselectable = true;
							function i(o, r) {
								var p = h.createTextRange();
								try {
									p.moveToPoint(o, r)
								} catch (q) {
									p = null
								}
								return p
							}
							function l(p) {
								var o;
								if (p.button) {
									o = i(p.x, p.y);
									if (o) {
										if (o.compareEndPoints("StartToStart",
												n) > 0) {
											o.setEndPoint("StartToStart", n)
										} else {
											o.setEndPoint("EndToEnd", n)
										}
										o.select()
									}
								} else {
									k()
								}
							}
							function k() {
								var o = m.selection.createRange();
								if (n
										&& !o.item
										&& o.compareEndPoints("StartToEnd", o) === 0) {
									n.select()
								}
								g.unbind(m, "mouseup", k);
								g.unbind(m, "mousemove", l);
								n = j = 0
							}
							g.bind(m, [ "mousedown", "contextmenu" ], function(
									o) {
								if (o.target.nodeName === "HTML") {
									if (j) {
										k()
									}
									f = m.documentElement;
									if (f.scrollHeight > f.clientHeight) {
										return
									}
									j = 1;
									n = i(o.x, o.y);
									if (n) {
										g.bind(m, "mouseup", k);
										g.bind(m, "mousemove", l);
										g.win.focus();
										n.select()
									}
								}
							})
						}
					})
})(tinymce);
(function(a) {
	a.dom.Serializer = function(e, i, f) {
		var h, b, d = a.isIE, g = a.each, c;
		if (!e.apply_source_formatting) {
			e.indent = false
		}
		i = i || a.DOM;
		f = f || new a.html.Schema(e);
		e.entity_encoding = e.entity_encoding || "named";
		e.remove_trailing_brs = "remove_trailing_brs" in e ? e.remove_trailing_brs
				: true;
		h = new a.util.Dispatcher(self);
		b = new a.util.Dispatcher(self);
		c = new a.html.DomParser(e, f);
		c
				.addAttributeFilter(
						"src,href,style",
						function(k, j) {
							var o = k.length, l, q, n = "data-mce-" + j, p = e.url_converter, r = e.url_converter_scope, m;
							while (o--) {
								l = k[o];
								q = l.attributes.map[n];
								if (q !== m) {
									l.attr(j, q.length > 0 ? q : null);
									l.attr(n, null)
								} else {
									q = l.attributes.map[j];
									if (j === "style") {
										q = i.serializeStyle(i.parseStyle(q),
												l.name)
									} else {
										if (p) {
											q = p.call(r, q, j, l.name)
										}
									}
									l.attr(j, q.length > 0 ? q : null)
								}
							}
						});
		c.addAttributeFilter("class",
				function(j, k) {
					var l = j.length, m, n;
					while (l--) {
						m = j[l];
						n = m.attr("class").replace(
								/\s*mce(Item\w+|Selected)\s*/g, "");
						m.attr("class", n.length > 0 ? n : null)
					}
				});
		c.addAttributeFilter("data-mce-type", function(j, l, k) {
			var m = j.length, n;
			while (m--) {
				n = j[m];
				if (n.attributes.map["data-mce-type"] === "bookmark"
						&& !k.cleanup) {
					n.remove()
				}
			}
		});
		c
				.addNodeFilter(
						"script,style",
						function(k, l) {
							var m = k.length, n, o;
							function j(p) {
								return p
										.replace(/(<!--\[CDATA\[|\]\]-->)/g,
												"\n")
										.replace(/^[\r\n]*|[\r\n]*$/g, "")
										.replace(
												/^\s*((<!--)?(\s*\/\/)?\s*<!\[CDATA\[|(<!--\s*)?\/\*\s*<!\[CDATA\[\s*\*\/|(\/\/)?\s*<!--|\/\*\s*<!--\s*\*\/)\s*[\r\n]*/gi,
												"")
										.replace(
												/\s*(\/\*\s*\]\]>\s*\*\/(-->)?|\s*\/\/\s*\]\]>(-->)?|\/\/\s*(-->)?|\]\]>|\/\*\s*-->\s*\*\/|\s*-->\s*)\s*$/g,
												"")
							}
							while (m--) {
								n = k[m];
								o = n.firstChild ? n.firstChild.value : "";
								if (l === "script") {
									n
											.attr(
													"type",
													(n.attr("type") || "text/javascript")
															.replace(/^mce\-/,
																	""));
									if (o.length > 0) {
										n.firstChild.value = "// <![CDATA[\n"
												+ j(o) + "\n// ]]>"
									}
								} else {
									if (o.length > 0) {
										n.firstChild.value = "<!--\n" + j(o)
												+ "\n-->"
									}
								}
							}
						});
		c.addNodeFilter("#comment", function(j, k) {
			var l = j.length, m;
			while (l--) {
				m = j[l];
				if (m.value.indexOf("[CDATA[") === 0) {
					m.name = "#cdata";
					m.type = 4;
					m.value = m.value.replace(/^\[CDATA\[|\]\]$/g, "")
				} else {
					if (m.value.indexOf("mce:protected ") === 0) {
						m.name = "#text";
						m.type = 3;
						m.raw = true;
						m.value = unescape(m.value).substr(14)
					}
				}
			}
		});
		c.addNodeFilter("xml:namespace,input", function(j, k) {
			var l = j.length, m;
			while (l--) {
				m = j[l];
				if (m.type === 7) {
					m.remove()
				} else {
					if (m.type === 1) {
						if (k === "input" && !("type" in m.attributes.map)) {
							m.attr("type", "text")
						}
					}
				}
			}
		});
		if (e.fix_list_elements) {
			c.addNodeFilter("ul,ol", function(k, l) {
				var m = k.length, n, j;
				while (m--) {
					n = k[m];
					j = n.parent;
					if (j.name === "ul" || j.name === "ol") {
						if (n.prev && n.prev.name === "li") {
							n.prev.append(n)
						}
					}
				}
			})
		}
		c.addAttributeFilter("data-mce-src,data-mce-href,data-mce-style",
				function(j, k) {
					var l = j.length;
					while (l--) {
						j[l].attr(k, null)
					}
				});
		return {
			schema : f,
			addNodeFilter : c.addNodeFilter,
			addAttributeFilter : c.addAttributeFilter,
			onPreProcess : h,
			onPostProcess : b,
			serialize : function(o, m) {
				var l, p, k, j, n;
				if (d && i.select("script,style,select,map").length > 0) {
					n = o.innerHTML;
					o = o.cloneNode(false);
					i.setHTML(o, n)
				} else {
					o = o.cloneNode(true)
				}
				l = o.ownerDocument.implementation;
				if (l.createHTMLDocument) {
					p = l.createHTMLDocument("");
					g(o.nodeName == "BODY" ? o.childNodes : [ o ], function(q) {
						p.body.appendChild(p.importNode(q, true))
					});
					if (o.nodeName != "BODY") {
						o = p.body.firstChild
					} else {
						o = p.body
					}
					k = i.doc;
					i.doc = p
				}
				m = m || {};
				m.format = m.format || "html";
				if (!m.no_events) {
					m.node = o;
					h.dispatch(self, m)
				}
				j = new a.html.Serializer(e, f);
				m.content = j.serialize(c.parse(m.getInner ? o.innerHTML : a
						.trim(i.getOuterHTML(o), m), m));
				if (!m.cleanup) {
					m.content = m.content.replace(/\uFEFF|\u200B/g, "")
				}
				if (!m.no_events) {
					b.dispatch(self, m)
				}
				if (k) {
					i.doc = k
				}
				m.node = null;
				return m.content
			},
			addRules : function(j) {
				f.addValidElements(j)
			},
			setRules : function(j) {
				f.setValidElements(j)
			}
		}
	}
})(tinymce);
(function(a) {
	a.dom.ScriptLoader = function(h) {
		var c = 0, k = 1, i = 2, l = {}, j = [], f = {}, d = [], g = 0, e;
		function b(m, v) {
			var x = this, q = a.DOM, s, o, r, n;
			function p() {
				q.remove(n);
				if (s) {
					s.onreadystatechange = s.onload = s = null
				}
				v()
			}
			function u() {
				if (typeof (console) !== "undefined" && console.log) {
					console.log("Failed to load: " + m)
				}
			}
			n = q.uniqueId();
			if (a.isIE6) {
				o = new a.util.URI(m);
				r = location;
				if (o.host == r.hostname && o.port == r.port
						&& (o.protocol + ":") == r.protocol
						&& o.protocol.toLowerCase() != "file") {
					a.util.XHR.send( {
						url : a._addVer(o.getURI()),
						success : function(y) {
							var t = q.create("script", {
								type : "text/javascript"
							});
							t.text = y;
							document.getElementsByTagName("head")[0]
									.appendChild(t);
							q.remove(t);
							p()
						},
						error : u
					});
					return
				}
			}
			s = q.create("script", {
				id : n,
				type : "text/javascript",
				src : a._addVer(m)
			});
			if (!a.isIE) {
				s.onload = p
			}
			s.onerror = u;
			if (!a.isOpera) {
				s.onreadystatechange = function() {
					var t = s.readyState;
					if (t == "complete" || t == "loaded") {
						p()
					}
				}
			}
			(document.getElementsByTagName("head")[0] || document.body)
					.appendChild(s)
		}
		this.isDone = function(m) {
			return l[m] == i
		};
		this.markDone = function(m) {
			l[m] = i
		};
		this.add = this.load = function(m, q, n) {
			var o, p = l[m];
			if (p == e) {
				j.push(m);
				l[m] = c
			}
			if (q) {
				if (!f[m]) {
					f[m] = []
				}
				f[m].push( {
					func : q,
					scope : n || this
				})
			}
		};
		this.loadQueue = function(n, m) {
			this.loadScripts(j, n, m)
		};
		this.loadScripts = function(m, q, p) {
			var o;
			function n(r) {
				a.each(f[r], function(s) {
					s.func.call(s.scope)
				});
				f[r] = e
			}
			d.push( {
				func : q,
				scope : p || this
			});
			o = function() {
				var r = a.grep(m);
				m.length = 0;
				a.each(r, function(s) {
					if (l[s] == i) {
						n(s);
						return
					}
					if (l[s] != k) {
						l[s] = k;
						g++;
						b(s, function() {
							l[s] = i;
							g--;
							n(s);
							o()
						})
					}
				});
				if (!g) {
					a.each(d, function(s) {
						s.func.call(s.scope)
					});
					d.length = 0
				}
			};
			o()
		}
	};
	a.ScriptLoader = new a.dom.ScriptLoader()
})(tinymce);
tinymce.dom.TreeWalker = function(a, c) {
	var b = a;
	function d(i, f, e, j) {
		var h, g;
		if (i) {
			if (!j && i[f]) {
				return i[f]
			}
			if (i != c) {
				h = i[e];
				if (h) {
					return h
				}
				for (g = i.parentNode; g && g != c; g = g.parentNode) {
					h = g[e];
					if (h) {
						return h
					}
				}
			}
		}
	}
	this.current = function() {
		return b
	};
	this.next = function(e) {
		return (b = d(b, "firstChild", "nextSibling", e))
	};
	this.prev = function(e) {
		return (b = d(b, "lastChild", "previousSibling", e))
	}
};
(function(a) {
	a.dom.RangeUtils = function(c) {
		var b = "\uFEFF";
		this.walk = function(d, s) {
			var i = d.startContainer, l = d.startOffset, t = d.endContainer, m = d.endOffset, j, g, o, h, r, q, e;
			e = c.select("td.mceSelected,th.mceSelected");
			if (e.length > 0) {
				a.each(e, function(u) {
					s( [ u ])
				});
				return
			}
			function f(u) {
				var v;
				v = u[0];
				if (v.nodeType === 3 && v === i && l >= v.nodeValue.length) {
					u.splice(0, 1)
				}
				v = u[u.length - 1];
				if (m === 0 && u.length > 0 && v === t && v.nodeType === 3) {
					u.splice(u.length - 1, 1)
				}
				return u
			}
			function p(x, v, u) {
				var y = [];
				for (; x && x != u; x = x[v]) {
					y.push(x)
				}
				return y
			}
			function n(v, u) {
				do {
					if (v.parentNode == u) {
						return v
					}
					v = v.parentNode
				} while (v)
			}
			function k(x, v, y) {
				var u = y ? "nextSibling" : "previousSibling";
				for (h = x, r = h.parentNode; h && h != v; h = r) {
					r = h.parentNode;
					q = p(h == x ? h : h[u], u);
					if (q.length) {
						if (!y) {
							q.reverse()
						}
						s(f(q))
					}
				}
			}
			if (i.nodeType == 1 && i.hasChildNodes()) {
				i = i.childNodes[l]
			}
			if (t.nodeType == 1 && t.hasChildNodes()) {
				t = t.childNodes[Math.min(m - 1, t.childNodes.length - 1)]
			}
			if (i == t) {
				return s(f( [ i ]))
			}
			j = c.findCommonAncestor(i, t);
			for (h = i; h; h = h.parentNode) {
				if (h === t) {
					return k(i, j, true)
				}
				if (h === j) {
					break
				}
			}
			for (h = t; h; h = h.parentNode) {
				if (h === i) {
					return k(t, j)
				}
				if (h === j) {
					break
				}
			}
			g = n(i, j) || i;
			o = n(t, j) || t;
			k(i, g, true);
			q = p(g == i ? g : g.nextSibling, "nextSibling",
					o == t ? o.nextSibling : o);
			if (q.length) {
				s(f(q))
			}
			k(t, o)
		};
		this.split = function(e) {
			var h = e.startContainer, d = e.startOffset, i = e.endContainer, g = e.endOffset;
			function f(j, k) {
				return j.splitText(k)
			}
			if (h == i && h.nodeType == 3) {
				if (d > 0 && d < h.nodeValue.length) {
					i = f(h, d);
					h = i.previousSibling;
					if (g > d) {
						g = g - d;
						h = i = f(i, g).previousSibling;
						g = i.nodeValue.length;
						d = 0
					} else {
						g = 0
					}
				}
			} else {
				if (h.nodeType == 3 && d > 0 && d < h.nodeValue.length) {
					h = f(h, d);
					d = 0
				}
				if (i.nodeType == 3 && g > 0 && g < i.nodeValue.length) {
					i = f(i, g).previousSibling;
					g = i.nodeValue.length
				}
			}
			return {
				startContainer : h,
				startOffset : d,
				endContainer : i,
				endOffset : g
			}
		}
	};
	a.dom.RangeUtils.compareRanges = function(c, b) {
		if (c && b) {
			if (c.item || c.duplicate) {
				if (c.item && b.item && c.item(0) === b.item(0)) {
					return true
				}
				if (c.isEqual && b.isEqual && b.isEqual(c)) {
					return true
				}
			} else {
				return c.startContainer == b.startContainer
						&& c.startOffset == b.startOffset
			}
		}
		return false
	}
})(tinymce);
(function(b) {
	var a = b.dom.Event, c = b.each;
	b
			.create(
					"tinymce.ui.KeyboardNavigation",
					{
						KeyboardNavigation : function(e, f) {
							var p = this, m = e.root, l = e.items, n = e.enableUpDown, i = e.enableLeftRight
									|| !e.enableUpDown, k = e.excludeFromTabOrder, j, h, o, d, g;
							f = f || b.DOM;
							j = function(q) {
								g = q.target.id
							};
							h = function(q) {
								f.setAttrib(q.target.id, "tabindex", "-1")
							};
							d = function(q) {
								var r = f.get(g);
								f.setAttrib(r, "tabindex", "0");
								r.focus()
							};
							p.focus = function() {
								f.get(g).focus()
							};
							p.destroy = function() {
								c(l, function(q) {
									f.unbind(f.get(q.id), "focus", j);
									f.unbind(f.get(q.id), "blur", h)
								});
								f.unbind(f.get(m), "focus", d);
								f.unbind(f.get(m), "keydown", o);
								l = f = m = p.focus = j = h = o = d = null;
								p.destroy = function() {
								}
							};
							p.moveFocus = function(u, r) {
								var q = -1, t = p.controls, s;
								if (!g) {
									return
								}
								c(l, function(x, v) {
									if (x.id === g) {
										q = v;
										return false
									}
								});
								q += u;
								if (q < 0) {
									q = l.length - 1
								} else {
									if (q >= l.length) {
										q = 0
									}
								}
								s = l[q];
								f.setAttrib(g, "tabindex", "-1");
								f.setAttrib(s.id, "tabindex", "0");
								f.get(s.id).focus();
								if (e.actOnFocus) {
									e.onAction(s.id)
								}
								if (r) {
									a.cancel(r)
								}
							};
							o = function(y) {
								var u = 37, t = 39, x = 38, z = 40, q = 27, s = 14, r = 13, v = 32;
								switch (y.keyCode) {
								case u:
									if (i) {
										p.moveFocus(-1)
									}
									break;
								case t:
									if (i) {
										p.moveFocus(1)
									}
									break;
								case x:
									if (n) {
										p.moveFocus(-1)
									}
									break;
								case z:
									if (n) {
										p.moveFocus(1)
									}
									break;
								case q:
									if (e.onCancel) {
										e.onCancel();
										a.cancel(y)
									}
									break;
								case s:
								case r:
								case v:
									if (e.onAction) {
										e.onAction(g);
										a.cancel(y)
									}
									break
								}
							};
							c(l, function(s, q) {
								var r;
								if (!s.id) {
									s.id = f.uniqueId("_mce_item_")
								}
								if (k) {
									f.bind(s.id, "blur", h);
									r = "-1"
								} else {
									r = (q === 0 ? "0" : "-1")
								}
								f.setAttrib(s.id, "tabindex", r);
								f.bind(f.get(s.id), "focus", j)
							});
							if (l[0]) {
								g = l[0].id
							}
							f.setAttrib(m, "tabindex", "-1");
							f.bind(f.get(m), "focus", d);
							f.bind(f.get(m), "keydown", o)
						}
					})
})(tinymce);
(function(c) {
	var b = c.DOM, a = c.is;
	c.create("tinymce.ui.Control", {
		Control : function(f, e, d) {
			this.id = f;
			this.settings = e = e || {};
			this.rendered = false;
			this.onRender = new c.util.Dispatcher(this);
			this.classPrefix = "";
			this.scope = e.scope || this;
			this.disabled = 0;
			this.active = 0;
			this.editor = d
		},
		setAriaProperty : function(f, e) {
			var d = b.get(this.id + "_aria") || b.get(this.id);
			if (d) {
				b.setAttrib(d, "aria-" + f, !!e)
			}
		},
		focus : function() {
			b.get(this.id).focus()
		},
		setDisabled : function(d) {
			if (d != this.disabled) {
				this.setAriaProperty("disabled", d);
				this.setState("Disabled", d);
				this.setState("Enabled", !d);
				this.disabled = d
			}
		},
		isDisabled : function() {
			return this.disabled
		},
		setActive : function(d) {
			if (d != this.active) {
				this.setState("Active", d);
				this.active = d;
				this.setAriaProperty("pressed", d)
			}
		},
		isActive : function() {
			return this.active
		},
		setState : function(f, d) {
			var e = b.get(this.id);
			f = this.classPrefix + f;
			if (d) {
				b.addClass(e, f)
			} else {
				b.removeClass(e, f)
			}
		},
		isRendered : function() {
			return this.rendered
		},
		renderHTML : function() {
		},
		renderTo : function(d) {
			b.setHTML(d, this.renderHTML())
		},
		postRender : function() {
			var e = this, d;
			if (a(e.disabled)) {
				d = e.disabled;
				e.disabled = -1;
				e.setDisabled(d)
			}
			if (a(e.active)) {
				d = e.active;
				e.active = -1;
				e.setActive(d)
			}
		},
		remove : function() {
			b.remove(this.id);
			this.destroy()
		},
		destroy : function() {
			c.dom.Event.clear(this.id)
		}
	})
})(tinymce);
tinymce.create("tinymce.ui.Container:tinymce.ui.Control", {
	Container : function(c, b, a) {
		this.parent(c, b, a);
		this.controls = [];
		this.lookup = {}
	},
	add : function(a) {
		this.lookup[a.id] = a;
		this.controls.push(a);
		return a
	},
	get : function(a) {
		return this.lookup[a]
	}
});
tinymce.create("tinymce.ui.Separator:tinymce.ui.Control", {
	Separator : function(b, a) {
		this.parent(b, a);
		this.classPrefix = "mceSeparator";
		this.setDisabled(true)
	},
	renderHTML : function() {
		return tinymce.DOM.createHTML("span", {
			"class" : this.classPrefix,
			role : "separator",
			"aria-orientation" : "vertical",
			tabindex : "-1"
		})
	}
});
(function(d) {
	var c = d.is, b = d.DOM, e = d.each, a = d.walk;
	d.create("tinymce.ui.MenuItem:tinymce.ui.Control", {
		MenuItem : function(g, f) {
			this.parent(g, f);
			this.classPrefix = "mceMenuItem"
		},
		setSelected : function(f) {
			this.setState("Selected", f);
			this.setAriaProperty("checked", !!f);
			this.selected = f
		},
		isSelected : function() {
			return this.selected
		},
		postRender : function() {
			var f = this;
			f.parent();
			if (c(f.selected)) {
				f.setSelected(f.selected)
			}
		}
	})
})(tinymce);
(function(d) {
	var c = d.is, b = d.DOM, e = d.each, a = d.walk;
	d.create("tinymce.ui.Menu:tinymce.ui.MenuItem", {
		Menu : function(h, g) {
			var f = this;
			f.parent(h, g);
			f.items = {};
			f.collapsed = false;
			f.menuCount = 0;
			f.onAddItem = new d.util.Dispatcher(this)
		},
		expand : function(g) {
			var f = this;
			if (g) {
				a(f, function(h) {
					if (h.expand) {
						h.expand()
					}
				}, "items", f)
			}
			f.collapsed = false
		},
		collapse : function(g) {
			var f = this;
			if (g) {
				a(f, function(h) {
					if (h.collapse) {
						h.collapse()
					}
				}, "items", f)
			}
			f.collapsed = true
		},
		isCollapsed : function() {
			return this.collapsed
		},
		add : function(f) {
			if (!f.settings) {
				f = new d.ui.MenuItem(f.id || b.uniqueId(), f)
			}
			this.onAddItem.dispatch(this, f);
			return this.items[f.id] = f
		},
		addSeparator : function() {
			return this.add( {
				separator : true
			})
		},
		addMenu : function(f) {
			if (!f.collapse) {
				f = this.createMenu(f)
			}
			this.menuCount++;
			return this.add(f)
		},
		hasMenus : function() {
			return this.menuCount !== 0
		},
		remove : function(f) {
			delete this.items[f.id]
		},
		removeAll : function() {
			var f = this;
			a(f, function(g) {
				if (g.removeAll) {
					g.removeAll()
				} else {
					g.remove()
				}
				g.destroy()
			}, "items", f);
			f.items = {}
		},
		createMenu : function(g) {
			var f = new d.ui.Menu(g.id || b.uniqueId(), g);
			f.onAddItem.add(this.onAddItem.dispatch, this.onAddItem);
			return f
		}
	})
})(tinymce);
(function(e) {
	var d = e.is, c = e.DOM, f = e.each, a = e.dom.Event, b = e.dom.Element;
	e
			.create(
					"tinymce.ui.DropMenu:tinymce.ui.Menu",
					{
						DropMenu : function(h, g) {
							g = g || {};
							g.container = g.container || c.doc.body;
							g.offset_x = g.offset_x || 0;
							g.offset_y = g.offset_y || 0;
							g.vp_offset_x = g.vp_offset_x || 0;
							g.vp_offset_y = g.vp_offset_y || 0;
							if (d(g.icons) && !g.icons) {
								g["class"] += " mceNoIcons"
							}
							this.parent(h, g);
							this.onShowMenu = new e.util.Dispatcher(this);
							this.onHideMenu = new e.util.Dispatcher(this);
							this.classPrefix = "mceMenu"
						},
						createMenu : function(j) {
							var h = this, i = h.settings, g;
							j.container = j.container || i.container;
							j.parent = h;
							j.constrain = j.constrain || i.constrain;
							j["class"] = j["class"] || i["class"];
							j.vp_offset_x = j.vp_offset_x || i.vp_offset_x;
							j.vp_offset_y = j.vp_offset_y || i.vp_offset_y;
							j.keyboard_focus = i.keyboard_focus;
							g = new e.ui.DropMenu(j.id || c.uniqueId(), j);
							g.onAddItem.add(h.onAddItem.dispatch, h.onAddItem);
							return g
						},
						focus : function() {
							var g = this;
							if (g.keyboardNav) {
								g.keyboardNav.focus()
							}
						},
						update : function() {
							var i = this, j = i.settings, g = c.get("menu_"
									+ i.id + "_tbl"), l = c.get("menu_" + i.id
									+ "_co"), h, k;
							h = j.max_width ? Math.min(g.clientWidth,
									j.max_width) : g.clientWidth;
							k = j.max_height ? Math.min(g.clientHeight,
									j.max_height) : g.clientHeight;
							if (!c.boxModel) {
								i.element.setStyles( {
									width : h + 2,
									height : k + 2
								})
							} else {
								i.element.setStyles( {
									width : h,
									height : k
								})
							}
							if (j.max_width) {
								c.setStyle(l, "width", h)
							}
							if (j.max_height) {
								c.setStyle(l, "height", k);
								if (g.clientHeight < j.max_height) {
									c.setStyle(l, "overflow", "hidden")
								}
							}
						},
						showMenu : function(p, n, r) {
							var z = this, A = z.settings, o, g = c
									.getViewPort(), u, l, v, q, i = 2, k, j, m = z.classPrefix;
							z.collapse(1);
							if (z.isMenuVisible) {
								return
							}
							if (!z.rendered) {
								o = c.add(z.settings.container, z.renderNode());
								f(z.items, function(h) {
									h.postRender()
								});
								z.element = new b("menu_" + z.id, {
									blocker : 1,
									container : A.container
								})
							} else {
								o = c.get("menu_" + z.id)
							}
							if (!e.isOpera) {
								c.setStyles(o, {
									left : -65535,
									top : -65535
								})
							}
							c.show(o);
							z.update();
							p += A.offset_x || 0;
							n += A.offset_y || 0;
							g.w -= 4;
							g.h -= 4;
							if (A.constrain) {
								u = o.clientWidth - i;
								l = o.clientHeight - i;
								v = g.x + g.w;
								q = g.y + g.h;
								if ((p + A.vp_offset_x + u) > v) {
									p = r ? r - u : Math.max(0,
											(v - A.vp_offset_x) - u)
								}
								if ((n + A.vp_offset_y + l) > q) {
									n = Math.max(0, (q - A.vp_offset_y) - l)
								}
							}
							c.setStyles(o, {
								left : p,
								top : n
							});
							z.element.update();
							z.isMenuVisible = 1;
							z.mouseClickFunc = a.add(o, "click", function(s) {
								var h;
								s = s.target;
								if (s && (s = c.getParent(s, "tr"))
										&& !c.hasClass(s, m + "ItemSub")) {
									h = z.items[s.id];
									if (h.isDisabled()) {
										return
									}
									k = z;
									while (k) {
										if (k.hideMenu) {
											k.hideMenu()
										}
										k = k.settings.parent
									}
									if (h.settings.onclick) {
										h.settings.onclick(s)
									}
									return a.cancel(s)
								}
							});
							if (z.hasMenus()) {
								z.mouseOverFunc = a
										.add(
												o,
												"mouseover",
												function(x) {
													var h, t, s;
													x = x.target;
													if (x
															&& (x = c
																	.getParent(
																			x,
																			"tr"))) {
														h = z.items[x.id];
														if (z.lastMenu) {
															z.lastMenu
																	.collapse(1)
														}
														if (h.isDisabled()) {
															return
														}
														if (x
																&& c
																		.hasClass(
																				x,
																				m
																						+ "ItemSub")) {
															t = c.getRect(x);
															h.showMenu((t.x
																	+ t.w - i),
																	t.y - i,
																	t.x);
															z.lastMenu = h;
															c
																	.addClass(
																			c
																					.get(h.id).firstChild,
																			m
																					+ "ItemActive")
														}
													}
												})
							}
							a.add(o, "keydown", z._keyHandler, z);
							z.onShowMenu.dispatch(z);
							if (A.keyboard_focus) {
								z._setupKeyboardNav()
							}
						},
						hideMenu : function(j) {
							var g = this, i = c.get("menu_" + g.id), h;
							if (!g.isMenuVisible) {
								return
							}
							if (g.keyboardNav) {
								g.keyboardNav.destroy()
							}
							a.remove(i, "mouseover", g.mouseOverFunc);
							a.remove(i, "click", g.mouseClickFunc);
							a.remove(i, "keydown", g._keyHandler);
							c.hide(i);
							g.isMenuVisible = 0;
							if (!j) {
								g.collapse(1)
							}
							if (g.element) {
								g.element.hide()
							}
							if (h = c.get(g.id)) {
								c.removeClass(h.firstChild, g.classPrefix
										+ "ItemActive")
							}
							g.onHideMenu.dispatch(g)
						},
						add : function(i) {
							var g = this, h;
							i = g.parent(i);
							if (g.isRendered && (h = c.get("menu_" + g.id))) {
								g._add(c.select("tbody", h)[0], i)
							}
							return i
						},
						collapse : function(g) {
							this.parent(g);
							this.hideMenu(1)
						},
						remove : function(g) {
							c.remove(g.id);
							this.destroy();
							return this.parent(g)
						},
						destroy : function() {
							var g = this, h = c.get("menu_" + g.id);
							if (g.keyboardNav) {
								g.keyboardNav.destroy()
							}
							a.remove(h, "mouseover", g.mouseOverFunc);
							a
									.remove(c.select("a", h), "focus",
											g.mouseOverFunc);
							a.remove(h, "click", g.mouseClickFunc);
							a.remove(h, "keydown", g._keyHandler);
							if (g.element) {
								g.element.remove()
							}
							c.remove(h)
						},
						renderNode : function() {
							var i = this, j = i.settings, l, h, k, g;
							g = c
									.create(
											"div",
											{
												role : "listbox",
												id : "menu_" + i.id,
												"class" : j["class"],
												style : "position:absolute;left:0;top:0;z-index:200000;outline:0"
											});
							if (i.settings.parent) {
								c.setAttrib(g, "aria-parent", "menu_"
										+ i.settings.parent.id)
							}
							k = c.add(g, "div", {
								role : "presentation",
								id : "menu_" + i.id + "_co",
								"class" : i.classPrefix
										+ (j["class"] ? " " + j["class"] : "")
							});
							i.element = new b("menu_" + i.id, {
								blocker : 1,
								container : j.container
							});
							if (j.menu_line) {
								c.add(k, "span", {
									"class" : i.classPrefix + "Line"
								})
							}
							l = c.add(k, "table", {
								role : "presentation",
								id : "menu_" + i.id + "_tbl",
								border : 0,
								cellPadding : 0,
								cellSpacing : 0
							});
							h = c.add(l, "tbody");
							f(i.items, function(m) {
								i._add(h, m)
							});
							i.rendered = true;
							return g
						},
						_setupKeyboardNav : function() {
							var i, h, g = this;
							i = c.get("menu_" + g.id);
							h = c.select("a[role=option]", "menu_" + g.id);
							h.splice(0, 0, i);
							g.keyboardNav = new e.ui.KeyboardNavigation( {
								root : "menu_" + g.id,
								items : h,
								onCancel : function() {
									g.hideMenu()
								},
								enableUpDown : true
							});
							i.focus()
						},
						_keyHandler : function(g) {
							var h = this, i;
							switch (g.keyCode) {
							case 37:
								if (h.settings.parent) {
									h.hideMenu();
									h.settings.parent.focus();
									a.cancel(g)
								}
								break;
							case 39:
								if (h.mouseOverFunc) {
									h.mouseOverFunc(g)
								}
								break
							}
						},
						_add : function(j, h) {
							var i, q = h.settings, p, l, k, m = this.classPrefix, g;
							if (q.separator) {
								l = c.add(j, "tr", {
									id : h.id,
									"class" : m + "ItemSeparator"
								});
								c.add(l, "td", {
									"class" : m + "ItemSeparator"
								});
								if (i = l.previousSibling) {
									c.addClass(i, "mceLast")
								}
								return
							}
							i = l = c.add(j, "tr", {
								id : h.id,
								"class" : m + "Item " + m + "ItemEnabled"
							});
							i = k = c.add(i, q.titleItem ? "th" : "td");
							i = p = c.add(i, "a", {
								id : h.id + "_aria",
								role : q.titleItem ? "presentation" : "option",
								href : "javascript:;",
								onclick : "return false;",
								onmousedown : "return false;"
							});
							if (q.parent) {
								c.setAttrib(p, "aria-haspopup", "true");
								c.setAttrib(p, "aria-owns", "menu_" + h.id)
							}
							c.addClass(k, q["class"]);
							g = c.add(i, "span", {
								"class" : "mceIcon"
										+ (q.icon ? " mce_" + q.icon : "")
							});
							if (q.icon_src) {
								c.add(g, "img", {
									src : q.icon_src
								})
							}
							i = c.add(i, q.element || "span", {
								"class" : "mceText",
								title : h.settings.title
							}, h.settings.title);
							if (h.settings.style) {
								c.setAttrib(i, "style", h.settings.style)
							}
							if (j.childNodes.length == 1) {
								c.addClass(l, "mceFirst")
							}
							if ((i = l.previousSibling)
									&& c.hasClass(i, m + "ItemSeparator")) {
								c.addClass(l, "mceFirst")
							}
							if (h.collapse) {
								c.addClass(l, m + "ItemSub")
							}
							if (i = l.previousSibling) {
								c.removeClass(i, "mceLast")
							}
							c.addClass(l, "mceLast")
						}
					})
})(tinymce);
(function(b) {
	var a = b.DOM;
	b
			.create(
					"tinymce.ui.Button:tinymce.ui.Control",
					{
						Button : function(e, d, c) {
							this.parent(e, d, c);
							this.classPrefix = "mceButton"
						},
						renderHTML : function() {
							var f = this.classPrefix, e = this.settings, d, c;
							c = a.encode(e.label || "");
							d = '<a role="button" id="'
									+ this.id
									+ '" href="javascript:;" class="'
									+ f
									+ " "
									+ f
									+ "Enabled "
									+ e["class"]
									+ (c ? " " + f + "Labeled" : "")
									+ '" onmousedown="return false;" onclick="return false;" aria-labelledby="'
									+ this.id + '_voice" title="'
									+ a.encode(e.title) + '">';
							if (e.image
									&& !(this.editor && this.editor.forcedHighContrastMode)) {
								d += '<img class="mceIcon" src="' + e.image
										+ '" alt="' + a.encode(e.title)
										+ '" />' + c
							} else {
								d += '<span class="mceIcon '
										+ e["class"]
										+ '"></span>'
										+ (c ? '<span class="' + f + 'Label">'
												+ c + "</span>" : "")
							}
							d += '<span class="mceVoiceLabel mceIconOnly" style="display: none;" id="'
									+ this.id
									+ '_voice">'
									+ e.title
									+ "</span>";
							d += "</a>";
							return d
						},
						postRender : function() {
							var d = this, e = d.settings, c;
							if (b.isIE && d.editor) {
								b.dom.Event
										.add(
												d.id,
												"mousedown",
												function(f) {
													var g = d.editor.selection
															.getNode().nodeName;
													c = g === "IMG" ? d.editor.selection
															.getBookmark()
															: null
												})
							}
							b.dom.Event.add(d.id, "click", function(f) {
								if (!d.isDisabled()) {
									if (b.isIE && d.editor && c !== null) {
										d.editor.selection.moveToBookmark(c)
									}
									return e.onclick.call(e.scope, f)
								}
							});
							b.dom.Event.add(d.id, "keyup", function(f) {
								if (!d.isDisabled()
										&& f.keyCode == b.VK.SPACEBAR) {
									return e.onclick.call(e.scope, f)
								}
							})
						}
					})
})(tinymce);
(function(d) {
	var c = d.DOM, b = d.dom.Event, e = d.each, a = d.util.Dispatcher;
	d
			.create(
					"tinymce.ui.ListBox:tinymce.ui.Control",
					{
						ListBox : function(i, h, f) {
							var g = this;
							g.parent(i, h, f);
							g.items = [];
							g.onChange = new a(g);
							g.onPostRender = new a(g);
							g.onAdd = new a(g);
							g.onRenderMenu = new d.util.Dispatcher(this);
							g.classPrefix = "mceListBox"
						},
						select : function(h) {
							var g = this, j, i;
							if (h == undefined) {
								return g.selectByIndex(-1)
							}
							if (h && typeof (h) == "function") {
								i = h
							} else {
								i = function(f) {
									return f == h
								}
							}
							if (h != g.selectedValue) {
								e(g.items, function(k, f) {
									if (i(k.value)) {
										j = 1;
										g.selectByIndex(f);
										return false
									}
								});
								if (!j) {
									g.selectByIndex(-1)
								}
							}
						},
						selectByIndex : function(f) {
							var h = this, i, j, g;
							if (f != h.selectedIndex) {
								i = c.get(h.id + "_text");
								g = c.get(h.id + "_voiceDesc");
								j = h.items[f];
								if (j) {
									h.selectedValue = j.value;
									h.selectedIndex = f;
									c.setHTML(i, c.encode(j.title));
									c.setHTML(g, h.settings.title + " - "
											+ j.title);
									c.removeClass(i, "mceTitle");
									c.setAttrib(h.id, "aria-valuenow", j.title)
								} else {
									c.setHTML(i, c.encode(h.settings.title));
									c.setHTML(g, c.encode(h.settings.title));
									c.addClass(i, "mceTitle");
									h.selectedValue = h.selectedIndex = null;
									c.setAttrib(h.id, "aria-valuenow",
											h.settings.title)
								}
								i = 0
							}
						},
						add : function(i, f, h) {
							var g = this;
							h = h || {};
							h = d.extend(h, {
								title : i,
								value : f
							});
							g.items.push(h);
							g.onAdd.dispatch(g, h)
						},
						getLength : function() {
							return this.items.length
						},
						renderHTML : function() {
							var i = "", f = this, g = f.settings, j = f.classPrefix;
							i = '<span role="listbox" aria-haspopup="true" aria-labelledby="'
									+ f.id
									+ '_voiceDesc" aria-describedby="'
									+ f.id
									+ '_voiceDesc"><table role="presentation" tabindex="0" id="'
									+ f.id
									+ '" cellpadding="0" cellspacing="0" class="'
									+ j
									+ " "
									+ j
									+ "Enabled"
									+ (g["class"] ? (" " + g["class"]) : "")
									+ '"><tbody><tr>';
							i += "<td>" + c.createHTML("span", {
								id : f.id + "_voiceDesc",
								"class" : "voiceLabel",
								style : "display:none;"
							}, f.settings.title);
							i += c.createHTML("a", {
								id : f.id + "_text",
								tabindex : -1,
								href : "javascript:;",
								"class" : "mceText",
								onclick : "return false;",
								onmousedown : "return false;"
							}, c.encode(f.settings.title)) + "</td>";
							i += "<td>"
									+ c
											.createHTML(
													"a",
													{
														id : f.id + "_open",
														tabindex : -1,
														href : "javascript:;",
														"class" : "mceOpen",
														onclick : "return false;",
														onmousedown : "return false;"
													},
													'<span><span style="display:none;" class="mceIconOnly" aria-hidden="true">\u25BC</span></span>')
									+ "</td>";
							i += "</tr></tbody></table></span>";
							return i
						},
						showMenu : function() {
							var g = this, i, h = c.get(this.id), f;
							if (g.isDisabled() || g.items.length == 0) {
								return
							}
							if (g.menu && g.menu.isMenuVisible) {
								return g.hideMenu()
							}
							if (!g.isMenuRendered) {
								g.renderMenu();
								g.isMenuRendered = true
							}
							i = c.getPos(h);
							f = g.menu;
							f.settings.offset_x = i.x;
							f.settings.offset_y = i.y;
							f.settings.keyboard_focus = !d.isOpera;
							if (g.oldID) {
								f.items[g.oldID].setSelected(0)
							}
							e(g.items, function(j) {
								if (j.value === g.selectedValue) {
									f.items[j.id].setSelected(1);
									g.oldID = j.id
								}
							});
							f.showMenu(0, h.clientHeight);
							b.add(c.doc, "mousedown", g.hideMenu, g);
							c.addClass(g.id, g.classPrefix + "Selected")
						},
						hideMenu : function(g) {
							var f = this;
							if (f.menu && f.menu.isMenuVisible) {
								c.removeClass(f.id, f.classPrefix + "Selected");
								if (g
										&& g.type == "mousedown"
										&& (g.target.id == f.id + "_text" || g.target.id == f.id
												+ "_open")) {
									return
								}
								if (!g || !c.getParent(g.target, ".mceMenu")) {
									c.removeClass(f.id, f.classPrefix
											+ "Selected");
									b.remove(c.doc, "mousedown", f.hideMenu, f);
									f.menu.hideMenu()
								}
							}
						},
						renderMenu : function() {
							var g = this, f;
							f = g.settings.control_manager.createDropMenu(g.id
									+ "_menu", {
								menu_line : 1,
								"class" : g.classPrefix + "Menu mceNoIcons",
								max_width : 150,
								max_height : 150
							});
							f.onHideMenu.add(function() {
								g.hideMenu();
								g.focus()
							});
							f.add( {
								title : g.settings.title,
								"class" : "mceMenuItemTitle",
								onclick : function() {
									if (g.settings.onselect("") !== false) {
										g.select("")
									}
								}
							});
							e(
									g.items,
									function(h) {
										if (h.value === undefined) {
											f
													.add( {
														title : h.title,
														role : "option",
														"class" : "mceMenuItemTitle",
														onclick : function() {
															if (g.settings
																	.onselect("") !== false) {
																g.select("")
															}
														}
													})
										} else {
											h.id = c.uniqueId();
											h.role = "option";
											h.onclick = function() {
												if (g.settings
														.onselect(h.value) !== false) {
													g.select(h.value)
												}
											};
											f.add(h)
										}
									});
							g.onRenderMenu.dispatch(g, f);
							g.menu = f
						},
						postRender : function() {
							var f = this, g = f.classPrefix;
							b.add(f.id, "click", f.showMenu, f);
							b.add(f.id, "keydown", function(h) {
								if (h.keyCode == 32) {
									f.showMenu(h);
									b.cancel(h)
								}
							});
							b.add(f.id, "focus", function() {
								if (!f._focused) {
									f.keyDownHandler = b.add(f.id, "keydown",
											function(h) {
												if (h.keyCode == 40) {
													f.showMenu();
													b.cancel(h)
												}
											});
									f.keyPressHandler = b.add(f.id, "keypress",
											function(i) {
												var h;
												if (i.keyCode == 13) {
													h = f.selectedValue;
													f.selectedValue = null;
													b.cancel(i);
													f.settings.onselect(h)
												}
											})
								}
								f._focused = 1
							});
							b.add(f.id, "blur", function() {
								b.remove(f.id, "keydown", f.keyDownHandler);
								b.remove(f.id, "keypress", f.keyPressHandler);
								f._focused = 0
							});
							if (d.isIE6 || !c.boxModel) {
								b.add(f.id, "mouseover", function() {
									if (!c.hasClass(f.id, g + "Disabled")) {
										c.addClass(f.id, g + "Hover")
									}
								});
								b.add(f.id, "mouseout", function() {
									if (!c.hasClass(f.id, g + "Disabled")) {
										c.removeClass(f.id, g + "Hover")
									}
								})
							}
							f.onPostRender.dispatch(f, c.get(f.id))
						},
						destroy : function() {
							this.parent();
							b.clear(this.id + "_text");
							b.clear(this.id + "_open")
						}
					})
})(tinymce);
(function(d) {
	var c = d.DOM, b = d.dom.Event, e = d.each, a = d.util.Dispatcher;
	d.create("tinymce.ui.NativeListBox:tinymce.ui.ListBox", {
		NativeListBox : function(g, f) {
			this.parent(g, f);
			this.classPrefix = "mceNativeListBox"
		},
		setDisabled : function(f) {
			c.get(this.id).disabled = f;
			this.setAriaProperty("disabled", f)
		},
		isDisabled : function() {
			return c.get(this.id).disabled
		},
		select : function(h) {
			var g = this, j, i;
			if (h == undefined) {
				return g.selectByIndex(-1)
			}
			if (h && typeof (h) == "function") {
				i = h
			} else {
				i = function(f) {
					return f == h
				}
			}
			if (h != g.selectedValue) {
				e(g.items, function(k, f) {
					if (i(k.value)) {
						j = 1;
						g.selectByIndex(f);
						return false
					}
				});
				if (!j) {
					g.selectByIndex(-1)
				}
			}
		},
		selectByIndex : function(f) {
			c.get(this.id).selectedIndex = f + 1;
			this.selectedValue = this.items[f] ? this.items[f].value : null
		},
		add : function(j, g, f) {
			var i, h = this;
			f = f || {};
			f.value = g;
			if (h.isRendered()) {
				c.add(c.get(this.id), "option", f, j)
			}
			i = {
				title : j,
				value : g,
				attribs : f
			};
			h.items.push(i);
			h.onAdd.dispatch(h, i)
		},
		getLength : function() {
			return this.items.length
		},
		renderHTML : function() {
			var g, f = this;
			g = c.createHTML("option", {
				value : ""
			}, "-- " + f.settings.title + " --");
			e(f.items, function(h) {
				g += c.createHTML("option", {
					value : h.value
				}, h.title)
			});
			g = c.createHTML("select", {
				id : f.id,
				"class" : "mceNativeListBox",
				"aria-labelledby" : f.id + "_aria"
			}, g);
			g += c.createHTML("span", {
				id : f.id + "_aria",
				style : "display: none"
			}, f.settings.title);
			return g
		},
		postRender : function() {
			var g = this, h, i = true;
			g.rendered = true;
			function f(k) {
				var j = g.items[k.target.selectedIndex - 1];
				if (j && (j = j.value)) {
					g.onChange.dispatch(g, j);
					if (g.settings.onselect) {
						g.settings.onselect(j)
					}
				}
			}
			b.add(g.id, "change", f);
			b.add(g.id, "keydown", function(k) {
				var j;
				b.remove(g.id, "change", h);
				i = false;
				j = b.add(g.id, "blur", function() {
					if (i) {
						return
					}
					i = true;
					b.add(g.id, "change", f);
					b.remove(g.id, "blur", j)
				});
				if (d.isWebKit && (k.keyCode == 37 || k.keyCode == 39)) {
					return b.prevent(k)
				}
				if (k.keyCode == 13 || k.keyCode == 32) {
					f(k);
					return b.cancel(k)
				}
			});
			g.onPostRender.dispatch(g, c.get(g.id))
		}
	})
})(tinymce);
(function(c) {
	var b = c.DOM, a = c.dom.Event, d = c.each;
	c.create("tinymce.ui.MenuButton:tinymce.ui.Button", {
		MenuButton : function(g, f, e) {
			this.parent(g, f, e);
			this.onRenderMenu = new c.util.Dispatcher(this);
			f.menu_container = f.menu_container || b.doc.body
		},
		showMenu : function() {
			var g = this, j, i, h = b.get(g.id), f;
			if (g.isDisabled()) {
				return
			}
			if (!g.isMenuRendered) {
				g.renderMenu();
				g.isMenuRendered = true
			}
			if (g.isMenuVisible) {
				return g.hideMenu()
			}
			j = b.getPos(g.settings.menu_container);
			i = b.getPos(h);
			f = g.menu;
			f.settings.offset_x = i.x;
			f.settings.offset_y = i.y;
			f.settings.vp_offset_x = i.x;
			f.settings.vp_offset_y = i.y;
			f.settings.keyboard_focus = g._focused;
			f.showMenu(0, h.clientHeight);
			a.add(b.doc, "mousedown", g.hideMenu, g);
			g.setState("Selected", 1);
			g.isMenuVisible = 1
		},
		renderMenu : function() {
			var f = this, e;
			e = f.settings.control_manager.createDropMenu(f.id + "_menu", {
				menu_line : 1,
				"class" : this.classPrefix + "Menu",
				icons : f.settings.icons
			});
			e.onHideMenu.add(function() {
				f.hideMenu();
				f.focus()
			});
			f.onRenderMenu.dispatch(f, e);
			f.menu = e
		},
		hideMenu : function(g) {
			var f = this;
			if (g && g.type == "mousedown"
					&& b.getParent(g.target, function(h) {
						return h.id === f.id || h.id === f.id + "_open"
					})) {
				return
			}
			if (!g || !b.getParent(g.target, ".mceMenu")) {
				f.setState("Selected", 0);
				a.remove(b.doc, "mousedown", f.hideMenu, f);
				if (f.menu) {
					f.menu.hideMenu()
				}
			}
			f.isMenuVisible = 0
		},
		postRender : function() {
			var e = this, f = e.settings;
			a.add(e.id, "click", function() {
				if (!e.isDisabled()) {
					if (f.onclick) {
						f.onclick(e.value)
					}
					e.showMenu()
				}
			})
		}
	})
})(tinymce);
(function(c) {
	var b = c.DOM, a = c.dom.Event, d = c.each;
	c
			.create(
					"tinymce.ui.SplitButton:tinymce.ui.MenuButton",
					{
						SplitButton : function(g, f, e) {
							this.parent(g, f, e);
							this.classPrefix = "mceSplitButton"
						},
						renderHTML : function() {
							var i, f = this, g = f.settings, e;
							i = "<tbody><tr>";
							if (g.image) {
								e = b.createHTML("img ", {
									src : g.image,
									role : "presentation",
									"class" : "mceAction " + g["class"]
								})
							} else {
								e = b.createHTML("span", {
									"class" : "mceAction " + g["class"]
								}, "")
							}
							e += b.createHTML("span", {
								"class" : "mceVoiceLabel mceIconOnly",
								id : f.id + "_voice",
								style : "display:none;"
							}, g.title);
							i += "<td >" + b.createHTML("a", {
								role : "button",
								id : f.id + "_action",
								tabindex : "-1",
								href : "javascript:;",
								"class" : "mceAction " + g["class"],
								onclick : "return false;",
								onmousedown : "return false;",
								title : g.title
							}, e) + "</td>";
							e = b
									.createHTML(
											"span",
											{
												"class" : "mceOpen "
														+ g["class"]
											},
											'<span style="display:none;" class="mceIconOnly" aria-hidden="true">\u25BC</span>');
							i += "<td >" + b.createHTML("a", {
								role : "button",
								id : f.id + "_open",
								tabindex : "-1",
								href : "javascript:;",
								"class" : "mceOpen " + g["class"],
								onclick : "return false;",
								onmousedown : "return false;",
								title : g.title
							}, e) + "</td>";
							i += "</tr></tbody>";
							i = b
									.createHTML(
											"table",
											{
												role : "presentation",
												"class" : "mceSplitButton mceSplitButtonEnabled "
														+ g["class"],
												cellpadding : "0",
												cellspacing : "0",
												title : g.title
											}, i);
							return b.createHTML("div", {
								id : f.id,
								role : "button",
								tabindex : "0",
								"aria-labelledby" : f.id + "_voice",
								"aria-haspopup" : "true"
							}, i)
						},
						postRender : function() {
							var e = this, g = e.settings, f;
							if (g.onclick) {
								f = function(h) {
									if (!e.isDisabled()) {
										g.onclick(e.value);
										a.cancel(h)
									}
								};
								a.add(e.id + "_action", "click", f);
								a
										.add(
												e.id,
												[ "click", "keydown" ],
												function(h) {
													var k = 32, m = 14, i = 13, j = 38, l = 40;
													if ((h.keyCode === 32
															|| h.keyCode === 13 || h.keyCode === 14)
															&& !h.altKey
															&& !h.ctrlKey
															&& !h.metaKey) {
														f();
														a.cancel(h)
													} else {
														if (h.type === "click"
																|| h.keyCode === l) {
															e.showMenu();
															a.cancel(h)
														}
													}
												})
							}
							a.add(e.id + "_open", "click", function(h) {
								e.showMenu();
								a.cancel(h)
							});
							a.add( [ e.id, e.id + "_open" ], "focus",
									function() {
										e._focused = 1
									});
							a.add( [ e.id, e.id + "_open" ], "blur",
									function() {
										e._focused = 0
									});
							if (c.isIE6 || !b.boxModel) {
								a.add(e.id, "mouseover", function() {
									if (!b.hasClass(e.id,
											"mceSplitButtonDisabled")) {
										b.addClass(e.id, "mceSplitButtonHover")
									}
								});
								a.add(e.id, "mouseout", function() {
									if (!b.hasClass(e.id,
											"mceSplitButtonDisabled")) {
										b.removeClass(e.id,
												"mceSplitButtonHover")
									}
								})
							}
						},
						destroy : function() {
							this.parent();
							a.clear(this.id + "_action");
							a.clear(this.id + "_open");
							a.clear(this.id)
						}
					})
})(tinymce);
(function(d) {
	var c = d.DOM, a = d.dom.Event, b = d.is, e = d.each;
	d
			.create(
					"tinymce.ui.ColorSplitButton:tinymce.ui.SplitButton",
					{
						ColorSplitButton : function(i, h, f) {
							var g = this;
							g.parent(i, h, f);
							g.settings = h = d
									.extend(
											{
												colors : "000000,993300,333300,003300,003366,000080,333399,333333,800000,FF6600,808000,008000,008080,0000FF,666699,808080,FF0000,FF9900,99CC00,339966,33CCCC,3366FF,800080,999999,FF00FF,FFCC00,FFFF00,00FF00,00FFFF,00CCFF,993366,C0C0C0,FF99CC,FFCC99,FFFF99,CCFFCC,CCFFFF,99CCFF,CC99FF,FFFFFF",
												grid_width : 8,
												default_color : "#888888"
											}, g.settings);
							g.onShowMenu = new d.util.Dispatcher(g);
							g.onHideMenu = new d.util.Dispatcher(g);
							g.value = h.default_color
						},
						showMenu : function() {
							var f = this, g, j, i, h;
							if (f.isDisabled()) {
								return
							}
							if (!f.isMenuRendered) {
								f.renderMenu();
								f.isMenuRendered = true
							}
							if (f.isMenuVisible) {
								return f.hideMenu()
							}
							i = c.get(f.id);
							c.show(f.id + "_menu");
							c.addClass(i, "mceSplitButtonSelected");
							h = c.getPos(i);
							c.setStyles(f.id + "_menu", {
								left : h.x,
								top : h.y + i.clientHeight,
								zIndex : 200000
							});
							i = 0;
							a.add(c.doc, "mousedown", f.hideMenu, f);
							f.onShowMenu.dispatch(f);
							if (f._focused) {
								f._keyHandler = a.add(f.id + "_menu",
										"keydown", function(k) {
											if (k.keyCode == 27) {
												f.hideMenu()
											}
										});
								c.select("a", f.id + "_menu")[0].focus()
							}
							f.isMenuVisible = 1
						},
						hideMenu : function(g) {
							var f = this;
							if (f.isMenuVisible) {
								if (g && g.type == "mousedown"
										&& c.getParent(g.target, function(h) {
											return h.id === f.id + "_open"
										})) {
									return
								}
								if (!g
										|| !c.getParent(g.target,
												".mceSplitButtonMenu")) {
									c.removeClass(f.id,
											"mceSplitButtonSelected");
									a.remove(c.doc, "mousedown", f.hideMenu, f);
									a.remove(f.id + "_menu", "keydown",
											f._keyHandler);
									c.hide(f.id + "_menu")
								}
								f.isMenuVisible = 0;
								f.onHideMenu.dispatch()
							}
						},
						renderMenu : function() {
							var p = this, h, k = 0, q = p.settings, g, j, l, o, f;
							o = c.add(q.menu_container, "div", {
								role : "listbox",
								id : p.id + "_menu",
								"class" : q.menu_class + " " + q["class"],
								style : "position:absolute;left:0;top:-1000px;"
							});
							h = c.add(o, "div", {
								"class" : q["class"] + " mceSplitButtonMenu"
							});
							c.add(h, "span", {
								"class" : "mceMenuLine"
							});
							g = c.add(h, "table", {
								role : "presentation",
								"class" : "mceColorSplitMenu"
							});
							j = c.add(g, "tbody");
							k = 0;
							e(b(q.colors, "array") ? q.colors : q.colors
									.split(","), function(m) {
								m = m.replace(/^#/, "");
								if (!k--) {
									l = c.add(j, "tr");
									k = q.grid_width - 1
								}
								g = c.add(l, "td");
								var i = {
									href : "javascript:;",
									style : {
										backgroundColor : "#" + m
									},
									title : p.editor.getLang("colors." + m, m),
									"data-mce-color" : "#" + m
								};
								if (!d.isIE) {
									i.role = "option"
								}
								g = c.add(g, "a", i);
								if (p.editor.forcedHighContrastMode) {
									g = c.add(g, "canvas", {
										width : 16,
										height : 16,
										"aria-hidden" : "true"
									});
									if (g.getContext
											&& (f = g.getContext("2d"))) {
										f.fillStyle = "#" + m;
										f.fillRect(0, 0, 16, 16)
									} else {
										c.remove(g)
									}
								}
							});
							if (q.more_colors_func) {
								g = c.add(j, "tr");
								g = c.add(g, "td", {
									colspan : q.grid_width,
									"class" : "mceMoreColors"
								});
								g = c.add(g, "a", {
									role : "option",
									id : p.id + "_more",
									href : "javascript:;",
									onclick : "return false;",
									"class" : "mceMoreColors"
								}, q.more_colors_title);
								a.add(g, "click", function(i) {
									q.more_colors_func.call(q.more_colors_scope
											|| this);
									return a.cancel(i)
								})
							}
							c.addClass(h, "mceColorSplitMenu");
							new d.ui.KeyboardNavigation( {
								root : p.id + "_menu",
								items : c.select("a", p.id + "_menu"),
								onCancel : function() {
									p.hideMenu();
									p.focus()
								}
							});
							a.add(p.id + "_menu", "mousedown", function(i) {
								return a.cancel(i)
							});
							a
									.add(
											p.id + "_menu",
											"click",
											function(i) {
												var m;
												i = c.getParent(i.target, "a",
														j);
												if (i
														&& i.nodeName
																.toLowerCase() == "a"
														&& (m = i
																.getAttribute("data-mce-color"))) {
													p.setColor(m)
												}
												return a.cancel(i)
											});
							return o
						},
						setColor : function(f) {
							this.displayColor(f);
							this.hideMenu();
							this.settings.onselect(f)
						},
						displayColor : function(g) {
							var f = this;
							c.setStyle(f.id + "_preview", "backgroundColor", g);
							f.value = g
						},
						postRender : function() {
							var f = this, g = f.id;
							f.parent();
							c.add(g + "_action", "div", {
								id : g + "_preview",
								"class" : "mceColorPreview"
							});
							c.setStyle(f.id + "_preview", "backgroundColor",
									f.value)
						},
						destroy : function() {
							this.parent();
							a.clear(this.id + "_menu");
							a.clear(this.id + "_more");
							c.remove(this.id + "_menu")
						}
					})
})(tinymce);
(function(b) {
	var d = b.DOM, c = b.each, a = b.dom.Event;
	b.create("tinymce.ui.ToolbarGroup:tinymce.ui.Container", {
		renderHTML : function() {
			var f = this, i = [], e = f.controls, j = b.each, g = f.settings;
			i.push('<div id="' + f.id + '" role="group" aria-labelledby="'
					+ f.id + '_voice">');
			i.push("<span role='application'>");
			i.push('<span id="' + f.id
					+ '_voice" class="mceVoiceLabel" style="display:none;">'
					+ d.encode(g.name) + "</span>");
			j(e, function(h) {
				i.push(h.renderHTML())
			});
			i.push("</span>");
			i.push("</div>");
			return i.join("")
		},
		focus : function() {
			var e = this;
			d.get(e.id).focus()
		},
		postRender : function() {
			var f = this, e = [];
			c(f.controls, function(g) {
				c(g.controls, function(h) {
					if (h.id) {
						e.push(h)
					}
				})
			});
			f.keyNav = new b.ui.KeyboardNavigation( {
				root : f.id,
				items : e,
				onCancel : function() {
					if (b.isWebKit) {
						d.get(f.editor.id + "_ifr").focus()
					}
					f.editor.focus()
				},
				excludeFromTabOrder : !f.settings.tab_focus_toolbar
			})
		},
		destroy : function() {
			var e = this;
			e.parent();
			e.keyNav.destroy();
			a.clear(e.id)
		}
	})
})(tinymce);
(function(a) {
	var c = a.DOM, b = a.each;
	a.create("tinymce.ui.Toolbar:tinymce.ui.Container", {
		renderHTML : function() {
			var m = this, f = "", j, k, n = m.settings, e, d, g, l;
			l = m.controls;
			for (e = 0; e < l.length; e++) {
				k = l[e];
				d = l[e - 1];
				g = l[e + 1];
				if (e === 0) {
					j = "mceToolbarStart";
					if (k.Button) {
						j += " mceToolbarStartButton"
					} else {
						if (k.SplitButton) {
							j += " mceToolbarStartSplitButton"
						} else {
							if (k.ListBox) {
								j += " mceToolbarStartListBox"
							}
						}
					}
					f += c.createHTML("td", {
						"class" : j
					}, c.createHTML("span", null, "<!-- IE -->"))
				}
				if (d && k.ListBox) {
					if (d.Button || d.SplitButton) {
						f += c.createHTML("td", {
							"class" : "mceToolbarEnd"
						}, c.createHTML("span", null, "<!-- IE -->"))
					}
				}
				if (c.stdMode) {
					f += '<td style="position: relative">' + k.renderHTML()
							+ "</td>"
				} else {
					f += "<td>" + k.renderHTML() + "</td>"
				}
				if (g && k.ListBox) {
					if (g.Button || g.SplitButton) {
						f += c.createHTML("td", {
							"class" : "mceToolbarStart"
						}, c.createHTML("span", null, "<!-- IE -->"))
					}
				}
			}
			j = "mceToolbarEnd";
			if (k.Button) {
				j += " mceToolbarEndButton"
			} else {
				if (k.SplitButton) {
					j += " mceToolbarEndSplitButton"
				} else {
					if (k.ListBox) {
						j += " mceToolbarEndListBox"
					}
				}
			}
			f += c.createHTML("td", {
				"class" : j
			}, c.createHTML("span", null, "<!-- IE -->"));
			return c.createHTML("table", {
				id : m.id,
				"class" : "mceToolbar" + (n["class"] ? " " + n["class"] : ""),
				cellpadding : "0",
				cellspacing : "0",
				align : m.settings.align || "",
				role : "presentation",
				tabindex : "-1"
			}, "<tbody><tr>" + f + "</tr></tbody>")
		}
	})
})(tinymce);
(function(b) {
	var a = b.util.Dispatcher, c = b.each;
	b.create("tinymce.AddOnManager", {
		AddOnManager : function() {
			var d = this;
			d.items = [];
			d.urls = {};
			d.lookup = {};
			d.onAdd = new a(d)
		},
		get : function(d) {
			if (this.lookup[d]) {
				return this.lookup[d].instance
			} else {
				return undefined
			}
		},
		dependencies : function(e) {
			var d;
			if (this.lookup[e]) {
				d = this.lookup[e].dependencies
			}
			return d || []
		},
		requireLangPack : function(e) {
			var d = b.settings;
			if (d && d.language && d.language_load !== false) {
				b.ScriptLoader.add(this.urls[e] + "/langs/" + d.language
						+ ".js")
			}
		},
		add : function(f, e, d) {
			this.items.push(e);
			this.lookup[f] = {
				instance : e,
				dependencies : d
			};
			this.onAdd.dispatch(this, f, e);
			return e
		},
		createUrl : function(d, e) {
			if (typeof e === "object") {
				return e
			} else {
				return {
					prefix : d.prefix,
					resource : e,
					suffix : d.suffix
				}
			}
		},
		addComponents : function(f, d) {
			var e = this.urls[f];
			b.each(d, function(g) {
				b.ScriptLoader.add(e + "/" + g)
			})
		},
		load : function(j, f, d, h) {
			var g = this, e = f;
			function i() {
				var k = g.dependencies(j);
				b.each(k, function(m) {
					var l = g.createUrl(f, m);
					g.load(l.resource, l, undefined, undefined)
				});
				if (d) {
					if (h) {
						d.call(h)
					} else {
						d.call(b.ScriptLoader)
					}
				}
			}
			if (g.urls[j]) {
				return
			}
			if (typeof f === "object") {
				e = f.prefix + f.resource + f.suffix
			}
			if (e.indexOf("/") != 0 && e.indexOf("://") == -1) {
				e = b.baseURL + "/" + e
			}
			g.urls[j] = e.substring(0, e.lastIndexOf("/"));
			if (g.lookup[j]) {
				i()
			} else {
				b.ScriptLoader.add(e, i, h)
			}
		}
	});
	b.PluginManager = new b.AddOnManager();
	b.ThemeManager = new b.AddOnManager()
}(tinymce));
(function(j) {
	var g = j.each, d = j.extend, k = j.DOM, i = j.dom.Event, f = j.ThemeManager, b = j.PluginManager, e = j.explode, h = j.util.Dispatcher, a, c = 0;
	j.documentBaseURL = window.location.href.replace(/[\?#].*$/, "").replace(
			/[\/\\][^\/]+$/, "");
	if (!/[\/\\]$/.test(j.documentBaseURL)) {
		j.documentBaseURL += "/"
	}
	j.baseURL = new j.util.URI(j.documentBaseURL).toAbsolute(j.baseURL);
	j.baseURI = new j.util.URI(j.baseURL);
	j.onBeforeUnload = new h(j);
	i.add(window, "beforeunload", function(l) {
		j.onBeforeUnload.dispatch(j, l)
	});
	j.onAddEditor = new h(j);
	j.onRemoveEditor = new h(j);
	j.EditorManager = d(j, {
		editors : [],
		i18n : {},
		activeEditor : null,
		init : function(q) {
			var n = this, p, l = j.ScriptLoader, u, o = [], m;
			function r(x, y, t) {
				var v = x[y];
				if (!v) {
					return
				}
				if (j.is(v, "string")) {
					t = v.replace(/\.\w+$/, "");
					t = t ? j.resolve(t) : 0;
					v = j.resolve(v)
				}
				return v.apply(t || this, Array.prototype.slice.call(arguments,
						2))
			}
			q = d( {
				theme : "simple",
				language : "en"
			}, q);
			n.settings = q;
			i.add(document, "init", function() {
				var s, v;
				r(q, "onpageload");
				switch (q.mode) {
				case "exact":
					s = q.elements || "";
					if (s.length > 0) {
						g(e(s), function(x) {
							if (k.get(x)) {
								m = new j.Editor(x, q);
								o.push(m);
								m.render(1)
							} else {
								g(document.forms, function(y) {
									g(y.elements, function(z) {
										if (z.name === x) {
											x = "mce_editor_" + c++;
											k.setAttrib(z, "id", x);
											m = new j.Editor(x, q);
											o.push(m);
											m.render(1)
										}
									})
								})
							}
						})
					}
					break;
				case "textareas":
				case "specific_textareas":
					function t(y, x) {
						return x.constructor === RegExp ? x.test(y.className)
								: k.hasClass(y, x)
					}
					g(k.select("textarea"), function(x) {
						if (q.editor_deselector && t(x, q.editor_deselector)) {
							return
						}
						if (!q.editor_selector || t(x, q.editor_selector)) {
							u = k.get(x.name);
							if (!x.id && !u) {
								x.id = x.name
							}
							if (!x.id || n.get(x.id)) {
								x.id = k.uniqueId()
							}
							m = new j.Editor(x.id, q);
							o.push(m);
							m.render(1)
						}
					});
					break
				}
				if (q.oninit) {
					s = v = 0;
					g(o, function(x) {
						v++;
						if (!x.initialized) {
							x.onInit.add(function() {
								s++;
								if (s == v) {
									r(q, "oninit")
								}
							})
						} else {
							s++
						}
						if (s == v) {
							r(q, "oninit")
						}
					})
				}
			})
		},
		get : function(l) {
			if (l === a) {
				return this.editors
			}
			return this.editors[l]
		},
		getInstanceById : function(l) {
			return this.get(l)
		},
		add : function(m) {
			var l = this, n = l.editors;
			n[m.id] = m;
			n.push(m);
			l._setActive(m);
			l.onAddEditor.dispatch(l, m);
			return m
		},
		remove : function(n) {
			var m = this, l, o = m.editors;
			if (!o[n.id]) {
				return null
			}
			delete o[n.id];
			for (l = 0; l < o.length; l++) {
				if (o[l] == n) {
					o.splice(l, 1);
					break
				}
			}
			if (m.activeEditor == n) {
				m._setActive(o[0])
			}
			n.destroy();
			m.onRemoveEditor.dispatch(m, n);
			return n
		},
		execCommand : function(r, p, o) {
			var q = this, n = q.get(o), l;
			switch (r) {
			case "mceFocus":
				n.focus();
				return true;
			case "mceAddEditor":
			case "mceAddControl":
				if (!q.get(o)) {
					new j.Editor(o, q.settings).render()
				}
				return true;
			case "mceAddFrameControl":
				l = o.window;
				l.tinyMCE = tinyMCE;
				l.tinymce = j;
				j.DOM.doc = l.document;
				j.DOM.win = l;
				n = new j.Editor(o.element_id, o);
				n.render();
				if (j.isIE) {
					function m() {
						n.destroy();
						l.detachEvent("onunload", m);
						l = l.tinyMCE = l.tinymce = null
					}
					l.attachEvent("onunload", m)
				}
				o.page_window = null;
				return true;
			case "mceRemoveEditor":
			case "mceRemoveControl":
				if (n) {
					n.remove()
				}
				return true;
			case "mceToggleEditor":
				if (!n) {
					q.execCommand("mceAddControl", 0, o);
					return true
				}
				if (n.isHidden()) {
					n.show()
				} else {
					n.hide()
				}
				return true
			}
			if (q.activeEditor) {
				return q.activeEditor.execCommand(r, p, o)
			}
			return false
		},
		execInstanceCommand : function(p, o, n, m) {
			var l = this.get(p);
			if (l) {
				return l.execCommand(o, n, m)
			}
			return false
		},
		triggerSave : function() {
			g(this.editors, function(l) {
				l.save()
			})
		},
		addI18n : function(n, q) {
			var l, m = this.i18n;
			if (!j.is(n, "string")) {
				g(n, function(r, p) {
					g(r, function(t, s) {
						g(t, function(v, u) {
							if (s === "common") {
								m[p + "." + u] = v
							} else {
								m[p + "." + s + "." + u] = v
							}
						})
					})
				})
			} else {
				g(q, function(r, p) {
					m[n + "." + p] = r
				})
			}
		},
		_setActive : function(l) {
			this.selectedInstance = this.activeEditor = l
		}
	})
})(tinymce);
(function(n) {
	var o = n.DOM, k = n.dom.Event, f = n.extend, l = n.util.Dispatcher, i = n.each, a = n.isGecko, b = n.isIE, e = n.isWebKit, d = n.is, h = n.ThemeManager, c = n.PluginManager, p = n.inArray, m = n.grep, g = n.explode, j = n.VK;
	n
			.create(
					"tinymce.Editor",
					{
						Editor : function(u, r) {
							var q = this;
							q.id = q.editorId = u;
							q.execCommands = {};
							q.queryStateCommands = {};
							q.queryValueCommands = {};
							q.isNotDirty = false;
							q.plugins = {};
							i( [ "onPreInit", "onBeforeRenderUI",
									"onPostRender", "onLoad", "onInit",
									"onRemove", "onActivate", "onDeactivate",
									"onClick", "onEvent", "onMouseUp",
									"onMouseDown", "onDblClick", "onKeyDown",
									"onKeyUp", "onKeyPress", "onContextMenu",
									"onSubmit", "onReset", "onPaste",
									"onPreProcess", "onPostProcess",
									"onBeforeSetContent", "onBeforeGetContent",
									"onSetContent", "onGetContent",
									"onLoadContent", "onSaveContent",
									"onNodeChange", "onChange",
									"onBeforeExecCommand", "onExecCommand",
									"onUndo", "onRedo", "onVisualAid",
									"onSetProgressState", "onSetAttrib" ],
									function(s) {
										q[s] = new l(q)
									});
							q.settings = r = f(
									{
										id : u,
										language : "en",
										docs_language : "en",
										theme : "simple",
										skin : "default",
										delta_width : 0,
										delta_height : 0,
										popup_css : "",
										plugins : "",
										document_base_url : n.documentBaseURL,
										add_form_submit_trigger : 1,
										submit_patch : 1,
										add_unload_trigger : 1,
										convert_urls : 1,
										relative_urls : 1,
										remove_script_host : 1,
										table_inline_editing : 0,
										object_resizing : 1,
										cleanup : 1,
										accessibility_focus : 1,
										custom_shortcuts : 1,
										custom_undo_redo_keyboard_shortcuts : 1,
										custom_undo_redo_restore_selection : 1,
										custom_undo_redo : 1,
										doctype : n.isIE6 ? '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">'
												: "<!DOCTYPE>",
										visual_table_class : "mceItemTable",
										visual : 1,
										font_size_style_values : "xx-small,x-small,small,medium,large,x-large,xx-large",
										font_size_legacy_values : "xx-small,small,medium,large,x-large,xx-large,300%",
										apply_source_formatting : 1,
										directionality : "ltr",
										forced_root_block : "p",
										hidden_input : 1,
										padd_empty_editor : 1,
										render_ui : 1,
										init_theme : 1,
										force_p_newlines : 1,
										indentation : "30px",
										keep_styles : 1,
										fix_table_elements : 1,
										inline_styles : 1,
										convert_fonts_to_spans : true,
										indent : "simple",
										indent_before : "p,h1,h2,h3,h4,h5,h6,blockquote,div,title,style,pre,script,td,ul,li,area,table,thead,tfoot,tbody,tr",
										indent_after : "p,h1,h2,h3,h4,h5,h6,blockquote,div,title,style,pre,script,td,ul,li,area,table,thead,tfoot,tbody,tr",
										validate : true,
										entity_encoding : "named",
										url_converter : q.convertURL,
										url_converter_scope : q,
										ie7_compat : true
									}, r);
							q.documentBaseURI = new n.util.URI(
									r.document_base_url || n.documentBaseURL, {
										base_uri : tinyMCE.baseURI
									});
							q.baseURI = n.baseURI;
							q.contentCSS = [];
							q.execCallback("setup", q)
						},
						render : function(u) {
							var v = this, x = v.settings, y = v.id, q = n.ScriptLoader;
							if (!k.domLoaded) {
								k.add(document, "init", function() {
									v.render()
								});
								return
							}
							tinyMCE.settings = x;
							if (!v.getElement()) {
								return
							}
							if (n.isIDevice && !n.isIOS5) {
								return
							}
							if (!/TEXTAREA|INPUT/i
									.test(v.getElement().nodeName)
									&& x.hidden_input && o.getParent(y, "form")) {
								o.insertAfter(o.create("input", {
									type : "hidden",
									name : y
								}), y)
							}
							if (n.WindowManager) {
								v.windowManager = new n.WindowManager(v)
							}
							if (x.encoding == "xml") {
								v.onGetContent.add(function(s, t) {
									if (t.save) {
										t.content = o.encode(t.content)
									}
								})
							}
							if (x.add_form_submit_trigger) {
								v.onSubmit.addToTop(function() {
									if (v.initialized) {
										v.save();
										v.isNotDirty = 1
									}
								})
							}
							if (x.add_unload_trigger) {
								v._beforeUnload = tinyMCE.onBeforeUnload
										.add(function() {
											if (v.initialized && !v.destroyed
													&& !v.isHidden()) {
												v.save( {
													format : "raw",
													no_events : true
												})
											}
										})
							}
							n.addUnload(v.destroy, v);
							if (x.submit_patch) {
								v.onBeforeRenderUI
										.add(function() {
											var s = v.getElement().form;
											if (!s) {
												return
											}
											if (s._mceOldSubmit) {
												return
											}
											if (!s.submit.nodeType
													&& !s.submit.length) {
												v.formElement = s;
												s._mceOldSubmit = s.submit;
												s.submit = function() {
													n.triggerSave();
													v.isNotDirty = 1;
													return v.formElement
															._mceOldSubmit(v.formElement)
												}
											}
											s = null
										})
							}
							function r() {
								if (x.language && x.language_load !== false) {
									q.add(n.baseURL + "/langs/" + x.language
											+ ".js")
								}
								if (x.theme && x.theme.charAt(0) != "-"
										&& !h.urls[x.theme]) {
									h.load(x.theme, "themes/" + x.theme
											+ "/editor_template" + n.suffix
											+ ".js")
								}
								i(g(x.plugins), function(t) {
									if (t && !c.urls[t]) {
										if (t.charAt(0) == "-") {
											t = t.substr(1, t.length);
											var s = c.dependencies(t);
											i(s, function(A) {
												var z = {
													prefix : "plugins/",
													resource : A,
													suffix : "/editor_plugin"
															+ n.suffix + ".js"
												};
												var A = c.createUrl(z, A);
												c.load(A.resource, A)
											})
										} else {
											if (t == "safari") {
												return
											}
											c.load(t, {
												prefix : "plugins/",
												resource : t,
												suffix : "/editor_plugin"
														+ n.suffix + ".js"
											})
										}
									}
								});
								q.loadQueue(function() {
									if (!v.removed) {
										v.init()
									}
								})
							}
							r()
						},
						init : function() {
							var v, I = this, J = I.settings, F, B, E = I
									.getElement(), r, q, G, z, D, H, A, x = [];
							n.add(I);
							J.aria_label = J.aria_label
									|| o.getAttrib(E, "aria-label", I
											.getLang("aria.rich_text_area"));
							if (J.theme) {
								J.theme = J.theme.replace(/-/, "");
								r = h.get(J.theme);
								I.theme = new r();
								if (I.theme.init && J.init_theme) {
									I.theme.init(I, h.urls[J.theme]
											|| n.documentBaseURL.replace(/\/$/,
													""))
								}
							}
							function C(K) {
								var L = c.get(K), t = c.urls[K]
										|| n.documentBaseURL.replace(/\/$/, ""), s;
								if (L && n.inArray(x, K) === -1) {
									i(c.dependencies(K), function(u) {
										C(u)
									});
									s = new L(I, t);
									I.plugins[K] = s;
									if (s.init) {
										s.init(I, t);
										x.push(K)
									}
								}
							}
							i(g(J.plugins.replace(/\-/g, "")), C);
							if (J.popup_css !== false) {
								if (J.popup_css) {
									J.popup_css = I.documentBaseURI
											.toAbsolute(J.popup_css)
								} else {
									J.popup_css = I.baseURI
											.toAbsolute("themes/" + J.theme
													+ "/skins/" + J.skin
													+ "/dialog.css")
								}
							}
							if (J.popup_css_add) {
								J.popup_css += ","
										+ I.documentBaseURI
												.toAbsolute(J.popup_css_add)
							}
							I.controlManager = new n.ControlManager(I);
							if (J.custom_undo_redo) {
								I.onBeforeExecCommand.add(function(t, K, u, L,
										s) {
									if (K != "Undo" && K != "Redo"
											&& K != "mceRepaint"
											&& (!s || !s.skip_undo)) {
										I.undoManager.beforeChange()
									}
								});
								I.onExecCommand.add(function(t, K, u, L, s) {
									if (K != "Undo" && K != "Redo"
											&& K != "mceRepaint"
											&& (!s || !s.skip_undo)) {
										I.undoManager.add()
									}
								})
							}
							I.onExecCommand.add(function(s, t) {
								if (!/^(FontName|FontSize)$/.test(t)) {
									I.nodeChanged()
								}
							});
							if (a) {
								function y(s, t) {
									if (!t || !t.initial) {
										I.execCommand("mceRepaint")
									}
								}
								I.onUndo.add(y);
								I.onRedo.add(y);
								I.onSetContent.add(y)
							}
							I.onBeforeRenderUI.dispatch(I, I.controlManager);
							if (J.render_ui) {
								F = J.width || E.style.width || E.offsetWidth;
								B = J.height || E.style.height
										|| E.offsetHeight;
								I.orgDisplay = E.style.display;
								H = /^[0-9\.]+(|px)$/i;
								if (H.test("" + F)) {
									F = Math.max(parseInt(F)
											+ (r.deltaWidth || 0), 100)
								}
								if (H.test("" + B)) {
									B = Math.max(parseInt(B)
											+ (r.deltaHeight || 0), 100)
								}
								r = I.theme.renderUI( {
									targetNode : E,
									width : F,
									height : B,
									deltaWidth : J.delta_width,
									deltaHeight : J.delta_height
								});
								I.editorContainer = r.editorContainer
							}
							if (document.domain
									&& location.hostname != document.domain) {
								n.relaxedDomain = document.domain
							}
							o.setStyles(r.sizeContainer || r.editorContainer, {
								width : F,
								height : B
							});
							if (J.content_css) {
								n.each(g(J.content_css), function(s) {
									I.contentCSS.push(I.documentBaseURI
											.toAbsolute(s))
								})
							}
							B = (r.iframeHeight || B)
									+ (typeof (B) == "number" ? (r.deltaHeight || 0)
											: "");
							if (B < 100) {
								B = 100
							}
							I.iframeHTML = J.doctype + '<html><head xmlns="http://www.w3.org/1999/xhtml">';
							if (J.document_base_url != n.documentBaseURL) {
								I.iframeHTML += '<base href="' + I.documentBaseURI
										.getURI() + '" />'
							}
							if (J.ie7_compat) {
								I.iframeHTML += '<meta http-equiv="X-UA-Compatible" content="IE=7" />'
							} else {
								I.iframeHTML += '<meta http-equiv="X-UA-Compatible" content="IE=edge" />'
							}
							I.iframeHTML += '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
							for (A = 0; A < I.contentCSS.length; A++) {
								I.iframeHTML += '<link type="text/css" rel="stylesheet" href="' + I.contentCSS[A] + '" />'
							}
							I.contentCSS = [];
							z = J.body_id || "tinymce";
							if (z.indexOf("=") != -1) {
								z = I.getParam("body_id", "", "hash");
								z = z[I.id] || z
							}
							D = J.body_class || "";
							if (D.indexOf("=") != -1) {
								D = I.getParam("body_class", "", "hash");
								D = D[I.id] || ""
							}
							I.iframeHTML += '</head><body id="'
									+ z
									+ '" class="mceContentBody '
									+ D
									+ '" onload="window.parent.tinyMCE.get(\''
									+ I.id
									+ "').onLoad.dispatch();\"><br></body></html>";
							if (n.relaxedDomain
									&& (b || (n.isOpera && parseFloat(opera
											.version()) < 11))) {
								G = 'javascript:(function(){document.open();document.domain="'
										+ document.domain
										+ '";var ed = window.parent.tinyMCE.get("'
										+ I.id
										+ '");document.write(ed.iframeHTML);document.close();ed.setupIframe();})()'
							}
							v = o.add(r.iframeContainer, "iframe", {
								id : I.id + "_ifr",
								src : G || 'javascript:""',
								frameBorder : "0",
								allowTransparency : "true",
								title : J.aria_label,
								style : {
									width : "100%",
									height : B,
									display : "block"
								}
							});
							I.contentAreaContainer = r.iframeContainer;
							o.get(r.editorContainer).style.display = I.orgDisplay;
							o.get(I.id).style.display = "none";
							o.setAttrib(I.id, "aria-hidden", true);
							if (!n.relaxedDomain || !G) {
								I.setupIframe()
							}
							E = v = r = null
						},
						setupIframe : function() {
							var r = this, x = r.settings, y = o.get(r.id), z = r
									.getDoc(), v, q;
							if (!b || !n.relaxedDomain) {
								z.open();
								z.write(r.iframeHTML);
								z.close();
								if (n.relaxedDomain) {
									z.domain = n.relaxedDomain
								}
							}
							q = r.getBody();
							q.disabled = true;
							if (!x.readonly) {
								q.contentEditable = true
							}
							q.disabled = false;
							r.schema = new n.html.Schema(x);
							r.dom = new n.dom.DOMUtils(r.getDoc(), {
								keep_values : true,
								url_converter : r.convertURL,
								url_converter_scope : r,
								hex_colors : x.force_hex_style_colors,
								class_filter : x.class_filter,
								update_styles : 1,
								fix_ie_paragraphs : 1,
								schema : r.schema
							});
							r.parser = new n.html.DomParser(x, r.schema);
							if (!r.settings.allow_html_in_named_anchor) {
								r.parser.addAttributeFilter("name", function(s,
										t) {
									var B = s.length, D, A, C, E;
									while (B--) {
										E = s[B];
										if (E.name === "a" && E.firstChild) {
											C = E.parent;
											D = E.lastChild;
											do {
												A = D.prev;
												C.insert(D, E);
												D = A
											} while (D)
										}
									}
								})
							}
							r.parser.addAttributeFilter("src,href,style",
									function(s, t) {
										var A = s.length, C, E = r.dom, D, B;
										while (A--) {
											C = s[A];
											D = C.attr(t);
											B = "data-mce-" + t;
											if (!C.attributes.map[B]) {
												if (t === "style") {
													C.attr(B, E.serializeStyle(
															E.parseStyle(D),
															C.name))
												} else {
													C.attr(B, r.convertURL(D,
															t, C.name))
												}
											}
										}
									});
							r.parser
									.addNodeFilter(
											"script",
											function(s, t) {
												var A = s.length, B;
												while (A--) {
													B = s[A];
													B
															.attr(
																	"type",
																	"mce-"
																			+ (B
																					.attr("type") || "text/javascript"))
												}
											});
							r.parser.addNodeFilter("#cdata", function(s, t) {
								var A = s.length, B;
								while (A--) {
									B = s[A];
									B.type = 8;
									B.name = "#comment";
									B.value = "[CDATA[" + B.value + "]]"
								}
							});
							r.parser
									.addNodeFilter(
											"p,h1,h2,h3,h4,h5,h6,div",
											function(t, A) {
												var B = t.length, C, s = r.schema
														.getNonEmptyElements();
												while (B--) {
													C = t[B];
													if (C.isEmpty(s)) {
														C
																.empty()
																.append(
																		new n.html.Node(
																				"br",
																				1)).shortEnded = true
													}
												}
											});
							r.serializer = new n.dom.Serializer(x, r.dom,
									r.schema);
							r.selection = new n.dom.Selection(r.dom,
									r.getWin(), r.serializer);
							r.formatter = new n.Formatter(this);
							r.formatter
									.register( {
										alignleft : [
												{
													selector : "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li",
													styles : {
														textAlign : "left"
													}
												}, {
													selector : "img,table",
													collapsed : false,
													styles : {
														"float" : "left"
													}
												} ],
										aligncenter : [
												{
													selector : "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li",
													styles : {
														textAlign : "center"
													}
												}, {
													selector : "img",
													collapsed : false,
													styles : {
														display : "block",
														marginLeft : "auto",
														marginRight : "auto"
													}
												}, {
													selector : "table",
													collapsed : false,
													styles : {
														marginLeft : "auto",
														marginRight : "auto"
													}
												} ],
										alignright : [
												{
													selector : "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li",
													styles : {
														textAlign : "right"
													}
												}, {
													selector : "img,table",
													collapsed : false,
													styles : {
														"float" : "right"
													}
												} ],
										alignfull : [ {
											selector : "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li",
											styles : {
												textAlign : "justify"
											}
										} ],
										bold : [ {
											inline : "strong",
											remove : "all"
										}, {
											inline : "span",
											styles : {
												fontWeight : "bold"
											}
										}, {
											inline : "b",
											remove : "all"
										} ],
										italic : [ {
											inline : "em",
											remove : "all"
										}, {
											inline : "span",
											styles : {
												fontStyle : "italic"
											}
										}, {
											inline : "i",
											remove : "all"
										} ],
										underline : [ {
											inline : "span",
											styles : {
												textDecoration : "underline"
											},
											exact : true
										}, {
											inline : "u",
											remove : "all"
										} ],
										strikethrough : [ {
											inline : "span",
											styles : {
												textDecoration : "line-through"
											},
											exact : true
										}, {
											inline : "strike",
											remove : "all"
										} ],
										forecolor : {
											inline : "span",
											styles : {
												color : "%value"
											},
											wrap_links : false
										},
										hilitecolor : {
											inline : "span",
											styles : {
												backgroundColor : "%value"
											},
											wrap_links : false
										},
										fontname : {
											inline : "span",
											styles : {
												fontFamily : "%value"
											}
										},
										fontsize : {
											inline : "span",
											styles : {
												fontSize : "%value"
											}
										},
										fontsize_class : {
											inline : "span",
											attributes : {
												"class" : "%value"
											}
										},
										blockquote : {
											block : "blockquote",
											wrapper : 1,
											remove : "all"
										},
										subscript : {
											inline : "sub"
										},
										superscript : {
											inline : "sup"
										},
										link : {
											inline : "a",
											selector : "a",
											remove : "all",
											split : true,
											deep : true,
											onmatch : function(s) {
												return true
											},
											onformat : function(A, s, t) {
												i(t, function(C, B) {
													r.dom.setAttrib(A, B, C)
												})
											}
										},
										removeformat : [
												{
													selector : "b,strong,em,i,font,u,strike",
													remove : "all",
													split : true,
													expand : false,
													block_expand : true,
													deep : true
												},
												{
													selector : "span",
													attributes : [ "style",
															"class" ],
													remove : "empty",
													split : true,
													expand : false,
													deep : true
												},
												{
													selector : "*",
													attributes : [ "style",
															"class" ],
													split : false,
													expand : false,
													deep : true
												} ]
									});
							i(
									"p h1 h2 h3 h4 h5 h6 div address pre div code dt dd samp"
											.split(/\s/), function(s) {
										r.formatter.register(s, {
											block : s,
											remove : "all"
										})
									});
							r.formatter.register(r.settings.formats);
							r.undoManager = new n.UndoManager(r);
							r.undoManager.onAdd.add(function(t, s) {
								if (t.hasUndo()) {
									return r.onChange.dispatch(r, s, t)
								}
							});
							r.undoManager.onUndo.add(function(t, s) {
								return r.onUndo.dispatch(r, s, t)
							});
							r.undoManager.onRedo.add(function(t, s) {
								return r.onRedo.dispatch(r, s, t)
							});
							r.forceBlocks = new n.ForceBlocks(r, {
								forced_root_block : x.forced_root_block
							});
							r.editorCommands = new n.EditorCommands(r);
							r.serializer.onPreProcess.add(function(s, t) {
								return r.onPreProcess.dispatch(r, t, s)
							});
							r.serializer.onPostProcess.add(function(s, t) {
								return r.onPostProcess.dispatch(r, t, s)
							});
							r.onPreInit.dispatch(r);
							if (!x.gecko_spellcheck) {
								r.getBody().spellcheck = 0
							}
							if (!x.readonly) {
								r._addEvents()
							}
							r.controlManager.onPostRender.dispatch(r,
									r.controlManager);
							r.onPostRender.dispatch(r);
							r.quirks = new n.util.Quirks(this);
							if (x.directionality) {
								r.getBody().dir = x.directionality
							}
							if (x.nowrap) {
								r.getBody().style.whiteSpace = "nowrap"
							}
							if (x.handle_node_change_callback) {
								r.onNodeChange.add(function(t, s, A) {
									r.execCallback(
											"handle_node_change_callback",
											r.id, A, -1, -1, true, r.selection
													.isCollapsed())
								})
							}
							if (x.save_callback) {
								r.onSaveContent.add(function(s, A) {
									var t = r.execCallback("save_callback",
											r.id, A.content, r.getBody());
									if (t) {
										A.content = t
									}
								})
							}
							if (x.onchange_callback) {
								r.onChange.add(function(t, s) {
									r.execCallback("onchange_callback", r, s)
								})
							}
							if (x.protect) {
								r.onBeforeSetContent
										.add(function(s, t) {
											if (x.protect) {
												i(
														x.protect,
														function(A) {
															t.content = t.content
																	.replace(
																			A,
																			function(
																					B) {
																				return "<!--mce:protected "
																						+ escape(B)
																						+ "-->"
																			})
														})
											}
										})
							}
							if (x.convert_newlines_to_brs) {
								r.onBeforeSetContent.add(function(s, t) {
									if (t.initial) {
										t.content = t.content.replace(/\r?\n/g,
												"<br />")
									}
								})
							}
							if (x.preformatted) {
								r.onPostProcess
										.add(function(s, t) {
											t.content = t.content.replace(
													/^\s*<pre.*?>/, "");
											t.content = t.content.replace(
													/<\/pre>\s*$/, "");
											if (t.set) {
												t.content = '<pre class="mceItemHidden">'
														+ t.content + "</pre>"
											}
										})
							}
							if (x.verify_css_classes) {
								r.serializer.attribValueFilter = function(C, A) {
									var B, t;
									if (C == "class") {
										if (!r.classesRE) {
											t = r.dom.getClasses();
											if (t.length > 0) {
												B = "";
												i(t, function(s) {
													B += (B ? "|" : "")
															+ s["class"]
												});
												r.classesRE = new RegExp("("
														+ B + ")", "gi")
											}
										}
										return !r.classesRE
												|| /(\bmceItem\w+\b|\bmceTemp\w+\b)/g
														.test(A)
												|| r.classesRE.test(A) ? A : ""
									}
									return A
								}
							}
							if (x.cleanup_callback) {
								r.onBeforeSetContent.add(function(s, t) {
									t.content = r.execCallback(
											"cleanup_callback",
											"insert_to_editor", t.content, t)
								});
								r.onPreProcess.add(function(s, t) {
									if (t.set) {
										r.execCallback("cleanup_callback",
												"insert_to_editor_dom", t.node,
												t)
									}
									if (t.get) {
										r.execCallback("cleanup_callback",
												"get_from_editor_dom", t.node,
												t)
									}
								});
								r.onPostProcess.add(function(s, t) {
									if (t.set) {
										t.content = r.execCallback(
												"cleanup_callback",
												"insert_to_editor", t.content,
												t)
									}
									if (t.get) {
										t.content = r
												.execCallback(
														"cleanup_callback",
														"get_from_editor",
														t.content, t)
									}
								})
							}
							if (x.save_callback) {
								r.onGetContent.add(function(s, t) {
									if (t.save) {
										t.content = r.execCallback(
												"save_callback", r.id,
												t.content, r.getBody())
									}
								})
							}
							if (x.handle_event_callback) {
								r.onEvent.add(function(s, t, A) {
									if (r.execCallback("handle_event_callback",
											t, s, A) === false) {
										k.cancel(t)
									}
								})
							}
							r.onSetContent.add(function() {
								r.addVisual(r.getBody())
							});
							if (x.padd_empty_editor) {
								r.onPostProcess
										.add(function(s, t) {
											t.content = t.content
													.replace(
															/^(<p[^>]*>(&nbsp;|&#160;|\s|\u00a0|)<\/p>[\r\n]*|<br \/>[\r\n]*)$/,
															"")
										})
							}
							if (a) {
								function u(s, t) {
									i(s.dom.select("a"), function(B) {
										var A = B.parentNode;
										if (s.dom.isBlock(A)
												&& A.lastChild === B) {
											s.dom.add(A, "br", {
												"data-mce-bogus" : 1
											})
										}
									})
								}
								r.onExecCommand.add(function(s, t) {
									if (t === "CreateLink") {
										u(s)
									}
								});
								r.onSetContent.add(r.selection.onSetContent
										.add(u))
							}
							r.load( {
								initial : true,
								format : "html"
							});
							r.startContent = r.getContent( {
								format : "raw"
							});
							r.undoManager.add();
							r.initialized = true;
							r.onInit.dispatch(r);
							r.execCallback("setupcontent_callback", r.id, r
									.getBody(), r.getDoc());
							r.execCallback("init_instance_callback", r);
							r.focus(true);
							r.nodeChanged( {
								initial : 1
							});
							i(r.contentCSS, function(s) {
								r.dom.loadCSS(s)
							});
							if (x.auto_focus) {
								setTimeout(function() {
									var s = n.get(x.auto_focus);
									s.selection.select(s.getBody(), 1);
									s.selection.collapse(1);
									s.getBody().focus();
									s.getWin().focus()
								}, 100)
							}
							y = null
						},
						focus : function(v) {
							var z, r = this, u = r.selection, y = r.settings.content_editable, s, q, x = r
									.getDoc();
							if (!v) {
								s = u.getRng();
								if (s.item) {
									q = s.item(0)
								}
								r._refreshContentEditable();
								if (!y) {
									r.getWin().focus()
								}
								if (n.isGecko) {
									r.getBody().focus()
								}
								if (q && q.ownerDocument == x) {
									s = x.body.createControlRange();
									s.addElement(q);
									s.select()
								}
							}
							if (n.activeEditor != r) {
								if ((z = n.activeEditor) != null) {
									z.onDeactivate.dispatch(z, r)
								}
								r.onActivate.dispatch(r, z)
							}
							n._setActive(r)
						},
						execCallback : function(v) {
							var q = this, u = q.settings[v], r;
							if (!u) {
								return
							}
							if (q.callbackLookup && (r = q.callbackLookup[v])) {
								u = r.func;
								r = r.scope
							}
							if (d(u, "string")) {
								r = u.replace(/\.\w+$/, "");
								r = r ? n.resolve(r) : 0;
								u = n.resolve(u);
								q.callbackLookup = q.callbackLookup || {};
								q.callbackLookup[v] = {
									func : u,
									scope : r
								}
							}
							return u.apply(r || q, Array.prototype.slice.call(
									arguments, 1))
						},
						translate : function(q) {
							var t = this.settings.language || "en", r = n.i18n;
							if (!q) {
								return ""
							}
							return r[t + "." + q]
									|| q.replace(/{\#([^}]+)\}/g,
											function(u, s) {
												return r[t + "." + s] || "{#"
														+ s + "}"
											})
						},
						getLang : function(r, q) {
							return n.i18n[(this.settings.language || "en")
									+ "." + r]
									|| (d(q) ? q : "{#" + r + "}")
						},
						getParam : function(x, s, q) {
							var t = n.trim, r = d(this.settings[x]) ? this.settings[x]
									: s, u;
							if (q === "hash") {
								u = {};
								if (d(r, "string")) {
									i(r.indexOf("=") > 0 ? r
											.split(/[;,](?![^=;,]*(?:[;,]|$))/)
											: r.split(","), function(y) {
										y = y.split("=");
										if (y.length > 1) {
											u[t(y[0])] = t(y[1])
										} else {
											u[t(y[0])] = t(y)
										}
									})
								} else {
									u = r
								}
								return u
							}
							return r
						},
						nodeChanged : function(u) {
							var q = this, r = q.selection, v = r.getStart()
									|| q.getBody();
							if (q.initialized) {
								u = u || {};
								v = b && v.ownerDocument != q.getDoc() ? q
										.getBody() : v;
								u.parents = [];
								q.dom.getParent(v, function(s) {
									if (s.nodeName == "BODY") {
										return true
									}
									u.parents.push(s)
								});
								q.onNodeChange.dispatch(q, u ? u.controlManager
										|| q.controlManager : q.controlManager,
										v, r.isCollapsed(), u)
							}
						},
						addButton : function(u, r) {
							var q = this;
							q.buttons = q.buttons || {};
							q.buttons[u] = r
						},
						addCommand : function(q, s, r) {
							this.execCommands[q] = {
								func : s,
								scope : r || this
							}
						},
						addQueryStateHandler : function(q, s, r) {
							this.queryStateCommands[q] = {
								func : s,
								scope : r || this
							}
						},
						addQueryValueHandler : function(q, s, r) {
							this.queryValueCommands[q] = {
								func : s,
								scope : r || this
							}
						},
						addShortcut : function(s, v, q, u) {
							var r = this, x;
							if (!r.settings.custom_shortcuts) {
								return false
							}
							r.shortcuts = r.shortcuts || {};
							if (d(q, "string")) {
								x = q;
								q = function() {
									r.execCommand(x, false, null)
								}
							}
							if (d(q, "object")) {
								x = q;
								q = function() {
									r.execCommand(x[0], x[1], x[2])
								}
							}
							i(g(s), function(t) {
								var y = {
									func : q,
									scope : u || this,
									desc : v,
									alt : false,
									ctrl : false,
									shift : false
								};
								i(g(t, "+"), function(z) {
									switch (z) {
									case "alt":
									case "ctrl":
									case "shift":
										y[z] = true;
										break;
									default:
										y.charCode = z.charCodeAt(0);
										y.keyCode = z.toUpperCase().charCodeAt(
												0)
									}
								});
								r.shortcuts[(y.ctrl ? "ctrl" : "") + ","
										+ (y.alt ? "alt" : "") + ","
										+ (y.shift ? "shift" : "") + ","
										+ y.keyCode] = y
							});
							return true
						},
						execCommand : function(y, x, A, q) {
							var u = this, v = 0, z, r;
							if (!/^(mceAddUndoLevel|mceEndUndoLevel|mceBeginUndoLevel|mceRepaint|SelectAll)$/
									.test(y)
									&& (!q || !q.skip_focus)) {
								u.focus()
							}
							q = f( {}, q);
							u.onBeforeExecCommand.dispatch(u, y, x, A, q);
							if (q.terminate) {
								return false
							}
							if (u.execCallback("execcommand_callback", u.id,
									u.selection.getNode(), y, x, A)) {
								u.onExecCommand.dispatch(u, y, x, A, q);
								return true
							}
							if (z = u.execCommands[y]) {
								r = z.func.call(z.scope, x, A);
								if (r !== true) {
									u.onExecCommand.dispatch(u, y, x, A, q);
									return r
								}
							}
							i(u.plugins, function(s) {
								if (s.execCommand && s.execCommand(y, x, A)) {
									u.onExecCommand.dispatch(u, y, x, A, q);
									v = 1;
									return false
								}
							});
							if (v) {
								return true
							}
							if (u.theme && u.theme.execCommand
									&& u.theme.execCommand(y, x, A)) {
								u.onExecCommand.dispatch(u, y, x, A, q);
								return true
							}
							if (u.editorCommands.execCommand(y, x, A)) {
								u.onExecCommand.dispatch(u, y, x, A, q);
								return true
							}
							u.getDoc().execCommand(y, x, A);
							u.onExecCommand.dispatch(u, y, x, A, q)
						},
						queryCommandState : function(v) {
							var r = this, x, u;
							if (r._isHidden()) {
								return
							}
							if (x = r.queryStateCommands[v]) {
								u = x.func.call(x.scope);
								if (u !== true) {
									return u
								}
							}
							x = r.editorCommands.queryCommandState(v);
							if (x !== -1) {
								return x
							}
							try {
								return this.getDoc().queryCommandState(v)
							} catch (q) {
							}
						},
						queryCommandValue : function(x) {
							var r = this, v, u;
							if (r._isHidden()) {
								return
							}
							if (v = r.queryValueCommands[x]) {
								u = v.func.call(v.scope);
								if (u !== true) {
									return u
								}
							}
							v = r.editorCommands.queryCommandValue(x);
							if (d(v)) {
								return v
							}
							try {
								return this.getDoc().queryCommandValue(x)
							} catch (q) {
							}
						},
						show : function() {
							var q = this;
							o.show(q.getContainer());
							o.hide(q.id);
							q.load()
						},
						hide : function() {
							var q = this, r = q.getDoc();
							if (b && r) {
								r.execCommand("SelectAll")
							}
							q.save();
							o.hide(q.getContainer());
							o.setStyle(q.id, "display", q.orgDisplay)
						},
						isHidden : function() {
							return !o.isHidden(this.id)
						},
						setProgressState : function(q, r, s) {
							this.onSetProgressState.dispatch(this, q, r, s);
							return q
						},
						load : function(u) {
							var q = this, s = q.getElement(), r;
							if (s) {
								u = u || {};
								u.load = true;
								r = q.setContent(d(s.value) ? s.value
										: s.innerHTML, u);
								u.element = s;
								if (!u.no_events) {
									q.onLoadContent.dispatch(q, u)
								}
								u.element = s = null;
								return r
							}
						},
						save : function(v) {
							var q = this, u = q.getElement(), r, s;
							if (!u || !q.initialized) {
								return
							}
							v = v || {};
							v.save = true;
							if (!v.no_events) {
								q.undoManager.typing = false;
								q.undoManager.add()
							}
							v.element = u;
							r = v.content = q.getContent(v);
							if (!v.no_events) {
								q.onSaveContent.dispatch(q, v)
							}
							r = v.content;
							if (!/TEXTAREA|INPUT/i.test(u.nodeName)) {
								u.innerHTML = r;
								if (s = o.getParent(q.id, "form")) {
									i(s.elements, function(t) {
										if (t.name == q.id) {
											t.value = r;
											return false
										}
									})
								}
							} else {
								u.value = r
							}
							v.element = u = null;
							return r
						},
						setContent : function(v, t) {
							var s = this, r, q = s.getBody(), u;
							t = t || {};
							t.format = t.format || "html";
							t.set = true;
							t.content = v;
							if (!t.no_events) {
								s.onBeforeSetContent.dispatch(s, t)
							}
							v = t.content;
							if (!n.isIE && (v.length === 0 || /^\s+$/.test(v))) {
								u = s.settings.forced_root_block;
								if (u) {
									v = "<" + u + '><br data-mce-bogus="1"></'
											+ u + ">"
								} else {
									v = '<br data-mce-bogus="1">'
								}
								q.innerHTML = v;
								s.selection.select(q, true);
								s.selection.collapse(true);
								return
							}
							if (t.format !== "raw") {
								v = new n.html.Serializer( {}, s.schema)
										.serialize(s.parser.parse(v))
							}
							t.content = n.trim(v);
							s.dom.setHTML(q, t.content);
							if (!t.no_events) {
								s.onSetContent.dispatch(s, t)
							}
							s.selection.normalize();
							return t.content
						},
						getContent : function(r) {
							var q = this, s;
							r = r || {};
							r.format = r.format || "html";
							r.get = true;
							if (!r.no_events) {
								q.onBeforeGetContent.dispatch(q, r)
							}
							if (r.format == "raw") {
								s = q.getBody().innerHTML
							} else {
								s = q.serializer.serialize(q.getBody(), r)
							}
							r.content = n.trim(s);
							if (!r.no_events) {
								q.onGetContent.dispatch(q, r)
							}
							return r.content
						},
						isDirty : function() {
							var q = this;
							return n.trim(q.startContent) != n.trim(q
									.getContent( {
										format : "raw",
										no_events : 1
									}))
									&& !q.isNotDirty
						},
						getContainer : function() {
							var q = this;
							if (!q.container) {
								q.container = o.get(q.editorContainer || q.id
										+ "_parent")
							}
							return q.container
						},
						getContentAreaContainer : function() {
							return this.contentAreaContainer
						},
						getElement : function() {
							return o.get(this.settings.content_element
									|| this.id)
						},
						getWin : function() {
							var q = this, r;
							if (!q.contentWindow) {
								r = o.get(q.id + "_ifr");
								if (r) {
									q.contentWindow = r.contentWindow
								}
							}
							return q.contentWindow
						},
						getDoc : function() {
							var r = this, q;
							if (!r.contentDocument) {
								q = r.getWin();
								if (q) {
									r.contentDocument = q.document
								}
							}
							return r.contentDocument
						},
						getBody : function() {
							return this.bodyElement || this.getDoc().body
						},
						convertURL : function(q, y, x) {
							var r = this, v = r.settings;
							if (v.urlconverter_callback) {
								return r.execCallback("urlconverter_callback",
										q, x, true, y)
							}
							if (!v.convert_urls || (x && x.nodeName == "LINK")
									|| q.indexOf("file:") === 0) {
								return q
							}
							if (v.relative_urls) {
								return r.documentBaseURI.toRelative(q)
							}
							q = r.documentBaseURI.toAbsolute(q,
									v.remove_script_host);
							return q
						},
						addVisual : function(u) {
							var q = this, r = q.settings;
							u = u || q.getBody();
							if (!d(q.hasVisual)) {
								q.hasVisual = r.visual
							}
							i(q.dom.select("table,a", u), function(t) {
								var s;
								switch (t.nodeName) {
								case "TABLE":
									s = q.dom.getAttrib(t, "border");
									if (!s || s == "0") {
										if (q.hasVisual) {
											q.dom.addClass(t,
													r.visual_table_class)
										} else {
											q.dom.removeClass(t,
													r.visual_table_class)
										}
									}
									return;
								case "A":
									s = q.dom.getAttrib(t, "name");
									if (s) {
										if (q.hasVisual) {
											q.dom.addClass(t, "mceItemAnchor")
										} else {
											q.dom.removeClass(t,
													"mceItemAnchor")
										}
									}
									return
								}
							});
							q.onVisualAid.dispatch(q, u, q.hasVisual)
						},
						remove : function() {
							var q = this, r = q.getContainer();
							q.removed = 1;
							q.hide();
							q.execCallback("remove_instance_callback", q);
							q.onRemove.dispatch(q);
							q.onExecCommand.listeners = [];
							n.remove(q);
							o.remove(r)
						},
						destroy : function(r) {
							var q = this;
							if (q.destroyed) {
								return
							}
							if (!r) {
								n.removeUnload(q.destroy);
								tinyMCE.onBeforeUnload.remove(q._beforeUnload);
								if (q.theme && q.theme.destroy) {
									q.theme.destroy()
								}
								q.controlManager.destroy();
								q.selection.destroy();
								q.dom.destroy();
								if (!q.settings.content_editable) {
									k.clear(q.getWin());
									k.clear(q.getDoc())
								}
								k.clear(q.getBody());
								k.clear(q.formElement)
							}
							if (q.formElement) {
								q.formElement.submit = q.formElement._mceOldSubmit;
								q.formElement._mceOldSubmit = null
							}
							q.contentAreaContainer = q.formElement = q.container = q.settings.content_element = q.bodyElement = q.contentDocument = q.contentWindow = null;
							if (q.selection) {
								q.selection = q.selection.win = q.selection.dom = q.selection.dom.doc = null
							}
							q.destroyed = 1
						},
						_addEvents : function() {
							var D = this, u, E = D.settings, r = D.dom, y = {
								mouseup : "onMouseUp",
								mousedown : "onMouseDown",
								click : "onClick",
								keyup : "onKeyUp",
								keydown : "onKeyDown",
								keypress : "onKeyPress",
								submit : "onSubmit",
								reset : "onReset",
								contextmenu : "onContextMenu",
								dblclick : "onDblClick",
								paste : "onPaste"
							};
							function q(t, F) {
								var s = t.type;
								if (D.removed) {
									return
								}
								if (D.onEvent.dispatch(D, t, F) !== false) {
									D[y[t.fakeType || t.type]]
											.dispatch(D, t, F)
								}
							}
							i(y,
									function(t, s) {
										switch (s) {
										case "contextmenu":
											r.bind(D.getDoc(), s, q);
											break;
										case "paste":
											r.bind(D.getBody(), s, function(F) {
												q(F)
											});
											break;
										case "submit":
										case "reset":
											r.bind(D.getElement().form
													|| o
															.getParent(D.id,
																	"form"), s,
													q);
											break;
										default:
											r.bind(E.content_editable ? D
													.getBody() : D.getDoc(), s,
													q)
										}
									});
							r.bind(E.content_editable ? D.getBody() : (a ? D
									.getDoc() : D.getWin()), "focus", function(
									s) {
								D.focus(true)
							});
							if (n.isGecko) {
								r
										.bind(
												D.getDoc(),
												"DOMNodeInserted",
												function(t) {
													var s;
													t = t.target;
													if (t.nodeType === 1
															&& t.nodeName === "IMG"
															&& (s = t
																	.getAttribute("data-mce-src"))) {
														t.src = D.documentBaseURI
																.toAbsolute(s)
													}
												})
							}
							if (a) {
								function v() {
									var G = this, I = G.getDoc(), H = G.settings;
									if (a && !H.readonly) {
										G._refreshContentEditable();
										try {
											I.execCommand("styleWithCSS", 0,
													false)
										} catch (F) {
											if (!G._isHidden()) {
												try {
													I.execCommand("useCSS", 0,
															true)
												} catch (F) {
												}
											}
										}
										if (!H.table_inline_editing) {
											try {
												I
														.execCommand(
																"enableInlineTableEditing",
																false, false)
											} catch (F) {
											}
										}
										if (!H.object_resizing) {
											try {
												I.execCommand(
														"enableObjectResizing",
														false, false)
											} catch (F) {
											}
										}
									}
								}
								D.onBeforeExecCommand.add(v);
								D.onMouseDown.add(v)
							}
							D.onMouseUp.add(D.nodeChanged);
							D.onKeyUp.add(function(s, t) {
								var F = t.keyCode;
								if ((F >= 33 && F <= 36)
										|| (F >= 37 && F <= 40) || F == 13
										|| F == 45 || F == 46 || F == 8
										|| (n.isMac && (F == 91 || F == 93))
										|| t.ctrlKey) {
									D.nodeChanged()
								}
							});
							D.onKeyDown
									.add(function(t, F) {
										if (F.keyCode != j.BACKSPACE) {
											return
										}
										var s = t.selection.getRng();
										if (!s.collapsed) {
											return
										}
										var H = s.startContainer;
										var G = s.startOffset;
										while (H && H.nodeType
												&& H.nodeType != 1
												&& H.parentNode) {
											H = H.parentNode
										}
										if (H
												&& H.parentNode
												&& H.parentNode.tagName === "BLOCKQUOTE"
												&& H.parentNode.firstChild == H
												&& G == 0) {
											t.formatter.toggle("blockquote",
													null, H.parentNode);
											s.setStart(H, 0);
											s.setEnd(H, 0);
											t.selection.setRng(s);
											t.selection.collapse(false)
										}
									});
							D.onReset.add(function() {
								D.setContent(D.startContent, {
									format : "raw"
								})
							});
							if (E.custom_shortcuts) {
								if (E.custom_undo_redo_keyboard_shortcuts) {
									D.addShortcut("ctrl+z", D
											.getLang("undo_desc"), "Undo");
									D.addShortcut("ctrl+y", D
											.getLang("redo_desc"), "Redo")
								}
								D.addShortcut("ctrl+b", D.getLang("bold_desc"),
										"Bold");
								D.addShortcut("ctrl+i", D
										.getLang("italic_desc"), "Italic");
								D
										.addShortcut("ctrl+u", D
												.getLang("underline_desc"),
												"Underline");
								for (u = 1; u <= 6; u++) {
									D.addShortcut("ctrl+" + u, "", [
											"FormatBlock", false, "h" + u ])
								}
								D.addShortcut("ctrl+7", "", [ "FormatBlock",
										false, "p" ]);
								D.addShortcut("ctrl+8", "", [ "FormatBlock",
										false, "div" ]);
								D.addShortcut("ctrl+9", "", [ "FormatBlock",
										false, "address" ]);
								function x(t) {
									var s = null;
									if (!t.altKey && !t.ctrlKey && !t.metaKey) {
										return s
									}
									i(
											D.shortcuts,
											function(F) {
												if (n.isMac
														&& F.ctrl != t.metaKey) {
													return
												} else {
													if (!n.isMac
															&& F.ctrl != t.ctrlKey) {
														return
													}
												}
												if (F.alt != t.altKey) {
													return
												}
												if (F.shift != t.shiftKey) {
													return
												}
												if (t.keyCode == F.keyCode
														|| (t.charCode && t.charCode == F.charCode)) {
													s = F;
													return false
												}
											});
									return s
								}
								D.onKeyUp.add(function(s, t) {
									var F = x(t);
									if (F) {
										return k.cancel(t)
									}
								});
								D.onKeyPress.add(function(s, t) {
									var F = x(t);
									if (F) {
										return k.cancel(t)
									}
								});
								D.onKeyDown.add(function(s, t) {
									var F = x(t);
									if (F) {
										F.func.call(F.scope);
										return k.cancel(t)
									}
								})
							}
							if (n.isIE) {
								r
										.bind(
												D.getDoc(),
												"controlselect",
												function(F) {
													var t = D.resizeInfo, s;
													F = F.target;
													if (F.nodeName !== "IMG") {
														return
													}
													if (t) {
														r.unbind(t.node, t.ev,
																t.cb)
													}
													if (!r.hasClass(F,
															"mceItemNoResize")) {
														ev = "resizeend";
														s = r
																.bind(
																		F,
																		ev,
																		function(
																				H) {
																			var G;
																			H = H.target;
																			if (G = r
																					.getStyle(
																							H,
																							"width")) {
																				r
																						.setAttrib(
																								H,
																								"width",
																								G
																										.replace(
																												/[^0-9%]+/g,
																												""));
																				r
																						.setStyle(
																								H,
																								"width",
																								"")
																			}
																			if (G = r
																					.getStyle(
																							H,
																							"height")) {
																				r
																						.setAttrib(
																								H,
																								"height",
																								G
																										.replace(
																												/[^0-9%]+/g,
																												""));
																				r
																						.setStyle(
																								H,
																								"height",
																								"")
																			}
																		})
													} else {
														ev = "resizestart";
														s = r.bind(F,
																"resizestart",
																k.cancel, k)
													}
													t = D.resizeInfo = {
														node : F,
														ev : ev,
														cb : s
													}
												})
							}
							if (n.isOpera) {
								D.onClick.add(function(s, t) {
									k.prevent(t)
								})
							}
							if (E.custom_undo_redo) {
								function A() {
									D.undoManager.typing = false;
									D.undoManager.add()
								}
								var z = n.isGecko ? "blur" : "focusout";
								r.bind(D.getDoc(), z, function(s) {
									if (!D.removed && D.undoManager.typing) {
										A()
									}
								});
								D.dom.bind(D.dom.getRoot(), "dragend",
										function(s) {
											A()
										});
								D.onKeyUp.add(function(s, F) {
									var t = F.keyCode;
									if ((t >= 33 && t <= 36)
											|| (t >= 37 && t <= 40) || t == 13
											|| t == 45 || F.ctrlKey) {
										A()
									}
								});
								D.onKeyDown
										.add(function(s, G) {
											var F = G.keyCode, t;
											if (F == 8) {
												t = D.getDoc().selection;
												if (t && t.createRange
														&& t.createRange().item) {
													D.undoManager
															.beforeChange();
													s.dom.remove(t
															.createRange()
															.item(0));
													A();
													return k.cancel(G)
												}
											}
											if ((F >= 33 && F <= 36)
													|| (F >= 37 && F <= 40)
													|| F == 13 || F == 45) {
												if (n.isIE && F == 13) {
													D.undoManager
															.beforeChange()
												}
												if (D.undoManager.typing) {
													A()
												}
												return
											}
											if ((F < 16 || F > 20) && F != 224
													&& F != 91
													&& !D.undoManager.typing) {
												D.undoManager.beforeChange();
												D.undoManager.typing = true;
												D.undoManager.add()
											}
										});
								D.onMouseDown.add(function() {
									if (D.undoManager.typing) {
										A()
									}
								})
							}
							if (n.isGecko) {
								function C() {
									var s = D.dom.getAttribs(D.selection
											.getStart().cloneNode(false));
									return function() {
										var t = D.selection.getStart();
										if (t !== D.getBody()) {
											D.dom.setAttrib(t, "style", null);
											i(s, function(F) {
												t.setAttributeNode(F
														.cloneNode(true))
											})
										}
									}
								}
								function B() {
									var t = D.selection;
									return !t.isCollapsed()
											&& t.getStart() != t.getEnd()
								}
								D.onKeyPress.add(function(s, F) {
									var t;
									if ((F.keyCode == 8 || F.keyCode == 46)
											&& B()) {
										t = C();
										D.getDoc().execCommand("delete", false,
												null);
										t();
										return k.cancel(F)
									}
								});
								D.dom.bind(D.getDoc(), "cut", function(t) {
									var s;
									if (B()) {
										s = C();
										D.onKeyUp.addToTop(k.cancel, k);
										setTimeout(function() {
											s();
											D.onKeyUp.remove(k.cancel, k)
										}, 0)
									}
								})
							}
						},
						_refreshContentEditable : function() {
							var r = this, q, s;
							if (r._isHidden()) {
								q = r.getBody();
								s = q.parentNode;
								s.removeChild(q);
								s.appendChild(q);
								q.focus()
							}
						},
						_isHidden : function() {
							var q;
							if (!a) {
								return 0
							}
							q = this.selection.getSel();
							return (!q || !q.rangeCount || q.rangeCount == 0)
						}
					})
})(tinymce);
(function(c) {
	var d = c.each, e, a = true, b = false;
	c.EditorCommands = function(n) {
		var m = n.dom, p = n.selection, j = {
			state : {},
			exec : {},
			value : {}
		}, k = n.settings, q = n.formatter, o;
		function r(z, y, x) {
			var v;
			z = z.toLowerCase();
			if (v = j.exec[z]) {
				v(z, y, x);
				return a
			}
			return b
		}
		function l(x) {
			var v;
			x = x.toLowerCase();
			if (v = j.state[x]) {
				return v(x)
			}
			return -1
		}
		function h(x) {
			var v;
			x = x.toLowerCase();
			if (v = j.value[x]) {
				return v(x)
			}
			return b
		}
		function u(v, x) {
			x = x || "exec";
			d(v, function(z, y) {
				d(y.toLowerCase().split(","), function(A) {
					j[x][A] = z
				})
			})
		}
		c.extend(this, {
			execCommand : r,
			queryCommandState : l,
			queryCommandValue : h,
			addCommands : u
		});
		function f(y, x, v) {
			if (x === e) {
				x = b
			}
			if (v === e) {
				v = null
			}
			return n.getDoc().execCommand(y, x, v)
		}
		function t(v) {
			return q.match(v)
		}
		function s(v, x) {
			q.toggle(v, x ? {
				value : x
			} : e)
		}
		function i(v) {
			o = p.getBookmark(v)
		}
		function g() {
			p.moveToBookmark(o)
		}
		u( {
			"mceResetDesignMode,mceBeginUndoLevel" : function() {
			},
			"mceEndUndoLevel,mceAddUndoLevel" : function() {
				n.undoManager.add()
			},
			"Cut,Copy,Paste" : function(z) {
				var y = n.getDoc(), v;
				try {
					f(z)
				} catch (x) {
					v = a
				}
				if (v || !y.queryCommandSupported(z)) {
					if (c.isGecko) {
						n.windowManager
								.confirm(
										n.getLang("clipboard_msg"),
										function(A) {
											if (A) {
												open(
														"http://www.mozilla.org/editor/midasdemo/securityprefs.html",
														"_blank")
											}
										})
					} else {
						n.windowManager
								.alert(n.getLang("clipboard_no_support"))
					}
				}
			},
			unlink : function(v) {
				if (p.isCollapsed()) {
					p.select(p.getNode())
				}
				f(v);
				p.collapse(b)
			},
			"JustifyLeft,JustifyCenter,JustifyRight,JustifyFull" : function(v) {
				var x = v.substring(7);
				d("left,center,right,full".split(","), function(y) {
					if (x != y) {
						q.remove("align" + y)
					}
				});
				s("align" + x);
				r("mceRepaint")
			},
			"InsertUnorderedList,InsertOrderedList" : function(y) {
				var v, x;
				f(y);
				v = m.getParent(p.getNode(), "ol,ul");
				if (v) {
					x = v.parentNode;
					if (/^(H[1-6]|P|ADDRESS|PRE)$/.test(x.nodeName)) {
						i();
						m.split(x, v);
						g()
					}
				}
			},
			"Bold,Italic,Underline,Strikethrough,Superscript,Subscript" : function(
					v) {
				s(v)
			},
			"ForeColor,HiliteColor,FontName" : function(y, x, v) {
				s(y, v)
			},
			FontSize : function(z, y, x) {
				var v, A;
				if (x >= 1 && x <= 7) {
					A = c.explode(k.font_size_style_values);
					v = c.explode(k.font_size_classes);
					if (v) {
						x = v[x - 1] || x
					} else {
						x = A[x - 1] || x
					}
				}
				s(z, x)
			},
			RemoveFormat : function(v) {
				q.remove(v)
			},
			mceBlockQuote : function(v) {
				s("blockquote")
			},
			FormatBlock : function(y, x, v) {
				return s(v || "p")
			},
			mceCleanup : function() {
				var v = p.getBookmark();
				n.setContent(n.getContent( {
					cleanup : a
				}), {
					cleanup : a
				});
				p.moveToBookmark(v)
			},
			mceRemoveNode : function(z, y, x) {
				var v = x || p.getNode();
				if (v != n.getBody()) {
					i();
					n.dom.remove(v, a);
					g()
				}
			},
			mceSelectNodeDepth : function(z, y, x) {
				var v = 0;
				m.getParent(p.getNode(), function(A) {
					if (A.nodeType == 1 && v++ == x) {
						p.select(A);
						return b
					}
				}, n.getBody())
			},
			mceSelectNode : function(y, x, v) {
				p.select(v)
			},
			mceInsertContent : function(B, I, K) {
				var y, J, E, z, F, G, D, C, L, x, A, M, v, H;
				y = n.parser;
				J = new c.html.Serializer( {}, n.schema);
				v = '<span id="mce_marker" data-mce-type="bookmark">\uFEFF</span>';
				G = {
					content : K,
					format : "html"
				};
				p.onBeforeSetContent.dispatch(p, G);
				K = G.content;
				if (K.indexOf("{$caret}") == -1) {
					K += "{$caret}"
				}
				K = K.replace(/\{\$caret\}/, v);
				if (!p.isCollapsed()) {
					n.getDoc().execCommand("Delete", false, null)
				}
				E = p.getNode();
				G = {
					context : E.nodeName.toLowerCase()
				};
				F = y.parse(K, G);
				A = F.lastChild;
				if (A.attr("id") == "mce_marker") {
					D = A;
					for (A = A.prev; A; A = A.walk(true)) {
						if (A.type == 3 || !m.isBlock(A.name)) {
							A.parent.insert(D, A, A.name === "br");
							break
						}
					}
				}
				if (!G.invalid) {
					K = J.serialize(F);
					A = E.firstChild;
					M = E.lastChild;
					if (!A || (A === M && A.nodeName === "BR")) {
						m.setHTML(E, K)
					} else {
						p.setContent(K)
					}
				} else {
					p.setContent(v);
					E = n.selection.getNode();
					z = n.getBody();
					if (E.nodeType == 9) {
						E = A = z
					} else {
						A = E
					}
					while (A !== z) {
						E = A;
						A = A.parentNode
					}
					K = E == z ? z.innerHTML : m.getOuterHTML(E);
					K = J
							.serialize(y
									.parse(K
											.replace(
													/<span (id="mce_marker"|id=mce_marker).+?<\/span>/i,
													function() {
														return J.serialize(F)
													})));
					if (E == z) {
						m.setHTML(z, K)
					} else {
						m.setOuterHTML(E, K)
					}
				}
				D = m.get("mce_marker");
				C = m.getRect(D);
				L = m.getViewPort(n.getWin());
				if ((C.y + C.h > L.y + L.h || C.y < L.y)
						|| (C.x > L.x + L.w || C.x < L.x)) {
					H = c.isIE ? n.getDoc().documentElement : n.getBody();
					H.scrollLeft = C.x;
					H.scrollTop = C.y - L.h + 25
				}
				x = m.createRng();
				A = D.previousSibling;
				if (A && A.nodeType == 3) {
					x.setStart(A, A.nodeValue.length)
				} else {
					x.setStartBefore(D);
					x.setEndBefore(D)
				}
				m.remove(D);
				p.setRng(x);
				p.onSetContent.dispatch(p, G);
				n.addVisual()
			},
			mceInsertRawHTML : function(y, x, v) {
				p.setContent("tiny_mce_marker");
				n.setContent(n.getContent().replace(/tiny_mce_marker/g,
						function() {
							return v
						}))
			},
			mceSetContent : function(y, x, v) {
				n.setContent(v)
			},
			"Indent,Outdent" : function(z) {
				var x, v, y;
				x = k.indentation;
				v = /[a-z%]+$/i.exec(x);
				x = parseInt(x);
				if (!l("InsertUnorderedList") && !l("InsertOrderedList")) {
					d(p.getSelectedBlocks(), function(A) {
						if (z == "outdent") {
							y = Math.max(0, parseInt(A.style.paddingLeft || 0)
									- x);
							m.setStyle(A, "paddingLeft", y ? y + v : "")
						} else {
							m.setStyle(A, "paddingLeft",
									(parseInt(A.style.paddingLeft || 0) + x)
											+ v)
						}
					})
				} else {
					f(z)
				}
			},
			mceRepaint : function() {
				var x;
				if (c.isGecko) {
					try {
						i(a);
						if (p.getSel()) {
							p.getSel().selectAllChildren(n.getBody())
						}
						p.collapse(a);
						g()
					} catch (v) {
					}
				}
			},
			mceToggleFormat : function(y, x, v) {
				q.toggle(v)
			},
			InsertHorizontalRule : function() {
				n.execCommand("mceInsertContent", false, "<hr />")
			},
			mceToggleVisualAid : function() {
				n.hasVisual = !n.hasVisual;
				n.addVisual()
			},
			mceReplaceContent : function(y, x, v) {
				n.execCommand("mceInsertContent", false, v.replace(
						/\{\$selection\}/g, p.getContent( {
							format : "text"
						})))
			},
			mceInsertLink : function(z, y, x) {
				var v;
				if (typeof (x) == "string") {
					x = {
						href : x
					}
				}
				v = m.getParent(p.getNode(), "a");
				x.href = x.href.replace(" ", "%20");
				if (!v || !x.href) {
					q.remove("link")
				}
				if (x.href) {
					q.apply("link", x, v)
				}
			},
			selectAll : function() {
				var x = m.getRoot(), v = m.createRng();
				v.setStart(x, 0);
				v.setEnd(x, x.childNodes.length);
				n.selection.setRng(v)
			}
		});
		u(
				{
					"JustifyLeft,JustifyCenter,JustifyRight,JustifyFull" : function(
							z) {
						var x = "align" + z.substring(7);
						var v = p.isCollapsed() ? [ p.getNode() ] : p
								.getSelectedBlocks();
						var y = c.map(v, function(A) {
							return !!q.matchNode(A, x)
						});
						return c.inArray(y, a) !== -1
					},
					"Bold,Italic,Underline,Strikethrough,Superscript,Subscript" : function(
							v) {
						return t(v)
					},
					mceBlockQuote : function() {
						return t("blockquote")
					},
					Outdent : function() {
						var v;
						if (k.inline_styles) {
							if ((v = m.getParent(p.getStart(), m.isBlock))
									&& parseInt(v.style.paddingLeft) > 0) {
								return a
							}
							if ((v = m.getParent(p.getEnd(), m.isBlock))
									&& parseInt(v.style.paddingLeft) > 0) {
								return a
							}
						}
						return l("InsertUnorderedList")
								|| l("InsertOrderedList")
								|| (!k.inline_styles && !!m.getParent(p
										.getNode(), "BLOCKQUOTE"))
					},
					"InsertUnorderedList,InsertOrderedList" : function(v) {
						return m.getParent(p.getNode(),
								v == "insertunorderedlist" ? "UL" : "OL")
					}
				}, "state");
		u( {
			"FontSize,FontName" : function(y) {
				var x = 0, v;
				if (v = m.getParent(p.getNode(), "span")) {
					if (y == "fontsize") {
						x = v.style.fontSize
					} else {
						x = v.style.fontFamily.replace(/, /g, ",").replace(
								/[\'\"]/g, "").toLowerCase()
					}
				}
				return x
			}
		}, "value");
		if (k.custom_undo_redo) {
			u( {
				Undo : function() {
					n.undoManager.undo()
				},
				Redo : function() {
					n.undoManager.redo()
				}
			})
		}
	}
})(tinymce);
(function(b) {
	var a = b.util.Dispatcher;
	b.UndoManager = function(f) {
		var d, e = 0, h = [], c;
		function g() {
			return b.trim(f.getContent( {
				format : "raw",
				no_events : 1
			}))
		}
		return d = {
			typing : false,
			onAdd : new a(d),
			onUndo : new a(d),
			onRedo : new a(d),
			beforeChange : function() {
				c = f.selection.getBookmark(2, true)
			},
			add : function(m) {
				var j, k = f.settings, l;
				m = m || {};
				m.content = g();
				l = h[e];
				if (l && l.content == m.content) {
					return null
				}
				if (h[e]) {
					h[e].beforeBookmark = c
				}
				if (k.custom_undo_redo_levels) {
					if (h.length > k.custom_undo_redo_levels) {
						for (j = 0; j < h.length - 1; j++) {
							h[j] = h[j + 1]
						}
						h.length--;
						e = h.length
					}
				}
				m.bookmark = f.selection.getBookmark(2, true);
				if (e < h.length - 1) {
					h.length = e + 1
				}
				h.push(m);
				e = h.length - 1;
				d.onAdd.dispatch(d, m);
				f.isNotDirty = 0;
				return m
			},
			undo : function() {
				var k, j;
				if (d.typing) {
					d.add();
					d.typing = false
				}
				if (e > 0) {
					k = h[--e];
					f.setContent(k.content, {
						format : "raw"
					});
					f.selection.moveToBookmark(k.beforeBookmark);
					d.onUndo.dispatch(d, k)
				}
				return k
			},
			redo : function() {
				var i;
				if (e < h.length - 1) {
					i = h[++e];
					f.setContent(i.content, {
						format : "raw"
					});
					f.selection.moveToBookmark(i.bookmark);
					d.onRedo.dispatch(d, i)
				}
				return i
			},
			clear : function() {
				h = [];
				e = 0;
				d.typing = false
			},
			hasUndo : function() {
				return e > 0 || this.typing
			},
			hasRedo : function() {
				return e < h.length - 1 && !this.typing
			}
		}
	}
})(tinymce);
(function(l) {
	var j = l.dom.Event, c = l.isIE, a = l.isGecko, b = l.isOpera, i = l.each, h = l.extend, d = true, g = false;
	function k(o) {
		var p, n, m;
		do {
			if (/^(SPAN|STRONG|B|EM|I|FONT|STRIKE|U)$/.test(o.nodeName)) {
				if (p) {
					n = o.cloneNode(false);
					n.appendChild(p);
					p = n
				} else {
					p = m = o.cloneNode(false)
				}
				p.removeAttribute("id")
			}
		} while (o = o.parentNode);
		if (p) {
			return {
				wrapper : p,
				inner : m
			}
		}
	}
	function f(n, o) {
		var m = o.ownerDocument.createRange();
		m.setStart(n.endContainer, n.endOffset);
		m.setEndAfter(o);
		return m.cloneContents().textContent.length == 0
	}
	function e(o, q, m) {
		var n, p;
		if (q.isEmpty(m)) {
			n = q.getParent(m, "ul,ol");
			if (!q.getParent(n.parentNode, "ul,ol")) {
				q.split(n, m);
				p = q.create("p", 0, '<br data-mce-bogus="1" />');
				q.replace(p, m);
				o.select(p, 1)
			}
			return g
		}
		return d
	}
	l
			.create(
					"tinymce.ForceBlocks",
					{
						ForceBlocks : function(m) {
							var n = this, o = m.settings, p;
							n.editor = m;
							n.dom = m.dom;
							p = (o.forced_root_block || "p").toLowerCase();
							o.element = p.toUpperCase();
							m.onPreInit.add(n.setup, n)
						},
						setup : function() {
							var n = this, m = n.editor, p = m.settings, u = m.dom, o = m.selection, q = m.schema
									.getBlockElements();
							if (p.forced_root_block) {
								function v() {
									var y = o.getStart(), t = m.getBody(), s, z, D, F, E, x, A, B = -16777215;
									if (!y || y.nodeType !== 1) {
										return
									}
									while (y != t) {
										if (q[y.nodeName]) {
											return
										}
										y = y.parentNode
									}
									s = o.getRng();
									if (s.setStart) {
										z = s.startContainer;
										D = s.startOffset;
										F = s.endContainer;
										E = s.endOffset
									} else {
										if (s.item) {
											s = m.getDoc().body
													.createTextRange();
											s.moveToElementText(s.item(0))
										}
										tmpRng = s.duplicate();
										tmpRng.collapse(true);
										D = tmpRng.move("character", B) * -1;
										if (!tmpRng.collapsed) {
											tmpRng = s.duplicate();
											tmpRng.collapse(false);
											E = (tmpRng.move("character", B) * -1)
													- D
										}
									}
									for (y = t.firstChild; y; y) {
										if (y.nodeType === 3
												|| (y.nodeType == 1 && !q[y.nodeName])) {
											if (!x) {
												x = u
														.create(p.forced_root_block);
												y.parentNode.insertBefore(x, y)
											}
											A = y;
											y = y.nextSibling;
											x.appendChild(A)
										} else {
											x = null;
											y = y.nextSibling
										}
									}
									if (s.setStart) {
										s.setStart(z, D);
										s.setEnd(F, E);
										o.setRng(s)
									} else {
										try {
											s = m.getDoc().body
													.createTextRange();
											s.moveToElementText(t);
											s.collapse(true);
											s.moveStart("character", D);
											if (E > 0) {
												s.moveEnd("character", E)
											}
											s.select()
										} catch (C) {
										}
									}
									m.nodeChanged()
								}
								m.onKeyUp.add(v);
								m.onClick.add(v)
							}
							if (p.force_br_newlines) {
								if (c) {
									m.onKeyPress
											.add(function(s, t) {
												var x;
												if (t.keyCode == 13
														&& o.getNode().nodeName != "LI") {
													o.setContent(
															'<br id="__" /> ',
															{
																format : "raw"
															});
													x = u.get("__");
													x.removeAttribute("id");
													o.select(x);
													o.collapse();
													return j.cancel(t)
												}
											})
								}
							}
							if (p.force_p_newlines) {
								if (!c) {
									m.onKeyPress.add(function(s, t) {
										if (t.keyCode == 13 && !t.shiftKey
												&& !n.insertPara(t)) {
											j.cancel(t)
										}
									})
								} else {
									l.addUnload(function() {
										n._previousFormats = 0
									});
									m.onKeyPress.add(function(s, t) {
										n._previousFormats = 0;
										if (t.keyCode == 13 && !t.shiftKey
												&& s.selection.isCollapsed()
												&& p.keep_styles) {
											n._previousFormats = k(s.selection
													.getStart())
										}
									});
									m.onKeyUp
											.add(function(t, y) {
												if (y.keyCode == 13
														&& !y.shiftKey) {
													var x = t.selection
															.getStart(), s = n._previousFormats;
													if (!x.hasChildNodes() && s) {
														x = u.getParent(x,
																u.isBlock);
														if (x
																&& x.nodeName != "LI") {
															x.innerHTML = "";
															if (n._previousFormats) {
																x
																		.appendChild(s.wrapper);
																s.inner.innerHTML = "\uFEFF"
															} else {
																x.innerHTML = "\uFEFF"
															}
															o.select(x, 1);
															o.collapse(true);
															t
																	.getDoc()
																	.execCommand(
																			"Delete",
																			false,
																			null);
															n._previousFormats = 0
														}
													}
												}
											})
								}
								if (a) {
									m.onKeyDown.add(function(s, t) {
										if ((t.keyCode == 8 || t.keyCode == 46)
												&& !t.shiftKey) {
											n
													.backspaceDelete(t,
															t.keyCode == 8)
										}
									})
								}
							}
							if (l.isWebKit) {
								function r(t) {
									var s = o.getRng(), x, A = u.create("div",
											null, " "), z, y = u.getViewPort(t
											.getWin()).h;
									s.insertNode(x = u.create("br"));
									s.setStartAfter(x);
									s.setEndAfter(x);
									o.setRng(s);
									if (o.getSel().focusNode == x.previousSibling) {
										o.select(u.insertAfter(u.doc
												.createTextNode("\u00a0"), x));
										o.collapse(d)
									}
									u.insertAfter(A, x);
									z = u.getPos(A).y;
									u.remove(A);
									if (z > y) {
										t.getWin().scrollTo(0, z)
									}
								}
								m.onKeyPress
										.add(function(s, t) {
											if (t.keyCode == 13
													&& (t.shiftKey || (p.force_br_newlines && !u
															.getParent(o
																	.getNode(),
																	"h1,h2,h3,h4,h5,h6,ol,ul")))) {
												r(s);
												j.cancel(t)
											}
										})
							}
							if (c) {
								if (p.element != "P") {
									m.onKeyPress.add(function(s, t) {
										n.lastElm = o.getNode().nodeName
									});
									m.onKeyUp
											.add(function(t, x) {
												var z, y = o.getNode(), s = t
														.getBody();
												if (s.childNodes.length === 1
														&& y.nodeName == "P") {
													y = u.rename(y, p.element);
													o.select(y);
													o.collapse();
													t.nodeChanged()
												} else {
													if (x.keyCode == 13
															&& !x.shiftKey
															&& n.lastElm != "P") {
														z = u.getParent(y, "p");
														if (z) {
															u.rename(z,
																	p.element);
															t.nodeChanged()
														}
													}
												}
											})
								}
							}
						},
						getParentBlock : function(o) {
							var m = this.dom;
							return m.getParent(o, m.isBlock)
						},
						insertPara : function(Q) {
							var E = this, v = E.editor, M = v.dom, R = v
									.getDoc(), V = v.settings, F = v.selection
									.getSel(), G = F.getRangeAt(0), U = R.body;
							var J, K, H, O, N, q, o, u, z, m, C, T, p, x, I, L = M
									.getViewPort(v.getWin()), B, D, A;
							v.undoManager.beforeChange();
							J = R.createRange();
							J.setStart(F.anchorNode, F.anchorOffset);
							J.collapse(d);
							K = R.createRange();
							K.setStart(F.focusNode, F.focusOffset);
							K.collapse(d);
							H = J.compareBoundaryPoints(J.START_TO_END, K) < 0;
							O = H ? F.anchorNode : F.focusNode;
							N = H ? F.anchorOffset : F.focusOffset;
							q = H ? F.focusNode : F.anchorNode;
							o = H ? F.focusOffset : F.anchorOffset;
							if (O === q && /^(TD|TH)$/.test(O.nodeName)) {
								if (O.firstChild.nodeName == "BR") {
									M.remove(O.firstChild)
								}
								if (O.childNodes.length == 0) {
									v.dom.add(O, V.element, null, "<br />");
									T = v.dom.add(O, V.element, null, "<br />")
								} else {
									I = O.innerHTML;
									O.innerHTML = "";
									v.dom.add(O, V.element, null, I);
									T = v.dom.add(O, V.element, null, "<br />")
								}
								G = R.createRange();
								G.selectNodeContents(T);
								G.collapse(1);
								v.selection.setRng(G);
								return g
							}
							if (O == U && q == U && U.firstChild
									&& v.dom.isBlock(U.firstChild)) {
								O = q = O.firstChild;
								N = o = 0;
								J = R.createRange();
								J.setStart(O, 0);
								K = R.createRange();
								K.setStart(q, 0)
							}
							if (!R.body.hasChildNodes()) {
								R.body.appendChild(M.create("br"))
							}
							O = O.nodeName == "HTML" ? R.body : O;
							O = O.nodeName == "BODY" ? O.firstChild : O;
							q = q.nodeName == "HTML" ? R.body : q;
							q = q.nodeName == "BODY" ? q.firstChild : q;
							u = E.getParentBlock(O);
							z = E.getParentBlock(q);
							m = u ? u.nodeName : V.element;
							if (I = E.dom.getParent(u, "li,pre")) {
								if (I.nodeName == "LI") {
									return e(v.selection, E.dom, I)
								}
								return d
							}
							if (u
									&& (u.nodeName == "CAPTION" || /absolute|relative|fixed/gi
											.test(M.getStyle(u, "position", 1)))) {
								m = V.element;
								u = null
							}
							if (z
									&& (z.nodeName == "CAPTION" || /absolute|relative|fixed/gi
											.test(M.getStyle(u, "position", 1)))) {
								m = V.element;
								z = null
							}
							if (/(TD|TABLE|TH|CAPTION)/.test(m)
									|| (u && m == "DIV" && /left|right/gi
											.test(M.getStyle(u, "float", 1)))) {
								m = V.element;
								u = z = null
							}
							C = (u && u.nodeName == m) ? u.cloneNode(0) : v.dom
									.create(m);
							T = (z && z.nodeName == m) ? z.cloneNode(0) : v.dom
									.create(m);
							T.removeAttribute("id");
							if (/^(H[1-6])$/.test(m) && f(G, u)) {
								T = v.dom.create(V.element)
							}
							I = p = O;
							do {
								if (I == U
										|| I.nodeType == 9
										|| E.dom.isBlock(I)
										|| /(TD|TABLE|TH|CAPTION)/
												.test(I.nodeName)) {
									break
								}
								p = I
							} while ((I = I.previousSibling ? I.previousSibling
									: I.parentNode));
							I = x = q;
							do {
								if (I == U
										|| I.nodeType == 9
										|| E.dom.isBlock(I)
										|| /(TD|TABLE|TH|CAPTION)/
												.test(I.nodeName)) {
									break
								}
								x = I
							} while ((I = I.nextSibling ? I.nextSibling
									: I.parentNode));
							if (p.nodeName == m) {
								J.setStart(p, 0)
							} else {
								J.setStartBefore(p)
							}
							J.setEnd(O, N);
							C.appendChild(J.cloneContents()
									|| R.createTextNode(""));
							try {
								K.setEndAfter(x)
							} catch (P) {
							}
							K.setStart(q, o);
							T.appendChild(K.cloneContents()
									|| R.createTextNode(""));
							G = R.createRange();
							if (!p.previousSibling
									&& p.parentNode.nodeName == m) {
								G.setStartBefore(p.parentNode)
							} else {
								if (J.startContainer.nodeName == m
										&& J.startOffset == 0) {
									G.setStartBefore(J.startContainer)
								} else {
									G.setStart(J.startContainer, J.startOffset)
								}
							}
							if (!x.nextSibling && x.parentNode.nodeName == m) {
								G.setEndAfter(x.parentNode)
							} else {
								G.setEnd(K.endContainer, K.endOffset)
							}
							G.deleteContents();
							if (b) {
								v.getWin().scrollTo(0, L.y)
							}
							if (C.firstChild && C.firstChild.nodeName == m) {
								C.innerHTML = C.firstChild.innerHTML
							}
							if (T.firstChild && T.firstChild.nodeName == m) {
								T.innerHTML = T.firstChild.innerHTML
							}
							function S(y, s) {
								var r = [], X, W, t;
								y.innerHTML = "";
								if (V.keep_styles) {
									W = s;
									do {
										if (/^(SPAN|STRONG|B|EM|I|FONT|STRIKE|U)$/
												.test(W.nodeName)) {
											X = W.cloneNode(g);
											M.setAttrib(X, "id", "");
											r.push(X)
										}
									} while (W = W.parentNode)
								}
								if (r.length > 0) {
									for (t = r.length - 1, X = y; t >= 0; t--) {
										X = X.appendChild(r[t])
									}
									r[0].innerHTML = b ? "\u00a0" : "<br />";
									return r[0]
								} else {
									y.innerHTML = b ? "\u00a0" : "<br />"
								}
							}
							if (M.isEmpty(C)) {
								S(C, O)
							}
							if (M.isEmpty(T)) {
								A = S(T, q)
							}
							if (b && parseFloat(opera.version()) < 9.5) {
								G.insertNode(C);
								G.insertNode(T)
							} else {
								G.insertNode(T);
								G.insertNode(C)
							}
							T.normalize();
							C.normalize();
							v.selection.select(T, true);
							v.selection.collapse(true);
							B = v.dom.getPos(T).y;
							if (B < L.y || B + 25 > L.y + L.h) {
								v.getWin().scrollTo(0,
										B < L.y ? B : B - L.h + 25)
							}
							v.undoManager.add();
							return g
						},
						backspaceDelete : function(u, B) {
							var C = this, s = C.editor, y = s.getBody(), q = s.dom, p, v = s.selection, o = v
									.getRng(), x = o.startContainer, p, z, A, m;
							if (!B && o.collapsed && x.nodeType == 1
									&& o.startOffset == x.childNodes.length) {
								m = new l.dom.TreeWalker(x.lastChild, x);
								for (p = x.lastChild; p; p = m.prev()) {
									if (p.nodeType == 3) {
										o.setStart(p, p.nodeValue.length);
										o.collapse(true);
										v.setRng(o);
										return
									}
								}
							}
							if (x && s.dom.isBlock(x)
									&& !/^(TD|TH)$/.test(x.nodeName) && B) {
								if (x.childNodes.length == 0
										|| (x.childNodes.length == 1 && x.firstChild.nodeName == "BR")) {
									p = x;
									while ((p = p.previousSibling)
											&& !s.dom.isBlock(p)) {
									}
									if (p) {
										if (x != y.firstChild) {
											z = s.dom.doc.createTreeWalker(p,
													NodeFilter.SHOW_TEXT, null,
													g);
											while (A = z.nextNode()) {
												p = A
											}
											o = s.getDoc().createRange();
											o
													.setStart(
															p,
															p.nodeValue ? p.nodeValue.length
																	: 0);
											o
													.setEnd(
															p,
															p.nodeValue ? p.nodeValue.length
																	: 0);
											v.setRng(o);
											s.dom.remove(x)
										}
										return j.cancel(u)
									}
								}
							}
						}
					})
})(tinymce);
(function(c) {
	var b = c.DOM, a = c.dom.Event, d = c.each, e = c.extend;
	c.create("tinymce.ControlManager", {
		ControlManager : function(f, j) {
			var h = this, g;
			j = j || {};
			h.editor = f;
			h.controls = {};
			h.onAdd = new c.util.Dispatcher(h);
			h.onPostRender = new c.util.Dispatcher(h);
			h.prefix = j.prefix || f.id + "_";
			h._cls = {};
			h.onPostRender.add(function() {
				d(h.controls, function(i) {
					i.postRender()
				})
			})
		},
		get : function(f) {
			return this.controls[this.prefix + f] || this.controls[f]
		},
		setActive : function(h, f) {
			var g = null;
			if (g = this.get(h)) {
				g.setActive(f)
			}
			return g
		},
		setDisabled : function(h, f) {
			var g = null;
			if (g = this.get(h)) {
				g.setDisabled(f)
			}
			return g
		},
		add : function(g) {
			var f = this;
			if (g) {
				f.controls[g.id] = g;
				f.onAdd.dispatch(g, f)
			}
			return g
		},
		createControl : function(i) {
			var h, g = this, f = g.editor;
			d(f.plugins, function(j) {
				if (j.createControl) {
					h = j.createControl(i, g);
					if (h) {
						return false
					}
				}
			});
			switch (i) {
			case "|":
			case "separator":
				return g.createSeparator()
			}
			if (!h && f.buttons && (h = f.buttons[i])) {
				return g.createButton(i, h)
			}
			return g.add(h)
		},
		createDropMenu : function(f, n, h) {
			var m = this, i = m.editor, j, g, k, l;
			n = e( {
				"class" : "mceDropDown",
				constrain : i.settings.constrain_menus
			}, n);
			n["class"] = n["class"] + " " + i.getParam("skin") + "Skin";
			if (k = i.getParam("skin_variant")) {
				n["class"] += " " + i.getParam("skin") + "Skin"
						+ k.substring(0, 1).toUpperCase() + k.substring(1)
			}
			f = m.prefix + f;
			l = h || m._cls.dropmenu || c.ui.DropMenu;
			j = m.controls[f] = new l(f, n);
			j.onAddItem.add(function(r, q) {
				var p = q.settings;
				p.title = i.getLang(p.title, p.title);
				if (!p.onclick) {
					p.onclick = function(o) {
						if (p.cmd) {
							i.execCommand(p.cmd, p.ui || false, p.value)
						}
					}
				}
			});
			i.onRemove.add(function() {
				j.destroy()
			});
			if (c.isIE) {
				j.onShowMenu.add(function() {
					i.focus();
					g = i.selection.getBookmark(1)
				});
				j.onHideMenu.add(function() {
					if (g) {
						i.selection.moveToBookmark(g);
						g = 0
					}
				})
			}
			return m.add(j)
		},
		createListBox : function(f, n, h) {
			var l = this, j = l.editor, i, k, m;
			if (l.get(f)) {
				return null
			}
			n.title = j.translate(n.title);
			n.scope = n.scope || j;
			if (!n.onselect) {
				n.onselect = function(o) {
					j.execCommand(n.cmd, n.ui || false, o || n.value)
				}
			}
			n = e( {
				title : n.title,
				"class" : "mce_" + f,
				scope : n.scope,
				control_manager : l
			}, n);
			f = l.prefix + f;
			function g(o) {
				return o.settings.use_accessible_selects && !c.isGecko
			}
			if (j.settings.use_native_selects || g(j)) {
				k = new c.ui.NativeListBox(f, n)
			} else {
				m = h || l._cls.listbox || c.ui.ListBox;
				k = new m(f, n, j)
			}
			l.controls[f] = k;
			if (c.isWebKit) {
				k.onPostRender.add(function(p, o) {
					a.add(o, "mousedown", function() {
						j.bookmark = j.selection.getBookmark(1)
					});
					a.add(o, "focus", function() {
						j.selection.moveToBookmark(j.bookmark);
						j.bookmark = null
					})
				})
			}
			if (k.hideMenu) {
				j.onMouseDown.add(k.hideMenu, k)
			}
			return l.add(k)
		},
		createButton : function(m, i, l) {
			var h = this, g = h.editor, j, k, f;
			if (h.get(m)) {
				return null
			}
			i.title = g.translate(i.title);
			i.label = g.translate(i.label);
			i.scope = i.scope || g;
			if (!i.onclick && !i.menu_button) {
				i.onclick = function() {
					g.execCommand(i.cmd, i.ui || false, i.value)
				}
			}
			i = e( {
				title : i.title,
				"class" : "mce_" + m,
				unavailable_prefix : g.getLang("unavailable", ""),
				scope : i.scope,
				control_manager : h
			}, i);
			m = h.prefix + m;
			if (i.menu_button) {
				f = l || h._cls.menubutton || c.ui.MenuButton;
				k = new f(m, i, g);
				g.onMouseDown.add(k.hideMenu, k)
			} else {
				f = h._cls.button || c.ui.Button;
				k = new f(m, i, g)
			}
			return h.add(k)
		},
		createMenuButton : function(h, f, g) {
			f = f || {};
			f.menu_button = 1;
			return this.createButton(h, f, g)
		},
		createSplitButton : function(m, i, l) {
			var h = this, g = h.editor, j, k, f;
			if (h.get(m)) {
				return null
			}
			i.title = g.translate(i.title);
			i.scope = i.scope || g;
			if (!i.onclick) {
				i.onclick = function(n) {
					g.execCommand(i.cmd, i.ui || false, n || i.value)
				}
			}
			if (!i.onselect) {
				i.onselect = function(n) {
					g.execCommand(i.cmd, i.ui || false, n || i.value)
				}
			}
			i = e( {
				title : i.title,
				"class" : "mce_" + m,
				scope : i.scope,
				control_manager : h
			}, i);
			m = h.prefix + m;
			f = l || h._cls.splitbutton || c.ui.SplitButton;
			k = h.add(new f(m, i, g));
			g.onMouseDown.add(k.hideMenu, k);
			return k
		},
		createColorSplitButton : function(f, n, h) {
			var l = this, j = l.editor, i, k, m, g;
			if (l.get(f)) {
				return null
			}
			n.title = j.translate(n.title);
			n.scope = n.scope || j;
			if (!n.onclick) {
				n.onclick = function(o) {
					if (c.isIE) {
						g = j.selection.getBookmark(1)
					}
					j.execCommand(n.cmd, n.ui || false, o || n.value)
				}
			}
			if (!n.onselect) {
				n.onselect = function(o) {
					j.execCommand(n.cmd, n.ui || false, o || n.value)
				}
			}
			n = e( {
				title : n.title,
				"class" : "mce_" + f,
				menu_class : j.getParam("skin") + "Skin",
				scope : n.scope,
				more_colors_title : j.getLang("more_colors")
			}, n);
			f = l.prefix + f;
			m = h || l._cls.colorsplitbutton || c.ui.ColorSplitButton;
			k = new m(f, n, j);
			j.onMouseDown.add(k.hideMenu, k);
			j.onRemove.add(function() {
				k.destroy()
			});
			if (c.isIE) {
				k.onShowMenu.add(function() {
					j.focus();
					g = j.selection.getBookmark(1)
				});
				k.onHideMenu.add(function() {
					if (g) {
						j.selection.moveToBookmark(g);
						g = 0
					}
				})
			}
			return l.add(k)
		},
		createToolbar : function(k, h, j) {
			var i, g = this, f;
			k = g.prefix + k;
			f = j || g._cls.toolbar || c.ui.Toolbar;
			i = new f(k, h, g.editor);
			if (g.get(k)) {
				return null
			}
			return g.add(i)
		},
		createToolbarGroup : function(k, h, j) {
			var i, g = this, f;
			k = g.prefix + k;
			f = j || this._cls.toolbarGroup || c.ui.ToolbarGroup;
			i = new f(k, h, g.editor);
			if (g.get(k)) {
				return null
			}
			return g.add(i)
		},
		createSeparator : function(g) {
			var f = g || this._cls.separator || c.ui.Separator;
			return new f()
		},
		setControlType : function(g, f) {
			return this._cls[g.toLowerCase()] = f
		},
		destroy : function() {
			d(this.controls, function(f) {
				f.destroy()
			});
			this.controls = null
		}
	})
})(tinymce);
(function(d) {
	var a = d.util.Dispatcher, e = d.each, c = d.isIE, b = d.isOpera;
	d
			.create(
					"tinymce.WindowManager",
					{
						WindowManager : function(f) {
							var g = this;
							g.editor = f;
							g.onOpen = new a(g);
							g.onClose = new a(g);
							g.params = {};
							g.features = {}
						},
						open : function(z, h) {
							var v = this, k = "", n, m, i = v.editor.settings.dialog_type == "modal", q, o, j, g = d.DOM
									.getViewPort(), r;
							z = z || {};
							h = h || {};
							o = b ? g.w : screen.width;
							j = b ? g.h : screen.height;
							z.name = z.name || "mc_" + new Date().getTime();
							z.width = parseInt(z.width || 320);
							z.height = parseInt(z.height || 240);
							z.resizable = true;
							z.left = z.left || parseInt(o / 2) - (z.width / 2);
							z.top = z.top || parseInt(j / 2) - (z.height / 2);
							h.inline = false;
							h.mce_width = z.width;
							h.mce_height = z.height;
							h.mce_auto_focus = z.auto_focus;
							if (i) {
								if (c) {
									z.center = true;
									z.help = false;
									z.dialogWidth = z.width + "px";
									z.dialogHeight = z.height + "px";
									z.scroll = z.scrollbars || false
								}
							}
							e(z, function(p, f) {
								if (d.is(p, "boolean")) {
									p = p ? "yes" : "no"
								}
								if (!/^(name|url)$/.test(f)) {
									if (c && i) {
										k += (k ? ";" : "") + f + ":" + p
									} else {
										k += (k ? "," : "") + f + "=" + p
									}
								}
							});
							v.features = z;
							v.params = h;
							v.onOpen.dispatch(v, z, h);
							r = z.url || z.file;
							r = d._addVer(r);
							try {
								if (c && i) {
									q = 1;
									window.showModalDialog(r, window, k)
								} else {
									q = window.open(r, z.name, k)
								}
							} catch (l) {
							}
							if (!q) {
								alert(v.editor.getLang("popup_blocked"))
							}
						},
						close : function(f) {
							f.close();
							this.onClose.dispatch(this)
						},
						createInstance : function(i, h, g, m, l, k) {
							var j = d.resolve(i);
							return new j(h, g, m, l, k)
						},
						confirm : function(h, f, i, g) {
							g = g || window;
							f.call(i || this, g.confirm(this
									._decode(this.editor.getLang(h, h))))
						},
						alert : function(h, f, j, g) {
							var i = this;
							g = g || window;
							g.alert(i._decode(i.editor.getLang(h, h)));
							if (f) {
								f.call(j || i)
							}
						},
						resizeBy : function(f, g, h) {
							h.resizeBy(f, g)
						},
						_decode : function(f) {
							return d.DOM.decode(f).replace(/\\n/g, "\n")
						}
					})
}(tinymce));
(function(a) {
	a.Formatter = function(V) {
		var M = {}, P = a.each, c = V.dom, q = V.selection, t = a.dom.TreeWalker, K = new a.dom.RangeUtils(
				c), d = V.schema.isValidChild, F = c.isBlock, l = V.settings.forced_root_block, s = c.nodeIndex, E = "\uFEFF", e = /^(src|href|style)$/, S = false, B = true, p;
		function z(W) {
			return W instanceof Array
		}
		function m(X, W) {
			return c.getParents(X, W, c.getRoot())
		}
		function b(W) {
			return W.nodeType === 1 && W.id === "_mce_caret"
		}
		function R(W) {
			return W ? M[W] : M
		}
		function k(W, X) {
			if (W) {
				if (typeof (W) !== "string") {
					P(W, function(Z, Y) {
						k(Y, Z)
					})
				} else {
					X = X.length ? X : [ X ];
					P(X, function(Y) {
						if (Y.deep === p) {
							Y.deep = !Y.selector
						}
						if (Y.split === p) {
							Y.split = !Y.selector || Y.inline
						}
						if (Y.remove === p && Y.selector && !Y.inline) {
							Y.remove = "none"
						}
						if (Y.selector && Y.inline) {
							Y.mixed = true;
							Y.block_expand = true
						}
						if (typeof (Y.classes) === "string") {
							Y.classes = Y.classes.split(/\s+/)
						}
					});
					M[W] = X
				}
			}
		}
		var i = function(X) {
			var W;
			V.dom.getParent(X, function(Y) {
				W = V.dom.getStyle(Y, "text-decoration");
				return W && W !== "none"
			});
			return W
		};
		var I = function(W) {
			var X;
			if (W.nodeType === 1 && W.parentNode && W.parentNode.nodeType === 1) {
				X = i(W.parentNode);
				if (V.dom.getStyle(W, "color") && X) {
					V.dom.setStyle(W, "text-decoration", X)
				} else {
					if (V.dom.getStyle(W, "textdecoration") === X) {
						V.dom.setStyle(W, "text-decoration", null)
					}
				}
			}
		};
		function T(Z, ag, ab) {
			var ac = R(Z), ah = ac[0], af, X, ae, ad = q.isCollapsed();
			function W(al, ak) {
				ak = ak || ah;
				if (al) {
					if (ak.onformat) {
						ak.onformat(al, ak, ag, ab)
					}
					P(ak.styles, function(an, am) {
						c.setStyle(al, am, r(an, ag))
					});
					P(ak.attributes, function(an, am) {
						c.setAttrib(al, am, r(an, ag))
					});
					P(ak.classes, function(am) {
						am = r(am, ag);
						if (!c.hasClass(al, am)) {
							c.addClass(al, am)
						}
					})
				}
			}
			function aa() {
				function am(at, aq) {
					var ar = new t(aq);
					for (ab = ar.current(); ab; ab = ar.prev()) {
						if (ab.childNodes.length > 1 || ab == at) {
							return ab
						}
					}
				}
				var al = V.selection.getRng();
				var ap = al.startContainer;
				var ak = al.endContainer;
				if (ap != ak && al.endOffset == 0) {
					var ao = am(ap, ak);
					var an = ao.nodeType == 3 ? ao.length
							: ao.childNodes.length;
					al.setEnd(ao, an)
				}
				return al
			}
			function Y(an, at, aq, ap, al) {
				var ak = [], am = -1, ar, av = -1, ao = -1, au;
				P(an.childNodes, function(ax, aw) {
					if (ax.nodeName === "UL" || ax.nodeName === "OL") {
						am = aw;
						ar = ax;
						return false
					}
				});
				P(an.childNodes, function(ax, aw) {
					if (ax.nodeName === "SPAN"
							&& c.getAttrib(ax, "data-mce-type") == "bookmark") {
						if (ax.id == at.id + "_start") {
							av = aw
						} else {
							if (ax.id == at.id + "_end") {
								ao = aw
							}
						}
					}
				});
				if (am <= 0 || (av < am && ao > am)) {
					P(a.grep(an.childNodes), al);
					return 0
				} else {
					au = aq.cloneNode(S);
					P(a.grep(an.childNodes), function(ax, aw) {
						if ((av < am && aw < am) || (av > am && aw > am)) {
							ak.push(ax);
							ax.parentNode.removeChild(ax)
						}
					});
					if (av < am) {
						an.insertBefore(au, ar)
					} else {
						if (av > am) {
							an.insertBefore(au, ar.nextSibling)
						}
					}
					ap.push(au);
					P(ak, function(aw) {
						au.appendChild(aw)
					});
					return au
				}
			}
			function ai(al, an, ap) {
				var ak = [], ao, am;
				ao = ah.inline || ah.block;
				am = c.create(ao);
				W(am);
				K
						.walk(
								al,
								function(aq) {
									var ar;
									function at(au) {
										var ax = au.nodeName.toLowerCase(), aw = au.parentNode.nodeName
												.toLowerCase(), av;
										if (g(ax, "br")) {
											ar = 0;
											if (ah.block) {
												c.remove(au)
											}
											return
										}
										if (ah.wrapper && x(au, Z, ag)) {
											ar = 0;
											return
										}
										if (ah.block && !ah.wrapper && G(ax)) {
											au = c.rename(au, ao);
											W(au);
											ak.push(au);
											ar = 0;
											return
										}
										if (ah.selector) {
											P(
													ac,
													function(ay) {
														if ("collapsed" in ay
																&& ay.collapsed !== ad) {
															return
														}
														if (c.is(au,
																ay.selector)
																&& !b(au)) {
															W(au, ay);
															av = true
														}
													});
											if (!ah.inline || av) {
												ar = 0;
												return
											}
										}
										if (d(ao, ax)
												&& d(aw, ao)
												&& !(!ap
														&& au.nodeType === 3
														&& au.nodeValue.length === 1 && au.nodeValue
														.charCodeAt(0) === 65279)
												&& !b(au)) {
											if (!ar) {
												ar = am.cloneNode(S);
												au.parentNode.insertBefore(ar,
														au);
												ak.push(ar)
											}
											ar.appendChild(au)
										} else {
											if (ax == "li" && an) {
												ar = Y(au, an, am, ak, at)
											} else {
												ar = 0;
												P(a.grep(au.childNodes), at);
												ar = 0
											}
										}
									}
									P(aq, at)
								});
				if (ah.wrap_links === false) {
					P(ak, function(aq) {
						function ar(aw) {
							var av, au, at;
							if (aw.nodeName === "A") {
								au = am.cloneNode(S);
								ak.push(au);
								at = a.grep(aw.childNodes);
								for (av = 0; av < at.length; av++) {
									au.appendChild(at[av])
								}
								aw.appendChild(au)
							}
							P(a.grep(aw.childNodes), ar)
						}
						ar(aq)
					})
				}
				P(ak, function(at) {
					var aq;
					function au(aw) {
						var av = 0;
						P(aw.childNodes, function(ax) {
							if (!f(ax) && !H(ax)) {
								av++
							}
						});
						return av
					}
					function ar(av) {
						var ax, aw;
						P(av.childNodes, function(ay) {
							if (ay.nodeType == 1 && !H(ay) && !b(ay)) {
								ax = ay;
								return S
							}
						});
						if (ax && h(ax, ah)) {
							aw = ax.cloneNode(S);
							W(aw);
							c.replace(aw, av, B);
							c.remove(ax, 1)
						}
						return aw || av
					}
					aq = au(at);
					if ((ak.length > 1 || !F(at)) && aq === 0) {
						c.remove(at, 1);
						return
					}
					if (ah.inline || ah.wrapper) {
						if (!ah.exact && aq === 1) {
							at = ar(at)
						}
						P(ac, function(av) {
							P(c.select(av.inline, at), function(ax) {
								var aw;
								if (av.wrap_links === false) {
									aw = ax.parentNode;
									do {
										if (aw.nodeName === "A") {
											return
										}
									} while (aw = aw.parentNode)
								}
								U(av, ag, ax, av.exact ? ax : null)
							})
						});
						if (x(at.parentNode, Z, ag)) {
							c.remove(at, 1);
							at = 0;
							return B
						}
						if (ah.merge_with_parents) {
							c.getParent(at.parentNode, function(av) {
								if (x(av, Z, ag)) {
									c.remove(at, 1);
									at = 0;
									return B
								}
							})
						}
						if (at && ah.merge_siblings !== false) {
							at = u(C(at), at);
							at = u(at, C(at, B))
						}
					}
				})
			}
			if (ah) {
				if (ab) {
					if (ab.nodeType) {
						X = c.createRng();
						X.setStartBefore(ab);
						X.setEndAfter(ab);
						ai(o(X, ac), null, true)
					} else {
						ai(ab, null, true)
					}
				} else {
					if (!ad || !ah.inline
							|| c.select("td.mceSelected,th.mceSelected").length) {
						var aj = V.selection.getNode();
						V.selection.setRng(aa());
						af = q.getBookmark();
						ai(o(q.getRng(B), ac), af);
						if (ah.styles
								&& (ah.styles.color || ah.styles.textDecoration)) {
							a.walk(aj, I, "childNodes");
							I(aj)
						}
						q.moveToBookmark(af);
						N(q.getRng(B));
						V.nodeChanged()
					} else {
						Q("apply", Z, ag)
					}
				}
			}
		}
		function A(Y, ag, aa) {
			var ab = R(Y), ai = ab[0], af, ae, X;
			function Z(an) {
				var am, al, ak;
				am = a.grep(an.childNodes);
				for (al = 0, ak = ab.length; al < ak; al++) {
					if (U(ab[al], ag, an, an)) {
						break
					}
				}
				if (ai.deep) {
					for (al = 0, ak = am.length; al < ak; al++) {
						Z(am[al])
					}
				}
			}
			function ac(ak) {
				var al;
				P(m(ak.parentNode).reverse(), function(am) {
					var an;
					if (!al && am.id != "_start" && am.id != "_end") {
						an = x(am, Y, ag);
						if (an && an.split !== false) {
							al = am
						}
					}
				});
				return al
			}
			function W(an, ak, ap, at) {
				var au, ar, aq, am, ao, al;
				if (an) {
					al = an.parentNode;
					for (au = ak.parentNode; au && au != al; au = au.parentNode) {
						ar = au.cloneNode(S);
						for (ao = 0; ao < ab.length; ao++) {
							if (U(ab[ao], ag, ar, ar)) {
								ar = 0;
								break
							}
						}
						if (ar) {
							if (aq) {
								ar.appendChild(aq)
							}
							if (!am) {
								am = ar
							}
							aq = ar
						}
					}
					if (at && (!ai.mixed || !F(an))) {
						ak = c.split(an, ak)
					}
					if (aq) {
						ap.parentNode.insertBefore(aq, ap);
						am.appendChild(ap)
					}
				}
				return ak
			}
			function ah(ak) {
				return W(ac(ak), ak, ak, true)
			}
			function ad(am) {
				var al = c.get(am ? "_start" : "_end"), ak = al[am ? "firstChild"
						: "lastChild"];
				if (H(ak)) {
					ak = ak[am ? "firstChild" : "lastChild"]
				}
				c.remove(al, true);
				return ak
			}
			function aj(ak) {
				var al, am;
				ak = o(ak, ab, B);
				if (ai.split) {
					al = J(ak, B);
					am = J(ak);
					if (al != am) {
						al = O(al, "span", {
							id : "_start",
							"data-mce-type" : "bookmark"
						});
						am = O(am, "span", {
							id : "_end",
							"data-mce-type" : "bookmark"
						});
						ah(al);
						ah(am);
						al = ad(B);
						am = ad()
					} else {
						al = am = ah(al)
					}
					ak.startContainer = al.parentNode;
					ak.startOffset = s(al);
					ak.endContainer = am.parentNode;
					ak.endOffset = s(am) + 1
				}
				K
						.walk(
								ak,
								function(an) {
									P(
											an,
											function(ao) {
												Z(ao);
												if (ao.nodeType === 1
														&& V.dom
																.getStyle(ao,
																		"text-decoration") === "underline"
														&& ao.parentNode
														&& i(ao.parentNode) === "underline") {
													U(
															{
																deep : false,
																exact : true,
																inline : "span",
																styles : {
																	textDecoration : "underline"
																}
															}, null, ao)
												}
											})
								})
			}
			if (aa) {
				if (aa.nodeType) {
					X = c.createRng();
					X.setStartBefore(aa);
					X.setEndAfter(aa);
					aj(X)
				} else {
					aj(aa)
				}
				return
			}
			if (!q.isCollapsed() || !ai.inline
					|| c.select("td.mceSelected,th.mceSelected").length) {
				af = q.getBookmark();
				aj(q.getRng(B));
				q.moveToBookmark(af);
				if (ai.inline && j(Y, ag, q.getStart())) {
					N(q.getRng(true))
				}
				V.nodeChanged()
			} else {
				Q("remove", Y, ag)
			}
			if (a.isWebKit) {
				V.execCommand("mceCleanup")
			}
		}
		function D(X, Z, Y) {
			var W = R(X);
			if (j(X, Z, Y) && (!("toggle" in W[0]) || W[0]["toggle"])) {
				A(X, Z, Y)
			} else {
				T(X, Z, Y)
			}
		}
		function x(X, W, ac, aa) {
			var Y = R(W), ad, ab, Z;
			function ae(ai, ak, al) {
				var ah, aj, af = ak[al], ag;
				if (ak.onmatch) {
					return ak.onmatch(ai, ak, al)
				}
				if (af) {
					if (af.length === p) {
						for (ah in af) {
							if (af.hasOwnProperty(ah)) {
								if (al === "attributes") {
									aj = c.getAttrib(ai, ah)
								} else {
									aj = L(ai, ah)
								}
								if (aa && !aj && !ak.exact) {
									return
								}
								if ((!aa || ak.exact) && !g(aj, r(af[ah], ac))) {
									return
								}
							}
						}
					} else {
						for (ag = 0; ag < af.length; ag++) {
							if (al === "attributes" ? c.getAttrib(ai, af[ag])
									: L(ai, af[ag])) {
								return ak
							}
						}
					}
				}
				return ak
			}
			if (Y && X) {
				for (ab = 0; ab < Y.length; ab++) {
					ad = Y[ab];
					if (h(X, ad) && ae(X, ad, "attributes")
							&& ae(X, ad, "styles")) {
						if (Z = ad.classes) {
							for (ab = 0; ab < Z.length; ab++) {
								if (!c.hasClass(X, Z[ab])) {
									return
								}
							}
						}
						return ad
					}
				}
			}
		}
		function j(Y, aa, Z) {
			var X;
			function W(ab) {
				ab = c.getParent(ab, function(ac) {
					return !!x(ac, Y, aa, true)
				});
				return x(ab, Y, aa)
			}
			if (Z) {
				return W(Z)
			}
			Z = q.getNode();
			if (W(Z)) {
				return B
			}
			X = q.getStart();
			if (X != Z) {
				if (W(X)) {
					return B
				}
			}
			return S
		}
		function v(ad, ac) {
			var aa, ab = [], Z = {}, Y, X, W;
			aa = q.getStart();
			c.getParent(aa, function(ag) {
				var af, ae;
				for (af = 0; af < ad.length; af++) {
					ae = ad[af];
					if (!Z[ae] && x(ag, ae, ac)) {
						Z[ae] = true;
						ab.push(ae)
					}
				}
			});
			return ab
		}
		function y(aa) {
			var ac = R(aa), Z, Y, ab, X, W;
			if (ac) {
				Z = q.getStart();
				Y = m(Z);
				for (X = ac.length - 1; X >= 0; X--) {
					W = ac[X].selector;
					if (!W) {
						return B
					}
					for (ab = Y.length - 1; ab >= 0; ab--) {
						if (c.is(Y[ab], W)) {
							return B
						}
					}
				}
			}
			return S
		}
		a.extend(this, {
			get : R,
			register : k,
			apply : T,
			remove : A,
			toggle : D,
			match : j,
			matchAll : v,
			matchNode : x,
			canApply : y
		});
		function h(W, X) {
			if (g(W, X.inline)) {
				return B
			}
			if (g(W, X.block)) {
				return B
			}
			if (X.selector) {
				return c.is(W, X.selector)
			}
		}
		function g(X, W) {
			X = X || "";
			W = W || "";
			X = "" + (X.nodeName || X);
			W = "" + (W.nodeName || W);
			return X.toLowerCase() == W.toLowerCase()
		}
		function L(X, W) {
			var Y = c.getStyle(X, W);
			if (W == "color" || W == "backgroundColor") {
				Y = c.toHex(Y)
			}
			if (W == "fontWeight" && Y == 700) {
				Y = "bold"
			}
			return "" + Y
		}
		function r(W, X) {
			if (typeof (W) != "string") {
				W = W(X)
			} else {
				if (X) {
					W = W.replace(/%(\w+)/g, function(Z, Y) {
						return X[Y] || Z
					})
				}
			}
			return W
		}
		function f(W) {
			return W && W.nodeType === 3 && /^([\t \r\n]+|)$/.test(W.nodeValue)
		}
		function O(Y, X, W) {
			var Z = c.create(X, W);
			Y.parentNode.insertBefore(Z, Y);
			Z.appendChild(Y);
			return Z
		}
		function o(W, ai, Z) {
			var Y = W.startContainer, ad = W.startOffset, al = W.endContainer, af = W.endOffset, ak, ah, ac, ag;
			function aj(ar) {
				var am, ap, aq, ao, an;
				am = ap = ar ? Y : al;
				an = ar ? "previousSibling" : "nextSibling";
				root = c.getRoot();
				if (am.nodeType == 3 && !f(am)) {
					if (ar ? ad > 0 : af < am.nodeValue.length) {
						return am
					}
				}
				for (;;) {
					if (!ai[0].block_expand && F(ap)) {
						return ap
					}
					for (ao = ap[an]; ao; ao = ao[an]) {
						if (!H(ao) && !f(ao)) {
							return ap
						}
					}
					if (ap.parentNode == root) {
						am = ap;
						break
					}
					ap = ap.parentNode
				}
				return am
			}
			function ab(am, an) {
				if (an === p) {
					an = am.nodeType === 3 ? am.length : am.childNodes.length
				}
				while (am && am.hasChildNodes()) {
					am = am.childNodes[an];
					if (am) {
						an = am.nodeType === 3 ? am.length
								: am.childNodes.length
					}
				}
				return {
					node : am,
					offset : an
				}
			}
			if (Y.nodeType == 1 && Y.hasChildNodes()) {
				ah = Y.childNodes.length - 1;
				Y = Y.childNodes[ad > ah ? ah : ad];
				if (Y.nodeType == 3) {
					ad = 0
				}
			}
			if (al.nodeType == 1 && al.hasChildNodes()) {
				ah = al.childNodes.length - 1;
				al = al.childNodes[af > ah ? ah : af - 1];
				if (al.nodeType == 3) {
					af = al.nodeValue.length
				}
			}
			if (H(Y.parentNode) || H(Y)) {
				Y = H(Y) ? Y : Y.parentNode;
				Y = Y.nextSibling || Y;
				if (Y.nodeType == 3) {
					ad = 0
				}
			}
			if (H(al.parentNode) || H(al)) {
				al = H(al) ? al : al.parentNode;
				al = al.previousSibling || al;
				if (al.nodeType == 3) {
					af = al.length
				}
			}
			if (ai[0].inline) {
				if (W.collapsed) {
					function ae(an, ar, au) {
						var aq, ao, at, am;
						function ap(aw, ay) {
							var az, av, ax = aw.nodeValue;
							if (typeof (ay) == "undefined") {
								ay = au ? ax.length : 0
							}
							if (au) {
								az = ax.lastIndexOf(" ", ay);
								av = ax.lastIndexOf("\u00a0", ay);
								az = az > av ? az : av;
								if (az !== -1 && !Z) {
									az++
								}
							} else {
								az = ax.indexOf(" ", ay);
								av = ax.indexOf("\u00a0", ay);
								az = az !== -1 && (av === -1 || az < av) ? az
										: av
							}
							return az
						}
						if (an.nodeType === 3) {
							at = ap(an, ar);
							if (at !== -1) {
								return {
									container : an,
									offset : at
								}
							}
							am = an
						}
						aq = new t(an, c.getParent(an, F) || V.getBody());
						while (ao = aq[au ? "prev" : "next"]()) {
							if (ao.nodeType === 3) {
								am = ao;
								at = ap(ao);
								if (at !== -1) {
									return {
										container : ao,
										offset : at
									}
								}
							} else {
								if (F(ao)) {
									break
								}
							}
						}
						if (am) {
							if (au) {
								ar = 0
							} else {
								ar = am.length
							}
							return {
								container : am,
								offset : ar
							}
						}
					}
					ag = ae(Y, ad, true);
					if (ag) {
						Y = ag.container;
						ad = ag.offset
					}
					ag = ae(al, af);
					if (ag) {
						al = ag.container;
						af = ag.offset
					}
				}
				ac = ab(al, af);
				if (ac.node) {
					while (ac.node && ac.offset === 0
							&& ac.node.previousSibling) {
						ac = ab(ac.node.previousSibling)
					}
					if (ac.node && ac.offset > 0 && ac.node.nodeType === 3
							&& ac.node.nodeValue.charAt(ac.offset - 1) === " ") {
						if (ac.offset > 1) {
							al = ac.node;
							al.splitText(ac.offset - 1)
						} else {
							if (ac.node.previousSibling) {
							}
						}
					}
				}
			}
			if (ai[0].inline || ai[0].block_expand) {
				if (!ai[0].inline || (Y.nodeType != 3 || ad === 0)) {
					Y = aj(true)
				}
				if (!ai[0].inline
						|| (al.nodeType != 3 || af === al.nodeValue.length)) {
					al = aj()
				}
			}
			if (ai[0].selector && ai[0].expand !== S && !ai[0].inline) {
				function aa(an, am) {
					var ao, ap, ar, aq;
					if (an.nodeType == 3 && an.nodeValue.length == 0 && an[am]) {
						an = an[am]
					}
					ao = m(an);
					for (ap = 0; ap < ao.length; ap++) {
						for (ar = 0; ar < ai.length; ar++) {
							aq = ai[ar];
							if ("collapsed" in aq
									&& aq.collapsed !== W.collapsed) {
								continue
							}
							if (c.is(ao[ap], aq.selector)) {
								return ao[ap]
							}
						}
					}
					return an
				}
				Y = aa(Y, "previousSibling");
				al = aa(al, "nextSibling")
			}
			if (ai[0].block || ai[0].selector) {
				function X(an, am, ap) {
					var ao;
					if (!ai[0].wrapper) {
						ao = c.getParent(an, ai[0].block)
					}
					if (!ao) {
						ao = c.getParent(an.nodeType == 3 ? an.parentNode : an,
								F)
					}
					if (ao && ai[0].wrapper) {
						ao = m(ao, "ul,ol").reverse()[0] || ao
					}
					if (!ao) {
						ao = an;
						while (ao[am] && !F(ao[am])) {
							ao = ao[am];
							if (g(ao, "br")) {
								break
							}
						}
					}
					return ao || an
				}
				Y = X(Y, "previousSibling");
				al = X(al, "nextSibling");
				if (ai[0].block) {
					if (!F(Y)) {
						Y = aj(true)
					}
					if (!F(al)) {
						al = aj()
					}
				}
			}
			if (Y.nodeType == 1) {
				ad = s(Y);
				Y = Y.parentNode
			}
			if (al.nodeType == 1) {
				af = s(al) + 1;
				al = al.parentNode
			}
			return {
				startContainer : Y,
				startOffset : ad,
				endContainer : al,
				endOffset : af
			}
		}
		function U(ac, ab, Z, W) {
			var Y, X, aa;
			if (!h(Z, ac)) {
				return S
			}
			if (ac.remove != "all") {
				P(ac.styles, function(ae, ad) {
					ae = r(ae, ab);
					if (typeof (ad) === "number") {
						ad = ae;
						W = 0
					}
					if (!W || g(L(W, ad), ae)) {
						c.setStyle(Z, ad, "")
					}
					aa = 1
				});
				if (aa && c.getAttrib(Z, "style") == "") {
					Z.removeAttribute("style");
					Z.removeAttribute("data-mce-style")
				}
				P(ac.attributes, function(af, ad) {
					var ae;
					af = r(af, ab);
					if (typeof (ad) === "number") {
						ad = af;
						W = 0
					}
					if (!W || g(c.getAttrib(W, ad), af)) {
						if (ad == "class") {
							af = c.getAttrib(Z, ad);
							if (af) {
								ae = "";
								P(af.split(/\s+/), function(ag) {
									if (/mce\w+/.test(ag)) {
										ae += (ae ? " " : "") + ag
									}
								});
								if (ae) {
									c.setAttrib(Z, ad, ae);
									return
								}
							}
						}
						if (ad == "class") {
							Z.removeAttribute("className")
						}
						if (e.test(ad)) {
							Z.removeAttribute("data-mce-" + ad)
						}
						Z.removeAttribute(ad)
					}
				});
				P(ac.classes, function(ad) {
					ad = r(ad, ab);
					if (!W || c.hasClass(W, ad)) {
						c.removeClass(Z, ad)
					}
				});
				X = c.getAttribs(Z);
				for (Y = 0; Y < X.length; Y++) {
					if (X[Y].nodeName.indexOf("_") !== 0) {
						return S
					}
				}
			}
			if (ac.remove != "none") {
				n(Z, ac);
				return B
			}
		}
		function n(Y, Z) {
			var W = Y.parentNode, X;
			if (Z.block) {
				if (!l) {
					function aa(ac, ab, ad) {
						ac = C(ac, ab, ad);
						return !ac || (ac.nodeName == "BR" || F(ac))
					}
					if (F(Y) && !F(W)) {
						if (!aa(Y, S) && !aa(Y.firstChild, B, 1)) {
							Y.insertBefore(c.create("br"), Y.firstChild)
						}
						if (!aa(Y, B) && !aa(Y.lastChild, S, 1)) {
							Y.appendChild(c.create("br"))
						}
					}
				} else {
					if (W == c.getRoot()) {
						if (!Z.list_block || !g(Y, Z.list_block)) {
							P(a.grep(Y.childNodes), function(ab) {
								if (d(l, ab.nodeName.toLowerCase())) {
									if (!X) {
										X = O(ab, l)
									} else {
										X.appendChild(ab)
									}
								} else {
									X = 0
								}
							})
						}
					}
				}
			}
			if (Z.selector && Z.inline && !g(Z.inline, Y)) {
				return
			}
			c.remove(Y, 1)
		}
		function C(X, W, Y) {
			if (X) {
				W = W ? "nextSibling" : "previousSibling";
				for (X = Y ? X : X[W]; X; X = X[W]) {
					if (X.nodeType == 1 || !f(X)) {
						return X
					}
				}
			}
		}
		function H(W) {
			return W && W.nodeType == 1
					&& W.getAttribute("data-mce-type") == "bookmark"
		}
		function u(aa, Z) {
			var W, Y, X;
			function ac(af, ae) {
				if (af.nodeName != ae.nodeName) {
					return S
				}
				function ad(ah) {
					var ai = {};
					P(c.getAttribs(ah), function(aj) {
						var ak = aj.nodeName.toLowerCase();
						if (ak.indexOf("_") !== 0 && ak !== "style") {
							ai[ak] = c.getAttrib(ah, ak)
						}
					});
					return ai
				}
				function ag(ak, aj) {
					var ai, ah;
					for (ah in ak) {
						if (ak.hasOwnProperty(ah)) {
							ai = aj[ah];
							if (ai === p) {
								return S
							}
							if (ak[ah] != ai) {
								return S
							}
							delete aj[ah]
						}
					}
					for (ah in aj) {
						if (aj.hasOwnProperty(ah)) {
							return S
						}
					}
					return B
				}
				if (!ag(ad(af), ad(ae))) {
					return S
				}
				if (!ag(c.parseStyle(c.getAttrib(af, "style")), c.parseStyle(c
						.getAttrib(ae, "style")))) {
					return S
				}
				return B
			}
			if (aa && Z) {
				function ab(ae, ad) {
					for (Y = ae; Y; Y = Y[ad]) {
						if (Y.nodeType == 3 && Y.nodeValue.length !== 0) {
							return ae
						}
						if (Y.nodeType == 1 && !H(Y)) {
							return Y
						}
					}
					return ae
				}
				aa = ab(aa, "previousSibling");
				Z = ab(Z, "nextSibling");
				if (ac(aa, Z)) {
					for (Y = aa.nextSibling; Y && Y != Z;) {
						X = Y;
						Y = Y.nextSibling;
						aa.appendChild(X)
					}
					c.remove(Z);
					P(a.grep(Z.childNodes), function(ad) {
						aa.appendChild(ad)
					});
					return aa
				}
			}
			return Z
		}
		function G(W) {
			return /^(h[1-6]|p|div|pre|address|dl|dt|dd)$/.test(W)
		}
		function J(X, ab) {
			var W, aa, Y, Z;
			W = X[ab ? "startContainer" : "endContainer"];
			aa = X[ab ? "startOffset" : "endOffset"];
			if (W.nodeType == 1) {
				Y = W.childNodes.length - 1;
				if (!ab && aa) {
					aa--
				}
				W = W.childNodes[aa > Y ? Y : aa]
			}
			if (W.nodeType === 3 && ab && aa >= W.nodeValue.length) {
				W = new t(W, V.getBody()).next() || W
			}
			if (W.nodeType === 3 && !ab && aa == 0) {
				W = new t(W, V.getBody()).prev() || W
			}
			return W
		}
		function Q(af, W, ad) {
			var ai, ag = "_mce_caret", X = V.settings.caret_debug;
			ai = a.isGecko ? "\u200B" : E;
			function Y(ak) {
				var aj = c.create("span", {
					id : ag,
					"data-mce-bogus" : true,
					style : X ? "color:red" : ""
				});
				if (ak) {
					aj.appendChild(V.getDoc().createTextNode(ai))
				}
				return aj
			}
			function ae(ak, aj) {
				while (ak) {
					if ((ak.nodeType === 3 && ak.nodeValue !== ai)
							|| ak.childNodes.length > 1) {
						return false
					}
					if (aj && ak.nodeType === 1) {
						aj.push(ak)
					}
					ak = ak.firstChild
				}
				return true
			}
			function ab(aj) {
				while (aj) {
					if (aj.id === ag) {
						return aj
					}
					aj = aj.parentNode
				}
			}
			function aa(aj) {
				var ak;
				if (aj) {
					ak = new t(aj, aj);
					for (aj = ak.current(); aj; aj = ak.next()) {
						if (aj.nodeType === 3) {
							return aj
						}
					}
				}
			}
			function Z(al, ak) {
				var am, aj;
				if (!al) {
					al = ab(q.getStart());
					if (!al) {
						while (al = c.get(ag)) {
							Z(al, false)
						}
					}
				} else {
					aj = q.getRng(true);
					if (ae(al)) {
						if (ak !== false) {
							aj.setStartBefore(al);
							aj.setEndBefore(al)
						}
						c.remove(al)
					} else {
						am = aa(al);
						if (am.nodeValue.charAt(0) === E) {
							am = am.deleteData(0, 1)
						}
						c.remove(al, 1)
					}
					q.setRng(aj)
				}
			}
			function ac() {
				var al, aj, ap, ao, am, ak, an;
				al = q.getRng(true);
				ao = al.startOffset;
				ak = al.startContainer;
				an = ak.nodeValue;
				aj = ab(q.getStart());
				if (aj) {
					ap = aa(aj)
				}
				if (an && ao > 0 && ao < an.length && /\w/.test(an.charAt(ao))
						&& /\w/.test(an.charAt(ao - 1))) {
					am = q.getBookmark();
					al.collapse(true);
					al = o(al, R(W));
					al = K.split(al);
					T(W, ad, al);
					q.moveToBookmark(am)
				} else {
					if (!aj || ap.nodeValue !== ai) {
						aj = Y(true);
						ap = aj.firstChild;
						al.insertNode(aj);
						ao = 1;
						T(W, ad, aj)
					} else {
						T(W, ad, aj)
					}
					q.setCursorLocation(ap, ao)
				}
			}
			function ah() {
				var aj = q.getRng(true), ak, am, ap, ao, al, at, ar = [], an, aq;
				ak = aj.startContainer;
				am = aj.startOffset;
				al = ak;
				if (ak.nodeType == 3) {
					if (am != ak.nodeValue.length || ak.nodeValue === ai) {
						ao = true
					}
					al = al.parentNode
				}
				while (al) {
					if (x(al, W, ad)) {
						at = al;
						break
					}
					if (al.nextSibling) {
						ao = true
					}
					ar.push(al);
					al = al.parentNode
				}
				if (!at) {
					return
				}
				if (ao) {
					ap = q.getBookmark();
					aj.collapse(true);
					aj = o(aj, R(W), true);
					aj = K.split(aj);
					A(W, ad, aj);
					q.moveToBookmark(ap)
				} else {
					aq = Y();
					al = aq;
					for (an = ar.length - 1; an >= 0; an--) {
						al.appendChild(ar[an].cloneNode(false));
						al = al.firstChild
					}
					al.appendChild(c.doc.createTextNode(ai));
					al = al.firstChild;
					c.insertAfter(aq, at);
					q.setCursorLocation(al, 1)
				}
			}
			if (!self._hasCaretEvents) {
				V.onBeforeGetContent.addToTop(function() {
					var aj = [], ak;
					if (ae(ab(q.getStart()), aj)) {
						ak = aj.length;
						while (ak--) {
							c.setAttrib(aj[ak], "data-mce-bogus", "1")
						}
					}
				});
				a.each("onMouseUp onKeyUp".split(" "), function(aj) {
					V[aj].addToTop(function() {
						Z()
					})
				});
				V.onKeyDown.addToTop(function(aj, al) {
					var ak = al.keyCode;
					if (ak == 8 || ak == 37 || ak == 39) {
						Z(ab(q.getStart()))
					}
				});
				self._hasCaretEvents = true
			}
			if (af == "apply") {
				ac()
			} else {
				ah()
			}
		}
		function N(X) {
			var W = X.startContainer, ac = X.startOffset, ab, aa, Y, Z;
			if (W.nodeType == 3 && ac >= W.nodeValue.length - 1) {
				W = W.parentNode;
				ac = s(W) + 1
			}
			if (W.nodeType == 1) {
				Y = W.childNodes;
				W = Y[Math.min(ac, Y.length - 1)];
				ab = new t(W);
				if (ac > Y.length - 1) {
					ab.next()
				}
				for (aa = ab.current(); aa; aa = ab.next()) {
					if (aa.nodeType == 3 && !f(aa)) {
						Z = c.create("a", null, E);
						aa.parentNode.insertBefore(Z, aa);
						X.setStart(aa, 0);
						q.setRng(X);
						c.remove(Z);
						return
					}
				}
			}
		}
	}
})(tinymce);
tinymce.onAddEditor.add(function(e, a) {
	var d, h, g, c = a.settings;
	if (c.inline_styles) {
		h = e.explode(c.font_size_legacy_values);
		function b(j, i) {
			e.each(i, function(l, k) {
				if (l) {
					g.setStyle(j, k, l)
				}
			});
			g.rename(j, "span")
		}
		d = {
			font : function(j, i) {
				b(i, {
					backgroundColor : i.style.backgroundColor,
					color : i.color,
					fontFamily : i.face,
					fontSize : h[parseInt(i.size) - 1]
				})
			},
			u : function(j, i) {
				b(i, {
					textDecoration : "underline"
				})
			},
			strike : function(j, i) {
				b(i, {
					textDecoration : "line-through"
				})
			}
		};
		function f(i, j) {
			g = i.dom;
			if (c.convert_fonts_to_spans) {
				e.each(g.select("font,u,strike", j.node), function(k) {
					d[k.nodeName.toLowerCase()](a.dom, k)
				})
			}
		}
		a.onPreProcess.add(f);
		a.onSetContent.add(f);
		a.onInit.add(function() {
			a.selection.onSetContent.add(f)
		})
	}
});