# Aplicación REST API sencilla con Laravel

### Petición para crear una cuenta, añadir saldo y crear un usuario dado el caso que el usuario al que se asocia la cuenta no exista
Datos para realizar la petición

```
Request POST /event { "type": "deposit", "destination": 1, "amount": 10.25, "name": "Name", "last_name": "LastName" }
201
```
