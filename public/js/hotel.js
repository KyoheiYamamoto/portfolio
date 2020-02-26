$(document).ready(function () {
    $('.slider').slick({
          dots: true,
          // アクセシビリティ。左右ボタンで画像の切り替えをできるかどうか
          autoplay: true,
         // 自動再生で切り替えをする時間
          autoplaySpeed: 1500,
          // 自動再生や左右の矢印でスライドするスピード
          speed: 1000,

      });
      //サイト修正
      $(function() {
      $('.autoplay').slick({
        autoplay: true,
      });
        var particles = Particles.init({
      selector: '.background',
    sizeVariations: 10,
    color: ['#00bbdd', '#404B69', '#DBEDF3'],
    connectParticles: true
 });
    });


});
