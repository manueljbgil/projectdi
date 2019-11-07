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
[
    {
        "id": 2,
        "created_at": "2019-11-05 00:53:25",
        "updated_at": "2019-11-05 15:55:47",
        "name": "aveiro",
        "description": "pequeno jardim",
        "image": "backyardImages\/CPFAubp7sphpZlyQAk65gBfDONqdZEDc1ehn82yo.jpeg",
        "user_id": 1,
        "user": {
            "id": 1,
            "name": "Administrator",
            "email": "admin@tdi.pt",
            "email_verified_at": null,
            "role_id": 1,
            "created_at": "2019-11-05 00:53:15",
            "updated_at": "2019-11-05 00:53:15",
            "deleted_at": null
        }
    },
    {
        "id": 3,
        "created_at": "2019-11-05 00:53:38",
        "updated_at": "2019-11-05 00:53:38",
        "name": "trofa",
        "description": "medio jardim",
        "image": null,
        "user_id": 1,
        "user": {
            "id": 1,
            "name": "Administrator",
            "email": "admin@tdi.pt",
            "email_verified_at": null,
            "role_id": 1,
            "created_at": "2019-11-05 00:53:15",
            "updated_at": "2019-11-05 00:53:15",
            "deleted_at": null
        }
    },
    {
        "id": 11,
        "created_at": "2019-11-05 14:49:57",
        "updated_at": "2019-11-05 15:47:15",
        "name": "manuel",
        "description": "jardim piqueno",
        "image": "backyardImages\/8IJCU9iIKQ07Ui5363GIn60L3rD9AdXlsfYePUkx.jpeg",
        "user_id": 1,
        "user": {
            "id": 1,
            "name": "Administrator",
            "email": "admin@tdi.pt",
            "email_verified_at": null,
            "role_id": 1,
            "created_at": "2019-11-05 00:53:15",
            "updated_at": "2019-11-05 00:53:15",
            "deleted_at": null
        }
    },
    {
        "id": 14,
        "created_at": "2019-11-05 17:02:05",
        "updated_at": "2019-11-05 17:02:05",
        "name": "yo",
        "description": "lindo",
        "image": "backyardImages\/97P0dmFb33hMzYJQ12veDPtoqqF9kJWW6IyCpvTn.jpeg",
        "user_id": 1,
        "user": {
            "id": 1,
            "name": "Administrator",
            "email": "admin@tdi.pt",
            "email_verified_at": null,
            "role_id": 1,
            "created_at": "2019-11-05 00:53:15",
            "updated_at": "2019-11-05 00:53:15",
            "deleted_at": null
        }
    },
    {
        "id": 15,
        "created_at": "2019-11-05 21:26:22",
        "updated_at": "2019-11-05 21:26:22",
        "name": "yolo",
        "description": "lindo",
        "image": null,
        "user_id": 1,
        "user": {
            "id": 1,
            "name": "Administrator",
            "email": "admin@tdi.pt",
            "email_verified_at": null,
            "role_id": 1,
            "created_at": "2019-11-05 00:53:15",
            "updated_at": "2019-11-05 00:53:15",
            "deleted_at": null
        }
    }
]
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
    -d '{"name":"quae","description":"cum","image":"tempore","user_id":19}'

```

```javascript
const url = new URL("http://localhost/api/backyards");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "quae",
    "description": "cum",
    "image": "tempore",
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
    -d '{"id":7}'

```

```javascript
const url = new URL("http://localhost/api/backyards/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 7
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
    -d '{"name":"mollitia","description":"similique","image":"quia","user_id":2}'

```

```javascript
const url = new URL("http://localhost/api/backyards/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name": "mollitia",
    "description": "similique",
    "image": "quia",
    "user_id": 2
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
    -d '{"id":9}'

```

```javascript
const url = new URL("http://localhost/api/backyards/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "id": 9
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

#PlantLib management


Methods for managing Plants Library
<!-- START_6e45b7ea7ff9f9c3facd48be0035d22c -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/plantlib" 
```

```javascript
const url = new URL("http://localhost/api/plantlib");

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
[]
```

### HTTP Request
`GET api/plantlib`


<!-- END_6e45b7ea7ff9f9c3facd48be0035d22c -->

<!-- START_1bf2cbbb7bbf80fe382a9aac2ecf1233 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/plantlib" 
```

```javascript
const url = new URL("http://localhost/api/plantlib");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/plantlib`


<!-- END_1bf2cbbb7bbf80fe382a9aac2ecf1233 -->

<!-- START_f7409976dfbe0314c3d3ed51235a2104 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/plantlib/1" 
```

```javascript
const url = new URL("http://localhost/api/plantlib/1");

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
    "message": "No query results for model [App\\PlantLib] 1"
}
```

### HTTP Request
`GET api/plantlib/{plantlib}`


<!-- END_f7409976dfbe0314c3d3ed51235a2104 -->

<!-- START_d613407990e8ae8d2684f7287832c2a6 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/plantlib/1" 
```

```javascript
const url = new URL("http://localhost/api/plantlib/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/plantlib/{plantlib}`

`PATCH api/plantlib/{plantlib}`


<!-- END_d613407990e8ae8d2684f7287832c2a6 -->

<!-- START_4c609369e7702c530ac6ac96bc4075b9 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/plantlib/1" 
```

```javascript
const url = new URL("http://localhost/api/plantlib/1");

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
`DELETE api/plantlib/{plantlib}`


<!-- END_4c609369e7702c530ac6ac96bc4075b9 -->

#Plant management


Methods for managing Plants
<!-- START_b3c1e119b06f23f4d7015da9496a8782 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/plants" 
```

```javascript
const url = new URL("http://localhost/api/plants");

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
[]
```

### HTTP Request
`GET api/plants`


<!-- END_b3c1e119b06f23f4d7015da9496a8782 -->

<!-- START_0e4b761a05616d97d389d39f5e7b935f -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/plants" 
```

```javascript
const url = new URL("http://localhost/api/plants");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/plants`


<!-- END_0e4b761a05616d97d389d39f5e7b935f -->

<!-- START_0d78cbc94b2deb802a86fd3f7b3c655a -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/plants/1" 
```

```javascript
const url = new URL("http://localhost/api/plants/1");

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
    "message": "No query results for model [App\\Plant] 1"
}
```

### HTTP Request
`GET api/plants/{plant}`


<!-- END_0d78cbc94b2deb802a86fd3f7b3c655a -->

<!-- START_0a075d1a9aab2fc6ebe118ade4e862fa -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/plants/1" 
```

```javascript
const url = new URL("http://localhost/api/plants/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/plants/{plant}`

`PATCH api/plants/{plant}`


<!-- END_0a075d1a9aab2fc6ebe118ade4e862fa -->

<!-- START_312a63e3a7452952399f53b01949e6c1 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/plants/1" 
```

```javascript
const url = new URL("http://localhost/api/plants/1");

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
`DELETE api/plants/{plant}`


<!-- END_312a63e3a7452952399f53b01949e6c1 -->

#TreeLib management


Methods for managing Trees Library
<!-- START_45e240e759ee38283bdb82cf3a015654 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/treelib" 
```

```javascript
const url = new URL("http://localhost/api/treelib");

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
[
    {
        "id": 1,
        "created_at": "2019-11-05 21:00:39",
        "updated_at": "2019-11-05 21:00:39",
        "image": "TreeLibImages\/lsR7hqwQbMDZSLNxqJhpA5rSihDrpueN5c7L1VMu.jpeg",
        "tree_id": 1
    }
]
```

### HTTP Request
`GET api/treelib`


<!-- END_45e240e759ee38283bdb82cf3a015654 -->

<!-- START_bc3638a351ddab1c75ead2b811f05c72 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/treelib" 
```

```javascript
const url = new URL("http://localhost/api/treelib");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/treelib`


<!-- END_bc3638a351ddab1c75ead2b811f05c72 -->

<!-- START_d7d6b26a28cbe5c0df5b14bd9b1162e7 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/treelib/1" 
```

```javascript
const url = new URL("http://localhost/api/treelib/1");

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
    "id": 1,
    "created_at": "2019-11-05 21:00:39",
    "updated_at": "2019-11-05 21:00:39",
    "image": "TreeLibImages\/lsR7hqwQbMDZSLNxqJhpA5rSihDrpueN5c7L1VMu.jpeg",
    "tree_id": 1
}
```

### HTTP Request
`GET api/treelib/{treelib}`


<!-- END_d7d6b26a28cbe5c0df5b14bd9b1162e7 -->

<!-- START_e3500cabecefd92a8fc3a1605da5d15b -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/treelib/1" 
```

```javascript
const url = new URL("http://localhost/api/treelib/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/treelib/{treelib}`

`PATCH api/treelib/{treelib}`


<!-- END_e3500cabecefd92a8fc3a1605da5d15b -->

<!-- START_acee8214394222f951774da274696a64 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/treelib/1" 
```

```javascript
const url = new URL("http://localhost/api/treelib/1");

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
`DELETE api/treelib/{treelib}`


<!-- END_acee8214394222f951774da274696a64 -->

#Tree management


Methods for managing Trees
<!-- START_da9230ceb5de41a8bebada842a653621 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/trees" 
```

```javascript
const url = new URL("http://localhost/api/trees");

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
[
    {
        "id": 1,
        "created_at": "2019-11-05 17:05:39",
        "updated_at": "2019-11-05 17:05:39",
        "name": "carvalho",
        "planted_at": null,
        "description": "é bonito",
        "backyard_id": 2
    },
    {
        "id": 2,
        "created_at": "2019-11-05 21:00:04",
        "updated_at": "2019-11-05 21:00:04",
        "name": "eucalipto",
        "planted_at": null,
        "description": "é feio",
        "backyard_id": 2
    }
]
```

### HTTP Request
`GET api/trees`


<!-- END_da9230ceb5de41a8bebada842a653621 -->

<!-- START_1806d3d3d9587b608d6d48c9a390c647 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost/api/trees" 
```

```javascript
const url = new URL("http://localhost/api/trees");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/trees`


<!-- END_1806d3d3d9587b608d6d48c9a390c647 -->

<!-- START_f85abc225ce14ccf29b95c6a1d269ebb -->
## Display the specified resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/trees/1" 
```

```javascript
const url = new URL("http://localhost/api/trees/1");

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
    "id": 1,
    "created_at": "2019-11-05 17:05:39",
    "updated_at": "2019-11-05 17:05:39",
    "name": "carvalho",
    "planted_at": null,
    "description": "é bonito",
    "backyard_id": 2
}
```

### HTTP Request
`GET api/trees/{tree}`


<!-- END_f85abc225ce14ccf29b95c6a1d269ebb -->

<!-- START_7a4a7d25c4f898a16d7f726fb689ee27 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost/api/trees/1" 
```

```javascript
const url = new URL("http://localhost/api/trees/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/trees/{tree}`

`PATCH api/trees/{tree}`


<!-- END_7a4a7d25c4f898a16d7f726fb689ee27 -->

<!-- START_e87696114992bdf9ca05608993a3bc1c -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/trees/1" 
```

```javascript
const url = new URL("http://localhost/api/trees/1");

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
`DELETE api/trees/{tree}`


<!-- END_e87696114992bdf9ca05608993a3bc1c -->


