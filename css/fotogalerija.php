<style>
	.flex-between {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
	}

	.okvir-slike {
		display: inline-block;
		position: relative;
		height: 215px;
		font-family: Courier;
		font-size: 12px;
		margin-bottom: 10px;
	}

	.galerija-slika {
		min-width: 100px;
	}

	.slike,
	.galerija-slika {
		transition: filter 1.2s ease;
		filter: sepia(0);
	}

	.slike:hover,
	.galerija-slika:hover {
		filter: sepia(0.5);
	}

	.tekst-opis,
	.opis-slike {
		overflow: hidden;
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		max-height: 28px;
		background: #fefefe;
	}

	.trenutna_stranica {
		border-color: DarkSalmon;
	}

	.strelice {
		display: flex;
		justify-content: space-between;
	}
</style>