<?php
require __DIR__ . "/back_end/model.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <div id="container">
            <div class="items">   
                <?php foreach (getItems(1, 4) as $item): ?>
                    <div class="item">
                        <div class="img">
                            <img src="<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>">
                        </div>
                        <h1><?php echo $item['title']; ?></h1>
                        <p><?php echo $item['description']; ?></p>
                        
                        <span class="cost">
                            $<?php echo number_format($item['discountCost'] ? $item['discountCost'] : $item['cost'], 2, '.', ''); ?>
                        </span>

                        <?php if ($item['discountCost'] !== null): ?>
                            <span class="red_cost">
                                $<?php echo number_format($item['cost'], 2, '.', ''); ?>
                            </span>
                            <div class="sale"><span>Sale</span></div>
                        <?php endif; ?>
                        <?php if ($item['new']): ?>
                            <div class="new"><span>New</span></div>
                        <?php endif; ?>
                        <div class="btns">
                            <a href="#" class="btn add"><span>add to cart</span></a>
                            <a href="#" class="btn view"><span>view</span></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <button id="btn" class="load"><span>Load more</span></button>
        <div class="cards">
            <div class="item">
                <h1>hot offers</h1>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit magna</p>
                <ul>
                    <li><span>Vestibulum ante ipsum primis in faucibus orci luctus</span></li>
                    <li><span>Nam elit magna hendrerit sit amet tincidunt ac</span></li>
                    <li><span>Quisque diam lorem interdum vitae dapibus ac scele</span></li>
                    <li><span>Donec eget tellus non erat lacinia fermentum</span></li>
                    <li><span>Donec in velit vel ipsum auctor pulvin</span></li>
                </ul>
            </div>
            <div class="item">
                <h1>hot offers</h1>
                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. Nam elit magna</p>
                <ul>
                    <li><span>Vestibulum ante ipsum primis in faucibus orci luctus</span></li>
                    <li><span>Nam elit magna hendrerit sit amet tincidunt ac</span></li>
                    <li><span>Quisque diam lorem interdum vitae dapibus ac scele</span></li>
                    <li><span>Donec eget tellus non erat lacinia fermentum</span></li>
                    <li><span>Donec in velit vel ipsum auctor pulvin</span></li>
                </ul>
            </div>
            <div class="item info">
                <h1>Store information</h1>
                <ul>
                    <li><span>Company Inc., 8901 Marmora Road, Glasgow, D04 89GR</span></li>
                    <li><span>Call us now toll free: (800) 2345-6789</span></li>
                    <li><span>Customer support: support@example.com <br> Press: pressroom@example.</span></li>
                    <li><span>Skype: sample-username</span></li>
                </ul>
            </ul>
        </div>
    </div>
    <script src="js/script.js"></script>
</div>
</body>
</html>