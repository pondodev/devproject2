<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Sales Reporting</title>
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
        <header>
        <nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">
            <a class="active" href="#main">Home</a>
            <a href="#login">Login</a>
            <a href="#addproducts">Add Products</a>
            <a href="#showproducts">Show Proucts</a>
            <a href="#editproducts">Edit Products</a>
        </nav>
        </header>
        <body>
            <main class="container lead">
                <div class="row">
                    <h1 class="displat-1">Sales Reporting and Prediction System</h1>
                </div>

                <div class="row">
                    <p>
                        Welcome to the sales reporting and prediciton system. In order to access the system you must login first.
                        After you login you may browse the site as you wish, where you can view the current sales records, add new products,
                        show existing products as well as editing existing. You may also generate a report that will display the current
                        sales data for this month.
                    </p>
                </div>
                <div id="debug">
                </div>
            </main>
        </body>
    </html>