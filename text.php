<!DOCTYPE html>
<html>
<body>

<input type="radio" name="colors" value="4" id="myRadio" onclick="myFunction()">Red color

<p>Click the "Try it" button to display the value of the value attribute of the radio button.</p>

<input type="number" value="1" max="" id="demo">

<script>
function myFunction() {
  var x = document.getElementById("myRadio").value;
  document.getElementById("demo").max = x;
}
</script>

</body>
</html>