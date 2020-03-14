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
      window.onload = function() {
        Particles.init({
          selector: '.background',
          sizeVariations: 50,
          color: [
            '#FFFF66', 'rgba(0,187,221,.5)', 'rgba(0,187,221,.2)','#FFCCFF'
          ]
        });
      };
    });
    // getDataボタンが押された時の処理
    $('#getData').on('click', function(){

      // crop のデータを取得
      var data = $('#img').cropper('getData');

      // 切り抜きした画像のデータ
      // このデータを元にして画像の切り抜きが行われます
      var image = {
        width: Math.round(data.width),
        height: Math.round(data.height),
        x: Math.round(data.x),
        y: Math.round(data.y),
        _token: 'jf89ajtr234534829057835wjLA-SF_d8Z' // csrf用
      };

      // post 処理
      $.post('/cropper', image, function(res){
        // 成功すれば trueと表示されます
        console.log(res);
      });

    });
    //topページに戻る
    $(function() {
      var topBtn = $('#page-top');
      topBtn.hide();
      //スクロールが100に達したらボタン表示
      $(window).scroll(function () {
          if ($(this).scrollTop() > 1000) {
              topBtn.fadeIn();
          } else {
              topBtn.fadeOut();
          }
      });
      //スクロールしてトップ
      topBtn.click(function () {
          $('body,html').animate({
              scrollTop: 0
          }, 500);
          return false;
      });
    });

 //img#sampleの縦横比を調べる
    $(function(){
        var imgWidth = $('img#sample').width();　//img#sampleのwidthを調べてimgWidthに代入
        var imgHeight = $('img#sample').height();　//img#sampleのheightを調べてimgHeightに代入

          aspectRatio = imgWidth / imgHeight　//横幅÷縦幅の値をaspectRatioに代入

          if(aspectRatio >= 1){
            //横長画像の場合の処理（横幅÷縦幅が1以上になる場合）
          }else{
            //縦長画像の場合の処理
          }
    });
    
    $(function(){

      var imgWidth = $('.img-content').width();
      var imgHeight = $('.img-content').height();

      aspectRatio = imgWidth / imgHeight

      if(aspectRatio >= 1){
        //横長画像の場合 divのheightに数値を合わせる
        $('.img-content').css('height','400px');
      }else{
        //縦長画像の場合 divのwidthに数値を合わせる
        $('.img-content').css('width','600px');

        //上下中央揃えにする場合は下記2行も
        var i = (imgHeight-200)/2  //はみ出た部分を計算して÷2し、ネガティブマージンをつける
        $(this).find('img').css('margin-top', '-'+i+'px');

      }
  });
});
