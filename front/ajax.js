window.addEventListener("load", function(){
    let loginForm = document.getElementById("login-form")
    loginForm.addEventListener("submit", login)
})

async function getUsuarios(){
    const url = "http://localhost:82/usuarios";
    const usuarios = await fetch(url,{
        method:"GET",
        headers: {
            "Authorization":localStorage.getItem("token")
        }
    });
    if(usuarios.status == 200){
        const usuariosList = await usuarios.json()
        console.log(usuariosList)
        document.getElementById("contenido-usuarios").innerHTML="";
        usuariosList.usuarios.map((usuario)=>{
            document.getElementById("contenido-usuarios").innerHTML+=`<tr>
            <td>${usuario.id}</td>
            <td>${usuario.nombre}</td>
            <td>${usuario.email}</td>
            <td>${usuario.rol}</td>
            <tr>`
        })
    }
    else{
        console.error("Error al traer usuarios")
    }
}

async function login(evt){
    evt.preventDefault()
    const datos = {
        "email": document.getElementById("email").value,
        "password": document.getElementById("password").value,
    }
    const url = "http://localhost:82/login";
    const usuarios = await fetch(url,{
        method: "POST",
        body: JSON.stringify(datos)
    });
    if(usuarios.status == 200){
        const tokenResponse = await usuarios.json()
        if(tokenResponse.token != ""){
            localStorage.setItem("token",tokenResponse.token);
            location.href="./dashboard.html";
        }
        // document.getElementById("contenido-usuarios").innerHTML="";
        // usuariosList.usuarios.map((usuario)=>{
        //     document.getElementById("contenido-usuarios").innerHTML+=`<tr>
        //     <td>${usuario.id}</td>
        //     <td>${usuario.nombre}</td>
        //     <td>${usuario.email}</td>
        //     <td>${usuario.rol}</td>
        //     <tr>`
        // })
    }
    else{
        console.error("Error al traer usuarios")
    }
}