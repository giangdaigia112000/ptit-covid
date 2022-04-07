var searchtiem = document.getElementById("search-dstiem");

function search1() {
    var filter, table, tr, td, i;
    filter = searchtiem.value.toUpperCase();
    table = document.getElementById("dstiem");
    tr = table.getElementsByTagName("tr");
    if (filter) {
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}
searchtiem.addEventListener("keyup", search1);