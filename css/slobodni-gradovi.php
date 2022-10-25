<style>
  /********** MAPA *********/
  /* u slobodni-gradovi.php ima inline css-a zbog iframe-a */

  .slobodni-gradovi {
    margin-bottom: 10px;
    text-align: center;
  }

  .slobodni-gradovi h1 {
    font-size: 38px;
  }

  .izbor-datuma input {
    width: 60px;
  }

  .izbor-datuma button {
    margin-left: 4px;
  }

  .ratne-godine {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 20px;
  }

  .ratna-godina {
    background: #ddd;
    display: inline-block;
    margin: 0;
    padding: 10px 20px;
  }

  .ratna-godina:hover,
  .ova-godina {
    background: darkred;
    color: #ddd;
  }

  .ratne-godine a {
    color: darkred;
  }

  .drzac-mape {
    margin-top: 30px;
  }

  .mapa-frejm {
    border: 0;
    display: block;
    width: 100%;
  }

  .legenda {
    background: #EEEEEE;
    position: absolute;
  }

  .legenda {
    margin-top: 0;
  }

  .legenda-kruzic {
    display: inline-block;
    width: 12px;
    height: 12px;
    background: red;
    border-radius: 6px;
  }

  @media (max-width: 767px) {
    .ratne-godine {
      font-size: 25px;
    }

    .legenda {
      bottom: 10px;
      left: 10px;
      padding: 10px;
    }

    .mapa-frejm {
      height: 600px;
    }
  }

  @media (min-width: 768px) {
    .ratne-godine {
      font-size: 40px;
    }

    .legenda {
      bottom: 20px;
      left: 20px;
      padding: 20px;
    }

    .mapa-frejm {
      height: 700px;
    }
  }
</style>