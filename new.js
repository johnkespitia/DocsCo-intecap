let titleInput = document.getElementById("titulo")
let descriptionInput = document.getElementById("description")
let typeInput = document.getElementById("type")
let pubDateInput = document.getElementById("published_date")
let publishedInput = document.getElementById("published")
let folderInput = document.getElementById("folder")

titleInput.addEventListener("input", validateInput)
descriptionInput.addEventListener("input", validateInput)
typeInput.addEventListener("change", validateInput)
pubDateInput.addEventListener("input", validateInput)
publishedInput.addEventListener("click", validateInput)
folderInput.addEventListener("change", validateInput)
// titleInput.value = "John"

function validateInput(evt){
    const input = evt.target
    let error = false
    switch(input.id){
        case 'titulo':
            if(input.value.length<4){
                console.log(input.value.length)
                input.setCustomValidity("El texto debe ser mayor a 4 caracteres")
                error=true
            }
            if(input.value.length>=30){
                input.setCustomValidity("El texto debe ser menor a 30 caracteres")
                error=true
            }
            break;
        case 'type':
            if(input.value == 4){
                document.getElementById("file-text-container").classList.remove("d-none")
                document.getElementById("file-upload-container").classList.add("d-none")
            }
            else{
                document.getElementById("file-upload-container").classList.remove("d-none")
                document.getElementById("file-text-container").classList.add("d-none")
            }
            break; 
        case 'published':
            console.log(input.value)
            console.log(input.checked)
            break; 
        case 'published_date':
            const fechaPub = new Date(input.value)
            if(fechaPub.getTime()<=new Date().getTime()){
                input.setCustomValidity("La fecha debe ser mayor a hoy")
                error=true
            }
            break;
    }
    if(!error){
        input.setCustomValidity("")
    }
} 

document.getElementsByClassName("btn-success")[0].addEventListener("click",function(evt){
    evt.preventDefault()
    document.querySelectorAll('[data-tiny-editor]').forEach(editor =>
        editor.addEventListener('input', e => alert(e.target.innerHTML)
    )
);
})