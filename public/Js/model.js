function mod() {
  var box = document.getElementById('package');
  var pr = document.getElementById('price');
  var MD = document.getElementById('selectedPackage');
  var PR = document.getElementById('selectedPrice');

  var pack = box.options[box.selectedIndex].text;
  var price = pr.innerHTML;
  MD.innerHTML = pack;
  PR.innerHTML = price;

}

function course() {
  var box = document.getElementById('duration');
  var pr = document.getElementById('price');
  var MD = document.getElementById('selectedDuration');
  var PR = document.getElementById('selectedPrice');

  var pack = box.innerHTML;
  var price = pr.innerHTML;
  MD.innerHTML = pack;
  PR.innerHTML = price;
  document.getElementById('SPusingForm').value=price;
  console.log(document.getElementById('SPusingForm').value);

  $.ajax({
    
  })
}

