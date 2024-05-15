const express = require('express');
const cors = require('cors');

const userRoutes = require('../routes/user.rutes');

// Configuracion inicial
const app = express();

// Middlewares 
app.use(express.json());
app.use(express.urlencoded({ extended: true }))
app.use(cors());

// Endpoints
app.use('/user', userRoutes);

module.exports = app;