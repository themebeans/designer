// IF JS IS ENABLED, REMOVE 'no-js' AND ADD 'js' CLASS
jQuery('html').removeClass('no-js').addClass('js');

jQuery(document).ready(function($) {
	"use strict";

	//FORM VALIDATION
	if (jQuery().validate) { jQuery("#commentform").validate(); }

	! function(a) {

		a(document).ready(function() {

			var
			body   = a("body"),
			html   = a("html"),
			admin  = ("admin-bar"),
			active = ("active"),
			cta	= a(".project-cta"),
			animating  = ("js--animating"),
			formContainer = a(".formContainer"),
			pageHeight = jQuery(window).height();

			a(".page-container").fitVids();

			/*================================*/
			/* MOBILE MENU
			/*================================*/
			a( '.mobile-menu-toggle' ).on( 'click', function() {
				body.toggleClass( 'open-nav' );

				if( body.hasClass( animating ) ) {
					setTimeout(function() {
						body.removeClass( animating );
					}, 400);
				} else {
					body.addClass( animating );
				}
			} );


			var navigationHolder = a('.mobile-navigation');
			var dropdownOpener = a('.mobile-navigation .mobile-navigation--arrow, .mobile-navigation h6, .mobile-navigation a.ava-mobile-no-link');
			var animationSpeed = 200;

			if(dropdownOpener.length) {
				dropdownOpener.each(function() {
					a(this).on('tap click', function(e) {
						var dropdownToOpen = a(this).nextAll('ul').first();

						if(dropdownToOpen.length) {
							e.preventDefault();
							e.stopPropagation();

							var openerParent = a(this).parent('li');
							if(dropdownToOpen.is(':visible')) {
								dropdownToOpen.slideUp(animationSpeed);
								openerParent.removeClass('designer-opened');
							} else {
								dropdownToOpen.slideDown(animationSpeed);
								openerParent.addClass('designer-opened');
							}
						}

					});
				});
			}

			/*================================*/
			/* SOCIAL
			/*================================*/
			a('.nav-social-toggle').on( 'click', function() {
				var
				b = a(".social-flyout");
				b.toggleClass(active);
				a(this).toggleClass(active);
			});

			/*================================*/
			/* SUPERFISH
			/*================================*/
			function dropdowns() {
				var $window = $(window);
				if($window.width() > 768 ) {

					a('nav ul#primary-menu').superfish({
							delay: 0,
							animation: { opacity:'show', height:'show' },
							speed: 0,
							cssArrows: false,
							disableHI: true
					});
				}
			} dropdowns();

			/*================================*/
			/* MATERIAL INPUTS
			/*================================*/
			a('.comment-form input, .contactform input').blur(function() {
				if (a(this).val())
					a(this).addClass('used');
				else
				a(this).removeClass('used');
			});


			/*================================*/
			/* PARALLAX PORTFOLIO TEMPLATE
			/*================================*/
			var
			b = a(".offset-projects .project:nth-of-type(23n+2) .thumb"),
			c = a(".offset-projects .project:nth-of-type(23n+3) .thumb"),
			d = a(".offset-projects .project:nth-of-type(23n+4) .thumb"),
			e = a(".offset-projects .project:nth-of-type(23n+5) .thumb"),
			f = a(".offset-projects .project:nth-of-type(23n+6) .thumb"),
			g = a(".offset-projects .project:nth-of-type(23n+7) .thumb"),
			h = a(".offset-projects .project:nth-of-type(23n+8) .thumb"),
			i = a(".offset-projects .project:nth-of-type(23n+9) .thumb"),
			j = a(".offset-projects .project:nth-of-type(23n+10) .thumb"),
			k = a(".offset-projects .project:nth-of-type(23n+11) .thumb"),
			l = a(".offset-projects .project:nth-of-type(23n+12) .thumb"),
			m = a(".offset-projects .project:nth-of-type(23n+13) .thumb"),
			n = a(".offset-projects .project:nth-of-type(23n+14) .thumb"),
			o = a(".offset-projects .project:nth-of-type(23n+15) .thumb"),
			p = a(".offset-projects .project:nth-of-type(23n+16) .thumb"),
			q = a(".offset-projects .project:nth-of-type(23n+17) .thumb"),
			r = a(".offset-projects .project:nth-of-type(23n+18) .thumb"),
			s = a(".offset-projects .project:nth-of-type(23n+19) .thumb"),
			t = a(".offset-projects .project:nth-of-type(23n+20) .thumb"),
			u = a(".offset-projects .project:nth-of-type(23n+21) .thumb"),
			v = a(".offset-projects .project:nth-of-type(23n+22) .thumb"),
			w = a(".offset-projects .project:nth-of-type(23n+23) .thumb"),

			z = a("#projects.projects.offset-projects"),

			cp = a(".page-template-template-contact-php .page"),
			cg = a(".page-template-template-contact-php .g-map"),
			cf = a(".page-template-template-contact-php .first-link"),

			ec = a(".page .entry-media");


			if( !z.hasClass('no-parallax') ) {
				a(window).on("scroll", function() {

					var
					b_speed = "-" + .25 * a(window).scrollTop() + "px",
					c_speed = "-" + .50 * a(window).scrollTop() + "px",
					d_speed = "-" + .15 * a(window).scrollTop() + "px",
					e_speed = "-" + .20 * a(window).scrollTop() + "px",
					f_speed = "-" + .17 * a(window).scrollTop() + "px",
					g_speed = "-" + .30 * a(window).scrollTop() + "px",
					h_speed = "-" + .45 * a(window).scrollTop() + "px",
					i_speed = "-" + .30 * a(window).scrollTop() + "px",

					j_speed = "-" + .25 * a(window).scrollTop() + "px",
					k_speed = "-" + .40 * a(window).scrollTop() + "px",
					l_speed = "-" + .45 * a(window).scrollTop() + "px",
					m_speed = "-" + .35 * a(window).scrollTop() + "px",
					n_speed = "-" + .32 * a(window).scrollTop() + "px",
					o_speed = "-" + .30 * a(window).scrollTop() + "px",
					p_speed = "-" + .40 * a(window).scrollTop() + "px",

					q_speed = "-" + .45 * a(window).scrollTop() + "px",
					r_speed = "-" + .30 * a(window).scrollTop() + "px",
					s_speed = "-" + .35 * a(window).scrollTop() + "px",
					t_speed = "-" + .30 * a(window).scrollTop() + "px",
					u_speed = "-" + .33 * a(window).scrollTop() + "px",
					w_speed = "-" + .30 * a(window).scrollTop() + "px",

					x_speed = "-" + .1 * a(window).scrollTop() + "px",
					y_speed = "-" + .05 * a(window).scrollTop() + "px",

					z_speed = .30 * a(window).scrollTop() + "px";

					b.css({transform: 'translateY(' + b_speed +')'})
					c.css({transform: 'translateY(' + c_speed +')'})
					d.css({transform: 'translateY(' + d_speed +')'})
					e.css({transform: 'translateY(' + e_speed +')'})
					f.css({transform: 'translateY(' + f_speed +')'})
					g.css({transform: 'translateY(' + g_speed +')'})
					h.css({transform: 'translateY(' + h_speed +')'})
					i.css({transform: 'translateY(' + i_speed +')'})

					j.css({transform: 'translateY(' + j_speed +')'})
					k.css({transform: 'translateY(' + k_speed +')'})
					l.css({transform: 'translateY(' + l_speed +')'})
					m.css({transform: 'translateY(' + m_speed +')'})
					n.css({transform: 'translateY(' + n_speed +')'})
					o.css({transform: 'translateY(' + o_speed +')'})
					p.css({transform: 'translateY(' + p_speed +')'})

					q.css({transform: 'translateY(' + q_speed +')'})
					r.css({transform: 'translateY(' + r_speed +')'})
					s.css({transform: 'translateY(' + s_speed +')'})
					t.css({transform: 'translateY(' + t_speed +')'})
					u.css({transform: 'translateY(' + u_speed +')'})
					w.css({transform: 'translateY(' + w_speed +')'})

					z.css({transform: 'translateY(' + z_speed +')'})
				});
			}

			if( !ec.hasClass('no-parallax') ) {

				a(window).on("scroll", function() {

					var m_speed = .35 * a(window).scrollTop() + "px";

					ec.css({transform: 'translateY(' + m_speed +')'})
				});
			}

			if( !cp.hasClass('no-parallax') ) {
				a(window).on("scroll", function() {

					var d_speed = .15 * a(window).scrollTop() + "px";
					var x_speed = "-" + .1 * a(window).scrollTop() + "px";
					var y_speed = "-" + .05 * a(window).scrollTop() + "px";

					cp.css({transform: 'translateY(' + d_speed +')'}),
					cg.css({transform: 'translateY(' + x_speed +')'}),
					cf.css({transform: 'translateY(' + y_speed +')'})

				});
			}


			/*================================*/
			/* PORTFOLIO LAZY LOADING
			/*================================*/
			if( a(body).hasClass('single-portfolio') ) {
				a(".project-assets .lazy-load img").unveil(25, function() {
					a(this).load(function() {
						this.style.opacity = 1;
					});
				});
			}


			/*================================*/
			/* PORTFOLIO FLYOUT
			/*================================*/
			a( "#flyout-toggle, #flyout-close, #nav-flyout-toggle" ).click( function(e) {
				var
				b = body.scrollTop(),
				c = a(".project-flyout"),
				d = a("#flyout-overlay"),
				e = ("open-flyout"),
				f = ("open"),
				g = a(".page-container");

				if(b!=0) {
					if(body.hasClass(admin)) {
						body.animate({ scrollTop: g.offset().top - 32 }, 400);
					} else {
						body.animate({ scrollTop: g.offset().top - 0 }, 400);
					}
				}

				if( c.hasClass(f) ) {
					setTimeout(function(){
						c.removeClass(f);
						html.removeClass(e);
						return false;
					},300);
					setTimeout(function(){ d.removeClass(f); }, 400);
				} else {
					setTimeout(function(){
						c.addClass(f);
						html.addClass(e);
						return false;
					},500);
					setTimeout(function(){ d.addClass(f) }, 400);
				}
			});


			/*================================*/
			/* FLYOUT ISOTOPE
			/*================================*/
			a(window).load(function() {
				var container = a('.masonry-projects');

				container.imagesLoaded( function(){
					container.isotope({
						itemSelector: '.masonry-projects .project',
				 		resizesContainer: true,
				 		getSortData: {
							 views: '[data-views]',
							 date: '[data-date]',
						},
						sortAscending: {
							views: false,
							date: false,
						}
					});
				});


			/*================================*/
			/* FLYOUT SORTING
			/*================================*/
			a('.sort-group a').on( 'click', function(e) {
				var
				b = a(this).attr('data-sort-by'),
				c = a(".sort-group a"),
				d = ("active");

				e.preventDefault();
				container.isotope({ sortBy: b });
				c.removeClass(d);
				jQuery(this).addClass(d);
			});


			/*================================*/
			/* FLYOUT FILTER
			/*================================*/
			a('.filter-group a').on( 'click', function(event) {
				var
				b = a(this).attr('data-filter'),
				d = ("active"),
				e = jQuery('.project-filter'),
				 f = e.find('a');

				event.preventDefault();
				container.isotope({ filter: b });
				f.removeClass(d);
				jQuery(this).addClass(d);
			});


			/*================================*/
			/* PROJECT CTA FORM
			/*================================*/
			a(".project-cta .btn").click(function(e) {
				e.preventDefault();
				formContainer.addClass(active)
				setTimeout(function(){ body.addClass("switchToForm") }, 100);

			});

			a("button.close").click(function(e) {
				e.preventDefault();
				body.removeClass("switchToForm");
				setTimeout(function(){ formContainer.removeClass(active) }, 500);
			});

			//DROPKICK SUBJECT SELETOR
			a("#subject_select").dropkick();


			/*================================*/
			/* BACK TO TOP
			/*================================*/
			var menuScrollDown = body.find( '#back-to-top' );
			var menuTop = 0;

			// If 'Scroll Down' arrow in present on page, calculate scroll offset and bind an event handler to the click event.
			if ( menuScrollDown.length ) {

				if ( body.hasClass( 'admin-bar' ) ) {
					menuTop -= 32;
				}

				menuScrollDown.click( function( e ) {
					e.preventDefault();
					a( window ).scrollTo( '#page-container', {
						duration: 1000,
						offset: { top: menuTop }
					} );
				} );
			}


		} );

		/* Resize functions */
		a(window).resize(function(){
			dropdowns();
		});

	}),


	/*================================*/
	/* PICTUREFILL
	/*================================*/
	a.picturefill = function() {
		for (var b = a.document.getElementsByTagName("div"), c = 0, d = b.length; d > c; c++)
			if (null !== b[c].getAttribute("data-picture")) {
				for (var e = b[c].getElementsByTagName("div"), f = [], g = 0, h = e.length; h > g; g++) {
					var i = e[g].getAttribute("data-media");
					(!i || a.matchMedia && a.matchMedia(i).matches) && f.push(e[g])
				}
				var j = b[c].getElementsByTagName("img")[0];
				if (f.length) {
					if (!j) {
						var k = f.pop();
						j = a.document.createElement("img"), j.alt = b[c].getAttribute("data-alt"), j.className = b[c].getAttribute("data-class"), k.getAttribute("data-width") && (j.width = k.getAttribute("data-width")), b[c].appendChild(j), j.src = k.getAttribute("data-src")
					}
				} else j && b[c].removeChild(j)
			}
		}, a.addEventListener ? (a.addEventListener("resize", a.picturefill, !1), a.addEventListener("DOMContentLoaded", function() {
			a.picturefill(), a.removeEventListener("load", a.picturefill, !1)
		}, !1), a.addEventListener("load", a.picturefill, !1)) : a.attachEvent && a.attachEvent("onload", a.picturefill)

	}(window.jQuery);
});