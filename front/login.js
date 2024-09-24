//Este es un comentario de linea 
alert("Hola")
confirm("quieres entrar?")
prompt("Dime tu nombre")
console.log("Hola soy un mensaje de consola")
console.info("soy un mensaje de información", 12)
console.error("Algo anda mal!", 23)
/*
Un bloque de comentarios

--------


*/ 

const PI = 3.1416
var nombre = 'John'
let edad = 33
let boleano = 1==1
if(boleano){
    let nuevaEdad = edad + 10
    var edad2 = edad + 2
    console.log("edad ", nuevaEdad)
}
// + - * / %
//Math.
let txt = `s sdklf
" '
jsdlkfj ${nombre}
`.toUpperCase()
let txt0 = 'sdkfj \' sdlkfj sdlkf' + txt
//`s sdklfjsdlkfj ${nombre}`
console.log(txt.substring(4,9))
let numero = "10"
console.log("2"+2)
console.log(2+"2")
console.log(numero-2)
console.log(numero-"2")
console.log(boleano-"2")
console.log(txt-"2")

console.log(typeof parseInt(numero) )
console.log(typeof edad.toString() )

null
undefined
any //cualquier valor
let carlos = null
console.log("otro nombre", carlos)

// if
// else
// else if
// while
// for
// foreach
// try catch
// switch
2 = "2" //error
"2" == 2 //true
"2" === 2 //false
"2" != 2 //false
"2" !== 2 //true

let i = 0
i++
++i

let array1 = [1,2,3,4]
let array2 = [1,"2",true,4]
let array3 = [
    [
        1,2,3,4
    ],
    [
        "a","b"
    ]
]
let array4 = Array()

array3[1].push("c")
array3.push([])

let book = {
    title: "cien años de soledad",
    author: "Gabriel Garcia Marquez",
    content: "skldsdlkfj sdklfj sdkl fjsdlk fjsdklfj sdkl fsdkl jfsdkl fjsdlkf sldkf jsdklf sdlkf sdklfj sdklfj sdklfj sdlkfj sdlkfj sdlkf sdklfj sl",
    getResume: (length) => this.content.substring(0,length),
    getISBN: () => {
        let code = Math.random()
        return `ISBN-${code}`
    }
}

book.title
book["title"]

function BookNew(title, author, content){
    this.title = title
    this.author = author
    this.content = content
    this. getResume = (length) => this.content.substring(0,length),
    this.getISBN = () => {
        let code = Math.random()
        return `ISBN-${code}`
    }
} 

let libro = new BookNew("El principito", "Antony Saint ", "sdfh sdlkfj sdlkf jskld fsdkl fskdl fjklsd fsdkl fsdklf sdklf sdklfjsklfj ")
libro.getResume(10)

function nameT(id, nombre="John"){
    console.log("aqui", id, nombre)
}

let fn2 = (fn4) => {
    fn4("esta alerta")
}

let fn3 = function() {
    return 10
}

nameT(1)
nameT(2, "Leonardo")
fn2(alert)

//Navigator
function mostrar(position){
    console.log(position.coords.latitude)
}
let position = navigator.geolocation.getCurrentPosition(mostrar)


//History
//Document