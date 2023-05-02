sidebar = document.getElementById("sidebar")
btn_menu = document.getElementById("sb_btn")
btn_logoff = document.getElementById("lo_btn")
container = document.getElementById("container")
li = document.getElementsByTagName("li")

btn_menu.onclick = () => {
    sidebar.classList.toggle("active")
    container.classList.toggle("active")
    
    for(let i=0; i<li.length; i++){
        li[i].children[0].children[1].classList.toggle("active")
        li[i].children[0].children[0].classList.toggle("active")
        li[i].children[1].classList.toggle("activex")
    };
}

btn_logoff.onclick = () => {
    window.location.href = "../database/logout.php";
}