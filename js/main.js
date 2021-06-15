/* Init object fit polyfill */
/* To make it work, add 'font-family: 'object-fit: cover;';' to image */
// if (window.objectFitImages) {
//   window.objectFitImages();
// }

/* Init svg polyfill */
// if (window.svg4everybody) {
//   window.svg4everybody();
// }

$(document).ready(() => {
  // let resizeId;
  let wWidth = $(window).width();
  let navState = false;
  const $header = $('.page-header');
  let isObserver = true;
  let observer;
  let isTouch;

  //smooth scroll anchor tags
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
          e.preventDefault();

          document.querySelector(this.getAttribute('href')).scrollIntoView({
              behavior: 'smooth'
          });
      });
  });

  if (
    !('IntersectionObserver' in window) ||
    !('IntersectionObserverEntry' in window) ||
    !('isIntersecting' in window.IntersectionObserverEntry.prototype)
  ) {
    isObserver = false;
    $('html').removeClass('is-observer');
  }

  if (isObserver) {
    observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { rootMargin: '0px 0px -15% 0px' }
    );
  }

  function isTouchDevice() {
    const prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');
    const mq = (query) => {
      return window.matchMedia(query).matches;
    };

    if (
      'ontouchstart' in window ||
      // eslint-disable-next-line no-undef
      (window.DocumentTouch && document instanceof DocumentTouch)
    ) {
      return true;
    }

    // include the 'heartz' as a way to have a non matching MQ to help terminate the join
    // https://git.io/vznFH
    const query = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join(
      ''
    );
    return mq(query);
  }

  if (isTouchDevice()) {
    isTouch = true;
    $('html').addClass('is-touch');
  }

  // Returns a function, that, as long as it continues to be invoked, will not
  // be triggered. The function will be called after it stops being called for
  // N milliseconds. If `immediate` is passed, trigger the function on the
  // leading edge, instead of the trailing.
  function debounce(func, wait, immediate, ...args) {
    let timeout;
    return function () {
      const context = this;
      const later = function () {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      const callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }

  // function once(fn, context) {
  //   var result;

  //   return function() {
  //     if (fn) {
  //       result = fn.apply(context || this, arguments);
  //       fn = null;
  //     }

  //     return result;
  //   };
  // }

  // // Usage
  // var canOnlyFireOnce = once(function() {
  //   console.log('Fired!');
  // });

  function disableScrolling() {
    if ($(document).height() > $(window).height()) {
      const scrollTop = $('html').scrollTop()
        ? $('html').scrollTop()
        : $('body').scrollTop(); // Works for Chrome, Firefox, IE...
      $('html').addClass('disable-scrolling').css('top', -scrollTop);
    }
  }

  function enableScrolling() {
    const scrollTop = parseInt($('html').css('top'), 10);
    $('html').removeClass('disable-scrolling');
    $('html,body').scrollTop(-scrollTop);
  }

  function bindEvents() {
    $('.hamburger').on('click', () => {
      if (navState) {
        $header.removeClass('is-opened');
        enableScrolling();
      } else {
        $header.addClass('is-opened');
        disableScrolling();
      }

      navState = !navState;
    });

    // FOCUS STYLING
    // Let the document know when the mouse is being used
    document.body.addEventListener('mousedown', () => {
      document.body.classList.remove('is-tab');
    });

    // Re-enable focus styling when Tab is pressed
    document.body.addEventListener('keydown', (event) => {
      if (event.key === 'Tab') {
        document.body.classList.add('is-tab');
      }
    });
  }

  const doneResizing = debounce(() => {
    const width = $(window).width();

    if (wWidth !== width) {
      wWidth = width;
    }
  }, 500);

  function initPageBanner(){

    const $bannerCopy = $('.page-banner__inner p')
    let maxCount = $bannerCopy.length
    let count = 0
    let timer = parseFloat($('.page-banner').attr('data-time') * 1000)

    console.log(timer);


    $bannerCopy.first().addClass('active')
    setInterval(changeCopy, timer);

    function changeCopy(){

      //starts from zero index when reaches max length

      if(count > maxCount-2){
        $bannerCopy.first().addClass('active')
        $bannerCopy.eq(count).removeClass('active')
        count = 0;     
        
      }else{
        count ++;
        $bannerCopy.eq(count-1).removeClass('active')      
        $bannerCopy.eq(count).addClass('active')
      }    
    }
  }

  function initHeader(){
    const $hamburger = $('.header__hamburger')
    const $mobMenu = $('.header__mobile')   
    const $header = $('.header')
    const $headerNav = $('.header__nav')

    $hamburger.on('click', function(){

      if($hamburger.hasClass('active')){
        $mobMenu.removeClass('active')
        $hamburger.removeClass('active')

      }
      else{
        $hamburger.addClass('active')
        $mobMenu.addClass('active')

      }
    })

    var lastScrollTop = 0;
    $(window).scroll(function(event){
      var st = $(this).scrollTop();

      if(st > 10){
        $header.addClass('active')
      
      }
      else{
        $header.removeClass('active')       
      }

      if (st > lastScrollTop){
        $headerNav.removeClass('active')
        $('.animated-border--desktop-only').css('opacity', '0')

      } else {
        $headerNav.addClass('active') 
        if($(window).width() > 1000){
          $('.animated-border--desktop-only').delay(800 ).css('opacity', '1')
        }
      }
      lastScrollTop = st;
    });
  }

  function initFeaturedProduct(){
    const $right = $('.featured-products__right')
    const $left = $('.featured-products__left')


    $right.on('mouseenter', function(){
      $(this).find('.featured-products__image-show').hide()
      $(this).find('.featured-products__image-hidden').show()
    })

    $right.on('mouseleave', function(){
      $(this).find('.featured-products__image-show').show()
      $(this).find('.featured-products__image-hidden').hide()
    })

    $left.on('mouseenter', function(){
      $(this).find('.featured-products__image-show').hide()
      $(this).find('.featured-products__image-hidden').show()
    })

    $left.on('mouseleave', function(){
      $(this).find('.featured-products__image-show').show()
      $(this).find('.featured-products__image-hidden').hide()
    })
  }

  function initProductMain(){

    const $ingredientsBtn = $('.product-main__ingredients-title')

    $ingredientsBtn.on('click', function(){

      if ($('.product-main__ingredients-hidden').hasClass('active')) {
        $('.product-main__ingredients-hidden').removeClass('active')
        $('.product-main__ingredients-title svg').removeClass('active')
      }else{
        $('.product-main__ingredients-hidden').addClass('active')
        $('.product-main__ingredients-title svg').addClass('active')
      }
    })

    const swiper = new Swiper('.product-main__left', {
      loop: true,
      slidesPerView: 1,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      navigation: {
        prevEl: '.product-main .left',
        nextEl: '.product-main .right',
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
    });
  }

  function initProductExtras(){
    const $gridHeight = $('.product-extra__right-grid').height()

    const $accordian = $('.product-extra__accordian-title')

  

    if($(window).width() > 1023){
      $accordian.each(function(){
        $(this).css('height', `${$gridHeight / 3 - 0.65}px`)
      })
    }



    $accordian.on('click', function(){
      console.log(this);

      if ($(this).parent().find('.product-extra__accordian-hidden').hasClass('active')) {
        $(this).parent().find('.product-extra__accordian-hidden').removeClass('active')
        $(this).parent().find('.product-extra__accordian-title svg').removeClass('active')
      }else{
        $accordian.each(function(){
          $(this).parent().find('.product-extra__accordian-hidden').removeClass('active')
          $(this).parent().find('.product-extra__accordian-title svg').removeClass('active')
        })

        $(this).parent().find('.product-extra__accordian-hidden').addClass('active')
        $(this).parent().find('.product-extra__accordian-title svg').addClass('active')
      }

    })
  }

  function initDuoSelect(){
    const $btns = $('.js-duo-btn-select')

    if($(window).width() < 768){
      $btns.each(function(){
        console.log(this);
        if ($(this).hasClass('active')) {
          $(this).hide()
        }else{
          $(this).show()
        }
      })
    }

    $btns.on('click', function(){
      $btns.each(function(){$(this).removeClass('active')})
      $(this).addClass('active')

      if ($(this).attr('data-duo-select') == "levelup") {
        $('.page-wrap').removeClass('page-wrap--dark')
        $('.unwind-data').fadeOut("0", function () {
          $('.level-up-data').fadeIn("0");
      })
      }
      else{
        $('.page-wrap').addClass('page-wrap--dark')
        $('.level-up-data').fadeOut("0", function () {
          $('.unwind-data').fadeIn("0");
        });
      }

      if($(window).width() < 768){
        $btns.each(function(){
          console.log(this);
          if ($(this).hasClass('active')) {
            $(this).hide()
          }else{
            $(this).show()
          }
        })
      }
    })
  }

  function initSubscriptionBtns(){
    const $addForms = $('.add-to-cart-form')

    $('.btn-add-to-cart').on('click', function(e){
      e.preventDefault()

      document.location = window.location.href.split('?')[0]; 

      if($(this).attr('data-subscription-attr') == ""){
        var newURLString = window.location.href.split('?')[0] + 
        "?add-to-cart=" + $('.btn-add-to-cart').attr('data-product-id');
        document.location = newURLString;  
      }else{
        var newURLString = window.location.href.split('?')[0] + 
        "?add-to-cart=" + $('.btn-add-to-cart').attr('data-product-id') + "&convert_to_sub_" + $('.btn-add-to-cart').attr('data-product-id')  + "=" +  $(this).attr('data-subscription-attr') ;
          document.location = newURLString;  
      }
    })


    $('.subscription-btn').on('mouseenter', function(){
      $(this).parent().find('.add-to-cart-form__hidden-sub-info').addClass('active')
    })

    $('.subscription-btn').on('mouseleave', function(){
      $(this).parent().find('.add-to-cart-form__hidden-sub-info').removeClass('active')
    })




    $addForms.each(function(){
      let $subBtn = $(this).find('.subscription-btn')
      let $oneTimeBtn = $(this).find('.onetime-btn')
      let $addToCartBtn = $('.btn-add-to-cart')

      const $bundleForm = $('.js-bundle-form .btn-add-to-cart')
      const $bundleDummy = $('#bundle-dummy')

      $(this).find('.one-time-option input').prop( "checked", true );

      $oneTimeBtn.on('click', function(e){
        e.preventDefault()
        $(this).addClass('active')
        $subBtn.removeClass('active')
        // $(this).parent().parent().find('.one-time-option input').prop( "checked", true );
        $(this).parent().parent().find('.btn-add-to-cart').text('ADD TO CART');
        $(this).parent().parent().find('.btn-add-to-cart').attr('data-subscription-attr', "");

        // if($(this).hasClass('ontime-btn-bundle')){
        //   $bundleDummy.find('.one-time-option input').prop( "checked", true );
        // }
      })      

      $subBtn.on('click', function(e){
        e.preventDefault()
        $(this).addClass('active')
        $oneTimeBtn.removeClass('active')
        // $(this).parent().parent().find('.subscription-option input').prop( "checked", true );
        $(this).parent().parent().find('.btn-add-to-cart').text('SUBSCRIBE')
        $(this).attr('data-subscription-attr')
        $(this).parent().parent().find('.btn-add-to-cart').attr('data-subscription-attr', $(this).attr('data-subscription-attr'));


        // if($(this).hasClass('subscription-btn-bundle')){
        //   $bundleDummy.find('.subscription-option input').prop( "checked", true );
        // }
      })
    })

    const $bundleForm = $('.js-bundle-form .btn-add-to-cart')
    const $bundleDummy = $('#bundle-dummy')


    // $bundleForm.on('click', function(e){
    //   e.preventDefault()
    //   $(this).parent().submit()

    //   console.log('submited');

    //    $('.xoo-wsc-container').css("right", "-500px")


    //   setTimeout(function(){    
    //     $('.xoo-wsc-container').css("right", "0px")
    //     $bundleDummy.find('.btn-add-to-cart').click()      
    //   }, 2900);      
    // })
  }

  function initPageHero(){
    const $btn = $('.page-hero__scroll button');

    $btn.on('click', function(){
      var n = $('.sustainability-logos').position().top;
      $('html, body').animate({ scrollTop: n }, 500);
    })
  }
  
  function initContactFaq(){
    const $faqBtn = $('.js-faq-link')
    const $contactBtn = $('.js-contact-link')

    $faqBtn.on('click', function(){
      var n = $('.faqs__inner h1').position().top;
      $('html, body').animate({ scrollTop: n }, 500);
    })

    $contactBtn.on('click', function(){
      var n = $('.contact').position().top;
      $('html, body').animate({ scrollTop: n }, 500);
    })
  }

  function initSideCart(){
    const btn = $('.js-open-cart')
    const cartCount = $('.xoo-wsc-items-count').html()

    setTimeout(function(){ 
      const $closeCartBtn = $('.xoo-wsch-top')
      //console.log(cartCount);
  
      $closeCartBtn.on('click', function(){
        console.log('close');
        $('body').removeClass('xoo-wsc-cart-active"')
        $('.xoo-wsc-modal').removeClass('xoo-wsc-cart-active')
      })


     }, 2000);


    if (cartCount > 0) {
      btn.find('span').addClass('active').text(cartCount)
    }

    btn.on('click', function(e){
      e.preventDefault()
      $('body').addClass('xoo-wsc-cart-active"')
      $('.xoo-wsc-modal').addClass('xoo-wsc-cart-active')
    })
  }

  function initShopFly(){
    const $btn = $('.js-shop')

    $btn.on('click', function(){
      $('.shop-fly').addClass('active')
    })

    $('.shop-fly__close').on('click', function(){
      $('.shop-fly').removeClass('active')
    })

  }






  /* FUNCTION CALLS */
  /* ============= */
  bindEvents();
  initPageBanner()
  initHeader()
  initFeaturedProduct()
  initProductMain()
  initProductExtras()
  initDuoSelect()
  initSubscriptionBtns()
  initPageHero()
  initContactFaq()
  initShopFly()
  //initAjaxAddToCart()
 // initSideCart()

  if (isObserver) {
    $('.js-visibility').each((i, el) => {
      observer.observe(el);
    });
  }

  $(window).on('scroll', () => {});
  $(window).on('load', () => {});
  $(window).on('resize', doneResizing);
  $(window).on('resize', () => {
    //initProductExtras()
    initDuoSelect()
  });
});

  //sub
  //convert_to_sub_181=1_month&add-to-cart=181&action=xoo_wsc_add_to_cart

  //none
  //convert_to_sub_181=0&add-to-cart=181&action=xoo_wsc_add_to_cart


  //338



// (function ($) {

//   $(document).on('click', '.single_add_to_cart_button', function (e) {
//       e.preventDefault();

//       let self = this

//       console.log('ajax clicked');

//       var $thisbutton = $(this),
//               $form = $thisbutton.closest('form.cart'),
//               id = $thisbutton.val(),
//               product_qty = $form.find('input[name=quantity]').val() || 1,
//               product_id = $form.find('input[name=product_id]').val() || id,
//               variation_id = $form.find('input[name=variation_id]').val() || 0;

//       var data = {
//           action: 'woocommerce_ajax_add_to_cart',
//           product_id: product_id,
//           product_sku: '',
//           quantity: product_qty,
//           variation_id: variation_id,
//       };

//       $(document.body).trigger('adding_to_cart', [$thisbutton, data]);

//       $.ajax({
//           type: 'post',
//           url: wc_add_to_cart_params.ajax_url,
//           data: data,
//           beforeSend: function (response) {
//               $thisbutton.removeClass('added').addClass('loading');
//           },
//           complete: function (response) {
//               $thisbutton.addClass('added').removeClass('loading');
//           },
//           success: function (response) {

//             if($(self).hasClass('duo')){
//               console.log(this);
//               //$('#bundle-dummy').find('.one-time-option input').prop( "checked", true );
//               $('#bundle-dummy').find('.single_add_to_cart_button').click()
//               console.log("submited?");
//             }

//               if (response.error && response.product_url) {
//                   window.location = response.product_url;
//                   return;
//               } else {
//                   $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
//               }
//           },
//       });

//       return false;
//   });
// })(jQuery);