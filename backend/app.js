const express = require('express');
const cors = require('cors');
const database = require('./src/config/database');

// const userRoutes = require('./src/routes/user.rutes');
// const loginRoutes = require('./src/routes/autentication.rutes');

// Configuracion inicial
const app = express();

// Middlewares 
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cors());
app.use(express.static(__dirname + "/public"));


// Endpoints
// app.use('/user', userRoutes);
// app.use('/login', loginRoutes);

// Iniciar el index
app.get('/', (req,res) => res.sendFile(__dirname + "/views/index.html"));

// Vistas generales
app.get('/acercade', (req,res) => res.sendFile(__dirname + "/views/acercade.html"));
app.get('/login', (req,res) => res.sendFile(__dirname + "/views/login.html"));
app.get('/singup', (req,res) => res.sendFile(__dirname + "/views/singup.html"));
app.get('/producto', (req,res) => res.sendFile(__dirname + "/views/producto.html"));
app.get('/contacto', (req,res) => res.sendFile(__dirname + "/views/contactanos.html"));


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


// Prueba peticiones
app.post('/login', (req, res) => {
    const { correo, contrasena } = req.body;
  
    database.query('SELECT * FROM Usuarios WHERE CorreoUsuario = ?', [correo], (error, results) => {
      if (error) {
        throw error;
      }
  
      if (results.length > 0) {
        const user = results[0];
  
        if (user.ContrasenaUsuario === contrasena) {
          res.redirect('/miembroindex');
        } else {
          res.send('Invalid password');
        }
      } else {
        res.send('User not found');
      }
    });
  });

module.exports = app;