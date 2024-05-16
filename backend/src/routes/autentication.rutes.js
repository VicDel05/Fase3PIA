const { Router } = require('express');

const { login } = require("../controllers/autentication.controller");

const router = Router();

router.post('/', login);

module.exports = router;