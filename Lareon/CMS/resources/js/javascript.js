const totpFieldEls = document.querySelectorAll('input.totpField');
const totpBtnEls = document.querySelector('#totpFieldSubmit');
totpFieldEls.forEach((el, index) => {
    el.addEventListener('keyup', e => {
            el.value = el.value.replace(/[^0-9]/g, '');
            if (el.value !== '') {
                totpFieldEls[index + 1]?.focus()
            } else if (totpFieldEls[index].value === '') {
                totpFieldEls[index].focus()
            }
            const allInputsHaveValue = Array.from(totpFieldEls).every(input => input.value.trim() !== '');
            if (allInputsHaveValue) {
                totpBtnEls.disabled=false;
                totpBtnEls.classList.remove('cursor-not-allowed');
                totpBtnEls.classList.add('cursor-pointer');
            }else{
                totpBtnEls.disabled=true;
                totpBtnEls.classList.add('cursor-not-allowed');
                totpBtnEls.classList.remove('cursor-pointer');
            }

        });
    el.addEventListener('keydown', e => {
        if (e.key==='Backspace'){
            el.value=''
            totpFieldEls[index - 1]?.focus()
        }
    });

});
