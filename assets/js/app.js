//Sticky Nav bar Vars 
const stickyNav = document.querySelector('#navbar-head');

//Search above navbar vars
const searchNav = document.getElementById('searchBar');
const openSearchIco = document.getElementById('openSearch');
const closeSearchIco = document.getElementById('closeSearch');
let searchShow = false;
console.log(openSearchIco)

//sticky nav bar function 
window.addEventListener('scroll', () => {
    const scrollPosition = window.scrollY;
    if (scrollPosition > 5) {
        stickyNav.classList.add('sticky-top');
    } else {
        stickyNav.classList.remove('sticky-top');
    }
})


//Search above navbar function 

const showSearch = () => {
    if (searchShow == true) {
        searchNav.style.height = '50px';
    } else {
        searchNav.style.height = '0';
    }
}
// Click To Open The Search 
openSearchIco.addEventListener('click', () => {
    searchShow = true;
    showSearch();
})
// Click To Close The Search 
closeSearchIco.addEventListener('click', () => {
    searchShow = false;
    showSearch();
})