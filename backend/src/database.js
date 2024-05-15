const mysql = require('mysql');
const dotenv = require('dotenv');
dotenv.config();

const con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "admin",
    database: "mydb",
    port: "3306"
});

con.connect(function(err)  {
    if (err) throw err;
    console.log("Data Base Connected!");
});

const getQuery = `SELECT * FROM Roles;`;

con.query(getQuery, (err,res) => {
    if (err) throw err;
    console.log('respuesta select', res);
})


const getConnection = async () => await con;

module.exports = {
    getConnection
}