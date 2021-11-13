# Cinemissimo bellissimo

Web app per la prenotazione di biglietti del cinema per Mr Alberyny.


# Installazione

Una volta scaricato il progetto, nella cartella del frontend lanciare i comandi:
```
npm install
npm install -g yarn
yarn add axios
```
Nella cartella del backend, invece, lanciare il comando:
```
composer update
```

# Collegare il DB al backend

Nel backend, creare il file **.env** e cercare la riga giusta in cui scrivere **DB_DATABASE=cinemissimo_db**.

# Effettuare le migrazioni
Per effettuare le migrazioni **(nome del database: cinemissimo_db)**, nella cartella del backend lanciare il comando
```
php artisan migrate
```




