<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Add Products</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="author" content="James Hassall, Daniel Coady, Jake Beltrami, Gareth Clauson">
            <meta name="description" content="Sales reporting software">
            <meta name="keywords" content="Sales,Reporting,Software">
        </head>
        <!-- 
            Top navigation bar,specify "navbar" for css 
            Home is always going to be active on this page
            and highlight which page the user is on

            TODO: implement CSS
        -->
        <?php include "header.php" ?>
        <body>
            <main class="container lead">
                <div class="row">
                    <h1 class="display-1">Add products</h1>
                </div>
                <?php include "add_products_process.php" ?>
                <div class="row">
                    <form action="add_products.php" method="post">
                        <label for="product_code">Product Code: </label>
                        <input type="text" name="product_code" id="product_code"/><br />

                        <label for="name">Name: </label>
                        <input type="text" name="name" id="name"/><br />

                        <label for="quantity_on_hand">Quantity on hand: </label>
                        <input type="text" name="quantity_on_hand" id="quantity_on_hand"/><br />

                        <label for="price">Price: </label>
                        <input type="text" name="price" id="price"/><br />

                        <label for="comment">Comment: </label>
                        <input type="text" name="comment" id="comment"/><br />
                        <input type="submit" value="Add Product" />
                    </form>
                </div>
                <div id="debug">
                </div>
            </main>
        </body>
    </html>