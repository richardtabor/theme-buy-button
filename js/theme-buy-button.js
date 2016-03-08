jQuery(document).ready(function(a) {
	var  
	b 		    = a('#theme-buy-button--wrapper'),
	visible 	= ("js--visible"),
	hidden 	    = ("js--hidden"),
	didScroll,
	lastScrollTop = 0,
	delta = 50,
	navbarHeight = b.outerHeight();

	a(window).scroll(function(event){
		didScroll = true;
	});

	setInterval(function() {
		if (didScroll) {
			hasScrolled();
			didScroll = false;
		}
	}, 50);

	function hasScrolled() {
		var st = a(this).scrollTop();
		if(Math.abs(lastScrollTop - st) <= delta) return;
		if (st > lastScrollTop && st > navbarHeight){
			b.removeClass(visible);
		} else {
			if(st + a(window).height() < a(document).height()) {
				b.addClass(visible);
			}
		}
		lastScrollTop = st;
	}
});