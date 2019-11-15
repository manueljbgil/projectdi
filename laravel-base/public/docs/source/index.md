---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.

<!-- END_INFO -->

#Backyard management


Methods for managing Backyards
<!-- START_7bf2c687f0df9c5aaf2404ee117505cf -->
## Display a listing of the backyards with the associated user.

> Example request:

```bash
curl -X GET -G "http://localhost/api/backyards" 
```

```javascript
const url = new URL("http://localhost/api/backyards");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 2,
            "created_at": "2019-11-05 00:53:25",
            "updated_at": "2019-11-12 20:56:42",
            "name": "aveiross",
            "description": "pequeno jardim!",
            "image": "backyardImages\/XGEpBjc53nVCewdU5N82tPBrsqExaZpuITfuFuWW.jpeg",
            "user_id": 1
        },
        {
            "id": 25,
            "created_at": "2019-11-10 18:12:07",
            "updated_at": "2019-11-10 18:12:07",
            "name": "quintal do manel",
            "description": "asdadad",
            "image": "backyardImages\/a4VA07ZvHqE6s8HHgEmbolTMugTreVBD1i5UENDx.jpeg",
            "user_id": 23
        },
        {
            "id": 27,
            "created_at": "2019-11-12 17:42:02",
            "updated_at": "2019-11-12 17:42:02",
            "name": "sss",
            "description": "sss",
            "image": null,
            "user_id": 1
        }
    ],
    "message": "backyards",
    "result": "ok",
    "code": 200,
    "user": null
}
```

### HTTP Request
`GET api/backyards`


<!-- END_7bf2c687f0df9c5aaf2404ee117505cf -->

<!-- START_a9b64ed96e16bec854d7fac2e6a20d6f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/backyards" \
    -H "Content-Type: application/json" \
    -d '{"name":"voluptas","description":"minima","image":"magnam","user_id":19}'

```

```javascript
const url = new URL("http://localhost/api/backyards");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "voluptas",
    "description": "minima",
    "image": "magnam",
    "user_id": 19
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/backyards`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the backyard
    description | string |  optional  | A description for the backyard
    image | image |  optional  | An image for the backyard
    user_id | integer |  optional  | The id of the user associated with the backyard

<!-- END_a9b64ed96e16bec854d7fac2e6a20d6f -->
<!-- START_6bfa3dd2b21ca77437bc4c15d92a6108 -->
## Display the specific backyard.

> Example request:

```bash
curl -X GET -G "http://localhost/api/backyards/1" \
    -H "Content-Type: application/json" \
    -d '{"id":17}'

```

```javascript
const url = new URL("http://localhost/api/backyards/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 17
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Backyard] 1"
}
```

### HTTP Request
`GET api/backyards/{backyard}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | The id of the backyard

<!-- END_6bfa3dd2b21ca77437bc4c15d92a6108 -->

<!-- START_6db5590bdd02e1e9726c6f46ff007dcc -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/backyards/1" \
    -H "Content-Type: application/json" \
    -d '{"name":"nemo","description":"illo","image":"qui","user_id":15}'

```

```javascript
const url = new URL("http://localhost/api/backyards/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "nemo",
    "description": "illo",
    "image": "qui",
    "user_id": 15
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/backyards/{backyard}`

`PATCH api/backyards/{backyard}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  optional  | The name of the backyard
    description | string |  optional  | A description for the backyard
    image | image |  optional  | An image for the backyard
    user_id | integer |  optional  | The id of the user associated with the backyard

<!-- END_6db5590bdd02e1e9726c6f46ff007dcc -->
<!-- START_5c47fc2f166053882eb6ae44f2da5f99 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/backyards/1" \
    -H "Content-Type: application/json" \
    -d '{"id":10}'

```

```javascript
const url = new URL("http://localhost/api/backyards/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 10
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/backyards/{backyard}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | integer |  required  | The id of the backyard to be removed

<!-- END_5c47fc2f166053882eb6ae44f2da5f99 -->
#Image management


Methods for managing Images
<!-- START_8e05289fc079261819c2c145f89215f1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/images" 
```

```javascript
const url = new URL("http://localhost/api/images");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 16,
            "created_at": "2019-11-13 00:11:46",
            "updated_at": "2019-11-13 00:11:46",
            "path": "librariesImages\/rAOFeEYc5SETFzofgXv1iXAJUlVMdxia7MkQ2Wnf.jpeg",
            "library_id": 28,
            "library": {
                "id": 28,
                "created_at": "2019-11-13 00:11:46",
                "updated_at": "2019-11-13 00:11:46",
                "plantation_id": 53,
                "user_id": 1,
                "backyard_id": 27
            }
        },
        {
            "id": 18,
            "created_at": "2019-11-13 00:17:38",
            "updated_at": "2019-11-13 00:17:38",
            "path": "librariesImages\/z7y7pBbygLygL9EOf5DLYm1zVWN7dwt0xH5rqYJe.jpeg",
            "library_id": 33,
            "library": {
                "id": 33,
                "created_at": "2019-11-13 00:17:38",
                "updated_at": "2019-11-13 00:17:38",
                "plantation_id": 58,
                "user_id": 1,
                "backyard_id": 2
            }
        },
        {
            "id": 20,
            "created_at": "2019-11-13 01:04:10",
            "updated_at": "2019-11-13 01:04:10",
            "path": "librariesImages\/WaEgudavbD4fWCuGoGOvK7sFqEfsX6YcQzPQV4V8.jpeg",
            "library_id": 33,
            "library": {
                "id": 33,
                "created_at": "2019-11-13 00:17:38",
                "updated_at": "2019-11-13 00:17:38",
                "plantation_id": 58,
                "user_id": 1,
                "backyard_id": 2
            }
        },
        {
            "id": 23,
            "created_at": "2019-11-14 00:35:14",
            "updated_at": "2019-11-14 00:35:14",
            "path": "librariesImages\/P56GKpPbkKnLgUMCIjkbvJOOuW4MhUVJ9kZbWYk9.png",
            "library_id": 33,
            "library": {
                "id": 33,
                "created_at": "2019-11-13 00:17:38",
                "updated_at": "2019-11-13 00:17:38",
                "plantation_id": 58,
                "user_id": 1,
                "backyard_id": 2
            }
        },
        {
            "id": 32,
            "created_at": "2019-11-14 01:24:53",
            "updated_at": "2019-11-14 01:24:53",
            "path": "librariesImages\/QGUq8sPWxUHF7S55gcOtVBUyUGISBn9yMClkYTI6.png",
            "library_id": 36,
            "library": {
                "id": 36,
                "created_at": "2019-11-13 20:15:55",
                "updated_at": "2019-11-13 20:15:55",
                "plantation_id": 61,
                "user_id": 1,
                "backyard_id": 2
            }
        }
    ],
    "message": "images",
    "result": "ok",
    "code": 200
}
```

### HTTP Request
`GET api/images`


<!-- END_8e05289fc079261819c2c145f89215f1 -->

<!-- START_204613676cab89a55dfdc7d81f16a281 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/images" \
    -H "Content-Type: application/json" \
    -d '{"path":"qui","library_id":13}'

```

```javascript
const url = new URL("http://localhost/api/images");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "path": "qui",
    "library_id": 13
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/images`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    path | string |  required  | The path to the image
    library_id | integer |  required  | The id of the library where the image will be stored

<!-- END_204613676cab89a55dfdc7d81f16a281 -->
<!-- START_b72ae09f5d6ffe769e7e25847bfb4713 -->
## Display the specified path to the image.

> Example request:

```bash
curl -X GET -G "http://localhost/api/images/1" 
```

```javascript
const url = new URL("http://localhost/api/images/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Image] 1"
}
```

### HTTP Request
`GET api/images/{image}`


<!-- END_b72ae09f5d6ffe769e7e25847bfb4713 -->

<!-- START_663d256882d5392cfe487383a4e8703e -->
## Update the specified image in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/images/1" \
    -H "Content-Type: application/json" \
    -d '{"path":"quia","plantation_id":6}'

```

```javascript
const url = new URL("http://localhost/api/images/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "path": "quia",
    "plantation_id": 6
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/images/{image}`

`PATCH api/images/{image}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    path | string |  optional  | The path to the image
    plantation_id | integer |  optional  | The id of the plantation associated with the library

<!-- END_663d256882d5392cfe487383a4e8703e -->
<!-- START_f39af5b4ed09dfc1cd00fcaa2c6ecce2 -->
## Remove the specified path to the image from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/images/1" 
```

```javascript
const url = new URL("http://localhost/api/images/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/images/{image}`


<!-- END_f39af5b4ed09dfc1cd00fcaa2c6ecce2 -->

#Library management


Methods for managing Libraries
<!-- START_b41684bf361abcc1ffea8fb65ded6adf -->
## Display a listing of the libraries.

> Example request:

```bash
curl -X GET -G "http://localhost/api/libraries" 
```

```javascript
const url = new URL("http://localhost/api/libraries");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 28,
            "created_at": "2019-11-13 00:11:46",
            "updated_at": "2019-11-13 00:11:46",
            "plantation_id": 53,
            "user_id": 1,
            "backyard_id": 27,
            "plantation": {
                "id": 53,
                "created_at": "2019-11-13 00:11:46",
                "updated_at": "2019-11-13 00:11:46",
                "name": "ss",
                "planted_at": null,
                "description": "as",
                "backyard_id": 27,
                "type_id": 13,
                "user_id": 1
            }
        },
        {
            "id": 32,
            "created_at": "2019-11-13 00:14:40",
            "updated_at": "2019-11-13 00:14:40",
            "plantation_id": 57,
            "user_id": 1,
            "backyard_id": 27,
            "plantation": {
                "id": 57,
                "created_at": "2019-11-13 00:14:40",
                "updated_at": "2019-11-13 00:14:40",
                "name": "as",
                "planted_at": null,
                "description": "ax",
                "backyard_id": 27,
                "type_id": 7,
                "user_id": 1
            }
        },
        {
            "id": 33,
            "created_at": "2019-11-13 00:17:38",
            "updated_at": "2019-11-13 00:17:38",
            "plantation_id": 58,
            "user_id": 1,
            "backyard_id": 2,
            "plantation": {
                "id": 58,
                "created_at": "2019-11-13 00:17:38",
                "updated_at": "2019-11-13 00:17:38",
                "name": "bbb",
                "planted_at": null,
                "description": "vbvbv",
                "backyard_id": 2,
                "type_id": 12,
                "user_id": 1
            }
        },
        {
            "id": 36,
            "created_at": "2019-11-13 20:15:55",
            "updated_at": "2019-11-13 20:15:55",
            "plantation_id": 61,
            "user_id": 1,
            "backyard_id": 2,
            "plantation": {
                "id": 61,
                "created_at": "2019-11-13 20:15:55",
                "updated_at": "2019-11-13 20:15:55",
                "name": "asd",
                "planted_at": null,
                "description": "sasss",
                "backyard_id": 2,
                "type_id": 5,
                "user_id": 1
            }
        }
    ],
    "message": "libraries",
    "result": "ok",
    "code": 200
}
```

### HTTP Request
`GET api/libraries`


<!-- END_b41684bf361abcc1ffea8fb65ded6adf -->

<!-- START_3774448778d4384630cd0b5cc645985c -->
## Store a newly created library in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/libraries" \
    -H "Content-Type: application/json" \
    -d '{"plantation_id":15}'

```

```javascript
const url = new URL("http://localhost/api/libraries");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "plantation_id": 15
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/libraries`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    plantation_id | integer |  required  | The id of the plantation associated with the library

<!-- END_3774448778d4384630cd0b5cc645985c -->

<!-- START_37ff5e698aca0b351ed8b4c1a1b9cc00 -->
## Display the specified Library.

> Example request:

```bash
curl -X GET -G "http://localhost/api/libraries/1" 
```

```javascript
const url = new URL("http://localhost/api/libraries/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Library] 1"
}
```

### HTTP Request
`GET api/libraries/{library}`


<!-- END_37ff5e698aca0b351ed8b4c1a1b9cc00 -->

<!-- START_9b67fd50670ce0bdf4eedc05b9e06a4f -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/libraries/1" \
    -H "Content-Type: application/json" \
    -d '{"plantation_id":1}'

```

```javascript
const url = new URL("http://localhost/api/libraries/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "plantation_id": 1
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/libraries/{library}`

`PATCH api/libraries/{library}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    plantation_id | integer |  required  | The id of the plantation associated with the library

<!-- END_9b67fd50670ce0bdf4eedc05b9e06a4f -->
<!-- START_95804e2395b2939c3442af4058c1c549 -->
## Remove the specified library from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/libraries/1" 
```

```javascript
const url = new URL("http://localhost/api/libraries/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/libraries/{library}`


<!-- END_95804e2395b2939c3442af4058c1c549 -->

#Plantations management


Methods for managing Plantations
<!-- START_838a03e385ba0c715f317c6f07abb6f9 -->
## Display all the plantations.

> Example request:

```bash
curl -X GET -G "http://localhost/api/plantations" 
```

```javascript
const url = new URL("http://localhost/api/plantations");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 53,
            "created_at": "2019-11-13 00:11:46",
            "updated_at": "2019-11-13 00:11:46",
            "name": "ss",
            "planted_at": null,
            "description": "as",
            "backyard_id": 27,
            "type_id": 13,
            "user_id": 1,
            "backyard": {
                "id": 27,
                "created_at": "2019-11-12 17:42:02",
                "updated_at": "2019-11-12 17:42:02",
                "name": "sss",
                "description": "sss",
                "image": null,
                "user_id": 1
            },
            "type": {
                "id": 13,
                "created_at": null,
                "updated_at": null,
                "name": "Semente aromática",
                "scientific_name": null,
                "description": null
            }
        },
        {
            "id": 57,
            "created_at": "2019-11-13 00:14:40",
            "updated_at": "2019-11-13 00:14:40",
            "name": "as",
            "planted_at": null,
            "description": "ax",
            "backyard_id": 27,
            "type_id": 7,
            "user_id": 1,
            "backyard": {
                "id": 27,
                "created_at": "2019-11-12 17:42:02",
                "updated_at": "2019-11-12 17:42:02",
                "name": "sss",
                "description": "sss",
                "image": null,
                "user_id": 1
            },
            "type": {
                "id": 7,
                "created_at": null,
                "updated_at": null,
                "name": "Roseira",
                "scientific_name": null,
                "description": null
            }
        },
        {
            "id": 58,
            "created_at": "2019-11-13 00:17:38",
            "updated_at": "2019-11-13 00:17:38",
            "name": "bbb",
            "planted_at": null,
            "description": "vbvbv",
            "backyard_id": 2,
            "type_id": 12,
            "user_id": 1,
            "backyard": {
                "id": 2,
                "created_at": "2019-11-05 00:53:25",
                "updated_at": "2019-11-12 20:56:42",
                "name": "aveiross",
                "description": "pequeno jardim!",
                "image": "backyardImages\/XGEpBjc53nVCewdU5N82tPBrsqExaZpuITfuFuWW.jpeg",
                "user_id": 1
            },
            "type": {
                "id": 12,
                "created_at": null,
                "updated_at": null,
                "name": "Semente de legume",
                "scientific_name": null,
                "description": null
            }
        },
        {
            "id": 61,
            "created_at": "2019-11-13 20:15:55",
            "updated_at": "2019-11-13 20:15:55",
            "name": "asd",
            "planted_at": null,
            "description": "sasss",
            "backyard_id": 2,
            "type_id": 5,
            "user_id": 1,
            "backyard": {
                "id": 2,
                "created_at": "2019-11-05 00:53:25",
                "updated_at": "2019-11-12 20:56:42",
                "name": "aveiross",
                "description": "pequeno jardim!",
                "image": "backyardImages\/XGEpBjc53nVCewdU5N82tPBrsqExaZpuITfuFuWW.jpeg",
                "user_id": 1
            },
            "type": {
                "id": 5,
                "created_at": null,
                "updated_at": null,
                "name": "Planta Aromática",
                "scientific_name": null,
                "description": null
            }
        }
    ],
    "message": "plantations",
    "result": "ok",
    "code": 200
}
```

### HTTP Request
`GET api/plantations`


<!-- END_838a03e385ba0c715f317c6f07abb6f9 -->

<!-- START_197aec0ca666f4613f7d50473bfa1991 -->
## Store a newly created plantation in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/plantations" \
    -H "Content-Type: application/json" \
    -d '{"name":"iure","description":"repellat","image":"cupiditate","backyard_id":12,"type_id":13}'

```

```javascript
const url = new URL("http://localhost/api/plantations");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "iure",
    "description": "repellat",
    "image": "cupiditate",
    "backyard_id": 12,
    "type_id": 13
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/plantations`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | The name of the plant
    description | string |  optional  | A description for the plantation
    image | image |  optional  | An image for the plant
    backyard_id | integer |  required  | The id of the backyard associated with the plantation
    type_id | integer |  required  | The id of the plant type associated with the plantation

<!-- END_197aec0ca666f4613f7d50473bfa1991 -->
<!-- START_8b592b19aaa2a98f140caea1de6b222c -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/plantations/1" 
```

```javascript
const url = new URL("http://localhost/api/plantations/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "No query results for model [App\\Plantation] 1"
}
```

### HTTP Request
`GET api/plantations/{plantation}`


<!-- END_8b592b19aaa2a98f140caea1de6b222c -->

<!-- START_82706bd3ec3996c8d2e8f67253d95a72 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/plantations/1" \
    -H "Content-Type: application/json" \
    -d '{"name":"ea","description":"consequuntur","image":"eos","user_id":2,"type_id":7}'

```

```javascript
const url = new URL("http://localhost/api/plantations/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "ea",
    "description": "consequuntur",
    "image": "eos",
    "user_id": 2,
    "type_id": 7
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/plantations/{plantation}`

`PATCH api/plantations/{plantation}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  optional  | The name of the plant
    description | string |  optional  | A description for the plantation
    image | image |  optional  | An image for the plant
    user_id | integer |  optional  | The id of the backyard associated with the plantation
    type_id | integer |  optional  | The id of the plant type associated with the plantation

<!-- END_82706bd3ec3996c8d2e8f67253d95a72 -->
<!-- START_7b353b21cddc1f4bbe04678bf89123fd -->
## Remove the specified plantation from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/plantations/1" \
    -H "Content-Type: application/json" \
    -d '{"plantation":"magni"}'

```

```javascript
const url = new URL("http://localhost/api/plantations/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "plantation": "magni"
}

fetch(url, {
    method: "DELETE",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/plantations/{plantation}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    plantation | Plantation |  required  | The id of the plantation to be removed

<!-- END_7b353b21cddc1f4bbe04678bf89123fd -->
#Types Displaying


Displays the types of plantae.
<!-- START_3927d9858a98b64816c08b1fb902df4b -->
## Display all types of plantae

> Example request:

```bash
curl -X GET -G "http://localhost/api/types" 
```

```javascript
const url = new URL("http://localhost/api/types");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "created_at": null,
            "updated_at": null,
            "name": "Árvore de fruto",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 2,
            "created_at": null,
            "updated_at": null,
            "name": "Árvore de grande porte",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 3,
            "created_at": null,
            "updated_at": null,
            "name": "Arbusto",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 4,
            "created_at": null,
            "updated_at": null,
            "name": "Bambus",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 5,
            "created_at": null,
            "updated_at": null,
            "name": "Planta Aromática",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 6,
            "created_at": null,
            "updated_at": null,
            "name": "Planta de terra ácida",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 7,
            "created_at": null,
            "updated_at": null,
            "name": "Roseira",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 8,
            "created_at": null,
            "updated_at": null,
            "name": "Planta de cobertura de solo",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 9,
            "created_at": null,
            "updated_at": null,
            "name": "Planta florestal",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 10,
            "created_at": null,
            "updated_at": null,
            "name": "Planta trepadeira",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 11,
            "created_at": null,
            "updated_at": null,
            "name": "bolbo",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 12,
            "created_at": null,
            "updated_at": null,
            "name": "Semente de legume",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 13,
            "created_at": null,
            "updated_at": null,
            "name": "Semente aromática",
            "scientific_name": null,
            "description": null
        },
        {
            "id": 14,
            "created_at": null,
            "updated_at": null,
            "name": "Planta vivaz",
            "scientific_name": null,
            "description": null
        }
    ],
    "message": "types",
    "result": "OK",
    "code": 200
}
```

### HTTP Request
`GET api/types`


<!-- END_3927d9858a98b64816c08b1fb902df4b -->

<!-- START_450e9f1f51a04fa8c30f4eb62d2cfcf3 -->
## Display the specified type of plantae.

> Example request:

```bash
curl -X GET -G "http://localhost/api/types/1" \
    -H "Content-Type: application/json" \
    -d '{"name":"eveniet","scientific_name":"labore","description":"rerum"}'

```

```javascript
const url = new URL("http://localhost/api/types/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "eveniet",
    "scientific_name": "labore",
    "description": "rerum"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "created_at": null,
        "updated_at": null,
        "name": "Árvore de fruto",
        "scientific_name": null,
        "description": null
    },
    "message": "specific type",
    "result": "OK",
    "code": 200
}
```

### HTTP Request
`GET api/types/{type}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | required |  optional  | string name of the category
    scientific_name | string |  optional  | scientific name of the category
    description | string |  optional  | description of the category

<!-- END_450e9f1f51a04fa8c30f4eb62d2cfcf3 -->

