<style>
    body{
        margin: 0;
        background-color: aliceblue;
        font-family: sans-serif;
        background-color: azure;
    }
    aside{
        width: 10%;
        >.asideWrapper{
            background-color: #ffcccc;
            position: fixed;
            height: 100%;
            overflow: auto;
            padding: 1%;
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                background-color: #ffcccc;
            }

            li a {
                display: block;
                color: #000;
                padding: 8px 16px;
                text-decoration: none;
                cursor: pointer;
                margin: 2% 0;
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

    }
</style>
<aside>
    <div class="asideWrapper">
        <h3>CRUD Productos</h3>
        <ul>
            <li><a href="seeProducts.php">Ver Productos</a></li>
            <li><a href="newProduct.php">Introducir Producto</a></li>
            <li><a href="productStock.php">Stock Productos</a></li>
        </ul>
    </div>
</aside>
