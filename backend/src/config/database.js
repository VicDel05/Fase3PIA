const mysql = require('mysql');

const con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "admin",
    database: "mydb",
    port: "3306"
});

module.exports = con;