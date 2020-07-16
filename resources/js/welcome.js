$(document).ready(function() {
    var count = 0;
    var sliderTimer;

    startSlider();

    function changeSlide(slideId) {
        $(".slider-menu>ul>li.active").removeClass("active");
        $('#slider').css('margin-left', -slideId * 100 + '%');
        $(".slider-menu>ul>li")[slideId].classList.add("active");
        count = slideId;
    }

    function startSlider() {
        sliderTimer = setInterval(() => {
            changeSlide(++count % 3);
        }, 5000);
    }

    $(".slider-menu>ul").on('click', 'li', function() {
        clearInterval(sliderTimer);
        changeSlide($(this).index());
        startSlider();
    });
})