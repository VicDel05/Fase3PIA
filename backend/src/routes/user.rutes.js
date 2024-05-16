const { Router } = require('express');

const { readUser, creatUser, updateUser, deleteUser } = require('../controllers/user.controller');

const router = Router();

router.get('/:id', readUser);

router.post('/', creatUser);

router.put('/:id', updateUser);

router.delete('/:id', deleteUser);

module.exports = router;