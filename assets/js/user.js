const toggleBtn1 = document.getElementById('navbar-toggler-1');
const navDiv1 = document.querySelector('.collaspe1');
toggleBtn1.addEventListener('click', function(){
    navDiv1.classList.toggle('show1');
    if(toggleBtn1.firstElementChild.className = "far fa-user"){
        toggleBtn1.firstElementChild.className = "far fa-user";
    }else
    { 
        toggleBtn1.firstElementChild.className = "far fa-user";
    }
})