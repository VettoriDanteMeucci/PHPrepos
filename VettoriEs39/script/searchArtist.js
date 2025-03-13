const search = document.getElementById("search");
const filter = document.querySelectorAll("#filter tr:not(tr:first-of-type)");

function filetrList(){
    let id = search.value;
    filter.forEach(item => 
        {
            if(id == item.getAttribute("data-artist")){
                item.classList.remove("d-none")
            }else{
                item.classList.add("d-none")
            }
        }
    )
}

search.addEventListener("input" , (e) => {filetrList()})