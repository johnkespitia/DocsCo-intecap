window.addEventListener("load", function(){
    let formSearch = document.getElementById("search")
    formSearch.addEventListener("submit", buscarPokemon)
})


const buscarPokemon = async (evt) => {
    evt.preventDefault()
    const formulario = evt.target
    const mainElement = document.getElementById("main-content")
    const datosForm = new FormData(formulario)
    // console.log('entries',datosForm.entries().toArray())
    // datosForm.entries().forEach((v)=>{
    //     console.log(v)
    // })
    // console.log("Submit capturado..." , formulario)
    mainElement.innerHTML = `<div class="d-flex m-auto justify-content-center">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>`
    try {
        const pokemon = await fetch(`https://pokeapi.co/api/v2/pokemon/${datosForm.get('word')}`)
        // const pokemon = await fetch(`https://dragonball-api.com/api/characters?name=${datosForm.get('word')}`)
        if(pokemon.status == 200){
            const pokemonJson = await pokemon.json()
            mainElement.innerHTML = `<h1>${pokemonJson.name}</h1>
            <img src="${pokemonJson.sprites.front_default}" class="img-thumbnail" alt="...">
            <h2>Movimientos</h2>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Movimiento</th>
      <th scope="col">url</th>
    </tr>
  </thead>
  <tbody>
    ${pokemonJson.moves.map((m, idx)=>`<tr>
      <th scope="row">${idx}</th>
      <td>${m.move.name}</td>
      <td>${m.move.url}</td>
    </tr>`)}
  </tbody>
</table>`
        }
        else{
            mainElement.innerHTML = `<div class="alert alert-danger" role="alert">
    Pokemon no encontrado, hubo un error!
    </div>`
        }
            
    } catch (error) {
        console.log(error)
    }
    console.log(pokemon)
    

//     fetch(`https://pokeapi.co/api/v2/pokemon/${datosForm.get('word')}`).then((resp)=>{
//         return resp.json()    
//     }).then((data)=>{
//         console.log(data)
//         // write

//         // mainElement.write("<h1>Pokemon: "+data.name+"</h1>")
        
//         // const title = document.createElement("h1")
//         // title.textContent = "Pokemon: "+data.name
//         // mainElement.appendChild(title)

//         mainElement.innerHTML = `<h1>Nombre: ${data.name}</h1>`
//     }).catch((err)=>{
//         console.log(err)
//         mainElement.innerHTML = `<div class="alert alert-danger" role="alert">
//   Pokemon no encontrado, hubo un error!
// </div>`
//     })
    
    console.log(pokemon)

}