<?php
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Retry-After: 3600');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonne femme</title>  
    <meta name="description" content="une table, une signature">

    <style>
        body {
            margin: 0;
            padding: 0;
            /* width: 100vw;
            overflow-x: hidden; */
        }

        .parallax-container {
            position: relative;
            overflow-x: hidden;
            width: 100vw;
        }

        .bg,
        .fg {
            width: 110vw;
            top: 0px;
            left: -5vw;
            position: relative;
        }

        .bg {
            position: relative;
            aspect-ratio: 1770/775;
            height: auto;
            background-image: url("assets_maintenance/img/up-home-BF.jpg");
            background-size: cover;
            background-position: center top;
            background-repeat: no-repeat;
            z-index: -1;
        }

        .bg.hover {
            background-image: url("assets_maintenance/img/up-home-BF_orange.jpg");
            background-size: cover;
        }

        .bg img {
            width: 100%;
            height: auto;
        }

        .fg {
            position: relative;
            background-image: url("assets_maintenance/img/down-home-BF.png");
            background-size: cover;
            background-position: center top;
            background-repeat: no-repeat;
            /* width: 100vw; */
            height: auto;
            aspect-ratio: 1770/1988;
            z-index: 1;
        }

        .fg.hover {
            background-image: url("assets_maintenance/img/down-home-BF_orange.png");
            background-size: cover;
        }

        @media screen and (max-width: 768px) {

            .parallax-container {
                display: none;
            }

            /* .fg,
            .bg {
                width: 120vw;
                left: -10vw;
            }
            .bg {
                background-image: url("assets_maintenance/img/up-home-BF_mobile.jpg");
                background-size: cover;
                background-position: center top;
                background-repeat: no-repeat;
                aspect-ratio: 1770/1419;
                height: auto;
            }

            .bg.hover {
                background-image: url("assets_maintenance/img/up-home-BF_mobile_orange.jpg");
                background-size: cover;
            } */

            .bg-mobile {
                position: relative;
                background-image: url("assets_maintenance/img/bg_fg_full.jpg");
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
                height: auto;
                aspect-ratio: 1767/2596;
                z-index: -1;
                width: 100vw;
                height: 100vh;
            }
        }

        .fg img {
            width: 100%;
            height: auto;
        }

        .content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 2;
            width: 100%;
        }

        .under {
            flex: 0 0 auto;
            width: 175px;
            height: auto;
            margin-left: 5vw;
            cursor: pointer;
        }

        .logo {
            flex: 0 0 auto;
            width: 274px;
            height: auto;
            cursor: pointer;
        }

        .download {
            flex: 0 0 auto;
            width: 189px;
            height: auto;
            margin-right: 5vw;
            cursor: pointer;
        }

        .line {
            flex: 1 1 auto;
            height: 1px;
            background-color: white;
            margin: 0 20px;
        }

        @media screen and (max-width: 768px) {
            .line {
                width: 1px;
                margin: 20px 0;
            }

            .content {
                flex-direction: column;
                align-items: space-between;
                justify-content: center;
                height: 100%;
            }

            .under {
                flex: 0 0 auto;
                width: 175px;
                height: auto;
                margin-left: unset;
                margin-top: 5vw;
            }

            .logo {
                flex: 0 0 auto;
                width: 274px;
                height: auto;
            }

            .download {
                flex: 0 0 auto;
                width: 189px;
                height: auto;
                margin-right: unset;
                margin-bottom: 5vw;
            }
        }

        @media screen and (min-width: 768px) {
            .bg-mobile {
                display: none;
            }
            .parallax-container {
                position: relative;
                overflow-x: hidden;
                /* also hide overflow here */
                width: calc(100vw - 60px);
                /* height: 100vh; */
                top: 30px;
                left: 30px;
            }

            .frame {
                position: fixed;
                width: 100vw;
                height: 100vh;
                z-index: 30;
                border: 30px solid #fbe9e8;
                box-sizing: border-box;
                top: 0;
                left: 0;
                pointer-events: none;
            }
        }

        .background-load {
            position: absolute;
            bottom: 200vh;
            width: 1px;
            height: 1px;

        }

        .background-load img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="background-load">
        <img src="assets_maintenance/img/up-home-BF_orange.jpg" alt="">
        <img src="assets_maintenance/img/down-home-BF_orange.png" alt="">
        <!-- <img src="assets_maintenance/img/bg_fg_full_orange.jpg" alt=""> -->
        <img src="assets_maintenance/img/bg_fg_full.jpg" alt="">
    </div>
    <div class="bg-mobile"></div>
    <div class="parallax-container">
        <div class="bg"></div>
        <div class="fg"></div>
    </div>
    <div class="content">
        <img src="assets_maintenance/img/under.png" alt="" class="under">
        <div class="line"></div>
        <img src="assets_maintenance/img/logo_bonne_femme.png" alt="" class="logo">
        <div class="line"></div>
        <img src="assets_maintenance/img/download.png" alt="" class="download">
    </div>
    <div class="frame"></div>
    <script>
        const fg = document.querySelector(".fg");
        const bg = document.querySelector(".bg");
        const offset = 768 / 1988;

        let mouseX = 0;
        let windowWidth = window.innerWidth;

        let mt_fg = 0;

        const bgImage = new Image();

        bgImage.src = getComputedStyle(fg).backgroundImage.replace(/url\((['"])?(.*?)\1\)/, '$2');
        bgImage.onload = resize;


        // init

        document.addEventListener("DOMContentLoaded", () => {
            const children = document.querySelector('.content').children;

            for (let child of children) {
                child.addEventListener('mouseenter', () => {
                    bg.classList.add('hover');
                    fg.classList.add('hover');
                });
                child.addEventListener('mouseleave', () => {
                    bg.classList.remove('hover');
                    fg.classList.remove('hover');
                });
                child.addEventListener('click', () => {
                    window.open('assets_maintenance/pdf/Bonne_Femme_Presentation.pdf', '_blank');
                });
            }
        });




        window.addEventListener("resize", resize);

        // Listen mouse move
        window.addEventListener('mousemove', (e) => {

            window.addEventListener('mousemove', (e) => {
                mouseX = (e.clientX / windowWidth) * 2 - 1; // normalize -1 to 1

                // Max horizontal translation in px
                let maxHorizontalShiftBg = 20;
                let maxHorizontalShiftFg = 40;

                const maxAllowedShift = window.innerWidth * 0.05; // 5vw in px

                maxHorizontalShiftBg = Math.min(maxHorizontalShiftBg, maxAllowedShift);
                maxHorizontalShiftFg = Math.min(maxHorizontalShiftFg, maxAllowedShift);

                // Calculate horizontal shifts
                const horizontalShiftBg = -1 * mouseX * maxHorizontalShiftBg;
                const horizontalShiftFg = -1 * mouseX * maxHorizontalShiftFg;

                // Apply horizontal transform only (no vertical here!)
                bg.style.transform = `translateX(${horizontalShiftBg}px)`;
                fg.style.transform = `translateX(${horizontalShiftFg}px)`;
            });
        });

        function resize() {

            windowWidth = window.innerWidth;

            let bg_bound = bg.getBoundingClientRect();
            let bg_h = bg_bound.height;

            let fg_bound = fg.getBoundingClientRect();
            let fg_h = fg_bound.height;

            mt_fg = - fg_h * offset;

            fg.style.marginTop = `${mt_fg}px`;

            // lines
            // const under_bound = document.querySelector(".under").getBoundingClientRect();
            // const logo_bound = document.querySelector(".logo").getBoundingClientRect();
            // const download_bound = document.querySelector(".download").getBoundingClientRect();
        }

        window.addEventListener("scroll", () => {
            const fgRect = fg.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            const windowWidth = window.innerWidth;

            // Calculate progress of fg entering viewport from bottom (0 to 1)
            const progress = Math.min(Math.max((windowHeight - fgRect.top) / (windowHeight + fgRect.height), 0), 1);

            // How much to shift fg upward (tune multiplier as needed)
            const maxMarginShift = 400; // max pixels fg will move up over scroll duration

            const offsetH = 100;

            if (windowWidth < 768) {
                maxMarginShift = 00;
                offsetH = 0
            }

            // Calculate margin-top as negative to pull fg up
            const marginTopShift = -progress * maxMarginShift + mt_fg + offsetH;

            // Apply margin-top with px unit
            fg.style.marginTop = `${marginTopShift}px`;
        });
    </script>
</body>

</html>