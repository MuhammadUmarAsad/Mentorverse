function pkg(id) {
    var box = document.getElementById('package');
    var pack = box.options[box.selectedIndex].text;

    $.ajax({
        type: 'POST',
        url: "/getPkg/" + id,
        data: '_token = <?php echo csrf_token(); ?>',
        success: function(data) {
            pr = document.getElementById('price');
            pr.innerHTML = data.PR.price[0].price;
            //console.log(data.PR.price[0].price);
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    })
}

$( document ).ready(function(){
    var box = document.getElementById('package');
        var pack = box.options[box.selectedIndex].text;
    if(pack == "1 Hour"){
        id = 1;
    }
    else if(pack == "5 Hours"){
        id = 2;
    }
    else if(pack == "20 Hours"){
        id = 3;
    }

    $.ajax({
        type: 'POST',
        url: "/getPkg/" + id,
        data: '_token = <?php echo csrf_token(); ?>',
        success: function(data) {
            pr = document.getElementById('price');
            pr.innerHTML = data.PR.price[0].price;
            //console.log(data.PR.price[0].price);
        },
        error: (error) => {
            console.log(JSON.stringify(error));
        }
    });
    });