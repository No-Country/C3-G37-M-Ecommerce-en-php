<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<link rel="stylesheet" href="https://dert98.github.io/Porfolio/global.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<body>
    <div id="app">
        <div v-if="productos.length" class="text-center">
            <h1 for="">Carrito de compras</h1>
            <table class="">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo del libro</th>
                        <th>Precio</th>
                        <th>Precio Total</th>
                        <th>Cantidad</th>
                        <th>operando</th>
                    </tr>
                </thead>
                <tr v-for="(item,index) in productos">
                    <td>{{item.id}}</td>
                    <td>{{item.nombre}}</td>
                    <td>{{item.price | showPrice}}</td>
                    <td>{{item.cantpb}}</td>
                    <td>
                        <! - v-bind: disabled="item.count <= 1" Cuando es verdadero, el control puede interactuar, cuando es falso, ya no puede interactuar ->
                            <button @click="decrement(index)" v-bind:disabled="item.count<=1">-</button>
                            {{item.count}}
                            <button @click="increment(index)">+</button>
                    </td>
                    <td><button @click="del(index)">Eliminar</button></td>
                </tr>
                <tbody></tbody>
            </table>
        </div>
        <label for="">Total a pagar es: {{sum}}</label>
        <label for="">la cantidad de productos es: {{cantp}}</label>
        <h2 v-else>El Carro de Compras está Vacío</h2>
    </div>
    <script src="../Assets/js/app.js"></script>