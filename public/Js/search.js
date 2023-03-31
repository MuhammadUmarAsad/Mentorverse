function myFunction(len) {
    var input, filter, ul, li, a, i, txtValue, x;
    input = document.getElementById("searchForm");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    // console.log(ul);
    li = ul.getElementsByClassName("li");
    // console.log(li);
    for (i = 0; i < len; i++) {
        a = li[i].getElementsByClassName("SingleCard")[0];
        txtValue = a.textContent || a.innerText;
        // console.log(txtValue);
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            x = document.getElementById(i);
            x.style.display = "";
        } else {
            li[i].style.display = "none";
            x = document.getElementById(i);
            x.style.display = "none";
        }
    }
}