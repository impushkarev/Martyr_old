$(document).ready(function() {
    var count = 0;
    var sliderTimer;
    var mwidth = 0;
    
    startSlider();
    
    function changeSlide(mwidth) {
        $('.images').css('margin-left', -mwidth + 'px');
    }
    
    function startSlider() {
        sliderTimer = setInterval(() => {
            mwidth = mwidth + $('.images .image:eq('+ count +')').width() + 100;
            if((++count % $('.images .image').length) == 0) {
                mwidth = 0;
                count  = 0;
            }
            changeSlide(mwidth);
        }, 5000);
    }
});