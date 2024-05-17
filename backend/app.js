const express = require('express');
const cors = require('cors');

const userRoutes = require('./src/routes/user.rutes');
const loginRoutes = require('./src/routes/autentication.rutes');

// Configuracion inicial
const app = express();

// Middlewares 
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cors());
app.use(express.static(__dirname + "/public"));


// Endpoints
app.use('/user', userRoutes);
app.use('/login', loginRoutes);

// Iniciar el index
app.get('/', (req,res) => res.sendFile(__dirname + "/views/index.html"));

// Vistas generales
app.get('/acercade', (req,res) => res.sendFile(__dirname + "/views/acercade.html"));
app.get('/login', (req,res) => res.sendFile(__dirname + "/views/login.html"));
app.get('/singup', (req,res) => res.sendFile(__dirname + "/views/singup.html"));


// Vistas administrador
app.get('/inicioAdmin', (req,res) => res.sendFile(__dirname + "/views/inicioAdmin.html"));
app.get('/registro', (req,res) => res.sendFile(__dirname + "/views/registro.html"));
app.get('/registroproducto', (req,res) => res.sendFile(__dirname + "/views/registroproducto.html"));
app.get('/venta', (req,res) => res.sendFile(__dirname + "/views/venta.html"));
app.get('/reporte', (req,res) => res.sendFile(__dirname + "/views/reporte.html"));

// Vistas miembro
app.get('/miembroindex', (req,res) => res.sendFile(__dirname + "/views/miembroindex.html"));
app.get('/cuenta', (req,res) => res.sendFile(__dirname + "/views/cuenta.html"));
app.get('/carrito', (req,res) => res.sendFile(__dirname + "/views/carrito.html"));

module.exports = app;