<?php
namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        ob_start(); // Start capturing output

        ?>
        <!DOCTYPE HTML>
        <html>
        <head>
            <title>Profile - <?php echo $profile->getFounder(); ?></title>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
            <link rel="stylesheet" href="/assets/css/main.css" />
        </head>
        <body class="single is-preload">
            <!-- Wrapper -->
            <div id="wrapper">
                <!-- Header -->
                <header id="header">
                    <h1><a href="index.php">Profile of <?php echo $profile->getFounder(); ?></a></h1>
                    <nav class="links">
                        <ul>
                            <li><a href="https://www.auf.edu.ph/home/index.php">Home</a></li>
                            <li><a href="https://www.auf.edu.ph/home/articles.php?article=10">About</a></li>
                            <li><a href="https://www.auf.edu.ph/home/articles.php?article=128">Contact</a></li>
                        </ul>
                    </nav>
                    <nav class="main">
                        <ul>
                            <li class="search">
                                <a class="fa-search" href="#search">Search</a>
                                <form id="search" method="get" action="#">
                                    <input type="text" name="query" placeholder="Search" />
                                </form>
                            </li>
                            <li class="menu">
                                <a class="fa-bars" href="#menu">Menu</a>
                            </li>
                        </ul>
                    </nav>
                </header>

                <!-- Main -->
                <div id="main">
                    <!-- Post -->
                    <article class="post">
                        <header>
                            <div class="title">
                                <h1>The Founder</h1>
                                <h2><?php echo $profile->getFounder(); ?></h2>
                                <p>A Biography</p>
                            </div>
                            <div class="meta">
    <time class="published" datetime="2024-09-28">2024-09-28</time>
    <a href="https://www.auf.edu.ph/home/index.php" class="author">
        <span class="name">AUF</span>
        <img src="https://auf.edu.ph/images/auf-logo.png" alt="AUF Logo" style="width: 50px; height: auto; border-radius: 50%;" />
    </a>
</div>

                        </header>
                        <?php if ($profile->getImage()) { ?>
                            <span class="image featured"><img src="<?php echo $profile->getImage(); ?>" alt="Founder Image" /></span>
                        <?php } ?>
                        <?php
                        foreach ($profile->getSections() as $section) {
                            echo "<h3>" . $section['title'] . "</h3>";
                            foreach ($section['paragraphs'] as $paragraph) {
                                echo "<p>" . $paragraph . "</p>";
                            }
                        }
                        ?>
                        <footer>
                            <ul class="stats">
                                <li><a href="#">General</a></li>
                                <li><a href="#" class="icon solid fa-heart">28</a></li>
                                <li><a href="#" class="icon solid fa-comment">128</a></li>
                            </ul>
                        </footer>
                    </article>
                </div>

                <!-- Footer -->
                <section id="footer">
                    <ul class="icons">
                        <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
                        <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
                    </ul>
                    <p class="copyright">&copy; AUF. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
                </section>
            </div>

            <!-- Scripts -->
            <script src="/assets/js/jquery.min.js"></script>
            <script src="/assets/js/browser.min.js"></script>
            <script src="/assets/js/breakpoints.min.js"></script>
            <script src="/assets/js/util.js"></script>
            <script src="/assets/js/main.js"></script>
        </body>
        </html>
        <?php

        $this->response = ob_get_clean(); // Get the captured output
    }

    public function render()
    {
        return $this->response;
    }
}
