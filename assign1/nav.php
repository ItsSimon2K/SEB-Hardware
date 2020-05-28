<?php $pathname = basename($_SERVER["SCRIPT_NAME"]); ?>
<header id="app-header">
    <nav class="app-header__nav container">
        <div class="app-header__nav__logo">
            <a href="index.php">
                <img src="images/logo.svg" alt="SEB Hardware logo" />
            </a>
        </div>
        <div class="app-header__nav__menu">
            <ul class="app-header__nav__menu__list">
                <li id="navProducts" class="app-header__nav__menu__list__item <?php if ($pathname == "products.php") { echo "app-header__nav__menu__list__item--active"; } ?>">
                    <a href="products.php">PRODUCTS</a>
                </li>
                <li class="app-header__nav__menu__list__item <?php if ($pathname == "enquiry.php") { echo "app-header__nav__menu__list__item--active"; } ?>">
                    <a href="enquiry.php">ENQUIRY</a>
                </li>
                <li id="navAbouts" class="app-header__nav__menu__list__item <?php if ($pathname == "about.php") { echo "app-header__nav__menu__list__item--active"; } ?>">
                    <a href="about.php">ABOUT</a>
                </li>
            </ul>
        </div>
    </nav>
</header>