<style>
  /********* POJAM *********/

  .slika-ustanak {
    width: 175px;
    float: right;
  }

  .promeni-naziv {
    position: absolute;
    right: 0;
  }

  .podeok {
    overflow-y: auto;
    padding: 0 4px;
    background: #eee;
  }

  .podeok a {
    color: inherit;
  }

  .dokumenti p:first-line {
    font-weight: bold;
  }

  .fotografije {
    max-height: 480px;
    min-height: 200px;
    margin-top: 10px;
  }

  /***** RESPONSIVE *****/

  @media (max-width: 767px) {
    .slika-ustanak {
      width: 150px;
    }

    .hronologija {
      margin-bottom: 10px;
    }

    .hronologija,
    .dokumenti {
      max-height: 600px;
    }

    .slike {
      margin-bottom: 2px;
    }
  }

  @media (min-width: 768px) {
    .dve-kolone {
      display: flex;
    }

    .hronologija-drzac {
      width: 75%;
      margin-right: 1%;
    }

    .hronologija,
    .dokumenti {
      max-height: 800px;
    }

    .slike {
      margin: 10px;
    }
  }
</style>