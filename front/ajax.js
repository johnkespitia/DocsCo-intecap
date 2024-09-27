async function getUsuarios(){
    const url = "http://localhost/usuarios";
    const usuarios = await fetch(url);
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