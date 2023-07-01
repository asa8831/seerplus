jQuery(function ($) {
  $('.hambtn,.nav li a').click(function () {
    $('.hambtn,.nav').toggleClass('active');
  });

  const headerHeight = $(".header").height();
  const adjustHight = 50;

  // ページ外スムーススクロール
  const hash = location.hash;
  if (hash) {
    $("html, body").stop().scrollTop(0);
    setTimeout(function () {
      const target = $(hash),
        position = target.offset().top - headerHeight - adjustHight;
      $("html, body").animate({ scrollTop: position }, 600, "swing");
    });
  }

  // ページ内リンク
  $(document).on("click", 'a[href^="#"]', function () {
    //クリック部分のハッシュを取得
    const inHash = this.hash;
    if ($(inHash)[0]) {
      var positionIn = $(inHash).offset().top - headerHeight - adjustHight;
      $('html,body').animate({
        scrollTop: positionIn
      }, 600, "swing");
    }
  });
});

// gsap 
window.addEventListener('DOMContentLoaded', function () {
  let element = document.getElementsByTagName('body');

  if (element[0].classList.contains('top')) {
    //TOPのみ
    gsap.fromTo('.youtube .video_wrapper', { clipPath: 'inset(0 100% 0 0)' }, {
      duration: 1.5, clipPath: 'inset(0 0% 0 0)', ease: 'power4.inOut',
      scrollTrigger: {
        trigger: '.youtube .video_wrapper',
        start: 'top 80%',
      }
    });
    gsap.to('.event .btn a', {
      background: '#1E1E1E', color: '#fff', duration: .8,
      scrollTrigger: {
        trigger: '.event .btn a',
        start: 'top bottom',
        // markers: true,
      }
    });
  }

  const mm = gsap.matchMedia();
  if (element[0].classList.contains('top') || element[0].classList.contains('archive')) {
    // 下からふわっとTOPとアーカイブ
    mm.add('(min-width: 769px)', function () {
      // pc
      gsap.fromTo('.music_list .lists .item', { autoAlpha: 0, y: 30 }, {
        autoAlpha: 1, y: 0, stagger: .3, ease: 'power2.out',
        scrollTrigger: {
          trigger: '.music_list .lists',
          start: 'top 80%',
        }
      });

    });

    mm.add('(max-width: 768px)', function () {
      // sp
      const items = document.querySelectorAll('.music_list .lists .item')
      items.forEach((item) => {
        gsap.fromTo(item, { autoAlpha: 0, y: 30 }, {
          autoAlpha: 1, y: 0, stagger: .3, ease: 'power2.out',
          scrollTrigger: {
            trigger: item,
            start: 'center bottom',
          }
        });
      });
    });
  }

  if (element[0].classList.contains('single')) {
    gsap.to('.tw_share', {
      background: '#1E1E1E', color: '#fff', duration: .8,
      scrollTrigger: {
        trigger: '.tw_share',
        start: 'top 70%',
        // markers: true,
      }
    });
    gsap.to('.tw_share img', {
      duration: .8, filter: 'brightness(0) invert(1)',
      scrollTrigger: {
        trigger: '.tw_share',
        start: 'top 70%',
        // markers: true,
      }
    });
  }

  // アンドロイドのみアニメーションがずれるので対策
  if (navigator.userAgent.indexOf('Android') > 0) {
    let andBody = document.getElementsByTagName('body')[0];
    andBody.classList.add('js_android');
  } else if (navigator.userAgent.indexOf('iPhone') > 0) {
    let andBody = document.getElementsByTagName('body')[0];
    andBody.classList.add('js_iphone');
  }
});
