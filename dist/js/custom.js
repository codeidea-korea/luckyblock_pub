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

    // 스포츠 상단메뉴
    fetch("./_sports_topmenu.html")
    .then((response) => response.text())
    .then((htmlData) => {
        $('.sports_content_box').prepend(htmlData);
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

// password <---> text
const passwordChange = (item)=>{
    let type = $(item).siblings('input').attr('type')

    if(type == 'text'){
        $(item).siblings('input').attr('type','password')
    }else{
        $(item).siblings('input').attr('type','text')
    }
}

// tw tab 클릭
const tabChange = (item)=>{
    $(item).click();
}

// inbox 보이게
const inboxToggle = ()=>{
    $('.right_inbox').toggleClass('open')
}

// inbox 타이틀 클릭시 내용 보이게
const inboxContenToggle = (item)=>{
    $(item).parent().toggleClass('show')
    $(item).next().slideToggle();
}

// coin 클릭시 변경
const coinChange = (item)=>{
    $(item).addClass('active').siblings().removeClass('active');

    let coinName = $(item).find('.name').text();
    let coinSvg = $(item).find('svg use').attr('href').split('#')[1];
    let coin = $(item).find('.coin').text();
    // currentCash, currentCoinImg, currentCoinName

    $('.currentCash').each(function(){
        $(this).text(coin)
    })
    $('.currentCoinName').each(function(){
        $(this).text(coinName)
    })
    $('.currentCoinImg').each(function(){
        let target = $(this).find('use')
        let targetSvg = target.attr('href').split('#')[1]
        target.attr('href', target.attr('href').replace(targetSvg,coinSvg))
    })
}

// search_box focus 될때
const searchFocus = (item)=>{
    $(item).parents('.search_box').addClass('open')
}
document.addEventListener('click',(e)=>{
    const search = document.querySelectorAll('.search_box.open')

    search.forEach((item)=>{
        if(item && !item.contains(e.target)){
            item.classList.remove('open')
        }
    })
})

// search_box x 클릭시 reset
const searchReset = (item)=>{
    $(item).parent('form')[0].reset();
}

// wallet 모달 
const selectCryptoToggle = ()=>{
    $('.select_crypto').toggleClass('open')
}
const cryptoChange = (item)=>{
    $(item).addClass('active').siblings().removeClass('active');

    let coinName = $(item).find('.name').text();
    let coinSvg = $(item).find('svg use').attr('href').split('#')[1];
    let coin = $(item).find('.coin').text();
    // currentCash, currentCoinImg, currentCoinName

    $('.cryptoCash').each(function(){
        $(this).text(coin)
    })
    $('.cryptoCoinName').each(function(){
        $(this).text(coinName)
    })
    $('.cryptoCoinImg').each(function(){
        let target = $(this).find('use')
        let targetSvg = target.attr('href').split('#')[1]
        target.attr('href', target.attr('href').replace(targetSvg,coinSvg))
    })
    selectCryptoToggle()
}

// settings - contry select box
const selectContryToggle = ()=>{
    $('.select_contry').toggleClass('open')
    const select = document.querySelectorAll('.custom_select .open');
    $(document).on('click', (event) => {
        if (!$(event.target).closest('.select_contry').length) {
            $('.select_contry').removeClass('open');
        }
    }); 
}

const getSelectedList = (countryName) => {
    document.querySelector('.custom_select .name').innerHTML = countryName;
}

// settings - phone number select box
const selectPhoneToggle = ()=>{
    $('.select_contryNum').toggleClass('open')
    $(document).on('click', (event) => {
        if (!$(event.target).closest('.select_contryNum').length) {
            $('.select_contryNum').removeClass('open');
        }
    });
}

const getSelectedNumber = (contryNumber) => {
    document.querySelector('.custom_select .number').innerHTML = contryNumber;
}

// settings - activity filter button
const toggleFilter = () => {
    let filterBtn = document.querySelector('.filterBtn');
    // let textValue = document.querySelector('.mainSpan').innerHTML;
    filterBtn.classList.toggle('toggleOn');

    document.querySelector('.filter_cont').classList.toggle('hide')
    
}
const selectActivityMain = () => {
    if($('.select_mainFilter').hasClass('open')){
        $('.select_mainFilter .arrow').css({ transform: 'rotate(0deg)' });
        $('.select_mainFilter').removeClass('open');
    }else {
        $('.select_mainFilter').addClass('open');
        $('.select_mainFilter .arrow').css({ transform: 'rotate(180deg)' });
    }
    $(document).on('click', (event) => {
        if (!$(event.target).closest('.select_mainFilter').length) {
            $('.select_mainFilter').removeClass('open');
            $('.select_mainFilter .arrow').css({ transform: 'rotate(0deg)' });
        }
    });
}
const getActivityMain = (mainList) => {
    document.querySelectorAll('.filter_cont > div').forEach(function(item){
        if(item.getAttribute('data-filter') == mainList){
            item.classList.remove('hide')
        }else{
            item.classList.add('hide')
        }
    })
    // 버튼 초기화
    document.querySelector('.filterBtn').classList.remove('toggleOn')
    document.querySelector('.filter_cont').classList.add('hide')

    // 텍스트 변경 data-content 없으면 data-filter 문구 보이게, 있으면 data-content 문구 보이게



}

const selectActivityGame = ()=>{
    if($('.select_gameFilter').hasClass('open')){
        $('.select_gameFilter .arrow').css({ transform: 'rotate(0deg)' });
        $('.select_gameFilter').removeClass('open');
    }else {
        $('.select_gameFilter').addClass('open');
        $('.select_gameFilter .arrow').css({ transform: 'rotate(180deg)' });
    }
    $(document).on('click', (event) => {
        if (!$(event.target).closest('.select_gameFilter').length) {
            $('.select_gameFilter').removeClass('open');
            $('.select_gameFilter .arrow').css({ transform: 'rotate(0deg)' });
        }
    });
}
const selectActivityCurrency_bets = ()=>{
    if($('.select_currencyFilter').hasClass('open')){
        $('.select_currencyFilter .arrow').css({ transform: 'rotate(0deg)' });
        $('.select_currencyFilter').removeClass('open');
    }else {
        $('.select_currencyFilter').addClass('open');
        $('.select_currencyFilter .arrow').css({ transform: 'rotate(180deg)' });
    }
    $(document).on('click', (event) => {
        if (!$(event.target).closest('.select_currencyFilter').length) {
            $('.select_currencyFilter').removeClass('open');
            $('.select_currencyFilter .arrow').css({ transform: 'rotate(0deg)' });
        }
    });
}
const getActivityCurrency = (currencyList) => {
    document.querySelector('.custom_select .currencySpan').innerHTML = currencyList;
}
const selectActivityType = () => {
    if($('.select_typeFilter').hasClass('open')){
        $('.select_typeFilter .arrow').css({ transform: 'rotate(0deg)' });
        $('.select_typeFilter').removeClass('open');
    }else {
        $('.select_typeFilter').addClass('open');
        $('.select_typeFilter .arrow').css({ transform: 'rotate(180deg)' });
    }
    $(document).on('click', (event) => {
        if (!$(event.target).closest('.select_typeFilter').length) {
            $('.select_typeFilter').removeClass('open');
            $('.select_typeFilter .arrow').css({ transform: 'rotate(0deg)' });
        }
    });
}
const getActivityType = (typeList) => {
    document.querySelector('.custom_select .typeSpan').innerHTML = typeList;
}
const selectActivityCurrency_transactions = ()=>{
    if($('.select_currencyFilter2').hasClass('open')){
        $('.select_currencyFilter2 .arrow').css({ transform: 'rotate(0deg)' });
        $('.select_currencyFilter2').removeClass('open');
    }else {
        $('.select_currencyFilter2').addClass('open');
        $('.select_currencyFilter2 .arrow').css({ transform: 'rotate(180deg)' });
    }
    $(document).on('click', (event) => {
        if (!$(event.target).closest('.select_currencyFilter2').length) {
            $('.select_currencyFilter2').removeClass('open');
            $('.select_currencyFilter2 .arrow').css({ transform: 'rotate(0deg)' });
        }
    });
}
const getActivityCurrency2 = (currencyList) => {
    document.querySelector('.custom_select .currencySpan2').innerHTML = currencyList;
}
const selectActivityCurrency_sport = ()=>{
    if($('.select_currencyFilter3').hasClass('open')){
        $('.select_currencyFilter3 .arrow').css({ transform: 'rotate(0deg)' });
        $('.select_currencyFilter3').removeClass('open');
    }else {
        $('.select_currencyFilter3').addClass('open');
        $('.select_currencyFilter3 .arrow').css({ transform: 'rotate(180deg)' });
    }
    $(document).on('click', (event) => {
        if (!$(event.target).closest('.select_currencyFilter3').length) {
            $('.select_currencyFilter3').removeClass('open');
            $('.select_currencyFilter3 .arrow').css({ transform: 'rotate(0deg)' });
        }
    });
}
const getActivityCurrency3 = (currencyList) => {
    document.querySelector('.custom_select .currencySpan3').innerHTML = currencyList;
}
// account info select box
const selectAccount_lang = ()=>{
    if($('.select_lang').hasClass('open')){
        $('.select_lang .arrow').css({ transform: 'rotate(0deg)' });
        $('.select_lang').removeClass('open');
    }else {
        $('.select_lang').addClass('open');
        $('.select_lang .arrow').css({ transform: 'rotate(180deg)' });
    }
    $(document).on('click', (event) => {
        if (!$(event.target).closest('.select_lang').length) {
            $('.select_lang').removeClass('open');
            $('.select_lang .arrow').css({ transform: 'rotate(0deg)' });
        }
    });
}
const getAccountLangue = (langueList) => {
    document.querySelector('.custom_select .langSpan').innerHTML = langueList;
}
const selectAccount_preferred = ()=>{
    if($('.select_preferred').hasClass('open')){
        $('.select_preferred .arrow').css({ transform: 'rotate(0deg)' });
        $('.select_preferred').removeClass('open');
    }else {
        $('.select_preferred').addClass('open');
        $('.select_preferred .arrow').css({ transform: 'rotate(180deg)' });
    }
    $(document).on('click', (event) => {
        if (!$(event.target).closest('.select_preferred').length) {
            $('.select_preferred').removeClass('open');
            $('.select_preferred .arrow').css({ transform: 'rotate(0deg)' });
        }
    });
}
const getAccountPreferred = (preferredList) => {
    document.querySelector('.custom_select .preferredSpan').innerHTML = preferredList;
}

// betBtn 토글
const betBtnToggle = (item)=>{
    $(item).toggleClass('btn-active')
}

//balances-Hide 0 balances 토글
const toggle_hidden = ()=>{
    let toggleValue = document.querySelector('#display_infiat').checked ? 'on':'off';
    let totalBalances = document.querySelectorAll('.total_value');
    const mediaQuery = window.matchMedia('(min-width: 768px)');

    if (toggleValue=='on'){
        for(let i=0; i<totalBalances.length; i++){
            // hide 토글 ON
            if(totalBalances[i].parentNode.innerText.trim() == '0.00000000'){
                totalBalances[i].parentNode.parentNode.style.display='none';
            }else if(totalBalances[i].nextElementSibling.innerText.trim() == '0.00000000'){
                totalBalances[i].parentNode.parentNode.style.display='none';
            }
        }
    }else if(toggleValue=='off'){
        for(let i=0; i<totalBalances.length; i++){
            // hide 토글 OFF
            if(totalBalances[i].parentNode.innerText.trim() !== '0.00000000'){
                totalBalances[i].parentNode.parentNode.style.display = mediaQuery.matches ? 'table-row' : 'grid';
            }
        }
    }
}


// sport 베팅상세 보이기
const openSportItem = (item)=>{
    let sportItem = $(item).parents('.sport_item');

    $('.sport_item').each(function(){
        if(sportItem.data('num') != $(this).data('num')){
            $(this).removeClass('open active')
            $(this).find('.open_arrow').removeClass('rotate-180');
        }
    })
        
    if(sportItem.hasClass('active')){
        sportItem.removeClass('open active');
        $(item).find('svg').removeClass('rotate-180');
    }else{
        sportItem.addClass('open active');
        $(item).find('svg').addClass('rotate-180');
    }
}


// sport 배팅슬립 
const sportsBetSlip = ()=>{
    $('.sports_betslip').toggleClass('open')
    $('.sports_betslip .betslip_cont').slideToggle();
}

// betslip > odds setting 버튼
const oddSetting = ()=>{
    $('.sports_betslip .odd_setting').toggleClass('open');
}

// betslip > quickbet
const quickBet = (item)=>{
    if($(item).prop('checked')){
        $(item).parents('.sports_betslip').addClass('quick_bet')
    }else{
        $(item).parents('.sports_betslip').removeClass('quick_bet')
    }
}

// sport topmenu active 
const sportTopMenu = (item)=>{
    $('.sports_topmenu a').each(function(){
        if($(this).attr('title') == item){
            $(this).removeClass('opacity-50')
        }else{
            $(this).addClass('opacity-50')
        }
    })
}

// custom_accordion
const accordionToggle = (item)=>{
    $(item).parent('.custom_accordion').toggleClass('open')
    $(item).next('.cont').slideToggle();
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
            itemSpeed = $(this).attr('data-speed') ? $(this).attr('data-speed') : 1000;
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
            speed : itemSpeed,
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
        let idx = index + 100
        $(this).addClass('num'+idx);		
        let xlpcItemPer = $(this).data('xl') ? $(this).data('xl') : 1,
            pcItemPer = $(this).data('lg') ? $(this).data('lg') : xlpcItemPer,
            taItemPer = $(this).data('md') ? $(this).data('md') : pcItemPer,
            moItemPer = $(this).data('mo') ? $(this).data('mo') : 1,
            itemGap = $(this).data('gap') ? $(this).data('gap') : 0,
            itemGroup = $(this).data('group') ?$(this).data('group') : 1,
            slideLoop = $(this).data('loop') == true ? true : false ;
        
        var casinoswiper = new Swiper( '.casinoSwiper.num' + idx + ' .swiper-container', {
            spaceBetween: parseInt(itemGap),
            slidesPerView : moItemPer,
            slidesPerGroup : itemGroup,
            loop: slideLoop,

            breakpoints: {
                767: {
                  slidesPerView: taItemPer,
                },
                1020: {
                  slidesPerView: pcItemPer,
                },
                1365: {
                  slidesPerView: xlpcItemPer,
                }
            },
            navigation: {
                nextEl: '.casinoSwiper.num' + idx + ' .next',
                prevEl: '.casinoSwiper.num' + idx + ' .prev'
            },

        });
    })

    // custom_select 버튼 클릭
    $('.custom_select > button').on('click',function(){
        let Parents = $(this).parents('.custom_select');
        if(Parents.hasClass('open')){
            Parents.removeClass('open')
        }else{
            Parents.addClass('open')
        }
    });

    // custom_select option 클릭
    $('.custom_select > div li').on('click',function(){
        let Parents = $(this).parents('.custom_select');
        let text = $(this).find('p').html();

        // option 닫기
        Parents.removeClass('open')
        Parents.find('> button p').html(text);
    })
    // custom_select 외의 영역 선택했을 시 닫기 
    document.addEventListener('click',(e)=>{
        const select = document.querySelectorAll('.custom_select.open')

        select.forEach((item)=>{
            if(item && !item.contains(e.target)){
                item.classList.remove('open')
            }
        })
    })

    // 모달 배경 클릭시 body overflow-hidden 클래스 빼기
    $('body').on('click',function(e){
        if($(e.target).hasClass('modal')){
            modalClose(e.target.id);
        }
    });

    // 스포츠 아이템
    $('.sport_item').each(function(index){
        $(this).attr('data-num',index)
    });

    // sport_item 외의 영역 선택했을 시 닫기
    document.addEventListener('click',(e)=>{
        const sport = document.querySelectorAll('.sport_item.open')

        sport.forEach((item)=>{
            if(item && !item.contains(e.target)){
                item.classList.remove('open')
                item.classList.remove('active')
                item.querySelector('.open_arrow').classList.remove('rotate-180')
            }
        })
    });

  
}