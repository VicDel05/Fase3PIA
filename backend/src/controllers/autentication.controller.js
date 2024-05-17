const database = require('../config/database');
const mysql = require('mysql2');

const login = (req,res) =>  {
    const { correo, contrasena } = req.body;

    const viewQuery = `SELECT * FROM Usuarios WHERE CorreoUsuario = ? AND ContrasenaUsuario = ?;`;

    const query = mysql.format(viewQuery, [correo, contrasena]);
    
    console.log(correo);
    console.log(contrasena);

    database.query(query, (err, result) => {
        if (err) throw err;
        if (result[0] !== undefined) {
            
            res.json(result[0]);
            //res.redirect('/views/inicioAdmin.html');
        }else{
            res.json({ message: 'Usuario no encontrado' });
        }
    });
};

// const signup = (req, res => {
//     const name = req.body.nombre;
//     const apep = req.body.apellidop;
//     const apem = req.body.apellidom;
//     const email = req.body.correo;
//     const pass = req.body.contrasena;
//     const rol = 2;

//     database.query('INSERT INTO Usuarios SET ?,?,?,?,?,?', {name:name, apep:apep, apem:apem, email:email, pass:pass, rol:rol});

//     if(error){
//         console.log(error);
//     }else{
//         res.render('miembroindex');
//     }
// })

module.exports = {
    login/*,
    signup*/
}