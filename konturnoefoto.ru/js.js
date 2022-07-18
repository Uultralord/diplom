jQuery(function($) {
var img = new Image(); //Создание переменной для хранения фото
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
var fileName = '';//Создание переменной имени файла
  $("#upload-file").on("change", function(){//Загрузка файла на сервер
      var file = document.querySelector('#upload-file').files[0];
      var reader = new FileReader();
      if (file) {
          fileName = file.name;//Запись имени файла в перемнную
          reader.readAsDataURL(file);
      }
      reader.addEventListener("load", function () {
          img = new Image();
          img.src = reader.result;
          img.onload = function () {
              canvas.width = img.width;//Изменение размера контейнера под изображение
              canvas.height = img.height;
              ctx.drawImage(img, 0, 0, img.width, img.height);//Вывод изображения на сервер
              $("#canvas").removeAttr("data-caman-id");//Удаление атрибута
          }
      }, false);
  });
  $('#download-btn').on('click', function (e) {
    var fileExtension = fileName.slice(-4);
    if (fileExtension == '.jpg' || fileExtension == '.png') {
        var actualName = fileName.substring(0, fileName.length - 4); //Удаление расширения файла из имени изображения
    }
    download(canvas, actualName + '-изменено.jpg');//Замена имени с суффиксом
  });

  $("#sincity-btn").on("click", function(e) {//Наложение фильтра
    Caman("#canvas", img, function() {
      this.sinCity().render();
    });
  });
  $("#pinhole-btn").on("click", function(e){//Наложение фильтра
    Caman("#canvas",img,function(){
        this.pinhole().render();
    });
  });
  $("#grungy-btn").on("click", function(e){//Наложение фильтра
    Caman("#canvas", img, function(){
        this.grungy().render();
    });
  }); 
  function download(canvas, filename) {//Скачивание файла
    var  e;
    var lnk = document.createElement('a'); 
    lnk.download = filename;
    lnk.href = canvas.toDataURL("image/jpeg", 0.8);
    if (document.createEvent) {
        e = document.createEvent("MouseEvents");
        e.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
        lnk.dispatchEvent(e);
    }
    else if (lnk.fireEvent) {
        lnk.fireEvent("onclick");
    }
  };
});