<?php
@ob_start();
session_start();
  include('config.php');
?>     
<!DOCTYPE html>
<html lang="ru"> <!-- Создание русскоязычной страницы --> 
  <head>
    <meta charset="UTF-8"> <!-- Подключение кодирочки  --> 
    <link rel="stylesheet" href="other/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Philosopher&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
    </style>
    <title>Создание контурного изображения</title>   
  </head>  
  <body class="body_index is-grid"> 
    <div class="wrapper"> 
<!-- Меню навигации -->
      <div class="nav"> 
        <?php
            if (isset($_SESSION['user'])) { //Если сессия пользователя началась
              echo "<a class='welcome_text'>Добро пожаловать, ".$_SESSION['username']."</a>";
              echo "<a class='nav_menu' href='out.php'>Выход</a>";
            } else { 
                echo "<a class='nav_menu' href='login.php'>Вход</a>";
                echo "<a class='nav_menu' href='registration.php'>Регистрация</a>";
            }    
          ?>
        <p class="nav_menu_1">Контурное изображение из фотографии</p>
      </div>
<!-- Секция с картинкой -->
      <div class="container_slider_css">
        <img class="photo_slider_css"  src="other/img/cotnainer/1.jpg" alt="1">
        <img class="photo_slider_css"  src="other/img/cotnainer/2.jpg" alt="2">
        <img class="photo_slider_css"  src="other/img/cotnainer/3.jpg" alt="3">
        <img class="photo_slider_css"  src="other/img/cotnainer/4.jpg" alt="4">
            <p class="text_container">Контурный рисунок — художественный прием, используемый в области искусства, с помощью которого художник строит очертания изображаемого объекта, используя линии. 
            Цель контурного рисунка — подчеркнуть основную массу и объём, а не мелкие детали. 
            Поскольку контур также может передавать трехмерную перспективу, длина и ширина линий важны, так же как толщина и глубина: не все контуры существуют только вдоль границ изображаемого объекта. 
            Этот художественный прием представлен в различных техниках и практикуется в процессе изучения и развития навыков изобразительного искусства.<br><br>
            Контурное изображение является важной изобразительной техникой в области искусства, поскольку контур — это прочный фундамент для любой графической или живописной работы; он может потенциально изменить форму изображаемого объекта путем вариации линии.<br><br>
            Цель контурного рисунка — запечатлеть какой-либо момент или действие в наблюдаемой жизни или быть способом выражения характерных черт объекта. 
            Прием получил широкое признание среди художественных школ, институтов и колледжей в качестве эффективного учебного пособия и дисциплины для начинающих художников. 
            В руках талантливого мастера линия, которая передает контур, может доставить невероятное визуальное наслаждение, подобно знаменитой голубке Пикассо, получившей всеобщее признание.</p>
      </div>
      <hr>
<!-- Инструкция по использованию сайта -->
      <div class="manual"> 
        <h3 class="text">Краткая инструкция</h3>
          <ul>
            <li>Шаг 1. Для начала работы зарегистрируйстесь или войдите в учетную запись на сайте в начале страницы.</li>
            <li>Шаг 2. Нажмите кнопку "Загрузить фотографию", в открывшемся окне выберите фотографию, затем нажмите "Открыть" и дождитесь загрузки изображения на сайт.</li>
            <li>Шаг 3. После загрузки фотографии выберите один из фильтров и нажмите на кнопку, дождитесь применения фильтра.</li>
            <li>Шаг 4. Когда фильтр будет наложен на фотографию нажмите "Скачать изображение". Готовая фотография будет сохранена в "Загрузки" под исходным названием с суффиксом "-изменено".</li>
          </ul>  
        </div>
      <hr>
<!-- Форма обработки фото вся -->
      <div class="foto_edit"> 
        <div class="preview-wrapper">
          <canvas id="canvas"></canvas>
          <p class="process-message"></p>
        </div>
<!-- Кнопки -->
        <div class="editor-buttons"> 
          <button id="sincity-btn">Черно-белый контур</button>
          <button id="grungy-btn">Цветной контур</button>
          <button id="pinhole-btn">Черно-белое</button>
        </div>
        <div class="edit-btn">
          <input class="open-button" type="file" id="upload-file" placeholder="Upload a Picture">
          <label for="upload-file">Загрузить фотографию</label>
          <button id="download-btn">Скачать изображение</button>
        </div>
      </div>
    <!-- Подключение функций JavaScript для взаимодействия JavaScript и HTML. -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
    <!-- Библиотека для работы с canvas, которая позволяет применять различные эффекты и фильтры на изображении. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/camanjs/4.1.2/caman.full.min.js" integrity="sha512-JjFeUD2H//RHt+DjVf1BTuy1X5ZPtMl0svQ3RopX641DWoSilJ89LsFGq4Sw/6BSBfULqUW/CfnVopV5CfvRXA==" crossorigin="anonymous"></script> 
    <!-- Подключение файла для редактирования -->
    <script src="js.js"></script> 
  </body>  
      <footer>
        <div>
          <p class="text_footer">Автор сайта Старцева Ульяна 18спи1</p>
        </div>
      </footer>
    </div> 
</html>