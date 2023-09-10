//this code to add the hyperlink at the bottom of each slide
jQuery(document).ready(function($){ //wait for the document to load
    let slideTopPaddingState = document.getElementsByClassName("slide_property")[0].style.paddingTop; 
    //console.log(slideTopPaddingState);

    if(slideTopPaddingState === '' ){
        let splidelist = document.querySelector('.splide__track');
        let Height = splidelist.offsetHeight;

        //console.log("SplideList Width = " + Height);
        
        let TopPaddingFromTrack = Height * 0.87;
    
        let slides = document.getElementsByClassName("splide__slide");
    
        slides.forEach((currentElement) => {
            let TopPadding = currentElement.offsetTop;

            //console.log("Getting slide last top point = " + TopPadding);
    
            let title = currentElement.querySelector('.slide_property');
    
            title.style.paddingTop = TopPaddingFromTrack - TopPadding + 'px';
        })
    }

    
});