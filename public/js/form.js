const grupo = document.getElementById('grupo');

function add() {
    event.preventDefault();
    
    let totalCampos = document.getElementsByName('autores[]');
    if(totalCampos.length < 5) {
        const campos = document.createElement('div');
        const novoCampo = document.createElement('input');
        const btnRemove = document.createElement('button');

        btnRemove.textContent = '-';
        btnRemove.setAttribute('type', 'button');

        novoCampo.setAttribute('name', 'autores[]');
        novoCampo.setAttribute('type', 'text');
        novoCampo.setAttribute('placeholder', 'Autor '+ (totalCampos.length + 1))

        campos.appendChild(novoCampo);
        campos.appendChild(btnRemove);

        grupo.appendChild(campos);

        btnRemove.addEventListener('click', function() {
            campos.removeChild(novoCampo);
            campos.removeChild(btnRemove);
        });
    }
    
}