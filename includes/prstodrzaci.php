<style>
  /* gore i dole su kruzici, levo i desno polukruzi, da ne prelivaju negativne margine */

  .kruzic {
    width: 40px;
    height: 40px;
    border-radius: 50%;
  }

  @media (max-width: 767px) {
    .prstodrzac {
      position: absolute;
      z-index: 9;
    }

    .prstodrzac-gore,
    .prstodrzac-dole {
      background: rgba(69, 54, 37, 0.2);
      left: calc(50% - 20px);
    }

    .prstodrzac-gore {
      top: -25px;
    }

    .prstodrzac-dole {
      bottom: -25px;
    }

    .polukrug-desno,
    .polukrug-levo {
      background: rgba(69, 54, 37, 0.4);
      height: 40px;
      top: calc(50% - 20px);
      width: 20px;
    }

    .polukrug-levo {
      border-radius: 0 40px 40px 0;
      left: 0;
    }

    .polukrug-desno {
      border-radius: 40px 0 0 40px;
      right: 0;
    }
  }
</style>

<div class="hide-lg kruzic prstodrzac prstodrzac-gore"></div>
<div class="hide-lg kruzic prstodrzac prstodrzac-dole"></div>
<div class="hide-lg prstodrzac polukrug-levo"></div>
<div class="hide-lg prstodrzac polukrug-desno"></div>