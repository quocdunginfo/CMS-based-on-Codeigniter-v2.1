var qdj = jQuery.noConflict();

function mycarousel_initCallback(carousel) {
    
    qdj('.slider-nav a').bind('click', function() {
        carousel.scroll(jQuery.jcarousel.intval(jQuery(this).text()));
        return false;
    });

};

function mycarousel_itemFirstInCallback(carousel, item, idx, state) {
	qdj('.slider-nav a').removeClass('active');
	qdj('.slider-nav a').eq(idx-1).addClass('active');
	
};


qdj(function(){
	
    //Horizontal Carousel
    qdj('.slider-left ul, .slider-right ul').jcarousel({
    	auto: 5,//auto timer in second
    	wrap: "last",
    	scroll: 1,
    	visible: 1,
    	initCallback: mycarousel_initCallback,
    	itemFirstInCallback:mycarousel_itemFirstInCallback, 
        buttonNextHTML: null,
        buttonPrevHTML: null
    });
    
    //Blink Fields
    qdj('.blink').
        focus(function() {
            if(this.title==this.value) {
                this.value = '';
            }
        }).
        blur(function(){
            if(this.value=='') {
                this.value = this.title;
            }
        });
    
    //Navigation
    
    qdj('#navigation ul li').hover(function() {
    	
    	if( qdj(this).find('.dd-holder').length > 0 ) {
    		
    		qdj(this).find('span').addClass('link');
    		qdj(this).find('a:eq(0)').addClass('hover');
    		qdj(this).find('a.hover').append('<span class="hide">&nbsp;</span>');
    		
    		var hide_width = qdj('.hover').outerWidth() -8;
    			qdj(this).find('.hide').css({
    			width : hide_width,
    			display : "block"
    		});
    		
    		qdj(this).find('.dd-holder:eq(0)').show();
    		
    		qdj('.dd-holder ul li').hover(function(){
    			if( qdj(this).find('.dd-holder').length > 0) {
    				qdj(this).find('a:eq(0)').addClass('subhover');
    			}
    			},
    			function(){
    				qdj(this).find('a:eq(0)').removeClass('subhover');	
    			});	
    	}
    
    },
    function(){
    	qdj(this).find('a').removeClass('hover');
    	qdj(this).find('.dd-holder:eq(0)').hide();
    	qdj(this).find('span').removeClass('link');
    	qdj(this).find('.hide').remove();
    });
    
    //PNG Fix for IE 6 
    if( qdj.browser.msie && qdj.browser.version.substr(0,1) == 6 ){
    	DD_belatedPNG.fix('.dd, .dd-t, .dd-b');
    }
	
});