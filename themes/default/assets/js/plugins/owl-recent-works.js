var OwlRecentWorks = function () {

    return {

        ////Owl Recent Works v1
        initOwlRecentWorksV1: function () {
            jQuery(document).ready(function() {
            var owl = jQuery(".owl-recent-works-v1");
                owl.owlCarousel({
                    items: [4],
                    itemsDesktop : [1000,4],
                    itemsDesktopSmall : [900,3],
                    itemsTablet: [600,2],
                    itemsMobile : [479,1],
                    slideSpeed: 1000
                });

                // Custom Navigation Events
                jQuery(".next-v1").click(function(){
                    owl.trigger('owl.next');
                })
                jQuery(".prev-v1").click(function(){
                    owl.trigger('owl.prev');
                })
            });            
        },  

        ////Owl Recent Works v2
        initOwlRecentWorksV2: function () {
            jQuery(document).ready(function() {
            var owl = jQuery(".owl-recent-works-v2");
                owl.owlCarousel({
                    items: [5],
                    itemsDesktop : [1000,5],
                    itemsDesktopSmall : [900,4],
                    itemsTablet: [600,3],
                    itemsMobile : [479,2],
                    slideSpeed: 1000
                });

                // Custom Navigation Events
                jQuery(".next-v2").click(function(){
                    owl.trigger('owl.next');
                })
                jQuery(".prev-v2").click(function(){
                    owl.trigger('owl.prev');
                })
            });            
        },        

        ////Owl Recent Works v3
        initOwlRecentWorksV3: function () {
            jQuery(document).ready(function() {
            var owl = jQuery(".owl-recent-works-v3");
                owl.owlCarousel({
                    items: [1],
                    itemsDesktop : [1000,1],
                    itemsDesktopSmall : [900,2],
                    itemsTablet: [600,2],
                    itemsMobile : [479,1],
                    slideSpeed: 1000
                });

                // Custom Navigation Events
                jQuery(".next-v3").click(function(){
                    owl.trigger('owl.next');
                })
                jQuery(".prev-v3").click(function(){
                    owl.trigger('owl.prev');
                })
            });            
        },
        initOwlRecentWorksV4: function () {
            jQuery(document).ready(function() {
            var owl = jQuery(".owl-recent-works-v4");
                owl.owlCarousel({
                    items: [7],
                    itemsDesktop : [1000,7],
                    itemsDesktopSmall : [900,5],
                    itemsTablet: [600,4],
                    itemsMobile : [479,3],
                    slideSpeed: 1000
                });

                // Custom Navigation Events
                jQuery(".next-v4").click(function(){
                    owl.trigger('owl.next');
                })
                jQuery(".prev-v4").click(function(){
                    owl.trigger('owl.prev');
                })
            });            
        }

    };
    
}();