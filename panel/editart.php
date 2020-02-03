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

<center><? include('menu.php'); include('../base.php');?></center><br>
<?
 $edit = mysql_query("SELECT * FROM articles WHERE id LIKE '$_GET[id]'");
 while($show = mysql_fetch_array($edit)) {
?>
   <center><form method="post" action="saveart.php">
   <input name="id" hidden readonly id="id" value="<? echo $show[id];?>"><br>
  Tytuł: <input name="title" id="title" value="<? echo $show[title];?>"><br><br>
     Tytuł w menu: <input name="title_menu" id="title_menu" value="<? echo $show[title_menu];?>"><br><br>
     Krótka nazwa: <input name="name" id="name" value="<? echo $show[name];?>"><br><br>
     Treść: <textarea name="content" id="content"><? echo $show[content];?></textarea>
     <input class="button button1" type="submit" value="Zapisz">
  </form></center>

   <? }} else { echo "Nie jestes zalogowany"; }?>