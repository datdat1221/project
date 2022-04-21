const trigger_search = document.querySelector('.search_btn');
const input = document.querySelector('.keyword');

trigger_search.addEventListener('click', () =>{
  if (!input.classList.contains('keyword-open')){
    input.classList.add('keyword-open');
    trigger_search.innerHTML = "  <i class='fas fa-times'>  </i>";

  }
  else{

    input.classList.remove('ikeywordt-open');
    trigger_search.innerHTML="  <i class='fas fa-search'>  </i>";
  }



});
