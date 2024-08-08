//=======================================================
//   html load
//=======================================================

window.addEventListener("load", ()=>{
    // 로딩이미지 가리기
    const loader = document.querySelector('.main-loader')
    if(loader){
        setTimeout(function(){
            loader.classList.add('hide')
        },1000)
    }
    
    // 헤더 
    fetch("./_header.html")
    .then((response) => response.text())
    .then((htmlData) => {
        if(!$('body')){
        }
        $('#wrap .content').prepend(htmlData)
        headerScript()
    })
    .catch((error) => {
        console.log(error);
    });

    // 사이드메뉴
    fetch("./_side_menu.html")
        .then((response) => response.text())
        .then((htmlData) => {
            $('#wrap').prepend(htmlData)
            sideMenuScript()
        })
        .catch((error) => {
            console.log(error);
        });
    
    // 푸터 
    fetch("./_footer.html")
        .then((response) => response.text())
        .then((htmlData) => {
            $('#wrap .content').append(htmlData);
        })
        .catch((error) => {
            console.log(error);
        });

    // 모달 
    fetch("./_modal.html")
    .then((response) => response.text())
    .then((htmlData) => {
        $('#wrap').append(htmlData);
        setTimeout(()=>{
            loadJquery();
        },1000)
    })
    .catch((error) => {
        console.log(error);
    });


});



// 모달 오픈
const modalOpen = (item)=>{
    const modal = document.querySelector(`#${item}`);
    modal.classList.add('show','overflow-y-auto');
    modal.style.marginTop = "0";
    modal.style.marginLeft = "0";
    modal.style.paddingLeft = "0";
    modal.style.zIndex = "10000";
    document.querySelector('body').classList.add('overflow-hidden');
}

// 모달 닫기
const modalClose = (item)=>{
    const modal = document.querySelector(`#${item}`);
    modal.classList.remove('show','overflow-y-auto');
    modal.style.marginTop = "-10000px";
    modal.style.marginLeft = "-10000px";
    modal.style.paddingLeft = "0";
    modal.style.zIndex = "0";
    document.querySelector('body').classList.remove('overflow-hidden');
}

// 헤더 스크립트
const headerScript = ()=>{

}

// 사이드메뉴 스크립트
const sideMenuScript = ()=>{
    $(".side-menu").on("click", function () {
        if ($(this).parent().find("ul").length) {
            if ($(this).parent().find("ul").first()[0].offsetParent !== null) {
                $(this)
                    .find(".side-menu__sub-icon")
                    .removeClass("transform rotate-180");
                $(this).removeClass("side-menu--open");
                $(this)
                    .parent()
                    .find("ul")
                    .first()
                    .slideUp(300, function () {
                        $(this).removeClass("side-menu__sub-open");
                    });
            } else {
                $(this)
                    .find(".side-menu__sub-icon")
                    .addClass("transform rotate-180");
                $(this).addClass("side-menu--open");
                $(this)
                    .parent()
                    .find("ul")
                    .first()
                    .slideDown(300, function () {
                        $(this).addClass("side-menu__sub-open");
                    });
            }
        }
    });

    

}

// 모달 스크립트
const modalScript = ()=>{

}

// 로딩 스크립트
window.addEventListener('load',function(){
    setTimeout(function(){
        $('#initial-loader').addClass('close')
    },1000)
})

// 사이드메뉴
const sideToggle = ()=>{
    const wrap = document.querySelector("#wrap");
    wrap.classList.toggle("fold");
}

// 로드,resize 시 window width 1280 보다 낮으면 fold 클래스 붙임
const sideCheck = ()=>{
    if(window.innerWidth < 1280 && window.innerWidth > 767){
        const wrap = document.querySelector("#wrap");
        wrap.classList.add("fold");
    }
}
window.addEventListener('load',sideCheck);
window.addEventListener('resize',sideCheck);

// 사이드메뉴 - 모바일
const mosideToggle = ()=>{
    $('#wrap').removeClass('fold')
    $('.side_menu').toggleClass('open')
}


// jquery 모음
const loadJquery = ()=>{

    // 스와이퍼 공통
    $('.mySwiper').each(function(index) {
        var mySwiper = $(this),
            swiperContainer = $(this).find('.swiper-container'),
            itemPer = $(this).attr('data-per') ? $(this).attr('data-per') : 1,
            itemGap = $(this).attr('data-gap') ? $(this).attr('data-gap') : 0,
            slideLoop = $(this).attr('data-loop') == 'false' ? false : true,
            slideCenter = $(this).attr('data-center') == 'true' ? true : false,
            slidePlayTime = $(this).attr('data-timer') ? $(this).attr('data-timer') * 1000 : 0;
            effect = $(this).attr('data-effect') ? $(this).attr('data-effect') : 'slide';
            initial = $(this).attr('data-initial') ? $(this).attr('data-initial') : 0;
        $(this).addClass('num'+index);		
        var swiper =  new Swiper( '.mySwiper.num' + index + ' .swiper-container', {
            spaceBetween: parseInt(itemGap),
            slidesPerView: itemPer == 'auto' ? "auto" : itemPer,
            effect: effect,
            pagination: {
                el: '.mySwiper.num' + index + ' .pagination',
                clickable: true,
                type:  $('.mySwiper.num' + index + ' .pagination').hasClass('fraction') ? "fraction" : "bullets",
            },
            navigation: {
                nextEl: '.mySwiper.num' + index + ' .next',
                prevEl: '.mySwiper.num' + index + ' .prev'
            },
            speed : 1000,
            centeredSlides: slideCenter,
            autoplay: slidePlayTime ? {delay: parseInt(slidePlayTime),disableOnInteraction:true} : false,
            loop: slideLoop,
            initialSlide: initial,
            scrollbar: {
                el: '.mySwiper.num' + index + ' .swiper-scrollbar',
                hide: true,
            }
        });		
        if($(this).attr('data-slideto') == '1') {
            $(slideWrapper.find('.swiper-slide')).click(function() {
                var i = $(this).index();
                swiper.slideTo(i,700,false);
            });
        }
        if($(this).attr('data-click')){
            $('.mySwiper li').on('click',function(){
                swiper.slideTo($(this).index())
            })
        }
        if($(this).attr('data-group')){
            swiper.on('slideChangeTransitionEnd',function(swiper){
                let data = $('.mySwiper.num'+index).find('.swiper-slide-active').data('group')
                $('.mySwiper.num'+index).find('.group').text(data)
            })
        }
    });

    // 카지노 스와이퍼
    $('.casinoSwiper').each(function(index){
        $(this).addClass('num'+index);		
        let xlpcItemPer = $(this).data('xl') ? $(this).data('xl') : 1,
            pcItemPer = $(this).data('lg') ? $(this).data('lg') : xlpcItemPer,
            taItemPer = $(this).data('md') ? $(this).data('md') : pcItemPer,
            moItemPer = $(this).data('mo') ? $(this).data('mo') : 1,
            itemGap = $(this).data('gap') ? $(this).data('gap') : 0,
            itemGroup = $(this).data('group') ?$(this).data('group') : 1,
            slideLoop = $(this).data('loop') == true ? true : false ;
        
        var casinoswiper = new Swiper( '.casinoSwiper.num' + index + ' .swiper-container', {
            spaceBetween: parseInt(itemGap),
            slidesPerView : moItemPer,
            slidesPerGroup : itemGroup,
            loop: slideLoop,

            breakpoints: {
                767: {
                  slidesPerView: taItemPer,
                },
                1020: {
                  slidesPerView: taItemPer,
                },
                1365: {
                  slidesPerView: xlpcItemPer,
                }
            },
            navigation: {
                nextEl: '.casinoSwiper.num' + index + ' .next',
                prevEl: '.casinoSwiper.num' + index + ' .prev'
            },

        });
    })


}