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
app.get('/acercadeM', (req,res) => res.sendFile(__dirname + "/views/acercadeM.html"));
app.get('/productoM', (req,res) => res.sendFile(__dirname + "/views/productoM.html"));
app.get('/contactoM', (req,res) => res.sendFile(__dirname + "/views/contactanosM.html"));

// Vistas miembro
app.get('/miembroindex', (req,res) => res.sendFile(__dirname + "/views/miembroindex.html"));
app.get('/cuenta', (req,res) => res.sendFile(__dirname + "/views/cuenta.html"));
app.get('/carrito', (req,res) => res.sendFile(__dirname + "/views/carrito.html"));
app.get('/comentario', (req,res) => res.sendFile(__dirname + "/views/comentario.html"));


// Inicio de sesion
app.post('/login', (req, res) => {
    const { correo, contrasena } = req.body;
  
    database.query('SELECT * FROM Usuarios WHERE CorreoUsuario = ?;', [correo], (error, results) => {
      if (error) {
        throw error;
      }
  
      if (results.length > 0) {
        const user = results[0];
  
        if (user.ContrasenaUsuario === contrasena) {
            if (user.Roles_idRoles === 1) {
                res.redirect("/inicioAdmin");
              } else {
                res.redirect("/miembroindex");
              }
        } else {
          res.send('Invalid password');
        }
      } else {
        res.send('User not found');
      }
    });
});

// Registro (signup)
app.post('/singup', (req, res) => {
    const { nombre, apeillidop, apeillidom, correo, contrasena } = req.body;
  
    const query = 'INSERT INTO Usuarios (NombreUsuaros, ApellidopUsuarios, ApellidomUsuario, CorreoUsuario, ContrasenaUsuario, Roles_idRoles) VALUES (?, ?, ?, ?, ?, 2)';
    database.query(query, [nombre, apeillidop, apeillidom, correo, contrasena], (err, result) => {
      if (err) {
        throw err;
      }
      res.redirect('/login');
      //res.send('Usuario registrado exitosamente');
    });
});
  
// Registro (admin)
app.post('/registro', async (req, res) => {
  const { nombre, apeillidop, apeillidom, correo, contrasena, rol } = req.body;

  // Insert user into database
  const query = 'INSERT INTO Usuarios (NombreUsuaros, ApellidopUsuarios, ApellidomUsuario, CorreoUsuario, ContrasenaUsuario, Roles_idRoles) VALUES (?, ?, ?, ?, ?, ?)';
  await database.query(query, [nombre, apeillidop, apeillidom, correo, contrasena, rol], (err, result) => {
    if (err) {
      throw err;
    }
    console.log("Usuario registrado");
    //res.redirect('/registro');
    //res.send('Usuario registrado exitosamente');
  });
});

// Registro productos (admin)

app.post('/registroproducto', async (req,res)=>{
  const { codigo, nombre, descripcion, categoria, cantidad, precio, imagen } = req.body;

  const query = `INSERT INTO Productos (CodigoProducto, NombreProducto, DescripcionProducto, CategoriaProducto_idCategoriaProducto, CantidadProducto, precioProducto, imagenProducto) VALUES (?, ?, ?, ?, ?, ?, ?)`;

  await database.query(query, [codigo, nombre, descripcion, categoria, cantidad, precio, imagen], (err,result) =>{
    if (err) {
      throw err;
    }
    console.log("Producto registrado");
  })
})

// Comentarios 
app.post('/comentario',  (req, res) => {
  const { comment  } = req.body;

    const query = 'INSERT INTO Comentarios (Comentario, Usuarios_idUsuarios) VALUES (?, 3);';
  
     database.query(query, [comment], (err,result) =>{
      if (err) {
        throw err;
      }
      console.log("Comentario registrado");
      res.redirect('/comentario');
    });
});

module.exports = app;