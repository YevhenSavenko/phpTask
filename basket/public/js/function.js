function checkElements(){
    const modal = document.querySelector('.catalog__modal');

    if(modal !== null){
        const removeClass = 'modal__show';
        const addClass = 'modal__hide';

        hideModal(modal, removeClass, addClass);
    } 
}

function hideModal(tag, remove, add){
    setTimeout(() => {
        tag.classList.add(add);
        tag.classList.remove(remove);
    }, 2000);
}

function incrementNumber(num){
    return num+1;
}

function decrementNumber(num){
    if(num === 1 || num < 1){
        return num;
    }

    return num-1;
}

function addHandlers(){
    const wrappers = document.querySelectorAll('.cart__quantity-wrapper');

    if(wrappers != null){
        const inputs = document.querySelectorAll('.cart__info-quantity input');

        wrappers.forEach((item, index) => {
            item.addEventListener('click', (e) => {
                let number = inputs[index].value;
                number = parseInt(number);

                if(e.target.className === 'cart__plus'){
                    number = incrementNumber(number);
                }

                if(e.target.className === 'cart__minus'){
                    number = decrementNumber(number);
                }

                inputs[index].value = number;
            });
        });
    }
}