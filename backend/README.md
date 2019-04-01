# SlimApp RESTful API
![alt text](https://discourse-cdn-sjc2.com/standard14/uploads/slimframework/original/1X/704c3a9a7ce53ea7d06952ff4a33cf945e68ac4e.png)

This is a RESTful api built with the SlimPHP framework and uses MySQL for storage.

### Version
1.0.0

### Installation

Create database or import from _sql/emergency_call.sql

Edit db/config params

Install SlimPHP and dependencies

```sh
$ composer install
```
### API Endpints
```sh
$ GET /api/emergency_calls
$ GET /api/emergency_call/{id}
$ POST /api/emergency_call/add
$ PUT /api/emergency_call/update/{id}
$ DELETE /api/emergency_call/delete/{id}
```
