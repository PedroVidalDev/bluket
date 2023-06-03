const menu = document.querySelector(".nav-list");

function show(){
    const menu = document.querySelector(".nav-list");

    if(menu.classList == 'nav-list'){
        menu.classList.add("active");
    }

    else{
        menu.classList.remove("active");
    }
}