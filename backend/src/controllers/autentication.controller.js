const database = require('../config/database');
const mysql = require('mysql2');

const login = (req,res) =>  {
    const { txtcorreo, txtpass } = req.body;

    const viewQuery = `SELECT * FROM Usuarios WHERE CorreoUsuario = ? AND ContrasenaUsuario = ?;`;

    const query = mysql.format(viewQuery, [txtcorreo, txtpass]);
    
    database.query(query, (err, result) => {
        if (err) throw err;
        console.log(query);
        if (result[0] !== undefined) {
            
            res.json(result[0]);
            //res.redirect('/views/inicioAdmin.html');
        }else{
            res.json({ message: 'Usuario no encontrado' });
        }
    });
};

module.exports = {
    login
}