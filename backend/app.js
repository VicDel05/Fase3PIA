const express = require('express');
const cors = require('cors');

const userRoutes = require('./src/routes/user.rutes');

// Configuracion inicial
const app = express();

// Middlewares 
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cors());
app.use(express.static(__dirname + "/public"));


// Endpoints
app.use('/user', userRoutes);

// Iniciar el index
app.get('/', (req,res) => res.sendFile(__dirname + "/views/index.html"));

app.get('/acercade', (req,res) => res.sendFile(__dirname + "/views/acercade.html"));

app.get('/login', (req,res) => res.sendFile(__dirname + "/views/login.html"));

module.exports = app;