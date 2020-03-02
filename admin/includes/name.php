
<SCRIPT LANGUAGE="JavaScript">
currentTime=new Date();
if(currentTime.getHours()<12)
document.write("<b>Buenos Dias </b>");
else if(currentTime.getHours()<17)
document.write("<b>Buenas Tardes </b>");
else 
document.write("<b>Buenas Noches </b>");
</SCRIPT>
<?php echo $_SESSION['users'].str_repeat('&nbsp;', 1).$_SESSION['surname']?>