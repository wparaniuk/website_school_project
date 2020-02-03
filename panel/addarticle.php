<? session_start(); if (isset($_SESSION['login_id']) and isset($_SESSION['login'])){ ?>

<script type="text/javascript" src="editor/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
  selector: "textarea",
  theme: "modern",
    width: "800",
  height: "200",
  plugins: [
  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
  "searchreplace wordcount visualblocks visualchars code fullscreen",
  "insertdatetime media nonbreaking save table contextmenu directionality",
  "emoticons template paste textcolor colorpicker textpattern imagetools"
  ],
  toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  toolbar2: "print preview media | forecolor backcolor emoticons",
  image_advtab: true,
});
</script>


<center><? include('menu.php'); ?></center><br>

   <form method="post" action="addsave.php">
	<center>Tytuł: <input name="title" id="title"><br>
	Tytuł w menu: <input name="title_menu" id="title_menu"><br>
	Krótka nazwa: <input name="name" id="name"><br>
	Treść: <textarea name="content" id="content"></textarea><br>
	<input class="button button1" type="submit" value="Zapisz"></center>
  </form>

<? } else { echo "Nie jestes zalogowany"; }?>