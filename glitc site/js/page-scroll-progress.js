// Page Scroll
$(function(){$(window).scroll(function(){$('.page-scroll-progress-bar').css({width:getScrollPercent()});});});

// Page Scroll Percent
function getScrollPercent() {
    var h = document.documentElement, 
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight';
    return (h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100+'%';
}




	