const grupo = document.getElementById('grupo');
const btnAdd = document.getElementById('btnAdd');

btnAdd.addEventListener('click', function(event) {
    event.preventDefault();
    
    let totalCampos = document.getElementsByName('autores[]');
    if(totalCampos.length < 5) {
        const campos = document.createElement('div');
        const novoCampo = document.createElement('input');
        const btnRemove = document.createElement('button');

        btnRemove.textContent = '-';
        btnRemove.setAttribute('type', 'button');
        btnRemove.setAttribute('class', 'btnReducer');

        novoCampo.setAttribute('name', 'autores[]');
        novoCampo.setAttribute('type', 'text');
        novoCampo.setAttribute('placeholder', 'Autor '+ (totalCampos.length + 1))
        novoCampo.setAttribute("class", "form-input");

        campos.appendChild(novoCampo);
        campos.appendChild(btnRemove);

        grupo.appendChild(campos);

        btnRemove.addEventListener('click', function() {
            campos.removeChild(novoCampo);
            campos.removeChild(btnRemove);
        });
    }
});

/*
const btnDelete = document.getElementsByClassName('btn-delete');

btnDelete[0].addEventListener('click', () => {
    dialog.setAttribute('open', true);
});

const closeModal = document.getElementById('close-modal');

closeModal.addEventListener('click', () => {
    dialog.close();
});
*/