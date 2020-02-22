$(document).ready(function () {
    $('.slider').slick({
          dots: true,
          // アクセシビリティ。左右ボタンで画像の切り替えをできるかどうか
          autoplay: true,
         // 自動再生で切り替えをする時間
          autoplaySpeed: 1500,
          // 自動再生や左右の矢印でスライドするスピード
          speed: 1000,
          // 自動再生時にスライドのエリアにマウスオンで一時停止するかどうか
          pauseOnHover: true,
          // 自動再生時にドットにマウスオンで一時停止するかどうか
          pauseOnDotsHover: true,
      });
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
    $(function(){

      $('.sample').each(function(){

        var imgWidth = $(this).find('img').width();
        var imgHeight = $(this).find('img').height();

        aspectRatio = imgWidth / imgHeight

        if(aspectRatio >= 1){
          //横長画像の場合 divのheightに数値を合わせる
          $(this).find('img').css('height','200px');
        }else{
          //縦長画像の場合 divのwidthに数値を合わせる
          $(this).find('img').css('width','300px');

          //上下中央揃えにする場合はこれも
          var iHeight = $(this).find('img').height();
          var i = (iHeight-200)/2
          $(this).find('img').css('margin-top', '-'+i+'px');

        }

      });

    });

});
