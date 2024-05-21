// const database = require('../config/database');
// const mysql = require('mysql2');

// const readUser = (req, res) => {
//     const { id } = req.params;

//     const readQuery = `SELECT * FROM Usuarios WHERE idUsuarios = ?;`;

//     const query = mysql.format(readQuery, [id]);

//     database.query(query, (err, result) => {
//         if (err) throw err;
//         if (result[0] !== undefined) {
//             res.json(result[0]);
//         }else{
//             res.json({ message: 'Usuario no encontrado' });
//         }


//         console.log(result[0]);
        
//     });
// };

// const creatUser = (req, res) => {
//     res.send('Peticion POST');
// };

// const updateUser = (req, res) => {
//     res.send('Peticion POST');
// };

// const deleteUser = (req, res) => {
//     res.send('Peticion POST');
// };

// module.exports = {
//     readUser,
//     creatUser, 
//     updateUser,
//     deleteUser
// }