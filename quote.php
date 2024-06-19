<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get a Quote - Health Insurance</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="css/quote.css">
</head>
<body>

    <header>
        <?php
            include("header.php");
        ?>
    </header>
    
    <div class="container">
        <h2>Get a Quote</h2>
        <form action="#">
            <input type="text" placeholder="Enter your name" id="name" name="name" required>

            <input type="tel" placeholder="Enter your number" id="contact" name="contact" required>

            <input type="email" placeholder="Enter your email" id="email" name="email" required>

            <input type="text" placeholder="Enter your budget" id="budget" name="budget">

            <textarea id="additional" placeholder="Enter addition information" name="additional" rows="4"></textarea>

            <button type="submit" class="btn-primary">Get My Quotation</button>
        </form>
    </div>

    <div class="bottom-container">
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>
