    <!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('a[rel="relativeanchor"]').click(function(){
      $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
      }, 500);
      return false;
    });
  });
  </script>
  <style media="screen">
  body { background-color: #000; color: #fff; }
  a { color: aqua; }
  </style>
</head>
<body>
  <body>
    <h1 id="top">How to make smooth scrolling.</h1>
    <a href="#mysection1" rel="relativeanchor">Section 1</a>
    <a href="#mysection2" rel="relativeanchor">Section 2</a>
    <div style="height: 1500px;">This requires jQuery. <a href="#top" rel="relativeanchor">Go Back to Top</a></div>
    <div id="mysection1">Section 1</div>
    <div style="height: 1500px;">This requires jQuery. <a href="#top" rel="relativeanchor">Go Back to Top</a></div>
    <div id="mysection2">Section 2</div>
    <a href="#top" rel="relativeanchor">Go Back to Top</a>
  </body>
</body>
</html>
