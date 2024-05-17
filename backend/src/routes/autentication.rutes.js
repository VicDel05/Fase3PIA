const { Router } = require('express');

const { login, signup } = require("../controllers/autentication.controller");

const router = Router();

router.post('/', login);

//router.post('/', signup);

module.exports = router;