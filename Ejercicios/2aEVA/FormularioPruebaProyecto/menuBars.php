<style>
    body{
        margin: 0;
        background-color: aliceblue;
    }
    header{
        text-align: center;
        background-color: pink;
        padding: 1%;
        margin: 0;
        >h1{
            margin:0;
        }
    }
    aside{
        width: 10%;
        background-color: #ffcccc;
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #ffcccc;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
            cursor: pointer;
        }

        li a.active {
            background-color: #ff9999;
            color: white;
        }

        li a:hover:not(.active) {
            background-color: #ff9999;
            color: white;
        }
    }
</style>
<header>
    <h1>CRUD Productos</h1>
</header>
<aside>
    <ul>
        <li><a href="newProduct.php">Introducir Producto</a></li>
        <li><a href="">Ver Productos</a></li>
        <li><a href="productStock.php">Stock Productos</a></li>
        <li><a>Eliminar Productos</a></li>
    </ul>
</aside>
