@extends('layouts.app')

@section('content')
    <div id="wrap1">
        <div id="wrap2">

            <header>
                <!-- Insert a link to your logo into the src attribute. If you don't have a logo yet, replace the img tag with you company's name -->
                <h1 id="logo"><!--<img src="wqd" alt="Your company name" />--></h1>
            </header>

            <div class="container">
                <div id="intro">
                    <!-- A header -->
                    <h2>
                        拾纷正在建设...
                    </h2>
                    <!-- Some inroduction text. Let the users know what your website is about -->
                    <div class="lead">
                        拾纷旨在提供班级互联、通知发布、登记投票、签到请假、资源整合等功能。<br>
                        拾纷-时纷-记忆留存<br>
                        拾纷是作者的第一个php项目，采用MVC框架敏捷开发，我们仍在学习
                        项目进度：
                    </div>
                </div><!-- end #intro -->

                <!-- Do not edit this code unless you know what you are doing! It displays a countdown or a progress bar depending on your config.php -->
                <div id="progress" class="progressbar">
                    <div class="progress" data-progress="10%"><span>10%</span></div>
                </div>
            </div><!-- end .container -->

            <!-- Only display a subscription form if the $newsletter_mode is not blank -->
            <hr class="divider-top" />
            <div class="container">
                <div id="subscription">

                    <!-- A little header to let the users know why they should subscribe -->
                    <h3>
                        Subscribe to get notified when we launch
                    </h3>

                    <form id="subscribe" />
                    <input type="email" id="email" class="span5" name="email" placeholder="Enter your email adress" />
                    <input type="submit" id="subscribe-submit" class="btn" value="Subscribe" data-done="Subscribed!" />
                    </form>
                    <div id="response"></div>
                </div><!-- end #subscription -->
            </div><!-- end .container -->

        </div><!-- end #wrap2 -->
    </div><!-- end #wrap1 -->

    <footer>
    </footer>

    <!-- Scripts and stuff -->
    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
    <script>window.jQuery || document.write('<script src="assets/js/jquery-1.8.1.min.js"><\/script>')</script>

    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/js/custom.js"></script>

@endsection