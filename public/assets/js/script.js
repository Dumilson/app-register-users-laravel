function addField() {
    var formContainer = document.getElementById('form-tel');

    var newFormGroup = document.createElement('div');

    var newInput = document.createElement('input');
    newInput.type = 'tel';
    newInput.name = 'phone[]';
    newInput.placeholder = 'Telemovél';

    var newButton = document.createElement('button');
    newButton.id = "remover"
    newButton.textContent = 'Remover';
    newButton.onclick = function() {
        removeField(this);
    };

    newFormGroup.appendChild(newInput);
    newFormGroup.appendChild(newButton);

    formContainer.appendChild(newFormGroup);
}

function removeField(button) {
    var formGroup = button.parentNode;
    var formContainer = formGroup.parentNode;
    formContainer.removeChild(formGroup);
}
