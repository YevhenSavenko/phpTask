let btn = document.querySelector('#btn-show');

if(btn !== null){
    btn.addEventListener('click', () => {
        makeRequest();

        const heightContent = document.querySelector('.content-tables').clientHeight;
        window.scrollBy({
            top: heightContent,
            left: 0,
            behavior: 'smooth'
        });

        btn.style.display = 'none';
    })
}



