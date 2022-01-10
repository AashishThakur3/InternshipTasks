

<?php

/* @var $this yii\web\View */
/*
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="index.php?r=admin">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>*/




/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

<?php
    $msg = yii::$app->getSession()->getFlash('success');
    if(null !== $msg): ?>
    <div class="alert alert-success"><?= $msg; ?></div>
    <?php endif ?>

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Welcome To Benchmark Pvt. Ltd.</h1>

        <p class="lead">Our mission lies in our brand name- we are the leaders amongst the Broadband service providers in India who focus on YOU, our customers. The internet is what drives today’s society. People now require high-speed internet for almost every task, which is why data connectivity has become a necessity. If you are looking for a reliable internet service provider in Mumbai and across India, contact YOU broadband. We offer attractive packages coupled with excellent services for you. As a subsidiary of Vodafone Idea Limited, YOU Broadband has progressed as a category ‘A’; high-speed internet service provider and India’s foremost ISO credited broadband service provider with 18 years of experience.</p>

        <p><a class="btn btn-lg btn-success" href="index.php?r=about">Know About Us</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>CORPORATE LEASED LINE</h2>

                <p>For enterprises with requirements of high internet connection speeds and multiple user connections 
                    simultaneously, we offer top of the line Leased line connection. For Enterprises on the Go!.</p>

                <p><a class="btn btn-outline-secondary" href="index.php?r=about"> Get More Info..  &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>BROADBAND FOR HOME USERS</h2>

                <p>Let us be your Gateway to the World of Internet. We offer High
                     Speed internet, safe browsing, cost-effective prices and Technical Support to Home Users.</p>
<br>

                <p><a class="btn btn-outline-secondary" href="index.php?r=about">Get More Info.. &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>BROADBAND FOR BUSINESS USERS</h2>

                <p>For SMEs we offer cost-effective dedicated bandwidth ensuring reliable high-speed 
                    business connectivity with higher bandwidth and speed backed by state-of-the-art technology.</p>
                    <br>
                <p><a class="btn btn-outline-secondary" href="index.php?r=about">Get More Info..  &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
