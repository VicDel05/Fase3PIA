const formPost = document.getElementById('log');


formPost.addEventListener('submit', async (e) => {
    e.preventDefault();
    let message = '';
    const correo = e.target.txtcorreo.value;
    const contrasena = e.target.txtpass.value;

    await fetch('http://localhost:3000/login', {
        method:'POST',
        mode:'no-cors',
        headers:{
            'Content-Type' : 'application/json'
        },
        body:JSON.stringify({ txtcorreo: correo, txtpass: contrasena }),
    }).then((response) => response.json()).then((data) => {
        message = data.message;
        console.log(message);
    });
})

/*
document.getElementById('log').addEventListener("submit", async (e) =>{
    e.preventDefault();
    const correo = e.target.children.correo.value;
    const contrasena = e.target.children.contrasena.value;

    const res = await fetch("http://localhost:3000/login", {
        method:"POST",
        headers:{
            "Content-Type" : "application/json"
        },
        body:JSON.stringify({
            correo, contrasena
        })
    });


});
*/
