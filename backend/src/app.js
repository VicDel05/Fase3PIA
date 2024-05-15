const express = require('express');
const database = require('./database');

// Configuracion inicial
const app = express();
app.listen(3000, () => {
    console.log('Servidor encendido');
});

// Rutas
app.get("/productos", async (req,res) => {
    const con = await database.getConnection();
    const result = await con.query("SELECT * FROM Roles");
    

    console.log(result);
})