const express = require('express');
const morgan = require('morgan');
const database = require('./database');

// Configuracion inicial
const app = express();
app.listen(3000, () => {
    console.log('Servidor encendido');
});

// Middlewares 
app.use(morgan('dev'));
app.use(express.json())

// Rutas
app.get("/productos", async (req,res) => {
    const con = await database.getConnection();
    const result = con.query(`SELECT * FROM Roles;`);
    

    console.log(result);
})