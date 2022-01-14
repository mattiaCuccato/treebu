CUCCATO MATTIA [prova pratica ITINERE]
#
client -> VueJS

server -> Laravel

database -> treebu
#
ESECUZIONE:

client -> 1. npm install / yarn install
	  2. npm run serve / yarn serve

server -> 1. composer install / composer update
	  2. php artisan migrate (assicurarsi di aver creato il db)
	  3. php artisan serve
#
ROUTE:

/list -> visualizza tutti i terreni

/detail/{id} -> visualizza il dettaglio di un terreno

/create -> inserisce un nuovo terreno

/update -> modifica un terreno selezionato
#
ENDPOINT BACK-END:

/list -> ritorna la lista dei terreni caricati dal più recente

/list/dimensione-desc -> visualizza la lista dei terreni in base alla dimensione (discendente)

/list/dimensione-asc -> visualizza la lista dei terreni in base alla dimensione (ascendente)

/detail/{id} -> ritorna il dettaglio completo di un terreno

/insert -> inserisce un nuovo terreno

/update/{id} -> permette la modifica di un terreno, recuperato dall'id

/delete/{id} -> permette di eliminare un terreno
#
NOTE:

- problemi con il checkbox del campo "disponibilità immediata" e quindi risolto con una select
