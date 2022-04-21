const toggleBtn = document.getElementById('navbar-toggler');
const navDiv = document.querySelector('.collaspe');
toggleBtn.addEventListener('click', function(){
    navDiv.classList.toggle('show');
    if(toggleBtn.firstElementChild.className = "fas fa-bars"){
        toggleBtn.firstElementChild.className = "fas fa-bars";
    }else
    { 
        toggleBtn.firstElementChild.className = "fas fa-bars";
    }
})
/**User */


