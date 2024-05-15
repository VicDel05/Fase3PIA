const express = require('express');

const userRoutes = require('../routes/user.rutes');

// Configuracion inicial
const app = express();

// Middlewares 
app.use(express.json());

// Endpoints
app.use('/user', userRoutes);

module.exports = app;