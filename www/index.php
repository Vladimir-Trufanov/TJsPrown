<?php
// PHP7/HTML5, EDGE/CHROME                                *** ProbaTest.php ***

// ****************************************************************************
// * DoorTry                                   Заготовка для пробной страницы *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 07.12.2019

// Инициализируем корневой каталог сайта, надсайтовый каталог и каталог хостинга
$SiteRoot=$_SERVER['DOCUMENT_ROOT'];
require_once $SiteRoot."/iGetAbove.php";
$SiteAbove = iGetAbove($SiteRoot);      // Надсайтовый каталог
$SiteHost = iGetAbove($SiteAbove);      // Каталог хостинга

// https://qunitjs.com/

?>

<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <title>Проба QUnit</title>
      <link rel="stylesheet" href="qunit-2.9.2.css">
      <script src="qunit-2.9.2.js" ></script> 
   <script>
   
   
   // Найти ссылки с title атрибутами, используя эти заголовки для отображения, 
   // когда что-то было опубликовано, в виде относительного значения времени, 
   // например «5 дней назад»:
   
   // Первый вариант:
   // Если вы запустите этот пример, вы увидите проблему: ни одна из дат не будет заменена. 
   // Код работает, хотя. Он просматривает все якоря на странице и проверяет title 
   // свойство каждого из них. Если он есть, он передает его prettyDate функции. 
   // Если prettyDate возвращает результат, он обновляет innerHTML ссылку с результатом.
   function prettyDate1(time)
   {
      var date = new Date(time || "");
      var diff = (((new Date()).getTime() - date.getTime()) / 1000);
      var day_diff = Math.floor(diff / 86400);
      if ( isNaN(day_diff) || day_diff < 0 || day_diff >= 31 ) return;
      return 
         day_diff == 0 && 
         (
            diff < 60  && "just now"     ||
            diff < 120 && "1 minute ago" ||
            diff < 3600 && Math.floor( diff / 60 ) + " minutes ago" ||
            diff < 7200 && "1 hour ago"  ||
            diff < 86400 && Math.floor( diff / 3600 ) + " hours ago"
         ) ||
         day_diff == 1 && "Yesterday" ||
         day_diff < 7 && day_diff + " days ago" ||
         day_diff < 31 && Math.ceil( day_diff / 7 ) + " weeks ago";
   }
   // Второй вариант:
   // Проблема первого варианта в том, что для любой даты старше 31 дня prettyDate
   // просто возвращается неопределенное (неявно, с одним return оператором), 
   // оставляя текст привязки как есть. Итак, чтобы увидеть, что должно произойти, 
   // мы можем жестко закодировать «текущую» дату:
   function prettyDate2(now,time)
   {
      var date = new Date(time || "");                                    console.log(date); 
      var diff = (((new Date(now)).getTime() - date.getTime()) / 1000);   console.log(diff);
      var day_diff = Math.floor(diff / 86400);                            console.log('day_diff='+day_diff);
      
      if ( isNaN(day_diff) || day_diff < 0 || day_diff >= 31 ) return;
      return 
         day_diff == 0 && 
         (
            diff < 60  && "just now"     ||
            diff < 120 && "1 minute ago" ||
            diff < 3600 && Math.floor( diff / 60 ) + " minutes ago" ||
            diff < 7200 && "1 hour ago"  ||
            diff < 86400 && Math.floor( diff / 3600 ) + " hours ago"
         ) ||
         day_diff == 1 && "Yesterday" ||
         day_diff < 7 && day_diff + " days ago" ||
         day_diff < 31 && Math.ceil( day_diff / 7 ) + " weeks ago";
   }

   
   // Найти ссылки с title атрибутами, используя эти заголовки для отображения, 
   // когда что-то было опубликовано, в виде относительного значения времени, 
   // например «5 дней назад»:
   /*
   window.onload = function() 
   {
      console.log('beg');
      var links = document.getElementsByTagName("a");
      for ( var i = 0; i < links.length; i++ ) 
      {
         if ( links[i].title ) 
         {
            // var date = prettyDate1(links[i].title);
            var date = prettyDate2("2008-01-28T22:25:00Z",links[i].title);
            if ( date ) 
            {
               links[i].innerHTML = date;
            }
         }
      }
      console.log('end');
   };
   */
   function trima(text) 
   {
      return (text || "").replace(/^\s+|\s+$/g, "");
   }

   </script>
</head>
 <body>
  Тукст до тестов
  
  <script>
   QUnit.test('trima()', function (assert) 
   {
      //assert.equals(trim(''), '', 'Пустая строка');
      //ok(trim('   ') === '', 'Строка из пробельных символов');
      //same(trim(), '', 'Без параметра');
      assert.equal(trima(' x'), 'x', 'Начальные пробелы');
      /*assert.equals(trim('x '), 'x', 'Концевые пробелы');
      assert.equals(trim(' x '), 'x', 'Пробелы с обоих концов');
      assert.equals(trim('    x  '), 'x', 'Табы');
      assert.equals(trim('    x   y  '), 'x   y', 'Табы и пробелы внутри строки не трогаем');*/
   });
   /*
   QUnit.test('trima()', function (assert) 
   {
      assert.equal(trim(''), '', 'Пустая строка');
      assert.ok(trim('   ') === '', 'Строка из пробельных символов');
      assert.same(trim(), '', 'Без параметра');
      assert.equal(trima(' x'), 'x', 'Начальные пробелы');
      */
      /*assert.equals(trim('x '), 'x', 'Концевые пробелы');
      assert.equals(trim(' x '), 'x', 'Пробелы с обоих концов');
      assert.equals(trim('    x  '), 'x', 'Табы');
      assert.equals(trim('    x   y  '), 'x   y', 'Табы и пробелы внутри строки не трогаем');*/
   //});
   
   // Let's test this function
function isEven(val) {
    return val % 2 === 0;
}
 

QUnit.test('isEven()', function(assert) {
    assert.ok(isEven(0), 'Zero is an even number');
    assert.ok(isEven(2), 'So is two');
    assert.ok(isEven(-4), 'So is negative four');
    assert.ok(!isEven(1), 'One is not an even number');
    assert.ok(!isEven(-7), 'Neither does negative seven');
 
    // Fails
    //assert.ok(isEven(3), 'Three is an even number');
})
   
 
   
  </script>

<!-- 
<h1 id="qunit-header">Заголовок страницы</h1>
<h2 id="qunit-banner"></h2>
<div id="qunit-testrunner-toolbar">Панель инструментов</div>
<h2 id="qunit-userAgent">UserAgent</h2>
<div id="qunit"></div>
<ol id="qunit-tests"></ol>
-->  
<!-- 
Делаем общий вывод прохождения тестов
в следующей последовательности: 
   а) заголовок страницы;
   б) разделитель (если он не был вызван ранее, в остальных случаях 
      без <div id="qunit"></div> тоже выводится один раз);    
   в) панель инструментов (если она не была вызвана отдельно);    
   г) UserAgent (если он не был вызван отдельно); 
   д) По клику на числе проверок в тесте, разворачивается список проверок   
<div id="qunit"></div>
-->
<div id="qunit"></div>
 Привет! 
 </body>
</html>


<?php
/*
   <!-- 
      <link rel="stylesheet" href="https://code.jquery.com/qunit/qunit-2.9.2.css">
      <script src="https://code.jquery.com/qunit/qunit-2.9.2.js" ></script> 
   -->
*/
// <!-- --> ************************************************* ProbaTest.php ***
