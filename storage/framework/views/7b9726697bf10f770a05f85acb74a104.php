<header data-add-bg="" class="header bg-white js-header" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container px-30 sm:px-20 is-in-view">
        <div class="row justify-between items-center">
            <div class="col-auto">
                <div class="d-flex items-center">
                    <a href="index.html" class="header-logo mr-20" data-x="header-logo" data-x-toggle="is-logo-dark">
                        <img src="<?php echo e(asset('assets/images/general/logo-dark.svg')); ?>" alt="logo icon">
                        <img src="<?php echo e(asset('assets/images/general/logo-dark.svg')); ?>" alt="logo icon">
                    </a>
                    <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
                        <div class="mobile-overlay"></div>
                        <div class="header-menu__content">
                        <div class="mobile-bg js-mobile-bg"></div>
                        <div class="menu js-navList">
                            <ul class="menu__nav text-dark -is-active">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="tour-list.html">Destinations</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                        <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex items-center">
                    <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                        <a href="signup.html" class="button px-30 fw-400 text-14 -outline-blue-1 h-50 text-blue-1 ml-20">Sign In / Register</a>
                    </div>
                    <div class="d-none xl:d-flex x-gap-20 items-center pl-30" data-x="header-mobile-icons" data-x-toggle="text-white">
                        <div><a href="login.html" class="d-flex items-center icon-user text-inherit text-22"></a></div>
                        <div><button class="d-flex items-center icon-menu text-20" data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header><?php /**PATH D:\laragon\laragon\www\travel\resources\views/user-pages/header.blade.php ENDPATH**/ ?>