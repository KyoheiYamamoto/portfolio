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
            '#0bd', 'rgba(0,187,221,.5)', 'rgba(0,187,221,.2)'
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

});
