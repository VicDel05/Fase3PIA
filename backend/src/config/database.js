const mysql = require('mysql2');

const con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "gnfr1985",
    database: "mydb",
    port: "3306"
});

module.exports = con;